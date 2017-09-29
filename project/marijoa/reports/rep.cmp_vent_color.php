<?php
/** project/marijoa/reports/rep.cmp_vent_color.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "cmp_vent_color";
$Obj->alias = "Reporte Comparativo de Ventas (Color)";
$Obj->ndoc = "Reporte Comparativo de Ventas (Color)";
$Obj->help = "Reporte Comparativo de Ventas (Color)";
$Obj->query = "'SELECT  p_cod AS COD, p_fam AS FAM, p_grupo AS GRUPO,p_tipo AS TIPO, p_clasif AS CLASIF, p_estruc AS ESTRUC, p_color AS COLOR,d.df_cantidad AS CANT_V , p.p_cant AS STOCK   FROM factura f, det_factura d, mnt_prod p WHERE p.p_fam like '+el['p_fam']+' AND p.p_grupo like '+el['p_grupo']+' AND p.p_tipo like '+el['p_tipo']+' AND p.p_clasif like '+el['p_clasif']+' AND p.p_estruc like '+el['p_estruc']+' and p.p_color like '+el['p_color']+' AND f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '+el[s1]+' AND  f.fact_fecha BETWEEN '+el['desde']+' AND '+el['hasta']+' order by p.p_color asc'";
$Obj->del_tpl = "";
$Obj->del_prg = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['COLOR']!=old['COLOR']";
$Obj->subtotal = "CANT_V,STOCK";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANT_V,STOCK";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
