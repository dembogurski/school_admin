<?php
$Obj->name = "det_factura_ins";
$Obj->alias = "Detalle de Factura";
$Obj->help = "Detalle de Factura";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "det_factura";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "100";
$Obj->Add(
    array(
        F_NAME_ => "df_fact_num",
        F_ALIAS_ => "Nº de Factura",
        F_HELP_ => "Nº de Factura",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_REQUIRED_ => "1",
        F_ORD_ => "7",
        F_FORMULA_ => "sup['fact_nro']",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_renglon",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº de Renglon",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT COUNT(*) + 1 FROM det_factura WHERE df_fact_num ='+df_fact_num.getVal() ",
        F_QUERY_REF_ => "df_renglon.firstSQL",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_limit",
        F_ALIAS_ => "Limite de Venta Para Liberar Precios",
        F_HELP_ => "Limite de Venta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_limit from adm_param'",
        F_QUERY_REF_ => "df_limit.firstSQL",
        F_LOCALFIELD_ => "df_renglon",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_vendedor",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Vendedor",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_vend_cod from factura where fact_nro = '+df_fact_num.getVal()",
        F_QUERY_REF_ => "df_vendedor.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

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
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_ ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_concept_vta",
        F_ALIAS_ => "Concepto de Venta",
        F_HELP_ => "Concepto de Venta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Venta,Descuento",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        G_SHOW_ => "238",
        G_CHANGE_ => "288"));

