<?php
$Obj->name = "rep_ajustes";
$Obj->alias = "Reporte de Ajustes";
$Obj->help = "Reporte de Ajustes";
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_prov",
        F_ALIAS_ => "Buscar Proveedor",
        F_HELP_ => "Buscar Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_prov.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_cod,prov_nombre",
        F_FILTER_ => "'prov_nombre like |{'+busc_prov.get()+'%}| order by prov_nombre asc'",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre del Proveedor",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_nombre,prov_tel",
        F_RELFIELD_ => "prov_cod",
        F_LOCALFIELD_ => "prov",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ref",
        F_ALIAS_ => "Nro Referencia de Factura",
        F_HELP_ => "Nro Referencia de Factura",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "12",
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
        F_ORD_ => "111",
        F_FORMULA_ => "'Filtre aqui los datos del Producto!!!'",
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
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_tipo",
        F_FILTER_ => "'TRUE ORDER BY t_cod' ",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "117",
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
        F_SHOWFIELD_ => "c_cod",
        F_FILTER_ => "'TRUE ORDER BY c_cod' ",
        F_NODB_ => "1",
        F_ORD_ => "117",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdp",
        F_ALIAS_ => "Con Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,No,Si",
        F_NODB_ => "1",
        F_ORD_ => "118",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "119",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "120",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ajustes",
        F_ALIAS_ => "Generar Reporte Sin Fin de Pieza",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_ajustes",
        F_NODB_ => "1",
        F_ORD_ => "122",
        F_INLINE_ => "1",
        C_SHOW_ => "fdp.get()=='No'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_aj_con_fdp",
        F_ALIAS_ => "Generar Reporte con Fin de Pieza",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fdp",
        F_NODB_ => "1",
        F_ORD_ => "129",
        F_INLINE_ => "1",
        C_SHOW_ => "fdp.get()=='Si'",
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
        F_ORD_ => "160",
        F_FORMULA_ => "'( ! ) No importan aqui Proveedor, Grupo, Tipo y Color, Fin de Pieza!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ph",
        F_ALIAS_ => "Productos Padres",
        F_HELP_ => "Solo los Padres",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nsuc",
        F_ALIAS_ => "Productos en Sucursal",
        F_HELP_ => "Productos en Sucursal",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "166",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_oper",
        F_ALIAS_ => "Operacion",
        F_HELP_ => "Operacion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Aumento en Entrada,Aumento en Salida,Aumento en Inventario,Aumento x Informacion Viciada,Disminucion en Entrada,Disminucion en Salida,Disminucion en Inventario,Disminucion x Informacion Viciada",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "167",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Detallado,Resumido",
        F_NODB_ => "1",
        F_ORD_ => "168",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_com_fdp",
        F_ALIAS_ => "Reporte Productos con/sin Fin Pieza Relacionados con Compras",
        F_HELP_ => "Reporte Productos con/sin Fin Pieza Relacionados con Compras",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fdp_compras",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "tipo.get()=='Detallado'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_com_fdp2",
        F_ALIAS_ => "Reporte Productos con/sin Fin Pieza (Resumido)",
        F_HELP_ => "Reporte Productos con/sin Fin Pieza Relacionados con Compras",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fdp_compr_res",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "tipo.get()!='Detallado'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
