<?php
$Obj->name = "fact_compra";
$Obj->alias = "Factura de Compra";
$Obj->ndoc = "Factura de Compra";
$Obj->help = "Factura de Compra";
$Obj->query = "'select p_cod as CODIGO, p_fam as FAMILIA, p_grupo as GRUPO, p_tipo as TIPO, p_comp as COMPOSICION, p_color as COLOR,p_descri as DESCRIP, p_compra as PRECIO_COMPRA,p_cant as CANTIDAD, p_c_total as SUBTOTAL from mnt_prod where p_ref = '+el[c_ref]+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "PRECIO_COMPRA,CANTIDAD,SUBTOTAL ";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
