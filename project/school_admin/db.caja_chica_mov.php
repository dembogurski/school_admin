<?php
$Obj->name = "caja_chica_mov";
$Obj->alias = "Movimientos de Caja Chica";
$Obj->help = "Movimientos de Caja Chica";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "caja_chica_mov";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'select act_saldo_caja_chica('+cj_ref_chi.getVal()+')'";
$Obj->p_change = "'select act_saldo_caja_chica('+cj_ref_chi.getVal()+')'";
$Obj->p_delete = "'select act_saldo_caja_chica('+cj_ref_chi.getVal()+')'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "cj_ref_chi",
        F_ALIAS_ => "Nº Caja",
        F_HELP_ => "Numero de Caja",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC:",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Movimiento",
        F_HELP_ => "Elija el Tipo de Movimiento",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['cj_tipo']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));



$Obj->Add(
    array(
        F_NAME_ => "__date",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha en que se realiza la operación",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "16",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Codigo del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_ ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "es",
        F_ALIAS_ => "Entrada/Salida",
        F_HELP_ => "Entrada/Salida",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "S,E",
        F_LENGTH_ => "2",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "35",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Tipo de Moneda ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_BROW_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cotiz",
        F_ALIAS_ => "Cotizacion",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+__moneda.getStr()+');'",
        F_QUERY_REF_ => "__moneda.hasChanged()||__cotiz.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
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
        F_NAME_ => "monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
		C_CHANGE_ => "operation==INSERT_",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_m_ref",
        F_ALIAS_ => "Monto Ref",
        F_HELP_ => "Monto Ref",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
		 
        F_FORMULA_ => "monto.getVal()*__cotiz.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_conc",
        F_ALIAS_ => "Buscar Concepto",
        F_HELP_ => "Buscar Concepto",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "concepto",
        F_ALIAS_ => "Sub Concepto",
        F_HELP_ => "Sub Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_conc.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_tipo='+es.getStr()+' and cjc_descri like |{'+busc_conc.get()+'%}| and cjc_cod like |{%-%}|'",
        F_REQUIRED_ => "1",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        C_SHOW_ => "es.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "concepto_princ",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_ORD_ => "111",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "concepto.get().split('-',1)",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "con_nombre",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Nombre de Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select distinct cjc_descri from caja_con where cjc_cod = '+concepto_princ.getStr()",
        F_QUERY_REF_ => "concepto_princ.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_RELFIELD_ => "cjc_cod",
        F_LOCALFIELD_ => "concepto_princ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "112",
        F_INLINE_ => "1",
        C_VIEW_ => "operation==CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "subc_nombre",
        F_ALIAS_ => "Nombre de Concepto",
        F_HELP_ => "Nombre de Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select distinct cjc_descri from caja_con where cjc_cod = '+concepto.getStr()",
        F_QUERY_REF_ => "concepto.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_RELFIELD_ => "cjc_cod",
        F_LOCALFIELD_ => "concepto",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "130",
        C_VIEW_ => "operation==CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "compl",
        F_ALIAS_ => "Obs. (Facturas Documentos)",
        F_HELP_ => "Complemento",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "200",
        F_ORD_ => "140",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_iva",
        F_ALIAS_ => "Tipo Factura",
        F_HELP_ => "Tipo Iva",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "----,Exenta,10%,5%",
        F_LENGTH_ => "10",
        F_REQUIRED_ => "1",
        F_ORD_ => "141",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Empresa a la que Corresponde",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "145",
        C_VIEW_ => "false",
        F_FORMULA_ => "__local.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "depar",
        F_ALIAS_ => "Departamento",
        F_HELP_ => "Departamento",
        F_TYPE_ => "formula",
        F_ORD_ => "146",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "'Dpto. Finanzas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "entrada_ref",
        F_ALIAS_ => "Entrada Ref",
        F_HELP_ => "Entrada En mondeda de Referencia",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "150",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(es.get()=='E'){monto.getVal()*__cotiz.getVal()}else{0}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "salida_ref",
        F_ALIAS_ => "Salida Ref",
        F_HELP_ => "Salida En mondeda de Referencia",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "160",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(es.get()=='S'){monto.getVal()*__cotiz.getVal()}else{0}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_ent",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select 1 + 6'",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "390",
        C_SHOW_ => "concepto.get()!=''&&es.get()=='E'&&monto.getVal()>0",
        C_VIEW_ => "empr.get()!=''&&depar.get()!=''&&operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_sal",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select  1 + 5'",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "400",
        C_SHOW_ => "concepto.get()!=''&&es.get()=='S'&&monto.getVal()>0",
        C_VIEW_ => "empr.get()!=''&&depar.get()!=''&&operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__insertar",
        F_ALIAS_ => "Insertar",
        F_HELP_ => "Insertar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "470",
        C_SHOW_ => "aceptar_sal.get()||aceptar_ent.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('forceInsert()',800);",
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
        F_ORD_ => "480",
        C_SHOW_ => "aceptar_sal.get()&&operation==INSERT_",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "600",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{tipo}|).setAttribute(|{style}|,|{height:30px;color:blue;font-size:18px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
