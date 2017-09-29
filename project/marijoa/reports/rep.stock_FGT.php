<?php
$Obj->name = "rep_ventas_FGT";
$Obj->alias = "Reporte de Stock Sector Grupo Tipo";
$Obj->ndoc = "Reporte de Stock  Sector Grupo Tipo";
$Obj->help = "Reporte de Stock Detallado";
$Obj->query = "'SELECT  p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO,  SUM(p.p_cant) AS CANT, SUM((p.p_cant * p.p_compra)) AS VALOR_AL_COSTO  FROM  mnt_prod p WHERE  p.p_local LIKE  '+el['rep_localidad']+' and p.p_fam like '+el['p_fam']+' and p.p_grupo like  '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_cant > 0  and p.p_cod like '+el['__term']+' AND prod_fin_pieza LIKE '+el['fp']+' GROUP BY p.p_fam , p.p_grupo,p.p_tipo  ORDER BY p.p_fam , p.p_grupo , p.p_tipo,p.p_cant DESC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANT,SUBTOTAL,VALOR_AL_COSTO";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
