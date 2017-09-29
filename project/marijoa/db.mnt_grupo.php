<?php
$Obj->name = "mnt_grupo";
$Obj->alias = "Mantenimiento de grupo";
$Obj->help = "Mantenimiento de grupo utilizado";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_grupo";
$Obj->Filter = "";
$Obj->Sort = "g_cod";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "400";
$Obj->Add(
    array(
        F_NAME_ => "g_cod",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción del grupo",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "134217906",
        G_CHANGE_ => "134217906"));

?>
