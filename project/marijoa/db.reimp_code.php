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
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del Producto a fraccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_ubic",
        F_ALIAS_ => "Ubic.",
        F_HELP_ => "Ubicacion del producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT concat(suc,|{:  }|,estante, |{:}| ,fila, |{:}|, col) AS ubic, operacion  FROM ubic WHERE codigo = '+f_cod.getVal()+'   ORDER BY id DESC LIMIT 1'",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
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
        C_VIEW_ => "false",
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
        F_ORD_ => "20",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        C_CHANGE_ => "f_cod.hasChanged()",
        F_FORMULA_ => "db('p_fam') ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gru",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "31",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        C_CHANGE_ => "f_cod.hasChanged()",
        F_FORMULA_ => "db('p_grupo') ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "32",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        C_CHANGE_ => "f_cod.hasChanged()",
        F_FORMULA_ => "db('p_tipo') ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descripcion",
        F_ALIAS_ => "Descrip",
        F_HELP_ => "Descrip",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_descri from mnt_prod where p_cod ='+ f_cod.get()  ",
        F_QUERY_REF_ => "f_cod.hasChanged() ",
        F_NODB_ => "1",
        F_ORD_ => "32",
		F_LENGTH_ => "50",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        C_CHANGE_ => "true",
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
        F_NAME_ => "p_local",
        F_ALIAS_ => "Suc",
        F_HELP_ => "Suc",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "56",
        F_INLINE_ => "1",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        C_CHANGE_ => "f_cod.hasChanged()",
        F_FORMULA_ => "db('p_local') ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_hist",
        F_ALIAS_ => "Ver historial de Impresiones",
        F_HELP_ => "Reimprimir codigo",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.his_impresiones",
        F_NODB_ => "1",
        F_ORD_ => "57",
        F_INLINE_ => "1",
        C_VIEW_ => "f_cod.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "58",
        C_VIEW_ => "false",
        C_CHANGE_ => "f_cod.hasChanged()",
        F_FORMULA_ => "db('p_color') ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_color",
        F_ALIAS_ => "Buscar Color",
        F_HELP_ => "Color",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "58",
        C_VIEW_ => "__local.get()==p_local.get()&&fam.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color  ",
        F_HELP_ => "Color",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_color.hasChanged()",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'c_cod like |{'+b_color.get()+'%}| order by c_cod asc'",
        F_BROW_ => "1",
        F_ORD_ => "58",
        F_INLINE_ => "1",
        C_VIEW_ => "__local.get()==p_local.get()&&fam.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "check_color",
        F_ALIAS_ => "Color Verif.",
        F_HELP_ => "Check the color",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "true",
        C_VIEW_ => "__local.get()==p_local.get()&&f_cod.getVal()>0",
        F_FORMULA_ => "if(p_color.get()==''){'Ingrese el color para verificar!!!'}else if(p_color.get()==color.get()){'Verificacion correcta!!!'}else{'Verificacion de color incorrecta!'}",
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
        C_VIEW_ => "fam.get()!=''&&__local.get()==p_local.get()",
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
        C_VIEW_ => "__local.get()==p_local.get()",
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
        F_ORD_ => "64",
        C_VIEW_ => "__local.get()==p_local.get()",
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
        F_ORD_ => "64",
        F_INLINE_ => "1",
        C_VIEW_ => "__local.get()==p_local.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "tam",
        F_ALIAS_ => "Tamaño de Etiqueta",
        F_HELP_ => "Tamaño de Etiqueta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "6x4,10x5",
        F_NODB_ => "1",
        F_ORD_ => "64",
        F_INLINE_ => "1",
        C_VIEW_ => "__local.get()==p_local.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "f_imprimir_new",
        F_ALIAS_ => "                   Reimprimir codigo                    ",
        F_HELP_ => "Reimprimir codigo",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.re_code39",
        F_NODB_ => "1",
        F_ORD_ => "64",
        F_INLINE_ => "1",
        C_VIEW_ => "f_cod.getVal()>0&&check_color.get()=='Verificacion correcta!!!'&&obs.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "cod_cli",
        F_ALIAS_ => "Codigo de Cliente",
        F_HELP_ => "Codigo de Cliente",
        F_TYPE_ => "text",        
        F_NODB_ => "1",
        F_ORD_ => "65",
		F_LENGTH_ => "10",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "f_imprimir_cli",
        F_ALIAS_ => "                   Reimprimir codigo  p/Clientes                  ",
        F_HELP_ => "Reimprimir codigo",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.re_code39cli",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        C_VIEW_ => "f_cod.getVal()>0&&check_color.get()=='Verificacion correcta!!!'&&obs.get()!=''&&cod_cli.get()!=''",
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
        F_NAME_ => "styleu",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{f_ubic}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylef",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{fam}|).setAttribute(|{style}|,|{height:35px;color:black;font-size:24px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "styleg",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{gru}|).setAttribute(|{style}|,|{height:35px;color:black;font-size:24px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylet",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{tipo}|).setAttribute(|{style}|,|{height:35px;color:black;font-size:24px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "styled",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{descripcion}|).setAttribute(|{style}|,|{height:35px;color:orange;font-size:24px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylev",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{check_color}|).setAttribute(|{style}|,|{height:28px;color:black;font-size:18px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "check_suc",
        F_ALIAS_ => "Check Suc",
        F_HELP_ => "Check the Suc",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "261",
        C_SHOW_ => "true",
        C_VIEW_ => "__local.get()!=p_local.get()&&fam.get()!=''",
        F_FORMULA_ => "'El codigo no se encuentra en esta Sucursal!!!'",
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

?>
