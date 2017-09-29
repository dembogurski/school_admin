<?php
$Obj->name = "cuotas_convenio";
$Obj->alias = "Reporte de Ventas con Convenios (Cuotas)";
$Obj->doc = "Reporte de Ventas con Convenios (Cuotas)";
$Obj->help = "Reporte de Ventas con Convenios (Cuotas)";
$Obj->query = "'select c.ct_ref as FACTURA, c.ct_nro as Nro_CUOTA, c.ct_fecha_venc as FECHA_VENC, c.ct_monto AS MONTO,c.ct_descuento as DESCUENTO, c.ct_total AS TOTAL_SIN_DESCUENTO, c.ct_deudor as CLIENTE , f.fact_nro_orden AS Nro_ORDEN from cuotas c, factura f, mnt_conv m   where f.fact_nro = c.ct_ref and f.fact_conv = m.conv_cod and ct_fecha_venc between  '+el['desdeinv']+' and '+el['hastainv']+'  and f.fact_conv = '+el['convenios']+' and c.ct_estado = |{Pendiente}| '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MONTO,DESCUENTO,TOTAL_SIN_DESCUENTO";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
