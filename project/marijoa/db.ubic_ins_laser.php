<?php
$Obj->name = "ubic_ins_laser";
$Obj->alias = "Ubicar Productos con el Laser";
$Obj->help = "Ubicar Productos con el Laser";
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
        F_NAME_ => "bar_code",
        F_ALIAS_ => "Cuadrante",
        F_HELP_ => "Cuadrante",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "12",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "blaser",
        F_ALIAS_ => "Punteo",
        F_HELP_ => "Buscador o Lector Laser",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "Laser,Manual",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
        F_FORMULA_ => "if(bar_code.get()==''){'Manual'}else{'Laser'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_FORMULA_ => "bar_code.get().toUpperCase().split(|{ }|)[0]",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estante",
        F_ALIAS_ => "Estante",
        F_HELP_ => "Estante",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "blaser.get()=='Laser'",
        F_FORMULA_ => "bar_code.get().toUpperCase().split(|{ }|)[1]",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fila",
        F_ALIAS_ => "Fila",
        F_HELP_ => "Fila",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "41",
        C_SHOW_ => "blaser.get()=='Laser'",
        F_FORMULA_ => "bar_code.get().toUpperCase().split(|{ }|)[2]",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "columna",
        F_ALIAS_ => "Columna",
        F_HELP_ => "Columna",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "43",
        F_INLINE_ => "1",
        C_SHOW_ => "blaser.get()=='Laser'",
        F_FORMULA_ => "bar_code.get().toUpperCase().split(|{ }|)[3]",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "control_aj",
        F_ALIAS_ => "Controlar Ajustes",
        F_HELP_ => "Controlar Ajustes",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        C_SHOW_ => "blaser.get()=='Laser'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "blaser.get()=='Laser'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ins_ubic",
        F_ALIAS_ => " ",
        F_HELP_ => "dd",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT ubicar('+codigo.getStr()+',|{'+estante.get()+'}|,|{'+fila.get()+'}|,|{'+columna.get()+'}|,|{'+__user.get()+'}|,|{'+suc.get()+'}|,'+control_aj.getStr()+' )'",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "last_ubic",
        F_ALIAS_ => "Ultima Ubicacion: ",
        F_HELP_ => "Ultima Ubicacion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(suc,|{-}|,estante,|{-}|,fila,|{-}|,col,|{, }|,estado) as lastUbic from ubic where codigo = '+codigo.getStr()+' order by id desc limit 1'",
        F_QUERY_REF_ => "codigo.hasChanged()&&false",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "60",
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
        F_ORD_ => "80",
        C_SHOW_ => "blaser.get()=='Laser'",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( document.getElementById(|{codigo}|).hasAttribute(|{focused}|) ) { true }else{ false }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hfocus_esp",
        F_ALIAS_ => "Has Focus",
        F_HELP_ => "Has Focus",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "blaser.get()=='Laser'",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( document.getElementById(|{ins_ubic}|).hasAttribute(|{focused}|) ) { true }else{ false }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "select_text",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        C_SHOW_ => "blaser.get()=='Laser' && !hfocus.get() ",
        C_VIEW_ => "false",
        F_FORMULA_ => " if(bar_code.get()==''){ document.getElementById(|{bar_code}|).select(); }else{ document.getElementById(|{codigo}|).select() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylefc",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "  document.getElementById(|{fila}|).setAttribute(|{style}|,|{height:34px;color:blue;font-size:24px;text-align:center}|);  document.getElementById(|{columna}|).setAttribute(|{style}|,|{height:34px;color:blue;font-size:24px;;text-align:center}|);       ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "styles",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "  document.getElementById(|{suc}|).setAttribute(|{style}|,|{height:34px;color:blue;font-size:24px;;text-align:center}|);  document.getElementById(|{estante}|).setAttribute(|{style}|,|{height:34px;color:blue;font-size:24px;;text-align:center}|);       ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylecod",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "  document.getElementById(|{codigo}|).setAttribute(|{style}|,|{height:34px;color:green;font-size:24px;}|);          ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylebcod",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "  document.getElementById(|{bar_code}|).setAttribute(|{style}|,|{height:34px;color:black;font-size:24px;font-weight:bolder}|);          ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style2",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(ins_ubic.get()=='CODIGO NO EXISTE!!!' || ins_ubic.get().substring(0,9) =='ERROR SUC' || (ins_ubic.get().substring(0,11) == 'EN REMISION') || (ins_ubic.get().substring(0,18) == 'CODIGO SIN AJUSTES') ){   document.getElementById(|{ins_ubic}|).setAttribute(|{style}|,|{height:34px;color:red;font-size:24px;}|);}else{     document.getElementById(|{ins_ubic}|).setAttribute(|{style}|,|{height:34px;color:green;font-size:24px;}|); }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "esp",
        F_ALIAS_ => " ",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "199",
        C_SHOW_ => "blaser.get()=='Laser'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sig",
        F_ALIAS_ => "     Siguiente Cuadrante ---->    ",
        F_HELP_ => "      Siguiente Cuadrante     ",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select 2'",
        F_NODB_ => "1",
        F_ORD_ => "200",
        F_INLINE_ => "1",
        C_SHOW_ => "blaser.get()=='Laser'",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "styleesp",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "201",
        C_VIEW_ => "false",
        F_FORMULA_ => "  document.getElementById(|{esp}|).setAttribute(|{style}|,|{width:1px}|);          ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "202",
        C_SHOW_ => "sig.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.location.reload()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "setfocus",
        F_ALIAS_ => "Has Focus",
        F_HELP_ => "Has Focus",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "204",
        C_SHOW_ => "blaser.get()=='Manual'",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(document.getElementById(|{bar_code}|).hasAttribute(|{focused}|)==false && blaser.get()=='Manual'){  document.getElementById(|{bar_code}|).focus() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
