<?php
$Obj->name = "comsion_vacias";
$Obj->alias = "Facturas Sin Comision";
$Obj->ndoc = "Facturas Sin Comision";
$Obj->help = "Facturas Sin Comision";
$Obj->query = "'SELECT id, fact_comi_vend, fact_estado_com,fact_estado,fact_fecha, fact_total, fact_nro as FACTURA FROM  factura  WHERE fact_estado = |{Cerrada}| AND fact_estado_com = |{false}| AND fact_comi_vend < 0.1 '";
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
