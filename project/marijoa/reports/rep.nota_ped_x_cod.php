<?php
/** project/marijoa/reports/rep.nota_ped_x_cod.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "nota_ped_x_cod";
$Obj->alias = "Notas de Pedido de un Codigo";
$Obj->ndoc = "Notas de Pedido de un Codigo";
$Obj->help = "Notas de Pedido de un Codigo";
$Obj->query = "'SELECT n.nro AS NRO,DATE_FORMAT(n.fecha,|{%d-%m-%Y}|) AS FECHA , n.__user AS USUARIO,n.__suc AS ORIGEN,n.__sucd AS DESTINO,d.cantidad AS CANTIDAD,n.estado AS ESTADO  FROM nota_pedido n,nota_pedido_det d WHERE n.nro = d.nro_pedido AND d.codigo = '+el['lcod']+' '";
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
