<?php
$Obj->name = "mov_x_venta_emp";
$Obj->alias = "Registro de Ventas y Control de Producto";
$Obj->ndoc = "Registro de Ventas y Control de Producto";
$Obj->help = "Registro de Ventas y Control de Producto";
$Obj->query = "'SELECT  f.fact_nro AS FACTURA, date_format(f.fact_fecha,|{%d-%m-%Y}|) AS FECHA,  f.fact_vend_cod AS VENDEDOR,  d.df_cantidad AS CANTIDAD,date_format(r.fecha,|{%d-%m-%Y}|) AS FECHA_CONTROL , r.hora AS HORA, r.empaquetador  AS EMPAQUETADOR  FROM  factura f, det_factura d, reg_empaque r WHERE  f.fact_nro = d.df_fact_num AND d.df_cod_prod = r.codigo AND f.fact_nro = r.fact_nro AND df_cod_prod =  '+el['cod_prod']+'  AND f.fact_estado = |{Cerrada}|  '";
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
