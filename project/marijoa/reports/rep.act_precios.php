<?php
$Obj->name = "act_precios";
$Obj->alias = "Actualizacion de Precios ";
$Obj->ndoc = "Actualizacion de Precios ";
$Obj->help = "Actualizacion de Precios ";
$Obj->query = "'SELECT p_cod as CODIGO,p_combinado as COMB,p_descri as DESCRIP,p_cant as CANT_ACT,p_compra as PRECIO_COMPRA,p_compra * p_cant as CANT_X_PR_COMPRA from mnt_prod  WHERE  p_fam like '+el[p_fam]+' and p_grupo like '+el[p_grupo]+' and p_tipo like '+el[p_tipo]+' and p_combinado like '+el[p_combinado]+' and (p_cod like '+el[anio]+' or p_cod like '+el[anio1]+' or p_cod like '+el[anio2]+'  or p_cod like '+el[anio3]+' or p_cod like '+el[anio4]+')  and p_local like '+el[p_local]+' and p_import like '+el[p_import]+'  and prod_fin_pieza like '+el[fdp]+' and p_precio_1 like '+el[p1]+' and p_compra like '+el[pc]+' and p_color like '+el[p_color]+'   '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT_ACT,PRECIO_COMPRA ,CANT_X_PR_COMPRA";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
