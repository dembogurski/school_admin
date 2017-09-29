<?php
$Obj->name = "caja_ctas_pagar";
$Obj->alias = "Cuentas a Pagar";
$Obj->help = "Cuentas a Pagar";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "caja_ctas_pagar";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_FORMULA_ => "'Filtre Cuotas, Pagares y Cheques acotando las fechas de y a.'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_prov",
        F_ALIAS_ => "Buscar Proveedor",
        F_HELP_ => "Buscar Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "11",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_prov.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_cod,prov_nombre",
        F_FILTER_ => "'prov_nombre like |{'+busc_prov.get()+'%}| order by prov_nombre'",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_nombre",
        F_RELFIELD_ => "prov_cod",
        F_LOCALFIELD_ => "prov",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "17",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha de",
        F_HELP_ => "Fecha de",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_a",
        F_ALIAS_ => "Fecha a",
        F_HELP_ => "Fecha a",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_inv",
        F_ALIAS_ => "Fecha Invetida",
        F_HELP_ => "Fecha Invetida",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "false",
        C_CHANGE_ => "fecha.hasChanged()",
        F_FORMULA_ => "fecha.getYear()+'-'+fecha.getMonth()+'-'+fecha.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_inva",
        F_ALIAS_ => "Fecha Invetida a",
        F_HELP_ => "Fecha Invetida a",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        C_CHANGE_ => "fecha.hasChanged()",
        F_FORMULA_ => "fecha_a.getYear()+'-'+fecha_a.getMonth()+'-'+fecha_a.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,%,Cancelada",
        F_NODB_ => "1",
        F_ORD_ => "51",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cuotas_pagar",
        F_ALIAS_ => "Cuotas a Pagar",
        F_HELP_ => "Cuotas a Pagar",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'ct_fecha_venc between '+fecha_inv.getStr()+' and '+fecha_inva.getStr()+' and ct_cod_prov like '+prov.getStr()+' and ct_estado like  '+ct_estado.getStr()",
        F_LINK_ => "db.cuotas_pagar",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "52",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "devs",
        F_ALIAS_ => "Devoluciones Pendientes",
        F_HELP_ => "Devoluciones Pendientes",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'c_prov like '+prov.getStr()+' and c_estado = |{Pendiente}|'",
        F_LINK_ => "db.mov_compras_dvm",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "53",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_sumar_cuota",
        F_ALIAS_ => "Sumar Cuotas Seleccionadas",
        F_HELP_ => "Sumar Cuotas Seleccionadas",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "54",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_sentinela",
        F_ALIAS_ => "Suma de Cuotas",
        F_HELP_ => "Suma de Cuotas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select 1 + 1'",
        F_QUERY_REF_ => "ct_sumar_cuota.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "55",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_suma",
        F_ALIAS_ => "Suma de Cuotas",
        F_HELP_ => "Suma de Cuotas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select SUM( p.ct_monto - c.c_valor_factl)  FROM cuotas_pagar p, mov_compras c  WHERE c.c_ref = p.ct_ref AND  p.ct_multiple = |{Si}| and ct_estado=|{Pendiente}| and ct_cod_prov = '+prov.getVal()",
        F_QUERY_REF_ => "ct_sumar_cuota.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "56",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_devs",
        F_ALIAS_ => "Suma de Devoluciones",
        F_HELP_ => "Suma de Cuotas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(c_valor_dev) from mov_compras_dev where c_mult = |{Si}| and c_estado=|{Pendiente}| and c_prov = '+prov.getVal()",
        F_QUERY_REF_ => "ct_sumar_cuota.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "56",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_suma_desc",
        F_ALIAS_ => "Descuentos",
        F_HELP_ => "Suma de Descuentos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(descuento) from cuotas_pagar where ct_multiple = |{Si}| and ct_estado=|{Pendiente}| and ct_cod_prov = '+prov.getVal()",
        F_QUERY_REF_ => "ct_sumar_cuota.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "58",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "diff",
        F_ALIAS_ => "Diferencia Cuotas - Devoluciones  - Descuentos",
        F_HELP_ => "Diff",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "58",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "ct_suma.getVal()-ct_devs.getVal()-ct_suma_desc.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "58",
        F_FORMULA_ => "'Seleccione abajo los cheques que ha Emitido o Pagado al proveedor!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_ab",
        F_ALIAS_ => "Cheques Pagados o Emitidos",
        F_HELP_ => "Cheques Pagados o Emitidos",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'(chq_estado=|{Emitido}|  || chq_estado=|{Pagado}| ) and (chq_mult is null or chq_mult = |{}|)  and chq_benef like '+dp_prov.getStr()+' and chq_x_factura = |{No}| '",
        F_LINK_ => "db.bcos_chq_prov2",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_prov",
        F_ALIAS_ => "Cheques al Proveedor (Pagados o Emitidos Marcados con Pago M",
        F_HELP_ => "Cheques Emitidos o Pagados al Proveedor",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'(chq_estado=|{Emitido}|  || chq_estado=|{Pagado}| )and chq_mult = |{Si}| and chq_benef like '+dp_prov.getStr()+' and chq_x_factura = |{No}| '",
        F_LINK_ => "db.bcos_chq_prov2",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "66",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pg_mult",
        F_ALIAS_ => "Filtrar estado Pendiente/Cerrado",
        F_HELP_ => "Filtrar estado Pendiente/Cerrado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cerrado,%",
        F_NODB_ => "1",
        F_ORD_ => "66",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "deps",
        F_ALIAS_ => "Depositos",
        F_HELP_ => "Depositos",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'estado like '+pg_mult.getStr()+' and prov like '+prov.getStr()",
        F_LINK_ => "db.depositos_chang",
        F_SEND_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "67",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pg_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,%,Cancelado",
        F_NODB_ => "1",
        F_ORD_ => "68",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pagares_pagar",
        F_ALIAS_ => "Pagares por Pagar",
        F_HELP_ => "Pagares por Pagar",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'pg_fecha between '+fecha_inv.getStr()+' and '+fecha_inva.getStr()+' and pg_cod_prov like '+prov.getStr() +' and pg_estado like  '+pg_estado.getStr()+' order by pg_fecha asc'",
        F_LINK_ => "db.pagares_propios",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir_chq",
        F_ALIAS_ => "Imprimir Cheques",
        F_HELP_ => "Imprimir Cheques",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.imprimir_cheque",
        F_NODB_ => "1",
        F_ORD_ => "72",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "conf",
        F_ALIAS_ => "Confirme Terminar Transacción",
        F_HELP_ => "Confirme Terminar Transacción",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "75",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "terminar",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Terminar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select terminar_pagos('+prov.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_SHOW_ => "conf.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "facts_not_null",
        F_ALIAS_ => "Set Facturas 0 is Where is Null",
        F_HELP_ => "Set Facturas 0  Where is Null",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'UPDATE mov_compras SET c_valor_factl = 0  WHERE c_valor_factl IS NULL;'",
        F_QUERY_REF_ => "prov.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
