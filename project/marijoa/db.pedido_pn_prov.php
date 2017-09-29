<?php
$Obj->name = "pedido_pn_prov";
$Obj->alias = "Pedidos Pendientes a Proveedores";
$Obj->help = "Pedidos Pendientes a Proveedores";
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
        F_NAME_ => "ped_pend",
        F_ALIAS_ => "Pedidos Pendientes a Proveedores",
        F_HELP_ => "Pedidos Pendientes a Proveedores",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'estado=|{Pendiente}| and __locald=|{PR}| and __user <> '+sisUsu.getStr()",
        F_LINK_ => "db.nota_pedido_salp",
        F_SEND_ => "''",
        F_FILTER_ => "'true order by nro desc'",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ped_rev",
        F_ALIAS_ => "Pedidos Revisados a Proveedores",
        F_HELP_ => "Pedidos ya Revisados a Proveedores",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'estado=|{Revisado}| and __locald=|{PR}| and __user <> '+sisUsu.getStr()",
        F_LINK_ => "db.nota_pedido_salp",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "buscar",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "buscar.hasChanged()",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_nombre,prov_tel,prov_cod",
        F_FILTER_ => "'prov_nombre like |{'+buscar.get()+'%}|order by prov_nombre asc'",
        F_NODB_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "70",
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
        F_ORD_ => "80",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estadop",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Comprado,En Transito,En Deposito,Despachado",
        F_NODB_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "urg",
        F_ALIAS_ => "Solo Urgentes",
        F_HELP_ => "urgentes",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Si,No",
        F_NODB_ => "1",
        F_ORD_ => "105",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sistema",
        F_ALIAS_ => "Incluir Pedidos del Sistema",
        F_HELP_ => "Incluir Pedidos del Sistema",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_NODB_ => "1",
        F_ORD_ => "106",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suco",
        F_ALIAS_ => "Suc Origen",
        F_HELP_ => "Suc Origen",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "' true order by emp_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "107",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "text",
        F_LENGTH_ => "25",
        F_NODB_ => "1",
        F_ORD_ => "108",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "text",
        F_LENGTH_ => "25",
        F_ORD_ => "109",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__imprimir",
        F_ALIAS_ => "          Imprimir (Compras)          ",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.pedidos_prov",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "estadop.get()=='Pendiente' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__imprimir2",
        F_ALIAS_ => "          Imprimir (Seguimiento)          ",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.pedidos_provX",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "estadop.get()!='Pendiente' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_FORMULA_ => "'( ! ) En todos los reportes se mostraran como maximo 300 registros!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__imp_control",
        F_ALIAS_ => "          Reporte de Ventas de Pedidos          ",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.control_pedidos",
        F_NODB_ => "1",
        F_ORD_ => "130",
        G_SHOW_ => "131104",
        G_CHANGE_ => "131104"));

		
$Obj->Add(
    array(
        F_NAME_ => "sisUsu",
        F_ALIAS_ => "mostrar usuario sistema",
        F_HELP_ => "mostrar usuario sistema",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "133",
        C_VIEW_ => "false",
        C_CHANGE_ => "sistema.hasChanged()",
        F_FORMULA_ => "(sistema.get() === 'No')?'sistema':'';",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));
		
?>
