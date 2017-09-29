<?php
$Obj->name = "rep_stock";
$Obj->alias = "Reporte de Stock";
$Obj->help = "Reporte de Stock";
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
        F_FORMULA_ => "'El simbolo % indica todos!!!'",
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
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
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
        F_ORD_ => "52",
        F_INLINE_ => "1",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Fecha Compra Entre",
        F_HELP_ => "Fecha Compra Entre",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "100",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Fecha Compra Hasta",
        F_HELP_ => "Fecha Compra Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "110",
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
        F_FORMULA_ => "'Filtre  aqui los datos del Producto!!!'",
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
        F_LENGTH_ => "40",
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
        F_LENGTH_ => "40",
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
        F_LENGTH_ => "40",
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
        F_LENGTH_ => "40",
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
        F_LENGTH_ => "40",
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
        F_LENGTH_ => "40",
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
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "121",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdp",
        F_ALIAS_ => "Con Sin Fin de Pieza",
        F_HELP_ => "Con Sin Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,No,Si",
        F_LENGTH_ => "40",
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
        F_LENGTH_ => "40",
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
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "123",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stock",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_stock",
        F_NODB_ => "1",
        F_ORD_ => "129",
        C_SHOW_ => "true",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desdeinv",
        F_ALIAS_ => "Fecha desde Invertida",
        F_HELP_ => "Fecha desde Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
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
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "150",
        C_VIEW_ => "false",
        C_CHANGE_ => "hasta .hasChanged()",
        F_FORMULA_ => "hasta .getYear()+'-'+hasta.getMonth()+'-'+ hasta.getDay()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

?>
