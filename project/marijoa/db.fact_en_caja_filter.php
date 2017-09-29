<?php
$Obj->name = "fact_en_caja_filter";
$Obj->alias = "Ventas en Caja";
$Obj->help = "Facturas que estan en Caja";
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
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "2",
        F_FORMULA_ => "'Cierre y abra la grilla para actualizar las Ventas que estan en espera!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "true",
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
        F_NAME_ => "en_caja",
        F_ALIAS_ => "Invisibles: ",
        F_HELP_ => "Cantidad de facturas invisibles",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(if((fact_cli_ci <> cli_ci or fact_cli_cat <> cli_cat or fact_nom_cli <> cli_fullname),1,0)) from factura left join mnt_cli on fact_cli_ci = cli_ci where fact_estado = |{En_caja}| and fact_localidad = '+__local.getStr()",
        F_QUERY_REF_ => "__local.hasChanged()||en_caja.firstSQL",
        F_RELTABLE_ => "factura",
        F_LENGTH_ => "3",
        F_NODB_ => "2",
        F_ORD_ => "13",
        C_SHOW_ => "__local.get()!=''",
        C_CHANGE_ => "false",
		F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
	
$Obj->Add(
    array(
        F_NAME_ => "corroborar",
        F_ALIAS_ => "Facturas en Caja",
        F_HELP_ => "Facturas en Caja",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fact_en_caja",
        F_NODB_ => "1",
        F_ORD_ => "24",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
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
        F_NAME_ => "facturas",
        F_ALIAS_ => "Ventas en Caja",
        F_HELP_ => "Ventas en caja",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "' fact_estado=|{En_caja}| and fact_localidad = '+__local.getStr()+' and factura.fact_cli_cat = mnt_cli.cli_cat and factura.fact_nom_cli = mnt_cli.cli_fullname'",
        F_LINK_ => "db.venta_en_caja",
        F_SEND_ => "''",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
