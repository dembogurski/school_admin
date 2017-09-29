<?php
$Obj->name = "faltantes";
$Obj->alias = "Reporte de Productos Faltantes";
$Obj->ndoc = "Reporte de Productos Faltantes";
$Obj->help = "Reporte de Productos Faltantes";
$Obj->query = "'SELECT fact_nro AS FACTURA, turno AS TURNO,usuario AS USUARIO, date_format(fecha, |{%d-%m-%Y}|) AS FECHA, suc AS SUC,p_fam AS FAMILIA, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR,cant AS CANT, obs AS OBS FROM mnt_prod_falt  WHERE fecha BETWEEN '+el['desde']+' AND '+el['hasta']+' AND suc LIKE '+el['suc']+' AND cat LIKE '+el['cat']+' AND p_fam LIKE '+el['p_fam']+' AND p_grupo LIKE '+el['p_grupo']+' AND p_tipo LIKE '+el['guia_tipo']+' AND p_color LIKE '+el['p_color']+' order by p_fam, p_grupo, p_tipo, p_color '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
