<?php
$Obj->name = "reservas_caja";
$Obj->alias = "Reservas de Telas en Caja";
$Obj->help = "Reservas de Telas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "reservas";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "nro_res",
        F_ALIAS_ => "Nro de Reserva",
        F_HELP_ => "Genera Reserva",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Codigo del usuario",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cli_ci",
        F_ALIAS_ => "Nº C.I. o R.U.C.",
        F_HELP_ => "Nº Cédula o R.U.C. del cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_REQUIRED_ => "1",
        F_ORD_ => "43",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nom_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Nombre completo del cliente",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cli_fullname, cli_cat from mnt_cli WHERE cli_ci ='+el['fact_cli_ci'].getStr()",
        F_QUERY_REF_ => "(fact_cli_ci.hasChanged()||fact_nom_cli.firstSQL)&&fact_cli_ci.get()!=''",
        F_SHOWFIELD_ => " ",
        F_RELFIELD_ => " ",
        F_LOCALFIELD_ => " ",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde (Fecha de Reserva)",
        F_HELP_ => "Desde (Fecha de Reserva)",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "La reserva tendra vigencia hasta la Fecha",
        F_HELP_ => "Hasta la Fecha",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT DATE_FORMAT( DATE_ADD(NOW(), INTERVAL 25 DAY),|{%d-%m-%Y}| )'",
        F_QUERY_REF_ => "hasta.firstSQL",
        F_LENGTH_ => "10",
        F_REQUIRED_ => "1",
        F_ORD_ => "64",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_BROW_ => "1",
        F_ORD_ => "500",
        C_VIEW_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "res_detalle",
        F_ALIAS_ => "Detalle de Reserva",
        F_HELP_ => "Detalle de Reserva",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'nro_res = '+nro_res.getVal()",
        F_LINK_ => "db.reserva_det_lock",
        F_SEND_ => "nro_res.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "520",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "r_total",
        F_ALIAS_ => "Valor Total",
        F_HELP_ => "Valor Total",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "530",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "r_senia",
        F_ALIAS_ => "Seña",
        F_HELP_ => "Valor de la Seña por la Reserva",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "540",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__noDel",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "550",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "550",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cobrar",
        F_ALIAS_ => "Cerrar (Cobrar Seña)",
        F_HELP_ => "Cerrar Reserva",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "560",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "cobrar_reserva.getVal()<1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cobrar_reserva",
        F_ALIAS_ => "Cierra una reserva",
        F_HELP_ => "Cierra una reserva",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cobrar_senia('+nro_res.getVal()+','+__local.getStr()+','+r_senia.getVal()+')'",
        F_QUERY_REF_ => "cobrar.get()=='Si'&&cobrar_reserva.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "560",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => " ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "66",
        F_NODB_ => "1",
        F_ORD_ => "570",
        C_SHOW_ => "cobrar_reserva.getVal()>0",
        F_FORMULA_ => "'( ! ) La operación se ha realizado con Exito!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goback",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "580",
        F_INLINE_ => "1",
        C_SHOW_ => "cobrar_reserva.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload(); setTimeout('self.close()',3000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
