<?php
$Obj->name = "docs_cons";
$Obj->alias = "Documentos Legales Consultar";
$Obj->help = "Documentos Legales";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "docs";
$Obj->Filter = "db.docs";
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
        F_NAME_ => "busc_prov",
        F_ALIAS_ => "Buscar Proveedor",
        F_HELP_ => "Buscar Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "11",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_prov.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "docs",
        F_SHOWFIELD_ => "distinct prov,''",
        F_FILTER_ => "'prov like |{'+busc_prov.get()+'%}| '",
        F_LENGTH_ => "20",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Factura",
        F_HELP_ => "Tipo Factura",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Contado,Credito",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "emp",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Marijoa S.R.L.,Comercial E Ind. Marijoa S.R.L.,Particular",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,,Enviado",
        F_LENGTH_ => "24",
        F_BROW_ => "1",
        F_ORD_ => "500",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
