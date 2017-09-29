<?php
$Obj->name = "pol_abast_rep";
$Obj->alias = "Reporte de Abastecimiento";
$Obj->help = "Reporte de Abastecimiento";
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
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select local from p_users where name = |{'+p_user_+'}| '",
        F_QUERY_REF_ => "__suc.firstSQL",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
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
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant",
        F_ALIAS_ => "Stock >= a:",
        F_HELP_ => "Stock >= a:",
        F_TYPE_ => "text",         
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "50",        
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		
$Obj->Add(
    array(
        F_NAME_ => "rep_pol",
        F_ALIAS_ => "Generar Reporte Basado en Politica de Abastecimiento",
        F_HELP_ => "Generar Reporte Basado en Politica de Abastecimiento",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.pol_abast_rep",
        F_NODB_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
