<?php
$Obj->name = "fact_detalle_pg";
$Obj->alias = "Detalle de Pago";
$Obj->help = "Detalle de Pago";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "fact_detalle_pg";
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
        F_NAME_ => "dp_fact_nro",
        F_ALIAS_ => "Nº de Factura",
        F_HELP_ => "Nº de Factura",
        F_TYPE_ => "text",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_local",
        F_ALIAS_ => "Local",
        F_HELP_ => "Local",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "11",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['fact_localidad']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_count_det",
        F_ALIAS_ => "Verifica",
        F_HELP_ => "Verifica la cantidad de detalles de pagos de esta factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(id) from fact_detalle_pg where dp_fact_nro = '+dp_fact_nro.getVal()",
        F_QUERY_REF_ => "dp_count_det.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "12",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "13",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['fact_nom_cli']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "14",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_efectivo",
        F_ALIAS_ => "Monto de entrega en Efectivo",
        F_HELP_ => "Monto de entrega en Efectivo",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "19",
        C_CHANGE_ => "operation==INSERT_||dp_count_det.getVal()<1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda con que va a abonar",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_descri",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "operation==INSERT_||dp_count_det.getVal()<1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_cotiz",
        F_ALIAS_ => "Cotizacion del dia",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+dp_moneda.getStr()+');'",
        F_QUERY_REF_ => "dp_moneda.hasChanged()||dp_cotiz.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "21",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_otra_moneda",
        F_ALIAS_ => "Total otra moneda",
        F_HELP_ => "Total otra moneda",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "22",
        C_CHANGE_ => "dp_cotiz.onChange()",
        F_FORMULA_ => "dp_total_pagar.getVal()/dp_cotiz.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_moneda_ref",
        F_ALIAS_ => "Monto (Ref) ",
        F_HELP_ => "Monto (Moneda Referencia) ",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_CHANGE_ => "dp_efectivo.hasChanged()||dp_cotiz.hasChanged()",
        F_FORMULA_ => "dp_cotiz.getVal()*dp_efectivo.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_FORMULA_ => "'Rellene los datos abajo si el cliente compra con convenio. Caso contrario deje en blanco...'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_conv",
        F_ALIAS_ => "Convenio con que Compra",
        F_HELP_ => "Convenio  (Deje  vacio si no compra con Convenio)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_cod,conv_nombre",
        F_LENGTH_ => "15",
        F_ORD_ => "28",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_porc",
        F_ALIAS_ => "Porcentaje de Descuento",
        F_HELP_ => "Porcentaje de Descuento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select conv_porc from mnt_conv where conv_cod = '+dp_conv.getStr()+''",
        F_QUERY_REF_ => "dp_conv.hasChanged()",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_conv_tipo",
        F_ALIAS_ => "Tipo Convenio",
        F_HELP_ => "Tipo Convenio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select conv_tipo from mnt_conv where conv_cod = '+dp_conv.getStr()+''",
        F_QUERY_REF_ => "dp_conv.hasChanged()",
        F_LENGTH_ => "16",
        F_BROW_ => "1",
        F_ORD_ => "32",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_nro_orden",
        F_ALIAS_ => "Nº de Orden de Convenio",
        F_HELP_ => "Nº de Orden de Convenio",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        C_VIEW_ => "dp_conv.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cp_cant_cts",
        F_ALIAS_ => "Cantidad de Cuotas",
        F_HELP_ => "Cantidad de Cuotas",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'0'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_cuentas",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_num,cta_moneda",
        F_RELFIELD_ => "cta_bco",
        F_LOCALFIELD_ => "dp_fact_nro",
        F_FILTER_ => "'cta_num like |{21-00467200-00}| or cta_num like |{01-10-7051953}| or cta_num like |{01107052043}|'",
        F_BROW_ => "1",
        F_ORD_ => "36",
        C_VIEW_ => "dp_conv.get()!=''&&dp_conv_tipo.get()!='Convenio'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_dias_acr",
        F_ALIAS_ => "Dias p/acreditacion",
        F_HELP_ => "Nº de dias en que tarda para que se acredite en la C.C.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select conv_dias_acr from mnt_conv where conv_cod = '+dp_conv.getVal()",
        F_QUERY_REF_ => "dp_conv.hasChanged()",
        F_LENGTH_ => "4",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "37",
        F_INLINE_ => "1",
        C_VIEW_ => "dp_conv.get()!=''&&dp_conv_tipo.get()!='Convenio'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_cuotas",
        F_ALIAS_ => "Cuotas",
        F_HELP_ => "Cuotas",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'ct_ref = '+dp_fact_nro.getVal();",
        F_LINK_ => "db.cuotas_ins",
        F_SEND_ => "dp_fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "38",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_print_aut",
        F_ALIAS_ => "Imprimir Autorizacion",
        F_HELP_ => "Imprimir Autorizacion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Unipersonal,Para Empresas",
        F_NODB_ => "1",
        F_ORD_ => "38",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir_auth",
        F_ALIAS_ => "Imprimir Autorizacion",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.autorizacion",
        F_NODB_ => "1",
        F_ORD_ => "42",
        F_INLINE_ => "1",
        C_SHOW_ => "dp_print_aut.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_print",
        F_ALIAS_ => "Imprimir Pagares",
        F_HELP_ => "Imprimir Pagares",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        C_SHOW_ => "openSubform",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_pg",
        F_ALIAS_ => "Pageres",
        F_HELP_ => "Pageres",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "dp_print.hasChanged()",
        F_RELTABLE_ => "pagares",
        F_SHOWFIELD_ => "pg_nro,pg_fecha",
        F_FILTER_ => "'pg_ref = '+dp_fact_nro.getVal()+' order by pg_nro asc'",
        F_NODB_ => "1",
        F_ORD_ => "47",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir_pg",
        F_ALIAS_ => "Imprimir Pagare",
        F_HELP_ => "Imprimir Pagare",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.pagare_cliente",
        F_NODB_ => "1",
        F_ORD_ => "48",
        F_INLINE_ => "1",
        C_SHOW_ => "nro_pg.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cheq_terceros",
        F_ALIAS_ => "Cheques",
        F_HELP_ => "Cheques de terceros",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'chq_ref = '+dp_fact_nro.getVal()",
        F_LINK_ => "db.chq_terceros_in",
        F_SEND_ => "dp_fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "49",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_pagares",
        F_ALIAS_ => "Pagares",
        F_HELP_ => "Pagares",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'pg_ref = '+dp_fact_nro.getVal()",
        F_LINK_ => "db.pagares",
        F_SEND_ => "dp_fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_sum",
        F_ALIAS_ => "Sumar (Actualizar Monto)",
        F_HELP_ => "Sumar (Actualizar Monto)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "55",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_tmp",
        F_ALIAS_ => "Temporal",
        F_HELP_ => "Temporal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select 1'",
        F_QUERY_REF_ => "dp_sum.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_suma",
        F_ALIAS_ => "Suma cta chq pg",
        F_HELP_ => "Suma cta chq pg",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum_cuo_chq_pagare('+dp_fact_nro.getVal()+');'",
        F_QUERY_REF_ => "dp_sum.get()=='Si'||dp_suma.firstSQL||dp_sum.hasChanged()",
        F_ORD_ => "85",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_total_pagar",
        F_ALIAS_ => "Total a Pagar",
        F_HELP_ => "Total a Pagar",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "86",
        C_CHANGE_ => "false",
        F_FORMULA_ => "sup['fact_total_pagr']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_total",
        F_ALIAS_ => "Suma total",
        F_HELP_ => "Suma total",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "87",
        F_FORMULA_ => "dp_moneda_ref.getVal()+dp_suma.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_faltante",
        F_ALIAS_ => "Faltante",
        F_HELP_ => "Faltante",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "87",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "dp_total.hasChanged()",
        F_FORMULA_ => "parseInt(dp_total_pagar.getVal()-dp_total.getVal())",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_vuelto",
        F_ALIAS_ => "Vuelto",
        F_HELP_ => "Vuelto",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "88",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "dp_total.hasChanged()",
        F_FORMULA_ => "if( dp_total.getVal()>dp_total_pagar.getVal()  ){ dp_total.getVal() - dp_total_pagar.getVal() } else { 0 }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_informe",
        F_ALIAS_ => "<------",
        F_HELP_ => "<------",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "89",
        F_INLINE_ => "1",
        C_VIEW_ => "dp_conv.get()==''",
        C_CHANGE_ => "dp_total.hasChanged()",
        F_FORMULA_ => "if(dp_total_pagar.getVal()>dp_total.getVal()){ 'Faltante  '+ parseInt(dp_total_pagar.getVal()-dp_total.getVal()) }else if(dp_total_pagar.getVal()<dp_total.getVal()){ 'Vuelto ' + parseInt(dp_total.getVal()-dp_total_pagar.getVal()) }else{'Ok!!!'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_finalizar",
        F_ALIAS_ => "Finalizar (Cerrar Venta)",
        F_HELP_ => "Finalizar (Cerrar Venta)",
        F_TYPE_ => "proc",
        F_QUERY_ => " 'SELECT ins_det_pago('+dp_fact_nro.getVal()+','+dp_efectivo.getVal()+','+dp_moneda.getStr()+','+dp_cotiz.getVal()+','+dp_moneda_ref.getVal()+','+dp_conv.getStr()+','+dp_nro_orden.getStr()+','+dp_suma.getVal()+', '+dp_conv_tipo.getStr()+', '+dp_cuentas.getStr()+','+ dp_dias_acr.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "(dp_total.getVal()>0||(dp_conv.get()!=''&&(dp_conv_tipo.get()!=''||dp_conv_tipo.get()!='__NO DATA__')))&&operation==INSERT_&&!dp_finalizar.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_insertar",
        F_ALIAS_ => "Inserta",
        F_HELP_ => "Inserta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'Select cierra_venta_credito('+dp_fact_nro.getStr()+','+dp_conv.getStr()+','+dp_nro_orden.getStr()+','+dp_local.getStr()+' ,'+dp_moneda.getStr()+','+dp_efectivo.getVal()+','+dp_cotiz.getVal()+','+dp_vuelto.getVal()+','+dp_conv_tipo.getStr()+','+dp_cuentas.getStr()+','+dp_faltante.getVal()+','+dp_dias_acr.getVal()+','+dp_porc.getVal()+','+cp_cant_cts.getVal()+')'",
        F_QUERY_REF_ => "dp_finalizar.get()&&dp_insertar.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "95",
        C_SHOW_ => "dp_finalizar.get()&&dp_count_det.getVal()<1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goBack2",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "105",
        C_SHOW_ => "dp_insertar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('self.close()',500);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_ci",
        F_ALIAS_ => "CI/RUC",
        F_HELP_ => "CI/RUC",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "115",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['fact_cli_ci']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
