<?php
$Obj->name = "ajustes_x_user";
$Obj->alias = "Reporte de Ajustes x Usuario";
$Obj->help = "Reporte de Ajustes x Usuario";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
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
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc_",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "12",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario ",
        F_HELP_ => "Usuario",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "p_users",
        F_SHOWFIELD_ => "name",
        F_FILTER_ => "'true order by name asc'",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Generar reporte Grupo y Tipo",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ajustes_x_user",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_VIEW_ => "desde.get()!=''",
        G_SHOW_ => "270540800",
        G_CHANGE_ => "270540800"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "conc_ajuste",
        F_ALIAS_ => " ",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "false",
        F_FORMULA_ => "tipo_ajuste.get()+'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "oper",
        F_ALIAS_ => "Operacion",
        F_HELP_ => "Operacion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Aumento en Salida,Disminucion en Salida",
        F_NODB_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_ajuste",
        F_ALIAS_ => "Ajuste por:",
        F_HELP_ => "Tipo Ajuste",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Descuento,Mal Corte",
        F_NODB_ => "1",
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vendedor",
        F_ALIAS_ => "Filtrar Vendedor   Ej.:  patricia",
        F_HELP_ => "Vendedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "filtro_tol",
        F_ALIAS_ => "Usar Filtro de Tolerancia",
        F_HELP_ => "Usar Filtro de Tolerancia",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "75",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tolerancia",
        F_ALIAS_ => "Tolerancia en Centimetros x Metro",
        F_HELP_ => "Tolerancia en Centimetros x Metro",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "76",
        F_INLINE_ => "1",
        C_VIEW_ => "filtro_tol.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_salida",
        F_ALIAS_ => "Reporte de Ajustes en Salida",
        F_HELP_ => "Reporte de Ajustes en Salida",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ajuste_salida",
        F_NODB_ => "1",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_gerentes",
        F_ALIAS_ => "Reporte para Chequeo de Gerentes",
        F_HELP_ => "Reporte para Chequeo de Gerentes",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.control_ajustes",
        F_NODB_ => "1",
        F_ORD_ => "105",
        F_INLINE_ => "1",
        G_SHOW_ => "270540800",
        G_CHANGE_ => "270540800"));

$Obj->Add(
    array(
        F_NAME_ => "vend_porc",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Vendedor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "false",
        F_FORMULA_ => "'%'+vendedor.get()+'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
