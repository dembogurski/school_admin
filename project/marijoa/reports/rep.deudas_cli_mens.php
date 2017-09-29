<?php
/** project/marijoa/reports/rep.deudas_cli_mens.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "deudas_cli_mens";
$Obj->alias = "Reporte Cuentas Pendientes de Clientes";
$Obj->ndoc = "Reporte Cuentas Pendientes de Clientes";
$Obj->help = "Reporte Cuentas Pendientes de Clientes";
$Obj->query = "'SELECT DISTINCT DATE_FORMAT(ct_fecha_venc,|{%m-%Y}|) AS MES  FROM cuotas  WHERE ct_estado = |{Pendiente}| AND ct_fecha_venc BETWEEN '+el[fecha]+' AND '+el[fecha_a]+' and __local LIKE '+el[suc]+'  ORDER BY ct_fecha_venc  ASC '";
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
