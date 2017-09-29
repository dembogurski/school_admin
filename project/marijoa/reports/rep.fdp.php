<?php
$Obj->name = "fdp";
$Obj->alias = "Reporte de Productos con Fin de Pieza";
$Obj->ndoc = "Reporte de Productos con Fin de Pieza";
$Obj->help = "Reporte de Productos con Fin de Pieza";
$Obj->query = "'select  DATE_FORMAT( fecha,|{%d-%m-%Y}|)  as FECHA, p.p_grupo AS GRUPO , p.p_tipo AS TIPO,p.p_color AS COLOR, p.p_cant AS CANTIDAD from mnt_prod p, mov_compras c, prod_fdp f   where c.c_prov like '+el['prov']+' and c.c_ref = p.p_ref and instr(f.descrip ,p.p_cod) > 0 and  fecha between '+el[desdeinv]+' and '+el[hastainv]+'  and p.prod_fin_pieza like '+el['fdp']+' '";
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
