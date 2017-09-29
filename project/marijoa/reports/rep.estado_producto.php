<?php
$Obj->name = "estado_producto";
$Obj->alias = "Estado de Productos";
$Obj->ndoc = "Estado de Productos";
$Obj->help = "Estado de Productos";
$Obj->query = "'select f.fact_nro as NRO, f.fact_localidad as SUC,f.fact_estado as ESTADO,f.func_nombre as VENDEDOR,d.df_cod_prod as CODIGO,d.df_precio as PRECIO, d.df_cantidad as CANTIDAD   from factura f, det_factura d where f.fact_nro = d.df_fact_num and d.df_cod_prod = '+el['f_cod']+' and f.fact_estado <> |{Cerrada}|  '";
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
