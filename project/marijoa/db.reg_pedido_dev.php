<?php
$Obj->name = "reg_pedido_dev";
$Obj->alias = "Registro de Pedidos de Devoluciones";
$Obj->help = "Registro de Pedidos de Devoluciones";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "reg_pedido_dev";
$Obj->Filter = "";
$Obj->Sort = "id desc, estado asc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
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
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "suc.firstSQL",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hoy",
        F_ALIAS_ => "Fecha Registro",
        F_HELP_ => "HOY",
        F_TYPE_ => "date",
        F_OPTIONS_ => "DB",
        F_BROW_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cliente",
        F_ALIAS_ => "Nombre Cliente",
        F_HELP_ => "Nombre del Cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "contacto",
        F_ALIAS_ => "Nombre del que Llama",
        F_HELP_ => "Nombre del Contacto",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_REQUIRED_ => "1",
        F_ORD_ => "32",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_comp",
        F_ALIAS_ => "Tipo Comprobante",
        F_HELP_ => "Tipo Comprobante",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Ticket Interno,Factura Legal",
        F_ORD_ => "34",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_legal",
        F_ALIAS_ => "Factura Legal Nº",
        F_HELP_ => "Factura Legal Nº",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        C_VIEW_ => "tipo_comp.get()=='Factura Legal'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "factura",
        F_ALIAS_ => "Nº de Ticket",
        F_HELP_ => "Nº de Ticket o Boleta interna",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT f_ref FROM fact_cont  WHERE f_suc = '+suc.getStr()+' AND f_nro = '+fact_legal.getVal()+' ORDER BY id DESC LIMIT 1 '",
        F_QUERY_REF_ => "fact_legal.hasChanged()",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "43",
        C_CHANGE_ => "tipo_comp.get()=='Ticket Interno'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha Factura",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_OPTIONS_ => " ",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  DATE_FORMAT(fact_fecha,|{%d-%m-%Y}|) AS FECHA, fact_nom_cli as CLIENTE   from factura WHERE fact_nro ='+factura.getVal()",
        F_QUERY_REF_ => "factura.hasChanged()||operation==CHANGE_&&fecha.firstSQL",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "46",
        C_CHANGE_ => "__user.get()=='Developer'||__user.get()=='Jack'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "client",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "47",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('CLIENTE')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Solicitud",
        F_HELP_ => "Elija el Tipo de Solicitud",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Normal,Excepcional",
        F_BROW_ => "1",
        F_ORD_ => "48",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "intervalo",
        F_ALIAS_ => "Intevalo de dias para la Devolucion",
        F_HELP_ => "Intevalo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "49",
		C_CHANGE_ => "",
        F_INLINE_ => "1",
        F_FORMULA_ => "tipo.get()=='Normal'?1:15",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "info_det",
        F_ALIAS_ => "Detalle de Factura",
        F_HELP_ => "Detalle de Factura",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.det_venta_devol",
        F_NODB_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        C_SHOW_ => "factura.getVal()>0",
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
        F_ORD_ => "56",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "diffdate",
        F_ALIAS_ => "Diferencia de Fechas en Dias",
        F_HELP_ => "Diferencia de Fechas",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "60",
		
        F_FORMULA_ => "diffDate( hoy.getDate(),fecha.getDate() )",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_venc",
        F_ALIAS_ => "Vencimiento",
        F_HELP_ => "Fehca de Expiracion de la Solicitud",
        F_TYPE_ => "date",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT date_add(CURRENT_DATE,INTERVAL '+intervalo.getVal()+' DAY)'",
        F_QUERY_REF_ => "intervalo.hasChanged()||fecha.hasChanged()",
        F_BROW_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgfecha",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "diffdate.getVal() > 1",
        F_FORMULA_ => "'( ! ) No se permiten Registros de ventas mayores a 1 dia!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style1",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "71",
        C_SHOW_ => "diffdate.getVal()>1",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msgfecha}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cerrado",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "diffdate.getVal()>1",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__unlock",
        F_ALIAS_ => "Desbloquea el boton Insert/Accept",
        F_HELP_ => "Desbloqueael boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "diffdate.getVal()<2",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
