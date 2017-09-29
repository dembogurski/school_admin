<?php
$Obj->name = "alumnos";
$Obj->alias = "Alumnos";
$Obj->help = "Registro de Alumnos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "alumnos";
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
        F_NAME_ => "nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre",
        F_TYPE_ => "text",
        F_LENGTH_ => "36",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "apellido",
        F_ALIAS_ => "Apellido",
        F_HELP_ => "Apellido",
        F_TYPE_ => "text",
        F_LENGTH_ => "36",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "doc",
        F_ALIAS_ => "N° Documento",
        F_HELP_ => "N° Documento",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_doc",
        F_ALIAS_ => "Tipo Doc",
        F_HELP_ => "Tipo Doc",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "C.I.,DNI,RG,Otro",
        F_SHOWFIELD_ => "cj_ref",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_nac",
        F_ALIAS_ => "Fecha Nacimiento",
        F_HELP_ => "Fecha Nacimiento",
        F_TYPE_ => "date",
        F_ORD_ => "50",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "dir",
        F_ALIAS_ => "Direccion",
        F_HELP_ => "Direccion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "200",
        F_ORD_ => "60",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "tel1",
        F_ALIAS_ => "Telefono",
        F_HELP_ => "Telefono",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_ORD_ => "70",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Activo,Inactivo",
        F_BROW_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "tutor",
        F_ALIAS_ => "Tutor o Titular",
        F_HELP_ => "Tutor o Titular",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "ruc_tutor",
        F_ALIAS_ => "CI/RUC Tutor",
        F_HELP_ => "CI/RUC Tutor",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_REQUIRED_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "tel_tutor",
        F_ALIAS_ => "Tel Tutor",
        F_HELP_ => "Tel Tutor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_ORD_ => "110",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "grado",
        F_ALIAS_ => "Grado",
        F_HELP_ => "Grado",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "grados",
        F_SHOWFIELD_ => "cod,descrip",
        F_FILTER_ => "'true order by cod asc'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
