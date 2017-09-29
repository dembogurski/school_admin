<?php
$Obj->name = "pedido_pn_xsuc";
$Obj->alias = "Pedidos Pendientes Entrantes a Esta Sucursal";
$Obj->help = "Pedidos Pendientes de Esta Sucursal";
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
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
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
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select emp_nombre from par_empresas where emp_cod like '+__local.getStr()",
        F_QUERY_REF_ => "__local.hasChanged()||__suc.firstSQL",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "consulta_param",
        F_ALIAS_ => "Consultar por: ",
        F_HELP_ => "Consultar por nro de referencia o por parametros",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Parametros,Nro.Pedido",
        F_NODB_ => "1",
        F_INLINE_ => "1",
        F_ORD_ => "33",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ped_pend",
        F_ALIAS_ => "Pedidos Pendientes de Esta Sucursal",
        F_HELP_ => "Pedidos Pendientes de Esta Sucursal",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'(estado=|{Pendiente}| or estado=|{En Proceso}|) and __locald='+__local.getStr()+''",
        F_LINK_ => "db.nota_pedido_ent",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ped_numero",
        F_ALIAS_ => "Pedido Nro.:",
        F_HELP_ => "Numero de pedido",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",        
        F_NODB_ => "1",
        F_ORD_ => "34",
        C_SHOW_ => "consulta_param.get()=='Nro.Pedido'&&consulta_param.get()!=''",
        C_VIEW_ => "true",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "origen",
        F_ALIAS_ => "Origen",
        F_HELP_ => "Origen",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "34",
        C_SHOW_ => "consulta_param.get()=='Parametros'&&consulta_param.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "destino",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Destino",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "origen.hasChanged()",
        F_OPTIONS_ => "%,PR",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'emp_cod <> '+origen.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "36",
        F_INLINE_ => "1",
        C_SHOW_ => "consulta_param.get()=='Parametros'&&consulta_param.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "50",
        V_DEFAULT_ => "'01-01-2012'",
        C_SHOW_ => "consulta_param.get()=='Parametros'&&consulta_param.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_SHOW_ => "consulta_param.get()=='Parametros'&&consulta_param.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado De los Codigos",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,En Proceso,Enviado,Suspendido",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "consulta_param.get()=='Parametros'&&consulta_param.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));


$Obj->Add(
    array(
        F_NAME_ => "urge",
        F_ALIAS_ => "Urgente",
        F_HELP_ => "Urgente",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,No,Si",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "78",
        C_SHOW_ => "consulta_param.get()=='Parametros'&&consulta_param.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mayorista",
        F_ALIAS_ => "Filtrar solo Pedidos para Mayorista",
        F_HELP_ => "Mayorista",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,No,Si",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "78",
        F_INLINE_ => "1",
        C_SHOW_ => "consulta_param.get()=='Parametros'&&consulta_param.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pedidos_urg",
        F_ALIAS_ => "Ver Pedidos Entrantes Reposicion / Urgentes",
        F_HELP_ => "Ver Pedidos Urgentes",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.pedidos_urg_suc",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_SHOW_ => "(desde.get()!=''&&hasta.get()!='')||(consulta_param.get()=='Nro.Pedido' && ped_numero.getVal()>0)",
        C_VIEW_ => "destino.get()!=''||ped_numero.getVal()>0",
        G_SHOW_ => "65840",
        G_CHANGE_ => "65840"));

?>
