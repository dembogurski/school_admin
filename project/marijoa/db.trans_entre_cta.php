<?php
$Obj->name = "trans_entre_cta";
$Obj->alias = "Transferencias entre Cuentas";
$Obj->help = "Transferencias entre Cuentas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "transf_entre_ctas";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'select transf_bancaria('+cta.getStr()+', '+ctaa.getStr()+','+complemento.getStr()+', '+total.getVal()+', '+monto_trans.getVal()+')'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "moneda_ref",
        F_ALIAS_ => "Moneda ref",
        F_HELP_ => "Moneda ref",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select m_cod from caja_monedas where m_ref = |{Si}|'",
        F_QUERY_REF_ => "moneda_ref.firstSQL",
        F_RELTABLE_ => "caja_monedas",
        F_RELFIELD_ => "m_cod",
        F_LOCALFIELD_ => "bco",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "bcos",
        F_SHOWFIELD_ => "b_cod,b_nombre",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "bco.hasChanged()",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_num,cta_moneda,cta_bco",
        F_LOCALFIELD_ => "dif",
        F_FILTER_ => "'cta_bco='+bco.getStr()",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_saldo",
        F_ALIAS_ => "Saldo",
        F_HELP_ => "Saldo de la cuenta",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_saldo",
        F_RELFIELD_ => "cta_num",
        F_LOCALFIELD_ => "cta",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_moneda",
        F_RELFIELD_ => "cta_num",
        F_LOCALFIELD_ => "cta",
        F_LENGTH_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotiz",
        F_ALIAS_ => "Cotizacion Compra",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+mon.getStr()+');'",
        F_QUERY_REF_ => "mon.hasChanged()||cotiz.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "37",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_trans",
        F_ALIAS_ => "Monto a Transferir",
        F_HELP_ => "Monto a Transferir",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon_ref",
        F_ALIAS_ => "Moneda REF",
        F_HELP_ => "Moneda REF",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        C_SHOW_ => "cotiz.get()!=''",
        C_VIEW_ => "false",
        F_FORMULA_ => "cotiz.getVal()*monto_trans.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctaa",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "bco.hasChanged()||mon.hasChanged()",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_num,cta_moneda",
        F_LOCALFIELD_ => "dif",
        F_FILTER_ => "'cta_bco='+bco.getStr()+' and cta_moneda <> '+mon.getStr()+''",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotiz_venta",
        F_ALIAS_ => "Cotizacion de Venta",
        F_HELP_ => "Cotizacion de Venta",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "total",
        F_ALIAS_ => "Total Tranferencia",
        F_HELP_ => "Total Tranferencia",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        F_FORMULA_ => " if( mon.get() == moneda_ref.get() ){ monto_trans.getVal() / cotiz_venta.getVal()  } else{ cotiz_venta.getVal()*monto_trans.getVal() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dif",
        F_ALIAS_ => "Diferencia",
        F_HELP_ => "Diferencia",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        F_FORMULA_ => " if( mon.get() == moneda_ref.get() ){  0 }else{ total.getVal()-mon_ref.getVal()  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "complemento",
        F_ALIAS_ => "Comprobante",
        F_HELP_ => "Comprobante o Nº de Deposito",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
