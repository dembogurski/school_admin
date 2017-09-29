<?php
$Obj->name = "rep_ventas_res";
$Obj->alias = "Reporte de Ventas Simplificado";
$Obj->ndoc = "Reporte de Ventas";
$Obj->help = "Reporte de Ventas";
$Obj->query = "'SELECT fact_nro as Nro, fact_fecha as FECHA,fact_emp_dir as LUGAR, fact_nom_cli as CLIENTE,fact_cli_cat as CATEGORIA, func_nombre as VENDEDOR,fact_comi_vend as COMISION,fact_tipo as TIPO, fact_total as TOTAL , fact_margen as MARGEN FROM factura  WHERE fact_tipo like  '+el['rep_cont_cred']+' and fact_vend_cod like '+el['rep_vend_cod']+'  and  fact_cli_ci like '+el['rep_cli']+' and fact_localidad like '+el['rep_localidad']+' and fact_fecha BETWEEN '+el['desdeinv']+' and '+el['hastainv']+' and fact_estado = |{Cerrada}| and fact_moneda like '+el['moneda']+' and fact_cli_cat  like '+el['cat']+' ' ";
$Obj->del_tpl = "";
$Obj->del_prg = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL,COMISION,MARGEN";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
