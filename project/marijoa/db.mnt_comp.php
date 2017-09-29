<?php
$Obj->name = "mnt_comp";
$Obj->alias = "Composicion";
$Obj->help = "Mantenimiento de composicion";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_comp";
$Obj->Filter = "";
$Obj->Sort = "cp_cod";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "cp_cod",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción de la composicion",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "134217906",
        G_CHANGE_ => "134217906"));

?>
