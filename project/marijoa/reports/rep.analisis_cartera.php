<?php
/** project/marijoa/reports/rep.rep_calif_prod.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "analisis_cartera";
$Obj->alias = "Analisis de Cartera de Productos";
$Obj->ndoc = "Analisis de Cartera de Productos";
$Obj->help = "Analisis de Cartera de Productos";
$Obj->query = "'SELECT p_tipo AS TIPO, margen AS MARGEN, subtotal AS SUBTOTAL, metros AS METROS, precio_v AS PRECIO_V, precio_c AS PRECIO_C, porc AS PORC FROM tmp_calif_prod ORDER BY PORC DESC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MARGEN,SUBTOTAL,METROS,PRECIO_V,PRECIO_C";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
