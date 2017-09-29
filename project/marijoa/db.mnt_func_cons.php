<?php
$Obj->name = "mnt_func_cons";
$Obj->alias = "Buscar Funcionarios";
$Obj->help = "Funcionarios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_func";
$Obj->Filter = "db.mnt_func";
$Obj->Sort = "func_cod";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "200";
$Obj->Add(
    array(
        F_NAME_ => "func_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_lugar_trab",
        F_ALIAS_ => "Lugar de Trabajo",
        F_HELP_ => "Sucursal en a la que pertenece el Funcionario",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_BROW_ => "1",
        F_ORD_ => "15",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_fullname",
        F_ALIAS_ => "Nombre Completo",
        F_HELP_ => "Nombre Completo",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_estado",
        F_ALIAS_ => "Estado Actual",
        F_HELP_ => "Estado Actual del Funcionario",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Activo,Inactivo",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
