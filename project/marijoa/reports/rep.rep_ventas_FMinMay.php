<?php
$Obj->name = "rep_ventas_F";
$Obj->alias = "Reporte de Ventas Sector (Minoristas/Mayoristas)";
$Obj->ndoc = "Reporte de Ventas  Sector";
$Obj->help = "Reporte de Ventas Detallado";
$Obj->query = "'SELECT p.p_fam AS FAM,sum( IF( f.fact_cli_cat < 3,d.df_cantidad,0))   AS CANT_MIN,sum( IF( f.fact_cli_cat > 2, d.df_cantidad,0 )) AS CANT_MAY,sum( IF( f.fact_cli_cat < 3,d.df_subtotal,0))   AS SUBT_MIN,sum( IF( f.fact_cli_cat > 2, d.df_subtotal,0 )) AS SUBT_MAY, round(sum( IF( f.fact_cli_cat < 3, d.df_subtotal - ( ((p.p_compra * -1) - (p.p_compra * p_porc_recargo / 100)  * -1 ) * d.df_cantidad),0 )),0)   AS MARGEN_MIN,round(sum( IF( f.fact_cli_cat > 2,d.df_subtotal - (((p.p_compra * -1) - (p.p_compra * p_porc_recargo / 100)  * -1 ) * d.df_cantidad),0 )),0)  AS MARGEN_MAY   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '+el['rep_localidad']+' AND p.p_fam LIKE '+el['p_fam']+'   AND  f.fact_fecha BETWEEN '+el['desdeinv']+' AND '+el['hastainv']+' AND f. fact_estado = |{Cerrada}|   GROUP BY FAM   ORDER BY SUBT_MIN DESC,SUBT_MAY DESC '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANT_MIN,CANT_MAY,SUBT_MIN,SUBT_MAY,MARGEN_MIN,MARGEN_MAY";
$Obj->dec_tot = "2";
$Obj->query_end = "";

//$Obj->query = "'SELECT  p.p_fam AS FAM ,  sum(d.df_cantidad) AS CANT,sum(d.df_subtotal) AS SUBTOTAL,sum((d.df_subtotal) - (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100) * -1))* d.df_cantidad) AS MARGEN   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '+el['rep_localidad']+' AND f.fact_cli_ci LIKE '+el['rep_cli']+' AND p.p_fam LIKE '+el['p_fam']+' AND p.p_grupo LIKE  '+el['p_grupo']+' AND  p.p_tipo LIKE '+el['p_tipo']+'  AND p.p_cod LIKE '+el['__term']+'  AND  f.fact_fecha BETWEEN '+el['desdeinv']+' AND '+el['hastainv']+'  AND f. fact_estado = |{Cerrada}| AND f.fact_cli_cat LIKE '+el['cli_cat']+' AND fact_moneda LIKE  '+el['moneda']+' GROUP BY p.p_fam   ORDER BY p.p_fam  ,CANT DESC   '";


?>