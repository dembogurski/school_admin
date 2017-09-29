<?php
/** project/marijoa/reports/rep.his_impresiones.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "his_impresiones";
$Obj->alias = "Historial de Impresiones";
$Obj->ndoc = "Historial de Impresiones";
$Obj->help = "Registro de Impresiones";
$Obj->query = "'SELECT codigo AS CODIGO, usuario AS USUARIO, suc_u AS SUC_USUARIO, suc_p AS SUC_PROD,date_format(fecha,|{%d-%m-%Y}|) AS FECHA, hora AS HORA,ci AS CANT_IMP, obs AS OBS FROM reg_impresion WHERE codigo = '+el['f_cod']+' ORDER BY id ASC '";
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
