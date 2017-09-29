<?php
$Obj->name = "mnt_fam";
$Obj->alias = "Sectores";
$Obj->help = "Sectores del producto";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_fam";
$Obj->Filter = "";
$Obj->Sort = "f_cod";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "f_cod",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Codigo de familas del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "134217906",
        G_CHANGE_ => "134217906"));

?>
