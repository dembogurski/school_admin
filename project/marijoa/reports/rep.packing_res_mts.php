<?php
/** project/marijoa/reports/rep.packing_list.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "packing_res_mts";
$Obj->alias = "Packing List";
$Obj->ndoc = "Packing List";
$Obj->help = "Packing List";
$Obj->query = "'SELECT p_mar AS Mar,c.p_cod AS Codigo,c.p_fam AS Sector,c.p_grupo AS Grupo,c.p_tipo AS tipo,c.p_color AS Color, c.p_cant_compra AS Cant_compra, p.p_precio AS Precio_x_UM, c.p_compra AS P_Compra_Gs, c.p_porc_recargo AS Por_Rec,p_unit AS UM, p.p_each_quty AS Each_Quty, p.p_qty_ticket AS Quty_Ticket,p.p_kg_real AS KG, p.p_ancho AS Ancho, p.p_gram AS Gramaje,p.p_equiv AS Equiv, p.p_mts AS Metros FROM packing_list p, mnt_prod c WHERE p.pack_ref = c.p_ref AND p.p_cod = c.p_cod AND pack_ref = '+el['c_ref']+'  ORDER BY p_unit ASC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "1";
$Obj->cond_sub = "old['Mar']!=el['Mar'] ||  old['UM']!=el['UM']";
$Obj->subtotal = "Metros";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
