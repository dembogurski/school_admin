<?php
/** project/marijoa/reports/rep.nota_pedido.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "nota_pedido";
$Obj->alias = "Nota Pedido";
$Obj->ndoc = "Nota Pedido";
$Obj->help = "Nota Pedido";
$Obj->query = "'SELECT  nro_pedido AS Nro, codigo as CODIGO, grupo AS GRUPO, tipo AS TIPO, color AS COLOR,descrip as DESCRIP, cantidad AS CANTIDAD, estado AS ESTADO ,urge as URGENTE, |{}| AS MARCAR, prov , precio   FROM  nota_pedido_det WHERE nro_pedido = '+el[nro]+''";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANTIDAD";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
