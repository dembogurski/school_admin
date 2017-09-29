<?php
/** project/marijoa/reports/rep.prods_similares.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "prods_similares";
$Obj->alias = "Productos Similares";
$Obj->ndoc = "Productos Similares";
$Obj->help = "Productos Similares";
$Obj->query = "'SELECT p_cod as CODIGO, p_fam AS FAMILIA,p_grupo as GRUPO, p_tipo AS TIPO, p_color AS COLOR, p_local AS SUC FROM productos  WHERE p_cod = '+el['lcod']+''";
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
