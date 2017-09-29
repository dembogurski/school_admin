<?php
/** project/marijoa/reports/rep.inv_diff_suc.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "inv_diff_suc";
$Obj->alias = "Diferencias en Sucursales x Inventario";
$Obj->ndoc = "Diferencias en Sucursales x Inventario";
$Obj->help = "Diferencias en Sucursales x Inventario";
$Obj->query = "'SELECT codigo AS CODIGO, suc_p AS SUC_P, suc_s AS SUC_S, hits AS HITS, usuario AS USUARIO, fecha_hora AS FECHA_HORA   FROM inv_control WHERE suc_p = '+el['suc_']+' AND suc_s <> '+el['suc_']+' '";
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
