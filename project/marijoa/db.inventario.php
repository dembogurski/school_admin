<?php
$Obj->name = "ubic_ins_laser";
$Obj->alias = "Control de Inventario (Punteo Laser)";
$Obj->help = "Control de Inventario";
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
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Ud. Se encuentra en la Sucursal:",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "check_suc",
        F_ALIAS_ => "Esta Ud. en la sucursal Correcta?",
        F_HELP_ => "Esta Ud. en la sucursal Correcta?",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "blaser",
        F_ALIAS_ => "Punteo",
        F_HELP_ => "Buscador o Lector Laser",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Manual,Laser",
        F_NODB_ => "1",
        F_ORD_ => "17",
        C_SHOW_ => "check_suc.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "check_suc.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "puntear",
        F_ALIAS_ => " ",
        F_HELP_ => "dd",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT punteo_inventario('+codigo.getStr()+',|{'+__user.get()+'}|, |{'+__local.get()+'}|)'",
        F_QUERY_REF_ => "codigo.hasChanged()&&codigo.get()!=''",
        F_LENGTH_ => "70",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "check_suc.get()=='Si'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "subst",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "( ! )",
        F_TYPE_ => "formula",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "65",
        C_VIEW_ => "false",
        F_FORMULA_ => "puntear.get().substring(0,puntear.getStr().indexOf(|{:}|)-2)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "check",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "( ! )",
        F_TYPE_ => "formula",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "check_suc.get()=='Si'",
        F_FORMULA_ => "if(codigo.get()==subst.get() || puntear.get() == 'RE PUNTEADO!!!'){'Ok!!!'}else{'Procesando!!!'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hfocus",
        F_ALIAS_ => "Has Focus",
        F_HELP_ => "Has Focus",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "blaser.get()=='Laser'",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( document.getElementById(|{codigo}|).hasAttribute(|{focused}|) ) { true }else{ false }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hfocus_esp",
        F_ALIAS_ => "Has Focus",
        F_HELP_ => "Has Focus",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "blaser.get()=='Laser'",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( document.getElementById(|{puntear}|).hasAttribute(|{focused}|) ) { true }else{ false }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "select_text",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        C_SHOW_ => "blaser.get()=='Laser' && !hfocus.get() ",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{codigo}|).select() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style2",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " if(puntear.get()=='NO ENCONTRADO!!!' || puntear.get()=='RE PUNTEADO!!!' ){ document.getElementById(|{puntear}|).setAttribute(|{style}|,|{height:40px;color:red;font-size:28px;}|); }else{ document.getElementById(|{puntear}|).setAttribute(|{style}|,|{height:40px;color:green;font-size:28px;}|); }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style3",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{codigo}|).setAttribute(|{style}|,|{height:52px;color:black;font-size:32px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style4",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " if(check.get()=='Procesando!!!'){ document.getElementById(|{check}|).setAttribute(|{style}|,|{height:60px;color:red;font-size:42px;}|); }else{ document.getElementById(|{check}|).setAttribute(|{style}|,|{height:60px;color:green;font-size:42px;}|); }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => " ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "105",
        F_FORMULA_ => "'Area para Generar Reportes'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc_",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Elija el Tipo de Salida",
        F_HELP_ => "Elija el Tipo de Salida",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Inventario,Faltantes,Duplicados,Diff. Suc,Punteados",
        F_NODB_ => "1",
        F_ORD_ => "115",
        F_INLINE_ => "1",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep_inv",
        F_ALIAS_ => "Generar Reporte de Inventario",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.inv_stock_act",
        F_NODB_ => "1",
        F_ORD_ => "116",
        C_SHOW_ => "tipo.get()=='Inventario'",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Generar Reporte Faltantes",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.inventario",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "tipo.get()=='Faltantes'",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep_duplicados",
        F_ALIAS_ => "Generar Reporte Duplicados",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.duplicados",
        F_NODB_ => "1",
        F_ORD_ => "121",
        C_SHOW_ => "tipo.get()=='Duplicados'",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep_diff",
        F_ALIAS_ => "Generar Reporte Diff Suc",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.inv_diff_suc",
        F_NODB_ => "1",
        F_ORD_ => "122",
        C_SHOW_ => "tipo.get()=='Diff. Suc'",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "gen_punt",
        F_ALIAS_ => "Generar de Punteados",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.inv_punteados",
        F_NODB_ => "1",
        F_ORD_ => "122",
        C_SHOW_ => "tipo.get()=='Punteados'",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "gen_punteo",
        F_ALIAS_ => "Verificar Lugar de Punteo",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.inv_check",
        F_NODB_ => "1",
        F_ORD_ => "122",
        F_INLINE_ => "1",
        C_SHOW_ => "cod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod",
        F_ALIAS_ => "Donde se Punteo Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "124",
        C_SHOW_ => "check_suc.get()=='No'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_multiuso",
        F_ALIAS_ => "Reporte Multiuso",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.multiuso",
        F_NODB_ => "1",
        F_ORD_ => "126",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
