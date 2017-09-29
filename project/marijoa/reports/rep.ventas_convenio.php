<?php
$Obj->name = "ventas_convenio";
$Obj->alias = "Ventas con convenios";
$Obj->doc = "Ventas con convenios";
$Obj->help = "Ventas con convenios";
$Obj->query = "'select f.fact_nro as FACT,fact_localidad as SUC, DATE_FORMAT(f.fact_fecha,|{%d-%m-%Y}|) AS FECHA, f.fact_nom_cli AS CLIENTE ,f.fact_cli_ci AS CI_RUC,f.fact_tipo AS TIPO,f.fact_nro_orden AS NRO_ORDEN, c.conv_nombre AS CONVENIO,c.conv_porc as  PORC, f.fact_moneda AS MONEDA, f.fact_cotiz AS COTIZ, f.fact_total AS TOTAL from factura f, mnt_conv c where f.fact_conv = c.conv_cod and f.fact_fecha between '+el['desdeinv']+' and '+el['hastainv']+' and fact_localidad like '+el['empr']+' and f.fact_conv like '+el['convenios']+' and c.conv_tipo like '+el['tipo_conv']+' ORDER BY f.fact_fecha' ";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
