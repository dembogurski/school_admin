<?php
/** project/marijoa/reports/rep.ajustes_entrada.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "ajustes_entrada";
$Obj->alias = "Ajustes de Entrada";
$Obj->ndoc = "Ajustes de Entrada";
$Obj->help = "Ajustes de Entrada";
$Obj->query = "'SELECT p_cod as codigo, p_cant as Metros,prod_fin_pieza as Estado,p_ancho as Ancho,p_kg as Kg, p_tara as Tara,p_gram as Gramaje  FROM mnt_prod WHERE   p_cod =  trim('+el['f_cod']+') or p_padre = trim('+el['f_cod']+')'";
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
