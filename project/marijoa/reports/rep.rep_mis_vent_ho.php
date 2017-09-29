<?php
$Obj->name = "rep_mis_vent_ho";
$Obj->alias = "Reporte de Mis Ventas de Hoy";
$Obj->ndoc = "Reporte de Mis Ventas de Hoy";
$Obj->help = "Reporte de Mis Ventas de Hoy";
$Obj->query = "'select fact_nro as Nro, fact_nom_cli as CLIENTE, fact_comi_vend AS COMISION, fact_total as TOTAL, fact_estado as ESTADO from factura where fact_vend_cod =  '+el['__user']+' and fact_fecha = current_date and fact_estado like '+el[estado]+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "COMISION,TOTAL";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
