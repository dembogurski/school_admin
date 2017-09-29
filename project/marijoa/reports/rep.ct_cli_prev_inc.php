<?php
/** project/marijoa/reports/rep.ct_cli_prev_inc.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "ct_cli_prev_inc";
$Obj->alias = "Cuotas Clientes,Previciones e Incobrables";
$Obj->ndoc = "Cuotas Clientes,Previciones e Incobrables";
$Obj->help = "Cuotas Clientes,Previciones e Incobrables";
$Obj->query = "'SELECT ct_deudor AS CLIENTE, ct_ref AS FACTURA,ct_nro AS NRO_CTA,DATE_FORMAT(ct_fecha_venc,|{%d-%m-%Y}|)  AS VENCIMIENTO,ct_monto AS MONTO ,ct_entrega AS MONTO_ENTREGA,ct_estado AS ESTADO,rest AS RESTANTE, __local AS LOCAL    FROM cuotas WHERE     __local LIKE '+el['suc']+' AND ct_tipo LIKE '+el['ct_tipo']+'  ORDER BY CLIENTE, ct_fecha_venc asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MONTO,MONTO_ENTREGA,RESTANTE";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
