<?php
/** project/marijoa/reports/rep.totales_ven_suc.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "totales_ven_suc";
$Obj->alias = "Reporte de Ventas Totales por Suc";
$Obj->ndoc = "Reporte de Ventas Totales por Suc";
$Obj->help = "Reporte de Ventas Totales por Suc";
$Obj->query = "'SELECT sum(  df_subtotal )  AS TOTAL   FROM  factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND  fact_fecha  BETWEEN  '+el['desde']+' AND '+el['hasta']+'  AND   fact_localidad like '+el['empr']+'  AND fact_estado = |{Cerrada}| AND df_cod_prod <> 1000 AND df_cod_prod <> 1001 and df_cod_prod <> 1002 '";
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
