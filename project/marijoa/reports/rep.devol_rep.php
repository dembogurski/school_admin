<?php
/** project/marijoa/reports/rep.devol_rep.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "devol_rep";
$Obj->alias = "Reporte de Devoluciones";
$Obj->ndoc = "Reporte de Devoluciones";
$Obj->help = "Reporte de Devoluciones";
$Obj->query = "'SELECT d.dev_nro AS NRO, d.dv_nomcli AS CLIENTE,f.func_nombre AS VENDEDOR, d.dv_hoy AS FECHA,d.cod_prod AS COD_PROD, d.precio,d.cant_dev AS CANT_DEV, d.monto_dev AS MONTO_DEV,d.forma AS FORMA, d.cod_prod_dv AS COD_PROD_DEV, d.precio_act AS PRECIO_ACT, d.metros AS METROS  FROM devoluciones d, factura f  WHERE d.fact_nro = f.fact_nro AND  d.dv_nomcli LIKE '+el[dv_cli]+' AND dv_hoy BETWEEN '+el[desde]+' AND '+el[hasta]+' AND forma LIKE '+el['tipo']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MONTO_DEV,CANT_DEV,METROS";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
