<?php
$Obj->name = "bcos_chq_prov3";
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
$Obj->NoInsert = "1";
$Obj->Limit = "200";
$Obj->Add(
    array(
        F_NAME_ => "chq_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_ORD_ => "2",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "formula",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        F_FORMULA_ => "sup['cta']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda utilizada",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
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
        F_ORD_ => "34",
        C_VIEW_ => "false",
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
        F_INLINE_ => "1",
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
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "chq_estado.get()!='Abierto'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_ci",
        F_ALIAS_ => "CI/RUC",
        F_HELP_ => "CI/RUC",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_ORD_ => "93",
        C_VIEW_ => "chq_estado.get()!='Abierto'",
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
        F_FILTER_ => "'emp_tipo <> |{Deposito}| order by emp_cod asc'",
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
        F_NAME_ => "__disableAccept",
        F_ALIAS_ => "Inhabilita Accept",
        F_HELP_ => "Inhabilita Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__enableAccept",
        F_ALIAS_ => "Enable Accept button",
        F_HELP_ => "Enable Accept button",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_SHOW_ => "operation!=CHANGE_",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento Informacion complementaria",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "190",
        C_VIEW_ => "chq_estado.get()!='Abierto'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_guardar",
        F_ALIAS_ => "Guardar",
        F_HELP_ => "Guardar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select orden_pago_gen( '+chq_num.getStr()+','+chq_cta.getStr()+','+chq_estado.getStr()+','+chq_fecha_emis.getStr()+','+chq_fecha_pag.getStr()+','+chq_valor.getVal()+','+chq_benef.getStr()+','+chq_conc.getStr()+','+concepto_princ.getVal()+','+empr.getStr()+','+depar.getStr()+','+chq_compl.getStr()+','+chq_ci.getStr()+','+chq_mult.getStr()+','+chq_ref.getStr()+',|{Proveedor de Mercaderias}|)'",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_SHOW_ => "chq_compl.get()!=''&&chq_valor.getVal()>0&&!chq_guardar.get()&&operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_ord_impr",
        F_ALIAS_ => "                Imprimir Orden de Pago               ",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.orden_pago",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => " chq_guardar.get()&&operation==CHANGE_ ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_finalizar",
        F_ALIAS_ => "Terminar",
        F_HELP_ => "Terminar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT 12'",
        F_NODB_ => "1",
        F_ORD_ => "220",
        F_INLINE_ => "1",
        C_SHOW_ => "chq_guardar.get()&&operation==CHANGE_&&!chq_finalizar.get()&&operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__back",
        F_ALIAS_ => "Diff Fechas",
        F_HELP_ => "Diff Fechas",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "500",
        F_INLINE_ => "1",
        C_SHOW_ => "chq_finalizar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload(); setTimeout('self.close()',1000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
