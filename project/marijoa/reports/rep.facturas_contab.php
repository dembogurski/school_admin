<?php
$Obj->name = "facturas_contab";
$Obj->alias = "Reporte de Facturas Impresas";
$Obj->ndoc = "Reporte de Facturas Impresas";
$Obj->help = "Reporte de Facturas Impresas";
$Obj->query = "'SELECT c.f_suc AS SUC,c.f_nro AS FACTURA,c.f_ref AS REF, DATE_FORMAT(c.f_fecha,|{%d-%m-%Y}|) AS FECHA, f.fact_total AS TOTAL,c.f_total as TOTAL_FACT, upper(f.fact_nom_cli)  as CLIENTE, c.f_tipo AS TIPO   FROM factura f,fact_cont c WHERE f.fact_nro = c.f_ref AND f.fact_estado = |{Cerrada}|  AND f.fact_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+' AND c.f_estado = |{Cerrada}| and c.f_suc like '+el[rep_localidad]+' AND c.f_tipo LIKE '+el[rep_cont_cred]+' and c.f_nro between '+el[r1]+' and '+el[r2]+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
