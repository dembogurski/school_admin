<?php
$Obj->name = "cons_compras_st";
$Obj->alias = "Consulta de Compras";
$Obj->help = "Consulta de Compras";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mov_compras";
$Obj->Filter = "db.mov_compras_st";
$Obj->Sort = "c_fecha DESC";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "c_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia ",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "5",
        F_ORD_ => "10",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_bloq_ins",
        F_ALIAS_ => "Bloquea Insertar",
        F_HELP_ => "Bloquea Insertar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "12",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_nombre",
        F_FILTER_ => "'true order by emp_cod'",
        F_LENGTH_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "15",
        V_DEFAULT_ => "'00'",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fechafac",
        F_ALIAS_ => "Fecha Factura",
        F_HELP_ => "Fecha Compra (Factura)",
        F_TYPE_ => "text",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor de los productos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_cod,prov_nombre",
        F_FILTER_ => "'true ORDER BY prov_nombre'",
        F_LENGTH_ => "5",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_factura",
        F_ALIAS_ => "Factura",
        F_HELP_ => "Factura de compra",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_interno",
        F_ALIAS_ => "Interno",
        F_HELP_ => "Número Interno",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "73",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda utilizada para la compra",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_LENGTH_ => "10",
        F_ORD_ => "75",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_tipo",
        F_ALIAS_ => "Forma de Pago",
        F_HELP_ => "Tipo de Factura o Forma de pago",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Contado,Credito",
        F_LENGTH_ => "10",
        F_ORD_ => "79",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado de la compra",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Abierta,Cerrada,En Finanzas",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "105",
        C_SHOW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
