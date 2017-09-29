<?php
$Obj->name = "fact_legal";
$Obj->alias = "Reporte de Facturas Legales";
$Obj->ndoc = "Reporte de Facturas Legales";
$Obj->help = "Genera un Reporte de Facturas Legales en un rango de fecha";
$Obj->query = "'SELECT fact_localidad AS SUC, fact_nro AS Nro,f_pdv AS PE,f_nro AS Factura, fact_fecha AS FECHA, fact_cli_ci AS RUC, UPPER(fact_nom_cli) AS CLIENTE,|{Contado}| AS TIPO,fact_total AS TOTAL FROM factura f, fact_cont c WHERE f.fact_nro = c.f_ref AND f.fact_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+'  AND fact_estado = |{Cerrada}| AND NOT EXISTS (SELECT * FROM cuotas WHERE ct_ref = fact_nro) ORDER BY SUC  LIMIT 100000'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
