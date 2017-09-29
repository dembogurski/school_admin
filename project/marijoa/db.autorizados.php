<?php
$Obj->name = "autorizados";
$Obj->alias = "Autorizados";
$Obj->help = "Autorizados Para Retiro de Mercaderias";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "autorizados";
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
        F_NAME_ => "cli_ruc",
        F_ALIAS_ => "RUC Cliente",
        F_HELP_ => "RUC Cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ruc_auth",
        F_ALIAS_ => "CI RUC Autorizado",
        F_HELP_ => "CI o RUC del Autorizado",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nombre_auth",
        F_ALIAS_ => "Nombre del Autorizado",
        F_HELP_ => "Nombre del Autorizado",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tel_auth",
        F_ALIAS_ => "Telefono Autorizado",
        F_HELP_ => "Telefono Autorizado",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dir_auth",
        F_ALIAS_ => "Direccion",
        F_HELP_ => "Direccion",
        F_TYPE_ => "text",
        F_LENGTH_ => "100",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
