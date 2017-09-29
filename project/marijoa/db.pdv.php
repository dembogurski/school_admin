<?php
$Obj->name = "pdv";
$Obj->alias = "Puntos de Venta";
$Obj->help = "Puntos de Venta";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "pdv";
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
        F_NAME_ => "p_suc",
        F_ALIAS_ => "Suc",
        F_HELP_ => "Suc",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "C�digo",
        F_HELP_ => "C�digo del Punto de Venta",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_ubic",
        F_ALIAS_ => "Ubicacion",
        F_HELP_ => "Ubicacion",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
