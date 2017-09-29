<?php
$Obj->name = "caja_chi_x_suc";
$Obj->alias = "Caja Chica (Apertura y Cierre)";
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
        F_ORD_ => "10",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario (Sabemos lo que estas haciendo!!!)",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC:",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
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
        F_OPTIONS_ => "'cj_estado = |{Abierta}| and cj_empr = '+__local.getStr()",
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
        F_HELP_ => "Registros de Caja Chica Modif",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cj_estado = |{Abierta}| and cj_empr = '+__local.getStr()",
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

?>
