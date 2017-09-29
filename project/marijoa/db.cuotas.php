<?php
$Obj->name = "cuotas";
$Obj->alias = "Cuotas";
$Obj->help = "Cuotas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cuotas";
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
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
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
        F_NAME_ => "ct_descuento",
        F_ALIAS_ => "Descuento",
        F_HELP_ => "Descuento",
        F_TYPE_ => "formula",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "44",
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
        F_NAME_ => "ct_cobrar",
        F_ALIAS_ => "Cobrar esta Cuota",
        F_HELP_ => "Cobrar esta Cuota",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cobrar_cuota('+ct_ref.getVal()+','+ct_nro.getVal()+','+__caja_ref.getVal()+','+__local.getStr()+', '+ct_monto.getVal()+',1,|{G$}| )'",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_cmp_asoc",
        F_ALIAS_ => "Comprobante Asociado",
        F_HELP_ => "Comprobante Asociado",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_ci",
        F_ALIAS_ => "CI/RUC",
        F_HELP_ => "CI/RUC",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goBack",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "ct_cobrar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',500);",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Clientes,Prevciones,Incobrables",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
