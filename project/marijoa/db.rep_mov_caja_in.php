<?php
$Obj->name = "rep_mov_caja_in";
$Obj->alias = "Reporte de Movimientos de Caja";
$Obj->help = "Reporte de Movimientos de Caja";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
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
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "empr.firstSQL",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "es",
        F_ALIAS_ => "Entrada/Salida",
        F_HELP_ => "Entrada/Salida",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,E,S",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mov_cons",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Mostrar Movimientos de Salida por Consolidacion?",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,55",
        F_NODB_ => "1",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha desde:",
        F_HELP_ => "Fecha en que se realiza la operación",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fechah",
        F_ALIAS_ => "Fecha hasta:",
        F_HELP_ => "Fecha hasta",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_inv",
        F_ALIAS_ => "Fecha Invetida",
        F_HELP_ => "Fecha Invetida",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        C_CHANGE_ => "fecha.hasChanged()",
        F_FORMULA_ => "fecha.getYear()+'-'+fecha.getMonth()+'-'+fecha.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fechah_inv",
        F_ALIAS_ => "Fecha Invetida",
        F_HELP_ => "Fecha Invetida",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "61",
        C_VIEW_ => "false",
        C_CHANGE_ => "fechah.hasChanged()",
        F_FORMULA_ => "fechah.getYear()+'-'+fechah.getMonth()+'-'+fechah.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "defer",
        F_ALIAS_ => "Direferencia",
        F_HELP_ => "Direferencia",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "71",
        C_VIEW_ => "false",
        F_FORMULA_ => "diffDate(fechah.get(), fecha.get() )",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_mov",
        F_ALIAS_ => "Ver Informe de Movimientos",
        F_HELP_ => "Ver Informe de Movimientos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_mov_caja",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "defer.get()<4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_arqueo",
        F_ALIAS_ => "Informe de Arqueo de Caja",
        F_HELP_ => "Arqueo de Caja",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.arqueo_caja",
        F_NODB_ => "1",
        F_ORD_ => "105",
        F_INLINE_ => "1",
        C_SHOW_ => "defer.get()<4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "det_billetes",
        F_ALIAS_ => "Control de Billetes",
        F_HELP_ => "Control de Billetes",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.control_billete",
        F_NODB_ => "1",
        F_ORD_ => "106",
        F_INLINE_ => "1",
        C_SHOW_ => "defer.get()<4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "defer.getVal()>3",
        F_FORMULA_ => "'( ! ) No necesita hacer reportes tan grades eso podria dejar mas lento el sistema!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "defer.getVal()>3",
        F_FORMULA_ => "'( ! ) Elija un rango de fecha menor!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
