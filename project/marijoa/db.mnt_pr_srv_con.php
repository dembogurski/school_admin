<?php
$Obj->name = "mnt_pr_srv_con";
$Obj->alias = "Proveedores de Servicios Consultar";
$Obj->help = "Mantenimiento de Proveedores";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prov_serv";
$Obj->Filter = "db.mnt_prov_serv";
$Obj->Sort = "prov_nombre";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "prov_nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre del Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_ruc",
        F_ALIAS_ => "RUC",
        F_HELP_ => "RUC del Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
