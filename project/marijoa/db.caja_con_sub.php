<?php
$Obj->name = "caja_con_sub";
$Obj->alias = "Sub Conceptos";
$Obj->help = "Conceptos de Caja";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "caja_con";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "'UPDATE gastos SET g_con_n = '+cjc_ant.getStr()+' WHERE g_con_n = '+cjc_descri.getStr()";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "cjc_padre",
        F_ALIAS_ => "Padre",
        F_HELP_ => "Padre",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_last",
        F_ALIAS_ => "Ultimo",
        F_HELP_ => "Ultimo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cjc_cod from caja_con where cjc_cod like |{'+sup['cjc_cod']+'%}| order by id desc limit 1'",
        F_QUERY_REF_ => "cjc_last.firstSQL&&cjc_padre.get()!=''",
        F_NODB_ => "1",
        F_ORD_ => "2",
        F_INLINE_ => "1",
        C_SHOW_ => "cjc_padre.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo del concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cjc_cod from caja_con where cjc_cod like |{'+sup['cjc_cod']+'%}| order by id desc limit 1'",
        F_QUERY_REF_ => "cjc_cod.firstSQL&&operation==INSERT_",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_descri",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción del concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de asiento",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "E,S",
        F_LENGTH_ => "1",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_autom",
        F_ALIAS_ => "Automático",
        F_HELP_ => "Asiento Automático solo el sistema puede preparar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_gasto",
        F_ALIAS_ => "Considerado Gasto",
        F_HELP_ => "Considerado Gasto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_BROW_ => "1",
        F_ORD_ => "54",
        C_SHOW_ => "cjc_tipo.get()=='S'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_er",
        F_ALIAS_ => "Balance",
        F_HELP_ => "Estado de Resultados",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,E,S",
        F_BROW_ => "1",
        F_ORD_ => "54",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_ap",
        F_ALIAS_ => "Activo/Pasivo",
        F_HELP_ => "Activo/Pasivo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "A,P,G",
        F_BROW_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "55",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( (cjc_last.get()==cjc_cod.get() )&&operation==INSERT_ ){ disableAcceptButton() }else{ enableAcceptButton()}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "cjc_autom.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_ant",
        F_ALIAS_ => "Descripcion anterior",
        F_HELP_ => "Descripcion anterior",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "70",
        F_FORMULA_ => "cjc_descri.get()",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_buscar",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cjc_cta_cont",
        F_ALIAS_ => "Codigo Cuenta Contable",
        F_HELP_ => "Codigo Cuenta Contable",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "cjc_buscar.hasChanged()",
        F_RELTABLE_ => "plan_cuentas",
        F_SHOWFIELD_ => "c_cod,c_descrip",
        F_FILTER_ => "'c_descrip like |{'+cjc_buscar.get()+'%}| limit 30'",
        F_LENGTH_ => "20",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
