<?php
$Obj->name = "par_Institucions";
$Obj->alias = "Instituciones Educativas";
$Obj->help = "Instituciones Educativas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "par_empresas";
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
        F_NAME_ => "emp_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo de Institucion",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
		F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "emp_nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre de la Institucion",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
		F_REQUIRED_ => "1",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "emp_ruc",
        F_ALIAS_ => "RUC",
        F_HELP_ => "RUC de la Institucion",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
		F_REQUIRED_ => "1",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "emp_dir",
        F_ALIAS_ => "Direccion",
        F_HELP_ => "Direccion de la Institucion",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "emp_tel",
        F_ALIAS_ => "Telefono",
        F_HELP_ => "Telefono de la Institucion",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "emp_mail",
        F_ALIAS_ => "Mail",
        F_HELP_ => "Mail de la Institucion",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "emp_web",
        F_ALIAS_ => "Web",
        F_HELP_ => "Direccion Web",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "emp_ciudad",
        F_ALIAS_ => "Ciudad",
        F_HELP_ => "Ciudad de la Institucion",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "emp_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Escuela,Colegio,Otro",
        F_BROW_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "emp_pdvs",
        F_ALIAS_ => "Puntos de Expedicion de Facturas",
        F_HELP_ => "Puntos de Expedicion de Facturas",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'p_suc='+emp_cod.getStr()",
        F_LINK_ => "db.pdv",
        F_SEND_ => "emp_cod.get()",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

  

?>
