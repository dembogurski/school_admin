<?php
/** project/marijoa/reports/rep.vent_agrup_cat.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "vent_agrup_cat";
$Obj->alias = "Reporte de Ventas Agrupadas x Categoria";
$Obj->ndoc = "Reporte de Ventas Agrupadas x Categoria";
$Obj->help = "Reporte de Ventas Agrupadas x Categoria";
$Obj->query = "'SELECT  f.fact_localidad AS SUC, f.fact_cli_cat AS CAT  ,sum(d.df_cantidad) AS METROS,sum(d.df_subtotal) AS VENTAS,round( sum(  (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad),2) AS COSTO,round( sum( (d.df_subtotal) - (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad),2) AS MARGEN   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '+el['rep_localidad']+'  AND f.fact_fecha BETWEEN '+el['desdeinv']+' AND '+el['hastainv']+'  AND f. fact_estado = |{Cerrada}|  GROUP BY SUC,CAT ORDER BY SUC ASC ,CAT ASC, MARGEN DESC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['SUC']!=old['SUC']";
$Obj->subtotal = "METROS,VENTAS,COSTO,MARGEN";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
