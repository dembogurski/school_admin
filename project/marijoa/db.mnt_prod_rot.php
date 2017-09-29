<?php
$Obj->name = "mnt_prod_rot";
$Obj->alias = "Productos de Alta Rotacion";
$Obj->help = "Productos de Alta Rotacion";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prod_rot";
$Obj->Filter = "";
$Obj->Sort = "p_grupo,p_tipo asc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "bg",
        F_ALIAS_ => "Buscar Grupo",
        F_HELP_ => "Buscar Grupo",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "bg.hasChanged()",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_grupo,''",
        F_FILTER_ => "'p_grupo like |{'+bg.get()+'%}| limit 30'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bt",
        F_ALIAS_ => "Buscar Tipo",
        F_HELP_ => "Buscar Tipo",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "15",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Pago",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "bt.hasChanged()",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_tipo,''",
        F_FILTER_ => "'p_tipo like |{'+bt.get()+'%}| limit 30'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
