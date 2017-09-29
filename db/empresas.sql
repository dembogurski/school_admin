/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.1.33-community : Database - marijoa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`marijoa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `marijoa`;

/*Table structure for table `par_empresas` */

DROP TABLE IF EXISTS `par_empresas`;

CREATE TABLE `par_empresas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_cod` varchar(8) DEFAULT NULL,
  `emp_nombre` varchar(60) DEFAULT NULL,
  `emp_ruc` varchar(20) DEFAULT NULL,
  `emp_dir` varchar(128) DEFAULT NULL,
  `emp_tel` varchar(30) DEFAULT NULL,
  `emp_mail` varchar(30) DEFAULT NULL,
  `emp_web` varchar(40) DEFAULT NULL,
  `emp_ciudad` varchar(40) DEFAULT NULL,
  `emp_tipo` varchar(60) DEFAULT NULL,
  `emp_cta_cont` varchar(30) DEFAULT NULL,
  `emp_cta_vent` varchar(30) DEFAULT NULL,
  `emp_cta_chi` varchar(30) DEFAULT NULL,
  `emp_cta_merc` varchar(30) DEFAULT NULL,
  `emp_cost_merc` varchar(30) DEFAULT NULL,
  `emp_cod_old` varchar(8) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/* Trigger structure for table `asientos_det` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_corr_saldos` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `update_corr_saldos` BEFORE UPDATE ON `asientos_det` FOR EACH ROW BEGIN
    IF(NEW.codigo <> OLD.codigo) THEN
         INSERT INTO aux_cuentas(codigo,fecha,suc)  VALUES(old.codigo,old.fecha,old.suc);
         INSERT INTO aux_cuentas(codigo,fecha,suc)  VALUES(new.codigo,new.fecha,new.suc);
    END IF;     
    END */$$


DELIMITER ;

/* Trigger structure for table `caja_chica_mov` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `actualizar_saldo_caja_chica` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `actualizar_saldo_caja_chica` AFTER INSERT ON `caja_chica_mov` FOR EACH ROW BEGIN
     DECLARE TMP INTEGER;
     SELECT act_saldo_caja_chica( NEW.cj_ref_chi) INTO TMP;
     IF (NEW.entrada_ref > 0) THEN
	   SELECT  asiento_caja_chica(NEW.__local,NEW.concepto,'E',NEW.compl ,  NEW.entrada_ref ) INTO TMP;
	   	 	             
	ELSE 
	   SELECT  asiento_caja_chica(NEW.__local,NEW.concepto,'S',NEW.compl , NEW.salida_ref ) INTO TMP;	 
        END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `caja_chica_mov` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_gasto` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `update_gasto` AFTER UPDATE ON `caja_chica_mov` FOR EACH ROW BEGIN
      IF ( ( NEW.concepto <> OLD.concepto ) OR (NEW.compl <> OLD.compl) ) THEN
           UPDATE gastos SET g_con = NEW.concepto,g_compl = NEW.compl, g_con_n = NEW.subc_nombre WHERE g_con = OLD.concepto AND g_compl = OLD.compl AND g_monto = OLD.monto;	            
      END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `caja_chica_mov` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_gasto` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `delete_gasto` AFTER DELETE ON `caja_chica_mov` FOR EACH ROW BEGIN
       
      DELETE FROM gastos WHERE g_con = OLD.concepto AND g_compl = OLD.compl AND g_monto = OLD.monto;	            
      
    END */$$


DELIMITER ;

/* Trigger structure for table `caja_con` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `cambio_nombre` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `cambio_nombre` AFTER UPDATE ON `caja_con` FOR EACH ROW BEGIN
        UPDATE gastos SET g_con_n = NEW.cjc_descri WHERE   g_con_n = old.cjc_descri;      
       
    END */$$


DELIMITER ;

/* Trigger structure for table `cuotas` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `actualiza_pagares` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `actualiza_pagares` BEFORE UPDATE ON `cuotas` FOR EACH ROW BEGIN
	IF NEW.ct_estado = 'Cancelada' THEN
	 
	 UPDATE pagares SET pg_estado = 'Cancelado', pg_entregado = OLD.ct_entrega, pg_saldo = OLD.rest WHERE pg_ref = OLD.ct_ref AND pg_nro = OLD.ct_nro;
	 
	ELSE 
	 UPDATE pagares SET pg_estado = 'Pendiente', pg_entregado = OLD.ct_entrega, pg_saldo = OLD.rest WHERE pg_ref = OLD.ct_ref AND pg_nro = OLD.ct_nro;
        END IF;	 
        END */$$


DELIMITER ;

