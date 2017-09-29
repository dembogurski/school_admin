<?php
$Obj->name = "recup_factuGT";
$Obj->alias = "Reporte de Recupracion de Facturas";
$Obj->ndoc = "Reporte de Recupracion de Facturas";
$Obj->help = "Reporte de Recupracion de Facturas";
$Obj->query = "'SELECT DISTINCT c.c_ref AS FACTURA, p.p_cod AS CODIGOS,p.p_padre as PADRE, p.p_grupo AS GRUPO, p.p_tipo AS TIPO, p.p_cant_compra AS CANT_COMPRA, p.p_compra AS PRECIO_COMPRA, ((p.p_compra * p.p_cant_compra) * c.c_cambio) AS  VALOR_COMPRA  FROM mov_compras c,mnt_prod p WHERE c.c_ref = p.p_ref AND c.c_prov LIKE '+el['prov']+' AND c.c_moneda LIKE '+el['moneda']+' AND c.c_fecha BETWEEN '+el['desdeinv']+' AND '+el['hastainv']+' AND c.c_ref LIKE '+el['fact']+'  ORDER BY  p.p_grupo, p.p_tipo ASC '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT_COMPRA,PRECIO_COMPRA,VALOR_COMPRA";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
