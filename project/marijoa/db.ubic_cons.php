<?php
$Obj->name = "ubic_cons";
$Obj->alias = "Ubicacion de Mercaderias";
$Obj->help = "Ubicacion de Mercaderias";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "ubic";
$Obj->Filter = "db.ubic";
$Obj->Sort = "id desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Deposito",
        F_HELP_ => "Deposito",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'emp_tipo=|{Deposito}|'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estante",
        F_ALIAS_ => "Estante",
        F_HELP_ => "Estante",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fila",
        F_ALIAS_ => "Fila",
        F_HELP_ => "Fila",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "col",
        F_ALIAS_ => "Columna",
        F_HELP_ => "Columna",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "insConsButton",
        F_ALIAS_ => "Boton Insertar",
        F_HELP_ => "Boton Insertar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ubic_hist",
        F_ALIAS_ => "Historial de Ubicaciones",
        F_HELP_ => "Historial de Ubicaciones",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.hist_ubic",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_SHOW_ => "codigo.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Generar reporte",
        F_HELP_ => "Generar reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ubic_cons",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
