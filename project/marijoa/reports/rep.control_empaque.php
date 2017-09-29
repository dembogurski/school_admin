<?php
/** project/marijoa/reports/rep.control_empaque.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "control_empaque";
$Obj->alias = "Reporte de Control de Empaque";
$Obj->ndoc = "Reporte de Control de Empaque";
$Obj->help = "Reporte de Control de Empaque";
$Obj->query = "'SELECT count(*) AS CANT_FACTURAS FROM factura f WHERE f.fact_fecha BETWEEN '+el['desde']+' AND '+el['hasta']+'  AND fact_estado = |{Cerrada}| AND fact_localidad = '+el['suc']+''";
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
