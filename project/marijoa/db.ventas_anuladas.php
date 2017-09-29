<?php
$Obj->name = "ventas_anuladas";
$Obj->alias = "Ventas Anuladas";
$Obj->help = "Ventas Anuladas";
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
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select local from p_users where name = |{'+p_user_+'}| '",
        F_QUERY_REF_ => "__suc.hasChanged()||__suc.firstSQL",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta la Fecha",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "40",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "buscar",
        F_ALIAS_ => "Buscar (Opcional)",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vendedor",
        F_ALIAS_ => "Vendedores",
        F_HELP_ => "Vendedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "buscar.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_lugar_trab = '+__suc.getStr()+' and func_cod like |{'+buscar.get()+'%}| and func_estado = |{Activo}| order by func_cod asc'",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'%'",
        C_VIEW_ => "__suc.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reporte",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ventas_anuladas",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "desde.notEmpty()&&hasta.notEmpty()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
