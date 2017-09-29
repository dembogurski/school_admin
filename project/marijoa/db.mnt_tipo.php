<?php
$Obj->name = "mnt_tipo";
$Obj->alias = "Tipo";
$Obj->help = "Mantenimiento del tipo";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_tipo";
$Obj->Filter = "";
$Obj->Sort = "t_cod";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "400";
$Obj->Add(
    array(
        F_NAME_ => "t_cod",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción del tipo",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "134217906",
        G_CHANGE_ => "134217906"));

?>
