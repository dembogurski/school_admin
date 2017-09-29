<?php
$Obj->name = "inv_reps";
$Obj->alias = "Reportes de Inventario";
$Obj->help = "Reportes de Inventario";
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
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa a la que Corresponde",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Inventario",
        F_HELP_ => "Elija el Tipo de Inventario",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Peso,Unidad",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
