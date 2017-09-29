<?php
$Obj->name = "rep_ventas_det";
$Obj->alias = "Reporte de Ventas Detallado";
$Obj->ndoc = "Reporte de Ventas Detallado";
$Obj->help = "Reporte de Ventas Detallado";
$Obj->query = "'SELECT fact_nro as Nro,f.fact_fecha as FECHA, f.fact_localidad as SUC, f.fact_nom_cli as CLIENTE,f.fact_moneda as MONEDA,f.fact_cotiz as COTIZ, f.fact_total as TOTAL,p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP,  p.p_temp as TEMP, p.p_estruc as ESTRUCT,  p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num and d.df_cod_prod = p.p_cod and f.fact_localidad LIKE '+el['rep_localidad']+' and f.fact_cli_ci like '+el['rep_cli']+' and p.p_fam like '+el['p_fam']+' and p.p_grupo like  '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_comp like  '+el['p_comp']+' and p.p_temp like '+el['p_temp']+' and p.p_estruc like '+el['p_estruc']+'  and p.p_clasif like '+el['p_clasif']+'  and p.p_color like '+el['p_color']+' and p.p_lisoest like '+el['p_lisoest']+' and  f.fact_fecha between '+el['desdeinv']+' and '+el['hastainv']+'  and f. fact_estado = |{Cerrada}| and f.fact_cli_cat like '+el['cli_cat']+' and fact_moneda like  '+el['moneda']+'  and p.p_cod like '+el['p_term']+' order by f.id asc  '";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "0";
$Obj->query_end = "";
?>
