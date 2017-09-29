<?php
$Obj->name = "comparat_ventas";
$Obj->alias = "Reporte Comparativo de Ventas";
$Obj->ndoc = "Reporte Comparativo de Ventas";
$Obj->help = "Reporte Comparativo de Ventas";
$Obj->query = "'SELECT p.p_fam as FAM,p.p_grupo AS GRUPO, p.p_tipo AS TIPO, p.p_color AS COLOR,  d.df_cantidad  AS CANT_V , p.p_cant  AS STOCK,  (d.df_cantidad - p.p_cant)  as DIFF  FROM factura f, det_factura d, mnt_prod p WHERE p.p_fam like '+el['p_fam']+' AND p.p_grupo like '+el['p_grupo']+' AND p.p_tipo like '+el['p_tipo']+' AND p.p_clasif like '+el['p_clasif']+' AND p.p_estruc like '+el['p_estruc']+' and p.p_color like '+el['p_color']+' AND f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '+el[s1]+' AND  f.fact_fecha BETWEEN '+el['desde']+' AND '+el['hasta']+' order by p.p_color,p.p_fam,p.p_grupo,p.p_tipo asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "(el['FAM']!=old['FAM'])||(el['GRUPO']!=old['GRUPO'])||(el['TIPO']!=old['TIPO']||(el['COLOR']!=old['COLOR']))";
$Obj->subtotal = "CANT_V,STOCK,DIFF";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANT_V,STOCK,DIFF";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
