<?php
$Obj->name = "reimp_code";
$Obj->alias = "Reimpresion de codigo de barras";
$Obj->help = "Reimpresion de codigo de barras";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "imprimir_codigo_barras";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "f_bloqueo",
        F_ALIAS_ => "Desabilita el boton Consult",
        F_HELP_ => "Desabilita el boton Consult",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "2",
        C_SHOW_ => "f_bloqueo.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cod",
        F_ALIAS_ => "Códigos",
        F_HELP_ => "Código del Producto  ",
        F_TYPE_ => "text",
        F_MULTI_ => "1.20",
        F_LENGTH_ => "10000",
        F_BROW_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "6",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC:",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "8",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "motivo",
        F_ALIAS_ => "Motivo",
        F_HELP_ => "Motivo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Codigo Borroso,Codigo Estropeado,Codigo Extraviado,Fallo de Impresora,Otro.",
        F_NODB_ => "1",
        F_ORD_ => "9",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Obs",
        F_HELP_ => "Motivo de la Reimpresion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "200",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_adv",
        F_ALIAS_ => "Opciones de Imp.",
        F_HELP_ => "Opciones avanzadas de Impresion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Mostrar Opciones",
        F_NODB_ => "1",
        F_ORD_ => "62",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_imprimir_new",
        F_ALIAS_ => "                   Reimprimir codigos                    ",
        F_HELP_ => "Reimprimir codigo",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.re_code39Lotes",
        F_NODB_ => "1",
        F_ORD_ => "64",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_size",
        F_ALIAS_ => "Ancho de la etiqueta",
        F_HELP_ => "Tamaño de la etiqueta en pixeles",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select etiq_ancho from adm_param;'",
        F_QUERY_REF_ => "f_size.firstSQL",
        F_LENGTH_ => "5",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "65",
        V_DEFAULT_ => "310",
        C_VIEW_ => "f_adv.get()=='Mostrar Opciones'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_alt",
        F_ALIAS_ => "Altura de la etiqueta",
        F_HELP_ => "Altura de la etiqueta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select etiq_alto from adm_param;'",
        F_QUERY_REF_ => "f_alt.firstSQL",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "66",
        F_INLINE_ => "1",
        V_DEFAULT_ => "10",
        C_VIEW_ => "f_adv.get()=='Mostrar Opciones'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_tam",
        F_ALIAS_ => "Tamaño de las letras",
        F_HELP_ => "Tamaño de las letras",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select etiq_font_size from adm_param;'",
        F_QUERY_REF_ => "f_tam.firstSQL",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "80",
        V_DEFAULT_ => "10",
        C_VIEW_ => "f_adv.get()=='Mostrar Opciones'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_izq",
        F_ALIAS_ => "Derecha/Izquierda",
        F_HELP_ => "Espacios libres Izquierda",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select etiq_izq_space from adm_param;'",
        F_QUERY_REF_ => "f_izq.firstSQL",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        V_DEFAULT_ => "0",
        C_VIEW_ => "f_adv.get()=='Mostrar Opciones'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_recordar",
        F_ALIAS_ => "Recordar Parametros de Impresion",
        F_HELP_ => "Recordar Parametros de Impresion",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update adm_param set etiq_font_size = '+f_tam.getVal()+',  etiq_izq_space = '+f_izq.getVal()+', etiq_dist = '+f_dist.getVal()+', etiq_ancho = '+f_size.getVal()+', etiq_alto = '+f_alt.getVal()+''",
        F_NODB_ => "1",
        F_ORD_ => "104",
        F_INLINE_ => "1",
        C_VIEW_ => "f_adv.get()=='Mostrar Opciones'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_dist",
        F_ALIAS_ => "Distancia entre Etiquetas",
        F_HELP_ => "Distancia entre Etiquetas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select etiq_dist from adm_param;'",
        F_QUERY_REF_ => "f_dist.firstSQL",
        F_LENGTH_ => "6",
        F_ORD_ => "110",
        C_VIEW_ => "f_adv.get()=='Mostrar Opciones'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mostrar_precio",
        F_ALIAS_ => "Mostrar Precio",
        F_HELP_ => "Mostrar Precio",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_NODB_ => "1",
        F_ORD_ => "125",
        F_INLINE_ => "1",
        C_VIEW_ => "f_adv.get()=='Mostrar Opciones'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
