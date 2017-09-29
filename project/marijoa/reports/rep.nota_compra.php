<?php
/** project/marijoa/reports/rep.nota_compra.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "nota_compra";
$Obj->alias = "Reporte de Notas de Compra";
$Obj->ndoc = "Reporte de Notas de Compra";
$Obj->help = "Reporte de Notas de Compra";
$Obj->query = "'SELECT  pr AS PROVEEDOR,DATE_FORMAT(fecha_ped,|{%d-%m-%Y}|) AS FECHA_PEDIDO, DATE_FORMAT(fecha_prev,|{%d-%m-%Y}|)   AS FECHA_PREVISTA,nom_in_prov AS NOMBRE_EN_EL_PROV,grupo AS GRUPO,tipo AS TIPO,color AS COLOR,precio AS PRECIO,mts AS MTs, obs AS OBS  FROM nota_compra WHERE pr like '+el[pr]+' and fecha_ped between '+el[desde]+' and '+el[hasta]+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MTs";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
