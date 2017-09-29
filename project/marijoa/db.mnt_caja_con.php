<?php
$Obj->name = "mnt_caja_con";
$Obj->alias = "Conceptos de Caja";
$Obj->help = "Conceptos de Caja";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_caja_con";
$Obj->Filter = "";
$Obj->Sort = "cc_oper,cc_autom,cc_descri";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "cc_cod",
        F_ALIAS_ => "C�digo",
        F_HELP_ => "C�digo del Concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        F_UNIQ_ => "1",
        G_SHOW_ => "4",
        G_CHANGE_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "cc_descri",
        F_ALIAS_ => "Descripci�n",
        F_HELP_ => "Descripci�n del Concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "4",
        G_CHANGE_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "cc_oper",
        F_ALIAS_ => "Operaci�n",
        F_HELP_ => "Operaci�n que puede efectuar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",E,S",
        F_LENGTH_ => "1",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "4",
        G_CHANGE_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "cc_autom",
        F_ALIAS_ => "Autom�tico",
        F_HELP_ => "Si sisrve solamente para asientos autom�ticos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "4",
        G_CHANGE_ => "4"));

?>
