<?php
$Obj->name = "venta_cons";
$Obj->alias = "Venta de Productos";
$Obj->help = "Venta de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
$Obj->Filter = "db.venta_no_edit";
$Obj->Sort = "fact_nro desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
/**
    array(
        F_NAME_ => "fact_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de emisión de la factura",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "12",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));
		
$Obj->Add(*/
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "11",
        V_DEFAULT_ => "'01-01-2014'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "14",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "1056",
        G_CHANGE_ => "1056"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nro",
        F_ALIAS_ => "Nº de Factura",
        F_HELP_ => "Nº de Factura",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "111",
        F_UNIQ_ => "1",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "estado_fact",
        F_ALIAS_ => "Estado de Factura",
        F_HELP_ => "Estado de Factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT fact_estado,fact_empaque FROM factura WHERE fact_nro ='+fact_nro.getVal()",
        F_QUERY_REF_ => "fact_nro.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "121",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "1056",
        G_CHANGE_ => "1056"));

$Obj->Add(
    array(
        F_NAME_ => "empaq",
        F_ALIAS_ => "Empaque",
        F_HELP_ => "Empaque",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "122",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('fact_empaque')",
        G_SHOW_ => "1056",
        G_CHANGE_ => "1056"));

$Obj->Add(
    array(
        F_NAME_ => "change_to",
        F_ALIAS_ => "Cambiar a:",
        F_HELP_ => "Cambiar a:",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,Anulada,En_caja",
        F_NODB_ => "1",
        F_ORD_ => "131",
        C_SHOW_ => "estado_fact.get()!='__NO DATA__'",
        G_SHOW_ => "1056",
        G_CHANGE_ => "1056"));

$Obj->Add(
    array(
        F_NAME_ => "empaqe",
        F_ALIAS_ => "Empaque",
        F_HELP_ => "Empaque",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "132",
        F_INLINE_ => "1",
        G_SHOW_ => "1056",
        G_CHANGE_ => "1056"));

$Obj->Add(
    array(
        F_NAME_ => "change",
        F_ALIAS_ => "Cambiar Estado de Factura (Se producira un registro)",
        F_HELP_ => "Cambiar Estado de Factura (Se producira un registro)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update factura set fact_estado = '+change_to.getStr()+', fact_empaque = '+empaqe.getStr()+'  where fact_nro = '+fact_nro.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "141",
        F_INLINE_ => "1",
        C_SHOW_ => "estado_fact.get()!='__NO DATA__' && ( p_user_=='Developer' ||  p_user_=='jack')",
        G_SHOW_ => "1056",
        G_CHANGE_ => "1056"));

$Obj->Add(
    array(
        F_NAME_ => "__log",
        F_ALIAS_ => "Make Log",
        F_HELP_ => "Make Log",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT makeLog_(|{MODIFICAR}|, |{Factura Nro: '+fact_nro.get()+' marco como  '+change_to.get()+'  }|,'+__user.getStr()+' )'",
        F_QUERY_REF_ => "change.get()&&__log.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "151",
        C_VIEW_ => "false",
        G_SHOW_ => "1056",
        G_CHANGE_ => "1056"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "152",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_facts_abier",
        F_ALIAS_ => "Facturas Re Editadas",
        F_HELP_ => "Facturas Re Editadas",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.facts_reabiert",
        F_NODB_ => "1",
        F_ORD_ => "161",
        G_SHOW_ => "16916608",
        G_CHANGE_ => "16916608"));

$Obj->Add(
    array(
        F_NAME_ => "ver_facts_anul",
        F_ALIAS_ => "Facturas Re Editadas Anuladas",
        F_HELP_ => "Facturas Re Editadas Anuladas",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.facts_ab_anul",
        F_NODB_ => "1",
        F_ORD_ => "161",
        F_INLINE_ => "1",
        G_SHOW_ => "16916608",
        G_CHANGE_ => "16916608"));

$Obj->Add(
    array(
        F_NAME_ => "dp_conv",
        F_ALIAS_ => "Convenio con que Compra",
        F_HELP_ => "Convenio  (Deje  vacio si no compra con Convenio)",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_cod,conv_nombre",
        F_LENGTH_ => "15",
        F_ORD_ => "170",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "change_conv",
        F_ALIAS_ => "Cambiar Convenio",
        F_HELP_ => "Cambiar Estado de Factura (Se producira un registro)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update factura set fact_conv = '+dp_conv.getStr()+' where fact_nro = '+fact_nro.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "174",
        F_INLINE_ => "1",
        C_SHOW_ => "estado_fact.get()!='__NO DATA__'&&dp_conv.get()!=''&&!change_conv.get()",
        G_SHOW_ => "1056",
        G_CHANGE_ => "1056"));

$Obj->Add(
    array(
        F_NAME_ => "info",
        F_ALIAS_ => "(!)",
        F_HELP_ => "(!)",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_SHOW_ => "change_conv.get()",
        C_CHANGE_ => "false",
        F_FORMULA_ => "'Ok el convenio ya se ha cambiado...'",
        G_SHOW_ => "1056",
        G_CHANGE_ => "1056"));

?>
