<?php
/** project/marijoa/reports/rep.det_venta_devol.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "det_venta_devol";
$Obj->alias = "Detalle de Venta (Informe por Devolucion)";
$Obj->ndoc = "Detalle de Venta";
$Obj->help = "Detalle de Venta";
$Obj->query = "'SELECT df_cod_prod AS CODIGO,df_descrip AS DESCRIPCION, df_precio AS PRECIO, df_cantidad AS CANTIDAD, df_subtotal AS SUBTOTAL FROM det_factura WHERE df_fact_num = '+el['factura']+''";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANTIDAD,SUBTOTAL ";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
