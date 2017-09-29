<?php
$Obj->name = "db.repos_prod";
$Obj->alias = "Reporte para Reposicion de Productos General";
$Obj->help = "Reporte para Reposicion de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
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
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_cod,''",
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
        F_SHOWFIELD_ => "g_cod,''",
        F_FILTER_ => "'TRUE ORDER BY g_cod' ",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "116",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Pago",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "117",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_tipo.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_tipo",
        F_SHOWFIELD_ => "t_cod,''",
        F_FILTER_ => "'t_cod like |{'+b_tipo.get()+'%}| ORDER BY t_cod asc Limit 30'",
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
        F_SHOWFIELD_ => "cl_cod,''",
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
        F_SHOWFIELD_ => "tp_cod,''",
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
        F_SHOWFIELD_ => "e_cod,''",
        F_FILTER_ => "'TRUE ORDER BY e_cod'",
        F_NODB_ => "1",
        F_ORD_ => "122",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'TRUE ORDER BY c_cod'",
        F_NODB_ => "1",
        F_ORD_ => "124",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_rojos",
        F_ALIAS_ => "Productos en",
        F_HELP_ => "Productos en",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Rojo,Verde,Todos",
        F_NODB_ => "1",
        F_ORD_ => "126",
        F_INLINE_ => "1",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_font",
        F_ALIAS_ => "Tamaño de Fuente",
        F_HELP_ => "Tamaño de Fuente",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "10,11,12,13,14,15,16,18,20,22,26,30",
        F_NODB_ => "1",
        F_ORD_ => "128",
        F_INLINE_ => "1",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_limit",
        F_ALIAS_ => "Limite negativo < a:",
        F_HELP_ => "Limite de productos en rojo menor a:",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "130",
        F_INLINE_ => "1",
        C_SHOW_ => "false",
        C_VIEW_ => "p_rojos.get()=='Rojo'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_prev1",
        F_ALIAS_ => "Fecha Prevision Desde",
        F_HELP_ => "Fecha Prevision 1",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "145",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_prev2",
        F_ALIAS_ => "Fecha Prevision Hasta",
        F_HELP_ => "Fecha Prevision 2",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "155",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p1_d",
        F_ALIAS_ => "P1",
        F_HELP_ => "P. Tendencia Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "165",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p1_h",
        F_ALIAS_ => "P1 Hasta",
        F_HELP_ => "P. Tendencia Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "175",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p2_d",
        F_ALIAS_ => "P2",
        F_HELP_ => "P. Tend. Base Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "185",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p2_h",
        F_ALIAS_ => "P2 Hasta",
        F_HELP_ => "P. Tend. Base Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "195",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p3_d",
        F_ALIAS_ => "P3",
        F_HELP_ => "P3",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "198",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p3_h",
        F_ALIAS_ => "P3",
        F_HELP_ => "P3",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "200",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.repos_general",
        F_NODB_ => "1",
        F_ORD_ => "205",
        C_VIEW_ => "fecha_prev1.get()!=''&&fecha_prev2.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
