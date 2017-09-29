<?php
$Obj->name = "devol_rep";
$Obj->alias = "Reporte de Devoluciones";
$Obj->help = "Reporte de Devoluciones";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Efectivo,Tela,%",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dv_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "desde.hasChanged()||hasta.hasChanged()||tipo.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "devoluciones",
        F_SHOWFIELD_ => "distinct dv_nomcli,dv_cli",
        F_FILTER_ => "'dv_hoy between '+desde.getStr()+' and '+hasta.getStr()+' and forma like '+tipo.getStr()+' order by dv_cli asc'",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_rep",
        F_ALIAS_ => "Ver Reporte",
        F_HELP_ => "Ver Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.devol_rep",
        F_NODB_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
