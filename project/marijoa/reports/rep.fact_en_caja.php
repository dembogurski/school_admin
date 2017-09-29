<?php
/** project/marijoa/reports/rep.fact_en_caja.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "fact_en_caja";
$Obj->alias = "Facturas en Caja";
$Obj->ndoc = "Facturas en Caja";
$Obj->help = "Facturas en Caja";
$Obj->query = "'SELECT fact_nro AS Factura,fact_cli_ci AS RUC, cli_ci as _RUC,fact_cli_cat AS CAT,cli_cat as _CAT,fact_nom_cli AS CLIENTE,cli_fullname as _CLIENTE,fact_estado, DATE_FORMAT(fact_fecha,|{%d-%m-%Y}|) AS Fecha,fact_vend_cod AS Vendedor,fact_empaque AS Empaque,fact_total AS Total, if((fact_cli_ci <> cli_ci or fact_cli_cat <> cli_cat or fact_nom_cli <> cli_fullname),|{err}|,|{ok}|) as verif  FROM factura left join mnt_cli on fact_cli_ci = cli_ci WHERE fact_localidad = '+el[__local]+' AND fact_estado = |{En_caja}|'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "";
$Obj->cond_tot = "endConsult";
$Obj->total = "Total";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
