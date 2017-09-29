<?php
$Obj->name = "bcos_ctas_con";
$Obj->alias = "Conceptos de cuentas";
$Obj->help = "Conceptos de cuentas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "bcos_ctas_con";
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
        F_NAME_ => "bcc_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo del concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bcc_descri",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bcc_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "E,S",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bcc_compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bcc_autom",
        F_ALIAS_ => "Automatico",
        F_HELP_ => "Automatico",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_gasto",
        F_ALIAS_ => "Considerado Gasto",
        F_HELP_ => "Considerado Gasto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "bcc_tipo.get()=='S'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bcc_er",
        F_ALIAS_ => "Estado de Resultados",
        F_HELP_ => "Estado de Resultados",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_ap",
        F_ALIAS_ => "Activo/Pasivo",
        F_HELP_ => "Activo/Pasivo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "A,P",
        F_BROW_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
