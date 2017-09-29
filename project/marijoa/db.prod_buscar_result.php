<?php
$Obj->name = "prod_buscar_result";
$Obj->alias = "Resultado de la busqueda";
$Obj->help = "Resultado de la busqueda";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prod";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
$Obj->Limit = "300";
$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Cod.Ref.",
        F_HELP_ => "Cod.Ref.",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "1",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "1",		
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "text",
        F_LENGTH_ => "31",
		F_BROW_ => "1",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "5",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(		
	array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "text",
        F_LENGTH_ => "31",
		F_BROW_ => "1",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "7",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(	
	array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "text",
        F_LENGTH_ => "31",
		F_BROW_ => "1",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "11",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
	
$Obj->Add(	
	array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color",
        F_TYPE_ => "text",
        F_LENGTH_ => "31",
		F_BROW_ => "1",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "12",
		//F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
	
$Obj->Add(	
	array(
        F_NAME_ => "p_comp",
        F_ALIAS_ => "Composicion",
        F_HELP_ => "Composicion",
        F_TYPE_ => "text",
        F_LENGTH_ => "31",
		//F_BROW_ => "1",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "13",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
	
$Obj->Add(	
	array(
        F_NAME_ => "p_estruc",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura",
        F_TYPE_ => "text",
        F_LENGTH_ => "31",
		//F_BROW_ => "1",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
	
$Obj->Add(	
	array(
        F_NAME_ => "p_clasif",
        F_ALIAS_ => "Clasificacion",
        F_HELP_ => "Clasificacion",
        F_TYPE_ => "text",
        F_LENGTH_ => "31",
		F_BROW_ => "1",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
		//F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
	
$Obj->Add(	
	array(
        F_NAME_ => "p_temp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada",
        F_TYPE_ => "text",
        F_LENGTH_ => "31",
		//F_BROW_ => "1",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "31",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sucs",
        F_ALIAS_ => "Suc:",
        F_HELP_ => "Listar productos por sucursal",    
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_cod.get()>0",
        F_QUERY_REF_ => "sucs.firstSQL",
        F_RELTABLE_ => "mnt_prod",
		F_OPTIONS_ => "%",
        F_SHOWFIELD_ => "distinct(p_local),''",
        F_FILTER_ => "'p_fam='+p_fam.getStr()+' and p_grupo='+p_grupo.getStr()+' and p_tipo='+p_tipo.getStr()+' and p_color='+p_color.getStr()+' and p_local <> |{11}| and p_cant > '+sup['cant_min']+' and prod_fin_pieza like |{'+sup['fdp']+'}| order by p_local asc'",
        F_LENGTH_ => "4",
        F_NODB_ => "1",		
        F_ORD_ => "33",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
		V_DEFAULT_ => "%",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		


$Obj->Add(
    array(
        F_NAME_ => "res_busqueda",
        F_ALIAS_ => "Resultado",
        F_HELP_ => "Resultado",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'p_fam='+p_fam.getStr()+' and p_grupo='+p_grupo.getStr()+' and p_tipo='+p_tipo.getStr()+' and p_color='+p_color.getStr()+' and p_local <> |{11}| and p_local like '+sucs.getStr()+' and p_cant > '+sup['cant_min']+' and prod_fin_pieza like |{'+sup['fdp']+'}| and verif_disponible(p_cod)=0'",
        F_LINK_ => "db.prod_buscar_result_plus",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "26",
        C_SHOW_ => "operation!=INSERT_",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));



$Obj->Add(
    array(
        F_NAME_ => "changeStatus",
        F_ALIAS_ => "Cambiar estado a operation==CHANGE_",
        F_HELP_ => "Cambiar estado a operation==CHANGE_",
        F_TYPE_ => "formula",        
        F_LENGTH_ => "256",
        F_BROW_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "111",
        C_VIEW_ => "false",
		C_SHOW_ => "changeStatus.firstSQL",
        F_FORMULA_ => "operation=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));


$Obj->Add(
    array(
        F_NAME_ => "showResult",
        F_ALIAS_ => "Result",
        F_HELP_ => "",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "202",
        C_VIEW_ => "false",
		C_SHOW_ => "(showResult.firstSQL&&sucs.get()!='')||sucs.hasChanged()",
        F_FORMULA_ => "sucs.turnChanged(false);showResult.firstSQL=false;setIframe(null,'cap`res_busqueda`Resultado');",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
?>
