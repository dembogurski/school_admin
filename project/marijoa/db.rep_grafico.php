<?php
$Obj->name = "rep_grafico";
$Obj->alias = "Test Reportes Graficos";
$Obj->help = "Test Reportes Graficos";
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
        F_NAME_ => "gen",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Informe",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_grafico_vnt",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
