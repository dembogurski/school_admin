<?php
$Obj->name = "pedido_int_resu";
$Obj->alias = "Resumen Nota de Compra Internacional";
$Obj->ndoc = "Resumen Nota de Compra Internacional";
$Obj->help = "Resumen Nota de Compra Internacional";
$Obj->query = "'SELECT id,sector,p_grupo,p_tipo,SUM(p_cant) AS Cant, SUM(cant_pond) AS Cant_Pond ,SUM(cant_comp)  AS Cant_comp, store_number ,p_compra,obs FROM pedido_int_det WHERE nro_pedido_int = '+el['nro_pedido_int']+' GROUP BY sector,p_grupo,p_tipo  '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "Cant,Cant_Pond , Cant_comp";
$Obj->dec_sub = "1";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
