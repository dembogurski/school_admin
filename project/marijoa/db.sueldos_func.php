<?php
$Obj->name = "sueldos_func";
$Obj->alias = "Registro de Sueldos";
$Obj->help = "Pago de sueldos y comisiones de funcionarios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "sueldos_func";
$Obj->Filter = "";
$Obj->Sort = "sue_fecha desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "sue_bloqueo",
        F_ALIAS_ => "Bloquea el boton insert",
        F_HELP_ => "Bloquea el boton insert",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_SHOW_ => "sue_bloqueo.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_nro_liquid",
        F_ALIAS_ => "Nº de Liquidación",
        F_HELP_ => "Nº de Liquidación",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "8",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha en que se realiza la operación",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "5",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_localidad",
        F_ALIAS_ => "Obtiene la localidad del usuario actual",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "sue_localidad.firstSQL",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_ORD_ => "7",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_mes",
        F_ALIAS_ => "Mes",
        F_HELP_ => "Mes en cuestion para liquidación de sueldo.",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "meses",
        F_SHOWFIELD_ => "m_code,m_mes",
        F_LOCALFIELD_ => " ",
        F_REQUIRED_ => "1",
        F_ORD_ => "8",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "anio",
        F_ALIAS_ => "Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select LEFT(CURRENT_DATE,4)'",
        F_QUERY_REF_ => "anio.firstSQL",
        F_LENGTH_ => "5",
        F_DEC_ => "0",
        F_ORD_ => "8",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_dias_hab",
        F_ALIAS_ => "Dias Hábiles",
        F_HELP_ => "Cantidad de dias hábiles para este mes",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select m_dias_habiles from meses where m_code ='+sue_mes.getVal()+''",
        F_QUERY_REF_ => "sue_mes.hasChanged()||sue_mes.onChange()",
        F_RELFIELD_ => " ",
        F_LOCALFIELD_ => " ",
        F_LENGTH_ => "3",
        F_REQUIRED_ => "1",
        F_ORD_ => "9",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_buscar_func",
        F_ALIAS_ => "Buscar Funcionario",
        F_HELP_ => "Busca el Funcionario ",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_SHOW_ => "sue_mes.get()!=''",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_cod_func",
        F_ALIAS_ => "Funcionario",
        F_HELP_ => "Código y nombre completo del funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "el['sue_buscar_func'].hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_fullname",
        F_FILTER_ => "'(func_fullname LIKE |{%'+el['sue_buscar_func'].get()+'%}| or func_cod LIKE |{'+el['sue_buscar_func'].get()+'%}| ) and func_estado = |{Activo}|'",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_SHOW_ => "sue_mes.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "search",
        F_ALIAS_ => "Buscar Datos",
        F_HELP_ => "Buscar Datos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "21",
        F_INLINE_ => "1",
        C_SHOW_ => "sue_cod_func.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_funcnombre",
        F_ALIAS_ => "Nombre Completo",
        F_HELP_ => "Nombre completo del funcionario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT func_fullname from mnt_func where func_cod = '+sue_cod_func.getStr()",
        F_QUERY_REF_ => "search.hasChanged()||operation==SHOW_",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "22",
        C_VIEW_ => "operation==CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_ci",
        F_ALIAS_ => "C.I.",
        F_HELP_ => "C.I.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT func_ci from mnt_func where func_cod = '+sue_cod_func.getStr()",
        F_QUERY_REF_ => "sue_cod_func.hasChanged()",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "22",
        C_VIEW_ => "operation==INSERT_",
        C_CHANGE_ => "false",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_ult_pago",
        F_ALIAS_ => "Ultima fecha de Pago",
        F_HELP_ => "Ultima Fecha en que se pago al funcionario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT MAX(sue_fecha) FROM sueldos_func WHERE sue_cod_func = '+sue_cod_func.getStr()+''",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "10",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_lugar_trab",
        F_ALIAS_ => "Sucursal donde Trabaja",
        F_HELP_ => "Sucursal en que trabaja el funcionario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select func_lugar_trab  from mnt_func where func_cod = '+ el['sue_cod_func'].getStr()",
        F_QUERY_REF_ => "search.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        C_VIEW_ => "sue_cod_func.get()!=''&&search.get()=='Si'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "anio_mes",
        F_ALIAS_ => " Año y Mes  ",
        F_HELP_ => "Año y Mes",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "27",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "anio.get()+|{-}|+sue_mes.get()+|{-%}|",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_hab",
        F_ALIAS_ => "***********",
        F_HELP_ => "Bloquea el boton insert",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "27",
        C_SHOW_ => "true",
        C_VIEW_ => "true",
        F_FORMULA_ => "'HABERES'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_descs",
        F_ALIAS_ => "***************",
        F_HELP_ => "Bloquea el boton insert",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "27",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "true",
        F_FORMULA_ => "'DESCUENTOS'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_sueldo_r",
        F_ALIAS_ => "Pago Basico              ",
        F_HELP_ => "Sueldo Real del empleado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT func_sueldo_r from mnt_func where func_cod ='+el['sue_cod_func'].getStr()+''",
        F_QUERY_REF_ => "search.hasChanged()&& sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "28",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_ausencia",
        F_ALIAS_ => "Ausencias           ",
        F_HELP_ => "Ausencias",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM sue_descuentos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_sub_motivo LIKE |{Ausencia}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_sum_comi",
        F_ALIAS_ => "Variable o Premio",
        F_HELP_ => "Total Comisiones y/o Variable",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM func_ingresos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_motivo LIKE |{Variable o Premio}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "32",
        V_DEFAULT_ => "0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_mo",
        F_ALIAS_ => "Malas Operaciones",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM sue_descuentos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_sub_motivo LIKE |{Mala Operacion}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "33",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "agui",
        F_ALIAS_ => "Aguinaldo",
        F_HELP_ => "Aguinaldo",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "34",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_sanciones",
        F_ALIAS_ => "Sanciones          ",
        F_HELP_ => "Descuento por Sancion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM sue_descuentos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_sub_motivo LIKE |{Sancion}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vac",
        F_ALIAS_ => "Vacaciones",
        F_HELP_ => "Vacaciones",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM func_ingresos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_motivo LIKE |{Vacaciones}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "36",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tel",
        F_ALIAS_ => "Telefonia            ",
        F_HELP_ => "Telefonia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM sue_descuentos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Linea Telefonica}| AND desc_sub_motivo LIKE |{Sancion}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "38",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_feriado_r",
        F_ALIAS_ => "Feriados",
        F_HELP_ => "Feriado",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "40",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "lc",
        F_ALIAS_ => "Linea de Credito",
        F_HELP_ => "Linea de Credito",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT SUM(d_monto)  FROM  factura f, cuotas_det_pago d WHERE f.fact_nro = d.d_ref AND f.fact_cli_ci = '+sue_ci.getStr()+'  AND d_fecha LIKE  '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "44",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_extras_r",
        F_ALIAS_ => "Horas Extras",
        F_HELP_ => "Horas Extras R",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT func_h_extras from mnt_func where func_cod ='+el['sue_cod_func'].getStr()+''",
        F_QUERY_REF_ => "search.hasChanged()&& sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "46",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aportes",
        F_ALIAS_ => "Aporte Solidario",
        F_HELP_ => "Aporte Solidario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM sue_descuentos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_sub_motivo LIKE |{Aporte Solidario}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "48",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reembolso",
        F_ALIAS_ => "Reembolsos",
        F_HELP_ => "Reembolsos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM func_ingresos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_motivo LIKE |{Reembolso}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "50",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "adelantos",
        F_ALIAS_ => "Adelantos           ",
        F_HELP_ => "Adelantos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT SUM(desc_monto) FROM pagos_adelantados WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND fecha LIKE '+anio_mes.getStr()+''",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ind",
        F_ALIAS_ => "Indemnizacion",
        F_HELP_ => "Indemnizacion",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "56",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "asociaciones",
        F_ALIAS_ => "Asociaciones     ",
        F_HELP_ => "Asociaciones",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM sue_descuentos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_sub_motivo LIKE |{Asociacion}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "esp1",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_ips",
        F_ALIAS_ => "I.P.S.                    ",
        F_HELP_ => "I.P.S. Instituto de Previsión Social",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT func_ips from mnt_func where func_cod ='+el['sue_cod_func'].getStr()+''",
        F_QUERY_REF_ => "search.hasChanged()&& sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "esp2",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_reposo",
        F_ALIAS_ => "Reposo               ",
        F_HELP_ => "Reposo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM sue_descuentos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_sub_motivo LIKE |{Reposo}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "esp3",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "102",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ajuste",
        F_ALIAS_ => "Ajuste                 ",
        F_HELP_ => "Ajuste",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM sue_descuentos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_sub_motivo LIKE |{Ajuste}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "104",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "esp4",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "102",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "uniforme",
        F_ALIAS_ => "Uniforme           ",
        F_HELP_ => "Uniforme",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(desc_monto) FROM sue_descuentos WHERE desc_func_cod = '+sue_cod_func.getStr()+' AND desc_estado = |{Pendiente}| AND desc_sub_motivo LIKE |{Uniforme}| and fecha like '+anio_mes.getStr()+' '",
        F_QUERY_REF_ => "search.hasChanged()&&sue_cod_func.get()!=''",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_ORD_ => "104",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		

