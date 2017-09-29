<?php
$Obj->name = "depositos_cc";
$Obj->alias = "Depositos en Cuenta Corriente";
$Obj->help = "Depositos en Cuenta Corriente";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
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
        F_BROW_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  local from p_users where name = |{'+p_user_+'}| '",
        F_QUERY_REF_ => "__local.firstSQL",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        F_ORD_ => "32",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "max_id",
        F_ALIAS_ => "Max id Movimiento",
        F_HELP_ => "Max id Movimiento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select id from bcos_ctas_det order by id desc limit 1'",
        F_QUERY_REF_ => "max_id.firstSQL",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Caja de la Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "36",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Nro caja",
        F_HELP_ => "Obtiene Nro de caja de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ __local.getStr() +' and cj_fecha = '+fecha.getStr()+' order by id desc limit 1'",
        F_QUERY_REF_ => "fecha.hasChanged()&&fecha.get()!=''",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "37",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg_",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "145",
        F_FORMULA_ => "if(__caja_ref.get()=='__NO DATA__'||__caja_ref.get()==''){ 'No existe referencia de caja para esta fecha!!!' }else{ '( ! )  Area para Transacciones Bancarias... '}",
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
        F_NODB_ => "1",
        F_ORD_ => "150",
        C_VIEW_ => "__caja_ref.getVal()>0",
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
        F_SHOWFIELD_ => "cta_num,cta_moneda",
        F_LOCALFIELD_ => "dif",
        F_FILTER_ => "'cta_bco='+bco.getStr()",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "160",
        F_INLINE_ => "1",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon_dep",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_moneda",
        F_RELFIELD_ => "cta_num",
        F_LOCALFIELD_ => "cta",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "170",
        F_INLINE_ => "1",
        C_VIEW_ => "__caja_ref.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotizdep",
        F_ALIAS_ => "Cotizacion",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio_venta('+mon_dep.getStr()+');'",
        F_QUERY_REF_ => "mon_dep.hasChanged()",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "175",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mexist",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto (Entrada - Salida)",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(m.cm_entrada - m.cm_salida)  from caja_mov m where m.cm_moneda = '+mon_dep.getStr()+' and m.cm_ref = '+__caja_ref.getVal()+''",
        F_QUERY_REF_ => "mon_dep.hasChanged()",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "180",
        F_INLINE_ => "1",
        C_VIEW_ => "__caja_ref.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_dep",
        F_ALIAS_ => "Monto a Depositar",
        F_HELP_ => "Monto a Depositar",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "190",
        C_VIEW_ => "__caja_ref.getVal()>0",
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
        F_ORD_ => "200",
        F_INLINE_ => "1",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fechadep",
        F_ALIAS_ => "Fecha de Deposito",
        F_HELP_ => "Fecha de Deposito",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "204",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__sentinela",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "205",
        F_INLINE_ => "1",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dep",
        F_ALIAS_ => "          Depositar          ",
        F_HELP_ => "Depositar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT depositar('+mon_dep.getStr()+','+cotizdep.getVal()+','+cta.getStr()+','+monto_dep.getVal()+','+nro_dep.getStr()+','+__caja_ref.getVal()+','+__local.getStr()+','+fechadep.getStr()+','+fecha.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "nro_dep.get()!=''&&monto_dep.getVal()>0&&cta.notEmpty()",
        C_VIEW_ => "monto_dep.getVal()<=mexist.getVal()&&!dep.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "46",
        F_NODB_ => "1",
        F_ORD_ => "215",
        C_SHOW_ => "dep.get()",
        F_FORMULA_ => "'( ! ) Ok!!! Operacion realizada con exito!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "movs",
        F_ALIAS_ => "Detalle de Depositos de la Fecha",
        F_HELP_ => "Detalle de Depositos",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'ctd_fecha = '+fechadep.getStr()+' and ctd_compl = concat(|{Deposito en C.C. }|,'+__caja_ref.getStr()+')'",
        F_LINK_ => "db.bcos_ctas_det2",
        F_SEND_ => "cta.get()",
        F_NODB_ => "1",
        F_ORD_ => "220",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "230",
        C_SHOW_ => "dep.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',1500);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__del_tmp_caja",
        F_ALIAS_ => " Borra Cache de caja",
        F_HELP_ => " Borra Cache de caja",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'delete from tmp_caja'",
        F_QUERY_REF_ => "__del_tmp_caja.firstSQL||dep.get()",
        F_NODB_ => "1",
        F_ORD_ => "240",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msgoverflow",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "monto_dep.getVal()>mexist.getVal() ",
        F_FORMULA_ => "if( monto_dep.getVal()>mexist.getVal() ){ 'ATENCION!!! Monto inexistente!!!' } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style4",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "310",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{__msg}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:18px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
