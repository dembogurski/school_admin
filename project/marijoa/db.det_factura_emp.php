<?php
$Obj->name = "det_factura_emp";
$Obj->alias = "Detalle de Factura Empaque";
$Obj->help = "Detalle de Factura";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "det_factura";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "1";
$Obj->p_change = "";
$Obj->p_delete = "'select actualizar_factura('+df_fact_num.getVal()+','+df_vendedor.getStr()+')'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_renglon",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº de Renglon",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT COUNT(*) + 1 FROM det_factura WHERE df_fact_num ='+df_fact_num.getVal() ",
        F_QUERY_REF_ => "df_renglon.firstSQL&&operation==INSERT_",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        F_NODB_ => "1",
        F_ORD_ => "11",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        C_VIEW_ => "false",
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
        F_ORD_ => "13",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "C%uFFFDdigo del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "14",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_ ",
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
        F_ORD_ => "20",
        C_VIEW_ => "true",
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
        F_QUERY_ => "'select p.p_valmin, p.p_grupo,p.p_tipo, p.p_color,p.p_fam, p.p_descri, p.p_estruc, p.p_lisoest, p.prod_fin_pieza, p_local from mnt_grupo g, mnt_clasif cl ,mnt_prod p where  p.p_cod = '+df_cod_prod.getVal()+' and p.prod_fin_pieza <> |{Si}| '",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()||(operation==CHANGE_&&df_datos_prod.firstSQL)",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "30",
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
        F_NAME_ => "df_precio",
        F_ALIAS_ => "Precio del Producto",
        F_HELP_ => "Precio del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_'+sup['fact_cli_cat']+' FROM mnt_prod WHERE p_cod ='+df_cod_prod.getStr() ",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_disponible",
        F_ALIAS_ => "Cantidad disponible en Stock",
        F_HELP_ => "Cantidad disponible en Stock",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_cant from mnt_prod where p_cod ='+df_cod_prod.getVal() ",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()||(operation==CHANGE_&&df_disponible.firstSQL)",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "55",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        F_ORD_ => "60",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_cant_corte",
        F_ALIAS_ => "Cantidad Cortada",
        F_HELP_ => "Cantidad Cortada",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "62",
        F_INLINE_ => "1",
        C_SHOW_ => "(sup['fact_estado']=='En_caja'||sup['fact_estado']=='Cerrada')&&sup['fact_empaque']=='No'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_cant",
        F_ALIAS_ => "Cantidad a Ajustar",
        F_HELP_ => "Cantidad a Ajustar",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "63",
        F_INLINE_ => "1",
        C_SHOW_ => "(sup['fact_estado']=='En_caja'||sup['fact_estado']=='Cerrada')&&df_cant_corte.get()!='0'",
        C_VIEW_ => "false",
        C_CHANGE_ => "df_cant_corte.hasChanged()",
        F_FORMULA_ => "if(df_cantidad.getVal() > df_cant_corte.getVal() ){  df_cantidad.getVal() - df_cant_corte.getVal()    }else { df_cant_corte.getVal() - df_cantidad.getVal()  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_oper",
        F_ALIAS_ => "Operacion",
        F_HELP_ => "Operacion",
        F_TYPE_ => "formula",
        F_OPTIONS_ => " ",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "64",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "if(df_cantidad.getVal() > df_cant_corte.getVal() ){  'Aumento en Salida'   }else { 'Disminucion en Salida'  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_monto_desc",
        F_ALIAS_ => "Monto a descontar",
        F_HELP_ => "Monto a descontar (Si corta mas de lo debido)",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "df_precio.getVal()*df_cant.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_ajuste",
        F_ALIAS_ => "Ajuste por:",
        F_HELP_ => "Tipo Ajuste",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Descuento por Falla,Descuento por Fin de Pieza,Mal Corte",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        C_SHOW_ => "(sup['fact_estado']=='En_caja'||sup['fact_estado']=='Cerrada')&&df_cant_corte.getVal()>0&&(df_cant.getVal()>0  )",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_ajustar",
        F_ALIAS_ => "Ajustar",
        F_HELP_ => "Ajustar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select ajust_stock_desconta('+df_vendedor.getStr()+', '+df_cod_prod.getVal()+','+ df_fact_num.getVal()+','+df_cant.getVal()+','+df_oper.getStr()+','+__user.getStr()+','+df_monto_desc.getVal()+','+tipo_ajuste.getStr()+','+__local.getStr()+','+df_cantidad.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "66",
        F_INLINE_ => "1",
        C_SHOW_ => "(sup['fact_estado']=='En_caja'||sup['fact_estado']=='Cerrada')&&df_cant_corte.getVal()>0&&(df_cant.getVal()>0  )",
        C_VIEW_ => "!df_ajustar.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_revis",
        F_ALIAS_ => "Revisado",
        F_HELP_ => "Revisado",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update det_factura set df_estado =|{Revisado}| where df_fact_num = '+df_fact_num.getVal()+' and df_cod_prod = '+df_cod_prod.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "66",
        F_INLINE_ => "1",
        C_SHOW_ => "df_cant_corte.getVal()==df_cantidad.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "115",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_re_lock2",
        F_ALIAS_ => "Re bloqueo",
        F_HELP_ => "Re bloqueo",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "155",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(  operation==CHANGE_  ){   disableAcceptButton()   }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goBack2",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_SHOW_ => "df_ajustar.get()||df_revis.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('self.close()',200);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__change",
        F_ALIAS_ => "Cambia la Operacion",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "166",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "operation=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
