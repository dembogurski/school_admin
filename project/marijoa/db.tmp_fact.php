<?php
$Obj->name = "tmp_fact";
$Obj->alias = "Tmp Factura";
$Obj->help = "Tmp Factura";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp_fact";
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
        F_NAME_ => "fact_nro_",
        F_ALIAS_ => "Nro",
        F_HELP_ => "Nro",
        F_TYPE_ => "text",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "random",
        F_ALIAS_ => "Nº Randomico",
        F_HELP_ => "Nº Randomico",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
