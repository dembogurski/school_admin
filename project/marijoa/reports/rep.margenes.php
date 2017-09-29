<?php
/** project/marijoa/reports/rep.margenes.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "margenes";
$Obj->alias = "Reporte de Margenes y Totales";
$Obj->ndoc = "Reporte de Margenes y Totales";
$Obj->help = "Reporte de Margenes y Totales";
$Obj->query = "'select id as ID, DATE_FORMAT(fecha,|{%d-%m-%Y}|)  AS FECHA, suc AS SUC, cant_fact AS CANT, suma_totales AS TOTALES, suma_margenes  AS MARGEN from margen_x_fecha where suc like '+el['rep_localidad']+' and  fecha BETWEEN '+el['desdeinv']+' and '+el['hastainv']+' order by SUC asc ,FECHA  asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT,TOTALES,MARGEN";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
