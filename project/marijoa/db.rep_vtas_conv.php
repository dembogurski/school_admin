<?php
$Obj->name = "rep_vtas_conv";
$Obj->alias = "Reporte de Ventas con Convenios";
$Obj->help = "Reporte de Ventas con Convenios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_conv",
        F_ALIAS_ => "Seleccione el Tipo de Convenio",
        F_HELP_ => "Seleccione el Tipo de Convenio",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "distinct conv_tipo,''",
        F_NODB_ => "1",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "convenios",
        F_ALIAS_ => "Convenios",
        F_HELP_ => "Convenios",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "tipo_conv.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_cod,conv_nombre",
        F_FILTER_ => "'conv_tipo='+tipo_conv.getStr()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "porc",
        F_ALIAS_ => "Porcentaje de Descuento",
        F_HELP_ => "Porcentaje de Descuento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select conv_porc from mnt_conv where conv_cod = '+convenios.getStr()+''",
        F_QUERY_REF_ => "convenios.hasChanged()",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "false",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "16",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Fecha desde",
        F_HELP_ => "Fecha desde",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Fecha hasta",
        F_HELP_ => "Fecha hasta",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ventas_convenio",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "desdeinv",
        F_ALIAS_ => "Fecha desde Invertida",
        F_HELP_ => "Fecha desde Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        C_CHANGE_ => "desde.hasChanged()",
        F_FORMULA_ => "desde.getYear()+'-'+desde.getMonth() +'-'+ desde.getDay()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hastainv",
        F_ALIAS_ => "Fecha hasta Invertida",
        F_HELP_ => "Fecha hasta Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        C_CHANGE_ => "hasta .hasChanged()",
        F_FORMULA_ => "hasta .getYear()+'-'+hasta.getMonth()+'-'+ hasta.getDay()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

?>
