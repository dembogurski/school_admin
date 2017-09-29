<?php
$Obj->name = "ventas_discrim";
$Obj->alias = "Ventas Discriminadas";
$Obj->help = "Ventas Discriminadas";
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
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_vend",
        F_ALIAS_ => "Buscar Vendedor",
        F_HELP_ => "Buscar Funcionario Responsable",
        F_TYPE_ => "text",
        F_LENGTH_ => "18",
        F_NODB_ => "1",
        F_ORD_ => "3",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vend_cod",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Código y nombre compledo del funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_vend.hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'(func_fullname like |{'+busc_vend.get()+'%}|  or  func_cod like |{'+busc_vend.get()+'%}|) and func_lugar_trab = '+__local.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "3",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "make_f",
        F_ALIAS_ => "Crear Factura como SIN NOMBRE?",
        F_HELP_ => "Crear Factura como SIN NOMBRE?",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_SHOW_ => "vend_cod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_fact",
        F_ALIAS_ => "Tipo de Venta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Mayoristas,Discriminada",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_SHOW_ => "vend_cod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "turno",
        F_ALIAS_ => "Nº Turno",
        F_HELP_ => "Nº Turno",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_SHOW_ => "make_f.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "make_conf",
        F_ALIAS_ => "Confirme",
        F_HELP_ => "Confime",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "6",
        F_INLINE_ => "1",
        C_SHOW_ => "turno.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select venta_gen_frec('+vend_cod.getStr()+','+__local.getStr()+','+turno.getVal()+')'",
        F_QUERY_REF_ => "make_conf.get()=='Si'&&nro.firstSQL",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "7",
        F_INLINE_ => "1",
        C_VIEW_ => "make_conf.get()=='Si'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nro",
        F_ALIAS_ => "Facturas",
        F_HELP_ => "Facturas",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "vend_cod.hasChanged()||nro.hasChanged()",
        F_RELTABLE_ => "factura",
        F_SHOWFIELD_ => "fact_nro,concat(fact_nom_cli,|{    Cat.: }|,fact_cli_cat)",
        F_FILTER_ => "'fact_vend_cod = '+vend_cod.getStr()+' and fact_estado = |{Abierta}| and fact_localidad = '+__local.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "12",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_est",
        F_ALIAS_ => "Estado de Factura",
        F_HELP_ => "Estado de Factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_estado from factura where fact_nro = '+fact_nro.getVal()",
        F_QUERY_REF_ => "fact_nro.hasChanged()&&fact_nro.getVal()>0",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_vend",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Vendedor",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select func_nombre from factura where fact_nro = '+fact_nro.getVal()",
        F_QUERY_REF_ => "fact_nro.hasChanged()",
        F_SHOWFIELD_ => "f_cod,f_cod",
        F_LENGTH_ => "34",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "det_disc",
        F_ALIAS_ => "Detalle de Factura Discriminadas",
        F_HELP_ => "Detalle de Factura",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'df_fact_num='+fact_nro.get()",
        F_LINK_ => "db.det_factura_discr",
        F_SEND_ => "fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "f_est.get()=='Abierta' && fact_nro.getVal()>0 && tipo_fact.get()=='Discriminada'",
        C_VIEW_ => "f_est.get()=='Abierta' && fact_nro.getVal()>0 && tipo_fact.get()=='Discriminada'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "det_may",
        F_ALIAS_ => "Detalle de Factura Mayoristas",
        F_HELP_ => "Detalle de Factura",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'df_fact_num='+fact_nro.get()",
        F_LINK_ => "db.det_factura_may",
        F_SEND_ => "fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "f_est.get()=='Abierta' && fact_nro.getVal()>0 && tipo_fact.get()=='Mayoristas'",
        C_VIEW_ => "f_est.get()=='Abierta' && fact_nro.getVal()>0 && tipo_fact.get()=='Mayoristas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
