<?php
$Obj->name = "fdp_compras";
$Obj->alias = "Reporte de Fines de Pieza relacionados con Compras";
$Obj->ndoc = "Reporte de Fines de Pieza relacionados con Compras";
$Obj->help = "Reporte de Fines de Pieza relacionados con Compras";
$Obj->query = "'select c.c_ref as NRO_REF_FACT,c.c_factura as FACTURA_REAL,  DATE_FORMAT(c_fecha,|{%d-%m-%Y}|) as FECHA_COMPRA,p.p_cod as CODIGO, p.p_cant AS CANTIDAD,  p.p_padre as PADRE from mnt_prod p, mov_compras c where  c.c_ref = p.p_ref and c_fecha between  '+el[desdeinv]+' and '+el[hastainv]+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANTIDAD";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
