<?php
/** project/marijoa/reports/rep.docs_legales.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "docs_legales";
$Obj->alias = "Reporte de Documentos Legales";
$Obj->ndoc = "Reporte de Documentos Legales";
$Obj->help = "Reporte de Documentos Legales";
$Obj->query = "'SELECT d.id as id,tipo_doc ,nro_doc,prov,date_format(fecha,|{%d-%m-%Y}|) as fecha_,valor,tipo,estado, cotiz, valor_mon, compl,tipo_iva,cjc_descri as concepto,tipo_oc  FROM docs d,caja_con c WHERE d.concepto = c.cjc_cod and  estado like '+el[estado]+' and emp like '+el[emp]+' and fecha BETWEEN '+el[desde]+' and '+el[hasta]+' AND prov like '+el[prov]+' and tipo_doc  like '+el[tipo_doc]+' AND tipo_iva like  '+el[tipo_iva]+'  and tipo_mov like '+el[tipo_mov]+' and tipo like '+el[tipo]+'   and emp like '+el[emp]+' and concepto like '+el['concepto']+' ORDER BY d.id asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['prov']!=old['prov']";
$Obj->subtotal = "valor_mon";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "valor_mon";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
