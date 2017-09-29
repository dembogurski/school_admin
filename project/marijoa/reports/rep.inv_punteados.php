<?php
/** project/marijoa/reports/rep.inv_punteados.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "inv_punteados";
$Obj->alias = "Reporte de Productos Punteados en Inventario ";
$Obj->ndoc = "Reporte de Productos Punteados en Inventario ";
$Obj->help = "Reporte de Productos Punteados en Inventario ";
$Obj->query = "'SELECT p_cod AS CODIGO,suc_p AS SUC_P, suc_s AS SUC_S, hits AS HITS,p_fam AS FAMILIA, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR, p_cant AS STOCK, round(p_compra * p_cant,2) AS COSTO_FOB, (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1) * p_cant   AS COSTO_CIF   FROM mnt_prod p, inv_control i   WHERE p.p_cod = i.codigo AND  suc_p = '+el['suc_']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "COSTO_CIF,COSTO_FOB,STOCK";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
