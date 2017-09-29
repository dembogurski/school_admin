<?php
$Obj->name = "frac_x_color";
$Obj->alias = "Fraccionamiento por Color";
$Obj->ndoc = "Fraccionamiento por Color";
$Obj->help = "Fraccionamiento por Color";
$Obj->query = "'SELECT p_cod AS CODIGO, p_fam AS FAMILIA, p_grupo AS GRUPO, p_tipo AS TIPO,p_color AS COLOR,p_lisoest AS LISO, p_descri AS DESCRIP, p_cant_compra AS CANT_COMPRA, p_cant AS CANT,p_ancho AS ANCHO, p_gram AS GRAMAJE, prod_fin_pieza as FP FROM mnt_prod WHERE p_ref = '+el['c_ref']+' AND p_padre = |{}| '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT_COMPRA,CANT";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
