<?php
$Obj->name = "cuotas_ins";
$Obj->alias = "Cuotas";
$Obj->help = "Cuotas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cuotas";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'select gen_pagare('+ct_ref.getVal()+', '+ct_nro.getVal()+','+ct_monto.getVal()+','+ct_fecha_venc.getStr()+','+__local.getStr()+');'";
$Obj->p_change = "'select gen_pagare('+ct_ref.getVal()+', '+ct_nro.getVal()+','+ct_monto.getVal()+','+ct_fecha_venc.getStr()+','+__local.getStr()+');'";
$Obj->p_delete = "'delete from pagares where pg_ref = '+ct_ref.getVal()+' and pg_nro ='+ct_nro.getVal()+' '";
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
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

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
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

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
        F_ORD_ => "14",
        C_SHOW_ => "__local.get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "__caja_ref.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_nro",
        F_ALIAS_ => "Nº de Cuota",
        F_HELP_ => "Nº de Cuota",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(ct_nro) + 1 from cuotas where ct_ref = '+ct_ref.getVal()+''",
        F_QUERY_REF_ => "if(operation==INSERT_){ ct_nro.firstSQL }",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_porc",
        F_ALIAS_ => "Porcentaje de Descuento",
        F_HELP_ => "Porcentaje de Descuento",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        F_FORMULA_ => "if( sup['dp_porc'] == '' ) {  0 }else{ sup['dp_porc'] }",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_fecha_venc",
        F_ALIAS_ => "Fecha vencimiento",
        F_HELP_ => "Fecha vencimiento",
        F_TYPE_ => "date",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CURDATE() + INTERVAL 30 DAY'",
        F_QUERY_REF_ => "ct_fecha_venc.firstSQL",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "true",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_deudor",
        F_ALIAS_ => "Deudor",
        F_HELP_ => "Deudor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "35",
        F_FORMULA_ => "sup['dp_cli']",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

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
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_total_pgr",
        F_ALIAS_ => "Total a Pagar",
        F_HELP_ => "Total a Pagar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "42",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['dp_total_pagar']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_sumar",
        F_ALIAS_ => "Suma de cuotas",
        F_HELP_ => "Sumar",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select suma_cuotas_ref('+ct_ref.getVal()+','+ct_monto.getVal()+')' ",
        F_QUERY_REF_ => "ct_monto.hasChanged()||ct_sumar.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "43",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_descuento",
        F_ALIAS_ => "Descuento",
        F_HELP_ => "Descuento",
        F_TYPE_ => "formula",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "44",
        C_VIEW_ => "false",
        C_CHANGE_ => "ct_monto.hasChanged()",
        F_FORMULA_ => "(ct_monto.getVal()*ct_porc.getVal())/100",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_total",
        F_ALIAS_ => "Monto Total sin Descuento",
        F_HELP_ => "Monto total sin descuento",
        F_TYPE_ => "formula",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "47",
        C_VIEW_ => "false",
        C_CHANGE_ => "ct_descuento.hasChanged()",
        F_FORMULA_ => "ct_monto.getVal() - ct_descuento.getVal()",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

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
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "__lock_cuotas",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( ct_sumar.getVal()> ct_total_pgr.getVal() || ct_monto.getVal()<1   ){ disableAcceptButton() }else{ enableAcceptButton() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => " ct_sumar.getVal()> ct_total_pgr.getVal()  ",
        F_FORMULA_ => "if( ct_sumar.getVal()> ct_total_pgr.getVal()){ 'Suma de Cuotas Supera el total de la factura' } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_entrega",
        F_ALIAS_ => "Monto entregado",
        F_HELP_ => "Monto entregado",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rest",
        F_ALIAS_ => "Restante",
        F_HELP_ => "Restante",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_TOTAL_ => "1",
        F_ORD_ => "90",
        F_FORMULA_ => "ct_monto.getVal()-ct_entrega.getVal() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ret_iva",
        F_ALIAS_ => "Retencion de IVA",
        F_HELP_ => "Retencion de IVA",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "100",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_ci",
        F_ALIAS_ => "CI/RUC",
        F_HELP_ => "CI/RUC",
        F_TYPE_ => "formula",
        F_LENGTH_ => "20",
        F_ORD_ => "110",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['dp_ci']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
