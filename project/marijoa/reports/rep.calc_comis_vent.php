<?php
/** project/marijoa/reports/rep.calc_comis_vent.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "calc_comis_vent";
$Obj->alias = "Calculo de Comisiones por Ventas";
$Obj->ndoc = "Calculo de Comisiones por Ventas";
$Obj->help = "Calculo de Comisiones por Ventas";
$Obj->query = "'SELECT func_cod AS CODIGO,func_fullname AS NOMBRE,func_ci AS CI, date_format(func_fecha_cont,|{%d-%m-%Y}|) AS FECHA_CONT FROM mnt_func WHERE func_cod = '+el[sue_cod_func]+' '";
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
