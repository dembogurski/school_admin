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

/*Table structure for table `caja_monedas` */

DROP TABLE IF EXISTS `caja_monedas`;

CREATE TABLE `caja_monedas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `m_cod` varchar(5) DEFAULT NULL,
  `m_descri` varchar(20) DEFAULT NULL,
  `m_ref` varchar(2) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `caja_monedas` */

insert  into `caja_monedas`(`id`,`m_cod`,`m_descri`,`m_ref`) values (1,'G$','Guaranies','Si'),(2,'U$','Dolares Americanos','No'),(3,'P$','Pesos Argentinos','No'),(4,'R$','Reales','No');

/*Table structure for table `p_users` */

DROP TABLE IF EXISTS `p_users`;

CREATE TABLE `p_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '(NULL)',
  `obs` varchar(60) DEFAULT NULL,
  `resh` int(11) DEFAULT NULL,
  `resv` int(11) DEFAULT NULL,
  `local` varchar(8) DEFAULT NULL,
  `lang` varchar(60) DEFAULT NULL,
  `trustee` int(11) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=657 DEFAULT CHARSET=latin1;

/*Data for the table `p_users` */

insert  into `p_users`(`id`,`name`,`obs`,`resh`,`resv`,`local`,`lang`,`trustee`,`password`) values (656,'Developer','Plus Developer',1024,760,'01','es',2147483647,'1$w8Q/K5CMy2w'),(2,'Fabiana','Vendedora: Fabiana Beatriz Paiva Cabral',1024,720,'02','es',2,'1$BDX087dN2L2'),(3,'Laura','Vendedora: Laura Aspeleiter Brendler',800,600,'01','es',4333570,'1$0.38mKgMAwc'),(4,'Liliana','Vendedora: Maria Liliana Bogado',1024,720,'02','es',130,'1$Tc8scfZR5OU'),(5,'Sonia','Vendedora: Sonia de Altamirano',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(9,'Diana','EMPAQUE: Diana Altamirano',1024,760,'02','es',0,'1$QrUZkgigjG6'),(12,'Evelin','Vendedora: Evelin Evany Sosa Almada',800,600,'04','es',2,'1$x0ulwYNnz5M'),(14,'Cristina','Vendedora: Maria Cristina Lopez Silva',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(265,'celina','Celi',1024,760,'04','es',3153944,'1$OOpC.rN46gk'),(17,'Mirian','Vendedora: Mirian del Carmen Morinigo Servin',800,600,'01','es',2,'1$2uq0MuHSNHA'),(216,'Adrian','Empaquetador CDE km 3.5',800,900,'10','es',2,'1$Tc8scfZR5OU'),(201,'victorr','Administracion',1600,1200,'02','es',0,'1$5G/ZXD.67LY'),(20,'Gladys','Vendedora: Gladys Beatriz Trinidad Martinez',800,600,'05','es',32770,'1$rtI8r8TQaYk'),(21,'Hugo','Tesorero: Hugo Arnaldo Portillo Acevedo',1024,768,'03','es',3336,'1$Tc8scfZR5OU'),(24,'Eduardo','Eduardo Andres Verdun',800,600,'00','es',67699100,'1$Vyv0.X1LtC6'),(26,'Susana','Jefe Personal: Susana Dovhun Murawczuk',1024,600,'02','es',4333568,'1$Rxyjrgy7iuo'),(198,'rolandob','Britez Maciel Rolando Ariel',800,600,'00','es',590096,'1$M4zM45GL/ik'),(29,'Arnaldo','Stock: Jorge Arnaldo Verdun Barboza',1000,700,'00','es',590100,'1$CIe7lwlCS6c'),(30,'Jorge','Contabilidad: Jorge Miguel Anzoategui',800,600,'03','es',16856348,'1$SscuOZXEpHE'),(31,'Ricardo','Administracion: Ricardo Nayib Yunis Afara',1900,1000,'02','es',146809714,'1$17ToYsgA4cc'),(32,'Jose','Administracion: Jose Said Yunis Afara',1920,800,'02','es',8224,'1$X35b9BgdFZg'),(213,'andrealov','Vendedora',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(211,'mirtaa','Vendedora',800,600,'06','es',2,'1$UE194mqM2xw'),(212,'esther','Vendedora',800,600,'04','es',2,'1$Tc8scfZR5OU'),(210,'margarita','Vendedora',800,600,'05','es',2,'1$Tc8scfZR5OU'),(41,'Douglas','Plus Developer',1024,760,'02','es',1,'1$SKFqbR.l4F2'),(42,'Aide','Vendedora: Aide Rivas',1024,720,'02','es',2,'1$TWGTP0BGSM2'),(202,'sandra','Dpto.Comercial',1600,760,'02','es',205529222,'1$COABNzV4VGg'),(44,'Victoria','Vendedora: Victoria Garcete',800,600,'01','es',2,'1$Tc8scfZR5OU'),(45,'Josefina','Vendedora: Josefina Ofelia Paiva8',1024,720,'02','es',2,'1$P.LOptpC07Q'),(46,'Nilfa','Vendedora: Nilfa Sanabria',1024,720,'02','es',6422530,'1$mhocJA6S7NU'),(47,'Melany','Vendedora: Melany Kufeld Brenler',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(48,'SusanaA','Vendedora: Susana Araujo',1024,720,'02','es',2,'1$jmcgEcdBImQ'),(49,'Raquel','Vendedora: Raquel Duette',800,600,'04','es',32770,'1$Tc8scfZR5OU'),(208,'mirna','Vendedora',800,600,'05','es',2,'1$Tc8scfZR5OU'),(209,'noelia','Cajera',800,600,'05','es',4,'1$phd3srWE276'),(196,'aliciazang','Auxiliar ',1360,700,'04','es',73408646,'1$vuOyuYfbEUs'),(75,'JuanB','Juan Manuel Bogado',800,600,'00','es',524288,'1$us5vUhfptdc'),(197,'Laurafe','Vendedora',1366,720,'04','es',6291458,'1$tmxXekZKkKg'),(54,'Fidel','Fidel',800,600,'00','es',524304,'1$Tc8scfZR5OU'),(64,'ramon','Vendedor Ramon Alfonso',1024,768,'06','es',4194306,'1$Tc8scfZR5OU'),(61,'mariav','Vendedora  Maria Victoria Britez',1024,768,'05','es',32770,'1$v7uAWuLXLkc'),(74,'MiguelE','Miguel Esfren',1024,760,'03','es',2312,'1$0IDAoER8Umk'),(65,'Angel','Miguel Angel',1024,768,'00','es',197008,'1$BDrnXkjKx6c'),(72,'Soledadg','Soledad Gomez Sanabria',1024,720,'02','es',2,'1$PJaMow/4VLE'),(70,'Rosana','Vendedora Rosana Tang Frank',800,600,'04','es',32770,'1$Tc8scfZR5OU'),(68,'sandraf','Sandra Flores',1024,768,'00','es',237842,'1$EIU/Rdt7d.k'),(71,'test','Usuario para testeo',800,600,'25','es',2,'1$Tc8scfZR5OU'),(76,'JuanY','Juan Yeza Maidana-Empaque',800,600,'06','es',128,'1$flR.9EdjZKY'),(193,'Angel09','',1024,760,'09','es',65936,'1$BDrnXkjKx6c'),(78,'FranciscoS','Francisco Solano Lopez-Empaque',1280,760,'25','es',4,'1$Tc8scfZR5OU'),(79,'LuzV','Luz Verdun Vendedora',800,600,'02','es',2,'1$Tc8scfZR5OU'),(82,'MirthaD','Gerente CDE',800,600,'06','es',4202630,'1$bcTdGvMNAKY'),(81,'ViviC','Vendedora Viviana Casco Altamirano',800,600,'06','es',2,'1$XnCX6zfWUkc'),(192,'Angel08','',1024,768,'08','es',65936,'1$BDrnXkjKx6c'),(89,'SoledadT','Vendedora CDE km 3.5',1000,600,'06','es',6291458,'1$ouc8Tn1oxaM'),(100,'LizM','Vendedora',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(93,'Lisandro','Lisandro Isaias Duette Rodriguez',1024,720,'02','es',67108996,'1$.ExL//Xpz3g'),(94,'Yrvin','Vendedor  Yrvin Marcelino Dietze Sozonik',800,600,'05','es',35684482,'1$Tc8scfZR5OU'),(95,'MarioA','Empaque Mario Altamirano Tilleria',1400,1400,'00','es',524560,'1$Tc8scfZR5OU'),(214,'dvictoria','Doña Victoria Yunis',1200,700,'02','es',139264,'1$r5d76tCuND.'),(97,'GustavoZ','Estibador Gustavo Ariel Zozula',900,600,'02','es',128,'1$Tc8scfZR5OU'),(98,'SergioL','Estibador Sergio Lobel Lopez',800,600,'01','es',130,'1$Tc8scfZR5OU'),(99,'Emmanuel','Fiscalizador de Stock',1024,600,'00','es',65552,'1$.y4CCt1jLZo'),(101,'PaulinaE','Limpiadora Local CDE',800,600,'06','es',64,'1$Tc8scfZR5OU'),(102,'LauraR','Vendedora',800,600,'10','es',4194306,'1$livSLlBv8GM'),(103,'Yamil','Estibador',800,600,'00','es',400,'1$Tc8scfZR5OU'),(104,'JoelP','Auxiliar Joel David Portillo',800,600,'06','es',134,'1$rVIG9fHeTGA'),(185,'Liz Anzoategui','Asistente de Procesamiento de Datos',1024,720,'02','es',131072,'1$Tc8scfZR5OU'),(107,'MariaD','Vendedora Maria Liliana Dominguez Gonzalez',1024,720,'02','es',2,'1$jMNGvkXnhhY'),(108,'RaquelM','Vendedora Raquel Matiauda',800,600,'06','es',2,'1$Tc8scfZR5OU'),(109,'IlseD','Vendedora Ilse Duette',800,600,'04','es',32770,'1$Tc8scfZR5OU'),(204,'AntonioMon08','Estibador Deposito',800,600,'08','es',272,'1$Tc8scfZR5OU'),(112,'Derlis T','Vendedor Derlis Trinidad',800,600,'05','es',2,'1$Tc8scfZR5OU'),(206,'albertor','Maquinista 00',800,600,'00','es',524304,'1$Tc8scfZR5OU'),(147,'hectora','ENCARGADO DE INSUMOS-MATRIZ',1024,760,'02','es',274727056,'1$UE194mqM2xw'),(115,'PabloI','Empaquetador Pablo Insaurralde',1024,720,'02','es',0,'1$Tc8scfZR5OU'),(117,'DerlisC','Derlis Manuel Cuquejo Silva',800,600,'00','es',0,'1$Tc8scfZR5OU'),(118,'CuquejoD','Chofer Derlis Cuquejo',800,600,'00','es',0,'1$Tc8scfZR5OU'),(205,'AntonioMon09','Estibador Deposito',800,600,'09','es',272,'1$Tc8scfZR5OU'),(119,'MarianM','AsistenteC.  Mariangela',1300,760,'02','es',139264,'1$G64DZTKNMds'),(120,'Editt','Gerente Sucursal Editt',800,600,'07','es',41092,'1$0iPE3OANjpI'),(121,'JavierM','Estibador Javier Morel Altamirano',1024,760,'26','es',524288,'1$Tc8scfZR5OU'),(122,'CesarV','Cesar Villalba',1024,760,'02','es',71311492,'1$o29do5JOpjo'),(123,'EliasY','Finanzas Elias Yunis',1920,1070,'05','es',153132,'1$XoIPuotDQ2Q'),(124,'AminY','Amin Yunis ',1024,720,'02','es',8397408,'1$lit8TzOf0fU'),(126,'CarolC','Vendedora CDE',800,600,'06','es',2,'1$3d98kC2.3wo'),(127,'PatriL','Vendedora CDE',800,600,'06','es',2,'1$Tc8scfZR5OU'),(128,'PatriG','Vendedora Av.',1024,750,'02','es',6291458,'1$K1SdogSx.eU'),(129,'MariaMC','Maria Mercedes',900,600,'02','es',204810,'1$P7ow.59zFDc'),(130,'nancy','Cajera',1204,768,'01','es',4,'1$jrA6x98nBAM'),(132,'NelidaA','Vendedora Nelida Alicia Cantero',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(150,'deliaareco','vendedora ciudad del este',800,600,'06','es',2,'1$Tc8scfZR5OU'),(133,'SusanaB','Vendedora Susana Busch Karst',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(134,'AliciaC','Aux.Comercial Alicia Cantero',1024,760,'00','es',74498,'1$l413d7a4YEg'),(153,'EditaDominski','GERENTE DE SUCURSAL TERMINAL',1500,1500,'01','es',73408646,'1$MyOWksWDck.'),(137,'ramonv','Vendedor',800,600,'06','es',2,'1$Tc8scfZR5OU'),(148,'pablinos','vendedor avenida',1024,760,'02','es',6291458,'1$bTtBC7/LgTo'),(139,'estebanl','Ventas',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(140,'oscark','EStibador Deposito',800,600,'00','es',524288,'1$Tc8scfZR5OU'),(142,'AntonioMon','Estibador Deposito',800,600,'26','es',205206,'1$EBDGrUbbqJc'),(144,'RafaelGi','Motokeiro Av',800,600,'26','es',524288,'1$Tc8scfZR5OU'),(145,'LopezCris','EStivador Deposito',800,600,'00','es',0,'1$Tc8scfZR5OU'),(149,'edib','vendedor avenida',800,600,'01','es',2,'1$Tc8scfZR5OU'),(151,'noramuller','vendedora ciudad del este',800,600,'06','es',2,'1$Tc8scfZR5OU'),(154,'EstebanCristaldo','Estebidor Deposito',1024,760,'26','es',524288,'1$Tc8scfZR5OU'),(155,'rafael ferreira','Empleado Ciudad del Este',800,600,'06','es',67117186,'1$6XfpgxRcqQ6'),(156,'marcos','Marcos Ismael Troche',1024,768,'00','es',0,'1$Tc8scfZR5OU'),(157,'natalialacy','Vendedora SAnta Rita',800,600,'05','es',32770,'1$Tc8scfZR5OU'),(158,'ruben ortiz','Vendedor',900,600,'01','es',524306,'1$e8kAN82iOyo'),(159,'Nestor Flores','Vendedor Terminal',1024,768,'01','es',4194306,'1$Tc8scfZR5OU'),(160,'robertc','Cajero CDE km 3.5',800,600,'06','es',4,'1$phNLWS40YSA'),(161,'Marta Valiente','Vendedora C. del ESte',800,600,'10','es',2,'1$NGmbTr0RlJY'),(163,'DaianaF','Vendedora Obligado',800,600,'04','es',32770,'1$Tc8scfZR5OU'),(165,'hugoj','Vendedor ciudad del este',800,600,'06','es',132,'1$Tc8scfZR5OU'),(268,'derlisz','EMPAQUE-Derlis Zorrilla',1000,740,'01','es',69730432,'1$Na/laKFzUaA'),(170,'mayrasilvero','vendedora terminal',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(171,'dianaprado','vendedora avenida',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(172,'rossanamazur','Muestrarios en Produccion',800,600,'00','es',2228226,'1$Tc8scfZR5OU'),(173,'AbelardoA','AbelardoA',800,600,'00','es',272,'1$Tc8scfZR5OU'),(174,'RolandoP','Ventas Santa Rita',800,600,'05','br',32770,'1$Tc8scfZR5OU'),(175,'juancarlos','Deposito',800,600,'00','es',16,'1$Tc8scfZR5OU'),(176,'vivianabogado','Ventas Avenida',1024,720,'02','es',2,'1$Tc8scfZR5OU'),(177,'robertov','Deposito',900,800,'00','es',74134,'1$SQte6fcxyvk'),(178,'hugov','Depósito',600,800,'26','es',524288,'1$Tc8scfZR5OU'),(179,'marcosl','Marcos Lezcano Avenida',1000,800,'02','es',874578192,'1$ZguFlUIoluA'),(180,'carlosv','Ventas C.D.E',600,800,'06','es',2,'1$Tc8scfZR5OU'),(181,'victor','Jefe de Logistica',1100,700,'26','es',68256150,'1$FoM5DI/Rfl.'),(182,'fatimab','limpiadora',600,800,'03','es',0,'1$Tc8scfZR5OU'),(183,'Arnaldo2','Encargado Deposito San Isidro',1000,800,'08','es',590096,'1$CIe7lwlCS6c (Disab'),(184,'Arnaldo3','Encargado Deposito Arroyo Pora',1000,1000,'09','es',272,'1$CIe7lwlCS6c (Disab'),(449,'AlejandroR','Auxiliar de Caja - OBLIGADO',1206,706,'04','es',134,'1$LyyDSBmKMu2'),(191,'sandraf09','Sandra Flores Deposito 09',1000,700,'09','es',237842,'1$Tc8scfZR5OU'),(188,'sandraf08','Sandra Flores Deposito 08',1000,700,'08','es',237842,'1$Tc8scfZR5OU'),(189,'josiasaguilera','Vendedor',1366,766,'04','es',102760578,'1$D5L6DlzzL1U'),(230,'Mariaafara','Socia-Propietaria',800,600,'01','es',0,'1$Tc8scfZR5OU'),(217,'Josef','Chofer',800,600,'26','es',536870912,'1$Tc8scfZR5OU'),(218,'Garay','Vendedor',800,600,'06','es',2,'1$Tc8scfZR5OU'),(219,'MariaI','Maria Isabel ',600,800,'05','es',0,'1$Tc8scfZR5OU'),(220,'raulb','tecnico informatico',1024,720,'02','es',0,'1$Tc8scfZR5OU'),(221,'Mario2','Encargado de Recepcion Mercaderias Locales',800,600,'09','es',16,'1$Tc8scfZR5OU'),(222,'Mario3','Encargada de Recepcion de Mercaderia',800,600,'08','es',16,'1$Tc8scfZR5OU'),(223,'Jorged','Contabilidad',800,600,'30','es',233209710,'1$P4ROjMZO3YQ'),(227,'Fredy','Vendedor',1024,720,'02','es',128,'1$Tc8scfZR5OU'),(226,'Ada','limpiadora',800,600,'05','es',0,'1$Tc8scfZR5OU'),(228,'Marcelo','empaque',800,600,'01','es',71303296,'1$cJZRELpQYa6'),(235,'samuel','Empaque',800,600,'01','es',128,'Inactivo'),(233,'estigarribia','Chofer',800,600,'06','es',0,'1$Tc8scfZR5OU'),(232,'Bordon','Chofer',800,600,'06','es',0,'1$Tc8scfZR5OU'),(234,'stella','Cajera',800,600,'04','es',4,'1$Tc8scfZR5OU'),(238,'riveros','Estibador',800,600,'00','es',0,'1$Tc8scfZR5OU'),(239,'zotelo','EMPAQUE',1024,768,'02','es',128,'1$ecp2qBKb4Vs'),(240,'hofman','Estibador',800,600,'00','es',128,'1$Tc8scfZR5OU'),(243,'miryan','Vendedora',800,600,'04','es',2,'1$Tc8scfZR5OU'),(244,'lorena','Cajera',800,600,'04','es',4,'1$Tc8scfZR5OU'),(245,'juanm','Maquinista Deposito',800,600,'00','es',524288,'1$Tc8scfZR5OU'),(246,'wilsono','Maquinista 00',800,600,'00','es',524288,'1$Tc8scfZR5OU'),(247,'sergior','Maquinista 00',800,600,'26','es',524304,'1$eNXHDqd/Sng'),(248,'oscars','Maquinista 00',800,600,'00','es',524288,'1$Tc8scfZR5OU'),(250,'Liz','Asesoria de la Gerencia',1024,720,'02','es',8389400,'1$Tc8scfZR5OU'),(262,'arnaldoaquino','Contador Interno',1024,760,'01','es',85459128,'1$8mLrmNsSSZo'),(253,'naty','administración',1024,720,'02','es',32,'1$Tc8scfZR5OU'),(254,'lucas','Lucas Ariel Rivarola Denis',1366,720,'04','es',134,'1$xeclJCosI52'),(255,'robertov08','Deposito 08',800,600,'08','es',524560,'1$Tc8scfZR5OU'),(256,'robertov09','Deposito 09',800,600,'09','es',524560,'1$Tc8scfZR5OU'),(259,'victor08','Jefe de Logistica',1100,700,'08','es',68256150,'1$FoM5DI/Rfl.'),(360,'franciscog','Gracia, Francisco',1206,708,'01','es',874578192,'1$Fax9/557F1w'),(358,'agustinr','vendedor mayorista',1256,706,'04','es',134,'1$Tc8scfZR5OU'),(264,'rene','Reinero Insaurralde',800,600,'00','es',4391312,'1$j8dD4Qei5v.'),(270,'sandrar','Sandra Ramirez Dominguez',800,600,'04','es',2105476,'1$uIlI5ly/c/.'),(273,'AbelardoA08','AbelardoA',800,600,'08','es',272,'1$Tc8scfZR5OU'),(274,'AbelardoA09','AbelardoA',800,600,'09','es',590096,'1$Tc8scfZR5OU'),(275,'elisa','Elisa Franco (Secretaria Coach)',1024,760,'02','es',15140816,'1$U0fPDFOVbA.'),(276,'Soniac','Asesor Finanaciero',1270,740,'02','es',75628704,'1$Yd7BGSj0hPo'),(279,'adolfo','Adolfo',1366,760,'05','es',67108865,'1$MkahpMSkxtI'),(280,'victor09','Jefe de Logistica',1100,700,'09','es',68256150,'1$FoM5DI/Rfl.'),(281,'silvina','Vendedora',800,600,'06','es',134,'1$Tc8scfZR5OU'),(380,'ale','Auxiliar Santa Rita',1206,706,'05','es',134,'1$afaN3is47Kk'),(282,'rene09','Reinero Insaurralde',800,600,'09','es',4391056,'1$j8dD4Qei5v.'),(285,'alejandro','Alejandro Troche',800,600,'09','es',524304,'1$yxsZ5tZbXwo'),(286,'VictorV','Victor Vazquez',800,600,'00','es',524288,'1$Tc8scfZR5OU'),(421,'marcos12','Marcos Ismael Troche 12',900,800,'12','es',604045584,'1$EBDGrUbbqJc'),(287,'lisaalegre','Asistente Contable',800,600,'02','es',16782728,'1$5E9WzZuqFl2'),(288,'denis','Maquinista',800,600,'00','es',524288,'1$Tc8scfZR5OU'),(289,'juanpesoa','Maquinista',800,600,'00','es',524288,'1$Tc8scfZR5OU'),(290,'fabiann','Fabian Noguera Maquinista',800,600,'00','es',0,NULL),(291,'antonionoguera','Maquinista',800,600,'00','es',0,NULL),(292,'benjaming','Maquinista Deposito',800,600,'00','es',0,NULL),(293,'fabiol','Fabio Ledesma',1024,720,'02','es',69206144,'1$FSMvBR3BzcE'),(294,'federico','Federico Gonzalez',800,600,'00','es',0,NULL),(295,'juang','Juan Gabriel Pesoa',800,600,'00','es',524288,NULL),(297,'ricardom','Maquinista',800,600,'00','es',0,NULL),(298,'susanag','Tesoreria',1366,760,'02','es',16909324,'1$IL3UapZdB5U'),(299,'isa','Vendedora CDE Centro',1024,760,'10','es',2,'1$Tc8scfZR5OU'),(300,'sergio','Chofer CDE',1012,760,'06','es',262144,'1$y0P4SaNpffI'),(301,'marcelov','Empaquetador CDE Centro',1024,760,'10','es',128,'1$G2VL.dLEXFM'),(302,'cesarvega','Gerente CDE Centro',1024,760,'10','es',8324,'1$h9HuqmW0y0w'),(303,'olga','Olga Bresanovich',1024,760,'10','es',4194306,'1$JQYnCFJp.Ic'),(304,'nancyvera','Nancy Vera Cajera CDE Centro',1024,760,'10','es',4,'1$I3zuoxcsGDk'),(306,'gregor','Vendedor CDE Centro',1024,760,'10','es',67108994,'1$dt.fodsdTMc'),(309,'antonio','CDE',1024,800,'06','es',2,'1$iW.qTU73T9k'),(311,'carmenc','vendedora',1024,760,'01','es',2,'1$9Z6bBhX.G2A'),(312,'jorgea','Soporte de ventas',1024,760,'02','es',130,'1$wEQMXBvVEKM'),(313,'Patricia E','vendedora',1024,760,'02','es',2,'1$Tc8scfZR5OU'),(314,'Visitacion','Vendedora',1024,760,'02','es',2,'1$Tc8scfZR5OU'),(315,'Agustina','Empaquetadora Terminal',1024,760,'01','es',67108992,'1$ehYEs/XY0jQ'),(316,'luza','Vendedora',1024,760,'01','es',2,'1$Tc8scfZR5OU'),(317,'Mirthas','Vendedora',1024,760,'01','es',2,'1$JwjsKk9pPeM'),(318,'dollya','vendedora',1024,760,'06','es',2,'1$Tc8scfZR5OU'),(320,'Liana','LIANA SCHLICKMANN-CAJERA CDE CENTRO',1024,760,'10','es',4,'1$D3y//0vIccI'),(321,'edith','Edith-vendedora',1024,760,'05','es',2,'1$YSRKhMoVo36'),(322,'Alfredo','Jefe de compras',1300,1200,'00','es',67313972,'1$Tc8scfZR5OU'),(325,'juandavid','Juan David Margot',10,26,'02','es',524288,'1$Tc8scfZR5OU'),(326,'joser','José Ruggeri',700,400,'26','es',590100,'1$Tc8scfZR5OU'),(327,'arielc','Ariel Curtido',106,72,'00','es',524288,'1$Tc8scfZR5OU'),(328,'yoelky','EMPAQUE',800,600,'05','es',128,'1$Tc8scfZR5OU'),(425,'albertob','Alberto Benitez Deposito San Isidro',800,600,'08','es',536870928,'1$Tc8scfZR5OU'),(330,'mauricio','Mauricio Vazquez- Maquinista',1024,760,'26','es',524288,'1$Tc8scfZR5OU'),(331,'joseb','Jose Benitez Maquinista',1240,760,'00','es',524304,'1$fE8FrqNa1pE'),(332,'andrear','Gerente Comercial',1024,780,'02','es',136454176,'1$KwUeJGR1NsM'),(333,'meireles','VENTAS',800,600,'05','es',2,'1$Tc8scfZR5OU'),(338,'diego','diego empaque cde',980,800,'06','es',2097280,'1$ZFtnwAGC.AU'),(335,'marcos08','Marcos Ismael Troche 08',900,650,'08','es',604045584,'1$EBDGrUbbqJc'),(336,'marcos09','Marcos Ismael Troche 09',900,650,'09.01','es',604045584,'1$EBDGrUbbqJc'),(337,'rene08','Reinero Insaurralde',800,600,'08','es',4391056,'1$j8dD4Qei5v.'),(349,'derlisin','Maquinista',1258,0,'00','es',524288,'1$Tc8scfZR5OU'),(341,'dreck','Dreck Caceres',1260,780,'01','es',2,'1$Tc8scfZR5OU'),(347,'jorgeluis','auxiliar de caja',1072,785,'06','es',4,'1$ATt3w1fs/q2'),(346,'angelgabriel','empaquetador',1072,785,'10','es',874578192,'1$0/FTWDVtAYI'),(348,'migueld','Miguel Duarte',1500,760,'00','es',74118,'1$HsnDoyfrPow'),(350,'fernando','Fernando Morales Deposito 00',1024,1000,'00','es',74134,'1$2ul.uANUUSk'),(351,'jorgex','maquinista',1278,706,'00','es',524288,'1$Tc8scfZR5OU'),(352,'oscarx','maquinista',1278,705,'00','es',524288,'1$Tc8scfZR5OU'),(353,'hernan','Mayorista',600,800,'04','es',4194306,'1$Tc8scfZR5OU'),(354,'richard','Empaque (Santa Rita)',1276,706,'05','es',102760576,'1$lzAlTPFdqQ2'),(355,'Jerson','Chofer',1798,952,'06','es',1,'1$Tc8scfZR5OU'),(369,'josema','Jose Maria Chaparro',1024,720,'02','es',4194306,'1$Tc8scfZR5OU'),(361,'hectorg','empaque',1206,708,'06','es',128,'1$NGmbTr0RlJY'),(362,'jadiyi','Gerente Cde km 3,5',1206,708,'06','es',73408646,'1$5GFn8RNyQr6'),(363,'jadiyi10','Gerente Cde Centro',1206,768,'10','es',73408646,'1$Tc8scfZR5OU'),(366,'jorgeaguero','Chofer-CDE',1206,708,'06','es',1,'1$Tc8scfZR5OU'),(367,'Eduardo09','Eduardo Andres Verdun',800,600,'26','es',67699100,'1$Vyv0.X1LtC6'),(368,'santarita','Supervisora Alicia Zang',1360,800,'05','es',73408646,'1$vuOyuYfbEUs'),(381,'aczel','Auxiliar caja CDE Km 3.5',1206,708,'06','es',6291590,'1$mmZgN9YmqlQ'),(375,'zulma','Ventas Avenida',1206,798,'02','es',2,'1$Tc8scfZR5OU'),(376,'mariama','Soraida',1206,789,'01','es',4194306,'1$Tc8scfZR5OU'),(378,'cristhian','Multiuso Santa Rita',1206,708,'05','es',0,'1$AndLe5krXYA'),(382,'Digna','Ventas Cde',1206,708,'06','es',2,'1$Lc.if/ccQ1g'),(383,'Celia','Ventas CDE',1206,1000,'06','es',2,'1$Tc8scfZR5OU'),(384,'victoriay','recepcion',1026,0,'02','es',32,'1$Tc8scfZR5OU'),(387,'fabiola','Ventas, Sucursal Terminal',1206,708,'02','es',2,'1$/rlOtlCANu.'),(388,'luisfernando','Chofer CDE',1206,708,'06','es',0,'1$Tc8scfZR5OU'),(391,'mariaestela','Supervisora de Ventas Mayoristas',1206,708,'00','es',17506590,'1$N0UgeMi8NXo'),(390,'laurairala','Soporte Ventas Avenida',1206,708,'02','es',2,'1$Tc8scfZR5OU'),(392,'laurac','Matriz',1206,708,'10','es',6299782,'1$JwjsKk9pPeM'),(394,'Lelia','Encargada de Control de Caja y Empaque',1206,708,'01','es',285345292,'1$lmqNBk1Auns'),(397,'alanv','Estibador',1206,708,'00','es',276,'1$E1fEJq68PzM'),(398,'Joseruggeri','manteleria',1206,708,'00','es',0,'1$Tc8scfZR5OU'),(399,'jorgevera','estibador',1206,708,'26','es',524288,'1$uNBLmWtwtRY'),(400,'Jonatan','Auxiliar de empaque y caja',800,600,'05','es',132,'1$KphSWbnl3Us'),(401,'Eder','Ventas Mayoristas Santa Rita',1206,806,'05','es',2,'1$biZBt7hRYuo'),(403,'RicardoF','Vendedor Mayorista CDE',1206,806,'06','es',6291458,'1$Tc8scfZR5OU'),(404,'sebastian','Sebastian Estibador',800,600,'26','es',524304,'1$T3di6wbzLTs'),(405,'margott','Juan David Margot',600,700,'02','es',69206144,'1$GXXPjg.1eNI'),(412,'FernandoD','Suc. Terminal: Jefe de Empaque',1206,806,'01','es',606142736,'1$PSPMDmiyxFA'),(408,'RocioL','Monitoreo de Fraccionamiento de Mercaderías',1024,720,'08','es',13698450,'1$vNbmStpp34Q'),(409,'OscarR','Producción: Preparador de Manteles',1206,806,'26','es',524304,'1$Tc8scfZR5OU'),(410,'MauricioV','Producción: Maquinista',1206,708,'00','es',0,'1$Tc8scfZR5OU'),(411,'DerlysG','CDE: Empaquetador',1206,708,'06','es',874578192,'1$jKE6DP5krHc'),(413,'Jack','Asistente Informatico',1024,720,'01','es',1,'1$QEbn9npHaMk'),(415,'victor12','Jefe de Logistica',1100,700,'12','es',68256150,'1$FoM5DI/Rfl.'),(416,'juancarlos08','Juan Carlos p/ Deposito 08',800,600,'08','es',16,'1$Tc8scfZR5OU'),(417,'juancarlos09','09',800,600,'09','es',16,'1$Tc8scfZR5OU'),(418,'juancarlos12','12',800,600,'12','es',16,'1$Tc8scfZR5OU'),(419,'Eduardo08','Eduardo Andres Verdun',800,600,'08','es',67699100,'1$Vyv0.X1LtC6'),(420,'Eduardo12','Eduardo Andres Verdun',800,600,'12','es',67699100,'1$Vyv0.X1LtC6'),(422,'marcos13','Marcos Troche',900,800,'13','es',604045584,'1$Tc8scfZR5OU'),(423,'victor13','Jefe de Logistica',1100,700,'13','es',68256150,'1$b2Ewx.7aIzU'),(424,'Eduardo13','Eduardo Andres Verdun',800,600,'13','es',67699100,'1$lTdZoCKsYPg'),(426,'TonyG','Antonio Godoy',800,600,'00','es',590096,'1$8KPVylATja2'),(427,'marcos00','Marcos Troche',800,600,'00','es',604045584,'1$EBDGrUbbqJc'),(431,'rene12','Reinero Insaurralde',800,600,'12','es',4391056,'1$j8dD4Qei5v.'),(434,'alcides','Auxiliar Administrativo- Contable de Potencial Humano',1200,700,'03','es',16780968,'1$GxN9sAprA4k'),(442,'vicente05','Auxiliar de Empaque',1206,706,'05','es',128,'1$Tc8scfZR5OU'),(438,'maryan','SOPORTE DE VENTAS',1206,700,'02','es',2,'1$9uURNgpfF6s'),(439,'natalial','SOPORTE DE VENTA',1206,700,'01','es',2,'1$GX7YnI1WZo6'),(450,'CarlosM','Ayudante de Empaquetador - Obligado',1206,706,'04','es',128,'1$Tc8scfZR5OU'),(451,'BrayanC','Jefe de Empaque',1206,706,'06','es',878772626,'1$2S/c5t8oQho'),(452,'VicenteM','Auxiliar de Empaque - Santa Rita',1206,706,'05','es',130,'1$NbA.ovvzxUk'),(453,'GriseldaR','VENDEDORA',1206,706,'05','es',2,'1$Tc8scfZR5OU'),(454,'FranciscoGM','Empaquetador-Avenida',1206,706,'02','es',128,'1$Tc8scfZR5OU'),(455,'ManuelM','Vendedor Mayorista - CDE',1206,706,'06','es',4194306,'1$I9ZqEWEV0To'),(458,'NormaB','Cargador Manual - Compras',1206,706,'08','es',74134,'CANCELED1$HIIh30giig'),(457,'HernanQ','Auxiliar de Empaque- CDE KM 3,5',1206,706,'06','es',128,'1$EBDGrUbbqJc'),(459,'margott08','Juan David Margot',800,600,'08','es',524304,'1$GXXPjg.1eNI'),(460,'margott09','Juan David Margot',800,600,'09','es',524304,'1$1z1D5EdUPrs'),(461,'TonyG08','Antonio Godoy',800,600,'08','es',524304,'1$Tc8scfZR5OU'),(462,'TonyG09','Antonio Godoy',800,600,'09','es',524304,'1$8KPVylATja2'),(468,'monicaa','Soporte de Ventas - Terminal',1206,706,'01','es',2,'1$AqXu1yKYZg2'),(465,'MiguelL','Auxiliar Contable',1206,706,'02','es',233209710,'1$E0S02TFfbsg'),(466,'CesarV00','Cesar Villalba',1024,760,'00','es',71311492,'1$o29do5JOpjo'),(471,'CarolinaM','Cajera-Santa Rita',706,1205,'05','es',4,'1$Tc8scfZR5OU'),(470,'mariavictoria','Maria Victoria Yunis',1024,760,'03','es',32,'1$Tc8scfZR5OU'),(472,'HectorM','Vendedor Mayorista - Obligado',706,1206,'04','es',4194306,'1$6O.U6D5Hh.U'),(474,'NancyM','VENDEDORA MINORISTA - SANTA RITA',706,1206,'05','es',2,'1$aRo8UOTi1/o'),(475,'FabiolaA','VENDEDORA MINORISTA - OBLIGADO',706,1206,'04','es',2,'1$kZGi8t2UZgE'),(484,'Cyntia','Cyntia Galeano',800,600,'01','es',6299782,'1$Lg9Uk1eS.gU'),(477,'EumelioV','VENDEDOR MINORISTA-CDE',706,1206,'06','es',6291458,'1$Tc8scfZR5OU'),(479,'CelsoB','AUXILIAR DE EMPAQUE y CAJA',706,1206,'06','es',132,'1$5qe8Hoxp8fQ'),(480,'KarinaG','Vendedora',706,1206,'05','es',2097286,'1$rRjwNEe357o'),(482,'raquelb','Cajera - Santa Rita',706,1206,'05','es',4,'1$Tc8scfZR5OU'),(485,'marissa','Marissa Maldonado Vendedora Terminal',800,600,'01','es',2,'1$tPxLPEaD5IM'),(490,'angelb','Angel Isaac, Benitez Rodriguez - Auxiliar Caja y Empaque',5000,5000,'10','es',2097284,'1$EBDGrUbbqJc'),(487,'marissaM','Vendedora Minorita - Terminal',800,600,'01','es',2,'1$Tc8scfZR5OU'),(488,'andreaM','Vendedora Minorista - Obligado',800,600,'04','es',2,'1$Ad9LF6ZAaNM'),(492,'hectorr','De CDE',1024,768,'06','es',2,'1$Tc8scfZR5OU'),(493,'belen','Belen Torrez Vendedora Terminal',1024,768,'01','es',2,'1$/gDQ3KyGQjo'),(497,'yonatanM','Vendedor Minorista-Obligado',1206,706,'04','es',2,'1$Tc8scfZR5OU'),(495,'hildaB','Hilda Benitez',1024,720,'05','es',4194306,'1$Tc8scfZR5OU'),(496,'cristianB','Cristian Benitez',1024,800,'05','es',2097286,'1$11bdtuTVCNM'),(498,'josel','Empaquetador - Terminal',1206,706,'01','es',4,'1$1NDkfVgWRu6'),(499,'lidiav','Soporte - Terminal',1206,706,'01','es',2,'1$8AVStLjxkT6'),(500,'belens','Control Proveedores e Importaciones',1024,760,'03','es',16856348,'1$jSv1tX.CgwM'),(502,'ferminl','Fermin Lopez Deposito San Isidro',1206,706,'08','es',16,'1$xweYz29sIio'),(504,'CarolinaAmarilla','GERENTE SUCURSAL SAN LORENZO',1280,700,'24','es',73408646,'1$OY6FGGqe63c'),(505,'abrahanc','Auxilidar Empaque y Venta - Asunción',1200,1200,'25','es',874578192,'1$Tc8scfZR5OU'),(506,'dianaa','Vendedora - San Lorenzo',1200,700,'24','es',2,'1$etdkbYxo5S2'),(507,'lilianag','Vendedora - Avenida',1200,700,'02','es',2,'1$sP0vyjwjV2E'),(508,'teodorac','Vendedora - San Lorenzo',800,600,'25','es',2,'1$SbLFeP4NS9.'),(509,'shirleym','Vendedora - Avenida',1200,700,'02','es',2,'1$ieb4WZ9mkaE'),(510,'dianam','Vendedora - San Lorenzo',1200,700,'24','es',2,'1$fFc79q.Ig4Y'),(511,'ricardov','Empaque - San Lorenzo',1200,700,'24','es',874512516,'1$QUSvc.u0e2Q'),(512,'mauroc','Empaque - Asuncion',1200,700,'25','es',874578196,'1$/DqOsuAiM5I'),(513,'alanv19','Estibador',1206,708,'09.01','es',276,'1$E1fEJq68PzM'),(514,'alanv20','Estibador',1206,708,'09.02','es',276,'1$E1fEJq68PzM'),(515,'alanv21','Estibador',1206,708,'09.04','es',276,'1$E1fEJq68PzM'),(516,'alanv22','Estibador',1206,708,'09.05','es',276,'1$E1fEJq68PzM'),(517,'alanv23','Estibador',1206,708,'09.06','es',276,'1$E1fEJq68PzM'),(518,'marcianef','Cajera - San Lorenzo',1300,700,'24','es',132,'1$.L4Y/xhNegg'),(519,'mauricio09','Mauricio Vazquez- Maquinista',1024,760,'09','es',524288,'1$Tc8scfZR5OU'),(522,'marinap','Vendedora San Lorenzo',1024,700,'24','es',2,'1$Tc8scfZR5OU'),(529,'Santiago Alarcon','Vendedor',1200,700,'01','es',2,'1$MnSAJhEo6H2'),(531,'Maria Benitez','Auxiliar Administrativo',700,1200,'03','es',16384,'1$Tc8scfZR5OU'),(527,'Liz Dominguez','Muestrario',700,1200,'05','es',2,'1$Tc8scfZR5OU'),(528,'Sergio Vazquez','Empaquetador ',700,1200,'01','es',2097282,'1$MWEmMW1/ydI'),(530,'Valeriana','Limpiadora',1024,760,'24','es',64,'1$Tc8scfZR5OU'),(533,'sebastian09','Estibador',1206,708,'09','es',276,'1$Tc8scfZR5OU'),(534,'sebastian19','Estibador',1206,708,'09.01','es',276,'1$Tc8scfZR5OU'),(535,'sebastian20','Estibador',1206,708,'09.02','es',276,'1$Tc8scfZR5OU'),(536,'sebastian21','Estibador',1206,708,'09.04','es',276,'1$Tc8scfZR5OU'),(537,'sebastian22','Estibador',1206,708,'09.05','es',276,'1$Tc8scfZR5OU'),(538,'sebastian23','Estibador',1206,708,'09.06','es',276,'1$Tc8scfZR5OU'),(541,'MariaRivas','ENCARGADA CDE',1200,720,'06','es',6431878,'1$QLkYzIwtzX2'),(540,'jvazquez','maquinista',800,600,'00','es',524288,'1$Tc8scfZR5OU'),(542,'asiria','ENCARGADA DE INSUMOS-MATRIZ',1200,700,'13','es',268435600,'1$MwySngVo8bs'),(544,'edgar','Edgar Ruiz Diaz',1024,760,'00','es',524304,'1$fE8FrqNa1pE'),(545,'alanv26','Estibador',1206,708,'09.03','es',276,'1$E1fEJq68PzM'),(546,'TonyG27','Antonio Godoy',800,600,'09','es',524304,'1$Tc8scfZR5OU'),(548,'Fidel09','Fidel',800,600,'09','es',524304,'1$Tc8scfZR5OU'),(549,'cristhiand','Jefe de Empaque_Asunción',700,1200,'25','es',874578192,'1$hEmIGAVPEWA'),(550,'MildaBenitez','Encargada de Sucursal Asuncion',1024,760,'25','es',6299782,'1$CRXhBUA/I5E'),(561,'celestea','Soporte de Venta-Avenida',700,1200,'02','es',2,'1$9IWCd/.Hsb2'),(555,'alexandrad','Vendedora-Asunción',700,1200,'25','es',2,'1$Tc8scfZR5OU'),(553,'Camila Cristaldo','Vendedora - Asunción',700,1200,'25','es',2,'1$Tc8scfZR5OU'),(556,'camilac','Vendedora-Asunción',700,1200,'25','es',2,'1$S6RbyOOfpQU'),(557,'gloriab','Vendedora-Asunción',1200,700,'24','es',2,'1$Tc8scfZR5OU'),(558,'rosalbag','Vendedora-Asunción',700,1200,'25','es',2,'1$na4dy3U.2w2'),(559,'gustavoa','Cajero-Asunción',800,600,'24','es',4,'1$BRfEgBSJ1gY'),(560,'nicolasr','Empaque - San Lorenzo',1024,760,'24','es',874512516,'1$SV5Si9ZvraM'),(565,'edgar14','Edgar Ruiz Diaz',1024,760,'12.01','es',536870928,'1$Tc8scfZR5OU'),(564,'julios','Vendedor',700,1200,'25','es',2,'1$dVijIoSYIik'),(566,'edgar15','Edgar Ruiz Diaz',1024,760,'12.02','es',536870928,'1$Tc8scfZR5OU'),(567,'edgar16','Edgar Ruiz Diaz',1024,760,'12.06','es',536870928,'1$Tc8scfZR5OU'),(568,'edgar17','Edgar Ruiz Diaz',1024,760,'12.05','es',536870928,'1$Tc8scfZR5OU'),(569,'edgar18','Edgar Ruiz Diaz',1024,760,'12.04','es',536870928,'1$Tc8scfZR5OU'),(571,'soniaa','Soporte de Venta (Avenida)',1024,720,'02','es',2,'1$fwHKUZpeibg'),(572,'gustavoo','Empaquetador (Asunción)',1200,700,'25','es',128,'1$Tc8scfZR5OU'),(573,'alexisd','Empaquetador (Obligado)',1300,700,'04','es',134,'1$Tc8scfZR5OU'),(576,'gustavol','Vendedor Mayorista (San Lorenzo)',1024,700,'24','es',6291458,'1$Tc8scfZR5OU'),(575,'ramonverdun','Soporte de Venta (Avenida)',1024,760,'02','es',2,'1$Tc8scfZR5OU'),(577,'clarae','Vendedora (San Lorenzo)',1200,700,'24','es',2,'1$Tc8scfZR5OU'),(579,'rene27','Reinero Insaurralde',800,600,'00.03','es',4391056,'1$j8dD4Qei5v.'),(581,'Mayra','Mayra Benitez',1024,760,'03','es',16784776,'1$2XYkRYl5AM2'),(583,'virina','Virina Benitez Vendedora Independiente',1024,760,'26','es',2,'1$Tc8scfZR5OU'),(584,'edgar28','Edgar Ruiz Diaz',1024,760,'12.24','es',536870928,'1$Tc8scfZR5OU'),(585,'edgar29','Edgar Ruiz Diaz',1024,760,'12.25','es',536870928,'1$Tc8scfZR5OU'),(586,'miguelg','Miguel Guerrero',1024,760,'00','es',590096,'1$Tc8scfZR5OU'),(589,'lisaa','Muestraria',1200,700,'00','es',4915478,'1$qsa3kDQtmwo'),(588,'yrene','Gerente de Sucursal Santa Rita',1600,760,'05','es',205529222,'1$xdwkhOnTDQY'),(590,'victoro','Victor Orrego',1024,760,'00','es',590100,'1$Tc8scfZR5OU'),(591,'jorgev','Maquinista',700,1200,'26','es',64,'1$Tc8scfZR5OU'),(594,'arnaldov','Arnaldo Vazquez - Jornalero Turno Noche',1024,760,'26','es',524288,'1$Tc8scfZR5OU'),(595,'josebar','Arnaldo Vazquez - Jornalero Turno Noche',1024,760,'26','es',524288,'1$Tc8scfZR5OU'),(596,'joselop','Jose Lopez - Jornalero Turno Noche',1024,760,'26','es',524288,'1$Tc8scfZR5OU'),(597,'rolando','Rolando Claudio Osorio Rodriguez',1024,760,'26','es',524288,'1$Tc8scfZR5OU'),(599,'william','William René Esquivel',800,600,'00','es',67699100,'1$AAvg15zTcqM'),(600,'matiasb','Matias Emanuel Suarez Benitez',800,600,'00','es',67633424,'1$Pdbka1zNUXs'),(601,'lorenzog','Vendedor CDE km 3.5',700,1024,'06','es',2,'1$Tc8scfZR5OU'),(602,'daisi','Auxiliar Caja (San Lorenzo)',1200,700,'24','es',132,'1$Tc8scfZR5OU'),(603,'laurap','Vendedora',700,1024,'01','es',2,'1$Tc8scfZR5OU'),(604,'paulina','Limpiadora',700,1024,'06','es',64,'1$Tc8scfZR5OU'),(605,'franciscag','Muestraria',1024,700,'00','es',13698450,'1$Tc8scfZR5OU'),(606,'sandram','Limpiadora Santa Rita',700,1024,'05','es',64,'1$Tc8scfZR5OU'),(607,'maxima','Limpiadora Terminal',1024,700,'01','es',64,'1$Tc8scfZR5OU'),(608,'gracielad','Limpiadora Obligado',1100,700,'04','es',64,'1$Tc8scfZR5OU'),(609,'said','Vendedor',1200,700,'00','es',8388610,'1$Tc8scfZR5OU'),(610,'marceloj','Vendedor Avenida',1200,700,'02','es',2,'1$gmjlgRIV.Tk'),(611,'aldo','Aldo Anibal Vera Rodriguez',1024,760,'00','es',524288,'1$Tc8scfZR5OU'),(614,'alexic','Vendedor',1024,700,'06','es',2,'1$Tc8scfZR5OU'),(613,'marcosm','Marcos Manuel Figueredo Cabrera',800,600,'00','es',604045584,'1$Tc8scfZR5OU'),(615,'lucioc','Vendedor Mayorista',1024,700,'24','es',4194306,'1$Tc8scfZR5OU'),(616,'mathiasv','Empaquetador Obligado',1350,720,'04','es',128,'1$BXHn8qqxLHA'),(617,'jorgec','Soporte de Venta (Sta Rita)',1024,700,'05','es',6,'1$Tc8scfZR5OU'),(618,'deisyv','Vendedora - Avenida',1024,700,'02','es',2,'1$JFTPycCghPo'),(619,'teresaa','Vendedora Santa Rita',1024,700,'05','es',2,'1$Tc8scfZR5OU'),(623,'karinaa','Soporte Venta',1024,700,'01','es',2,'1$Tc8scfZR5OU'),(621,'arnaldoc','Maquinista - Jornalero',1024,700,'26','es',524288,'1$Tc8scfZR5OU'),(622,'cristiana','Maquinista - Jornalero',1024,700,'26','es',524288,'1$Tc8scfZR5OU'),(628,'gustavoj','Vendedor - San Lorenzo',700,1200,'25','es',2,'1$Tc8scfZR5OU'),(625,'cristians','Almacenamiento',1024,700,'26','es',524304,'1$Tc8scfZR5OU'),(626,'angelinal','Empaquetador (Asunción)',1200,700,'25','es',4,'1$EL3qv7JnY7M'),(627,'lorenac','Auxiliar de Arqueo de Caja',1024,760,'02','es',285345292,'1$qJjXNQ7fqgQ'),(629,'jesusg','Auxiliar Empaque y Caja (Terminal)',1200,700,'01','es',132,'1$Tc8scfZR5OU'),(638,'',NULL,NULL,NULL,NULL,NULL,NULL,'1$Tc8scfZR5OU'),(631,'juanp','Soporte Venta - Avenida',1250,700,'02','es',2,'1$Tc8scfZR5OU'),(632,'micaelag','Auxiliar de Insumos',1200,700,'00','es',13829522,'1$Tc8scfZR5OU'),(635,'Fidel12','Fidel',800,600,'12','es',524304,'1$Tc8scfZR5OU'),(636,'marcosmeaurio','Auxiliar de Cuenta Cliente',1200,700,'03','es',16782728,'1$xVBXv2QMHIc'),(637,'mathiasp','Remisiones',800,600,'00','es',524304,'1$Tc8scfZR5OU'),(639,'CesarV26','Cesar Villalba',1024,760,'26','es',71311492,'1$o29do5JOpjo'),(640,'Lisandro26','Lisandro Isaias Duette Rodriguez',1024,720,'26','es',67108996,'1$.ExL//Xpz3g'),(641,'Fidel26','Fidel',800,600,'26','es',524304,'1$Tc8scfZR5OU'),(642,'derlisg','Jornalero - Reemplazo Edgar Ruiz Diaz',700,1200,'00','es',524304,'1$Tc8scfZR5OU'),(643,'federicof','Auxiliar Empaque',1200,700,'05','es',128,'1$Tc8scfZR5OU'),(644,'Fidel00.03','Fidel',800,600,'00.03','es',524304,'1$Tc8scfZR5OU'),(645,'TonyG00.03','Antonio Godoy',800,600,'08','es',590096,'1$Tc8scfZR5OU'),(646,'Fidel11','Fidel',800,600,'11','es',524304,'1$Tc8scfZR5OU'),(647,'Fidel08','Fidel',800,600,'08','es',524304,'1$Tc8scfZR5OU'),(648,'mariao','Caja - Terminal',700,1200,'01','es',4,'1$Tc8scfZR5OU'),(649,'emilce','Auxiliar de Cuenta Cliente',1200,850,'03','es',16782728,'1$zqwDkJz6E1I'),(650,'richardg','Empaque (San Lorenzo)',700,1200,'24','es',128,'1$Tc8scfZR5OU'),(651,'manuel','Manuel Aranda',800,600,'00','es',67699100,'1$Tc8scfZR5OU'),(652,'antonioq','Empaquetador (Asunción)',1200,700,'25','es',128,'1$Tc8scfZR5OU'),(653,'camilad','Caja Terminal',1200,700,'01','es',4,'1$Tc8scfZR5OU'),(654,'lourdesl','Lambare',800,600,'30','es',8192,'1$Tc8scfZR5OU'),(655,'angelicav','Caja Lambare',1200,700,'30','es',4,'1$Tc8scfZR5OU');

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
