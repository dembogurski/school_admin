<?php
$Obj->name = "rep_stock_FG";
$Obj->alias = "Reporte de Stock Sector Grupo  ";
$Obj->ndoc = "Reporte de Stock  Sector Grupo  ";
$Obj->help = "Reporte de Stock Detallado";
$Obj->query = "'SELECT  p.p_fam as FAM, p.p_grupo as GRUPO,  p.p_cant as CANT, p.p_cant * p.p_compra as VALOR_AL_COSTO  FROM  mnt_prod p WHERE  p.p_local LIKE  '+el['rep_localidad']+' and p.p_fam like '+el['p_fam']+' and p.p_grupo like  '+el['p_grupo']+' and p.p_cant > 0  and p.p_cod like '+el['__term']+' AND prod_fin_pieza LIKE '+el['fp']+' order by p.p_fam , p.p_grupo ,p.p_cant desc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "(el['FAM']!=old['FAM'])||(el['GRUPO']!=old['GRUPO'])";
$Obj->subtotal = "CANT,VALOR_AL_COSTO";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANT,SUBTOTAL";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>