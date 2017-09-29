<?php
$Obj->name = "orden_pago";
$Obj->alias = "Orden de Pago";
$Obj->ndoc = "Orden de Pago";
$Obj->help = "Orden de Pago";
$Obj->query = "'SELECT o_ref AS NRO,o_benef AS BENEF,o_ci AS RUC,DATE_FORMAT(o_fecha,|{%d-%m-%Y}|) AS FECHA, o_chq AS CHEQUE,o_bco AS BANCO,o_conc AS CONCEPTO,o_cta AS CTA, o_moneda AS MONEDA, o_monto AS MONTO FROM  orden_pago   WHERE o_chq = '+el['chq_num']+' '";
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
