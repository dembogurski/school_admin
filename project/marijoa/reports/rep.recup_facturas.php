<?php
$Obj->name = "recup_facturas";
$Obj->alias = "Reporte de Recupracion de Facturas";
$Obj->ndoc = "Reporte de Recupracion de Facturas";
$Obj->help = "Reporte de Recupracion de Facturas";
$Obj->query = "'select DISTINCT c.c_ref as FACTURA, p.p_cod as CODIGOS, (p.p_compra * p.p_cant_compra) AS TOTAL_VALOR_COMPRA,(c.c_valor_total * c.c_cambio) as TOTAL_REF, p.p_cant_compra AS TOTAL_MTS_COMPRADOS, suma_fracciones(p.p_cod) AS SUMA_FRAC,  p.p_cant_compra - suma_fracciones(p.p_cod) as DIFERENCIA   from mov_compras c,mnt_prod p where c.c_ref = p.p_ref and c.c_prov like '+el['prov']+' and c.c_moneda like '+el['moneda']+'  and c.c_fecha BETWEEN '+el['desdeinv']+' and '+el['hastainv']+' and c.c_ref like '+el['fact']+'  order by c.id asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL_VALOR_COMPRA,TOTAL_MTS_COMPRADOS";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
