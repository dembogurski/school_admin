<?php
$Obj->name = "reg_tesor_cons";
$Obj->alias = "Consulta de Registro de Tesoreria";
$Obj->help = "Consulta de Registro de Tesoreria";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "registro_tesoreria";
$Obj->Filter = "db.regist_testoria";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "reg_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de la operacion",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_oper",
        F_ALIAS_ => "Operación",
        F_HELP_ => "Operación",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_monto",
        F_ALIAS_ => "                   Monto          ",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_cotiz",
        F_ALIAS_ => "Cotización",
        F_HELP_ => "Cotización",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_mon_ref_e",
        F_ALIAS_ => "Monto Entrada",
        F_HELP_ => "Monto Entrada",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_mon_ref_s",
        F_ALIAS_ => "Monto Salida",
        F_HELP_ => "Monto Salida",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_dif",
        F_ALIAS_ => "     Diferencia",
        F_HELP_ => "Diferencia",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_cta",
        F_ALIAS_ => "Nº Cuenta",
        F_HELP_ => "Nº Cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_dep",
        F_ALIAS_ => "Nº Comprobante",
        F_HELP_ => "Nº Comprobante",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
