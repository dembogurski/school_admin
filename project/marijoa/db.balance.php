<?php
$Obj->name = "balance";
$Obj->alias = "Balance";
$Obj->help = "Balance";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "balance";
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
        F_NAME_ => "b_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha en que se realiza la operación",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "2",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_con",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_cod not like |{%-%}|'",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_sub_con",
        F_ALIAS_ => "Sub Concepto",
        F_HELP_ => "Sub Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_con.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_cod like |{'+b_con.get()+'-%}|'",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_sc_nombre",
        F_ALIAS_ => "Nombre concepto",
        F_HELP_ => "Nombre concepto",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_descri",
        F_RELFIELD_ => "cjc_cod",
        F_LOCALFIELD_ => "b_sub_con",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_e",
        F_ALIAS_ => "Entrada",
        F_HELP_ => "Entrada",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_s",
        F_ALIAS_ => "Salida",
        F_HELP_ => "Salida",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_a",
        F_ALIAS_ => "Activo",
        F_HELP_ => "Activo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_p",
        F_ALIAS_ => "Pasivo",
        F_HELP_ => "Pasivo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
