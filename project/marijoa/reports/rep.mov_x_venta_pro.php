<?php
$Obj->name = "mov_x_venta_pro";
$Obj->alias = "Movimientos por ventas de productos";
$Obj->ndoc = "Movimientos por ventas de productos";
$Obj->help = "Movimientos por ventas de productos";
$Obj->query = "'select  f.fact_nro as FACTURA,  f.fact_fecha AS FECHA,f.fact_vend_cod AS VENDEDOR, d.df_cantidad as CANTIDAD,fact_localidad as SUC from  factura f, det_factura d  where  f.fact_nro = d.df_fact_num and df_cod_prod =  '+el['cod_prod']+'  and f.fact_estado = |{Cerrada}|  order by FECHA ASC  '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANTIDAD";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
