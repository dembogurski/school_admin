<?php
$Obj->name = "arqueo_caja";
$Obj->alias = "Arqueo de Caja";
$Obj->ndoc = "Arqueo de Caja";
$Obj->help = "Arqueo de Caja";
//$Obj->query = "'SELECT DISTINCT fact_vend_cod AS VENDEDOR, func_nombre as NOMBRE  FROM factura WHERE fact_fecha BETWEEN '+el[fecha]+' AND '+el[fechah]+'  AND  fact_localidad = '+el[empr]+' AND fact_estado = |{Cerrada}| ORDER BY fact_vend_cod ASC '";
$Obj->query = "'SELECT func_cod AS VENDEDOR, func_fullname AS NOMBRE FROM mnt_func f WHERE f.func_lugar_trab = '+el[empr]+' AND f.func_estado = |{Activo}| AND (f.func_cargo = |{Vendedor}| or f.func_cargo = |{Gerente de Ventas}|) ORDER BY func_cod ASC '";

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
