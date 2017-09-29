<?php
$Obj->name = "rep_vnts_x_func";
$Obj->alias = "Ventas de Funcionarios";
$Obj->help = "Ventas de Funcionarios";
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
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "3",
        F_FORMULA_ => "'Introdusca % para mostrar todos los funcionarios...'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_VIEW_ => "true",
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
        F_ORD_ => "10",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_func",
        F_ALIAS_ => "Buscar Funcionario",
        F_HELP_ => "Busca al Funcionario",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "15",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Código del funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_func.hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_cod like |{'+busc_func.get()+'%}|  or func_fullname like |{'+busc_func.get()+'%}|'",
        F_BROW_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_nombre",
        F_ALIAS_ => "Nombre del funcionario",
        F_HELP_ => "Nombre del funcionario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select func_fullname from mnt_func where func_cod = '+__user.getStr()+' '",
        F_QUERY_REF_ => "__user.hasChanged()",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Fecha desde",
        F_HELP_ => "Fecha desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Fecha hasta",
        F_HELP_ => "Fecha hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Cerrada,Abierta,Empaque,En_caja,%",
        F_NODB_ => "1",
        F_ORD_ => "45",
        C_VIEW_ => "operation!=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen",
        F_ALIAS_ => "Generar Informe",
        F_HELP_ => "Generar Informe",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_det_mis_ven",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_hoy",
        F_ALIAS_ => "Reporte de Hoy",
        F_HELP_ => "Reporte de Hoy",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_mis_vent_ho",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_porc_ventas",
        F_ALIAS_ => "Reporte de Porcentaje de Ventas",
        F_HELP_ => "Reporte de Porcentaje de Ventas",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.porc_ventas_func",
        F_NODB_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nac_int",
        F_ALIAS_ => "Carga Nacional/Internacional",
        F_HELP_ => "Carga Nacional/Internacional",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Nacional,Internacional,%",
        F_NODB_ => "1",
        F_ORD_ => "72",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hijos",
        F_ALIAS_ => "Mostrar Codigos Fraccionados",
        F_HELP_ => "Mostrar Hijos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No,%",
        F_NODB_ => "1",
        F_ORD_ => "74",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "est_carga_prod",
        F_ALIAS_ => "Estadistica de Carga de Productos",
        F_HELP_ => "Estadistica de Carga de Productos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.est_carga_prod",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
