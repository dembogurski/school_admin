<?php
$Obj->name = "meses";
$Obj->alias = "Meses y dias habiles";
$Obj->help = "Meses y dias habiles";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "meses";
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
        F_NAME_ => "m_code",
        F_ALIAS_ => "Nº de Mes",
        F_HELP_ => "Nº de Mes o codigo identificador",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "01,02,03,04,05,06,07,08,09,10,11,12",
        F_LENGTH_ => "2",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "m_mes",
        F_ALIAS_ => "Mes",
        F_HELP_ => "Mes en Letras (Ej.: Enero)",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "m_dias_habiles",
        F_ALIAS_ => "Dias Habiles",
        F_HELP_ => "Dias Habiles que tiene este mes",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "m_cant_dias",
        F_ALIAS_ => "Cantidad de dias",
        F_HELP_ => "Cantidad de dias que tiene el mes",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
