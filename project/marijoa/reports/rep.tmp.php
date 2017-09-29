<?php
$Obj->name = "tmp";
$Obj->alias = "Reporte de Uso Temporal";
$Obj->ndoc = "Reporte de Uso Temporal";
$Obj->help = "Reporte de Uso Temporal";
$Obj->query = "'select id, substring(ctd_compl,29,6) as FACTURAS, ctd_compl as COMPLEMENTO from bcos_ctas_det where ctd_compl like |{Factura venta Credito Nro.:%}| and ctd_compl NOT LIKE |{%[%}| order by id asc   '";
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
