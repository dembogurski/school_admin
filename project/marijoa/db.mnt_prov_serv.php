<?php
$Obj->name = "mnt_prov_serv";
$Obj->alias = "Proveedores de Servicios";
$Obj->help = "Mantenimiento de Proveedores";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prov_serv";
$Obj->Filter = "";
$Obj->Sort = "prov_nombre";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "prov_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del Proveedor",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        F_UNIQ_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre del Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_dir",
        F_ALIAS_ => "Dirección",
        F_HELP_ => "Dirección del Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_ciudad",
        F_ALIAS_ => "Ciudad",
        F_HELP_ => "Ciudad del Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_pais",
        F_ALIAS_ => "Pais",
        F_HELP_ => "Pais del Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_tel",
        F_ALIAS_ => "Teléfono/S",
        F_HELP_ => "Teléfono del Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_fax",
        F_ALIAS_ => "FAX",
        F_HELP_ => "FAX del proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_mail",
        F_ALIAS_ => "Mail",
        F_HELP_ => "Mail (dirección electrónica)",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_web",
        F_ALIAS_ => "Web",
        F_HELP_ => "Dirección Web",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_contacto",
        F_ALIAS_ => "Contacto",
        F_HELP_ => "Personal de Contacto",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_ruc",
        F_ALIAS_ => "RUC",
        F_HELP_ => "RUC del Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_cta",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "350",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_cta_cont",
        F_ALIAS_ => "Codigo de Ref. Contabilidad",
        F_HELP_ => "Codigo Contable",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_cta.hasChanged()",
        F_RELTABLE_ => "plan_cuentas",
        F_SHOWFIELD_ => "c_cod,c_descrip",
        F_FILTER_ => "'c_descrip like |{'+busc_cta.get()+'%}| limit 30'",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "400",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
