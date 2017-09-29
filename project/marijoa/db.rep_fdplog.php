<?php
$Obj->name = "rep_fdplog";
$Obj->alias = "Reporte de Finalizaciones de Piezas";
$Obj->help = "Reporte de Finalizaciones de Piezas";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Fecha desde",
        F_HELP_ => "Fecha desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "5",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Fecha hasta",
        F_HELP_ => "Fecha hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Nick de Usuario",
        F_HELP_ => "Nombre Usuario",
        F_TYPE_ => "text",
        F_LENGTH_ => "25",
        F_NODB_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod",
        F_ALIAS_ => "Codigo Poner % al final",
        F_HELP_ => "Codigo Poner % al final",
        F_TYPE_ => "text",
        F_LENGTH_ => "25",
        F_NODB_ => "1",
        F_ORD_ => "40",
        V_DEFAULT_ => "'%'",
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
        F_FILTER_ => "'true order by emp_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "genre",
        F_ALIAS_ => "Generar Reporte de Retazos",
        F_HELP_ => "Generar Informe",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.retazos",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "grupo",
        F_ALIAS_ => "Grupo Poner % al final",
        F_HELP_ => "Grupo",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "110",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Poner % al final",
        F_HELP_ => "Tipo",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "120",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "canti",
        F_ALIAS_ => "Cantidad > a",
        F_HELP_ => "Cantidad > a",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "140",
		V_DEFAULT_ => "0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_rem",
        F_ALIAS_ => "Remisiones a partir de la fecha:",
        F_HELP_ => "Remisiones a partir de la fecha:",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "146",
		V_DEFAULT_ => "'20-10-2014'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Informe",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_log_fdp",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_VIEW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "genresumen",
        F_ALIAS_ => "Generar Reporte Resumido",
        F_HELP_ => "Generar Informe",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fdp_resumen",
        F_NODB_ => "1",
        F_ORD_ => "200",
        F_INLINE_ => "1",
        C_VIEW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

?>
