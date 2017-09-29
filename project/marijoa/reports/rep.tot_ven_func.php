<?php
/** project/marijoa/reports/rep.totales_ven_suc.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "tot_ven_func";
$Obj->alias = "Reporte de Ventas de Funcionarios";
$Obj->ndoc = "Reporte de Ventas de Funcionarios";
$Obj->help = "Reporte de Ventas de Funcionarios";
$Obj->query = "'SELECT DISTINCT func_nombre  AS FUNCIONARIO, fact_vend_cod AS CODE_FUNC FROM  factura WHERE fact_fecha BETWEEN  '+el['desde']+' AND '+el['hasta']+'  AND   fact_localidad like '+el['empr']+'  AND fact_estado = |{Cerrada}|    '";
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
