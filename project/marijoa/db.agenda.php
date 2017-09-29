<?php
$Obj->name = "agenda";
$Obj->alias = "Agenda";
$Obj->help = "Agenda";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "agenda";
$Obj->Filter = "";
$Obj->Sort = "nombre asc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Código",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "14",
        F_ORD_ => "2",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nombre",
        F_ALIAS_ => "Nombre o Razon Social",
        F_HELP_ => "Nombre o Razon Social",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tel",
        F_ALIAS_ => "Telefonos",
        F_HELP_ => "Telefonos",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dir",
        F_ALIAS_ => "Direccion",
        F_HELP_ => "Direccion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
