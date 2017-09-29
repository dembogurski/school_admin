<?php
$Obj->name = "cheq_terceros_rep";
$Obj->alias = "Reporte Cheques de Terceros";
$Obj->help = "Reporte Cheques de Terceros";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cheq_terceros_cob";
$Obj->Filter = "db.cheq_terceros_cob";
$Obj->Sort = "id, chq_fecha_pag DESC";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "chq_bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_num",
        F_ALIAS_ => "Numero",
        F_HELP_ => "Numero del cheque",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_nombre_de",
        F_ALIAS_ => "Nombre de ",
        F_HELP_ => "Nombre de ",
        F_TYPE_ => "text",
        F_LENGTH_ => "100",
        F_ORD_ => "25",
        F_FORMULA_ => " ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "27",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_fecha",
        F_ALIAS_ => "Filtrar x Fecha de",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Emision,Pago,Registro,Acreditacion,Deposito",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "28",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "43",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_ORD_ => "44",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "filtro_fecha",
        F_ALIAS_ => "Filtro Fecha",
        F_HELP_ => "Filtro Fecha",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "45",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(tipo_fecha.get()=='Emision'){'chq_fecha_emis'}else if(tipo_fecha.get()=='Pago'){'chq_fecha_pag'}else if(tipo_fecha.get()=='Acreditacion'){'fechaacred'}else if(tipo_fecha.get()=='Deposito'){'fechadep'}else{'chq_fecha_ins'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "orderby",
        F_ALIAS_ => "Ordenado por Fecha de:",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Emision,Pago,Registro,Acreditacion,Deposito",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "46",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Al Dia,Diferido",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "46",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "order",
        F_ALIAS_ => "Orden",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "ASC,DESC",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "47",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "order_by",
        F_ALIAS_ => "Filtro Fecha",
        F_HELP_ => "Filtro Fecha",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "48",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(orderby.get()=='Emision'){'chq_fecha_emis'}else if(orderby.get()=='Pago'){'chq_fecha_pag'}else if(orderby.get()=='Acreditacion'){'fechaacred'}else if(orderby.get()=='Deposito'){'fechadep'}else{'chq_fecha_ins'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Pendiente,Cobrado,Devuelto,Anulado",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "49",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "recibido",
        F_ALIAS_ => "Recibido por Administracion",
        F_HELP_ => "Recibido por Administracion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Recibido,No Recibido",
        F_NODB_ => "1",
        F_ORD_ => "51",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "recibido2",
        F_ALIAS_ => "Recibido por Gerencia",
        F_HELP_ => "Recibido por Gerencia",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Recibido,No Recibido",
        F_NODB_ => "1",
        F_ORD_ => "52",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "55",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep",
        F_ALIAS_ => "Ver Reporte Cheques",
        F_HELP_ => "Ver Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.cheq_terceros",
        F_NODB_ => "1",
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_rec",
        F_ALIAS_ => "Filtrar Cheques para Entrega",
        F_HELP_ => "Ver Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.cheq_terceros_ent",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        G_SHOW_ => "20512",
        G_CHANGE_ => "20512"));

$Obj->Add(
    array(
        F_NAME_ => "repv",
        F_ALIAS_ => "Ver Reporte Cheques Registrados x Ventas",
        F_HELP_ => "Ver Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.cheq_ter_x_ventas",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
