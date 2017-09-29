<?php
$Obj->name = "imp_code_bar";
$Obj->alias = "Imprimir codigo de barras";
$Obj->help = "Imprimir codigo de barras de producto";
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
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del Producto a fraccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
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
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_term",
        F_ALIAS_ => "Terminacion",
        F_HELP_ => "Terminacion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  CONCAT(|{%}|, RIGHT(|{'+f_cod.getVal()+'}|,2) )'",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_sql",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion + Obtiene datos de Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_descri, p_fam, p_grupo, p_tipo, p_comp, p_temp, p_estruc, p_clasif, p_color, p_cant, p_local from mnt_prod where p_cod ='+ f_cod.get()  ",
        F_QUERY_REF_ => "f_cod.hasChanged() ",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => "Sub Caracterisitcas",
        F_HELP_ => "Descipcion",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        C_CHANGE_ => "f_cod.hasChanged()",
        F_FORMULA_ => "db('p_fam')+'-'+  db('p_grupo') +'-'+   db('p_tipo,') +'-'+   db('p_comp') +'-'+   db('p_temp')+'-'+   db('p_estruc')  +'-'+  db('p_clasif') +'-'+   db('p_color')  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cant",
        F_ALIAS_ => "Cantidad en Stock",
        F_HELP_ => "Cantidad en Stock",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "40",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_precio",
        F_ALIAS_ => "Precio del Producto",
        F_HELP_ => "Precio del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_precio_1 from mnt_prod where p_cod = '+f_cod.getVal()",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_BROW_ => "1",
        F_ORD_ => "55",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_codigo_nuevo",
        F_ALIAS_ => "Codigo del Producto Fraccionado",
        F_HELP_ => "Codigo del nuevo fraccionado recientemente.",
        F_TYPE_ => "formula",
        F_QUERY_REF_ => "f_proc_return.hasChanged()",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        C_CHANGE_ => "f_cod.hasChanged()",
        F_FORMULA_ => "f_cod.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_hasta",
        F_ALIAS_ => "Imprimir hasta ",
        F_HELP_ => "Imprimir hasta ",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "62",
        V_DEFAULT_ => "f_codigo_nuevo.get()",
        C_SHOW_ => "f_codigo_nuevo.get()!=''",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_ref",
        F_ALIAS_ => "Nro REF o Factura",
        F_HELP_ => "Nro REF o Factura",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "63",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'%'",
        C_SHOW_ => "f_codigo_nuevo.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_rango",
        F_ALIAS_ => "Rango",
        F_HELP_ => "Rango",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "64",
        V_DEFAULT_ => "f_codigo_nuevo.get()",
        C_SHOW_ => "f_codigo_nuevo.get()!=''",
        C_VIEW_ => "false",
        C_CHANGE_ => "f_codigo_nuevo.hasChanged()||f_hasta.hasChanged()",
        F_FORMULA_ => "if( f_hasta.getVal()>0 ){  f_hasta.get()   }else{ f_codigo_nuevo.get()  } ",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_adv",
        F_ALIAS_ => "Opciones de Impresion",
        F_HELP_ => "Opciones avanzadas de Impresion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Mostrar Opciones",
        F_NODB_ => "1",
        F_ORD_ => "64",
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

$Obj->Add(
    array(
        F_NAME_ => "f_habilitar",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Habilitar impresion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "126",
        C_SHOW_ => "f_sql.get()!='__NO DATA__'&&f_cod.get()!=''",
        C_VIEW_ => "false // por ahora",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_user",
        F_ALIAS_ => "Buscar Usuario",
        F_HELP_ => "Buscar Usuario",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "130",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_user.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_cod like |{'+b_user.get()+'%}|'",
        F_NODB_ => "1",
        F_ORD_ => "131",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_imprimir_new",
        F_ALIAS_ => "     Imprimir Code EAN 39 Primera Impresion      ",
        F_HELP_ => "Imprimir Code 39",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.code39",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_VIEW_ => "f_cod.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "re_imprimir",
        F_ALIAS_ => "   Ver Codigos a Reimprimir   ",
        F_HELP_ => "Ver Codigos a Re-Imprimir en este rango",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.re_impresion",
        F_NODB_ => "1",
        F_ORD_ => "210",
        F_INLINE_ => "1",
        C_VIEW_ => "f_cod.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{f_cod}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style2",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{f_hasta}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tab0",
        F_ALIAS_ => "tab",
        F_HELP_ => "tab",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "261",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{f_cod}|).setAttribute(|{tabindex}|,|{2}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hfocus",
        F_ALIAS_ => "Has Focus",
        F_HELP_ => "Has Focus",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "262",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( document.getElementById(|{f_cod}|).hasAttribute(|{focused}|) ) { true }else{ false }",
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
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "272",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "print_custom",
        F_ALIAS_ => "    Impresion Personalizada     ",
        F_HELP_ => "Imprimir Code 39",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.code_custom",
        F_NODB_ => "1",
        F_ORD_ => "600",
        C_VIEW_ => "true",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

?>
