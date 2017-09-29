<?php
$Obj->name = "empaque_cortes";
$Obj->alias = "Cortes en Empaque";
$Obj->help = "Cortes  en Empaque";
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
        F_NAME_ => "__local",
        F_ALIAS_ => "Obtiene Localidad",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "blaser",
        F_ALIAS_ => "Laser",
        F_HELP_ => "Lector Laser",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "'Laser'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod",
        F_ALIAS_ => "Buscar codigo",
        F_HELP_ => "Código",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "25",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( cod.get()==''){'%'}else{ cod.get() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "found",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_LENGTH_ => "18",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        F_FORMULA_ => "if(cant.get()!='__NO DATA__'&&cant.get()!='' ){'Encontrado'  }else{'No Encontrado'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "factu",
        F_ALIAS_ => "Factura",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "41",
        F_INLINE_ => "1",
        F_FORMULA_ => "if( cant.get()!='__NO DATA__'){db('df_fact_num')}else{''}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "41",
        F_FORMULA_ => "if( cant.get()!='__NO DATA__'){db('func_nombre')}else{''}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descr",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "41",
        F_FORMULA_ => "if( cant.get()!='__NO DATA__'){db('df_descrip')}else{''}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style3",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        C_SHOW_ => "found.get()=='No Encontrado'",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{found}|).setAttribute(|{style}|,|{height:34px;color:red;font-size:24px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style4",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        C_SHOW_ => "found.get()=='Encontrado'",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{found}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:18px;}|);  document.getElementById(|{cant}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:18px;}|);    document.getElementById(|{descr}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:18px;}|); document.getElementById(|{func}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:18px;}|);  document.getElementById(|{factu}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:18px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style5",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        C_SHOW_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{cod}|).setAttribute(|{style}|,|{height:34px;color:black;font-size:24px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant",
        F_ALIAS_ => "Cantidad a Cortar",
        F_HELP_ => " ",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT  d.df_cantidad, d.df_descrip,f.func_nombre, d.df_fact_num FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND f.fact_estado <> |{Cerrada}| AND d.df_cod_prod = '+codigo.getStr()+'   limit 1 '",
        F_QUERY_REF_ => "cod.getVal()>0",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "48",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hfocus",
        F_ALIAS_ => "Has Focus",
        F_HELP_ => "Has Focus",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "blaser.get()=='Laser'",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( document.getElementById(|{cod}|).hasAttribute(|{focused}|) ) { true }else{ false }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "select_text",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_SHOW_ => "blaser.get()=='Laser' && !hfocus.get() ",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{cod}|).select() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
