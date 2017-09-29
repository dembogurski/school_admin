<?php
$Obj->name = "rep_mov_caja_ts";
$Obj->alias = "Reporte de Movimientos de caja Tesoreria x Nº de Caja";
$Obj->help = "Reporte de Movimientos de caja";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
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
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "'03'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reft",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja",
        F_SHOWFIELD_ => "cj_ref,DATE_FORMAT(cj_fecha,|{%d-%m-%Y}|)",
        F_FILTER_ => "'cj_empr = |{03}| order by id desc limit 10'",
        F_BROW_ => "1",
        F_ORD_ => "15",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "es",
        F_ALIAS_ => "Entrada/Salida",
        F_HELP_ => "Entrada/Salida",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,E,S",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mov_cons",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Mostrar Movimientos de Salida por Consolidacion?",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,55",
        F_NODB_ => "1",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_mov",
        F_ALIAS_ => "Ver Informe de Movimientos",
        F_HELP_ => "Ver Informe de Movimientos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_mov_caja_ts",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
