<?php
$Obj->name = "recibos";
$Obj->alias = "Recibos";
$Obj->help = "Recibos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "recibos";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'select adjuntar_recibo_doc('+nro_rec.getStr()+','+ref.getStr()+')'";
$Obj->p_change = "'select adjuntar_recibo_doc('+nro_rec.getStr()+','+ref.getStr()+')'";
$Obj->p_delete = "'select adjuntar_recibo_doc('+nro_rec.getStr()+','+ref.getStr()+')'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_rec",
        F_ALIAS_ => "Nro de Recibo",
        F_HELP_ => "Nro de Recibo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "razon",
        F_ALIAS_ => "Nombre o Razon Social",
        F_HELP_ => "Nombre o Razon Social",
        F_TYPE_ => "formula",
        F_LENGTH_ => "64",
        F_BROW_ => "1",
        F_ORD_ => "20",
        F_FORMULA_ => "sup['prov']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "40",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