$Obj->Add(
    array(
        F_NAME_ => "df_cod_prod",
        F_ALIAS_ => "Código de Producto",
        F_HELP_ => "Código de Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "df_concept_vta.get()!='Descuento'",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_fact_estado",
        F_ALIAS_ => "Estado Factura",
        F_HELP_ => "Estado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_estado from factura where fact_nro = '+df_fact_num.getVal()",
        F_QUERY_REF_ => "df_fact_estado.firstSQL||df_cod_prod.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_SHOW_ => "df_cod_prod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_datos_prod",
        F_ALIAS_ => "Obtiene datos del Producto",
        F_HELP_ => "Obtiene datos del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.p_valmin,p.p_precio_5,p.p_precio_4, p.p_grupo,p.p_tipo, p.p_color,p.p_fam, p.p_descri, p.p_estruc, p.p_lisoest, p.prod_fin_pieza, p_local from mnt_grupo g, mnt_clasif cl ,mnt_prod p where  p.p_cod like '+df_cod_prod.getStr()+' and p.prod_fin_pieza <> |{Si}| limit 1 '",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()||(operation==CHANGE_&&df_datos_prod.firstSQL)",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

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
        C_CHANGE_ => "false",
        F_FORMULA_ => "if( df_concept_vta.get()=='Venta'  ){ if( df_datos_prod.get()!='__NO DATA__'){ db('p_grupo')+'-'+db('p_tipo')+'-'+db('p_color')+'-'+db('p_descri') }else{'Codigo NO EXISTE!!! '} } else if( df_concept_vta.get()=='Devolucion' ){'Devolucion'}  else  {'Descuento'} ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_p_valmin",
        F_ALIAS_ => "Precio Minimo",
        F_HELP_ => "Precio minimo ficticio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_'+sup['fact_cli_cat']+' FROM mnt_prod WHERE p_cod ='+df_cod_prod.getStr() ",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "52",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_disponible",
        F_ALIAS_ => "Cantidad disponible en Stock",
        F_HELP_ => "Cantidad disponible en Stock",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_cant from mnt_prod where p_cod ='+df_cod_prod.getVal() ",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()||(operation==CHANGE_&&df_disponible.firstSQL)",
        F_LENGTH_ => "9",
        F_NODB_ => "1",
        F_ORD_ => "55",
        C_VIEW_ => "df_concept_vta.get()!='Descuento'",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_fin_piez",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select prod_fin_pieza from mnt_prod where p_cod ='+df_cod_prod.getVal() ",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "56",
        F_INLINE_ => "1",
        C_VIEW_ => "df_cod_prod.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_local_prod",
        F_ALIAS_ => "Local del Producto",
        F_HELP_ => "Local del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_local from mnt_prod where p_cod ='+df_cod_prod.getVal() ",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "57",
        F_INLINE_ => "1",
        C_SHOW_ => "df_cod_prod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_cantidad",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad vendida",
        F_TYPE_ => "text",
        F_LENGTH_ => "9",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "df_concept_vta.get()!='Descuento'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_precio_minim",
        F_ALIAS_ => "Precio Minimo P/Cliente",
        F_HELP_ => "Precio Minimo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "65",
        C_SHOW_ => "df_cod_prod.getVal()>0",
        C_VIEW_ => "true",
        F_FORMULA_ => "   if (sup['fact_cli_cat'] == 3){   if( df_cantidad.getVal() >= df_limit.getVal() ){ db('p_precio_4')  }else{ df_p_valmin.getVal() }}else{   df_p_valmin.getVal()    }  ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_precio",
        F_ALIAS_ => "Precio del Producto",
        F_HELP_ => "Precio del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_'+sup['fact_cli_cat']+' FROM mnt_prod WHERE p_cod = '+df_cod_prod.getStr() ",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "66",
        C_VIEW_ => "df_concept_vta.get()=='Venta'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_confirmar",
        F_ALIAS_ => "Marcar como Fin de Pieza",
        F_HELP_ => "Marcar como Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "68",
        F_INLINE_ => "1",
        C_SHOW_ => "df_fin_piez.get()=='No'||df_fin_piez.get()=='R'",
        C_VIEW_ => "df_cantidad.getVal()>0",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_fin_pieza",
        F_ALIAS_ => "Marcar como Final de Pieza ",
        F_HELP_ => "Marcar ",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set prod_fin_pieza = |{Si}|  where p_cod = '+df_cod_prod.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "69",
        F_INLINE_ => "1",
        C_SHOW_ => "df_confirmar.get()=='Si'&&!df_fin_pieza.get()",
        C_VIEW_ => "df_local_prod.get()==__local.get()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "_msgok",
        F_ALIAS_ => "Ok",
        F_HELP_ => "Ok",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_SHOW_ => "df_fin_pieza.get()",
        C_VIEW_ => "true",
        F_FORMULA_ => "'Marcado con fin de Pieza'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_subtotal",
        F_ALIAS_ => "Subtotal",
        F_HELP_ => "Subtotal",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "df_cantidad.hasChanged() || df_precio.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "71",
        F_FORMULA_ => "if(df_concept_vta.get()=='Venta'){df_precio.getVal() * df_cantidad.getVal()} else if(df_concept_vta.get()=='Devolucion'){ 0 }  else{-df_descuento.getVal()}",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_total_fact",
        F_ALIAS_ => "TOTAL DE VENTA",
        F_HELP_ => "TOTAL DE VENTA",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(df_subtotal) from det_factura WHERE df_fact_num = '+df_fact_num.getVal()",
        F_QUERY_REF_ => "df_fact_num.get()!=''&&df_total_fact.firstSQL",
        F_RELTABLE_ => "det_factura",
        F_RELFIELD_ => "df_fact_num",
        F_LOCALFIELD_ => "df_fact_num",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "75",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_promo",
        F_ALIAS_ => "PROMO PRIMAVERA EN MARIJOA!",
        F_HELP_ => "PROMO",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.promo_primavera",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_SHOW_ => "sup['fact_cli_cat'] < 0 && df_total_fact.getVal() > 0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "df_precio.getVal() < df_precio_minim.getVal() ",
        F_FORMULA_ => "'( ! ) Precio bajo minimo!!! '",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "df_verif",
        F_ALIAS_ => "Verifica duplicados",
        F_HELP_ => "Verifica duplicados",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from det_factura where df_cod_prod = '+df_cod_prod.getVal()+' and df_fact_num = '+df_fact_num.getVal()+' limit 1' ",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()&&df_cod_prod.getVal()>0",
        F_NODB_ => "1",
        F_ORD_ => "135",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_POSVAL_ => "df_verif.getVal()<1",
        F_MESSAGE_ => "'Código de Producto duplicado!!!'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "check0",
        F_ALIAS_ => "Verifica Precios",
        F_HELP_ => "Verifica Precios",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "136",
        C_SHOW_ => "df_cod_prod.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "df_precio.getVal() >= df_precio_minim.getVal()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "check1",
        F_ALIAS_ => "Verifica Cantidades",
        F_HELP_ => "Verifica Cantidadades",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "136",
        C_SHOW_ => "df_cod_prod.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "( df_disponible.getVal()-df_cantidad.getVal() ) >= -5000  ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "145",
        C_SHOW_ => "df_cod_prod.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( (df_verif.getVal() < 1) && check0.get() &&  check1.get() && df_fin_piez.get() != 'Si'  && df_precio.getVal()>0 && df_cantidad.getVal()>0  && df_local_prod.get()==__local.get()){ enableAcceptButton() }else{disableAcceptButton()} ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__log",
        F_ALIAS_ => "Make Log",
        F_HELP_ => "Make Log",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'insert into prod_fdp(id, usuario, fecha, hora, accion, descrip, suc, grupo, tipo,stockf,codigo)values(default,|{'+p_user_+'}|,current_date,current_time,|{FDP}|,|{'+df_cod_prod.getVal()+'  Fact Nro:'+df_fact_num.getVal()+' Disp: '+df_disponible.getVal()+' Cant. Vend: '+df_cantidad.getVal()+' }|,|{'+__local.get()+'}|,|{'+db('p_grupo')+'}|, |{'+db('p_tipo')+'}|, '+stockf.getVal()+','+df_cod_prod.getVal()+'  );'",
        F_QUERY_REF_ => "df_fin_pieza.get()&&__log.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "155",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "stockf",
        F_ALIAS_ => "stockf",
        F_HELP_ => "stockf",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_SHOW_ => "df_fact_estado.get()=='Abierta'",
        C_VIEW_ => "false",
        F_FORMULA_ => "df_disponible.getVal()-df_cantidad.getVal() ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__lock0",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_SHOW_ => "(df_fact_estado.get()!='Abierta'&&df_fact_estado.get()!='Presup')||stockf.getVal()<0",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_SHOW_ => "df_fact_estado.get()!='Abierta'&&df_fact_estado.get()!=''&&df_fact_estado.get()!='Presup'",
        F_FORMULA_ => "'( ! ) Esta factura se encuentra en '+df_fact_estado.get()+' no puede volver a cargar...'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "175",
        C_SHOW_ => "df_fact_estado.get()!='Abierta'&&df_fact_estado.get()!=''&&stockf.getVal()>=0",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

?>
