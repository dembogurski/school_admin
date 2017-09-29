<?php
$Obj->name = "rep_stock";
$Obj->alias = "Reporte de Stock";
$Obj->ndoc = "Reporte de Stock";
$Obj->help = "Reporte de Stock";
$Obj->query = "'SELECT c.c_ref as Nro, c.c_fecha as FECHA, c.c_prov as PROV, p.p_local as SUC,p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP,  p.p_temp as TEMP, p.p_estruc as ESTRUCT,  p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST, p.p_cant as CANTIDAD,p.p_compra AS VALOR FROM mov_compras c, mnt_prod p where c.c_ref = p.p_ref and p.p_local LIKE '+el['rep_localidad']+' and c.c_prov like '+el['c_prov']+' and p.p_fam like '+el['p_fam']+' and p.p_grupo like  '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_comp like  '+el['p_comp']+' and p.p_temp like '+el['p_temp']+' and p.p_estruc like '+el['p_estruc']+'  and p.p_clasif like '+el['p_clasif']+'  and p.p_color like '+el['p_color']+' and p.p_lisoest like '+el['p_lisoest']+' and p.prod_fin_pieza like '+el['fdp']+' and c.c_fecha between '+el['desdeinv']+' and '+el['hastainv']+' and c.c_estado = |{Cerrada}| and p.p_cant > 0 ' ";
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
