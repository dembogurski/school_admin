<?php
$Obj->name = "lista_gr_tipo";
$Obj->alias = "Lista de Precios por Grupo y Tipo";
$Obj->ndoc = "Lista de Precios por Grupo y Tipo";
$Obj->help = "Lista de Precios por Grupo y Tipo";
$Obj->query = "'SELECT p.p_cod AS CODIGO,p.p_fam AS FAM, p.p_grupo AS GRUPO,p.p_tipo AS TIPO,p.p_comp AS COMP,p.p_temp AS TEMP,p.p_estruc AS ESTR, p.p_clasif AS CLASIF,p.p_color AS COLOR,p.p_lisoest AS LISOEST, p.p_local AS SUC,p.p_precio_1 AS PRECIO_1,p.p_precio_2 AS PRECIO_2,p.p_precio_3 AS PRECIO_3,p.p_precio_4 AS PRECIO_4,p.p_precio_5 AS PRECIO_5 FROM mnt_prod p,tmp_grupo_tipo t where p.p_grupo = t.grupo and p.p_tipo = t.tipo group by t.grupo , t.tipo'";
$Obj->del_tpl = "1";
$Obj->del_prg = "";
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
