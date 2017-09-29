<?php
$Obj->name = "pedido_rep";
$Obj->alias = "Reporte de Pedidos Urgentes o de Reposicion";
$Obj->help = "Reporte de Pedidos Urgentes o de Reposicion";
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
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "origen",
        F_ALIAS_ => "Origen",
        F_HELP_ => "Origen",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "34",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "destino",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Destino",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "origen.hasChanged()",
        F_OPTIONS_ => "%,PR",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'emp_cod <> '+origen.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "36",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "50",
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
        F_ORD_ => "60",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "urge",
        F_ALIAS_ => "Urgente",
        F_HELP_ => "Urgente",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,No,Si",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "78",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pedidos_urg",
        F_ALIAS_ => "Ver Pedidos Urgentes / Reposicion",
        F_HELP_ => "Ver Pedidos Urgentes",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.pedidos_analisis",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_VIEW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "65824",
        G_CHANGE_ => "65824"));

$Obj->Add(
    array(
        F_NAME_ => "pedidos_tracking",
        F_ALIAS_ => "Tracking de Pedidos",
        F_HELP_ => "Tracking de Pedidos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.pedidos_tracking",
        F_NODB_ => "1",
        F_ORD_ => "200",
        F_INLINE_ => "1",
        C_VIEW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "65824",
        G_CHANGE_ => "65824"));

?>
