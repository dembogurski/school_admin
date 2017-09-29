<?php
$Obj->name = "fdp_compras";
$Obj->alias = "Reporte de Fines de Pieza relacionados con Compras";
$Obj->ndoc = "Reporte de Fines de Pieza relacionados con Compras";
$Obj->help = "Reporte de Fines de Pieza relacionados con Compras";
$Obj->query = "'select c.c_ref as NRO_REF_FACT,c.c_factura as FACTURA_REAL,  DATE_FORMAT(c_fecha,|{%d-%m-%Y}|) as FECHA_COMPRA,p.p_cod as CODIGO, p.p_cant AS CANTIDAD,  p.p_padre as PADRE,p.p_grupo as GRUPO, p.p_tipo AS TIPO,p.p_color AS COLOR, p.p_descri as DESCRIP from mnt_prod p, mov_compras c where  c.c_ref = p.p_ref and c_fecha between  '+el[desdeinv]+' and '+el[hastainv]+' and p.p_local like '+el[nsuc]+'  and p.p_grupo like '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_color like '+el['p_color']+' and c.c_prov like '+el['prov']+' and c.c_ref like '+el['ref']+' order by p.p_grupo, p.p_tipo asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANTIDAD";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
