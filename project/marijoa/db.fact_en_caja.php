<?php
$Obj->name = "fact_en_caja";
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
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|';",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "3",
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
        F_NAME_ => "__fact",
        F_ALIAS_ => " ",
        F_HELP_ => "Facturacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select calc_facturacion('+__local.getStr()+')'",
        F_QUERY_REF_ => "__fact.firstSQL&&__local.get()!=''",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "6",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
/**
$Obj->Add(
    array(
        F_NAME_ => "chasetCH",
        F_ALIAS_ => "cambia charset",
        F_HELP_ => "Cambia el charset",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SET character_set_results = |{utf8}|, character_set_client = |{utf8}|, character_set_connection = |{utf8}|",
        F_QUERY_REF_ => "__fact.firstSQL&&__local.get()!=''",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "7",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
*/
$Obj->Add(
    array(
        F_NAME_ => "filtro",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Filtre por Nro de Factura o Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "10",
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
        C_SHOW_ => "",
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
        F_OPTIONS_ => "'fact_estado=|{En_caja}| and fact_localidad = '+__local.getStr()+' and factura.fact_cli_cat = mnt_cli.cli_cat and cast(convert(cli_fullname  using latin1) as char)=cast(fact_nom_cli as binary) and fact_vend_cod like |{'+filtro.get()+'%}| '",
        F_LINK_ => "db.venta_en_caja",
        F_SEND_ => "''",
        F_ORD_ => "30",
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
        C_VIEW_ => "false",
        F_FORMULA_ => "if( !openSubform   ){  document.getElementById(|{cap`facturas`Ventas en Caja}|).click(); openSubform=true; }else{openSubform=false;  }",
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
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{facturas}|).setAttribute(|{hidden}|,|{false}|); document.getElementById(|{hbox_facturas}|).setAttribute(|{height}|,|{460}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
