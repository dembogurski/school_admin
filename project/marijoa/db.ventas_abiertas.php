<?php
$Obj->name = "ventas_abiertas";
$Obj->alias = "Ventas Abiertas por Vendedor";
$Obj->help = "Ventas Abiertas por Vendedor";
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
        F_FORMULA_ => "'Cierre y abra la grilla para actualizar de Ventas en espera para actualizar!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nombre_suc",
        F_ALIAS_ => "Nombre Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select emp_nombre from par_empresas where emp_cod like '+__local.getStr()",
        F_QUERY_REF_ => "__local.hasChanged()||nombre_suc.firstSQL",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "4",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "emp_empaque",
        F_ALIAS_ => "Mis Ventas Abiertas",
        F_HELP_ => "Mis Ventas Abiertas",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'mnt_cli.cli_ci=fact_cli_ci and mnt_cli.cli_cat = fact_cli_cat AND fact_empaque=|{No}| and fact_estado=|{Abierta}| and fact_localidad = '+__local.getStr()+' and fact_vend_cod =|{'+p_user_+'}|'",
        F_LINK_ => "db.venta",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
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
        F_NAME_ => "del_ventas_ab",
        F_ALIAS_ => "Borrar Ventas Abiertas Sin detalle",
        F_HELP_ => "Borrar Ventas Abiertas",
        F_TYPE_ => "proc",
        F_QUERY_ => "'UPDATE factura SET fact_estado = |{Anulada}| WHERE  fact_vend_cod = |{'+p_user_+'}| AND fact_estado = |{Abierta}|  AND NOT EXISTS(SELECT * FROM  det_factura d WHERE d.df_fact_num =  fact_nro)'",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "openSubform",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "log",
        F_ALIAS_ => "Log",
        F_HELP_ => "Log",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT  makeLog_(|{Anular}|, |{Anulo todas las facturas Abiertas SIN detalle}|, |{'+p_user_+'}|)'",
        F_QUERY_REF_ => "del_ventas_ab.get()&&log.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
