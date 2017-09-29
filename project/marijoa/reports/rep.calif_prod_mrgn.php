<?php
$Obj->name = "calif_prod_mrgn";
$Obj->alias = "Pregenerador Calificacion de Productos x Margen";
$Obj->ndoc = "Calificacion de Productos Por Margen";
$Obj->help = "Calificacion de Productos Por Margen";
$Obj->query = "'SELECT p.p_tipo as TIPO,p.p_grupo as GRUPO, ((d.df_cantidad * d.df_precio ) - (d.df_cantidad * p.p_compra)) as MARGEN, d.df_cantidad * d.df_precio as SUBTOTAL, d.df_cantidad as METROS, d.df_precio as PRECIO_V, p.p_compra as PRECIO_C, (1 - ( p.p_compra / d.df_precio )) * 100 AS  PORC FROM mnt_prod p, factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND f.fact_fecha BETWEEN  '+el['desde']+' and '+el['hasta']+' AND f.fact_localidad like '+el['suc_']+'AND p.p_cod = d.df_cod_prod  order by GRUPO,TIPO ASC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['TIPO']!=old['TIPO']";
$Obj->subtotal = "MARGEN,SUBTOTAL,METROS,PRECIO_V,PRECIO_C,PORC";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
