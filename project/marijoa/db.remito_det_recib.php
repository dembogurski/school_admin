<?php
$Obj->name = "remito_det";
$Obj->alias = "Detalle de Remito";
$Obj->help = "Detalle de Remito";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "remito_det";
$Obj->Filter = "";
$Obj->Sort = "df_cod_prod asc";
$Obj->p_insert = "";
$Obj->p_change = "'select recibir_prod('+df_cod_prod.getVal()+','+rem_nro.getVal()+','+marcar.getStr()+','+__local.getStr()+')'";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "999";
$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Numero del remito",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_REQUIRED_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "6",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_cod_prod",
        F_ALIAS_ => "Código de Producto",
        F_HELP_ => "Código de Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "sup['rem_estado']=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_local",
        F_ALIAS_ => "Local del Producto",
        F_HELP_ => "Local del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_local from mnt_prod where p_cod ='+df_cod_prod.getVal() ",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()||df_local.firstSQL&&df_cod_prod.getVal()>0",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_datos_prod",
        F_ALIAS_ => "Obtiene datos del Producto",
        F_HELP_ => "Obtiene datos del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => " 'select p.p_cant,p.p_descri,p.p_fam, p.p_grupo,p.p_tipo,p.p_comp, p.p_color, p.p_temp,p.p_estruc, p.p_clasif, p.p_local from  mnt_prod p where  p.p_cod = '+df_cod_prod.getVal()+' and  p.prod_fin_pieza = |{No}| '",
        F_QUERY_REF_ => " df_datos_prod.firstSQL||operation==CHANGE_",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "25",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_descrip",
        F_ALIAS_ => "Descripción de Producto",
        F_HELP_ => "Descripción de Producto",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_QUERY_REF_ => " ",
        F_LOCALFIELD_ => "rem_nro",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "35",
        C_CHANGE_ => "false",
        F_FORMULA_ => " ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_disponible",
        F_ALIAS_ => "Cantidad disponible en Stock",
        F_HELP_ => "Cantidad disponible en Stock",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "45",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "marcar",
        F_ALIAS_ => "Recibido",
        F_HELP_ => "Marque con recibido solo si recibio el producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Recibido",
        F_BROW_ => "1",
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "kg_env",
        F_ALIAS_ => "Kg Enviado",
        F_HELP_ => "Kg Enviado",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
		C_VIEW_ => "false",
        F_DEC_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "47",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			

$Obj->Add(
    array(
        F_NAME_ => "kg_rec",
        F_ALIAS_ => "Kg. Recibido",
        F_HELP_ => "Kg. Recibido",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "3",
		C_VIEW_ => "false",
        F_BROW_ => "1",
        F_ORD_ => "75",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
