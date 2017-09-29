<?php
/** project/marijoa/reports/rep.cuentas_pagadas.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "cuentas_pagadas";
$Obj->alias = "Reporte de cuentas Pagadas";
$Obj->ndoc = "Reporte de cuentas Pagadas";
$Obj->help = "Reporte de cuentas Pagadas";
$Obj->query = "'select id as ID, ct_nro as Nro, DATE_FORMAT(ct_fecha_venc,|{%d-%m-%Y}|)   as VENCIMIENTO, ct_prov as PROVEEDOR, ct_monto as MONTO, ct_estado as ESTADO, ct_detalle_chq as DETALLE  from cuotas_pagar where ct_fecha_venc between '+el['desde']+' and '+el['hasta']+' and ct_prov like '+el['prov_nombre']+''";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MONTO";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
