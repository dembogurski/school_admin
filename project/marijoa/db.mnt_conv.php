<?php
$Obj->name = "mnt_conv";
$Obj->alias = "Convenios";
$Obj->help = "Mantenimiento de Convenios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_conv";
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
        F_NAME_ => "conv_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del Convenio",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "conv_nombre",
        F_ALIAS_ => "Convenio",
        F_HELP_ => "Nombre del Convenio",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "conv_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de convenio",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Convenio,Tarjeta Credito,Tarjeta Debito",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "conv_porc",
        F_ALIAS_ => "Porcentaje",
        F_HELP_ => "Porcentaje",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "6",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "conv_dias_acr",
        F_ALIAS_ => "Dias p/acreditacion",
        F_HELP_ => "Dias p/acreditacion",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "conv_usuarios",
        F_ALIAS_ => "Usuarios",
        F_HELP_ => "Usuarios de ese convenio",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'us_conv='+el['conv_cod'].getStr()",
        F_LINK_ => "db.conv_usarios",
        F_SEND_ => "el['conv_cod'].get()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "el['conv_tipo'].get()=='Convenio'&&operation!=INSERT_",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "conv_busc",
        F_ALIAS_ => "Buscar Cuenta",
        F_HELP_ => "Buscar Cuenta",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "56",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "conv_cta_cont",
        F_ALIAS_ => "Cuenta Contable",
        F_HELP_ => "Cuenta Contable",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "conv_busc.hasChanged()",
        F_RELTABLE_ => "plan_cuentas",
        F_SHOWFIELD_ => "c_cod,c_descrip",
        F_FILTER_ => "'c_descrip like |{'+conv_busc.get()+'%}|'",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
