<?php
$Obj->name = "reservas";
$Obj->alias = "Reservas de Telas";
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
        C_CHANGE_ => "false",
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
        C_CHANGE_ => "false",
        F_FORMULA_ => "db('cli_ci')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nom_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Nombre completo del cliente",
        F_TYPE_ => "text",
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
        F_NAME_ => "categ",
        F_ALIAS_ => "Categoria",
        F_HELP_ => "Categoria",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cli_cat from mnt_cli WHERE cli_ci ='+el['fact_cli_ci'].getStr()+' limit 1'",
        F_QUERY_REF_ => "categ.firstSQL",
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
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
        F_TYPE_ => "date",
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
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,En Caja",
        F_LENGTH_ => "24",
        F_BROW_ => "1",
        F_ORD_ => "500",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "res_detalle",
        F_ALIAS_ => "Detalle de Reserva",
        F_HELP_ => "Detalle de Reserva",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'nro_res = '+nro_res.getVal()",
        F_LINK_ => "db.reserva_det",
        F_SEND_ => "nro_res.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "520",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "finalizar",
        F_ALIAS_ => "Finalizar",
        F_HELP_ => "Finalizar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "522",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "r_total",
        F_ALIAS_ => "Valor Total",
        F_HELP_ => "Valor Total",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select r_total,r_senia from reservas where nro_res = '+nro_res.getVal()",
        F_QUERY_REF_ => "finalizar.get()=='Si'&&r_total.firstSQL",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "530",
        C_VIEW_ => "operation==CHANGE_&&finalizar.get()=='Si'",
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
		F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select r_total * 30 / 100 from reservas where nro_res = '+nro_res.getVal()",
        F_QUERY_REF_ => "finalizar.get() == 'Si' && r_total.hasChanged()",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "540",
        F_INLINE_ => "1",
        C_VIEW_ => "operation!=CONSULT_ && finalizar.get()=='Si'", 
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "r_print",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.reserva_mat",
        F_NODB_ => "1",
        F_ORD_ => "545",
        F_INLINE_ => "1",
        C_SHOW_ => "r_total.getVal()>0&&operation==CHANGE_&&finalizar.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));



$Obj->Add(
    array(
        F_NAME_ => "terminar",
        F_ALIAS_ => "Terminar  (Pasar a Caja)",
        F_HELP_ => "Terminar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update reservas set estado = |{En Caja}| where nro_res ='+nro_res.get()",
        F_NODB_ => "1",
        F_ORD_ => "555",
        F_INLINE_ => "1",
        C_SHOW_ => "!terminar.get()",
        C_VIEW_ => "r_total.getVal()>0&&operation==CHANGE_&&finalizar.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
		
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "556",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "__goback",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "565",
        C_SHOW_ => "terminar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload(); setTimeout('self.close()',1000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
