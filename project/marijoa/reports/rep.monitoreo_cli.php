<?php
/** project/marijoa/reports/rep.monitoreo_cli.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "monitoreo_cli";
$Obj->alias = "Monitoreo de Clientes";
$Obj->ndoc = "Monitoreo de Clientes";
$Obj->help = "Monitoreo de Clientes";
$Obj->query = "'SELECT DATE_FORMAT(fact_fecha,|{%m-%Y}|) AS MES,cli_fullname as CLIENTE,cli_ci AS CI, cli_cat as CAT, sum(df_cantidad) as MTS, sum(df_subtotal) as Z_MONTO, count(*) as CANT, |{1}| AS VECES FROM VENTAS_A_CLIENTES where fact_fecha BETWEEN '+el['desde']+' and '+el['hasta']+' and cli_cat = '+el['cli_cat']+' and  fact_localidad like '+el['suc']+' and cli_fullname like '+el['cli_fullname']+' and cli_ci <> |{1}| GROUP BY cli_ci, MES order by cli_fullname asc,MES asc  '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "old['CI'] != el['CI']";
$Obj->subtotal = "VECES,MTS,CANT";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
