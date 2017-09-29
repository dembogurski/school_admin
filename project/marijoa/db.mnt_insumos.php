<?php
$Obj->name = "mnt_insumos";
$Obj->alias = "Insumos";
$Obj->help = "Insumos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_insumos";
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
        F_NAME_ => "insumo_articulo",
        F_ALIAS_ => "Id Articulo",
        F_HELP_ => "Id Articulo",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "id_insumo",
        F_ALIAS_ => "ID de insumo",
        F_HELP_ => "ID de insumo",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_OPTIONS_ => "DB",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descripcion",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "precio",
        F_ALIAS_ => "Precio",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_QUERY_ => " ",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
