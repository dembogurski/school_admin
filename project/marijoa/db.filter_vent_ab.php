<?php
$Obj->name = "filter_vent_ab";
$Obj->alias = "Ventas Abiertas de las Sucursales";
$Obj->help = "Facturas que estan en Abiertas";
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
        F_ORD_ => "2",
        F_FORMULA_ => "'Cierre y abra la grilla para actualizar las Ventas que estan en espera!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa  ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "4",
        V_DEFAULT_ => "'01'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "facturas",
        F_ALIAS_ => "Ventas Abiertas de esta sucursal",
        F_HELP_ => "Ventas en caja",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'fact_estado=|{Abierta}| and fact_localidad = '+empr.getStr()+' and factura.fact_cli_cat = mnt_cli.cli_cat and factura.fact_nom_cli = mnt_cli.cli_fullname'",
        F_LINK_ => "db.venta",
        F_SEND_ => "''",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
