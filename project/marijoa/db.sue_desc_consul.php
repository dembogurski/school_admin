<?php
$Obj->name = "sue_desc_consul";
$Obj->alias = "Consultar descuentos a Funcionarios";
$Obj->help = "Consultar descuentos a Funcionarios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
$Obj->Filter = "db.sue_descuentos";
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
        F_NAME_ => "desc_orden",
        F_ALIAS_ => "Nº de Orden de Cobro",
        F_HELP_ => "Nº de Orden de Cobro",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "5",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_func",
        F_ALIAS_ => "Buscar Funcionario",
        F_HELP_ => "Busca al Funcionario",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_func_cod",
        F_ALIAS_ => "Funcionario",
        F_HELP_ => "Código y nombre compledo del Funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_func.hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_fullname LIKE |{'+busc_func.get()+'%}| ORDER BY func_cod '",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_actual",
        F_ALIAS_ => "Descuento Actual",
        F_HELP_ => "Suma total de Descuentos o Retiros en contra del funcionario",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "25",
        C_CHANGE_ => "false",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_monto",
        F_ALIAS_ => "Monto a descontar",
        F_HELP_ => "Monto a descontar",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_motivo",
        F_ALIAS_ => "Motivo",
        F_HELP_ => "Motivo",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "4000",
        F_ORD_ => "35",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desc_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado del Descuento (Pendiente o Cancelado) ",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "38",
        V_DEFAULT_ => "'Pendiente'",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
