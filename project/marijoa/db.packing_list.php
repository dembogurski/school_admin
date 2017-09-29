<?php
$Obj->name = "packing_list";
$Obj->alias = "Packing List";
$Obj->help = "Packing List";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "packing_list";
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
        F_NAME_ => "pack_ref",
        F_ALIAS_ => "Ref. Compra",
        F_HELP_ => "Ref. Compra",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_design",
        F_ALIAS_ => "Desing/Descrip",
        F_HELP_ => "Desing/Descrip",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_mar",
        F_ALIAS_ => "Mar/Brand",
        F_HELP_ => "Mar",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_bag",
        F_ALIAS_ => "Bag Number/Nº Bulto",
        F_HELP_ => "Bag/Bulto",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio",
        F_ALIAS_ => "Precio",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color_desc",
        F_ALIAS_ => "Color Descrip",
        F_HELP_ => "Color Descrip",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_each_quty",
        F_ALIAS_ => "Each Quty.",
        F_HELP_ => "Each Quty.",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_unit",
        F_ALIAS_ => "Unit",
        F_HELP_ => "Unit",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Kg,Mts,Yds,Otro",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Código Rollo",
        F_HELP_ => "Código del Rollo",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_qty_ticket",
        F_ALIAS_ => "Qty Ticket",
        F_HELP_ => "Qty Ticket",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_kg_real",
        F_ALIAS_ => "Kg Real",
        F_HELP_ => "Kg Real",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_ancho",
        F_ALIAS_ => "Ancho",
        F_HELP_ => "Ancho",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "130",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_gram",
        F_ALIAS_ => "Gramaje",
        F_HELP_ => "Peso en Gramos x Metro Cuadrado",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_ORD_ => "140",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_foto",
        F_ALIAS_ => "Nº Foto",
        F_HELP_ => "Nº Foto",
        F_TYPE_ => "text",
        F_ORD_ => "150",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_obs",
        F_ALIAS_ => "Obs",
        F_HELP_ => "Obs",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "160",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_equiv",
        F_ALIAS_ => "Equivalencia",
        F_HELP_ => "Equivalencia",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_ORD_ => "170",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_mts",
        F_ALIAS_ => "Metros",
        F_HELP_ => "Metros",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_ORD_ => "180",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
