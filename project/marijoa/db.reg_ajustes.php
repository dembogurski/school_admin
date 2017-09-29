<?php
$Obj->name = "reg_ajustes";
$Obj->alias = "Registro de Solicitudes de Ajustes";
$Obj->help = "Registro de Solicitudes de Ajustes";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "reg_ajustes";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "aj_interno",
        F_ALIAS_ => "Interno",
        F_HELP_ => "Número Interno",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "10",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_user",
        F_ALIAS_ => "usuario",
        F_HELP_ => "usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_BROW_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "aj_suc.firstSQL&&operation==INSERT_",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "14",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_tela",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion de La Tela entregada",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_descri",
        F_RELFIELD_ => "p_cod",
        F_LOCALFIELD_ => "aj_codigo",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha actual",
        F_TYPE_ => "date",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "16",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_ajuste",
        F_ALIAS_ => "Cantidad a Ajustar",
        F_HELP_ => "Cantidad a Ajustar",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_inicial",
        F_ALIAS_ => "Cantidad Actual",
        F_HELP_ => "Cantidad",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_cant",
        F_RELFIELD_ => "p_cod",
        F_LOCALFIELD_ => "aj_codigo",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_oper",
        F_ALIAS_ => "Motivo",
        F_HELP_ => "Motivo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Aumento en Salida,Disminucion en Salida",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_signo",
        F_ALIAS_ => "Signo",
        F_HELP_ => "Signo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        F_FORMULA_ => "aj_oper.get().substring(0,7)=='Aumento'?'+':'-'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_final",
        F_ALIAS_ => "Final",
        F_HELP_ => "Existencia Final",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "74",
        F_FORMULA_ => "aj_oper.get().substring(0,7)=='Aumento'?aj_inicial.getVal()+aj_ajuste.getVal():aj_inicial.getVal()-aj_ajuste.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_motivo",
        F_ALIAS_ => "Motivo de Ajuste",
        F_HELP_ => "Motivo de Ajuste",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "150",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "75",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado de la compra",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Ajustado",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "140",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
