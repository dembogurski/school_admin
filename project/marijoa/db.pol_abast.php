<?php
$Obj->name = "pol_abast";
$Obj->alias = "Politica de Abastecimiento";
$Obj->help = "Politica de Abastecimiento";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "pol_abast";
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
        F_NAME_ => "sector",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_cod,''",
        F_FILTER_ => "'TRUE order by f_cod asc'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "sector.hasChanged()",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_grupo,''",
        F_FILTER_ => "'p_fam like |{'+sector.get()+'%}| order by p_grupo asc'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo   ",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "grupo.hasChanged()",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_tipo,''",
        F_FILTER_ => "'p_fam like |{'+sector.get()+'}| and p_grupo like |{'+grupo.get()+'}| order by p_tipo asc'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "color",
        F_ALIAS_ => "color ",
        F_HELP_ => "color",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "tipo.hasChanged()",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_color,''",
        F_FILTER_ => "'p_fam like |{'+sector.get()+'}| and p_grupo like |{'+grupo.get()+'}| and p_tipo like |{'+tipo.get()+'}| order by p_color asc'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_min",
        F_ALIAS_ => "Cant. Minima",
        F_HELP_ => "Cantidad Minima",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_ORD_ => "76",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "temporada",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "PERMANENTE,VERANO,INVIERNO",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "inicio",
        F_ALIAS_ => "Inicio",
        F_HELP_ => "Inicio",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "90",
        F_FORMULA_ => "if(temporada.get()=='VERANO'){'10-01'}else if(temporada.get()=='INVIERNO'){'03-01'}else{'01-01'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fin",
        F_ALIAS_ => "fin",
        F_HELP_ => "fin",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        F_FORMULA_ => "if(temporada.get()=='VERANO'){'02-30'}else if(temporada.get()=='INVIERNO'){'09-31'}else{'12-31'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "100",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
