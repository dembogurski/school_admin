<?php
$Obj->name = "reportes";
$Obj->alias = "Reportes Varios";
$Obj->help = "Reportes Varios";
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
        F_BROW_ => "1",
        F_ORD_ => "3",
        C_SHOW_ => "aut_lock.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "120",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_FORMULA_ => "'Seleccione el tipo de reporte que desea hacer... El simbolo % indica todos!!!'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg_2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "120",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_FORMULA_ => "'( ! ) ATENCION!!!  No haga reportes en horas pico de trabajo o dejara inabilitadas las demas terminales.'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg_3",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "120",
        F_NODB_ => "1",
        F_ORD_ => "13",
        F_FORMULA_ => "'( ! ) Los reportes hacen consulas complejas pueden causar inestabilidad en el sistema.'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_rep",
        F_ALIAS_ => "Tipo de Reporte",
        F_HELP_ => "Tipo de Reporte",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Compras,Ventas",
        F_LENGTH_ => "100",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "15",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_cod,prov_nombre",
        F_FILTER_ => "'prov_nombre like |{'+busc.get()+'%}|order by prov_nombre asc'",
        F_NODB_ => "1",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Compras'",
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
        F_FILTER_ => "'cli_fullname like |{'+busc.get()+'%}|order by cli_fullname asc limit 50'",
        F_BROW_ => "1",
        F_ORD_ => "17",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
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
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_NODB_ => "1",
        F_ORD_ => "18",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_cont_cred",
        F_ALIAS_ => "Contado Credito",
        F_HELP_ => "Contado Credito",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",%,Contado,Credito",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "19",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cat",
        F_ALIAS_ => "Categoria",
        F_HELP_ => "Categoria",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "categorias",
        F_SHOWFIELD_ => "cat_code,cat_descrip",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_vend_cod",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Código y nombre compledo del Vendedor",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod, func_fullname",
        F_NODB_ => "1",
        F_ORD_ => "21",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
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
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "35",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "38",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas",
        F_ALIAS_ => "Generar Reporte (Ventas)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.reporte_ventas",
        F_ORD_ => "40",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas_csv",
        F_ALIAS_ => "Generar Reporte (Liviano Formato CSV)",
        F_HELP_ => "Generar Reporte (Liviano Formato CSV)",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.reporte_ventas_csv",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas_sim",
        F_ALIAS_ => "Generar Reporte Simplificado",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_res",
        F_NODB_ => "1",
        F_ORD_ => "47",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_cant_fact",
        F_ALIAS_ => "Cantidad de Facturas x Dia",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.cant_fact",
        F_NODB_ => "1",
        F_ORD_ => "47",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_compras",
        F_ALIAS_ => "Generar Reporte (Compras)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.reporte_compras",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "tipo_rep.get()=='Compras'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_compras_csv",
        F_ALIAS_ => "Generar Reporte (Liviano Formato CSV)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.reporte_compras_csv",
        F_NODB_ => "1",
        F_ORD_ => "53",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Compras'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desdeinv",
        F_ALIAS_ => "Fecha desde Invertida",
        F_HELP_ => "Fecha desde Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        C_CHANGE_ => "desde.hasChanged()",
        F_FORMULA_ => "desde.getYear()+'-'+desde.getMonth()+'-'+desde.getDay()",
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
        F_ORD_ => "70",
        C_VIEW_ => "false",
        C_CHANGE_ => "hasta .hasChanged()",
        F_FORMULA_ => "hasta .getYear()+'-'+hasta .getMonth()+'-'+hasta .getDay()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_margenes",
        F_ALIAS_ => "Reporte de Margenes (Ultra)",
        F_HELP_ => "Reporte de Margenes",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.margenes",
        F_NODB_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_diff_cambio",
        F_ALIAS_ => "Reporte de Diferencias de Cambio",
        F_HELP_ => "Reporte de Diferencias de Cambio",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.diff_cambio",
        F_NODB_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "r1",
        F_ALIAS_ => "Rango 1",
        F_HELP_ => "Rango1",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "82",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "r2",
        F_ALIAS_ => "Rango 2",
        F_HELP_ => "Rango2",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "84",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas_cont",
        F_ALIAS_ => "Generar Reporte (Facturas Impresas)",
        F_HELP_ => "Este Reporte Responde a Tipo Contado/Credito Suc, Fecha y Rango ",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.facturas_contab",
        F_ORD_ => "90",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "fact_legal",
        F_ALIAS_ => "Generar Reporte (Facturas Legales SAP)",
        F_HELP_ => "Este Reporte Responde a Tipo Contado/Credito Suc, Fecha y Rango ",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fact_legal",
        F_ORD_ => "91",
        C_SHOW_ => "tipo_rep.get()=='Ventas' && (p_user_=='Developer' || p_user_=='Jack')",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "fact_legal_ss",
        F_ALIAS_ => "Generar Reporte (Facturas Legales Star Soft)",
        F_HELP_ => "Este Reporte Responde a Tipo Contado/Credito Suc, Fecha y Rango ",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fact_legal_ss",
        F_ORD_ => "91",
        C_SHOW_ => "tipo_rep.get()=='Ventas' && (p_user_=='Developer' || p_user_=='Jack')",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));		

?>
