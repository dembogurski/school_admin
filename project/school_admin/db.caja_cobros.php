<?php
$Obj->name = "caja_cobros";
$Obj->alias = "Cobros";
$Obj->help = "Cobros";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "caja_cobros";
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
        F_NAME_ => "buscar",
        F_ALIAS_ => "Buscar Alumno",
        F_HELP_ => "Buscar Alumno",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "alumno",
        F_ALIAS_ => "Alumno",
        F_HELP_ => "Alumno",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "buscar.hasChanged()",
        F_RELTABLE_ => "alumnos",
        F_SHOWFIELD_ => "doc,concat(nombre,|{ }|,apellido)",
        F_FILTER_ => "' nombre like |{'+buscar.get+'%}| or apellido like |{'+buscar.get+'%}| '",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
