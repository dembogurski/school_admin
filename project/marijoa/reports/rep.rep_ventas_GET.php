<?php
$Obj->name = "rep_ventas_GET";
$Obj->alias = "Reporte de Ventas Grupo Estructura y Tipo ";
$Obj->ndoc = "Reporte de Ventas  Grupo Estructura Tipo";
$Obj->help = "Reporte de Ventas Detallado";
$Obj->query = "'SELECT p.p_grupo as GRUPO,p.p_estruc as ESTRUCTURA ,p.p_tipo as TIPO,  d.df_cantidad as CANT, d.df_subtotal as SUBTOTAL  FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num and d.df_cod_prod = p.p_cod and f.fact_localidad LIKE '+el['rep_localidad']+' and f.fact_cli_ci like '+el['rep_cli']+' and p.p_grupo like  '+el['p_grupo']+' and p.p_estruc like '+el['p_estruc']+'   and p.p_tipo like '+el['p_tipo']+' and p.p_cod like '+el['__term']+' and  f.fact_fecha between '+el['desdeinv']+' and '+el['hastainv']+'  and f. fact_estado = |{Cerrada}| and f.fact_cli_cat like '+el['cli_cat']+' and fact_moneda like  '+el['moneda']+' order by  p.p_grupo , p.p_estruc, p.p_tipo ,d.df_cantidad desc   '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "(el['ESTRUCTURA']!=old['ESTRUCTURA'])||(el['GRUPO']!=old['GRUPO'])||(el['TIPO']!=old['TIPO'])";
$Obj->subtotal = "CANT,SUBTOTAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANT,SUBTOTAL";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
