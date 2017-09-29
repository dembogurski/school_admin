<?php
$Obj->name = "ver_precios";
$Obj->alias = "Ver Precios 1,2,3,4,5";
$Obj->ndoc = "Ver Precios 1,2,3,4,5";
$Obj->help = "Ver Precios 1,2,3,4,5";
$Obj->query = "'SELECT p_cod as CODIGO,p_combinado as COMB, p_compra as PRECIO_COMPRA,p_precio_1,p_precio_2,p_precio_3,p_precio_4,p_precio_5 from mnt_prod   WHERE   p_fam like '+el[p_fam]+' and p_grupo like '+el[p_grupo]+' and p_tipo like '+el[p_tipo]+'  and p_combinado like '+el[p_combinado]+' and  (p_cod like '+el[anio]+' or p_cod like '+el[anio1]+' or p_cod like '+el[anio2]+'  or p_cod like '+el[anio3]+' or p_cod like '+el[anio4]+')   and p_local like '+el[p_local]+' and p_import like '+el[p_import]+'  and prod_fin_pieza like '+el[fdp]+'  and p_precio_1 like '+el[p1]+' and p_compra like '+el[pc]+' and p_color like '+el[p_color]+' '";
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
