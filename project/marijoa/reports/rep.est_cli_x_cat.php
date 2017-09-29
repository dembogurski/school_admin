<?php
/** project/marijoa/reports/rep.est_cli_x_cat.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "est_cli_x_cat";
$Obj->alias = "Reporte de Estructura de Clientes x Categoria";
$Obj->ndoc = "Reporte de Estructura de Clientes x Categoria";
$Obj->help = "Reporte de Estructura de Clientes x Categoria";
$Obj->query = "'SELECT DISTINCT  f.fact_localidad AS SUC, e.emp_nombre AS NOMBRE   FROM mnt_cli c, factura f, det_factura d, mnt_prod p, par_empresas e WHERE c.cli_ci = f.fact_cli_ci AND f.fact_nro = d.df_fact_num AND f.fact_localidad = e.emp_cod AND d.df_cod_prod = p.p_cod AND p.p_fam LIKE '+el['fam']+' AND cli_fecha_nac NOT LIKE |{0000-00-00}|  AND f.fact_fecha BETWEEN '+el['desde']+' AND '+el['hasta']+' ORDER BY f.fact_localidad ASC,f.fact_cli_cat ASC'";
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
