<?php
$Obj->name = "mnt_sol_ins_det";
$Obj->alias = "Pedido de Insumos detalle";
$Obj->help = "Pedido de Insumos detalle";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_sol_ins_det";
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
        F_NAME_ => "id_sol_insumo",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Identificador",
        F_TYPE_ => "text",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "si_sol_art",
        F_ALIAS_ => "Articulo",
        F_HELP_ => "Articulo",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_articulos",
        F_SHOWFIELD_ => "id_art,descripcion",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "si_sol_insumo",
        F_ALIAS_ => "Insumo",
        F_HELP_ => "Insumo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "si_sol_art.hasChanged()",
        F_RELTABLE_ => "mnt_insumos",
        F_SHOWFIELD_ => "id_insumo,descripcion",
        F_FILTER_ => "'insumo_articulo='+si_sol_art.getVal()",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "si_sol_cantidad",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "si_sol_can_env",
        F_ALIAS_ => "Cantida Enviada",
        F_HELP_ => "Cantida Enviada",
        F_TYPE_ => "text",
        F_DEC_ => "0",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
