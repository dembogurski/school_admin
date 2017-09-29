<?php
$Obj->name = "plan_ctas_filter";
$Obj->alias = "Filtrar Cuentas Contables";
$Obj->help = "Plan de Cuentas por Codigo";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
$Obj->Filter = "";
$Obj->Sort = "c_cod asc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "1024";
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_descrip",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_nivel",
        F_ALIAS_ => "Nivel",
        F_HELP_ => "Nivel",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,1,2,3,4,5,6",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_ctas",
        F_ALIAS_ => "Plan Cuentas",
        F_HELP_ => "Plan Cuentas",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'c_cod like |{'+c_cod.get()+'%}| and c_descrip like |{'+c_descrip.get()+'%}| and c_nivel like |{'+c_nivel.get()+'}|  '",
        F_LINK_ => "db.plan_cuentas",
        F_SEND_ => "c_cod.get()",
        F_NODB_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
