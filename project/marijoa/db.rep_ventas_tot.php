<?php
$Obj->name = "rep_ventas_tot";
$Obj->alias = "Reporte de Ventas Por Totales";
$Obj->help = "Reporte de Ventas Por Totales";
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
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_total_suc",
        F_ALIAS_ => "Reporte de Ventas Totales x SUC",
        F_HELP_ => "Reporte de Ventas Totales x SUC",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.totales_ven_suc",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_agr_suc",
        F_ALIAS_ => "Reporte de Ventas Agrupado x SUC y CATEGORIA",
        F_HELP_ => "Reporte de Ventas Totales x SUC",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.vent_agr_suc_ca",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_func",
        F_ALIAS_ => "Ventas de Funcionarios",
        F_HELP_ => "Ventas de Funcionarios",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.tot_ven_func",
        F_NODB_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_porc_ventas",
        F_ALIAS_ => "Reporte de Porcentaje de Ventas",
        F_HELP_ => "Reporte de Porcentaje de Ventas",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.porc_ventas_func",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "empr.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
