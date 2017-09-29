<?php
$Obj->name = "porc_ventas_func";
$Obj->alias = "Porcentaje de Ventas de Funcionarios";
$Obj->ndoc = "Porcentaje de Ventas de Funcionarios";
$Obj->help = "Porcentaje de Ventas de Funcionarios";
$Obj->query = "'SELECT fact_vend_cod AS VENDEDOR, func_nombre as NOMBRE  FROM factura WHERE fact_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+'  AND  fact_localidad = '+el[__local]+' AND fact_estado = |{Cerrada}| GROUP BY fact_vend_cod ORDER BY fact_vend_cod ASC '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
