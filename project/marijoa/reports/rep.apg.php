<?php
/** project/marijoa/reports/rep.apg.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "apg";
$Obj->alias = "Activos - Pasivos - Gastos";
$Obj->ndoc = "Activos - Pasivos - Gastos";
$Obj->help = "Activos - Pasivos - Gastos";
$Obj->query = "'SELECT c.cjc_ap AS APG, DATE_FORMAT(g.g_fecha, |{%d-%m-%Y}|) AS FECHA, g.g_user AS USUARIO, g.g_empr AS SUC, c.cjc_cod AS COD, c.cjc_descri AS CONCEPTO, g.g_compl AS COMPLEMENTO,g.g_monto AS MONTO FROM caja_con c, gastos g WHERE c.cjc_cod = g.g_con AND  c.cjc_cod LIKE '+el[sub]+' AND  g.g_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+'AND g.g_empr LIKE '+el[local]+' AND g.g_user LIKE '+el[user]+' ORDER BY c.cjc_ap ASC, CONCEPTO ASC '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['APG']!=old['APG']";
$Obj->subtotal = "MONTO";
$Obj->dec_sub = "0";
$Obj->cond_tot = "endConsult";
$Obj->total = "MONTO";
$Obj->dec_tot = "0";
$Obj->query_end = "";
?>