/* Trigger structure for table `factura` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `factura_conv_change` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `factura_conv_change` AFTER UPDATE ON `factura` FOR EACH ROW BEGIN
       DECLARE NRO_CONV INTEGER;
       DECLARE TIPO VARCHAR(40);
        
       IF new.fact_conv <> old.fact_conv THEN
          
		SELECT conv_cod, conv_tipo FROM mnt_conv WHERE conv_cod = new.fact_conv INTO NRO_CONV, TIPO;
          UPDATE fact_detalle_pg f  SET f.dp_conv = NRO_CONV, f.dp_conv_tipo = TIPO, dp_cuentas = '01107052043', dp_nro_orden =  new.fact_nro_orden WHERE  f.dp_fact_nro = old.fact_nro;
       END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `mnt_cli` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `uupper` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `uupper` BEFORE INSERT ON `mnt_cli` FOR EACH ROW BEGIN
        SET NEW.cli_fullname = TRIM(UPPER(NEW.cli_fullname));
    END */$$


DELIMITER ;

/* Trigger structure for table `mnt_cli` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `func_fullname_fact` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `func_fullname_fact` AFTER UPDATE ON `mnt_cli` FOR EACH ROW BEGIN
	 IF NEW.cli_fullname <> OLD.cli_fullname THEN
	   UPDATE factura SET fact_nom_cli = NEW.cli_fullname WHERE fact_cli_ci = OLD.cli_ci;
	   UPDATE cuotas  SET ct_deudor = NEW.cli_fullname WHERE ct_ci = OLD.cli_ci;
	 END IF;
	 
	 IF NEW.cli_ci <> OLD.cli_ci THEN
	   UPDATE factura SET fact_cli_ci = NEW.cli_ci WHERE fact_cli_ci = OLD.cli_ci;
	   UPDATE cuotas  SET ct_ci = NEW.cli_ci WHERE ct_ci = OLD.cli_ci;
	 END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `mnt_color` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `actualiza_colores` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `actualiza_colores` AFTER UPDATE ON `mnt_color` FOR EACH ROW BEGIN
          UPDATE mnt_prod SET p_color = new.c_cod where p_color = old.c_cod; 
    END */$$


DELIMITER ;

/* Trigger structure for table `p_users` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `p_user_ins_gen_pass` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `p_user_ins_gen_pass` BEFORE INSERT ON `p_users` FOR EACH ROW BEGIN
      set new.password = '1$Tc8scfZR5OU';
    END */$$


DELIMITER ;

/* Trigger structure for table `p_users` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `cambiar_local_func` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'plus'@'localhost' */ /*!50003 TRIGGER `cambiar_local_func` AFTER UPDATE ON `p_users` FOR EACH ROW BEGIN
        IF NEW.local <> OLD.local THEN
           UPDATE mnt_func SET func_lugar_trab = NEW.local WHERE func_cod = OLD.name;
        END IF; 
    END */$$


DELIMITER ;

/* Function  structure for function  `abrir_factura` */

/*!50003 DROP FUNCTION IF EXISTS `abrir_factura` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`plus`@`localhost` FUNCTION `abrir_factura`(nro integer, usuario varchar(60)) RETURNS int(11)
    DETERMINISTIC
BEGIN
DECLARE TMP INTEGER;
update det_factura set df_subtotal=(df_cantidad*df_precio) where df_fact_num = nro;
update factura set fact_estado = 'Abierta', fact_empaque = 'No' where fact_nro = nro;
SELECT makeLog_('Abrir Factura',concat(nro,''),usuario) INTO TMP;
RETURN 1;
END */$$
DELIMITER ;

/* Function  structure for function  `acredita_saldo_cc` */

/*!50003 DROP FUNCTION IF EXISTS `acredita_saldo_cc` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`plus`@`localhost` FUNCTION `acredita_saldo_cc`(IDENT integer,cc_monto double(12,2), cc_cc varchar(25),cc_concepto varchar(100) ) RETURNS int(11)
    DETERMINISTIC
BEGIN
DECLARE TMP INTEGER;
 
 SELECT bcos_ins_asiento(cc_cc, current_date, '1-5',cc_concepto, cc_monto, 0) INTO TMP;
 
RETURN 1;
END */$$
DELIMITER ;

/* Function  structure for function  `actualizacion_anual` */

/*!50003 DROP FUNCTION IF EXISTS `actualizacion_anual` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`plus`@`localhost` FUNCTION `actualizacion_anual`() RETURNS int(11)
    DETERMINISTIC
BEGIN
DECLARE FLAG INT;
SELECT CURRENT_DATE >= desde FROM temp into FLAG;
  IF (FLAG > 0) THEN
    # UPDATE __autonum__ set p_cod = 1;
     UPDATE temp SET desde = '2015-01-01';
     RETURN 1;
  END IF; 
  RETURN 0;
END */$$
DELIMITER ;

/* Function  structure for function  `actualizar_desc` */

/*!50003 DROP FUNCTION IF EXISTS `actualizar_desc` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`plus`@`localhost` FUNCTION `actualizar_desc`(func_code varchar(8), descuento integer) RETURNS int(11)
    DETERMINISTIC
BEGIN
 UPDATE  mnt_func set func_deuda_desc = func_deuda_desc - descuento  where func_cod = func_code; 
return 1;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
