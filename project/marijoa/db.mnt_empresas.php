<?php
$Obj->name = "mnt_empresas";
$Obj->alias = "Empresas";
$Obj->help = "Mantenimiento de Empresas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_empresas";
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
        F_ALIAS_ => "Código",
        F_HELP_ => "Código de la Empresa",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        F_UNIQ_ => "1",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "emp_nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre de la Empresa",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "emp_dir",
        F_ALIAS_ => "Dirección",
        F_HELP_ => "Dirección de la empresa",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "emp_ciudad",
        F_ALIAS_ => "Ciudad",
        F_HELP_ => "Ciudad de la Empresa",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "emp_tel",
        F_ALIAS_ => "Teléfono",
        F_HELP_ => "Teléfono de la empresa",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "emp_web",
        F_ALIAS_ => "Web",
        F_HELP_ => "Dirección Web",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "60",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "emp_mail",
        F_ALIAS_ => "Mail",
        F_HELP_ => "Mail de la empresa",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_ORD_ => "70",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

?>
