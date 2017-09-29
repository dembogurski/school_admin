<?php
$Obj->name = "regist_testoria";
$Obj->alias = "Registro de Tesoreria";
$Obj->help = "Registro de Tesoreria";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "registro_tesoreria";
$Obj->Filter = "";
$Obj->Sort = "id desc";
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
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_oper",
        F_ALIAS_ => "Operaci�n",
        F_HELP_ => "Operaci�n",
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
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_cotiz",
        F_ALIAS_ => "Cotizaci�n",
        F_HELP_ => "Cotizaci�n",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
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
        F_DEC_ => "2",
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
        F_DEC_ => "2",
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
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_cta",
        F_ALIAS_ => "N� Cuenta",
        F_HELP_ => "N� Cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_dep",
        F_ALIAS_ => "N� Comprobante",
        F_HELP_ => "N� Comprobante",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_cotiz_calc",
        F_ALIAS_ => "Cotizacion Calculada",
        F_HELP_ => "Cotizacion Calculada",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
