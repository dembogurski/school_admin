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
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "999";
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
        F_ORD_ => "8",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__destino",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Destino del Producto (Se actualizará el local del producto)",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "9",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['rem_destino']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_cod_prod",
        F_ALIAS_ => "Código de Producto",
        F_HELP_ => "Código de Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "sup['rem_estado']=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_dest",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Destino",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CONCAT(|{Suc.: }|,r.rem_destino,|{    Estado Remito:  }|, r.rem_estado )  FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado != |{Cerrada}| AND d.df_cod_prod = '+df_cod_prod.getVal()",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_LENGTH_ => "42",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_local",
        F_ALIAS_ => "Local del Producto",
        F_HELP_ => "Local del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_local from mnt_prod where p_cod ='+df_cod_prod.getVal() +' and  prod_fin_pieza <> |{Si}|'",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "existencia",
        F_ALIAS_ => "Exist.similar en Destino",
        F_HELP_ => "Existencia de Productos Similares en la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cant_prod_simil('+df_cod_prod.getVal()+','+__destino.getStr()+');'",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()||df_local.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "18",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_stad",
        F_ALIAS_ => "Estadistica de Ventas",
        F_HELP_ => "Estadistica de Ventas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select calc_orient_remito('+df_cod_prod.getVal()+','+__destino.getStr()+')'",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()&&df_cod_prod.getVal()>0",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "remito",
        F_ALIAS_ => "Remision",
        F_HELP_ => "Verifica si se encuentra en remision",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CONCAT(|{En Remision  }|, r.rem_estado ,|{  Destino }|, r.rem_dir_destino,|{ Nro: }|,r.rem_nro) FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado <> |{Cerrada}| AND d.df_cod_prod = '+df_cod_prod.getVal()+' '",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "22",
        C_VIEW_ => "df_cod_prod.getVal()>0",
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
        F_QUERY_ => "'select p.p_descri,p.p_fam, p.p_grupo,p.p_tipo,p.p_comp, p.p_color, p.p_temp,p.p_estruc, p.p_clasif, p.p_local from  mnt_prod p where  p.p_cod = '+df_cod_prod.getVal()+' and  p.prod_fin_pieza <> |{Si}| '",
        F_QUERY_REF_ => "(df_cod_prod.hasChanged()||df_datos_prod.firstSQL)&&df_cod_prod.getVal()!=0",
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
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "35",
        C_CHANGE_ => "df_datos_prod.hasChanged()",
        F_FORMULA_ => "db('p_grupo') +'-'+   db('p_tipo,') +'-'+   db('p_comp') +'-'+   db('p_estruc')  +'-'+  db('p_clasif') +'-'+   db('p_color')  +'-'+   db('p_descri') ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_disponible",
        F_ALIAS_ => "Cantidad disponible en Stock",
        F_HELP_ => "Cantidad disponible en Stock",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_cant from mnt_prod where p_cod ='+df_cod_prod.getVal() + ' and  prod_fin_pieza <> |{Si}| '",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "45",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "corr_cants2",
        F_ALIAS_ => "Corregir stock (Precionar Despues de cargar el Ultimo Prod.)",
        F_HELP_ => "Corregir cantidades de stock de esta remision",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update remito_det, mnt_prod set df_disponible = mnt_prod.p_cant where rem_nro = '+rem_nro.getVal()+' and df_cod_prod = mnt_prod.p_cod'",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "kg_env",
        F_ALIAS_ => "Kg Enviado",
        F_HELP_ => "Kg Enviado",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "47",
        C_VIEW_ => "false",
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
        F_BROW_ => "1",
        F_ORD_ => "48",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "enviado",
        F_ALIAS_ => "Enviado",
        F_HELP_ => "Marque Enviado si ya se envio el producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Enviado",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "sup['rem_origen']==__local.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "marcar",
        F_ALIAS_ => "Recibido",
        F_HELP_ => "Marca Recibido a elementos especificos",
        F_TYPE_ => "text",
        F_LENGTH_ => "9",
        F_DEC_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "200",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "enviado",
        F_ALIAS_ => "Enviado",
        F_HELP_ => "Marque Enviado si ya se envio el producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Enviado",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "sup['rem_origen']==__local.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "enviado",
        F_ALIAS_ => "Enviado",
        F_HELP_ => "Marque Enviado si ya se envio el producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Enviado",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "sup['rem_origen']==__local.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "enviado",
        F_ALIAS_ => "Enviado",
        F_HELP_ => "Marque Enviado si ya se envio el producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Enviado",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "sup['rem_origen']==__local.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "enviado",
        F_ALIAS_ => "Enviado",
        F_HELP_ => "Marque Enviado si ya se envio el producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Enviado",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "sup['rem_origen']==__local.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "enviado",
        F_ALIAS_ => "Enviado",
        F_HELP_ => "Marque Enviado si ya se envio el producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Enviado",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "sup['rem_origen']==__local.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_SHOW_ => "sup['rem_estado']!='Abierta'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "(df_local.get()=='__NO DATA__'||__local.get()!=df_local.get() )&&df_cod_prod.get()!=''",
        F_FORMULA_ => "'Producto No Encontrado en esta Sucursal o el Producto tiene fin de Pieza!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_count",
        F_ALIAS_ => "Verifica Duplicados",
        F_HELP_ => "Verifica Duplicados",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(id) from remito_det where df_cod_prod = '+df_cod_prod.getVal()+' and rem_nro ='+rem_nro.getVal()",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "df_count.getVal()>0",
        F_FORMULA_ => "'( ! ) Codigo Duplicado!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_SHOW_ => "df_count.getVal()>0||df_local.get()=='__NO DATA__'||__local.get()!=df_local.get()||f_dest.get()!='__NO DATA__'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__unlock",
        F_ALIAS_ => "Desbloquea el boton Insert/Accept",
        F_HELP_ => "Desbloqueael boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "(df_count.getVal()<1&&df_cod_prod.getVal()>0)&&__local.get()==df_local.get()&&f_dest.get()=='__NO DATA__' ",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mts_calc_env",
        F_ALIAS_ => "Mts Calc Env",
        F_HELP_ => "Mts Calc Env",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_ORD_ => "150",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mts_calc_rec",
        F_ALIAS_ => "Mts Calc Rec",
        F_HELP_ => "Mts Calc Rec",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_ORD_ => "160",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tara",
        F_ALIAS_ => "Tara",
        F_HELP_ => "Tara",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "170",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ajuste",
        F_ALIAS_ => "Ajuste",
        F_HELP_ => "Ajuste",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_DEC_ => "0",
        F_ORD_ => "180",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "auto_kg",        
        F_TYPE_ => "formula",   
		F_NODB_ => "1",
        F_ORD_ => "235",
        C_CHANGE_ => "df_datos_prod.hasChanged()",
        F_FORMULA_ => "edP = /(rectangular){1,3}.*(navidenho|estampado){1,3}/gi; if(edP.exec(db('p_tipo'))!==null){setValue('kg_env','1.000');setValue('kg_rec','1.000');setValue('enviado','Enviado');setValue('marcar','Recibido');}",		
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
		
?>
