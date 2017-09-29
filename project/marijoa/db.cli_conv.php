<?php
$Obj->name = "cli_conv";
$Obj->alias = "Convenios de Cliente";
$Obj->help = "Convenios de Cliente";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cli_conv";
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
        F_NAME_ => "conv_cli_ci",
        F_ALIAS_ => "Nº Cedula o R.U.C.",
        F_HELP_ => "Nº Cedula o R.U.C.",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "conv_cli_cod",
        F_ALIAS_ => "Codigo del Convenio",
        F_HELP_ => "Codigo del Convenio",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_nombre",
        F_LENGTH_ => "45",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
