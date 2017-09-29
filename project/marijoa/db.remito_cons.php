<?php
$Obj->name = "remito_cons";
$Obj->alias = "Nota de Remision";
$Obj->help = "Nota de Remision";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "nota_remision";
$Obj->Filter = "db.remito";
$Obj->Sort = "id desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "100";
$Obj->Add(
    array(
        F_NAME_ => "rem_nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Numero del remito",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de emisión del remito",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "true",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "rem_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado Abierta, En Proceso, Cerrada",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Abierta,En Proceso,Cerrada",
        F_LENGTH_ => "12",
        F_ORD_ => "21",
        C_CHANGE_ => "false",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

?>
