<?php
$Obj->name = "as_libro_diario";
$Obj->alias = "Informes Contables";
$Obj->help = "Informes Contables";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
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
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,*",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre,emp_cod",
        F_FILTER_ => "'true order by emp_cod asc '",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta la Fecha",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Generar Libro Diario",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.libro_diario",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "emp_bus",
        F_ALIAS_ => "Buscar Cuenta",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "emp_cta_cont",
        F_ALIAS_ => "Codigo Cuenta ",
        F_HELP_ => "Codigo Cuenta Contable",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "emp_bus.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "plan_cuentas",
        F_SHOWFIELD_ => "c_cod,c_descrip",
        F_FILTER_ => "'c_descrip like |{'+emp_bus.get()+'%}| limit 30'",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "56",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_mayor",
        F_ALIAS_ => "Generar Libro Mayor",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.libro_mayor",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_VIEW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "as_huerfanos",
        F_ALIAS_ => "Ver Asientos No Balanceados",
        F_HELP_ => "Ver Asientos No Balanceados",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.asient_desbalan",
        F_NODB_ => "1",
        F_ORD_ => "210",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "as_sumas",
        F_ALIAS_ => "Sumas y Saldos",
        F_HELP_ => "Ver Reporte de Sumas y Saldos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.sumas_y_saldos",
        F_NODB_ => "1",
        F_ORD_ => "220",
        F_INLINE_ => "1",
        G_SHOW_ => "1",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nivel",
        F_ALIAS_ => "Nivel",
        F_HELP_ => "Nivel",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,1,2,3,4,5,6",
        F_NODB_ => "1",
        F_ORD_ => "230",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Codigo",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "250",
        C_VIEW_ => "true",
        F_FORMULA_ => "emp_cta_cont.get()+'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "as_balance",
        F_ALIAS_ => "Balance General",
        F_HELP_ => "Balance",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.balance_general",
        F_NODB_ => "1",
        F_ORD_ => "260",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Sucursal de Distribucion de Gastos",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc '",
        F_NODB_ => "1",
        F_ORD_ => "265",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_prorateo",
        F_ALIAS_ => "Prorateo entre Sucursales",
        F_HELP_ => "Prorateo entre sucursales",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.prorrat_gastos",
        F_NODB_ => "1",
        F_ORD_ => "270",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
