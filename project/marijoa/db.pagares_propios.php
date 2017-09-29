<?php
$Obj->name = "pagares_propios";
$Obj->alias = "Pagares Propios";
$Obj->help = "Pagares Propios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "pagares_propios";
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
        F_NAME_ => "pg_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pg_nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pg_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pg_cod_prov",
        F_ALIAS_ => "Código de Proveedor",
        F_HELP_ => "Código de Proveedor",
        F_TYPE_ => "formula",
        F_ORD_ => "27",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['dp_cod_prov']||sup['prov']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pg_benef",
        F_ALIAS_ => "Beneficiario",
        F_HELP_ => "Beneficiario",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "35",
        F_FORMULA_ => "sup['dp_prov']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pg_monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_entregado",
        F_ALIAS_ => "Mondo entregado",
        F_HELP_ => "Mondo entregado",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "42",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Tipo de Moneda ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_BROW_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Obtiene Localidad",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Obtiene Nro de caja Abierta de esta Suc",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ __local.getStr() +' AND cj_estado=|{Abierto}|'",
        F_QUERY_REF_ => "__caja_ref.firstSQL",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "55",
        C_SHOW_ => "__local.get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "__caja_ref.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "forma",
        F_ALIAS_ => "Forma de Pago",
        F_HELP_ => "Forma de Pago",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Depositos,Caja,Cheque",
        F_NODB_ => "1",
        F_ORD_ => "56",
        C_SHOW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pg_pagar",
        F_ALIAS_ => "Pagar con Caja",
        F_HELP_ => "Pagar este Pagare",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select pagar_pagare('+pg_ref.getVal()+','+pg_nro.getVal()+','+__caja_ref.getVal()+','+__local.getStr()+', '+pg_monto.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "forma.get()=='Caja'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_chq",
        F_ALIAS_ => "Buscar Cheque Nro o Beneficiario",
        F_HELP_ => "Nro Cheque",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "72",
        C_SHOW_ => "forma.get()=='Cheque'",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_n",
        F_ALIAS_ => "Cheque",
        F_HELP_ => "Cheque",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "nro_chq.hasChanged()",
        F_RELTABLE_ => "bcos_chq",
        F_SHOWFIELD_ => "chq_num,chq_benef",
        F_FILTER_ => "'chq_num like |{'+nro_chq.get()+'%}| or chq_benef  like |{'+nro_chq.get()+'%}| and chq_estado <> |{Abierto}| and chq_valor > 0 order by chq_num,chq_benef asc  '",
        F_ORD_ => "72",
        F_INLINE_ => "1",
        C_SHOW_ => "forma.get()=='Cheque'",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo_chq",
        F_ALIAS_ => "Saldo No Utilizado de Cheque",
        F_HELP_ => "Saldo No Utilizado de Cheque",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select chq_valor - chq_monto_utili  from bcos_chq where chq_num = '+chq_n.getStr()",
        F_QUERY_REF_ => "chq_n.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "73",
        F_INLINE_ => "1",
        C_SHOW_ => "forma.get()=='Cheque'",
        C_VIEW_ => "operation!=INSERT_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado_chq",
        F_ALIAS_ => "Estado del Cheque",
        F_HELP_ => "Estado del Cheque",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select chq_estado  from bcos_chq where chq_num = '+chq_n.getStr()",
        F_QUERY_REF_ => "chq_n.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_SHOW_ => "forma.get()=='Cheque'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "add_chq",
        F_ALIAS_ => "Agregar Cheque",
        F_HELP_ => "Agregar Cheque",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select add_cheq_pagare('+chq_n.getStr()+','+saldo_chq.getVal()+','+pg_nro.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "77",
        C_SHOW_ => "operation!=INSERT_",
        C_VIEW_ => "saldo_chq.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_dep",
        F_ALIAS_ => "Nº de Deposito",
        F_HELP_ => "Nº de Deposito",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "operation!=INSERT_",
        C_VIEW_ => "forma.get()=='Depositos'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dep_saldo",
        F_ALIAS_ => "Saldo Deposito",
        F_HELP_ => "Saldo Deposito",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT depositos.saldo from depositos where depositos.nro_dep = '+nro_dep.getVal()",
        F_QUERY_REF_ => "nro_dep.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "81",
        F_INLINE_ => "1",
        C_SHOW_ => "operation!=INSERT_",
        C_VIEW_ => "nro_dep.notEmpty()",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "espacio",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "82",
        C_SHOW_ => "operation!=INSERT_",
        C_VIEW_ => "forma.get()=='Depositos'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "add_dep",
        F_ALIAS_ => "Agregar Deposito",
        F_HELP_ => "Agregar Deposito",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select add_deposito_pagare('+nro_dep.getStr()+','+dep_saldo.getVal()+','+pg_nro.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "83",
        F_INLINE_ => "1",
        C_SHOW_ => "operation!=INSERT_",
        C_VIEW_ => "dep_saldo.getVal()>0&&(pg_monto.getVal()-monto_entregado.getVal()>0)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "detalle",
        F_ALIAS_ => "Detalle Nros de Depositos o Cheques",
        F_HELP_ => "Detalle de depositos",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "500",
        F_ORD_ => "90",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pg_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "100",
        V_DEFAULT_ => "'Pendiente'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "add_dep.get()||add_chq.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',800)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "pg_estado.get()=='Cancelado'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_SHOW_ => "pg_estado.get()=='Cancelado'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
