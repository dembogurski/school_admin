<?php
/** project/marijoa/reports/rep.correccion_prod.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "correccion_prod";
$Obj->alias = "Reporte para Correccion de Productos";
$Obj->ndoc = "Reporte para Correccion de Productos";
$Obj->help = "Reporte para Correccion de Productos";
$Obj->query = "'SELECT p_cod AS CODIGO, p_fam AS FAM, p_grupo AS GRUPO, p_tipo AS TIPO,p_clasif AS CLASIF, p_estruc AS ESTRUC, p_descri AS DESCRIP FROM mnt_prod WHERE p_fam LIKE '+el[fam]+' AND p_grupo LIKE '+el[grup]+' AND p_tipo LIKE '+el[tip]+' and p_clasif  LIKE '+el[cla]+' and p_estruc  LIKE '+el[est]+' and p_descri  LIKE '+el[desc]+' and p_cod  LIKE '+el[codigo]+'  limit 2000 '";
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
