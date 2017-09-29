<?php
$Obj->name = "reprt_detallado";
$Obj->alias = "Reporte Compras/Ventas Detallado";
$Obj->help = "Reporte Compras/Ventas Detallado";
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
        F_NAME_ => "tipo_rep",
        F_ALIAS_ => "Tipo de Reporte",
        F_HELP_ => "Tipo de Reporte",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Compras,Ventas",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "41",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor de los productos",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc.hasChanged()",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_cod,prov_nombre",
        F_FILTER_ => "'prov_nombre like |{'+busc.get()+'%}|order by prov_nombre asc'",
        F_NODB_ => "1",
        F_ORD_ => "42",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Compras'",
        G_SHOW_ => "65",
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
        F_FILTER_ => "'cli_fullname like |{'+busc.get()+'%}|order by cli_fullname asc  limit 20'",
        F_BROW_ => "1",
        F_ORD_ => "43",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_localidad",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true ORDER BY emp_cod'",
        F_BROW_ => "1",
        F_ORD_ => "50",
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
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "show_cli",
        F_ALIAS_ => "Mostrar Cliente",
        F_HELP_ => "Mostrar Cliente",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "96",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde (Fecha de Cierre de Factura)",
        F_HELP_ => "Desde (Fecha de Cierre de Factura)",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "100",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta  (Fecha de Cierre de Factura)",
        F_HELP_ => "Hasta  (Fecha de Cierre de Factura)",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "110",
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
        F_OPTIONS_ => "%,%%",
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
        F_OPTIONS_ => "%,%%",
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
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_tipo",
        F_FILTER_ => "'TRUE ORDER BY t_cod' ",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "117",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_comp",
        F_ALIAS_ => "Composición",
        F_HELP_ => "Composición de la mercadería",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_comp",
        F_FILTER_ => "'TRUE ORDER BY cp_cod' ",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "118",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_temp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada em que se usa",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_temp",
        F_FILTER_ => "'true ORDER BY tp_cod'",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "119",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_estruc",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura de la tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_estruc",
        F_FILTER_ => "'true ORDER BY e_cod'",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_clasif",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Clasificación de la tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_clasif",
        F_FILTER_ => "'true ORDER BY cl_cod'",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "121",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_color",
        F_FILTER_ => "'TRUE ORDER BY c_cod' ",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "122",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_lisoest",
        F_ALIAS_ => "Liso/Estampado",
        F_HELP_ => "Liso/Estampado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_lisoest",
        F_FILTER_ => "'true ORDER BY l_cod'",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "123",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_term",
        F_ALIAS_ => "Terminacion del Año",
        F_HELP_ => "Terminacion del Año",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "123",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'%'",
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
        F_ORD_ => "123",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "simp",
        F_ALIAS_ => "Ver Reporte Simplificado",
        F_HELP_ => "Ver Reporte Simplificado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "124",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas",
        F_ALIAS_ => "Generar Reporte (Ventas)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ventas_det",
        F_NODB_ => "1",
        F_ORD_ => "129",
        C_SHOW_ => "tipo_rep.get()=='Ventas'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fcierre",
        F_ALIAS_ => "Fecha de Cierre / Fecha Carga",
        F_HELP_ => "Fecha de Cierre / Fecha Carga",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Fecha de Cierre,Fecha de Carga",
        F_NODB_ => "1",
        F_ORD_ => "132",
        C_SHOW_ => "tipo_rep.get()=='Compras'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_compras",
        F_ALIAS_ => "Generar Reporte (Compras)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_compras_det",
        F_NODB_ => "1",
        F_ORD_ => "133",
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
        F_NODB_ => "1",
        F_ORD_ => "140",
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
        F_ORD_ => "150",
        C_VIEW_ => "false",
        C_CHANGE_ => "hasta .hasChanged()",
        F_FORMULA_ => "hasta .getYear()+'-'+hasta.getMonth()+'-'+ hasta.getDay()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

?>
