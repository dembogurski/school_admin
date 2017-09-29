<?php
$Obj->name = "stock_GTC";
$Obj->alias = "Reporte de Stock   Grupo Tipo Color";
$Obj->ndoc = "Reporte de Stock   Grupo Tipo Color";
$Obj->help = "Reporte de Stock Detallado";
$Obj->query = "'SELECT   p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_color as COLOR,  sum(p.p_cant) as CANT, sum(p.p_cant * p.p_compra) as VALOR_AL_COSTO  FROM  mnt_prod p WHERE  p.p_local LIKE  '+el['rep_localidad']+'  and p.p_grupo like  '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_color like '+el['p_color']+' and p.p_cant > 0  AND prod_fin_pieza LIKE |{No}|  and p.p_cod like '+el['__term']+' group by p.p_color order by p.p_color , p.p_grupo , p.p_tipo,p.p_cant desc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "(el['COLOR']!=old['COLOR'])||(el['GRUPO']!=old['GRUPO'])||(el['TIPO']!=old['TIPO'])";
$Obj->subtotal = "CANT,VALOR_AL_COSTO";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANT,SUBTOTAL";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
