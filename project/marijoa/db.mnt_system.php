<?php
$Obj->name = "mnt_system";
$Obj->alias = "Pedidos de Mantenimiento";
$Obj->help = "Pedidos de Mantenimiento";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_pedidos";
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
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "_user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_BROW_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "asunto",
        F_ALIAS_ => "Asunto",
        F_HELP_ => "Asunto",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bug_pedido",
        F_ALIAS_ => "Pedido",
        F_HELP_ => "Pedido",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1000",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cancelado,En Progreso,Anulado",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1000",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_rsp",
        F_ALIAS_ => "Con Respuesta",
        F_HELP_ => "Respondido",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",X",
        F_BROW_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
