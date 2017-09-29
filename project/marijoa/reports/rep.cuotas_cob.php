<?php
$Obj->name = "cuotas_cob";
$Obj->alias = "Reporte de cuotas a cobrar";
$Obj->ndoc = "Reporte de cuotas a cobrar";
$Obj->help = "Reporte de cuotas a cobrar";
$Obj->query = "'select distinct(id), ct_ref AS FACTURA, ct_fecha_venc as VENCIMIENTO, ct_monto as MONTO, ct_estado as ESTADO,ct_deudor as DEUDOR, ct_descuento as DESCUENTO, ct_total as TOTAL FROM cuotas where ct_estado like '+el[estado]+' and ct_deudor like '+el[deudor]+' and __local like '+el[__local]+' and ct_fecha_venc BETWEEN '+el['desdeinv']+' AND '+el['hastainv']+'' ";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
