<?php
$Obj->name = "rep_mov_caja";
$Obj->alias = "Reporte de Movimientos de caja";
$Obj->help = "Reporte de Movimientos de caja";
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
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "10",
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
        F_OPTIONS_ => "%,55,33-%",
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
        F_NAME_ => "cambiomerc",
        F_ALIAS_ => "Cambio de Mercado",
        F_HELP_ => "Porcentaje de Descuento",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_ORD_ => "36",
        F_INLINE_ => "1",
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
        F_ORD_ => "40",
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
        F_ORD_ => "42",
        F_INLINE_ => "1",
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
        F_ORD_ => "43",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "arqueo_audit",
        F_ALIAS_ => "Arqueo de Caja (Audit)",
        F_HELP_ => "Arqueo de Caja Auditoria",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.arqueo_audit",
        F_NODB_ => "1",
        F_ORD_ => "64",
        F_INLINE_ => "1",
		    C_SHOW_ => "(p_user_ == 'Developer' || p_user_ == 'Jack' || p_user_ == 'douglas' || p_user_ == 'Lelia'  || p_user_ == 'MariaRivas')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_movx",
        F_ALIAS_ => "Control de Facturas Contado",
        F_HELP_ => "Ver Informe de Movimientos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.mov_caja_pers",
        F_NODB_ => "1",
        F_ORD_ => "44",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_movtc",
        F_ALIAS_ => "Movimientos x Deposito y Cambios de Divisas",
        F_HELP_ => "Ver Informe de Movimientos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_mov_cajatc",
        F_NODB_ => "1",
        F_ORD_ => "46",
        C_VIEW_ => "cambiomerc.getVal()>0&&moneda.get()!='G$' && moneda.get()!='%'",
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

?>
