<?php
$Obj->name = "rep_frac2";
$Obj->alias = "Reporte de Fraccionamientos";
$Obj->ndoc = "Reporte de Fraccionamientos";
$Obj->help = "Reporte de Fraccionamientos";
$Obj->query = "'select p_cod as CODIGO,p_grupo as GRUPO, p_tipo as TIPO, p_comp as COMP,  p_temp as TEMP, p_estruc as ESTRUCT,  p_color as COLOR, p_lisoest as LISOEST,p_descri as DESCRIPCION,p_cant as CANTIDAD,p_cant_compra as CANT_COMPRA,p_local as SUC,p_compra AS VALOR  FROM  mnt_prod where p_padre = '+el['cod_prod']+'  '";
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
