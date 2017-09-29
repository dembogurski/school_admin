<?php
/** project/marijoa/reports/rep.det_comp_fgt.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "det_comp_fgt";
$Obj->alias = "Detalle de Productos x Sector Grupo Tipo y Color";
$Obj->ndoc = "Detalle de Productos x Sector Grupo Tipo y Color";
$Obj->help = "Detalle de Productos x Sector Grupo Tipo y Color";
$Obj->query = "'SELECT p_cod AS CODIGO, p_fam AS FAMILIA, p_grupo AS GRUPO, p_tipo AS TIPO,p_color as COLOR,p_compra,p_valmin,p_precio_1,p_precio_2,p_precio_3,p_precio_4,p_precio_5,p_precio_6,p_precio_7, p_cant as CANT, p_local as SUC FROM mnt_prod WHERE p_cod LIKE '+el['codigo']+' AND p_ref LIKE '+el['ref']+'  AND p_fam LIKE '+el['familia']+'  AND p_grupo LIKE '+el['grupo']+'  AND p_tipo LIKE '+el['tipo']+'   AND p_color LIKE '+el['color']+' AND prod_fin_pieza <> |{Si}| AND p_cant > 0 '";
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
