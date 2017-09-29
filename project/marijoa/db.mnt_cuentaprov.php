<?php
$Obj->name = "mnt_cuentaprov";
$Obj->alias = "Cuentas Proveedores";
$Obj->help = "Cuentas de Proveedores";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_cuentaprov";
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
        F_NAME_ => "c_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cuenta",
        F_ALIAS_ => "Cuenta Corriente",
        F_HELP_ => "Cuenta Corriente",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_banco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco de la cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda Utilizada en la Cuenta",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_LENGTH_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_agencia",
        F_ALIAS_ => "Agencia",
        F_HELP_ => "Agencia del Banco",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_swift",
        F_ALIAS_ => "Swift",
        F_HELP_ => "Swift de la cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
