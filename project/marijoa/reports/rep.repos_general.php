<?php
/** project/marijoa/reports/rep.repos_general.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "repos_general";
$Obj->alias = "Reporte de Reposicion General";
$Obj->ndoc = "Reporte de Reposicion General";
$Obj->help = "Reporte de Reposicion General";
$Obj->query = "'select p_fam AS FAM, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR, sum(p_cant) as CANT from prods_sin_fdp p WHERE  p.p_fam LIKE '+el['p_fam']+' AND p.p_grupo LIKE '+el['p_grupo']+' AND p.p_tipo LIKE '+el['p_tipo']+'  AND p.p_clasif LIKE '+el['p_clasif']+'  AND p.p_temp LIKE '+el['p_temp']+'  AND p.p_estruc LIKE '+el['p_estruc']+' AND p.p_color LIKE '+el['p_color']+'   GROUP BY FAM,GRUPO,TIPO,COLOR ORDER BY FAM,GRUPO,TIPO,COLOR limit 5000'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
