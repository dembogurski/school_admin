<?php
$Obj->name = "cuotas_conv_con";
$Obj->alias = "Consultar Cuotas de Convenios";
$Obj->help = "Cuotas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cuotas_conv";
$Obj->Filter = "db.cuotas_conv";
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
        F_NAME_ => "ct_ref",
        F_ALIAS_ => "Nº Factura ",
        F_HELP_ => "Nº Factura Relacionada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_conv",
        F_ALIAS_ => "Convenio",
        F_HELP_ => "Convenio",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_cod,conv_nombre",
        F_BROW_ => "1",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_conv_n",
        F_ALIAS_ => "Nombre Convenio",
        F_HELP_ => "Nombre Convenio",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_nombre",
        F_RELFIELD_ => "conv_cod",
        F_LOCALFIELD_ => "ct_conv",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "29",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Pendiente,Cancelada",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
