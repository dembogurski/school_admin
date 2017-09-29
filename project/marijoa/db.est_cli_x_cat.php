<?php
$Obj->name = "est_cli_x_cat";
$Obj->alias = "Reporte de Estructura de Clientes x Categoria";
$Obj->help = "Reporte de Estructura de Clientes x Categoria";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_fam",
        F_ALIAS_ => "Buscar Sector",
        F_HELP_ => "Buscar Sector",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_fam.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_cod,''",
        F_FILTER_ => "'f_cod like |{'+b_fam.get()+'%}|'",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep",
        F_ALIAS_ => "Generar Informe",
        F_HELP_ => "Ver Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.est_cli_x_cat",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
