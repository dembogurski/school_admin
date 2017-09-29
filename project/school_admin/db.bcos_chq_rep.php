<?php
$Obj->name = "bcos_chq_rep";
$Obj->alias = "Reporte de Cheques";
$Obj->help = "Reporte de Cheques";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "bcos_chq";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "bcos",
        F_SHOWFIELD_ => "b_nombre",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "chq_bco.hasChanged()||chq_cta.firstSQL",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_num,''",
        F_FILTER_ => "'cta_bco='+chq_bco.getVal()",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_benef",
        F_ALIAS_ => "Beneficiario",
        F_HELP_ => "Beneficiario",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Abierto,Emitido,Pagado,Rechazado,Anulado",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_pag",
        F_ALIAS_ => "Fecha Pago/Emis Desde",
        F_HELP_ => "Fecha de pago del cheque",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_pagh",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Fecha de pago del cheque",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "                    Mostrar Cheques                    ",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_cheq",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "chq_fecha_pag.get()!=''&&chq_fecha_pagh.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep2",
        F_ALIAS_ => "                    Mostrar Cheques Fecha de Emision Ordenados por Nro Cheques                 ",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_cheq_e",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "chq_fecha_pag.get()!=''&&chq_fecha_pagh.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
