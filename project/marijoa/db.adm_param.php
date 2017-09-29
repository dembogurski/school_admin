<?php
$Obj->name = "adm_param";
$Obj->alias = "Parámetros";
$Obj->help = "Parámetros diversos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "adm_param";
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
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "10",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "p_ejercicio",
        F_ALIAS_ => "Ejercicio",
        F_HELP_ => "Ejercicio Actual",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_desc_2",
        F_ALIAS_ => "Descuento 2",
        F_HELP_ => "Descuento para clientes tipo 2",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_desc_3",
        F_ALIAS_ => "Descuento 3",
        F_HELP_ => "Descuento para clientes tipo 3",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_desc_4",
        F_ALIAS_ => "Descuento 4",
        F_HELP_ => "Descuento para clientes tipo 4",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_desc_5",
        F_ALIAS_ => "Descuento 5",
        F_HELP_ => "Descuento para clientes tipo 5",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_desc_6",
        F_ALIAS_ => "Descuento 6",
        F_HELP_ => "Descuento para clientes tipo 6",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "63",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_desc_7",
        F_ALIAS_ => "Descuento 7",
        F_HELP_ => "Descuento para clientes tipo 7",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "66",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_margen",
        F_ALIAS_ => "Factor Margen",
        F_HELP_ => "Factor de Margen de Ganancia",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_DEC_ => "2",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_iva",
        F_ALIAS_ => "I.V.A.",
        F_HELP_ => "I.V.A.",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_DEC_ => "1",
        F_BROW_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_ruc_emp",
        F_ALIAS_ => "R.U.C. de la empresa",
        F_HELP_ => "R.U.C. de la empresa (Propia)",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "par_pgto_chq",
        F_ALIAS_ => "Concepto Pgto Cheque",
        F_HELP_ => "Concepto a ser utilizado para Pgto Cheque",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "bcos_ctas_con",
        F_SHOWFIELD_ => "bcc_descri",
        F_FILTER_ => "'bcc_autom=|{Si}|'",
        F_LENGTH_ => "5",
        F_ORD_ => "100",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod_tesoreria",
        F_ALIAS_ => "Codigo de Tesoreria",
        F_HELP_ => "Codigo de Tesoreria",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_limit",
        F_ALIAS_ => "Limite de Ventas para Liberar Precios",
        F_HELP_ => "Limite de Ventas para Liberar Precios",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "130",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "135",
        F_FORMULA_ => "'( ! )  Configuracion para Etiquetas (Codigos de Barras)... '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "etiq_font_size",
        F_ALIAS_ => "Tamaño de letra de Etiquetas",
        F_HELP_ => "Tamaño de letra de Etiquetas",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "140",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "etiq_izq_space",
        F_ALIAS_ => "Espacio de Izquierda a Derecha en Etiquetas",
        F_HELP_ => "Espacio de Izquierda a Derecha en Etiquetas",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_ORD_ => "150",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "etiq_dist",
        F_ALIAS_ => "Distancia entre Etiquetas",
        F_HELP_ => "Distancia entre Etiquetas",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "160",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "etiq_ancho",
        F_ALIAS_ => "Ancho de Etiqueta",
        F_HELP_ => "Ancho de Etiqueta",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "170",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "etiq_alto",
        F_ALIAS_ => "Alto de Etiqueta",
        F_HELP_ => "Alto de Etiqueta",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "180",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
