<?php
/** project/marijoa/reports/rep.prod_undef.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "prod_undef";
$Obj->alias = "Reporte de Productos Indefinidos";
$Obj->ndoc = "Reporte de Productos Indefinidos";
$Obj->help = "Reporte de Productos Indefinidos";
$Obj->query = "'select f.func_nombre as VENDEDOR, DATE_FORMAT( f.fact_fecha,|{%d-%m-%Y}|)  as FECHA, f.fact_nom_cli as CLIENTE, d.df_fact_num as FACTURA,d.df_descrip as DESCRIP, d.df_cantidad as CANTIDAD,d.df_precio AS PRECIO, d.df_subtotal as SUBTOTAL  FROM factura f, det_factura d WHERE f.fact_localidad like '+el[p_local]+' and  f.fact_fecha BETWEEN '+el[desde]+' and '+el[hasta]+' and f.fact_estado = |{Cerrada}| and d.df_cod_prod = |{000}| and f.fact_nro = d.df_fact_num'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "SUBTOTAL,CANTIDAD";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
