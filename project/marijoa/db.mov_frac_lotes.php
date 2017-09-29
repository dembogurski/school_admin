<?php
$Obj->name = "mov_frac_lotes";
$Obj->alias = "Fraccionamiento x Lotes";
$Obj->help = "Fraccionamiento x Lotes";
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
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
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
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "remision",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CONCAT(|{Remision   }|,r.rem_estado, |{  [De }|,r.rem_origen, |{ --> }|,r.rem_destino, |{] Nro: }|,r.rem_nro) FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado LIKE |{En Proceso}|AND d.df_cod_prod = '+f_cod.getStr()+' ORDER BY r.id DESC LIMIT 1'",
        F_QUERY_REF_ => "f_cod.hasChanged()&&f_cod.get()!=''",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "_user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Usuario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "15",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "false",
        C_CHANGE_ => "operation==INSERT_",
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
        F_NODB_ => "1",
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
        F_ORD_ => "25",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        F_FORMULA_ => "db('p_fam')+'-'+  db('p_grupo') +'-'+   db('p_tipo,') +'-'+   db('p_comp') +'-'+   db('p_temp')+'-'+   db('p_estruc')  +'-'+  db('p_clasif') +'-'+   db('p_color')  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cant",
        F_ALIAS_ => "Cantidad en Stock",
        F_HELP_ => "Cantidad en Stock",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('p_local')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nombre_suc",
        F_ALIAS_ => "Nombre Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_QUERY_ => "'select emp_nombre from par_empresas where emp_cod like '+suc.getStr()",
        F_QUERY_REF_ => "suc.hasChanged()",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_bloqueo",
        F_ALIAS_ => "Desabilita el boton Consult",
        F_HELP_ => "Desabilita el boton Consult",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "f_bloqueo.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => " ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_FORMULA_ => "'Pegue abajo, las cantidades y la sucursal separados por coma, uno debajo del otro Ej.  20,06'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "lote",
        F_ALIAS_ => "Lote",
        F_HELP_ => "Lote",
        F_TYPE_ => "text",
        F_MULTI_ => "1.40",
        F_LENGTH_ => "999999",
        F_NODB_ => "1",
        F_ORD_ => "70",
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
        F_ORD_ => "72",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fraccionar",
        F_ALIAS_ => "Fraccionar y Remitir",
        F_HELP_ => "Fraccionar y Remitir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fraccionar_lote",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()==suc.get()&&f_cod.get()!=''&&lote.get()!=''&&lote.length()>5",
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
        F_ORD_ => "90",
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
        F_ORD_ => "100",
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
        F_ORD_ => "110",
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
        F_ORD_ => "120",
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
        F_ORD_ => "130",
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
        F_ORD_ => "140",
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
        F_ORD_ => "150",
        F_INLINE_ => "1",
        C_VIEW_ => "f_adv.get()=='Mostrar Opciones'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
