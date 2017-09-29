<?php
$Obj->name = "mnt_cli_view";
$Obj->alias = "Clietes Consultas";
$Obj->help = "Clietes Consultas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_cli";
$Obj->Filter = "";
$Obj->Sort = "cli_fullname";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
$Obj->Limit = "100";
$Obj->Add(
    array(
        F_NAME_ => "cli_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_ci",
        F_ALIAS_ => "Nro Cédula o R.U.C.",
        F_HELP_ => "Nro Cédula del Cliente o R.U.C.",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_fullname",
        F_ALIAS_ => "Nombre y Apellido",
        F_HELP_ => "Nombre y Apellido del Cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_cat",
        F_ALIAS_ => "Categoría",
        F_HELP_ => "Categoría del Cliente",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "categorias",
        F_SHOWFIELD_ => "cat_code,cat_descrip",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_limit",
        F_ALIAS_ => "Limite de Credito",
        F_HELP_ => "Limite de Credito",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "42",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "cli_nro_cta",
        F_ALIAS_ => "Nº de Cuenta Corriente",
        F_HELP_ => "Nº de Cuenta Corriente del cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_tel1",
        F_ALIAS_ => "Telefono 1",
        F_HELP_ => "Telefono 1",
        F_TYPE_ => "text",
        F_LENGTH_ => "13",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_tel2",
        F_ALIAS_ => "Telefono 2",
        F_HELP_ => "Telefono 2",
        F_TYPE_ => "text",
        F_LENGTH_ => "13",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_emai",
        F_ALIAS_ => "Email",
        F_HELP_ => "Email",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_dir",
        F_ALIAS_ => "Dirección",
        F_HELP_ => "Dirección",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "300",
        F_BROW_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_convenios",
        F_ALIAS_ => "Convenios",
        F_HELP_ => "Convenios",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'us_ci='+el['cli_ci'].getStr()",
        F_LINK_ => "db.us_conv",
        F_SEND_ => "el['cli_ci'].get()",
        F_RELTABLE_ => "cli_conv",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "allValid",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_fecha_ins",
        F_ALIAS_ => "Fecha Alta",
        F_HELP_ => "Fecha Alta",
        F_TYPE_ => "date",
        F_ORD_ => "150",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_suc",
        F_ALIAS_ => "Sucursal Alta",
        F_HELP_ => "Sucursal Alta",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_ORD_ => "160",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "cli_vend",
        F_ALIAS_ => "Vendedor Asignado",
        F_HELP_ => "Vendedor Asignado",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_ORD_ => "170",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "262190",
        G_CHANGE_ => "36"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableAccept",
        F_ALIAS_ => "Inhabilita boton de Aceptar",
        F_HELP_ => "Inhabilita boton de Aceptar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(cli_ci.get()=='80005190-4'){disableAcceptButton()}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

?>
