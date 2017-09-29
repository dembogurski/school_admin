<?php
$Obj->name = "rep_mov_caja_pers";
$Obj->alias = "Reporte Control de Facturas contra Caja";
$Obj->ndoc = "Reporte de Movimientos de caja";
$Obj->help = "Reporte de Movimientos de caja";
$Obj->query = "'SELECT fact_nro as FACTURA, fact_total AS TOTAL,SUM(cm_entrada_ref - cm_salida_ref) AS E_S FROM factura f, caja_mov m WHERE  m.cm_compl LIKE CONCAT(|{%}|,fact_nro) AND  fact_fecha = '+el[fecha]+'  AND fact_fecha = cm_fecha AND fact_localidad = '+el[empr]+' AND fact_tipo = |{Contado}| GROUP BY fact_nro '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "E_REF,S_REF";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
