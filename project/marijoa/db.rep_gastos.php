<?php
$Obj->name = "rep_gastos";
$Obj->alias = "Reporte de Gastos";
$Obj->help = "Reporte de Gastos";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_conc",
        F_ALIAS_ => "Buscar Concepto",
        F_HELP_ => "Buscar Concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "con",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_conc.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "' cjc_descri like |{'+busc_conc.get()+'%}| and cjc_cod not like |{%-%}|'",
        F_NODB_ => "1",
        F_ORD_ => "46",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sub",
        F_ALIAS_ => "Sub Concepto",
        F_HELP_ => "Sub Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "con.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_cod like |{'+con.get()+'-%}|'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_SHOW_ => "con.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sub_form",
        F_ALIAS_ => "Sub Concepto",
        F_HELP_ => "Sub Concepto",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "55",
        F_INLINE_ => "1",
        F_FORMULA_ => "if(sub.get()=='%'){con.get()+|{-%}|}else{sub.get()}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Fecha desde",
        F_HELP_ => "Fecha desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "60",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Fecha hasta",
        F_HELP_ => "Fecha hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "local",
        F_ALIAS_ => "Localidad (Sucursal)",
        F_HELP_ => "Localidad (Sucursal)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Usuario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "local.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "gastos",
        F_SHOWFIELD_ => "distinct g_user,''",
        F_FILTER_ => "'g_empr like '+local.getStr()+' AND g_fecha between |{'+desde.get()+'}| and |{'+hasta.get()+'}| order by g_user asc limit 20'",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "85",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "conp",
        F_ALIAS_ => "Conp",
        F_HELP_ => "Conp",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat('+con.getStr()+',|{%}|)'",
        F_QUERY_REF_ => "false",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "detallado",
        F_ALIAS_ => "Informe Detallado",
        F_HELP_ => "Informe Detallado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_NODB_ => "1",
        F_ORD_ => "96",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "compl_tot",
        F_ALIAS_ => "Totalizado por Concepto",
        F_HELP_ => "Totalizado por Concepto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "98",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Informe",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_gastos",
        F_NODB_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "gen_agrup",
        F_ALIAS_ => "Generar Reporte Mensual",
        F_HELP_ => "Generar InformeMensual",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.gastos_mensual",
        F_NODB_ => "1",
		F_INLINE_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		
$Obj->Add(
    array(
        F_NAME_ => "gen_apg",
        F_ALIAS_ => "Generar Reporte Activos Pasivos y Gastos",
        F_HELP_ => "Generar Informe de Activos ",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.apg",
        F_NODB_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

?>
