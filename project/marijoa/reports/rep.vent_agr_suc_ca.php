<?php
$Obj->name = "vent_agr_suc_ca";
$Obj->alias = "Reporte de Ventas Agrupado por Sucursales y Categoria";
$Obj->ndoc = "Reporte de Ventas Agrupado por Sucursales y Categoria";
$Obj->help = "Reporte de Ventas Agrupado por Sucursales y Categoria";
$Obj->query = "'SELECT  f.fact_localidad AS SUC,f.fact_vend_cod  AS VENDEDOR, f.fact_cli_cat AS CAT,sum(d.df_cantidad) AS VTAS_MTS,sum(d.df_subtotal) AS VTAS_GS  FROM factura f, det_factura d  WHERE f.fact_nro = d.df_fact_num  AND (d.df_cod_prod <> 1000 AND d.df_cod_prod <> 1001 and df_cod_prod <> |{000}|  and df_cod_prod <> |{1002}| )  AND f.fact_fecha   BETWEEN '+el[desde]+' AND '+el[hasta]+' AND f.fact_estado = |{Cerrada}| AND f.fact_localidad LIKE '+el['empr']+'    GROUP BY    SUC, VENDEDOR, CAT  ORDER BY SUC ASC,VENDEDOR ASC,CAT ASC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "old['VENDEDOR']!=el['VENDEDOR']";
$Obj->subtotal = "VTAS_MTS,VTAS_GS";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "VTAS_MTS,VTAS_GS";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
