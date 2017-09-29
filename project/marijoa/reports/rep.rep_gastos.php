<?php
$Obj->name = "rep_gastos";
$Obj->alias = "Reporte de Gastos";
$Obj->ndoc = "Reporte de Gastos";
$Obj->help = "Reporte de Gastos";
$Obj->query = "'SELECT cjc_cod AS CODIGO, upper(cjc_descri) AS DESCRIPCION, cjc_tipo AS TIPO FROM  caja_con WHERE cjc_cod NOT LIKE |{%-%}| and cjc_cod like '+el['con']+'  AND cjc_gasto = |{Si}| '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
