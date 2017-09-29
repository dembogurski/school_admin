<?php
$Obj->name = "mnt_monedas";
$Obj->alias = "Monedas";
$Obj->help = "Mantenimiento de Monedas existentes";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_monedas";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "m_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código de la Moneda",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        F_UNIQ_ => "1",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "m_nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre de la Moneda",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "m_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Si es la Unidad Referencial",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

?>
