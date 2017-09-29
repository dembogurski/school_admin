<?php
$Obj->name = "vent_discr_may";
$Obj->alias = "Reporte de Ventas Discriminadas / Mayoristas ";
$Obj->ndoc = "Reporte de Ventas Discriminadas / Mayoristas ";
$Obj->help = "Reporte de Ventas Discriminadas / Mayoristas ";
$Obj->query = "'SELECT f.fact_nro AS NRO,f.fact_nom_cli AS CLIENTE, f.fact_cli_ci AS RUC, f.fact_cli_cat AS CAT,date_format(f.fact_fecha,|{%d-%m-%Y}|)AS FECHA, f.fact_vend_cod AS VENDEDOR, a.x1_ AS TIPO  FROM factura f, _audit_log_ a WHERE f.fact_nro = a.x0_ AND a.x1_ LIKE '+el[tipo]+' AND f.fact_fecha BETWEEN '+el['desde']+' AND '+el['hasta']+' AND f.fact_estado = |{Cerrada}| AND f.fact_localidad LIKE '+el['empr']+' AND accion LIKE |{VENT_DISCR}|  ORDER BY f.fact_nro ASC, f.fact_nom_cli ASC '";
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
