<?php
$Obj->name = "us_convenios";
$Obj->alias = "Convenios";
$Obj->help = "Convenios del Usuario";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "conv_usuarios";
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
        F_NAME_ => "us_ci",
        F_ALIAS_ => "Nº Cédula",
        F_HELP_ => "Nº Cédula",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "us_conv",
        F_ALIAS_ => "Convenio",
        F_HELP_ => "Convenio",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_nombre",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "us_nconv",
        F_ALIAS_ => "Nombre Convenio",
        F_HELP_ => "Nombre Convenio",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_nombre",
        F_RELFIELD_ => "conv_cod",
        F_LOCALFIELD_ => "us_conv",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "us_nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre",
        F_TYPE_ => "formula",
        F_LENGTH_ => "25",
        F_BROW_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['clie_nom']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "us_apell",
        F_ALIAS_ => "Apellido",
        F_HELP_ => "Apellido del Usuario",
        F_TYPE_ => "formula",
        F_LENGTH_ => "25",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['cli_apell']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "us_tel1",
        F_ALIAS_ => "Telefono1",
        F_HELP_ => "Telefono1",
        F_TYPE_ => "formula",
        F_LENGTH_ => "13",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['cli_tel1']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "us_tel2",
        F_ALIAS_ => "Telefono2",
        F_HELP_ => "Telefono2",
        F_TYPE_ => "formula",
        F_LENGTH_ => "13",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['cli_tel2']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "us_dir",
        F_ALIAS_ => "Dirección",
        F_HELP_ => "Dirección del Usuario",
        F_TYPE_ => "formula",
        F_LENGTH_ => "300",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['cli_dir']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "us_email",
        F_ALIAS_ => "Email",
        F_HELP_ => "Email del Usuario",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['cli_emai']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
