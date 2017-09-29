<?php
/** project/marijoa/reports/rep.repos_prod.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "repos_prod";
$Obj->alias = "Reporte para Reposicion de Productos";
$Obj->ndoc = "Reporte para Reposicion de Productos";
$Obj->help = "Reporte para Reposicion de Productos";
$Obj->query = "' SELECT p.p_fam AS FAMILIA, p.p_grupo AS GRUPO,p.p_tipo AS TIPO, p.p_color AS COLOR, SUM(v.df_cantidad) AS CANT, p.p_cant  AS STOCK FROM venta_detalle v, productos_all p  WHERE fact_fecha BETWEEN |{2012-01-01}| AND CURRENT_DATE AND v.df_cod_prod = p.p_cod AND p.p_local LIKE '+el['rep_localidad']+' AND p.p_fam LIKE '+el['p_fam']+' AND p.p_grupo LIKE '+el['p_grupo']+' AND p.p_tipo LIKE '+el['p_tipo']+'  AND p.p_clasif LIKE '+el['p_clasif']+'  AND p.p_temp LIKE '+el['p_temp']+'  AND p.p_estruc LIKE '+el['p_estruc']+' AND p.p_color LIKE '+el['p_color']+'      GROUP BY p.p_fam, p.p_grupo,p.p_tipo, p.p_color ORDER BY p.p_fam, p.p_grupo,p.p_tipo, p.p_color'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT,STOCK";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
