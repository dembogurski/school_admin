<?php
/** project/marijoa/reports/rep.packing_list.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "packing_list";
$Obj->alias = "Packing List";
$Obj->ndoc = "Packing List";
$Obj->help = "Packing List";
$Obj->query = "'SELECT id, p_design ,p_mar ,p_bag ,p_precio ,p_color_desc ,p_each_quty ,p_unit ,p_cod ,p_color ,p_qty_ticket ,p_kg_real ,p_ancho ,p_gram ,p_foto , p_obs FROM  packing_list p WHERE  p.pack_ref ='+el['c_ref']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "1";
$Obj->cond_sub = "old['p_design']!=el['p_design'] || old['p_mar']!=el['p_mar']  ";
$Obj->subtotal = "p_each_quty,p_qty_ticket";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
