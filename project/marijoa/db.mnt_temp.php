<?php
$Obj->name = "mnt_temp";
$Obj->alias = "Temporada";
$Obj->help = "Mantenimiento de temporada";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_temp";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "tp_cod",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Codigo de temporada",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "134217906",
        G_CHANGE_ => "134217906"));

?>
