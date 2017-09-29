<?php
$Obj->name = "inv_confec";
$Obj->alias = "Consultar Confecciones";
$Obj->help = "Inventario Confecciones";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "inv_confec";
$Obj->Filter = "db.inv_confec";
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
        F_NAME_ => "c_codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha actual",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "16",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
