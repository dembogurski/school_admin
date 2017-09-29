<?php
$Obj->name = "cuotas_pagar";
$Obj->alias = "Cuotas a Pagar";
$Obj->help = "Cuotas a Pagar";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cuotas_pagar";
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
        F_NAME_ => "ct_ref",
        F_ALIAS_ => "Nº Factura ",
        F_HELP_ => "Nº Factura Relacionada",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
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
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "emp",
        F_ALIAS_ => "Sucursal de donde se debitara ",
        F_HELP_ => "Origen",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "12",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Obtiene Nro de caja Abierta de esta Suc",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ emp.getStr() +' AND cj_estado=|{Abierto}|'",
        F_QUERY_REF_ => "__caja_ref.firstSQL||emp.hasChanged()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "14",
        C_SHOW_ => "__local.get()!=''&&operation!=INSERT_",
        C_VIEW_ => "false",
        F_POSVAL_ => "__caja_ref.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_nro",
        F_ALIAS_ => "Nº de Cuota",
        F_HELP_ => "Nº de Cuota",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(ct_nro) + 1 from cuotas_pagar where ct_ref = '+ct_ref.getVal()+''",
        F_QUERY_REF_ => "if(operation==INSERT_){ ct_nro.firstSQL }",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_fecha_venc",
        F_ALIAS_ => "Fecha vencimiento",
        F_HELP_ => "Fecha vencimiento",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_cod_prov",
        F_ALIAS_ => "Código de Proveedor",
        F_HELP_ => "Código de Proveedor",
        F_TYPE_ => "formula",
        F_ORD_ => "33",
        C_VIEW_ => "false",
        F_FORMULA_ => " sup['dp_cod_prov'] ||  sup['prov']   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "35",
        F_FORMULA_ => "  sup['dp_prov'] ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto o Valor de la cuota",
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
        F_NAME_ => "valorl",
        F_ALIAS_ => "Valor FL",
        F_HELP_ => "Valor FL",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select c.c_valor_factl from mov_compras c where c_ref = '+ct_ref.getVal()",
        F_QUERY_REF_ => "ct_ref.hasChanged()||valorl.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "42",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_diff",
        F_ALIAS_ => "Diferencia",
        F_HELP_ => "Diferencia",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "43",
        F_INLINE_ => "1",
        F_FORMULA_ => "ct_monto.getVal()-valorl.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descuento",
        F_ALIAS_ => "Descuento",
        F_HELP_ => "Descuento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select c.c_descuento from mov_compras c where c_ref = '+ct_ref.getVal()",
        F_QUERY_REF_ => "ct_ref.hasChanged()||descuento.firstSQL",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cancelada",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_multiple",
        F_ALIAS_ => "Pago Multiple",
        F_HELP_ => "Pago Multiple",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_BROW_ => "1",
        F_ORD_ => "52",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_detalle_chq",
        F_ALIAS_ => "Detalle de Pago ",
        F_HELP_ => "Detalle de Pago ",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "200",
        F_ORD_ => "55",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_desea_pagar",
        F_ALIAS_ => "Desea pagar esta cuota al Proveedor?",
        F_HELP_ => "Desea pagar esta cuota al Proveedor?",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "57",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_pagar",
        F_ALIAS_ => "Pagar esta Cuota",
        F_HELP_ => "Pagar esta Cuota",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select pagar_cuota('+ct_ref.getVal()+','+ct_nro.getVal()+','+__caja_ref.getVal()+','+emp.getStr()+', '+ct_monto.getVal()+',|{'+p_user_+'}|)'",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "ct_desea_pagar.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goBack",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "ct_pagar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',500);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
