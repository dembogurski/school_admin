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
$Obj->query = "'SELECT p.nro AS Nro,p.__local AS Origen,p.__locald AS Destino,DATE_FORMAT(p.fecha,|{%d-%m-%Y}|) AS Fecha,DATE_FORMAT(p.fecha_hora_cierre,|{%d-%m-%Y %h:%i:%s}|) AS Cierre, p.fecha as Fecha_normal, p.__user AS Usuario, p.estado AS Estado,d.codigo AS Codigo,cod_rem AS Remplazo,obs_seg,concat(d.grupo,|{ - }|, d.tipo, |{ - }|, d.color) AS Grupo_Tipo_Color, d.cantidad AS Cant, d.urge AS Urge,d.estado AS Estado_Cod,DATE_FORMAT(d.fecha_previsto,|{%d-%m-%Y}|) AS Previsto,d.obs AS Obs FROM nota_pedido p, nota_pedido_det d WHERE p.nro = d.nro_pedido AND  p.__local LIKE '+el[origen]+' AND p.__locald LIKE '+el[destino]+' AND p.fecha BETWEEN '+el[desde]+' AND '+el[hasta]+' '";
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
