<?php
/** project/marijoa/reports/rep.pedidos_prov.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "control_pedidos";
$Obj->alias = "Control de Pedidos";
$Obj->ndoc = "Control de Pedidos";
$Obj->help = "Control de Pedidos";
$Obj->query = "'select d.id AS ID, n.nro as NRO,n.__user AS USUARIO, grupo AS GRUPO, tipo AS TIPO, color AS COLOR, cantidad AS CANT, precio AS PRECIO, d.estado AS ESTADO, prov AS PROV, d.obs as OBS, urge AS URGE,codigo as CODIGO  from nota_pedido n, nota_pedido_det d where n.nro = d.nro_pedido and n.__locald = |{PR}| and d.estado like |{Despachado}| and d.prov like '+el[prov]+' and d.fecha_previsto between '+el[desde]+' and '+el[hasta]+' and d.urge like '+el[urg]+'  order by grupo, tipo, color desc  '";
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
