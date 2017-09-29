<?php
$Obj->name = "reporte_compras";
$Obj->alias = "Reporte de Compras";
$Obj->ndoc = "Reporte de Compras";
$Obj->help = "Reporte de Compras";
$Obj->query = "'SELECT c.c_ref as Nro, c.c_fecha as FECHA,c.c_factura as FACTURA, e.emp_nombre as SUCURSAL, p.prov_nombre as PROVEEDOR, c.c_fechaFac as FECHA_FACTURA, c.c_moneda as MONEDA, c.c_cambio as CAMBIO, c.c_tipo AS TIPO,c.c_valor_total as VALOR  FROM mov_compras c, mnt_prov p, par_empresas e WHERE  c.c_estado = |{Cerrada}| and c.c_prov = p.prov_cod and c.c_empr = e.emp_cod and c.c_fecha_cierre between '+el['desdeinv']+' and '+el['hastainv']+' and c.c_empr like '+el['rep_localidad']+' and c.c_tipo like '+el['rep_cont_cred']+'  and c.c_prov like '+el['prov']+' and c.c_moneda like '+el['moneda']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "VALOR";
$Obj->dec_sub = "0";
$Obj->cond_tot = "true";
$Obj->total = "";
$Obj->dec_tot = "0";
$Obj->query_end = "";
?>
