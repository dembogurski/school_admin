<?php
$Obj->name = "bcos_ctas_det";
$Obj->alias = "Detalle de cuentas";
$Obj->help = "Detalle de cuentas Corrientes";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "bcos_ctas_det";
$Obj->Filter = "'MONTH(ctd_fecha)=MONTH(NOW())'";
$Obj->Sort = "id desc";
$Obj->p_insert = "'SELECT bcos_corr_saldos('+ctd_cta.getStr()+', '+ctd_fecha.getStr()+')'";
$Obj->p_change = "'SELECT bcos_corr_saldos('+ctd_cta.getStr()+', '+ctd_fecha.getStr()+')'";
$Obj->p_delete = "'SELECT bcos_corr_saldos('+ctd_cta.getStr()+', '+ctd_fecha.getStr()+')'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "ctd_cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de movimiento",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_anterior",
        F_ALIAS_ => "Saldo Anterior",
        F_HELP_ => "Saldo Anterior",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT ctd_actual FROM bcos_ctas_det WHERE ctd_cta='+ctd_cta.getStr()+' ORDER BY ctd_fecha DESC, id DESC LIMIT 1'",
        F_QUERY_REF_ => "ctd_anterior.firstSQL&&operation==INSERT_",
        F_LENGTH_ => "20",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "25",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_conc",
        F_ALIAS_ => "Buscar Concepto",
        F_HELP_ => "Buscar Concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "26",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "concepto_princ",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_conc.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_descri like |{'+busc_conc.get()+'%}| and cjc_cod not like |{%-%}|'",
        F_NODB_ => "1",
        F_ORD_ => "27",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_con",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "concepto_princ.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_cod like |{'+concepto_princ.get()+'-%}|'",
        F_LENGTH_ => "5",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_n_con",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cjc_descri from caja_con where cjc_cod = '+ctd_con.getStr()+' '",
        F_QUERY_REF_ => "ctd_con.hasChanged()",
        F_RELTABLE_ => "bcos_ctas_con",
        F_RELFIELD_ => "bcc_cod",
        F_LOCALFIELD_ => "ctd_con",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "45",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bcc_le_con",
        F_ALIAS_ => "Le Concepto",
        F_HELP_ => "Le Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT * from caja_con WHERE cjc_cod='+ctd_con.getStr()",
        F_QUERY_REF_ => "ctd_con.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento para el movimiento",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "400",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "db('cjc_compl')=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_doc",
        F_ALIAS_ => "Documento",
        F_HELP_ => "Numero del Documento",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_entrada",
        F_ALIAS_ => "Entrada",
        F_HELP_ => "Entrada",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "db('cjc_tipo')=='E' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_salida",
        F_ALIAS_ => "Salida",
        F_HELP_ => "Salida",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "db('cjc_tipo')=='S'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_conf_ins",
        F_ALIAS_ => "Insertar",
        F_HELP_ => "Insertar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "ctd_actual.getVal()!=ctd_anterior.getVal()",
        C_VIEW_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_actual",
        F_ALIAS_ => "Saldo Actual",
        F_HELP_ => "Saldo Actual",
        F_TYPE_ => "formula",
        F_LENGTH_ => "20",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "105",
        F_FORMULA_ => "ctd_anterior.getVal()+ctd_entrada.getVal()-ctd_salida.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_saldo",
        F_ALIAS_ => "Saldo",
        F_HELP_ => "Saldo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "20",
        F_DEC_ => "2",
        F_ORD_ => "106",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        F_FORMULA_ => "ctd_entrada.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__makeInsert",
        F_ALIAS_ => "Fuerza el insert",
        F_HELP_ => "Fuerza el insert",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "ctd_conf_ins.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "forceInsert()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableChange",
        F_ALIAS_ => "Inhabilita boton de Modificar",
        F_HELP_ => "Inhabilita boton de Modificar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "false",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableAccept",
        F_ALIAS_ => "Inhabilita Accept",
        F_HELP_ => "Inhabilita Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
