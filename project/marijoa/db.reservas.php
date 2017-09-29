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
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "nro_res",
        F_ALIAS_ => "Nro de Reserva",
        F_HELP_ => "Genera Reserva",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select gen_reserva('+__user.getStr()+','+__local.getStr()+','+fact_cli_ci.getStr()+','+fact_nom_cli.getStr()+','+desde.getStr()+')'",
        F_QUERY_REF_ => "gen_res.get()=='Si'&&nro_res.getVal()<1",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "4",
        C_VIEW_ => "gen_res.get()=='Si'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Codigo del usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
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
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_busc_cli",
        F_ALIAS_ => "Buscar Cliente :",
        F_HELP_ => "Busca Clientes (Ingrese C.I. o R.U.C. para nuevo Cliente)",
        F_TYPE_ => "text",
        F_LENGTH_ => "25",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_CHANGE_ => "operation==CONSULT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cli_ci",
        F_ALIAS_ => "Nº C.I. o R.U.C.",
        F_HELP_ => "Nº Cédula o R.U.C. del cliente",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "el['fact_busc_cli'].hasChanged()",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_ci,cli_fullname,cli_cat",
        F_FILTER_ => "'(cli_fullname LIKE |{'+el['fact_busc_cli'].get()+'%}| or cli_ci LIKE |{'+el['fact_busc_cli'].get()+'%}|)   ORDER BY cli_ci LIMIT 30'  ",
        F_LENGTH_ => "14",
        F_REQUIRED_ => "1",
        F_ORD_ => "43",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('cli_ci')",
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
        F_NAME_ => "categ",
        F_ALIAS_ => "Categoria",
        F_HELP_ => "Categoria",
        F_TYPE_ => "formula",
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "db('cli_cat')",
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
        V_DEFAULT_ => "thisDate_",
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
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,En Caja,Pendiente,Retirada,Vencida",
        F_LENGTH_ => "24",
        F_BROW_ => "1",
        F_ORD_ => "500",
        C_VIEW_ => "operation==BROWSE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_res",
        F_ALIAS_ => "Generar Reserva",
        F_HELP_ => "Generar Reserva",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "510",
        C_SHOW_ => "operation==CONSULT_&&fact_cli_ci.get()!='' ",
        C_VIEW_ => "nro_res.getVal()<1",
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
        C_SHOW_ => "operation==CHANGE_&&openSubform",
        C_VIEW_ => "r_total.getVal() < 1",
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
        C_VIEW_ => "operation!=CONSULT_&&finalizar.get()=='Si'",
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
        C_SHOW_ => "r_total.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "terminar",
        F_ALIAS_ => "Terminar (Pasar a Caja)",
        F_HELP_ => "Terminar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update reservas set estado = |{En Caja}| where nro_res ='+nro_res.get()",
        F_NODB_ => "1",
        F_ORD_ => "546",
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
        F_ORD_ => "550",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__change",
        F_ALIAS_ => "Operation = CHANGE_",
        F_HELP_ => "Operation = CHANGE_",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "560",
        C_SHOW_ => "nro_res.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "operation=CHANGE_",
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
        C_SHOW_ => "terminar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload(); setTimeout('self.close()',1000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
