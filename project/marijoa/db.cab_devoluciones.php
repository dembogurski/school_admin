<?php
$Obj->name = "cab_devolucione";
$Obj->alias = "Devoluciones ";
$Obj->help = "Devoluciones de productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cab_devoluciones";
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
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dev_nro",
        F_ALIAS_ => "Nro:",
        F_HELP_ => "Nro:",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select _autonum(|{dev_nro}|);'",
        F_QUERY_REF_ => "dev_nro.firstSQL",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "11",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "_user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Usuario",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "20",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
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
        F_ORD_ => "30",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_dev",
        F_ALIAS_ => "Generar Devolucion",
        F_HELP_ => "Generar Devolucion",
        F_TYPE_ => "proc",
        F_QUERY_ => "'insert into cab_devoluciones (id, dev_nro, _user, fecha, __local)values(default, '+dev_nro.getVal()+','+_user.getStr()+',current_date, '+__local.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "35",
        C_SHOW_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "change_oper",
        F_ALIAS_ => "Cambia Operacion",
        F_HELP_ => "Cambia Operacion",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "36",
        C_SHOW_ => "gen_dev.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "operation=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dev_det",
        F_ALIAS_ => "Detalle",
        F_HELP_ => "Detalle",
        F_TYPE_ => "subform",
        F_LINK_ => "db.devoluciones",
        F_SEND_ => "dev_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "46",
        C_SHOW_ => "true",
        C_VIEW_ => " ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
