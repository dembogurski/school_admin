<?php
$Obj->name = "bcos_ctas_movs";
$Obj->alias = "Movimientos de Cuentas";
$Obj->help = "Movimientos de Cuentas";
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
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
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
        F_NODB_ => "1",
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
        F_SHOWFIELD_ => "cta_num,cta_moneda",
        F_LOCALFIELD_ => "dif",
        F_FILTER_ => "'cta_bco='+bco.getStr()",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mon_cta",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_moneda",
        F_RELFIELD_ => "cta_num",
        F_LOCALFIELD_ => "cta",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_SHOW_ => "cta.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cotiz",
        F_ALIAS_ => "Cotizacion del dia",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+mon_cta.getStr()+');'",
        F_QUERY_REF_ => "(mon_cta.hasChanged()||__cotiz.firstSQL)&&mon_cta.get()!=''",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "32",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "es",
        F_ALIAS_ => "Entrada/Salida",
        F_HELP_ => "Entrada/Salida",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",E,S",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de movimiento",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
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
        F_ORD_ => "50",
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
        F_ORD_ => "51",
        F_INLINE_ => "1",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "concepto",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "concepto_princ.hasChanged()||es.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_cod like |{'+concepto_princ.get()+'-%}|'",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_SHOW_ => "concepto_princ.get()!=''",
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
        F_ORD_ => "65",
        C_VIEW_ => "concepto.notEmpty()",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_er",
        F_ALIAS_ => "E/R",
        F_HELP_ => "E/E",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_er",
        F_RELFIELD_ => "cjc_cod",
        F_LOCALFIELD_ => "concepto",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "66",
        F_INLINE_ => "1",
        C_VIEW_ => "concepto.notEmpty()",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "conf_gasto",
        F_ALIAS_ => "Confirme Realizar Movimiento de Gasto",
        F_HELP_ => "Confirme Realizar Movimiento de Gasto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si,No",
        F_NODB_ => "1",
        F_ORD_ => "68",
        F_INLINE_ => "1",
        C_SHOW_ => "c_gasto.get()=='Si'",
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
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "verif_compl.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctd_doc",
        F_ALIAS_ => "Comprobante",
        F_HELP_ => "Numero del Comprobante",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "82",
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
        F_FILTER_ => "'emp_tipo!=|{Deposito}|'",
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
        F_NAME_ => "monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "18",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "87",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_m_ref",
        F_ALIAS_ => "Monto Ref",
        F_HELP_ => "Monto Ref",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "88",
        C_VIEW_ => "false",
        F_FORMULA_ => "monto.getVal()*__cotiz.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_mov",
        F_ALIAS_ => "Generar Movimiento",
        F_HELP_ => "Generar Movimiento de cuenta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "89",
        C_SHOW_ => "monto.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_ent",
        F_ALIAS_ => "                    Confirmar                    ",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select bcos_ins_asiento('+cta.getStr()+', '+ctd_fecha.getStr()+','+concepto.getStr()+','+compl.getStr()+','+monto.getVal()+', 0 )'",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        C_SHOW_ => "concepto.get()!=''&&es.get()=='E'&&monto.getVal()>0&&(concepto.getVal()<105||concepto.getVal()>106)",
        C_VIEW_ => "empr.get()!=''&&depar.get()!=''&&gen_mov.get()=='Si'&&!aceptar_ent.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_sal",
        F_ALIAS_ => "                    Confirmar                    ",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select bcos_ins_asiento('+cta.getStr()+', '+ctd_fecha.getStr()+','+concepto.getStr()+','+compl.getStr()+', 0,'+monto.getVal()+')'",
        F_BROW_ => "1",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        C_SHOW_ => "concepto.get()!=''&&es.get()=='S'&&monto.getVal()>0&&(concepto.getVal()<105||concepto.getVal()>106)",
        C_VIEW_ => "empr.get()!=''&&depar.get()!=''&&gen_mov.get()=='Si'&&!aceptar_sal.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__gasto",
        F_ALIAS_ => "Registra gasto",
        F_HELP_ => "Registra gasto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select gasto('+empr.getStr()+',|{'+p_user_+'}|,'+monto_m_ref.getVal()+','+depar.getStr()+','+concepto.getStr()+','+compl.getStr()+','+c_er.getStr()+','+ctd_fecha.getStr()+')'",
        F_QUERY_REF_ => "c_gasto.get()=='Si'&&__gasto.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "aceptar_sal.get()&&conf_gasto.get()=='Si'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "corregir_saldo",
        F_ALIAS_ => "Corregir Saldo de Cuenta",
        F_HELP_ => "Corregir Saldo de Cuenta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT bcos_corr_saldos('+cta.getStr()+', '+ctd_fecha.getStr()+')'",
        F_QUERY_REF_ => "(aceptar_ent.get()||aceptar_sal.get())&&corregir_saldo.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "171",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "actualizar_ctd_doc",
        F_ALIAS_ => "Actualiza Doc",
        F_HELP_ => "Actualiza Doc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'UPDATE bcos_ctas_det SET ctd_doc = '+ctd_doc.getStr()+' WHERE ctd_con = '+concepto.getStr()+' AND ctd_cta = '+cta.getStr()+' and ctd_fecha = '+ctd_fecha.getStr()+' AND ctd_con IS NOT NULL'",
        F_QUERY_REF_ => "(aceptar_ent.get()||aceptar_sal.get())&&actualizar_ctd_doc.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "171",
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
        F_ORD_ => "180",
        C_SHOW_ => "aceptar_ent.get()||aceptar_sal.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',2000);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__button",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "formula",
        F_ORD_ => "190",
        C_SHOW_ => "aceptar_ent.get()||aceptar_sal.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableMessageButton('Correcto',2000);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
