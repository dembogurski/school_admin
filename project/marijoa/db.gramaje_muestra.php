<?php
$Obj->name = "gramaje_muestra";
$Obj->alias = "Gramaje de Muestra y Toma de Imagen";
$Obj->help = "Gramaje de Muestra y Toma de Imagen";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
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
        F_NAME_ => "gramaje_muestra_y_foto",
        F_ALIAS_ => "Primer Gramaje y Toma de Imagen",
        F_HELP_ => "Primer Gramaje y Toma de Imagen",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.gramaje_muestra",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "doclick2",
        F_ALIAS_ => "click",
        F_HELP_ => "Contro click",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "12",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{gramaje_muestra_y_foto}|).click(), self.close()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
