<?php
/** project/marijoa/reports/rep.multiuso.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "multiuso";
$Obj->alias = "Reporte Multi Uso";
$Obj->ndoc = "Reporte Multi Uso";
$Obj->help = "Reporte Multi Uso";
$Obj->query = "'SELECT DISTINCT p_ref,|{a}|,|{b}|,|{c}| FROM mnt_prod where prod_fin_pieza != |{Si}| AND p_cant > 0 and p_local <> |{11}| and (p_gram is null or p_gram <= 0)  order by p_ref asc LIMIT  200000'";
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
