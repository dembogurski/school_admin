<?php
$Obj->name = "asientos_cont";
$Obj->alias = "Asientos Contables";
$Obj->help = "Asientos Contables";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "asientos_cont";
$Obj->Filter = "";
$Obj->Sort = "nro_as desc";
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
        F_RELTABLE_ => "mnt_func",
        F_ORD_ => "4",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_as",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT gen_asiento('+__user.getStr()+','+fecha.getStr()+', '+suc.getStr()+', '+obs.getStr()+',|{Manual}|);'",
        F_QUERY_REF_ => "gen_as.get()=='Si'&&nro_as.firstSQL",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "5",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "*",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc '",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "doclick",
        F_ALIAS_ => "click",
        F_HELP_ => "Contro click",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "123",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( !openSubform   ){  document.getElementById(|{cap`asientos_det`Detalle de Asiento}|).click(); openSubform=true; }else{openSubform=false;  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "open_sub",
        F_ALIAS_ => "Abre Subformulario",
        F_HELP_ => "Abre Subformulario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "124",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{asientos_det}|).setAttribute(|{hidden}|,|{false}|); document.getElementById(|{hbox_asientos_det}|).setAttribute(|{height}|,|{240}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "asientos_det",
        F_ALIAS_ => "Detalle de Asiento",
        F_HELP_ => "Detalle de Asiento",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'nro_as='+nro_as.getVal()",
        F_LINK_ => "db.asientos_det",
        F_SEND_ => "nro_as.get()",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Obs:",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "600",
        F_BROW_ => "1",
        F_ORD_ => "144",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "as_preview",
        F_ALIAS_ => "Previsualizar",
        F_HELP_ => "Previsualizar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.asiento_preview",
        F_NODB_ => "1",
        F_ORD_ => "145",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sig",
        F_ALIAS_ => "   Siguiente   (Finalizar)   ",
        F_HELP_ => "Siguiente",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select 1 + 3'",
        F_NODB_ => "1",
        F_ORD_ => "145",
        F_INLINE_ => "1",
        C_SHOW_ => "del.get()=='No'&&nro_as.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_as",
        F_ALIAS_ => "Generar Asiento",
        F_HELP_ => "Generar Asiento",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "146",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "nro_as.getVal()<1&&suc.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "150",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__change",
        F_ALIAS_ => "Operation = CHANGE_",
        F_HELP_ => "Operation = CHANGE_",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_SHOW_ => "nro_as.getVal()>0&&gen_as.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "operation=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ident",
        F_ALIAS_ => "Codigo Identificador",
        F_HELP_ => "Codigo Identificador",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "162",
        C_SHOW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disabledel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "172",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "del",
        F_ALIAS_ => "Eliminar Asiento",
        F_HELP_ => "Eliminar Asiento",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "182",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "del_asiento",
        F_ALIAS_ => "Confirmar Borrar Asiento",
        F_HELP_ => "Borrar Asiento",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select del_asiento('+nro_as.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "190",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "del.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goback",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "250",
        C_SHOW_ => "del_asiento.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();  setTimeout('self.close()',1000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "reload",
        F_HELP_ => "reload",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "250",
        C_SHOW_ => "sig.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.location.reload();  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
