<?php
/** project/marijoa/reports/rep.ventas_anuladas.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "ventas_anuladas";
$Obj->alias = "Ventas Anuladas";
$Obj->ndoc = "Ventas Anuladas de Forma Automatica";
$Obj->help = "Ventas Anuladas de Forma Automatica";
$Obj->query = "'SELECT fact_nro AS FACTURA,fact_vend_cod AS VENDEDOR,fact_cli_ci AS CI_RUC,fact_nom_cli AS CLIENTE,fact_cli_cat AS CAT,fact_estado AS ESTADO,date_format(fact_fecha,|{%d-%m-%Y}|) AS FECHA,df_cod_prod AS CODIGO,df_cantidad as CANT,d.df_descrip AS DESCRIP,d.df_precio AS PRECIO,d.df_subtotal AS SUBTOTAL FROM factura f, det_factura d WHERE f.fact_estado = |{Anulada}| AND fact_localidad = '+el['__suc']+'AND f.fact_nro = d.df_fact_num AND f.fact_fecha BETWEEN '+el['desde']+' AND '+el['hasta']+' and fact_vend_cod like '+el['vendedor']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "el['FACTURA']!=old['FACTURA']";
$Obj->subtotal = "SUBTOTAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
