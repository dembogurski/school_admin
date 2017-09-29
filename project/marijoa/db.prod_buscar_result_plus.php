<?php
$Obj->name = "prod_buscar_result_plus";
$Obj->alias = "Codigos Encontrados Disponibles";
$Obj->help = "Codigos Encontrados Disponibles";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prod";
$Obj->Filter = "";
$Obj->Sort = "p_local asc";
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
        F_NAME_ => "p_local",
        F_ALIAS_ => "Suc",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
		F_BROW_ => "1",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "35",
		F_INLINE_ => "1",
		C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(	
	array(
        F_NAME_ => "p_cant",
        F_ALIAS_ => "Stock",
        F_HELP_ => "Stock",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "1",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "36",
		F_INLINE_ => "1",        
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
		F_BROW_ => "0",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "5",
		F_INLINE_ => "0",
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
		F_BROW_ => "0",
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
		F_BROW_ => "0",
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
		F_BROW_ => "0",
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
		//F_BROW_ => "0",
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
		//F_BROW_ => "0",
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
		F_BROW_ => "0",
        F_REQUIRED_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "32",
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
        F_LENGTH_ => "33",
		//F_BROW_ => "0",
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
        F_NAME_ => "p_descri",
        F_ALIAS_ => "Descrip",
        F_HELP_ => "Descripcion",
        F_TYPE_ => "text",
        F_LENGTH_ => "34",
		F_BROW_ => "1",
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
        F_NAME_ => "p_ancho",
        F_ALIAS_ => "Ancho",
        F_HELP_ => "Ancho",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "1",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "36",
		F_INLINE_ => "0",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(	
	array(
        F_NAME_ => "p_precio_1",
        F_ALIAS_ => "Precio 1",
        F_HELP_ => "Precio 1",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "1",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "37",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(	
	array(
        F_NAME_ => "p_precio_2",
        F_ALIAS_ => "Precio 2",
        F_HELP_ => "Precio 2",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "0",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "38",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(	
	array(
        F_NAME_ => "p_precio_3",
        F_ALIAS_ => "Precio 3",
        F_HELP_ => "Precio 3",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "0",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "39",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(	
	array(
        F_NAME_ => "p_precio_4",
        F_ALIAS_ => "Precio 4",
        F_HELP_ => "Precio 4",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "0",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "40",
		F_INLINE_ => "0",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(	
	array(
        F_NAME_ => "p_precio_5",
        F_ALIAS_ => "Precio 5",
        F_HELP_ => "Precio 5",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "0",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "41",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(	
	array(
        F_NAME_ => "p_precio_6",
        F_ALIAS_ => "Precio 6",
        F_HELP_ => "Precio 6",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "0",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "42",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(	
	array(
        F_NAME_ => "p_precio_7",
        F_ALIAS_ => "Precio 7",
        F_HELP_ => "Precio 7",
        F_TYPE_ => "text",
        F_LENGTH_ => "7",
		F_BROW_ => "0",
        F_NODB_ => "1",
        F_REQUIRED_ => "0",
        F_ORD_ => "43",
		F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
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


?>
