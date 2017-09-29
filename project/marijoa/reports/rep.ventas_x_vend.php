<?php
/** project/marijoa/reports/rep.ventas_x_client.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "ventas_x_client";
$Obj->alias = "Reporte de Ventas por Vendedor";
$Obj->ndoc = "Reporte de Ventas por Vendedor";
$Obj->help = "Reporte de Ventas por Vendedor";
$Obj->query = "'SELECT  f.fact_nro  AS NRO, DATE_FORMAT(f.fact_fecha,|{%d-%m-%Y}|) AS FECHA ,fact_nom_cli as CLIENTE,fact_cli_cat AS CAT,d.df_cod_prod AS CODIGO, d.df_precio AS PRECIO, p.p_grupo AS GRUPO,p.p_tipo AS TIPO,d.df_cantidad AS CANTIDAD, d.df_subtotal AS SUBTOTAL FROM factura f, det_factura d,mnt_prod p WHERE f.fact_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+'  AND f.fact_vend_cod LIKE '+el['__user']+' AND f.fact_cli_cat like '+el['cli_cat']+'  AND f.fact_nro = d.df_fact_num AND   f.fact_estado = |{Cerrada}| and  d.df_cod_prod = p.p_cod AND  p.p_grupo LIKE '+el[p_grupo]+'  AND p.p_tipo LIKE  '+el[p_tipo]+' ORDER BY f.fact_nro ASC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "(el['GRUPO']!=old['GRUPO'])||(el['TIPO']!=old['TIPO'])";
$Obj->subtotal = "CANTIDAD,SUBTOTAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "true";
$Obj->total = "CANTIDAD,SUBTOTAL";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
