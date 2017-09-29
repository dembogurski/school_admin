<?php
$Obj->name = "prestamos_cons";
$Obj->alias = "Prestamos";
$Obj->help = "Prestamos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "prestamos";
$Obj->Filter = "db.prestamos";
$Obj->Sort = "nro_prestamo desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "razon",
        F_ALIAS_ => "Nombre o Razon Social",
        F_HELP_ => "Nombre o Razon Social",
        F_TYPE_ => "text",
        F_LENGTH_ => "64",
        F_BROW_ => "1",
        F_ORD_ => "21",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_comp",
        F_ALIAS_ => "Comprobante",
        F_HELP_ => "Comprobante",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "100",
        C_SHOW_ => "operation!=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "120",
        C_SHOW_ => "operation!=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cancelado,%",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "130",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
