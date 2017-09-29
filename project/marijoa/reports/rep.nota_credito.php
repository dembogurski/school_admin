<?php
$Obj->name = "nota_credito";
$Obj->alias = "Nota de Crédito";
$Obj->doc = "Nota de Crédito";
$Obj->help = "Nota de Crédito";
$Obj->query = "'select id as Nro, dv_nomcli as CLIENTE, dv_hoy as FECHA, monto_dev as VALOR, fact_nro as FACTURA  FROM devoluciones order by id desc limit 1'";
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
