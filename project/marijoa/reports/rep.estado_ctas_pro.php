<?php
$Obj->name = "estado_ctas_pro";
$Obj->alias = "Estado de Cuentas Proveedores";
$Obj->ndoc = "Estado de Cuentas Proveedores";
$Obj->help = "Estado de Cuentas Proveedores";
$Obj->query = "'select c.ct_ref as REF,c.ct_estado as ESTADO,c.ct_prov as PROVEEDOR,c.ct_cod_prov AS COD_PROV, f.c_factura as FACTURA, DATE_FORMAT(f.c_fechafac,|{%d-%m-%Y}|) AS FECHA_FAC, c.ct_nro as NRO_CUOTA, f.c_moneda, DATE_FORMAT(c.ct_fecha_venc,|{%d-%m-%Y}|) AS FECHA_VENC, c.ct_monto as MONTO ,f.c_dev as DEV, f.c_descuento as DESCU, c_valor_factl as FL  from cuotas_pagar c, mov_compras f where  c.ct_ref = f.c_ref and c.ct_cod_prov like '+el[prov]+' and c.ct_cod_prov = f.c_prov   and f.c_fechafac BETWEEN '+el[desdeinv]+' and '+el[hastainv]+' and c.ct_estado like '+el[estado]+' order by c.ct_prov asc '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['PROVEEDOR']!=old['PROVEEDOR']";
$Obj->subtotal = "MONTO";
$Obj->dec_sub = "2";
$Obj->cond_tot = "true";
$Obj->total = "MONTO";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
