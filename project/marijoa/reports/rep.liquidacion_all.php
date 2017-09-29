<?php
$Obj->name = "liquidacion_all";
$Obj->alias = "Liquidacion de todos los funcionarios";
$Obj->doc = "Liquidacion de todos los funcionarios";
$Obj->help = "Liquidacion de todos los funcionarios";
$Obj->query = "'SELECT s.sue_nro_liquid AS Nro,f.func_fullname AS Funcionario,date_format(s.sue_fecha,|{%d-%m-%Y}|) AS Fecha,s.sue_localidad AS Suc,s.sue_mes AS Mes,s.sue_dias_trab AS dt,s.sue_sueldo AS Sueldo_C,s.sue_extras AS extras_c,s.sue_feriado_c AS feriado_c,s.prec AS preaviso_c,s.indc AS Ind_c,s.vacc AS Vac_c,s.sue_reposo AS reposo,  s.sue_reposo  AS TOTAL_CONT,s.sue_ips AS IPS, s.sue_ips*16.5/25.5 AS Aporte_Pat,s.sue_ips*9/25.5 AS Aporte_Obrero,s.sue_desc_actual AS Descuento,s.sue_recup AS Recup,  s.sue_recup  AS TOTAL_PAGAR_1,  s.sue_recup   AS DIFF_SALARIO, s.sue_sum_comi AS Comision, s.agui AS Aguinaldo,s.pre AS Preaviso,s.ind AS Indenm,s.vac AS Vacaciones,s.sue_extras_r AS Horas_ExtrasR,   s.sue_extras_r AS TOTAL_PAGAR_2  from  sueldos_func s, mnt_func f WHERE f.func_cod =s.sue_cod_func and sue_fecha BETWEEN '+el['fecha_inv']+' AND  '+el['hastainv']+'  AND sue_cod_func LIKE  '+el['func_code']+' AND sue_localidad LIKE '+el['localidad']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL_CONT,TOTAL_PAGAR_1,TOTAL_PAGAR_2,DIFF_SALARIO";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>



