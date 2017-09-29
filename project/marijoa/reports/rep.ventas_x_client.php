<?php
/** project/marijoa/reports/rep.ventas_x_client.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "ventas_x_client";
$Obj->alias = "Reporte de Ventas por cliente";
$Obj->ndoc = "Reporte de Ventas por cliente";
$Obj->help = "Reporte de Ventas por cliente";
$Obj->query = "'select fact_cli_ci as RUC, f.fact_nom_cli AS CLIENTE, f.fact_nro  as NRO, DATE_FORMAT(f.fact_fecha,|{%d-%m-%Y}|) as FECHA, fact_vend_cod AS VENDEDOR,fact_localidad as SUC, d.df_precio as PRECIO,  p.p_fam as FAMILIA, p.p_grupo as GRUPO,p.p_tipo as TIPO,d.df_cantidad as CANTIDAD, d.df_subtotal as SUBTOTAL   from factura f, det_factura d,mnt_prod p where f.fact_fecha BETWEEN '+el[desde]+' and '+el[hasta]+' and f.fact_cli_cat like '+el['cli_cat']+' and f.fact_nom_cli like '+el['cli_fullname']+' AND f.fact_nro = d.df_fact_num and fact_localidad like '+el['suc']+' and  d.df_cod_prod = p.p_cod and p.p_tipo like  '+el[p_tipo]+' and p.p_grupo like '+el[p_grupo]+' ORDER BY f.fact_nom_cli, f.fact_total desc;'";
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
