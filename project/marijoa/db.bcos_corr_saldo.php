<?php
$Obj->name = "bcos_corr_saldo";
$Obj->alias = "Correccion de Saldo de cuentas";
$Obj->help = "Correccion de Saldo de cuentas";
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
        F_NAME_ => "fecha_mov",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de pago del cheque",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto",
        F_ALIAS_ => "Saldo en Esta Fecha",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "72",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "76",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ins",
        F_ALIAS_ => "Insertar Movimiento",
        F_HELP_ => "Insertar Movimiento",
        F_TYPE_ => "proc",
        F_QUERY_ => "'INSERT INTO bcos_ctas_det (id,ctd_cta,ctd_fecha,ctd_anterior,ctd_con,ctd_compl,ctd_doc,ctd_entrada,ctd_salida,ctd_actual) VALUES( null,'+chq_cta.getStr()+','+fecha_mov.getStr()+',0.00,|{8}|,'+compl.getStr()+',|{00000}|,0,0,'+monto.getVal()+' );'",
        F_ORD_ => "90",
        C_SHOW_ => "monto.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mes_ini",
        F_ALIAS_ => "Mes Inicio de Correccion (dia 1ro del Siguiente mes)",
        F_HELP_ => "Fecha de pago del cheque",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "corr",
        F_ALIAS_ => "Corregir Saldos",
        F_HELP_ => "Corregir ",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT bcos_corr_saldos('+chq_cta.getStr()+', '+mes_ini.getStr()+')'",
        F_ORD_ => "110",
        C_SHOW_ => "monto.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
