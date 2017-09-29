<?php
$Obj->name = "plan_cuentas";
$Obj->alias = "Plan de Cuentas";
$Obj->help = "Plan de Cuentas por Codigo";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "plan_cuentas";
$Obj->Filter = "";
$Obj->Sort = "c_cod asc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "1024";
$Obj->Add(
    array(
        F_NAME_ => "c_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_descrip",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_acent",
        F_ALIAS_ => "Acentable",
        F_HELP_ => "Acentable",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",*,Si",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_nivel",
        F_ALIAS_ => "Nivel",
        F_HELP_ => "Nivel",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",1,2,3,4,5,6",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_int",
        F_ALIAS_ => "Cuenta Integradora",
        F_HELP_ => "Cuenta Integradora",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_db_hb",
        F_ALIAS_ => "Debe/Haber",
        F_HELP_ => "Debe/Haber",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Debe,Haber",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_tipo",
        F_ALIAS_ => "Tipo de Cuenta",
        F_HELP_ => "Tipo de Cuenta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Activo,Pasivo,Ingresos,Egresos",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "65",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo_tmp",
        F_ALIAS_ => "Saldo Tmp",
        F_HELP_ => "Saldo Tmp",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "70",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo_tmp_suc",
        F_ALIAS_ => "Salto Tmp Suc",
        F_HELP_ => "Salto Tmp Suc",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
