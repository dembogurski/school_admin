<?php
$Obj->name = "mnt_articulos";
$Obj->alias = "Articulos";
$Obj->help = "Articulos Pedidos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_articulos";
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
        F_NAME_ => "id_art",
        F_ALIAS_ => "ID",
        F_HELP_ => "id",
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
        F_ALIAS_ => "Nombre del articulo",
        F_HELP_ => "Nombre del articulo",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "insumos",
        F_ALIAS_ => "Insumos de este articulo",
        F_HELP_ => "Insumos",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'insumo_articulo='+id_art.getVal()",
        F_LINK_ => "db.mnt_insumos",
        F_SEND_ => "id_art.get()",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
