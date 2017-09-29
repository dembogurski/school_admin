<?php
$Obj->name = "mnt_sol_insumo";
$Obj->alias = "Solicitud de Insumos";
$Obj->help = "Solicitud de Insumos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_sol_insumo";
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
        F_NAME_ => "id_sol_insumo",
        F_ALIAS_ => "N�",
        F_HELP_ => "N�",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario que realiza el pedido",
        F_HELP_ => "Usuario que realiza el pedido",
        F_TYPE_ => "text",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "p_user_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sucursal",
        F_ALIAS_ => "Sucursal desde la que se realiza el pedido",
        F_HELP_ => "Sucursal desde la que se realiza el pedido",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select local from p_users where name = '+usuario.getStr()",
        F_QUERY_REF_ => "sucursal.firstSQL && usuario.notEmpty() && operation == INSERT_",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha de emision ",
        F_HELP_ => "Fecha de emision",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta, Pendiente",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "detalle",
        F_ALIAS_ => "Detalle del pedido",
        F_HELP_ => "Detalle del pedido",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'id_sol_insumo='+id_sol_insumo.getVal()",
        F_LINK_ => "db.mnt_sol_ins_det",
        F_SEND_ => "id_sol_insumo.get()",
        F_LENGTH_ => "500",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
