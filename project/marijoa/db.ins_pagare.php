<?php
$Obj->name = "ins_pagare";
$Obj->alias = "Generar Pagares";
$Obj->help = "Generar Pagares";
$Obj->copy_from = "";
$Obj->Inheritance = "pagares";
$Obj->File = "pagares";
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
        F_NAME_ => "pg_deudor",
        F_ALIAS_ => "Deudor",
        F_HELP_ => "Deudor",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Obtiene Nro de caja Abierta de esta Suc",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "false",
        F_MESSAGE_ => " ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
