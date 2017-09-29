<?php
$Obj->name = "vent_group_val";
$Obj->alias = "Reporte de Ventas Agrupadas por Cliente";
$Obj->ndoc = "Reporte de Ventas Agrupadas por Cliente Ordenada por Valor";
$Obj->help = "Reporte de Ventas Agrupadas por Cliente";
$Obj->query = "'SELECT f.fact_nom_cli as CLIENTE,SUM(d.df_cantidad) AS CANT_METROS,SUM(d.df_subtotal) AS TOTAL, COUNT(*) AS CANT_ITEMS  FROM  factura f, det_factura d   WHERE f.fact_nro = d.df_fact_num AND f.fact_cli_cat like '+el['cli_cat']+' AND f.fact_fecha BETWEEN '+el['desde']+'  AND '+el['hasta']+'  and f.fact_localidad like '+el['suc']+' and f.fact_nom_cli like '+el['cli_fullname']+' GROUP BY CLIENTE ORDER BY  CANT_METROS DESC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL,ITEMS,METROS";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
