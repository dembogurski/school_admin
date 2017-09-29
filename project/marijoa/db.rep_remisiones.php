<?php
$Obj->name = "rep_remisiones";
$Obj->alias = "Reporte de Notas de Remision";
$Obj->help = "Reporte de Notas de Remision";
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
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suco",
        F_ALIAS_ => "Suc Origen",
        F_HELP_ => "Suc Origen",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "' true order by emp_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sucd",
        F_ALIAS_ => "Suc Destino",
        F_HELP_ => "Suc Destino",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "detallado",
        F_ALIAS_ => "Informe Detallado",
        F_HELP_ => "Informe Detallado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "detalle_ventas",
        F_ALIAS_ => "Con detalle de Ventas del Periodo",
        F_HELP_ => "Informe Detallado de ventas por codigo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        C_SHOW_ => "detallado.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_cri",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo Inventario",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Ninguno,Porcentaje,Gramos",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dif_min",
        F_ALIAS_ => "Diferencia",
        F_HELP_ => "Diferencia",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_cri.get()!='Ninguno'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ventas_hasta",
        F_ALIAS_ => "Ventas Hasta la Fecha",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_SHOW_ => "detalle_ventas.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
 

$Obj->Add(
    array(
        F_NAME_ => "remision_estado",
        F_ALIAS_ => "Estado de la remision",
        F_HELP_ => "Estado de la remision",
        F_TYPE_ => "select_list",
        //F_OPTIONS_ => "%",
        F_RELTABLE_ => "nota_remision",   
        F_SHOWFIELD_ => "distinct(rem_estado),|{}|",
        F_FILTER_ => "'rem_estado <> |{}|'",
        F_NODB_ => "1",
        F_ORD_ => "550",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));


$Obj->Add(
    array(
        F_NAME_ => "rep_filtros",
        F_ALIAS_ => "Generar Reporte de Remision Por Estado",
        F_HELP_ => "Generar Reporte de Remision Por Estado",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.nota_remision_filtros",
        F_NODB_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));


$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.notas_remision",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "suco.get()!=sucd.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ref_dif_kg",
        F_ALIAS_ => "Generar Reporte de Diferencias de Kilaje",
        F_HELP_ => "Generar Reporte de Diferencias de Kilaje",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rem_diff_kg",
        F_NODB_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_VIEW_ => "suco.get()!=sucd.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
