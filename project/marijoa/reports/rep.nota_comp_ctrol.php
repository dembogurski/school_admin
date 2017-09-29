<?php
/** project/marijoa/reports/rep.nota_comp_ctrol.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "nota_comp_ctrol";
$Obj->alias = "RECECPION DE MERCADERIAS Y CONTROL DE CALIDAD";
$Obj->ndoc = "RECECPION DE MERCADERIAS Y CONTROL DE CALIDAD";
$Obj->help = "RECECPION DE MERCADERIAS Y CONTROL DE CALIDAD";
$Obj->query = "'SELECT id,d_nro,d_nom_orig,p_fam,p_grupo,p_tipo,p_color,descrip,paq,unid,ancho,cant,gramage,metros,origen,realmts,moneda,subtotal,subtotal_ref,cotiz,tipo_med,p_compra FROM nota_compra_det WHERE d_nro = '+el['n_nro']+''";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "metros,origen,realmts,subtotal,subtotal_ref";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
