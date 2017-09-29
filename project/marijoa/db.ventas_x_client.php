<?php
$Obj->name = "ventas_x_client";
$Obj->alias = "Reporte de Ventas de Clientes";
$Obj->help = "Reporte de Ventas de Clientes";
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
        F_ORD_ => "10",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_fullname",
        F_ALIAS_ => "Nombre y Apellido",
        F_HELP_ => "Nombre y Apellido del Cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "20",
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
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc'",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "36",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_grupo",
        F_SHOWFIELD_ => "g_cod,'',g_cod",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Pago",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_tipo",
        F_SHOWFIELD_ => "t_cod,''",
        F_FILTER_ => "'true order by t_cod asc'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "70",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desdeinv",
        F_ALIAS_ => "Fecha desde Invertida",
        F_HELP_ => "Fecha desde Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        C_CHANGE_ => "desde.hasChanged()",
        F_FORMULA_ => "desde.getYear()+'-'+desde.getMonth() +'-'+ desde.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hastainv",
        F_ALIAS_ => "Fecha hasta Invertida",
        F_HELP_ => "Fecha hasta Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        C_CHANGE_ => "hasta .hasChanged()",
        F_FORMULA_ => "hasta .getYear()+'-'+hasta.getMonth()+'-'+ hasta.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Resumido,Detallado",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "98",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Generar reporte ",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ventas_x_client",
        F_NODB_ => "1",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "105",
        F_FORMULA_ => "'( ! ) Aqui reporte de Estadisticas de Ventas de Clientes (Solo para Admin)!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "anioini",
        F_ALIAS_ => "Año inicio",
        F_HELP_ => "Año inicio",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aniofin",
        F_ALIAS_ => "Año Fin",
        F_HELP_ => "Año Fin",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep2",
        F_ALIAS_ => "Estadistica de Ventas Por Año ",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.estad_vent_clia",
        F_NODB_ => "1",
        F_ORD_ => "150",
        C_SHOW_ => "cli_fullname.notEmpty()",
        C_VIEW_ => "anioini.notEmpty()&&aniofin.notEmpty()",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => " ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "500",
        F_FORMULA_ => "'Reporte de Vents Agrupado por Metros Solo responde a los Filtros de Cliente Fechas Categoria y Sucursal '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vent_group_cli",
        F_ALIAS_ => "Reporte de Ventas Agrupado por Cliente",
        F_HELP_ => "Reporte de Ventas Agrupado por Cliente",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.vent_group_val",
        F_NODB_ => "1",
        F_ORD_ => "510",
        C_SHOW_ => "desde.getVal()!=''&&hasta.getVal()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg6",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "520",
        F_FORMULA_ => "'( ! ) Aqui solo monitoreo de Clientes (Campos validos Fechas, Categoria, Suc Promedio)!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prom",
        F_ALIAS_ => "Promedio deseado",
        F_HELP_ => "Promedio deseado",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "cli_cat.hasChanged()",
        F_RELTABLE_ => "mnt_prom_comp",
        F_SHOWFIELD_ => "cod_prom,descrip",
        F_FILTER_ => "'cat = '+cli_cat.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "530",
        G_SHOW_ => "131072",
        G_CHANGE_ => "131072"));

$Obj->Add(
    array(
        F_NAME_ => "rep_monit",
        F_ALIAS_ => "Reporte de Monitoreo de Clientes",
        F_HELP_ => "Reporte de Monitoreo de Clientes",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.monitoreo_cli",
        F_NODB_ => "1",
        F_ORD_ => "550",
        F_INLINE_ => "1",
        C_SHOW_ => "hasta.get()!=''&&desde.get()!=''",
        C_VIEW_ => "cli_cat.get()!='%'",
        G_SHOW_ => "131072",
        G_CHANGE_ => "131072"));

$Obj->Add(
    array(
        F_NAME_ => "meses",
        F_ALIAS_ => "Meses",
        F_HELP_ => "Meses",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT FLOOR(DATEDIFF('+hasta.getStr()+','+desde.getStr()+') / 30);'",
        F_QUERY_REF_ => "desde.hasChanged()||hasta.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "560",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
