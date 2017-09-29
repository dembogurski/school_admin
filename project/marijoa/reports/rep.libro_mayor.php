<?php
/** project/marijoa/reports/rep.libro_mayor.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "libro_mayor";
$Obj->alias = "Libro Mayor";
$Obj->ndoc = "Libro Mayor";
$Obj->help = "Libro Mayor";
$Obj->query = "'SELECT a.nro_as AS NRO, date_format(a.fecha,|{%d-%m-%Y}|) AS FECHA, a.suc AS  SUC,codigo AS CODIGO,c_descrip AS DESCRIP,saldo_ant_suc AS S_ANT_SUC, saldo_ant AS S_ANT,debe AS DEBE, haber AS HABER,saldo AS SALDO,saldo_suc as SALDO_SUC FROM asientos_cont a, asientos_det d, plan_cuentas p WHERE a.nro_as = d.nro_as AND p.c_cod =  d.codigo  AND a.fecha BETWEEN '+el[desde]+' AND   '+el[hasta]+' AND d.codigo like '+el[emp_cta_cont]+' AND a.suc LIKE '+el[suc]+' ORDER BY d.codigo ASC,a.fecha ASC,d.nro_as asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "SALDO_ANT,DEBE,HABER,SALDO";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
