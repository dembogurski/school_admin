<?php
$Obj->name = "orden_pago";
$Obj->alias = "Ordenes de Pago";
$Obj->help = "Ordenes de Pago";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "orden_pago";
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
        F_NAME_ => "o_ref",
        F_ALIAS_ => "Nro",
        F_HELP_ => "Nro",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_OPTIONS_ => "DB",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "o_benef",
        F_ALIAS_ => "Beneficiario",
        F_HELP_ => "Beneficiario",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "o_ci",
        F_ALIAS_ => "CI/RUC ",
        F_HELP_ => "CI/RUC ",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "o_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "o_chq",
        F_ALIAS_ => "Cheque N�",
        F_HELP_ => "Cheque N�",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "o_cta",
        F_ALIAS_ => "N� Cuenta",
        F_HELP_ => "N� Cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "62",
        F_ORD_ => "54",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "o_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_ORD_ => "56",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "o_monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "58",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "o_bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "o_conc",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "2048",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
