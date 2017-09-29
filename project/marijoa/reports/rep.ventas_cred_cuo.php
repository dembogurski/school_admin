<?php
/** project/marijoa/reports/rep.ventas_cred_cuo.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "ventas_cred_cuo";
$Obj->alias = "Reporte de Ventas a Credito (Cuotas)";
$Obj->ndoc = "Reporte de Ventas a Credito (Cuotas)";
$Obj->help = "Reporte de Ventas a Credito (Cuotas)";
$Obj->query = "'SELECT f.fact_nro AS FACTURA,f.fact_nom_cli AS CLIENTE,  date_format(f.fact_fecha,|{%d-%m-%Y}|) AS FECHA_FACTURA,f.fact_total AS TOTAL,c.ct_nro AS CUOTA_NRO, date_format(c.ct_fecha_venc,|{%d-%m-%Y}|) AS VENC,c.ct_total AS VALOR_CUOTA,c.ct_estado AS ESTADO   FROM factura f, cuotas c WHERE f.fact_nro = c.ct_ref AND f.fact_cli_ci LIKE '+el['cli_ci']+' AND f.fact_fecha BETWEEN '+el['desde']+'  AND '+el['hasta']+' AND f.fact_localidad LIKE '+el['suc']+'AND c.ct_estado LIKE '+el['estado']+' ORDER BY f.fact_fecha ASC, fact_nom_cli asc, ct_nro asc  '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL,VALOR_CUOTA";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
