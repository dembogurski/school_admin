<?php
$Obj->name = "retazos";
$Obj->alias = "Retazos";
$Obj->help = "Retazos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "retazos";
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
        F_NAME_ => "df_cod_ret",
        F_ALIAS_ => "Código de Producto",
        F_HELP_ => "Código de Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_datos_prod",
        F_ALIAS_ => "Obtiene datos del Producto",
        F_HELP_ => "Obtiene datos del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => " 'select p.p_valmin,p.p_cant, p.p_grupo,p.p_tipo, p.p_color,p.p_fam, p.p_descri, p.p_estruc, p.p_lisoest, p.prod_fin_pieza, p_local from mnt_grupo g, mnt_clasif cl ,mnt_prod p where  p.p_cod = '+df_cod_ret.getVal()+' and p.prod_fin_pieza = |{No}| '",
        F_QUERY_REF_ => "df_cod_ret.hasChanged()||df_datos_prod.firstSQL||operation==CHANGE_",
        F_LENGTH_ => "60",
        F_ORD_ => "20",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_descrip",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción de Producto ",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "df_datos_prod.hasChanged()||(operation==CHANGE_&&df_descrip.firstSQL)",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "db('p_tipo')!=''",
        C_CHANGE_ => "false",
        F_FORMULA_ => "db('p_grupo')+'-'+db('p_tipo')+'-'+db('p_color')+'-'+db('p_descri')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_disponible",
        F_ALIAS_ => "Cantidad disponible en Stock",
        F_HELP_ => "Cantidad disponible en Stock",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "12",
        F_DEC_ => "1",
        F_BROW_ => "1",
        F_ORD_ => "40",
        C_CHANGE_ => "false",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "porc",
        F_ALIAS_ => "Porcentaje de Para por Venta",
        F_HELP_ => "Porcentaje que se le dara a los vendedores",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        V_DEFAULT_ => "'2.00'",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

?>
