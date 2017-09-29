<?php
/** project/marijoa/reports/rep.meta_x_antigued.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "meta_x_antigued";
$Obj->alias = "Calculo de Metas por Antiguedad";
$Obj->ndoc = "Calculo de Metas por Antiguedad";
$Obj->help = "Calculo de Metas por Antiguedad";
$Obj->query = "'SELECT func_cod as CODIGO, func_fullname AS NOMBRE,date_format(func_fecha_cont,|{%d-%m-%Y}|) AS FECHA_CONT ,datediff(CURRENT_DATE,func_fecha_cont) AS ANTIGUEDAD FROM mnt_func WHERE func_cod = '+el[func_cod]+''";
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
