<?php
$Obj->name = "mnt_prod_hist";
$Obj->alias = "Historial de Cambios de Producto";
$Obj->help = "Historial de Cambios de Producto";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prod_hist";
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
        F_NAME_ => "c_codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_ini",
        F_ALIAS_ => "Cant. Inicial",
        F_HELP_ => "Cant. Inicial",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_e_s",
        F_ALIAS_ => "E/S",
        F_HELP_ => "Entrada o Salida",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cant",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad de Entrada o Salida",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_final",
        F_ALIAS_ => "Cant. Final",
        F_HELP_ => "Cant. Final",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_user",
        F_ALIAS_ => "Usuario DB",
        F_HELP_ => "Usuario de la Base de Datos",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fecha",
        F_ALIAS_ => "Fecha actual",
        F_HELP_ => "Fecha actual",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "70",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_hora",
        F_ALIAS_ => "Hora",
        F_HELP_ => "Hora",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_suc",
        F_ALIAS_ => "Suc",
        F_HELP_ => "Suc",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
