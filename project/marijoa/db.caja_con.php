<?php
$Obj->name = "caja_con";
$Obj->alias = "Conceptos";
$Obj->help = "Conceptos de Caja";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "caja_con";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "'UPDATE gastos SET g_con_n = '+cjc_ant.getStr()+' WHERE g_con_n = '+cjc_descri.getStr()";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "cjc_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo del concepto",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_descri",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción del concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de asiento",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "E,S",
        F_LENGTH_ => "1",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_autom",
        F_ALIAS_ => "Automático",
        F_HELP_ => "Asiento Automático solo el sistema puede preparar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_gasto",
        F_ALIAS_ => "Considerado Gasto",
        F_HELP_ => "Considerado Gasto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_BROW_ => "1",
        F_ORD_ => "55",
        C_SHOW_ => "cjc_tipo.get()=='S'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_er",
        F_ALIAS_ => "Balance",
        F_HELP_ => "Balance",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,E,S",
        F_BROW_ => "1",
        F_ORD_ => "56",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_ap",
        F_ALIAS_ => "Activo/Pasivo",
        F_HELP_ => "Activo/Pasivo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "A,P,G",
        F_BROW_ => "1",
        F_ORD_ => "58",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "inprimir",
        F_ALIAS_ => "Inprimir Conceptos",
        F_HELP_ => "Inprimir Conceptos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.caja_con",
        F_NODB_ => "1",
        F_ORD_ => "59",
        F_INLINE_ => "1",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "cjc_autom.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableChange",
        F_ALIAS_ => "Inhabilita boton de Modificar",
        F_HELP_ => "Inhabilita boton de Modificar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "false",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_sub_con",
        F_ALIAS_ => "Sub Concepto",
        F_HELP_ => "Sub Concepto",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cjc_cod like+ |{'+cjc_cod.get()+'-%}|  '",
        F_LINK_ => "db.caja_con_sub",
        F_SEND_ => "cjc_cod.get()",
        F_NODB_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_ant",
        F_ALIAS_ => "Descripcion anterior",
        F_HELP_ => "Descripcion anterior",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

?>
