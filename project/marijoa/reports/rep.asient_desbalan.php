<?php
/** project/marijoa/reports/rep.asient_desbalan.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "asient_desbalan";
$Obj->alias = "Asientos No Balanceados";
$Obj->ndoc = "Asientos No Balanceados";
$Obj->help = "Asientos No Balanceados";
$Obj->query = "'SELECT a.nro_as AS NRO,a.fecha AS FECHA, a.obs AS OBS,sum(debe) AS DEBE, sum(haber) AS  HABER FROM asientos_cont a, asientos_det d  WHERE a.nro_as = d.nro_as   GROUP BY NRO HAVING   DEBE <> HABER'";
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
