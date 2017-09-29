<?php
$Obj->name = "gastos_x_suc";
$Obj->alias = "Registro Gastos x Suc";
$Obj->help = "Gastos en General";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "gastos";
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
        F_NAME_ => "g_msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "2",
        F_FORMULA_ => "'( ! ) ATENCION!!! La inserción directa de un gasto no registra Mov. de Caja.'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha en que se realiza la operación",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_modif",
        F_ALIAS_ => "Modificar x ID",
        F_HELP_ => "Modificar x ID",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_empr",
        F_ALIAS_ => "Empresa a la que Corresponde",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "g_empr.firstSQL",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_dep",
        F_ALIAS_ => "Departamento",
        F_HELP_ => "Departamento",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        F_FORMULA_ => "'Dpto. Finanzas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_ ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "40",
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
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_con",
        F_ALIAS_ => "Nº Concepto",
        F_HELP_ => "Nº Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_conc.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_descri like |{'+busc_conc.get()+'%}| and cjc_cod not like |{%-}| and cjc_tipo = |{S}|'",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_con_n",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select distinct cjc_descri from caja_con where cjc_cod = '+g_con.getStr() ",
        F_QUERY_REF_ => "g_con.hasChanged()",
        F_LOCALFIELD_ => "g_fecha",
        F_LENGTH_ => "60",
        F_ORD_ => "60",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento",
        F_TYPE_ => "text",
        F_LENGTH_ => "100",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_er",
        F_ALIAS_ => "E/R",
        F_HELP_ => "Estado de Resultados",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "4",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_id",
        F_ALIAS_ => "ID Gasto",
        F_HELP_ => "ID Gasto",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "g_modif.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sub_con",
        F_ALIAS_ => "Codigo Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT g_con FROM gastos WHERE id ='+g_id.getVal()",
        F_QUERY_REF_ => "g_id.hasChanged()",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "g_modif.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "concepto_princ",
        F_ALIAS_ => "Padre",
        F_HELP_ => "Concepto",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "111",
        F_INLINE_ => "1",
        C_VIEW_ => "g_modif.get()=='Si'",
        F_FORMULA_ => "sub_con.get().split('-',1)",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "con_nombre",
        F_ALIAS_ => " ",
        F_HELP_ => "Nombre de Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select distinct cjc_descri from caja_con where cjc_cod = '+concepto_princ.getStr()",
        F_QUERY_REF_ => "concepto_princ.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_RELFIELD_ => "cjc_cod",
        F_LOCALFIELD_ => "concepto_princ",
        F_LENGTH_ => "40",
        F_BROW_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "112",
        F_INLINE_ => "1",
        C_VIEW_ => "g_modif.get()=='Si'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sub_monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT g_monto FROM gastos WHERE id ='+g_id.getVal()",
        F_QUERY_REF_ => "g_id.hasChanged()",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "114",
        C_VIEW_ => "g_modif.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sub_conc",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Complemento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT g_con_n FROM gastos WHERE id ='+g_id.getVal()",
        F_QUERY_REF_ => "g_id.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_VIEW_ => "g_modif.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sub_compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT g_compl FROM gastos WHERE id ='+g_id.getVal()",
        F_QUERY_REF_ => "g_id.hasChanged()",
        F_LENGTH_ => "70",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_VIEW_ => "g_modif.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "modif",
        F_ALIAS_ => "Modificar",
        F_HELP_ => "Modificar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'UPDATE gastos SET g_con = '+g_con.getStr()+' , g_con_n = '+g_con_n.getStr()+' , g_compl = '+sub_compl.getStr()+', g_monto = '+sub_monto.getVal()+' WHERE id ='+g_id.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_VIEW_ => "g_modif.get()=='Si'&&sub_compl.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
