<?php
$Obj->name = "det_factura_edit";
$Obj->alias = "Detalle de Factura Modo Edición";
$Obj->help = "Detalle de Factura";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "det_factura";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "100";
$Obj->Add(
    array(
        F_NAME_ => "df_fact_num",
        F_ALIAS_ => "Nº de Factura",
        F_HELP_ => "Nº de Factura",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_REQUIRED_ => "1",
        F_ORD_ => "7",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_renglon",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº de Renglon",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_cod_prod",
        F_ALIAS_ => "Código de Producto",
        F_HELP_ => "Código de Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_descrip",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción de Producto ",
        F_TYPE_ => "text",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_precio",
        F_ALIAS_ => "Precio del Producto",
        F_HELP_ => "Precio del Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_cantidad",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad vendida",
        F_TYPE_ => "text",
        F_LENGTH_ => "9",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_subtotal",
        F_ALIAS_ => "Subtotal",
        F_HELP_ => "Subtotal",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        F_FORMULA_ => "df_precio.getVal() * df_cantidad.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
