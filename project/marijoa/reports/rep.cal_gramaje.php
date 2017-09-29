<?php
/** project/marijoa/reports/rep.cal_gramaje.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "cal_gramaje";
$Obj->alias = "Calculos de Gramajes";
$Obj->ndoc = "Calculos de Gramajes";
$Obj->help = "Calculos de Gramajes";
$Obj->query = "'SELECT p_cod,  p_padre, p_cant, p_cant_compra,p_gram,p_gram_m , p_ancho, p_kg FROM mnt_prod WHERE p_cod = '+el[codigo]+'  OR p_padre = '+el[codigo]+' '";
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
