<?php
$Obj->name = "liquid_sueldo";
$Obj->alias = "Liquidación de Sueldo";
$Obj->ndoc = "Liquidación de Sueldo";
$Obj->help = "Liquidación de Sueldo";
$Obj->query = "'SELECT sue_mes,anio,  s.sue_nro_liquid AS Nro,date_format(s.sue_fecha,|{%d-%m-%Y}|)  AS FECHA,f.func_fullname AS FUNCIONARIO,s.sue_sueldo_r AS SUELDO,s.sue_sum_comi AS VARIABLE,s.agui AS AGUINALDO,sue_total as TOTAL, adelantos AS ADELANTOS, s.ind AS INDEMNIZACION,s.vac AS VACACIONES,s.sue_feriado_r AS FERIADOS,sue_mo as MALAS_OPERACIONES,asociaciones as ASOCIACIONES,s.sue_extras_r AS EXTRAS,  s.sue_ips   AS IPS,s.TEL AS TELEFONIA,lc as LINEAS_CREDITO,aportes as APORTES,s.sue_reposo AS REPOSO,sue_sanciones as SANCIONES, sue_ausencia as AUSENCIAS ,reembolso as REEMBOLSOS,ajuste as AJUSTES, uniforme as UNIFORME FROM sueldos_func s, mnt_func f WHERE  s.sue_nro_liquid =  '+el['nro_liquid']+' and s.sue_cod_func = f.func_cod   '";
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
