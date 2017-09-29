<?php
$Obj->name = "rep_stock_FGT";
$Obj->alias = "Reporte Stock Sector Grupo Tipo";
$Obj->help = "Reporte Stock Sector Grupo Tipo";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_localidad",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true ORDER BY emp_cod'",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_fam",
        F_FILTER_ => "'f_cod <> |{JOSE YUNIS}| and f_cod <> |{ACTIVO FIJO}| and f_cod <> |{VENTA POR KG}| ORDER BY f_cod'",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "115",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_OPTIONS_ => "%",
		F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_grupo,|{}|",
        F_FILTER_ => "'p_fam = |{'+p_fam.get()+'}| group by p_grupo'",
		F_DSL_ => "p_fam.hasChanged()",		
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "116",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_OPTIONS_ => "%",
		F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_tipo,|{}|",
        F_FILTER_ => "'p_grupo = |{'+p_grupo.get()+'}| group by p_tipo'",
		F_DSL_ => "p_grupo.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "117",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color",
        F_TYPE_ => "dynamic_select_list",
        F_OPTIONS_ => "%",
		F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_color,|{}|",
        F_FILTER_ => "'p_tipo = |{'+p_tipo.get()+'}| group by p_color'",
		F_DSL_ => "p_tipo.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "117",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stock_colores",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.stock_colores",
        F_NODB_ => "1",
        F_ORD_ => "186",
        C_SHOW_ => "true",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

?>
