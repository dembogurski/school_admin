<?php
$Obj->name = "pagares_pagados";
$Obj->alias = "Reporte de Pagares Pagados";
$Obj->ndoc = "Reporte de Pagares Pagados";
$Obj->help = "Reporte de Pagares Pagados";
$Obj->query = "'select id as ID, pg_nro as Nro, DATE_FORMAT(pg_fecha ,|{%d-%m-%Y}|)   as VENCIMIENTO, pg_benef as PROVEEDOR, pg_monto as MONTO, pg_estado as ESTADO, detalle as DETALLE  from pagares_propios where pg_fecha between '+el['desde']+' and '+el['hasta']+' and pg_benef like '+el['prov_nombre']+''";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MONTO";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
