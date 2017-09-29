<?php
/** project/marijoa/reports/rep.pedidos_prov.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "pedidos_provX";
$Obj->alias = "Notas Pedidos a Proveedores";
$Obj->ndoc = "Notas Pedidos a Proveedores";
$Obj->help = "Notas Pedidos a Proveedores";
$Obj->query = "'select d.id AS ID, n.nro as NRO,n.__user AS USUARIO, grupo AS GRUPO, tipo AS TIPO, color AS COLOR, cantidad AS CANT, precio_venta AS PRECIO, d.estado AS ESTADO, prov AS PROV, n.obs as OBS, d.obs as OBSD,d.obs_seg as OBS_SEG, urge AS URGE,codigo as CODIGO,cod_rem as COD_REM,DATE_FORMAT(d.fecha_previsto,|{%d-%m-%Y}|) as PREV  from nota_pedido n, nota_pedido_det d where n.nro = d.nro_pedido and n.__locald = |{PR}| and  n.__local like  '+el[suco]+'  and d.estado like '+el[estadop]+' and d.prov like '+el[prov]+' and  d.fecha_previsto  between '+el[desde]+' and '+el[hasta]+' and d.urge like '+el[urg]+' and d.grupo like '+el[grupo]+' and __user<>'+el[sisUsu]+' and d.tipo like '+el[tipo]+'  order by fecha_previsto asc, grupo, tipo, color desc limit 600 '";
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
