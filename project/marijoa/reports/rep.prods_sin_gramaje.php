<?php
/** project/marijoa/reports/rep.prods_gramados.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "prods_gramados";
$Obj->alias = "Reporte de Productos Sin Gramaje";
$Obj->ndoc = "Reporte de Productos Sin Gramaje";
$Obj->help = "Reporte de Productos Sin Gramaje";
$Obj->query = "'SELECT p_cod,p_fam,p_grupo,p_tipo,p_color,p_cant,p_ancho,p_gram  FROM mnt_prod WHERE p_local = '+el['rep_localidad']+' AND (p_gram IS NULL OR p_gram = 0) AND p_cant > 0 AND prod_fin_pieza <> |{Si}|  ORDER BY p_fam,p_grupo,p_tipo,p_color '";
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
