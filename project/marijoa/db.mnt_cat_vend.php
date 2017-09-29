<?php
$Obj->name = "mnt_cat_vend";
$Obj->alias = "Categoria de Vendedores";
$Obj->help = "Categoria de Vendedores";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_cat_vend";
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
        F_NAME_ => "categ",
        F_ALIAS_ => "Categoria",
        F_HELP_ => "Categoria",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "a_min",
        F_ALIAS_ => "Antiguedad Minima",
        F_HELP_ => "Antiguedad Minima",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "a_max",
        F_ALIAS_ => "Antiguedad Maxima",
        F_HELP_ => "Antiguedad Maxima",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "meta",
        F_ALIAS_ => "Meta",
        F_HELP_ => "Meta",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sueldo_base",
        F_ALIAS_ => "Sueldo Base",
        F_HELP_ => "Sueldo Base",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pond_normal",
        F_ALIAS_ => "Ponderacion Sobre Ventas Normales",
        F_HELP_ => "Ponderacion Sobre Ventas Normales",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "90,100",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
