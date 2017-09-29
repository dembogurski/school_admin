<?php
$Obj->name = "rep_det_mis_ven";
$Obj->alias = "Detalle de mis ventas";
$Obj->ndoc = "Detalle de mis ventas";
$Obj->help = "Detalle de mis ventas";
$Obj->query = "'select fact_nro as Nro, fact_nom_cli as CLIENTE, fact_comi_vend AS COMISION, fact_total as TOTAL from factura where fact_vend_cod =  '+el['__user']+' and fact_fecha between  '+el['desde']+'and '+el['hasta']+' and fact_estado = |{Cerrada}|'";
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
