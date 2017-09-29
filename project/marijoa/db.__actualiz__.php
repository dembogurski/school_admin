<?php
$Obj->name = "__actualiz__";
$Obj->alias = "Actualizaciones automaticas";
$Obj->help = "Actualizaciones automaticas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "__actualiz__";
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
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "x1",
        F_ALIAS_ => "X1",
        F_HELP_ => "X1",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "x2",
        F_ALIAS_ => "X2",
        F_HELP_ => "X2",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "y1",
        F_ALIAS_ => "Y1",
        F_HELP_ => "Y1",
        F_TYPE_ => "text",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "y2",
        F_ALIAS_ => "Y2",
        F_HELP_ => "Y2",
        F_TYPE_ => "text",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
