<?php
/** project/marijoa/reports/rep.asiento_preview.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "asiento_preview";
$Obj->alias = "Previsualizacion de Asiento";
$Obj->ndoc = "Previsualizacion de Asiento";
$Obj->help = "Previsualizacion de Asiento";
$Obj->query = "'SELECT a.nro_as AS NRO, DATE_FORMAT(a.fecha,|{%d-%m-%Y}|)  AS FECHA,d.codigo AS REF, p.c_descrip AS DESCRIPCION, d.debe AS DEBE, d.haber AS HABER, a.obs as OBS FROM asientos_cont a, asientos_det d, plan_cuentas p WHERE a.nro_as = d.nro_as AND d.codigo = p.c_cod AND a.nro_as = '+el['nro_as']+'  ORDER BY  a.fecha ASC, a.nro_as ASC, d.nro_orden asc '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "DEBE,HABER";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
