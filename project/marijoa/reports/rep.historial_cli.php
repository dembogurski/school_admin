<?php
$Obj->name = "historial_cli";
$Obj->alias = "Historial de Cuenta de Clientes";
$Obj->ndoc = "Estado de Cuenta de Clientes";
$Obj->help = "Estado de Cuenta de Clientes";
$Obj->query = "'select ct_ref AS FACTURA,ct_nro AS NRO_CTA,DATE_FORMAT(ct_fecha_venc,|{%d-%m-%Y}|)  AS VENCIMIENTO,DATE_FORMAT(fact_fecha,|{%d-%m-%Y}|) as FECHA_EMISION,ct_monto AS MONTO ,ct_entrega AS MONTO_ENTREGA,ct_estado AS ESTADO,rest as RESTANTE, ret_iva as RET, fact_localidad as SUC FROM cuotas c,factura f WHERE c.ct_ref = f.fact_nro and	 ct_estado  like '+el['estado']+' AND ct_ci like '+el[n_deudor]+' AND fact_vend_cod like '+el[n_vendedor]+' and fact_fecha between '+el[fecha]+' and '+el[fecha_a]+' order by ct_fecha_venc asc' ";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MONTO,MONTO_ENTREGA,RESTANTE";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "MONTO,MONTO_ENTREGA,RESTANTE";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