$Obj->Add(
    array(
        F_NAME_ => "sue_dias_trab",
        F_ALIAS_ => "Dias Trabajados",
        F_HELP_ => "Cantidad de dias trabajados que se desea pagar",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_ORD_ => "110",
        V_DEFAULT_ => "30",
        C_SHOW_ => "sue_dias_hab.get()!=''",
        F_POSVAL_ => "sue_dias_trab.getVal() <= sue_dias_hab.getVal()",
        F_MESSAGE_ => "'Los dias trabajados no pueden ser mayor a los dias habiles!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_total",
        F_ALIAS_ => "Total ",
        F_HELP_ => "Haberes - Descuentos",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        V_DEFAULT_ => "0",
        C_SHOW_ => "((sue_sueldo_r.get()!=''||sue_sum_comi.get()!='')&&sue_dias_hab.get()!='')",
        F_FORMULA_ => "(sue_sueldo_r.getVal()+sue_sum_comi.getVal()+agui.getVal()+vac.getVal()+sue_feriado_r.getVal()+sue_extras_r.getVal()+ind.getVal()+reembolso.getVal() )  - ( sue_ausencia.getVal()+sue_mo.getVal()+sue_sanciones.getVal()+tel.getVal()+lc.getVal()+aportes.getVal()+adelantos.getVal()+asociaciones.getVal()+sue_ips.getVal()+sue_reposo.getVal()+ajuste.getVal()+uniforme.getVal() )",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_habilitar",
        F_ALIAS_ => "Registrar",
        F_HELP_ => "Registrar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "130",
        F_INLINE_ => "1",
        C_SHOW_ => "sue_cod_func.get()!=''&&allValid",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "200",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{esp1}|).setAttribute(|{disabled}|,|{true}|);  document.getElementById(|{sue_hab}|).setAttribute(|{disabled}|,|{true}|); document.getElementById(|{sue_descs}|).setAttribute(|{disabled}|,|{true}|); document.getElementById(|{esp2}|).setAttribute(|{disabled}|,|{true}|);   document.getElementById(|{esp3}|).setAttribute(|{disabled}|,|{true}|);  document.getElementById(|{esp4}|).setAttribute(|{disabled}|,|{true}|); ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__makeInsert",
        F_ALIAS_ => "Fuerza el insert",
        F_HELP_ => "Fuerza el insert",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "sue_habilitar.get()=='Si'&&__makeInsert.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "forceInsert()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
