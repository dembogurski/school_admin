<?php
$Obj->name = "stock_agrupado";
$Obj->alias = "Stock Agrupado";
$Obj->ndoc = "Stock Agrupado";
$Obj->help = "Stock Agrupado";
$Obj->query = "'SELECT  p.p_local AS SUC,count(*) AS CANT, sum(p_cant) AS METROS  FROM  mnt_prod p WHERE  p.p_local LIKE '+el['rep_localidad']+' AND p.p_fam LIKE '+el['p_fam']+' AND p.p_grupo LIKE  '+el['p_grupo']+' AND p.p_tipo LIKE '+el['p_tipo']+'    AND p.p_color LIKE '+el['p_color']+'  AND p.p_cant >  '+el['rep_cantidad']+' AND prod_fin_pieza LIKE '+el['fdp']+' AND p.p_cant > 0 GROUP BY SUC   order by SUC ASC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT,METROS";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
