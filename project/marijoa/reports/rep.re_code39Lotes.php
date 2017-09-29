<?php
$Obj->name = "codigo_barras";
$Obj->alias = "Codigo de Barras";
$Obj->ndoc = "Codigo de Barras";
$Obj->help = "Genera e imprmime codigo de barras";
$Obj->query = "'select distinct p_ref as REF, p_cod as CODIGO_BARRAS, p_local as LOCALIDAD,p_descri, p_fam, p_grupo,p_tipo,p_comp,p_temp,p_estruc,p_clasif,p_color,p_cant, p_precio_1 as PRECIO,p_ancho ,p_echo_en ,p_import  from mnt_prod where p_cod =  '+el[f_cod]+' limit 1'";
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
