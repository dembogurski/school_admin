<?php
/** project/marijoa/reports/rep.estad_vent_clia.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "estad_vent_clia";
$Obj->alias = "Estadistica de Ventas de Clientes Por Año";
$Obj->ndoc = "Estadistica de Ventas de Clientes Por Año";
$Obj->help = "Estadistica de Ventas de Clientes Por Año";
$Obj->query = "'select distinct  cli_ci as CI_RUC,  cli_fullname AS NOMBRE, cli_tel1 as TEL from mnt_cli where cli_ci <> 1 and cli_fullname like '+el['cli_fullname']+' order by cli_fullname asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
