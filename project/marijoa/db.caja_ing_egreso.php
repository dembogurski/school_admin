<?php
$Obj->name = "caja_ing_egreso";
$Obj->alias = "Ingresos y Egresos a Caja";
$Obj->help = "Ingresos y Egresos a Caja";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_NODB_ => "1",
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
        F_ORD_ => "6",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aut_local",
        F_ALIAS_ => "( ! ) Ud. Realizar� operaciones en caja de SUCURSAL:",
        F_HELP_ => "Sucursal en la que se encuentra loguedo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "aut_local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_ver_caja",
        F_ALIAS_ => "Verifica si caja esta abierta",
        F_HELP_ => "Verifica si caja esta abierta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ aut_local.getStr() +' AND cj_estado=|{Abierto}| order by id desc limit 1'",
        F_QUERY_REF_ => "aut_local.get()!=''",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_SHOW_ => "aut_local.get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "fact_ver_caja.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Tipo de Moneda ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_descri",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "22",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cotiz",
        F_ALIAS_ => "Cotizacion del dia",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio_venta('+__moneda.getStr()+');'",
        F_QUERY_REF_ => "__moneda.hasChanged()||__cotiz.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "30",
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
        F_FORMULA_ => "monto.getVal()*__cotiz.getVal()",
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
        F_ORD_ => "45",
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
        F_FILTER_ => "'cjc_descri like |{'+busc_conc.get()+'%}| and cjc_cod not like |{%-%}|'",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
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
        F_FILTER_ => "'cjc_cod like |{'+concepto_princ.get()+'-%}|'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_SHOW_ => "concepto_princ.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "es",
        F_ALIAS_ => "Entrada/Salida",
        F_HELP_ => "Entrada/Salida",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cjc_tipo from caja_con where cjc_cod = '+concepto.getStr()+' limit 1'",
        F_QUERY_REF_ => "concepto.hasChanged()",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "52",
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
        F_ORD_ => "55",
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
        F_ORD_ => "56",
        F_INLINE_ => "1",
        C_VIEW_ => "concepto.notEmpty()",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "verif_compl",
        F_ALIAS_ => "Verifica si tiene complemento",
        F_HELP_ => "Verifica si tiene complemento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cjc_compl from caja_con where cjc_cod = '+concepto.getStr()+''",
        F_QUERY_REF_ => "concepto.hasChanged()",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
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
        F_ORD_ => "80",
        C_SHOW_ => "verif_compl.get()=='Si'",
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
        F_NODB_ => "1",
        F_ORD_ => "85",
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
        F_ORD_ => "86",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_ent",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_ins_asiento('+fact_ver_caja.getStr()+', '+caja_id.getVal()+','+aut_local.getStr()+', current_date,'+concepto.getStr()+','+es.getStr()+','+compl.getStr()+', '+__moneda.getStr()+','+monto.getVal()+' ,0, '+__cotiz.getVal()+')'",
        F_BROW_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "concepto.get()!=''&&es.get()=='E'&&monto.getVal()>0&&(concepto.getVal()<105||concepto.getVal()>106)",
        C_VIEW_ => "empr.get()!=''&&depar.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_sal",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_ins_asiento('+fact_ver_caja.getStr()+', '+caja_id.getVal()+','+aut_local.getStr()+', current_date,'+concepto.getStr()+','+es.getStr()+','+compl.getStr()+', '+__moneda.getStr()+',0 ,'+monto.getVal()+', '+__cotiz.getVal()+')'",
        F_BROW_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "concepto.get()!=''&&es.get()=='S'&&monto.getVal()>0&&(concepto.getVal()<105||concepto.getVal()>106)",
        C_VIEW_ => "empr.get()!=''&&depar.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_pg",
        F_ALIAS_ => "Generar Pagar�s",
        F_HELP_ => "Generar Pagar�s",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'pg_ref = '+fact_ver_caja.getStr()",
        F_LINK_ => "db.pagares_ins_cj",
        F_SEND_ => "fact_ver_caja.get()",
        F_NODB_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "corr_saldo_ent",
        F_ALIAS_ => "Corregir Saldo Caja",
        F_HELP_ => "Aceptar (Entrada)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_corr_saldo('+fact_ver_caja.getStr()+', '+caja_id.getVal()+','+aut_local.getStr()+', current_date,'+concepto.getStr()+','+es.getStr()+','+compl.getStr()+', '+__moneda.getStr()+','+monto.getVal()+' ,0, '+__cotiz.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_SHOW_ => "concepto.get()!=''&&es.get()=='E'&&monto.getVal()>0&&concepto.getVal()==106",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "corr_saldo_sal",
        F_ALIAS_ => "Corregir Saldo Caja ",
        F_HELP_ => "Aceptar (Salida)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_corr_saldo('+fact_ver_caja.getStr()+', '+caja_id.getVal()+','+aut_local.getStr()+', current_date,'+concepto.getStr()+','+es.getStr()+','+compl.getStr()+', '+__moneda.getStr()+',0 ,'+monto.getVal()+', '+__cotiz.getVal()+')'",
        F_BROW_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "concepto.get()!=''&&es.get()=='S'&&monto.getVal()>0&&concepto.getVal()==105",
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
        F_QUERY_REF_ => "__del_tmp_caja.firstSQL||corr_saldo_ent.get()||corr_saldo_sal.get()",
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
        C_SHOW_ => "corr_saldo_ent.get()||corr_saldo_sal.get()||aceptar_sal.get()||aceptar_ent.get()",
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

?>
