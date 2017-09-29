<?php
$Obj->name = "cc_actualiz";
$Obj->alias = "Acreditacion de Tarjetas de Credito";
$Obj->help = "Acreditacion de Tarjetas de Credito";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cc_actualiz";
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
        F_NAME_ => "cc_fecha",
        F_ALIAS_ => "Fecha ",
        F_HELP_ => "Fecha en que se actualizara la cuenta corriente",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "cc_monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "cc_cc",
        F_ALIAS_ => "Cuenta Corriente Nº",
        F_HELP_ => "Nº de Cuenta Corriente",
        F_TYPE_ => "text",
        F_LENGTH_ => "25",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "cc_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "cc_concepto",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "100",
        F_ORD_ => "60",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

?>
