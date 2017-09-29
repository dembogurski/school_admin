<?php
$Obj->name = "estado_ctas_cli";
$Obj->alias = "Estado de Cuenta de Clientes";
$Obj->ndoc = "Estado de Cuenta de Clientes";
$Obj->help = "Estado de Cuenta de Clientes";
$Obj->query = "'select ct_deudor AS CLIENTE, ct_ref AS FACTURA,ct_nro AS NRO_CTA, DATE_FORMAT(f.fact_fecha,|{%d-%m-%Y}|) AS EMISION ,  DATE_FORMAT(ct_fecha_venc,|{%d-%m-%Y}|)  AS VENCIMIENTO,ct_monto AS MONTO ,ct_entrega AS MONTO_ENTREGA,ct_estado AS ESTADO,rest as RESTANTE, __local as LOCAL  FROM  cuotas c, factura f WHERE  c.ct_ref =  f.fact_nro AND     ct_estado  like '+el['estado']+' AND ct_ci like '+el[n_deudor]+' AND fact_vend_cod like '+el[n_vendedor]+' AND __local LIKE '+el['suc']+' and ct_fecha_venc between '+el[fecha_inv]+' and '+el[fecha_inva]+' order by CLIENTE, ct_fecha_venc asc' ";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['CLIENTE'] != old['CLIENTE']";
$Obj->subtotal = "MONTO,MONTO_ENTREGA,RESTANTE";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "MONTO,MONTO_ENTREGA,RESTANTE";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
