<?php
$Obj->name = "chq_formatos";
$Obj->alias = "Formatos de Cheques";
$Obj->help = "Formatos de Cheques";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "chq_formatos";
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
        F_NAME_ => "chq_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "chq_banco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "bcos",
        F_SHOWFIELD_ => "b_cod,b_nombre",
        F_BROW_ => "1",
        F_ORD_ => "15",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "chq_descrip",
        F_ALIAS_ => "Descripcion del Formato del Cheque",
        F_HELP_ => "Descripcion del Formato del Cheque",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "400",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

?>
