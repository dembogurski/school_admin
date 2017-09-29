<?php
$Obj->name = "presupuestos";
$Obj->alias = "Presupuestos";
$Obj->help = "Presupuestos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
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
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nombre_suc",
        F_ALIAS_ => "Nombre Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select emp_nombre from par_empresas where emp_cod like '+__local.getStr()",
        F_QUERY_REF_ => "__local.hasChanged()||nombre_suc.firstSQL",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "4",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "filtro",
        F_ALIAS_ => "Filtro Cliente",
        F_HELP_ => "Filtre por Nombre de cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "presups",
        F_ALIAS_ => "Presupuestos",
        F_HELP_ => "Presupuestos",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'fact_estado=|{Presup}| and fact_localidad = '+__local.getStr()+' and factura.fact_cli_cat = mnt_cli.cli_cat and factura.fact_nom_cli = mnt_cli.cli_fullname and fact_nom_cli like |{'+filtro.get()+'%}| '",
        F_LINK_ => "db.presupuesto",
        F_SEND_ => "''",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
