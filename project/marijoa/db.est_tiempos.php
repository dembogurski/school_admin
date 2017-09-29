<?php
$Obj->name = "est_tiempos";
$Obj->alias = "Reportes de Estadisticas de Tiempos de Ventas";
$Obj->help = "Reportes de Estadisticas de Tiempos de Ventas";
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
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'emp_cod <> |{03}| and emp_cod <> |{00}|  order by emp_cod asc'",
        F_LENGTH_ => "04",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Usuario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "suc.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "p_users",
        F_SHOWFIELD_ => "name,obs",
        F_FILTER_ => "'local like '+suc.getStr()+''",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "items",
        F_ALIAS_ => "Items",
        F_HELP_ => "Items (Cantidad de Productos)",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Ver Informe estadistico",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.est_tiempos",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "hasta.notEmpty()&&desde.notEmpty()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
		$Obj->Add(
    array(
        F_NAME_ => "gen_rep_turnos",
        F_ALIAS_ => "Estadistica de Atencion de (Turnos)",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.reg_turnos",
		F_INLINE_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "hasta.notEmpty()&&desde.notEmpty()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "it",
        F_ALIAS_ => "Items",
        F_HELP_ => "Items",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(items.getVal()==0){'%'}else{items.getVal()}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
