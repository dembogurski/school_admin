<?php
/** project/marijoa/reports/rep.ventas_x_cli.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "ventas_x_cli";
$Obj->alias = "Ventas de Cliente";
$Obj->ndoc = "Ventas de Cliente";
$Obj->help = "Ventas de Cliente";
$Obj->query = "'SELECT fact_nro FACT_NRO, DATE_FORMAT(f.fact_fecha,|{%d-%m-%Y}|) AS FECHA,f.fact_localidad AS SUC, f.fact_cli_ci AS CI_RUC, f.fact_nom_cli AS CLIENTE,f.fact_cli_cat AS CAT, f.fact_vend_cod AS VENDEDOR, fact_total AS TOTAL FROM factura f WHERE f.fact_cli_ci like '+el['cli_ci']+' and f.fact_estado = |{Cerrada}| '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
