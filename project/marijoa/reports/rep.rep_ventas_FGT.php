<?php
$Obj->name = "rep_ventas_FGT";
$Obj->alias = "Reporte de Ventas Sector Grupo Tipo";
$Obj->ndoc = "Reporte de Ventas  Sector Grupo Tipo";
$Obj->help = "Reporte de Ventas Detallado";
$Obj->query = "'SELECT  p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO,  SUM(d.df_cantidad) as CANT, SUM( (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * df_cantidad) AS COSTO ,SUM(d.df_subtotal) as SUBTOTAL,sum( (d.df_subtotal) - (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad) AS MARGEN   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num and d.df_cod_prod = p.p_cod and f.fact_localidad LIKE '+el['rep_localidad']+' and f.fact_cli_ci like '+el['rep_cli']+' and p.p_fam like '+el['p_fam']+' and p.p_grupo like  '+el['p_grupo']+' and  p.p_tipo like '+el['p_tipo']+'  and p.p_cod like '+el['__term']+'  and  f.fact_fecha between '+el['desdeinv']+' and '+el['hastainv']+'  and f. fact_estado = |{Cerrada}| and f.fact_cli_cat like '+el['cli_cat']+' and fact_moneda like  '+el['moneda']+' GROUP BY p.p_fam , p.p_grupo , p.p_tipo order by p.p_fam , p.p_grupo ,SUBTOTAL desc   '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "(el['FAM']!=old['FAM'])||(el['GRUPO']!=old['GRUPO'])";
$Obj->subtotal = "CANT,SUBTOTAL,MARGEN";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANT,SUBTOTAL,MARGEN";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
