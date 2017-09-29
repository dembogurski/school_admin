<?php
$Obj->name = "cambio_div";
$Obj->alias = "Cambio de Divisas";
$Obj->help = "Cambio de Divisas";
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
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_ref",
        F_ALIAS_ => "Caja de la Fecha",
        F_HELP_ => "Fecha de Caja",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Obtiene Nro de caja Abierta de esta Suc",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ __local.getStr() +'  and cj_fecha = '+fecha_ref.getStr()+' order by id desc limit 1'",
        F_QUERY_REF_ => "fecha_ref.hasChanged()",
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
        F_ALIAS_ => "Monto en caja de la Fecha",
        F_HELP_ => "Monto Moneda Actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(m.cm_entrada - m.cm_salida)  from caja_mov m where m.cm_moneda = '+mon_de.getStr()+' and m.cm_ref = '+__caja_ref.getVal()",
        F_QUERY_REF_ => "mon_de.hasChanged()&&__caja_ref.getVal()>0",
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
        F_QUERY_REF_ => "(mon_de.hasChanged()||cotiz.firstSQL)&&mon_de.get()!=''",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
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
        F_LENGTH_ => "10",
        F_DEC_ => "2",
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
        F_FORMULA_ => "if( mon_de.get() == moneda_ref.get()){ 0 }else{ mon_refa.getVal()-mon_ref.getVal() } ",
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
        F_NAME_ => "__del_tmp_caja",
        F_ALIAS_ => " Borra Cache de caja",
        F_HELP_ => " Borra Cache de caja",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'delete from tmp_caja'",
        F_QUERY_REF_ => "__del_tmp_caja.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "240",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "250",
        F_FORMULA_ => "'( ! ) Area para ajustes de monedas!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon_aj",
        F_ALIAS_ => "Moneda a ajustar",
        F_HELP_ => "Moneda ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_NODB_ => "1",
        F_ORD_ => "260",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "exist2",
        F_ALIAS_ => "Monto en Fecha ",
        F_HELP_ => "Monto Moneda Actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(m.cm_entrada - m.cm_salida)  from caja_mov m where m.cm_moneda = '+mon_aj.getStr()+' and m.cm_ref = '+__caja_ref.getVal()",
        F_QUERY_REF_ => "mon_aj.hasChanged()&&__caja_ref.getVal()>0",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "270",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ajuste",
        F_ALIAS_ => "Ajuste",
        F_HELP_ => "Ajuste",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "280",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cot",
        F_ALIAS_ => "Cotizacion",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio_venta('+mon_aj.getStr()+');'",
        F_QUERY_REF_ => "(mon_aj.hasChanged()||cot.firstSQL)&&mon_aj.get()!=''",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "285",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_SHOW_ => "mon_aj.get()!='G$'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "signo",
        F_ALIAS_ => "+/-",
        F_HELP_ => "+/-",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "+,-",
        F_NODB_ => "1",
        F_ORD_ => "290",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "last",
        F_ALIAS_ => "Final",
        F_HELP_ => "Final",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "295",
        F_INLINE_ => "1",
        F_FORMULA_ => "if(signo.get()=='+'){exist2.getVal() + ajuste.getVal() }else{ exist2.getVal() - ajuste.getVal()  } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chk",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        F_FORMULA_ => "if((mon_aj.get()=='U$') && (ajuste.getVal() > 1)  ){ 'Error!' }else{'Ok'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_inv",
        F_ALIAS_ => "Fecha Invetida",
        F_HELP_ => "Fecha Invetida",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "305",
        C_VIEW_ => "false",
        C_CHANGE_ => "fecha_ref.hasChanged()",
        F_FORMULA_ => "fecha_ref.getYear()+'-'+fecha_ref.getMonth()+'-'+fecha_ref.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "make_mov",
        F_ALIAS_ => "Ajustar (+)",
        F_HELP_ => "Ajustar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT cambio_divisa('+__caja_ref.getVal()+','+__local.getStr()+',|{'+fecha_inv.get()+'}|,|{33-1}|,|{Ajuste (+) por cambio de divisas}|,'+mon_aj.getStr()+','+ajuste.getVal()+','+cot.getVal()+','+signo.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "310",
        C_SHOW_ => "signo.get()=='+'&&ajuste.getVal()>0&&mon_aj.get()!='G$'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "make_mov2",
        F_ALIAS_ => "Ajustar ( - )",
        F_HELP_ => "Ajustar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT cambio_divisa('+__caja_ref.getVal()+','+__local.getStr()+',|{'+fecha_inv.get()+'}|,|{33-2}|,|{Ajuste (-) por cambio de divisas}|,'+mon_aj.getStr()+','+ajuste.getVal()+', '+cot.getVal()+','+signo.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "310",
        C_SHOW_ => "signo.get()=='-'&&ajuste.getVal()>0&&mon_aj.get()!='G$'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "make_movGS",
        F_ALIAS_ => "Ajustar (+)",
        F_HELP_ => "Ajustar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT cambio_divisa('+__caja_ref.getVal()+','+__local.getStr()+',|{'+fecha_inv.get()+'}|,|{33-1}|, |{Ajuste (+) por cambio de divisas}|,'+mon_aj.getStr()+','+ajuste.getVal()+',1,'+signo.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "310",
        C_SHOW_ => "signo.get()=='+'&&ajuste.getVal()>0&&mon_aj.get()=='G$'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "make_mov2GS",
        F_ALIAS_ => "Ajustar ( - )",
        F_HELP_ => "Ajustar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT cambio_divisa('+__caja_ref.getVal()+','+__local.getStr()+',|{'+fecha_inv.get()+'}|,|{33-2}|,|{Ajuste (-) por cambio de divisas}|,'+mon_aj.getStr()+','+ajuste.getVal()+', 1,'+signo.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "310",
        C_SHOW_ => "signo.get()=='-'&&ajuste.getVal()>0&&mon_aj.get()=='G$'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "320",
        C_SHOW_ => "make_mov.get()||make_mov2.get()||make_movGS.get()||make_mov2GS.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',800)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg3",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "320",
        C_SHOW_ => "make_mov.get()||make_mov2.get()",
        F_FORMULA_ => "'Ajuste realizado favor espere a que se recargue la pagina!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
