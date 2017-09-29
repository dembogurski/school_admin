<?php
$Obj->name = "rep_stock_min";
$Obj->alias = "Reporte de Stock Minimo";
$Obj->doc = "Reporte de Stock Minimo";
$Obj->help = "Reporte de Stock Minimo";
$Obj->query = "'SELECT  p.p_local as SUC,p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP, p.p_temp as TEMP, p.p_estruc as ESTRUCT,  p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST, p_cant as CANTIDAD,prod_fin_pieza as FDP, (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1) * p_cant   AS VALOR FROM  mnt_prod p where  p.p_local LIKE '+el['rep_localidad']+' and p.p_fam like '+el['p_fam']+' and p.p_grupo like  '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_comp like  '+el['p_comp']+' and p.p_temp like '+el['p_temp']+' and p.p_estruc like '+el['p_estruc']+'  and p.p_clasif like '+el['p_clasif']+'  and p.p_color like '+el['p_color']+' and p.p_lisoest like '+el['p_lisoest']+' and p.p_cant <=  '+el['rep_cantidad']+' AND prod_fin_pieza like '+el['fdp']+' and p.p_cant > 0 ' ";
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
