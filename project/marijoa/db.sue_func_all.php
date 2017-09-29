<?php
$Obj->name = "sue_func_all";
$Obj->alias = "Impresion de Liquidaciones";
$Obj->help = "Impresion de Liquidaciones";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "sue_func_all";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "fact_mensaje",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "1",
        F_FORMULA_ => "'Para imprimir Liquidaciones anteriores Seleccione la Localidad y la  Fecha de liquidación!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bloqueo",
        F_ALIAS_ => "Bloqueo de boton aceptar",
        F_HELP_ => "Bloqueo de boton aceptar",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "2",
        C_SHOW_ => "bloqueo.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_localidad",
        F_ALIAS_ => "Obtiene Localidad",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "sue_localidad.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_caja_verif",
        F_ALIAS_ => "Caja",
        F_HELP_ => "Verificar si caja esta Abierto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cj_estado from caja where  cj_empr = '+sue_localidad.getStr()+' and cj_estado = |{Abierto}| limit 1'",
        F_QUERY_REF_ => "localidad.hasChanged()&&sue_localidad.get()!=''",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        F_POSVAL_ => "sue_caja_verif.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja Abierta para esta Fecha!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "localidad",
        F_ALIAS_ => "Localidad de los funcionarios",
        F_HELP_ => "Localidad de los funcionarios que desea pagar ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_nombre",
        F_RELFIELD_ => "emp_cod",
        F_LOCALFIELD_ => "localidad",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_SHOW_ => "localidad.notEmpty()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha en que se liquido",
        F_HELP_ => "Fecha en que se realiza la operación",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "7",
        V_DEFAULT_ => "thisDate_",
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
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
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
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
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
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "0",
        C_VIEW_ => "false",
        F_POSVAL_ => "sue_dias_trab.getVal()<=sue_dias_hab.getVal()",
        F_MESSAGE_ => "'Los dias trabajados no pueden ser mayor a los dias habiles!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "habilitar",
        F_ALIAS_ => "Pagar sueldo a todos los Funcionarios",
        F_HELP_ => "Pagar sueldo a todos los Funcionarios",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_BROW_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "sue_dias_trab.getVal()>0&&localidad.get()!=''&&sue_caja_verif.get()=='Abierto'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_pagar",
        F_ALIAS_ => "Confirmar Pago",
        F_HELP_ => "Paga sueldo y Comision a todos los funcionarios",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT sue_pay_all('+sue_dias_trab.getVal()+','+sue_mes.getVal()+','+localidad.getStr()+','+sue_dias_hab.getVal()+' )'",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "habilitar.get()=='Si'&&sue_dias_trab.getVal()>0&&localidad.get()!=''&&sue_caja_verif.get()=='Abierto'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_inv",
        F_ALIAS_ => "Fecha Invetida",
        F_HELP_ => "Fecha Invetida",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "false",
        C_CHANGE_ => "fecha.hasChanged()",
        F_FORMULA_ => "fecha.getYear()+'-'+fecha.getMonth()+'-'+fecha.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Fecha hasta",
        F_HELP_ => "Fecha hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "80",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hastainv",
        F_ALIAS_ => "Fecha hasta Invertida",
        F_HELP_ => "Fecha hasta Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        C_CHANGE_ => "hasta .hasChanged()",
        F_FORMULA_ => "hasta.getYear()+'-'+hasta.getMonth()+'-'+ hasta.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_func",
        F_ALIAS_ => "Buscar Funcionario",
        F_HELP_ => "Busca al Funcionario",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "95",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_code",
        F_ALIAS_ => "Funcionario",
        F_HELP_ => "Código y nombre compledo del Vendedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_func.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_fullname like |{'+busc_func.get()+'%}| or func_cod like |{'+busc_func.get()+'%}|  '",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir_all",
        F_ALIAS_ => "Imprimir Liquidación de la Fecha",
        F_HELP_ => "Imprime liquidaciones de la fecha de esta sucursal",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.liquidacion_all",
        F_BROW_ => "1",
        F_ORD_ => "180",
        C_SHOW_ => "localidad.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
