<?php
$Obj->name = "tesoreria";
$Obj->alias = "Tesoreria";
$Obj->help = "Tesoreria";
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
        F_QUERY_ => "'select p_cod_tesoreria from adm_param'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Obtiene Nro de caja Abierta de esta Suc",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ __local.getStr() +'  order by id desc limit 1'",
        F_QUERY_REF_ => "__caja_ref.firstSQL",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "__caja_ref.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
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
        F_NAME_ => "moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda a transferir",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod, m_descri",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "caja_exist",
        F_ALIAS_ => "Existencia de Monedas",
        F_HELP_ => "Existencia de Monedas",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'ce_moneda like '+moneda.getStr()+' and ce_empr like '+__local.getStr()",
        F_LINK_ => "db.caja_exist",
        F_SEND_ => "''",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_FORMULA_ => "'( ! )  Area para Cambio de divisas... '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon_de",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda a transferir",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod, m_descri",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "exist",
        F_ALIAS_ => "Monto actual  ",
        F_HELP_ => "Monto Moneda Actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ce_cant from caja_exist where ce_empr = '+__local.getStr()+' and ce_moneda ='+mon_de.getStr()+''",
        F_QUERY_REF_ => "mon_de.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotiz",
        F_ALIAS_ => "Cotizacion",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio_venta('+mon_de.getStr()+');'",
        F_QUERY_REF_ => "mon_de.hasChanged()||cotiz.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "85",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon_ref",
        F_ALIAS_ => "Moneda REF",
        F_HELP_ => "Moneda REF",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "87",
        F_INLINE_ => "1",
        C_SHOW_ => "cotiz.get()!=''",
        F_FORMULA_ => "exist.getVal()*cotiz.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon_a",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda a transferir",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "mon_de.hasChanged()",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod, m_descri",
        F_FILTER_ => "'m_cod <> '+mon_de.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_rec",
        F_ALIAS_ => "Cant. recibida",
        F_HELP_ => "Cantidad recibida",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "105",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotiza",
        F_ALIAS_ => "Cotizacion",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio_venta('+mon_a.getStr()+');'",
        F_QUERY_REF_ => "mon_a.hasChanged()||cotiza.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon_refa",
        F_ALIAS_ => "Moneda REF",
        F_HELP_ => "Moneda REF",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        C_SHOW_ => "cotiza.get()!=''",
        F_FORMULA_ => "cant_rec.getVal()*cotiza.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dif",
        F_ALIAS_ => "Diferencia",
        F_HELP_ => "Diferencia",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "130",
        F_INLINE_ => "1",
        F_FORMULA_ => "if( mon_de.get() == moneda_ref.get()){ 0 }else{ mon_refa.getVal()-mon_ref.getVal() }     ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotiz_calc",
        F_ALIAS_ => "Cotiz. Calculada",
        F_HELP_ => "Cotiz. Calculada",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "135",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( exist.getVal() > cant_rec.getVal() ){ exist.getVal() / cant_rec.getVal()  }else{     cant_rec.getVal() / exist.getVal()   }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "_espacio",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "136",
        C_SHOW_ => "mon_a.get()!=''&&cotiza.getVal()>0&&cant_rec.getVal()>0&&exist.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cambiar",
        F_ALIAS_ => "          Cambiar           ",
        F_HELP_ => "Cambiar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cambio_de_divisas('+__local.getStr()+','+__caja_ref.getVal()+','+mon_de.getStr()+','+exist.getVal()+','+cotiz.getVal()+', '+mon_a.getStr()+','+cant_rec.getVal()+','+cotiza.getVal()+','+dif.getVal()+','+cotiz_calc.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "140",
        F_INLINE_ => "1",
        C_SHOW_ => "mon_a.get()!=''&&cotiza.getVal()>0&&cant_rec.getVal()>0&&exist.getVal()>0",
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
        F_FORMULA_ => "'( ! )  Area para Transacciones Bancarias... '",
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
        F_QUERY_REF_ => "mon_dep.hasChanged()||cotiza.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "175",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mexist",
        F_ALIAS_ => "Monto actual  ",
        F_HELP_ => "Monto Moneda Actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ce_cant from caja_exist where ce_ref = '+__caja_ref.getVal()+' and ce_moneda ='+mon_dep.getStr()+''",
        F_QUERY_REF_ => "mon_dep.hasChanged()",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "180",
        F_INLINE_ => "1",
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
        C_SHOW_ => "nro_dep.get()!=''",
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dep",
        F_ALIAS_ => "          Depositar          ",
        F_HELP_ => "Depositar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT deposito_a_cc('+mon_dep.getStr()+','+cotizdep.getVal()+','+cta.getStr()+','+monto_dep.getVal()+','+nro_dep.getStr()+','+__caja_ref.getVal()+','+__local.getStr()+','+fechadep.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "nro_dep.get()!=''&&monto_dep.getVal()>0&&cta.notEmpty()",
        C_VIEW_ => "monto_dep.getVal()<=mexist.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "215",
        C_SHOW_ => "monto_dep.getVal()>mexist.getVal()",
        F_FORMULA_ => "'( ! ) Monto inexistente en caja!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "movs",
        F_ALIAS_ => "Detalle de Depositos (Ultimos 20 depositos)",
        F_HELP_ => "Detalle de Depositos",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'bcos_ctas_det.id > 0'",
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
        C_SHOW_ => "cambiar.get()||dep.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',200);",
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

?>
