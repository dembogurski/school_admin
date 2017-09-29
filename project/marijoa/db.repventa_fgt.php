<?php
$Obj->name = "db.repventa_fgt";
$Obj->alias = "Reporte  Ventas Sector Grupo Tipo";
$Obj->help = "Reporte  Ventas Detallado";
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
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "1",
        F_FORMULA_ => "'Seleccione el tipo de reporte que desea! El simbolo % indica No mostrar, El %% indica mostrar todos!!!'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

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
        F_FILTER_ => "'true ORDER BY emp_cod'",
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
        F_FILTER_ => "'cli_fullname like |{'+busc.get()+'%}| order by cli_fullname asc limit 30'",
        F_BROW_ => "1",
        F_ORD_ => "52",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda a transferir",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri,m_cod",
        F_NODB_ => "1",
        F_ORD_ => "92",
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
        F_ORD_ => "102",
        F_INLINE_ => "1",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde2",
        F_ALIAS_ => "Desde 2",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "103",
        C_VIEW_ => "comp.get()=='Si'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta2",
        F_ALIAS_ => "Hasta 2",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "105",
        F_INLINE_ => "1",
        C_VIEW_ => "comp.get()=='Si'",
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
        F_ORD_ => "106",
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
        F_ORD_ => "107",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "comp",
        F_ALIAS_ => "Generar reporte comparativo x Sector",
        F_HELP_ => "Comparativo entre dos fechas",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "108",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasFComp",
        F_ALIAS_ => "Generar Reporte Sector (Comparativo)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_FCmp",
        F_NODB_ => "1",
        F_ORD_ => "109",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "comp.get()=='Si'&&hasta2.get()!=''&&desde2.get()!=''",
        G_SHOW_ => "65",
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
        F_NAME_ => "rep_ventasFGTComp",
        F_ALIAS_ => "Generar Reporte Sector,Grupo, Tipo (Comparativo)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_FGTCmp",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "comp.get()=='Si'&&hasta2.get()!=''&&desde2.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_clasif",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Clasificación de la tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",%",
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
        F_OPTIONS_ => ",%",
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
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_estruc",
        F_SHOWFIELD_ => "e_cod",
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
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod",
        F_FILTER_ => "'TRUE ORDER BY c_cod'",
        F_NODB_ => "1",
        F_ORD_ => "124",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__term",
        F_ALIAS_ => "Terminacion de Anio",
        F_HELP_ => "Terminacion de Anio",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "125",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "detallado",
        F_ALIAS_ => "Informe Resumido,Detallado",
        F_HELP_ => "Detallado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Resumido,Detallado",
        F_NODB_ => "1",
        F_ORD_ => "175",
        F_INLINE_ => "1",
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
        F_ORD_ => "178",
        C_VIEW_ => "false",
        C_CHANGE_ => "desde.hasChanged()",
        F_FORMULA_ => "desde.getYear()+'-'+desde.getMonth() +'-'+ desde.getDay()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hastainv",
        F_ALIAS_ => "Fecha hasta Invertida",
        F_HELP_ => "Fecha hasta Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "179",
        C_VIEW_ => "false",
        C_CHANGE_ => "hasta .hasChanged()",
        F_FORMULA_ => "hasta .getYear()+'-'+hasta.getMonth()+'-'+ hasta.getDay()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasF",
        F_ALIAS_ => "Generar Reporte (Sector)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_F",
        F_NODB_ => "1",
        F_ORD_ => "184",
        C_SHOW_ => "true",
        C_VIEW_ => "p_fam.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasFMinMay",
        F_ALIAS_ => "Generar Reporte Sector (Minoristas/Mayoristas)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_FMinMay",
        F_NODB_ => "1",
        F_ORD_ => "184",
        C_SHOW_ => "true",
        C_VIEW_ => "p_fam.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventMinMayAgr",
        F_ALIAS_ => "Reporte Ventas (Minoristas/Mayoristas) Agrupado x Categoria/SUC",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.vent_agrup_cat",
        F_NODB_ => "1",
        F_ORD_ => "184",
        C_SHOW_ => "true",
        C_VIEW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasFG",
        F_ALIAS_ => "Generar Reporte (Sector Grupo)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_FG",
        F_NODB_ => "1",
        F_ORD_ => "185",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "p_fam.get()!=''&&p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sector",
        F_ALIAS_ => "Sector (Solo p/ Sector Grupo y Tipo)",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Minorista,Mayorista,Todos",
        F_NODB_ => "1",
        F_ORD_ => "185",
        F_INLINE_ => "1",
        C_VIEW_ => "p_fam.get()!=''&&p_grupo.get()!=''&&p_tipo.get()!=''",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas",
        F_ALIAS_ => "Generar Reporte (Sector Grupo Tipo)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_FGT",
        F_NODB_ => "1",
        F_ORD_ => "186",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "p_fam.get()!=''&&p_grupo.get()!=''&&p_tipo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasT",
        F_ALIAS_ => "Generar Reporte (Temporada)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_T",
        F_NODB_ => "1",
        F_ORD_ => "191",
        C_SHOW_ => "true",
        C_VIEW_ => "p_temp.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasFT",
        F_ALIAS_ => "Generar Reporte (Temporada y Sector)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_TF",
        F_NODB_ => "1",
        F_ORD_ => "192",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "p_fam.get()!=''&&p_temp.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasTCG",
        F_ALIAS_ => "Generar Reporte (Temporada Clasificacion y Grupo )",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_TCG",
        F_NODB_ => "1",
        F_ORD_ => "193",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "p_temp.get()!='' && p_clasif.get()!='' && p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasTFG",
        F_ALIAS_ => "Generar Reporte (Temporada Sector y Grupo )",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_TFG",
        F_NODB_ => "1",
        F_ORD_ => "193",
        C_SHOW_ => "true",
        C_VIEW_ => "p_fam.get()!=''&&p_grupo.get()!=''&&p_temp.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasTEG",
        F_ALIAS_ => "Generar Reporte (Temporada Estructura y Grupo )",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_TEG",
        F_NODB_ => "1",
        F_ORD_ => "194",
        C_SHOW_ => "true",
        C_VIEW_ => "p_temp.get()!=''&&p_estruc.get()!=''&&p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasTCLG",
        F_ALIAS_ => "Generar Reporte (Temporada Color y Grupo )",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_TCLG",
        F_NODB_ => "1",
        F_ORD_ => "195",
        C_SHOW_ => "true",
        C_VIEW_ => "p_temp.get()!=''&&p_color.get()!=''&&p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasG",
        F_ALIAS_ => "Generar Reporte (Grupo )",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_G",
        F_NODB_ => "1",
        F_ORD_ => "196",
        C_SHOW_ => "true",
        C_VIEW_ => "p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasGT",
        F_ALIAS_ => "Generar Reporte (Grupo Tipo )",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_GT",
        F_NODB_ => "1",
        F_ORD_ => "197",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "p_tipo.get()!=''&&p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "limite",
        F_ALIAS_ => "Limite",
        F_HELP_ => "Limite",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "197",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasGTC",
        F_ALIAS_ => "Generar Reporte (Grupo Tipo Color )",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_GTC",
        F_NODB_ => "1",
        F_ORD_ => "198",
        C_SHOW_ => "true",
        C_VIEW_ => "p_tipo.get()!=''&&p_color.get()!=''&&p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasFC",
        F_ALIAS_ => "Generar Reporte (Sector Color )",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_FC",
        F_NODB_ => "1",
        F_ORD_ => "198",
        C_SHOW_ => "true",
        C_VIEW_ => "p_fam.get()!=''&&p_color.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasGET",
        F_ALIAS_ => "Generar Reporte (Grupo Estructura y Tipo)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_GET",
        F_NODB_ => "1",
        F_ORD_ => "199",
        C_SHOW_ => "true",
        C_VIEW_ => "p_tipo.get()!=''&&p_estruc.get()!=''&&p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventasGCT",
        F_ALIAS_ => "Generar Reporte (Grupo Clasificacion y Tipo)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_GCT",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_SHOW_ => "true",
        C_VIEW_ => "p_clasif.get()!=''&&p_tipo.get()!=''&&p_grupo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

?>
