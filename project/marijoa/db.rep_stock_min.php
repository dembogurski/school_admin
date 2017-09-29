<?php
$Obj->name = "rep_stock_min";
$Obj->alias = "Reporte de Stock Minimo";
$Obj->help = "Reporte de Stock Minimo";
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
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_BROW_ => "1",
        F_ORD_ => "50",
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
        F_OPTIONS_ => ",%",
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
        F_OPTIONS_ => ",%",
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
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_tipo",
        F_FILTER_ => "'true order by t_cod asc'",
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
        F_OPTIONS_ => ",%",
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
        F_OPTIONS_ => ",%",
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
        F_OPTIONS_ => ",%",
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
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_clasif",
        F_FILTER_ => "'true ORDER BY cl_cod'",
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
        F_OPTIONS_ => ",%",
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
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_lisoest",
        F_FILTER_ => "'true ORDER BY l_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "123",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdp",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,No,Si,R,RS",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "123",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_cantidad",
        F_ALIAS_ => "Cantidad menor o igual a",
        F_HELP_ => "Existencia menor o igual a la indicada",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_DEC_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "124",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stock_min",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_stock_min",
        F_NODB_ => "1",
        F_ORD_ => "129",
        C_SHOW_ => "true",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg3",
        F_ALIAS_ => "Para Reporte Agrupado x Sucursal",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "130",
        F_FORMULA_ => "'Campos Validos Sector Grupo Tipo Color,  Cantidad Mayor o igual a:      y   Fin de Pieza' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stock_group_by",
        F_ALIAS_ => "Generar Reporte Agrupado x Sucursal",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.stock_agrupado",
        F_NODB_ => "1",
        F_ORD_ => "150",
        C_SHOW_ => "true",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

?>
