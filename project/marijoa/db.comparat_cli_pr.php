<?php
$Obj->name = "comparat_cli_pr";
$Obj->alias = "Reporte Comparativo de Ventas por Producto";
$Obj->help = "Reporte Comparativo de Ventas por Producto";
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
        F_NAME_ => "aut_lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_SHOW_ => "aut_lock.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_localidad",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'emp_tipo <> |{Deposito}| ORDER BY emp_cod'",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "51",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_ci,cli_fullname",
        F_FILTER_ => "'cli_fullname like |{'+busc.get()+'%}|order by cli_fullname asc limit 30'",
        F_BROW_ => "1",
        F_ORD_ => "52",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_cat",
        F_ALIAS_ => "Categoría",
        F_HELP_ => "Categoría del Cliente",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "categorias",
        F_SHOWFIELD_ => "cat_code,cat_descrip",
        F_NODB_ => "1",
        F_ORD_ => "95",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nom_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cli_fullname from mnt_cli where cli_ci = '+rep_cli.getStr()",
        F_QUERY_REF_ => "rep_cli.hasChanged()",
        F_RELTABLE_ => "mnt_cli",
        F_RELFIELD_ => "cli_ci",
        F_LOCALFIELD_ => "rep_cli",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "95",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg01",
        F_ALIAS_ => "1P",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "29",
        F_NODB_ => "1",
        F_ORD_ => "96",
        F_FORMULA_ => "'Primer Periodo'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "101",
        F_INLINE_ => "1",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg02",
        F_ALIAS_ => "2P",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "29",
        F_NODB_ => "1",
        F_ORD_ => "102",
        F_FORMULA_ => "'Segundo Periodo'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde2",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "103",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta2",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "104",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "111",
        F_FORMULA_ => "'Filtre aqui los datos del Producto!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_fam",
        F_FILTER_ => "'true ORDER BY f_cod'",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "115",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_grupo",
        F_FILTER_ => "'TRUE ORDER BY g_cod' ",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "116",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Pago",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "117",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "guia_tipo",
        F_ALIAS_ => "Guia Tipo",
        F_HELP_ => "Guia Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_tipo.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_tipo",
        F_SHOWFIELD_ => "t_cod,''",
        F_FILTER_ => "'t_cod like |{'+p_tipo.get()+'%}| ORDER BY t_cod asc Limit 30'",
        F_NODB_ => "1",
        F_ORD_ => "119",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_clasif",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Clasificación de la tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_clasif",
        F_SHOWFIELD_ => "cl_cod",
        F_FILTER_ => "'true order by cl_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_temp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada em que se usa",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_temp",
        F_SHOWFIELD_ => "tp_cod",
        F_FILTER_ => "'TRUE ORDER BY tp_cod'",
        F_NODB_ => "1",
        F_ORD_ => "121",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_estruc",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura de la tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_estruc",
        F_SHOWFIELD_ => "e_cod",
        F_FILTER_ => "'TRUE ORDER BY e_cod'",
        F_NODB_ => "1",
        F_ORD_ => "122",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "neg_pos",
        F_ALIAS_ => "Mostrar:",
        F_HELP_ => "Mostrar solo:",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Positivos,Negativos,Todos",
        F_NODB_ => "1",
        F_ORD_ => "124",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_rep",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.comp_vent_prod",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_SHOW_ => "true",
        C_VIEW_ => "p_fam.get()!=''&&p_tipo.get()!=''&&p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

?>
