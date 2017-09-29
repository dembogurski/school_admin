<?php
$Obj->name = "mnt_exist";
$Obj->alias = "Existencia";
$Obj->help = "Existencia de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_exist";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "e_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "e_combinado",
        F_ALIAS_ => "Cod. Combinado",
        F_HELP_ => "Cod. Combinado del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "15",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "e_empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa en que se encuentra",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_empresas",
        F_SHOWFIELD_ => "emp_nombre",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "e_cant",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad Existente",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
