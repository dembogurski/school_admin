<?php
$Obj->name = "rep_prod_exist";
$Obj->alias = "Reporte de existencia actual de productos";
$Obj->ndoc = "Reporte de existencia actual de productos";
$Obj->help = "Reporte de existencia actual de productos";
$Obj->query = "'select p_cod as CODIGO, p_grupo as GRUPO, p_tipo as TIPO, p_color as COLOR, p_cant as STOCK_ACTUAL, (p_compra * p_cant) as VALOR_AL_COSTO, (p_precio_1 * p_cant) as VALOR_VENTA_1,(p_precio_2 * p_cant) as VALOR_VENTA_2,(p_precio_3 * p_cant) as VALOR_VENTA_3,(p_precio_4 * p_cant) as VALOR_VENTA_4,(p_precio_5 * p_cant)as VALOR_VENTA_5, p_precio_1 as PRECIO_1 FROM mnt_prod p WHERE p.p_local LIKE '+el['rep_localidad']+' AND   p.p_fam like '+el['p_fam']+' and p.p_grupo like  '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_comp like  '+el['p_comp']+' and p.p_temp like '+el['p_temp']+' and p.p_estruc like '+el['p_estruc']+'  and p.p_clasif like '+el['p_clasif']+'  and p.p_color like '+el['p_color']+' and p.p_lisoest like '+el['p_lisoest']+' and p.p_cant > 0 and prod_fin_pieza LIKE '+el['fdp']+' and p.p_cod like '+el['p_term']+' order by p_grupo, p_tipo, p_color'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "STOCK_ACTUAL,VALOR_AL_COSTO,VALOR_VENTA_1,VALOR_VENTA_2,VALOR_VENTA_3,VALOR_VENTA_4,VALOR_";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
