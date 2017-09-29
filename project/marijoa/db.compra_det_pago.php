<?php
$Obj->name = "compra_det_pago";
$Obj->alias = "Detalle Financiero de compra";
$Obj->help = "Detalle Financiero de compra";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "compra_det_pago";
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
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['c_empr']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_count_det",
        F_ALIAS_ => "Verifica",
        F_HELP_ => "Verifica la cantidad de detalles de pagos de esta factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(id) from compra_det_pago where dp_fact_nro = '+dp_fact_nro.getVal()",
        F_QUERY_REF_ => "dp_count_det.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['c_n_prov']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_cod_prov",
        F_ALIAS_ => "Código de Proveedor",
        F_HELP_ => "Código de Proveedor",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "sup['c_prov']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "17",
        C_SHOW_ => "dp_count_det.getVal()>0",
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
        F_LENGTH_ => "16",
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
        F_ORD_ => "22",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
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
        F_NAME_ => "comp_asoc",
        F_ALIAS_ => "Comprobante Asociado",
        F_HELP_ => "Comprobante Asociado/Nro de Deposito",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "24",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "deps",
        F_ALIAS_ => "Depositos",
        F_HELP_ => "Depositos",
        F_TYPE_ => "select_list",
        F_LINK_ => "db.bcos_ctas_det",
        F_SEND_ => "1",
        F_RELTABLE_ => "bcos_ctas_det,compra_det_pago",
        F_SHOWFIELD_ => "distinct ctd_doc, concat(ctd_compl,|{    Monto:}|, ctd_salida, |{  Fecha:}|, DATE_FORMAT(ctd_fecha,|{%d-%m-%Y}|))",
        F_FILTER_ => "'ctd_con like |{114-3}| and not  EXISTS( select  deps from  compra_det_pago where deps = ctd_doc  ) '",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_dep",
        F_ALIAS_ => "Monto Deposito",
        F_HELP_ => "Monto a Depositar",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ctd_salida from bcos_ctas_det d where d.ctd_con = |{114-3}| and d.ctd_doc = '+deps.getStr()",
        F_QUERY_REF_ => "deps.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_cuotas",
        F_ALIAS_ => "Cuotas",
        F_HELP_ => "Cuotas",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'ct_ref = '+dp_fact_nro.getVal();",
        F_LINK_ => "db.cuotas_pagar",
        F_SEND_ => "dp_fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cheq_abiertos",
        F_ALIAS_ => "Cheques Abiertos",
        F_HELP_ => "Cheques Disponibles para uso",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'chq_estado =|{Abierto}|'",
        F_LINK_ => "db.bcos_chq_prov",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "35",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cheq_propios",
        F_ALIAS_ => "Cheques al Proveedor",
        F_HELP_ => "Cheques Emitidos para pago de esta factura",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'chq_ref='+dp_fact_nro.getVal()",
        F_LINK_ => "db.bcos_chq_prov",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_pagares",
        F_ALIAS_ => "Pagares Propios",
        F_HELP_ => "Pagares Propios",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'pg_ref = '+dp_fact_nro.getVal()",
        F_LINK_ => "db.pagares_propios",
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
        F_QUERY_ => "'select suma_cuo_pg_pagar('+dp_fact_nro.getVal()+');'",
        F_QUERY_REF_ => "dp_sum.get()=='Si'&&dp_suma.firstSQL||dp_sum.hasChanged()",
        F_ORD_ => "85",
        C_SHOW_ => "dp_sum.get()=='Si'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_total_pagar",
        F_ALIAS_ => "Total a Pagar",
        F_HELP_ => "Total a Pagar",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(p_c_total) from mnt_prod where p_ref = '+dp_fact_nro.getVal()",
        F_QUERY_REF_ => "dp_total_pagar.firstSQL",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "86",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_total",
        F_ALIAS_ => "Suma total",
        F_HELP_ => "Suma total",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT SUM('+dp_moneda_ref.getVal()+' + '+dp_suma.getVal()+' + '+monto_dep.getVal()+')'      ",
        F_QUERY_REF_ => "dp_moneda_ref.hasChanged()||dp_suma.hasChanged()||dp_total.firstSQL",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "87",
        C_CHANGE_ => "dp_moneda_ref.hasChanged()||dp_moneda_ref.hasChanged()",
        F_FORMULA_ => " ",
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
        F_ORD_ => "88",
        F_INLINE_ => "1",
        C_CHANGE_ => "dp_total.hasChanged()",
        F_FORMULA_ => "if(dp_total_pagar.getVal()>dp_total.getVal()){ 'Faltante  '+ parseInt(dp_total_pagar.getVal()-dp_total.getVal()) }else if(dp_total_pagar.getVal()<dp_total.getVal()){ 'Sobrante ' + parseInt(dp_total.getVal()-dp_total_pagar.getVal()) }else{'Ok!!!'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_finalizar",
        F_ALIAS_ => "Finalizar (Cerrar Compra)",
        F_HELP_ => "Finalizar (Cerrar Compra)",
        F_TYPE_ => "proc",
        F_OPTIONS_ => " ",
        F_QUERY_ => "'Select cerrar_compra_cred('+dp_fact_nro.getStr()+', '+dp_efectivo.getVal()+','+dp_moneda.getStr()+','+dp_cotiz.getVal()+', '+dp_local.getStr()+', |{'+sup['c_caja']+'}|'+','+comp_asoc.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "dp_total.getVal()>0&&dp_count_det.getVal()<1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableChange",
        F_ALIAS_ => "Inhabilita boton de Modificar",
        F_HELP_ => "Inhabilita boton de Modificar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_ORD_ => "145",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_actualiz_ent",
        F_ALIAS_ => "Actualiza Monto abonado",
        F_HELP_ => "Actualiza Monto abonado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update mov_compras set monto_abonado = '+dp_total.getVal()+' where c_ref = '+dp_fact_nro.getVal()+''",
        F_QUERY_REF_ => "dp_total.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_inserta",
        F_ALIAS_ => "Inserta",
        F_HELP_ => "Inserta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ins_com_det_fin('+dp_fact_nro.getStr()+','+dp_efectivo.getVal()+','+dp_moneda.getStr()+','+dp_cotiz.getVal()+','+dp_moneda_ref.getVal()+','+dp_suma.getVal()+','+dp_prov.getStr()+','+comp_asoc.getStr()+','+deps.getStr()+','+monto_dep.getVal()+')'",
        F_QUERY_REF_ => "dp_finalizar.get()&&!dp_inserta.get()",
        F_NODB_ => "1",
        F_ORD_ => "175",
        C_SHOW_ => "dp_finalizar.get()&&dp_count_det.getVal()<1&&!dp_inserta.get()",
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
        F_ORD_ => "185",
        C_SHOW_ => "dp_finalizar.get()&&dp_inserta.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',1000);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
