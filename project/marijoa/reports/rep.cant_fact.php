<?php
/** project/marijoa/reports/rep.cant_fact.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "cant_fact";
$Obj->alias = "Calcula Cantidad de Facturas por Dia";
$Obj->ndoc = "Calcula Cantidad de Facturas por Dia";
$Obj->help = "Calcula Cantidad de Facturas por Dia";
$Obj->query = "'SELECT DISTINCT DATE_FORMAT(fact_fecha,|{%d-%m-%Y}|) as fact_fecha, contar_facturas(fact_fecha) AS CANT FROM factura WHERE fact_fecha  BETWEEN '+el['desdeinv']+' AND '+el['hastainv']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
