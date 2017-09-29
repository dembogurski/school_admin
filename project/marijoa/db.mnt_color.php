<?php
$Obj->name = "mnt_color";
$Obj->alias = "Color";
$Obj->help = "Color del producto";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_color";
$Obj->Filter = "";
$Obj->Sort = "c_cod";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "c_cod",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción del color",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "134217906",
        G_CHANGE_ => "134217906"));

?>
