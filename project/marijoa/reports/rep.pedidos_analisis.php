<?php
/** project/marijoa/reports/rep.pedidos_urg_suc.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "pedidos_urg_suc";
$Obj->alias = "Analisis de Pedidos Pendientes Urgentes / Reposicion";
$Obj->ndoc = "Pedidos Pendientes Urgentes Hacia esta Sucursal";
$Obj->help = "Pedidos Pendientes Urgentes Hacia esta Sucursal";
$Obj->query = "'SELECT p.nro AS NRO,p.__locald AS DESTINO,p.__local AS ORIGEN,DATE_FORMAT(p.fecha,|{%d-%m-%Y}|) AS FECHA, p.__user AS USURIO, p.estado as ESTADO,d.codigo AS CODIGO, d.grupo AS GRUPO, d.tipo AS TIPO, d.color AS COLOR, d.cantidad AS CANTIDAD, d.urge AS URGE,d.estado AS ESTADO_CODIGO,d.cod_rem as REM, p.obs AS OBS FROM nota_pedido p, nota_pedido_det d						  WHERE p.nro = d.nro_pedido AND  p.__local LIKE '+el[origen]+' AND p.__locald LIKE '+el[destino]+'  AND d.urge LIKE '+el[urge]+' AND p.estado !=|{Abierta}|   AND p.fecha BETWEEN '+el[desde]+' AND '+el[hasta]+'  order by GRUPO ASC,TIPO ASC , COLOR ASC'";
 
$Obj->del_tpl = "";
$Obj->del_prg = "";
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
