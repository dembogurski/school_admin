<?php
$Obj->name = "caja_chi_control";
$Obj->alias = "Caja Chica (Control x Sucursal)";
$Obj->help = "Caja Chica (Apertura y Cierre)";
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
        F_ORD_ => "4",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "C�digo del usuario (Sabemos lo que estas haciendo!!!)",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "6",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC:",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado de la Caja",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,Cerrada,%",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_abierta",
        F_ALIAS_ => "Cant. Cajas Abiertas x Suc",
        F_HELP_ => "Cant. Cajas Abiertas x Suc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT COUNT(id) FROM caja_chica WHERE cj_estado = |{Abierta}| AND cj_empr = '+__local.getStr()",
        F_QUERY_REF_ => "cj_abierta.firstSQL&&__local.notEmpty()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "registros_cj_ch",
        F_ALIAS_ => "Registros de Caja Chica",
        F_HELP_ => "Registros de Caja Chica",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cj_estado like '+cj_estado.getStr()+' and cj_empr = '+__local.getStr()",
        F_LINK_ => "db.caja_chica",
        F_SEND_ => "__local.get()",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "cj_abierta.getVal()<1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "registros_modif",
        F_ALIAS_ => "Registros de Caja Chica",
        F_HELP_ => "Registros de Caja Chica",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cj_estado like '+cj_estado.getStr()+' and cj_empr = '+__local.getStr()",
        F_LINK_ => "db.caja_chica_chan",
        F_SEND_ => "__local.get()",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "cj_abierta.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "doclick2",
        F_ALIAS_ => "click",
        F_HELP_ => "Contro click",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "123",
        C_SHOW_ => "cj_abierta.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( !openSubform   ){  document.getElementById(|{cap`registros_modif`Registros de Caja Chica}|).click(); openSubform=true; }else{openSubform=false;  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "open_sub2",
        F_ALIAS_ => "Abre Subformulario",
        F_HELP_ => "Abre Subformulario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "124",
        C_SHOW_ => "cj_abierta.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{registros_modif}|).setAttribute(|{hidden}|,|{false}|); document.getElementById(|{hbox_registros_modif}|).setAttribute(|{height}|,|{280}|);",
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
        F_ORD_ => "126",
        F_FORMULA_ => "'( ! )  Area para generar Reporte Mensual... '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		
$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Fecha desde",
        F_HELP_ => "Fecha desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "130",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Fecha hasta",
        F_HELP_ => "Fecha hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "140",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	 
		
$Obj->Add(
    array(
        F_NAME_ => "cj_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Empresa o Particular",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Empresa,Particular,%",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "143",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		

$Obj->Add(
    array(
        F_NAME_ => "reporte",
        F_ALIAS_ => "Ver Reporte",
		F_HELP_ => "Ver Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.caja_chica_mov",
        F_NODB_ => "1",
        F_ORD_ => "145",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

?>
