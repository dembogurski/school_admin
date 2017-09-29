<?php
$Obj->name = "nota_pedido_ab";
$Obj->alias = "Nota de Pedido a Sucursales o Proveedores";
$Obj->help = "Nota de Pedido a Sucursales o Proveedores";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "nota_pedido";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "'delete from nota_pedido_det where nro_pedido = '+nro.getVal()";
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
        F_FORMULA_ => "if(operation==INSERT_){ disableAcceptButton() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
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
        F_ORD_ => "15",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "20",
        C_SHOW_ => "operation==INSERT_",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Origen",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__suc",
        F_ALIAS_ => "Origen",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__locald",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_ORD_ => "80",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__sucd",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Nombre de la Sucursal Destino",
        F_TYPE_ => "text",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "90",
        F_BROW_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,Pendiente",
        F_BROW_ => "1",
        F_ORD_ => "200",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__print",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.nota_pedido",
        F_NODB_ => "1",
        F_ORD_ => "205",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "210",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "det",
        F_ALIAS_ => "Detalle de Nota de Pedido",
        F_HELP_ => "Detalle de Nota de Pedido",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'nro_pedido = '+nro.getVal()",
        F_LINK_ => "db.nota_pedido_det",
        F_SEND_ => "nro.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "220",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "check",
        F_ALIAS_ => "Check",
        F_HELP_ => "Check",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from nota_pedido_det where nro_pedido = '+nro.get()",
        F_QUERY_REF_ => "estado.get()=='Pendiente'||check.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "230",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock2",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "240",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( check.getVal() < 1 ){ disableAcceptButton() }else{ enableAcceptButton() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__update",
        F_ALIAS_ => "Cambia estado",
        F_HELP_ => "Cambia estado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update nota_pedido_det d,nota_pedido n set fecha_ped = current_date, fecha_hora_cierre = current_timestamp, n.fecha = current_date where d.nro_pedido = n.nro and nro_pedido =  '+nro.getVal()",
        F_QUERY_REF_ => "estado.hasChanged()&&estado.get()=='Pendiente'",
        F_NODB_ => "1",
        F_ORD_ => "250",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "formula",
        F_ALIAS_ => "Formula",
        F_HELP_ => "Formula",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "260",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(estado.hasChanged()&&estado.get()=='Pendiente'){setValue( 'fecha' , thisDate_ );  } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
