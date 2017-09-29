<?php
/** project/marijoa/reports/rep.comp_vent_prod.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "comp_vent_prod";
$Obj->alias = "Reporte Comparativo de Ventas por Producto";
$Obj->ndoc = "Reporte Comparativo de Ventas por Producto";
$Obj->help = "Reporte Comparativo de Ventas por Producto";
$Obj->query = "'SELECT f.fact_cli_cat AS CAT, p.p_fam AS FAM, p.p_grupo AS GRUPO, p.p_tipo AS TIPO,  SUM(d.df_cantidad) AS CANT, SUM(d.df_subtotal) AS VALOR FROM factura f, det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+' AND p.p_fam LIKE '+el[p_fam]+' AND p.p_grupo LIKE '+el[p_grupo]+' AND p.p_tipo LIKE '+el[guia_tipo]+' AND p.p_clasif LIKE '+el[p_clasif]+' AND p.p_temp LIKE '+el[p_temp]+' AND  p.p_estruc LIKE '+el[p_estruc]+'AND f.fact_estado = |{Cerrada}| AND f.fact_localidad LIKE '+el[rep_localidad]+' AND f.fact_cli_ci LIKE '+el[rep_cli]+'  AND f.fact_cli_cat LIKE '+el[cli_cat]+' GROUP BY  CAT, FAM, GRUPO, TIPO   ORDER BY CAT ASC, CANT DESC'";
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
