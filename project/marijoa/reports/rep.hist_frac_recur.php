<?php
/** project/marijoa/reports/rep.hist_frac_recur.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "hist_frac_recur";
$Obj->alias = "Historial de Fraccionamientos Recursivo";
$Obj->ndoc = "Historial de Fraccionamientos Recursivo";
$Obj->help = "Historial de Fraccionamientos Recursivo";
$Obj->query = "'select p_cod, p_cant_compra,p_cant,prod_fin_pieza from mnt_prod where p_cod = '+el['cod_prod']+' ' ";
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
