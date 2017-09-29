<?php
$Obj->name = "rep_compras_det";
$Obj->alias = "Reporte de Compras Detallado";
$Obj->ndoc = "Reporte de Compras Detallado";
$Obj->help = "Reporte de Compras Detallado";
$Obj->query = "'SELECT c.c_ref as Nro, c.c_fecha as FECHA, c.c_prov as PROV, c.c_empr as SUC,p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP,  p.p_temp as TEMP, p.p_estruc as ESTRUCT,  p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST,p.p_compra as VALOR, p_cant_compra as CANT_COMPRA FROM mov_compras c, mnt_prod p WHERE c.c_ref = p.p_ref and c.c_empr LIKE '+el['rep_localidad']+' and c.c_prov like '+el['c_prov']+' and p.p_fam like '+el['p_fam']+' and p.p_grupo like  '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_comp like  '+el['p_comp']+' and p.p_temp like '+el['p_temp']+' and p.p_estruc like '+el['p_estruc']+'  and p.p_clasif like '+el['p_clasif']+'  and p.p_color like '+el['p_color']+' and p.p_lisoest like '+el['p_lisoest']+' and c.c_fecha_cierre between '+el['desdeinv']+' and '+el['hastainv']+' and c.c_estado = |{Cerrada}| and p.p_padre = |{}| and c.c_moneda like '+el['moneda']+'   '";
$Obj->del_tpl = "";
$Obj->del_prg = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "VALOR,CANT_COMPRA";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
