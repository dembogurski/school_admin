<?php
$Obj->name = "packing_cab";
$Obj->alias = "Cabecera de Packing";
$Obj->help = "Cabecera de Packing";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "packing_cab";
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
        F_NAME_ => "p_ref",
        F_ALIAS_ => "Ref",
        F_HELP_ => "Ref",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fecha",
        F_ALIAS_ => "Fecha de Inicio",
        F_HELP_ => "Fecha en que se descargo el Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_transp",
        F_ALIAS_ => "Transportadora",
        F_HELP_ => "Transportadora",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_super",
        F_ALIAS_ => "Supervisor",
        F_HELP_ => "Supervisor",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_integrantes",
        F_ALIAS_ => "Integrantes",
        F_HELP_ => "Integrantes",
        F_TYPE_ => "text",
        F_LENGTH_ => "500",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_obs",
        F_ALIAS_ => "Obs",
        F_HELP_ => "Obs",
        F_TYPE_ => "text",
        F_LENGTH_ => "1024",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierto,Cerrado",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fecha_cierre",
        F_ALIAS_ => "Fecha de Cierre",
        F_HELP_ => "Fecha de Cierre",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
