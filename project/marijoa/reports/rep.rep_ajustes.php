<?php
/** project/marijoa/reports/rep.rep_ajustes.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "rep_ajustes";
$Obj->alias = "Reporte de Ajustes por Fecha";
$Obj->ndoc = "Reporte de Ajustes por Fecha";
$Obj->help = "Reporte de Ajustes por Fecha";
$Obj->query = "'select  DATE_FORMAT(aj_fecha,|{%d-%m-%Y}|)  as FECHA, p.p_grupo AS GRUPO , p.p_tipo AS TIPO,p.p_color AS COLOR, p.p_cant AS CANTIDAD from mnt_prod p, mov_compras c,  mnt_ajustes a where c.c_prov like '+el['prov']+' and c.c_ref = p.p_ref and a.aj_prod = p.p_cod and aj_fecha between '+el[desdeinv]+' and '+el[hastainv]+'  and p.prod_fin_pieza like '+el['fdp']+' and p.p_grupo like '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_color like '+el['p_color']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANTIDAD";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
