<?php
/** project/marijoa/reports/rep.diff_cambio.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "diff_cambio";
$Obj->alias = "Reporte de Diferencias de Cambio en Compras";
$Obj->ndoc = "Reporte de Diferencias de Cambio en Compras";
$Obj->help = "Reporte de Diferencias de Cambio en Compras";
$Obj->query = "'SELECT c_ref,c_factura,c_nac_int,p.prov_nombre, p.prov_pais , c_fecha,c_fechafac,c_fecha_cierre, c_estado , c_valor_total, c_cambio, c_sobre_costo,ROUND( (c_valor_total - (c_valor_total * c_sobre_costo / 100)) * c_cambio,2) as VALOR_STOCK  , round((c_valor_total - (c_valor_total * c_sobre_costo / 100)) * 4500,2) AS VALOR_STOCK_TIPO_ESPEC ,round(((c_valor_total - (c_valor_total * c_sobre_costo / 100)) * c_cambio ) - ((c_valor_total - (c_valor_total * c_sobre_costo / 100)) * 4500),2) as DIFF,c_iva as IVA FROM mov_compras c, mnt_prov p WHERE c.c_prov = p.prov_cod and c_fechafac between '+el['desde']+' and '+el['hasta']+'  AND c_nac_int LIKE |{internacional}|'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "DIFF";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
