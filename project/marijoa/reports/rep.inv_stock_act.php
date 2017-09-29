<?php
/** project/marijoa/reports/rep.inv_stock_act.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "inv_stock_act";
$Obj->alias = "Inventario de Stock Actual";
$Obj->ndoc = "Inventario de Stock Actual";
$Obj->help = "Inventario de Stock Actual";
$Obj->query = "'SELECT p_cod AS CODIGO,p_fam AS FAMILIA,p_grupo AS GRUPO, p_tipo AS TIPO,p_color AS COLOR,p_cant AS CANT,(((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1) * p_cant  AS P_COMPRA, p_compra * p_cant as COSTO_FOB  FROM mnt_prod p  WHERE p.p_local = '+el['suc_']+' AND prod_fin_pieza <> |{Si}| AND p_cant > 0 ORDER BY FAMILIA ASC , GRUPO ASC, TIPO ASC, COLOR ASC '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
