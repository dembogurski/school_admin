<?php
/** project/marijoa/reports/rep.caja_con.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "caja_con";
$Obj->alias = "Conceptos de Caja";
$Obj->ndoc = "Conceptos de Caja";
$Obj->help = "Conceptos de Caja";
$Obj->query = "'SELECT cjc_cod AS CODIGO, cjc_descri AS DESCRIPCION, cjc_tipo AS TIPO FROM  caja_con WHERE cjc_cod NOT LIKE |{%-%}|'";
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
