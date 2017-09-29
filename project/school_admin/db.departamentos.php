<?php
$Obj->name = "departamentos";
$Obj->alias = "Departamentos";
$Obj->help = "Departamentos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "departamentos";
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
        F_NAME_ => "dep_nombre",
        F_ALIAS_ => "Nombre del Departamento",
        F_HELP_ => "Nombre del Departamento",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
