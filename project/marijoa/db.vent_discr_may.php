<?php
$Obj->name = "vent_discr_may";
$Obj->alias = "Reporte de Ventas Discriminadas o Mayoristas";
$Obj->help = "Reporte de Ventas Discriminadas o Mayoristas";
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
        F_NAME_ => "empr",
        F_ALIAS_ => "Sucursal de Distribucion de Gastos",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
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
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Venta",
        F_HELP_ => "Tipo Venta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Discriminada,Mayoristas",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "40",
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
        F_NAME_ => "__rep",
        F_ALIAS_ => "Generar Reporte de Ventas",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.vent_discr_may",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
