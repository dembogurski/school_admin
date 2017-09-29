<?php
$Obj->name = "nota_pedido_sal";
$Obj->alias = "Nota de Pedido Saliente Sucursales o Proveedores";
$Obj->help = "Nota de Pedido a Sucursales o Proveedores";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "nota_pedido";
$Obj->Filter = "";
$Obj->Sort = "fecha desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "text",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Origen",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__suc",
        F_ALIAS_ => "Origen",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__locald",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "4",
        F_ORD_ => "80",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__sucd",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Nombre de la Sucursal Destino",
        F_TYPE_ => "text",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "90",
        F_BROW_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        C_SHOW_ => "__locald.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente",
        F_BROW_ => "1",
        F_ORD_ => "200",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__print",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.nota_pedido",
        F_NODB_ => "1",
        F_ORD_ => "205",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "210",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "det",
        F_ALIAS_ => "Detalle de Nota de Pedido",
        F_HELP_ => "Detalle de Nota de Pedido",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'nro_pedido = '+nro.getVal()",
        F_LINK_ => "db.nota_pedido_det",
        F_SEND_ => "nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "220",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
