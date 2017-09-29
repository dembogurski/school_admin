<?php
$Obj->name = "bcos_chq_prov2";
$Obj->alias = "Cheques";
$Obj->help = "Cheques";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "bcos_chq";
$Obj->Filter = "";
$Obj->Sort = "chq_bco,chq_cta,chq_num";
$Obj->p_insert = "";
$Obj->p_change = "'SELECT bcos_desc_cheque( '+chq_num.getStr()+','+chq_cta.getStr()+')'";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "200";
$Obj->Add(
    array(
        F_NAME_ => "chq_cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_hoy",
        F_ALIAS_ => "Fecha actual",
        F_HELP_ => "Fecha actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT DATE_FORMAT(LEFT( NOW(),10),|{%Y%m%d}|)'",
        F_QUERY_REF_ => "chq_hoy.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "18",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda utilizada",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_num",
        F_ALIAS_ => "Numero",
        F_HELP_ => "Numero del cheque",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierto,Emitido,Pagado,Rechazado,Anulado",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_emis",
        F_ALIAS_ => "Fecha Emision",
        F_HELP_ => "Fecha Emisi%uFFFDn",
        F_TYPE_ => "date",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT DATE_FORMAT( LEFT(NOW(),10), |{%d-%m-%Y}|) '",
        F_QUERY_REF_ => "chq_fecha_emis.firstSQL",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "chq_estado.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_pag",
        F_ALIAS_ => "Fecha Pago",
        F_HELP_ => "Fecha de pago del cheque",
        F_TYPE_ => "date",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT DATE_FORMAT( LEFT(NOW(),10), |{%d-%m-%Y}|) '",
        F_QUERY_REF_ => "chq_fecha_pag.firstSQL",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "chq_estado.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_mult",
        F_ALIAS_ => "Utilizar para pago Multiple",
        F_HELP_ => "Utilizar para pago Multiple",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si",
        F_BROW_ => "1",
        F_ORD_ => "75",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_valor",
        F_ALIAS_ => "Valor",
        F_HELP_ => "Valor del cheque",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "chq_estado.get()!=''",
        C_CHANGE_ => "chq_estado.get()=='Emitido'&&operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_benef",
        F_ALIAS_ => "Beneficiario",
        F_HELP_ => "Beneficiario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT prov_nombre FROM mnt_prov WHERE prov_cod=|{'+sup['prov']+'}|'",
        F_QUERY_REF_ => "chq_benef.firstSQL",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "es",
        F_ALIAS_ => "Entrada/Salida",
        F_HELP_ => "Entrada/Salida",
        F_TYPE_ => "text",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "95",
        V_DEFAULT_ => "'S'",
        C_VIEW_ => "false",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_conc",
        F_ALIAS_ => "Buscar Concepto",
        F_HELP_ => "Buscar Concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_VIEW_ => "chq_estado.get()!='Abierto'",
        G_SHOW_ => "65",
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
        F_FILTER_ => "'cjc_tipo=|{S}| and cjc_descri like |{'+busc_conc.get()+'%}| and cjc_cod not like |{%-%}|'",
        F_LENGTH_ => "83",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        C_VIEW_ => "chq_estado.get()!='Abierto'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_conc",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto de cheque",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "concepto_princ.hasChanged()||es.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_tipo=|{S}| and cjc_cod like |{'+concepto_princ.get()+'-%}|'",
        F_LENGTH_ => "60",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        C_VIEW_ => "chq_estado.get()!='Abierto'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "4",
        F_ORD_ => "130",
        C_VIEW_ => "chq_estado.get()!='Abierto'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "depar",
        F_ALIAS_ => "Departamento",
        F_HELP_ => "Departamento",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "departamentos",
        F_SHOWFIELD_ => "dep_nombre,dep_nombre",
        F_ORD_ => "140",
        F_INLINE_ => "1",
        C_VIEW_ => "chq_estado.get()!='Abierto'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_mens",
        F_ALIAS_ => "Mensaje de error",
        F_HELP_ => "Mensaje de error",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "150",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        F_POSVAL_ => "false",
        F_MESSAGE_ => "'No se puede insertar cheques por esta opción!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "formula",
        F_ORD_ => "160",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['dp_fact_nro']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
