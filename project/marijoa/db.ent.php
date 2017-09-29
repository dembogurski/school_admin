<?php
$Obj->name = "ent";
$Obj->alias = "Entidades";
$Obj->help = "Entidades";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "ent";
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
        F_NAME_ => "ent_doc",
        F_ALIAS_ => "Documento",
        F_HELP_ => "Documento",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        F_UNIQ_ => "1",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_le_datos",
        F_ALIAS_ => "Le datos",
        F_HELP_ => "Le datos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT * FROM ent WHERE ent_doc='+ent_doc.getStr()",
        F_QUERY_REF_ => "ent_doc.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "12",
        C_VIEW_ => "false",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "__autofill__",
        F_ALIAS_ => "Autofill",
        F_HELP_ => "Autofill",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_VIEW_ => "false",
        F_FORMULA_ => "ent_le_datos.get()",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_tipodoc",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "RUC,CI,DNI,Otro",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_otrodoc",
        F_ALIAS_ => "Tipo Documento",
        F_HELP_ => "Descripción del Tipo Documento",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "30",
        C_SHOW_ => "ent_tipodoc.get()=='Otro'",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "35",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_direccion",
        F_ALIAS_ => "Dirección",
        F_HELP_ => "Dirección",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_ORD_ => "40",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_cidade",
        F_ALIAS_ => "Cidade",
        F_HELP_ => "Cidade",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "50",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_pais",
        F_ALIAS_ => "Pais",
        F_HELP_ => "Pais",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_ORD_ => "60",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_tel",
        F_ALIAS_ => "Teléfono",
        F_HELP_ => "Teléfono",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_fax",
        F_ALIAS_ => "FAX",
        F_HELP_ => "FAX",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "80",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_mail",
        F_ALIAS_ => "e-mail",
        F_HELP_ => "e-mail",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "90",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_LENGTH_ => "2",
        F_ORD_ => "100",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_ORD_ => "110",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_conv",
        F_ALIAS_ => "Conveniado",
        F_HELP_ => "Conveniado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_ORD_ => "120",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_func",
        F_ALIAS_ => "Funcionario",
        F_HELP_ => "Funcionario",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_ORD_ => "130",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ent_cuenta",
        F_ALIAS_ => "Cuentas Bancarias",
        F_HELP_ => "Cuentas Bancarias",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'ec_cod='+ent_doc.getStr()",
        F_LINK_ => "db.ent_ctas",
        F_SEND_ => "ent_doc.get()",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "ent_prov.get()=='Si'||ent_cli.get()=='Si'",
        G_SHOW_ => "2",
        G_CHANGE_ => "2"));

?>
