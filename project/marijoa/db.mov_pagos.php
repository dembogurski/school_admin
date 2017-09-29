<?php
$Obj->name = "mov_pagos";
$Obj->alias = "Pagos";
$Obj->help = "Pagos referentes a compras efectuadas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mov_pagos";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "p_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fecha_venc",
        F_ALIAS_ => "Vencimiento",
        F_HELP_ => "Fecha de Vencimiento",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fecha_pago",
        F_ALIAS_ => "Fecha de Pago",
        F_HELP_ => "Fecha de Pago",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_valor",
        F_ALIAS_ => "Valor",
        F_HELP_ => "Valor a Pagar",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_valor_pag",
        F_ALIAS_ => "Valor Pagado",
        F_HELP_ => "Valor Pagado",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_FORMULA_ => "sup['c_moneda']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Pago",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Cheque,Deposito,Pagare",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "80",
        F_FORMULA_ => "sup['c_prov']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cuenta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta ",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "1234,2345,234234",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_bco_cuenta",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cuenta_prov",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta del Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "el['p_valor'].hasChanged()",
        F_RELTABLE_ => "mnt_cuentaprov",
        F_SHOWFIELD_ => "c_cuenta,c_banco",
        F_FILTER_ => "'c_prov='+el['p_prov'].getStr()",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
