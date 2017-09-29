<?php
$Obj->name = "cuotas_de_convs";
$Obj->alias = "Cuotas de Ventas con convenios";
$Obj->ndoc = "Cuotas de Ventas con convenios";
$Obj->help = "Cuotas de Ventas con convenios";
$Obj->query = "'select ct_ref as FACTURA, ct_nro AS NRO_CUOTA, factura.fact_nro_orden as NRO_ORDEN , date_format(ct_fecha_venc,|{%d-%m-%Y}|) AS  FECHA_VENC ,ct_monto as MONTO, ct_descuento as DESCUENTO, ct_total as TOTAL ,ct_estado as ESTADO FROM factura, cuotas_conv where ct_fecha_venc BETWEEN '+el['desdeinv']+' and '+el['hastainv']+' and ct_conv = '+el['convenios']+'and ct_estado = |{Pendiente}| AND factura.fact_nro = cuotas_conv.ct_ref'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MONTO,TOTAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
