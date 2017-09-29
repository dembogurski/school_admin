<?php
$Obj->name = "extracc_caja";
$Obj->alias = "Extraccion de Caja";
$Obj->help = "Extraccion de Caja";
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
        F_NAME_ => "caja_id",
        F_ALIAS_ => "cm_id",
        F_HELP_ => "cm_id",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select _autonum(|{cm_id}|);'",
        F_QUERY_REF_ => "caja_id.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
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
        F_NAME_ => "monto_m_ref",
        F_ALIAS_ => "Monto Ref",
        F_HELP_ => "Monto Ref",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "32",
        C_VIEW_ => "false",
        F_FORMULA_ => "mon_dep.getVal()*__cotiz.getVal()",
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
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "145",
        F_FORMULA_ => "if(__caja_ref.get()=='__NO DATA__'||__caja_ref.get()==''){ 'No existe referencia de caja para esta fecha!!!' }else{ '( ! )  Area para Extracciones... '}",
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
        F_BROW_ => "1",
        F_ORD_ => "150",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_SHOW_ => "aceptar_sal.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',500);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__gasto",
        F_ALIAS_ => "Registra gasto",
        F_HELP_ => "Registra gasto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select gasto('+empr.getStr()+',|{'+p_user_+'}|,'+monto_m_ref.getVal()+','+depar.getStr()+','+concepto.getStr()+','+compl.getStr()+','+c_er.getStr()+',current_date)'",
        F_QUERY_REF_ => "c_gasto.get()=='Si'&&__gasto.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "aceptar_sal.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda a transferir",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_NODB_ => "1",
        F_ORD_ => "185",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cotiz",
        F_ALIAS_ => "Cotizacion",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+moneda.getStr()+');'",
        F_QUERY_REF_ => "moneda.hasChanged()",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "186",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mexist",
        F_ALIAS_ => "Monto existente",
        F_HELP_ => "Monto (Entrada - Salida)",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(m.cm_entrada - m.cm_salida)  from caja_mov m where m.cm_moneda = '+moneda.getStr()+' and m.cm_ref = '+__caja_ref.getVal()+''",
        F_QUERY_REF_ => "moneda.hasChanged()",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "187",
        C_VIEW_ => "__caja_ref.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon_dep",
        F_ALIAS_ => "Monto a Extraer",
        F_HELP_ => "Monto a Extraer",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "190",
        F_INLINE_ => "1",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_conc",
        F_ALIAS_ => "Buscar Concepto",
        F_HELP_ => "Buscar Concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "191",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "concepto_princ",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_conc.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_descri like |{'+busc_conc.get()+'%}| and cjc_cod not like |{%-%}| and cjc_tipo like |{S}|'",
        F_NODB_ => "1",
        F_ORD_ => "192",
        F_INLINE_ => "1",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "concepto",
        F_ALIAS_ => "Sub Concepto",
        F_HELP_ => "Sub Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "concepto_princ.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_cod like |{'+concepto_princ.get()+'-%}| and cjc_tipo like |{S}|'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "193",
        F_INLINE_ => "1",
        C_SHOW_ => "concepto_princ.get()!=''",
        C_VIEW_ => "__caja_ref.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_gasto",
        F_ALIAS_ => "Gasto",
        F_HELP_ => "Gasto",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_gasto",
        F_RELFIELD_ => "cjc_cod",
        F_LOCALFIELD_ => "concepto",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "194",
        F_INLINE_ => "1",
        C_VIEW_ => "concepto.notEmpty()",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_er",
        F_ALIAS_ => "E/R",
        F_HELP_ => "BALANCE",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_er",
        F_RELFIELD_ => "cjc_cod",
        F_LOCALFIELD_ => "concepto",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "195",
        F_INLINE_ => "1",
        C_VIEW_ => "concepto.notEmpty()",
        C_CHANGE_ => "false",
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
        C_SHOW_ => "false",
        F_FORMULA_ => "'( ! ) Ok!!! Operacion realizada con exito!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msgoverflow",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "mon_dep.getVal()>mexist.getVal() ",
        F_FORMULA_ => "if( mon_dep.getVal()>mexist.getVal() ){ 'ATENCION!!! Monto inexistente!!!' } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style4",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "310",
        C_SHOW_ => "mon_dep.getVal()>mexist.getVal()",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{__msgoverflow}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:18px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "340",
        C_SHOW_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa a la que Corresponde",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "350",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "depar",
        F_ALIAS_ => "Departamento",
        F_HELP_ => "Departamento",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "departamentos",
        F_SHOWFIELD_ => "dep_nombre,''",
        F_ORD_ => "360",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_sal",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_ins_asiento('+__caja_ref.getStr()+', '+caja_id.getVal()+','+__local.getStr()+','+fecha.getStr()+','+concepto.getStr()+',|{S}|,'+compl.getStr()+', '+moneda.getStr()+',0 ,'+mon_dep.getVal()+', '+__cotiz.getVal()+')'",
        F_BROW_ => "1",
        F_ORD_ => "380",
        C_SHOW_ => "concepto.get()!=''&&mon_dep.getVal()>0&&(concepto.getVal()<105||concepto.getVal()>106)",
        C_VIEW_ => "empr.get()!=''&&depar.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
