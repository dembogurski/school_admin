<?php
$Obj->name = "cobro_mult_cuot";
$Obj->alias = "Cobro de Multiples cuotas";
$Obj->help = "Cobro de Multiples cuotas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cobro_mult_cuot";
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
        F_NAME_ => "nro_cob",
        F_ALIAS_ => "Nº de Cobro",
        F_HELP_ => "Nº de Cobro",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_ORD_ => "2",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "3",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        F_FORMULA_ => "'( ! ) Para realizar tranzaciones aqui DEBE CARGAR EL/LOS CHEQUE/S PREVIAMENTE!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_fact",
        F_ALIAS_ => "Nº Factura",
        F_HELP_ => "Nº Factura",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_cuota",
        F_ALIAS_ => "Nº Cuota",
        F_HELP_ => "Nº Cuota",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_cuota",
        F_ALIAS_ => "Monto Faltante de la Cuota",
        F_HELP_ => "Monto de Cuota",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ((ct_total - ret_iva) - ct_entrega)  from cuotas where ct_ref = '+nro_fact.getVal()+' and ct_nro = '+nro_cuota.getVal()",
        F_QUERY_REF_ => "nro_fact.hasChanged()||nro_cuota.hasChanged()",
        F_RELTABLE_ => "cuotas",
        F_RELFIELD_ => "nro_cta",
        F_LOCALFIELD_ => "nro_fact",
        F_BROW_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cob_tarj",
        F_ALIAS_ => "Cobro con Tarjeta",
        F_HELP_ => "Cobro con Tarjeta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si",
        F_ORD_ => "35",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nros_cheques",
        F_ALIAS_ => "Nº Cheques",
        F_HELP_ => "Nº Cheques",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "nro_cob.get()!=''&&nros_cheques.firstSQL",
        F_RELTABLE_ => "cheq_terceros",
        F_SHOWFIELD_ => "chq_num,concat(chq_valor,|{-}|,chq_moneda)",
        F_FILTER_ => "'chq_ref = '+nro_cob.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "nro_cob.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_chq",
        F_ALIAS_ => "Monto del/los Cheques",
        F_HELP_ => "Monto del/los Cheques",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(chq_moneda_ref) from cheq_terceros where chq_ref = '+nro_cob.getStr()+' limit 1'",
        F_QUERY_REF_ => "monto_chq.firstSQL",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suma_cheques",
        F_ALIAS_ => "Monto Total en Cheques",
        F_HELP_ => "Monto Total en Cheques",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(chq_moneda_ref) from cheq_terceros where chq_ref = '+nro_cob.getStr()",
        F_QUERY_REF_ => "suma_cheques.firstSQL&&nro_cob.get()!=''",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "deposits",
        F_ALIAS_ => "Depositos",
        F_HELP_ => "Depositos",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "nro_fact.hasChanged()",
        F_RELTABLE_ => "bcos_ctas_det",
        F_SHOWFIELD_ => "ctd_cta,ctd_entrada",
        F_FILTER_ => "'ctd_nro_cobro='+nro_cob.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suma_deps",
        F_ALIAS_ => "Suma de Depositos",
        F_HELP_ => "Suma de Depositos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(ctd_entrada) from bcos_ctas_det where ctd_nro_cobro ='+nro_cob.getStr()",
        F_QUERY_REF_ => "suma_deps.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "67",
        F_INLINE_ => "1",
        C_SHOW_ => "nro_cob.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suma_cuotas",
        F_ALIAS_ => "Monto Total en Cuotas",
        F_HELP_ => "Monto Total de Cuotas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(monto_cuota) from cobro_mult_cuot where nro_cob = '+nro_cob.getStr()",
        F_QUERY_REF_ => "suma_cuotas.firstSQL&&nro_cob.get()!=''",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "total_act",
        F_ALIAS_ => "Total Cuotas + actual",
        F_HELP_ => "Total Cuotas + actual",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_FORMULA_ => "monto_cuota.getVal()+suma_cuotas.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo",
        F_ALIAS_ => "Saldo",
        F_HELP_ => "Saldo de Cuenta",
        F_TYPE_ => "formula",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "85",
        F_INLINE_ => "1",
        C_CHANGE_ => "suma_cuotas.hasChanged()||suma_cheques.hasChanged()||suma_deps.hasChanged()",
        F_FORMULA_ => " (suma_cheques.getVal()+suma_deps.getVal()) - suma_cuotas.getVal()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bloquear",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(total_act.getVal() > (suma_cheques.getVal() + suma_deps.getVal()) ){ disableAcceptButton() }else{ enableAcceptButton()}  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bloquear_2",
        F_ALIAS_ => " ",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "100",
        F_FORMULA_ => "if(total_act.getVal() > (suma_cheques.getVal() + suma_deps.getVal()) ){ 'Monto de Cuotas Supera el Monto de Cheques!!!' }else{'Ok...'}  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "liberar",
        F_ALIAS_ => "Liberar",
        F_HELP_ => "Liberar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( cob_tarj.get()=='Si' ){ enableAcceptButton() } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
