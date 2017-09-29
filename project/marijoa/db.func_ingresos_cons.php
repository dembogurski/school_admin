<?php
$Obj->name = "func_ingresos_c";
$Obj->alias = "Ingresos de Funcionarios Consultar";
$Obj->help = "Ingresos de Funcionarios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "func_ingresos";
$Obj->Filter = "db.func_ingresos";
$Obj->Sort = "id desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "3",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_func",
        F_ALIAS_ => "Buscar Funcionario",
        F_HELP_ => "Busca al Funcionario",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_func_cod",
        F_ALIAS_ => "Funcionario",
        F_HELP_ => "Código y nombre compledo del Funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_func.hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_fullname LIKE |{'+busc_func.get()+'%}| ORDER BY func_cod LIMIT 20'",
        F_BROW_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_func_nomb",
        F_ALIAS_ => "Nombre del funcionario",
        F_HELP_ => "Nombre del funcionario",
        F_TYPE_ => "text",
        F_QUERY_ => "'select func_fullname from mnt_func where func_cod = '+desc_func_cod.getStr()+' '",
        F_QUERY_REF_ => "desc_func_cod.hasChanged()",
        F_LENGTH_ => "50",
        F_ORD_ => "30",
        C_SHOW_ => "operation==BROWSE_",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desc_monto",
        F_ALIAS_ => "Monto  ",
        F_HELP_ => "Monto ",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_motivo",
        F_ALIAS_ => "Motivo",
        F_HELP_ => "Motivo",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "4000",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desc_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado del Descuento (Pendiente o Cancelado) ",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Pendiente,Cancelado",
        F_BROW_ => "1",
        F_ORD_ => "60",
        V_DEFAULT_ => "'%'",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
