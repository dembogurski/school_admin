<?php
$Obj->name = "lista_precios";
$Obj->alias = "Lista de precios";
$Obj->help = "Lista de Produtos con precios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Localidad (Sucursal)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "12",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Família",
        F_HELP_ => "Família a que pertenece",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_fam",
        F_FILTER_ => "'true ORDER BY f_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "30",
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
        F_FILTER_ => "'TRUE ORDER BY g_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_tipo",
        F_FILTER_ => "'TRUE ORDER BY t_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_comp",
        F_ALIAS_ => "Composición",
        F_HELP_ => "Composición de la mercadería",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_comp",
        F_FILTER_ => "'TRUE ORDER BY cp_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "60",
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
        F_FILTER_ => "'true ORDER BY tp_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_estruc",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura de la tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_estruc",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "80",
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
        F_FILTER_ => "'true ORDER BY cl_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_lisoest",
        F_ALIAS_ => "Liso/Estamp",
        F_HELP_ => "Liso/Estampado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_lisoest",
        F_FILTER_ => "'true ORDER BY l_cod'",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "95",
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
        F_FILTER_ => "'TRUE ORDER BY c_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "96",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "76",
        F_BROW_ => "1",
        F_ORD_ => "100",
        F_FORMULA_ => "'( ! ) El simbolo % no muestra precio, %% muestra precio para impresion...'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_1",
        F_ALIAS_ => "Precio 1",
        F_HELP_ => "Precio cliente 1",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_2",
        F_ALIAS_ => "Precio 2",
        F_HELP_ => "Precio cliente 2",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_3",
        F_ALIAS_ => "Precio 3",
        F_HELP_ => "Precio cliente 3",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "130",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_4",
        F_ALIAS_ => "Precio 4",
        F_HELP_ => "Precio cliente 4",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "140",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_5",
        F_ALIAS_ => "Precio 5",
        F_HELP_ => "Precio cliente 5",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "150",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir",
        F_ALIAS_ => "           Generar Lista          ",
        F_HELP_ => "Generar Lista",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.imprimir_lista",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "p_precio_1.get()!='%'||p_precio_2.get()!='%'||p_precio_3.get()!='%'||p_precio_4.get()!='%'||p_precio_5.get()!='%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir_gby",
        F_ALIAS_ => "           Generar Lista    Agrupada por Sector, Grupo, Tipo, Precio_1, Precio_2, Precio_3, Precio_4, Precio_5       ",
        F_HELP_ => "Generar Lista",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.imprimir_lista_gby",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "p_precio_1.get()!='%'||p_precio_2.get()!='%'||p_precio_3.get()!='%'||p_precio_4.get()!='%'||p_precio_5.get()!='%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
