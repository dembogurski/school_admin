<?php
/** project/marijoa/reports/rep.retazos.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "retazos";
$Obj->alias = "Reporte de Retazos";
$Obj->ndoc = "Reporte de Retazos";
$Obj->help = "Reporte de Retazos";
$Obj->query = "'SELECT usuario AS USUARIO,date_format(fecha,|{%d-%m-%Y}|) AS FECHA, suc AS SUC, codigo AS CODIGO,cant AS CANT, p_compra AS P_COMPRA,descrip AS DESCRIP  FROM mnt_retazos WHERE fecha BETWEEN '+el[desde]+' AND '+el[hasta]+' AND usuario LIKE '+el['usuario']+' AND codigo LIKE '+el[cod]+' and suc like '+el[suc_]+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
