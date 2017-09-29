<?php
$Obj->name = "consultar_prod";
$Obj->alias = "Consultar Productos";
$Obj->help = "Consultar Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "busc_prod_browse";
$Obj->Filter = "db.mnt_prod_cons";
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
        F_NAME_ => "msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "2",
        F_FORMULA_ => "'Filtre  aqui los datos del Producto!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "remito",
        F_ALIAS_ => "Remision",
        F_HELP_ => "Verifica si se encuentra en remision",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CONCAT(|{En Remision  }|, r.rem_estado ,|{  Destino }|, r.rem_dir_destino,|{ Nro: }|,r.rem_nro) FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado <> |{Cerrada}| AND d.df_cod_prod = '+p_cod.getVal()+' '",
        F_QUERY_REF_ => "p_cod.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "21",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cod.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Localidad o Sucursal en donde se encuentra el Producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod'",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_estado_prod",
        F_ALIAS_ => "Ver Estado del Producto y/o Registro de Fin de Pieza",
        F_HELP_ => "Ver Estado del Producto y/o Registro de Fin de Pieza",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.estado_producto",
        F_NODB_ => "1",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        C_SHOW_ => "p_cod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Família",
        F_HELP_ => "Família a que pertenece",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_descri",
        F_LENGTH_ => "40",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_grupo",
        F_FILTER_ => "'TRUE ORDER BY g_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de tela",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_tipo",
        F_FILTER_ => "'TRUE ORDER BY t_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_comp",
        F_ALIAS_ => "Composición",
        F_HELP_ => "Composición de la mercadería",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_comp",
        F_FILTER_ => "'TRUE ORDER BY cp_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_temp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada em que se usa",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_temp",
        F_SHOWFIELD_ => "tp_descri",
        F_LENGTH_ => "40",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_estruc",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura de la tela",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_estruc",
        F_SHOWFIELD_ => "e_descri",
        F_LENGTH_ => "40",
        F_ORD_ => "80",
        C_SHOW_ => "el['p_fam'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_clasif",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Clasificación de la tela",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_clasif",
        F_SHOWFIELD_ => "cl_descri",
        F_LENGTH_ => "40",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_lisoest",
        F_ALIAS_ => "Liso/Estamp",
        F_HELP_ => "Liso/Estampado",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_lisoest",
        F_SHOWFIELD_ => "l_descri",
        F_LENGTH_ => "40",
        F_ORD_ => "95",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_color",
        F_FILTER_ => "'TRUE ORDER BY c_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "96",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "96",
        F_FORMULA_ => "'Ingrese la palabra entre porcentajes (%) para abarcar busquedas mas amplias Ej.:   %a cuandros%  '",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_descri",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "100",
        F_BROW_ => "1",
        F_ORD_ => "97",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad Comprada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "101",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prod_fin_pieza",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,%,Si,R",
        F_ORD_ => "111",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__report",
        F_ALIAS_ => "Ver Resultados (Max 30 resultados) !!!",
        F_HELP_ => "Ver Resultados en forma de reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.busc_prod",
        F_NODB_ => "1",
        F_ORD_ => "121",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo de familas del producto",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "131",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_cod.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
