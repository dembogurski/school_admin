<?php
/** project/marijoa/reports/rep.libro_mayor.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "sumas_y_saldos";
$Obj->alias = "Reporte de Sumas y Saldos";
$Obj->ndoc = "Reporte de Sumas y Saldos";
$Obj->help = "Reporte de Sumas y Saldos";
$Obj->query = "'SELECT d.codigo AS CUENTA,p.c_descrip AS DESCRIP,p.c_db_hb DB_HB,sum(d.debe) AS DEBITOS,sum(d.haber) AS CREDITOS,sum(d.debe)-sum(d.haber) AS SALDO ,sum(d.haber)-sum(d.debe) AS SALDO_ACR FROM asientos_cont a, asientos_det d, plan_cuentas p WHERE a.nro_as = d.nro_as AND d.codigo = p.c_cod AND a.fecha BETWEEN '+el[desde]+' AND   '+el[hasta]+' AND d.codigo LIKE '+el[emp_cta_cont]+' AND a.suc LIKE '+el[suc]+' GROUP BY d.codigo ORDER BY DESCRIP ASC '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "DEBITOS,CREDITOS";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
