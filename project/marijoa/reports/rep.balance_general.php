<?php
/** project/marijoa/reports/rep.balance_general.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "balance_general";
$Obj->alias = "Balance General";
$Obj->ndoc = "Balance General";
$Obj->help = "Balance General";
$Obj->query = "'SELECT c_cod AS CODIGO,c_descrip AS CUENTA,c_int AS C_INT,c_nivel AS NIVEL FROM plan_cuentas WHERE c_cod LIKE '+el['cod']+' AND c_nivel LIKE '+el['nivel']+' order by c_cod asc'";
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
