<?php
$Obj->name = "busc_prod";
$Obj->alias = "Filtrado de Productos";
$Obj->ndoc = "Filtrado de Productos";
$Obj->help = "Filtrado de Productos";
$Obj->query = "'SELECT p_cod as CODIGO,p_fam AS FAMILIA,p_grupo AS GRUPO,p_tipo AS TIPO,p_color AS COLOR,p_descri AS DESCRIPCION,p_cant AS CANT,p_local AS SUC, p_precio_1 as PRECIO_1,p_foto as FOTO,p_ref as REF FROM mnt_prod WHERE p_local LIKE '+el['p_local']+' AND p_fam LIKE '+el['p_fam']+' AND p_grupo LIKE '+el['p_grupo']+' AND p_tipo LIKE '+el['p_tipo']+' AND p_comp LIKE '+el['p_comp']+' AND p_temp LIKE '+el['p_temp']+' AND p_estruc LIKE '+el['p_estruc']+' AND p_clasif LIKE '+el['p_clasif']+' AND p_lisoest LIKE '+el['p_lisoest']+' AND p_color LIKE '+el['p_color']+' and prod_fin_pieza like '+el['prod_fin_pieza']+'  order by p_fam  LIMIT 1000;'";
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
