<?php
$Obj->name = "det_factura_dis";
$Obj->alias = "Detalle de Factura";
$Obj->help = "Detalle de Factura";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "det_factura";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'SELECT corr_det_factura('+df_fact_num.getVal()+','+df_cod_prod.getStr()+','+df_catX.getStr()+','+tipo_fact.getStr()+')'";
$Obj->p_change = "'SELECT corr_det_factura('+df_fact_num.getVal()+','+df_cod_prod.getStr()+','+df_catX.getStr()+','+tipo_fact.getStr()+')'";
$Obj->p_delete = "'SELECT corr_det_factura('+df_fact_num.getVal()+','+df_cod_prod.getStr()+','+df_catX.getStr()+','+tipo_fact.getStr()+')'";
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
        F_ORD_ => "8",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['__local']",
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
        F_QUERY_REF_ => "df_renglon.firstSQL",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_fact",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "tipo_fact",
        F_TYPE_ => "formula",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['tipo_fact']",
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
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
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
        F_INLINE_ => "1",
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
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Codigo del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_fact_estado",
        F_ALIAS_ => "Estado Factura",
        F_HELP_ => "Estado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_estado from factura where fact_nro = '+df_fact_num.getVal()",
        F_QUERY_REF_ => "df_fact_estado.firstSQL",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_SHOW_ => "df_cod_prod.get()!=''",
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
        F_QUERY_ => "'select p.p_valmin, p.p_grupo,p.p_tipo, p.p_color,p.p_fam, p.p_descri, p.p_estruc, p.p_lisoest, p.prod_fin_pieza, p_local from mnt_prod p where  p.p_cod = '+df_cod_prod.getVal()+'   and p.p_local = '+suc.getStr()",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()||(operation==CHANGE_&&df_datos_prod.firstSQL)",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        F_ORD_ => "32",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_POSVAL_ => "df_verif.getVal()<1",
        F_MESSAGE_ => "'Código de Producto duplicado!!!'",
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
        C_CHANGE_ => "false",
        F_FORMULA_ => "db('p_grupo')+'-'+db('p_tipo')+'-'+db('p_color')+'-'+db('p_descri')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_fdp",
        F_ALIAS_ => "FDP",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select   p.prod_fin_pieza  from mnt_prod p where  p.p_cod = '+df_cod_prod.getVal()+' '",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()||(operation==CHANGE_&&df_fdp.firstSQL)",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "41",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_disp",
        F_ALIAS_ => "Disponibilidad",
        F_HELP_ => "Disponibilidad",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select   p.p_cant  from mnt_prod p where  p.p_cod = '+df_cod_prod.getVal()+' '",
        F_QUERY_REF_ => "df_cod_prod.hasChanged()||(operation==CHANGE_&&df_disp.firstSQL)",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "41",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "formula",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "40",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "42",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "db('p_grupo')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "formula",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "40",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "42",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "db('p_tipo')",
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
        F_TOTAL_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct",
        F_ALIAS_ => "Cantidad Total",
        F_HELP_ => "Cantidad Total",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(df_cantidad) FROM det_factura d, mnt_prod p WHERE d.df_cod_prod = p.p_cod AND  p.p_grupo = '+df_grupo.getStr()+' AND p.p_tipo =  '+df_tipo.getStr()+'  AND  d.df_fact_num = '+df_fact_num.getVal()+' and df_cod_prod <> '+df_cod_prod.getVal()",
        F_QUERY_REF_ => "df_cantidad.hasChanged()&&df_cantidad.getVal()>0||operation==CHANGE_ ",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "63",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctf",
        F_ALIAS_ => "Total + Actual x Grupo y Tipo",
        F_HELP_ => "CTF",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "64",
        F_INLINE_ => "1",
        F_FORMULA_ => "ct.getVal() + df_cantidad.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ctfb",
        F_ALIAS_ => "Total Detalle - Actual (Para Borrar)",
        F_HELP_ => "CTF",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "64",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "ct.getVal() - df_cantidad.getVal() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "65",
        C_SHOW_ => "df_cantidad.getVal() > df_disp.getVal()",
        F_FORMULA_ => "'( ! ) CUIDADO Cantidad ingresada mayor a la Disponibilidad Verifique!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_precioMin",
        F_ALIAS_ => "Precio Minimo",
        F_HELP_ => "Precio Minimo hasta donde se puede bajar",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT precioX('+df_cod_prod.getStr()+','+ctf.getVal()+','+df_fact_num.getVal()+')'",
        F_QUERY_REF_ => "df_cantidad.hasChanged()||operation==CHANGE_&&df_precioMin.firstSQL",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "66",
        C_VIEW_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_precio",
        F_ALIAS_ => "Precio del Producto",
        F_HELP_ => "Precio del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT precioX('+df_cod_prod.getStr()+','+ctf.getVal()+','+df_fact_num.getVal()+')'",
        F_QUERY_REF_ => "df_cantidad.hasChanged()||operation==CHANGE_&&ct.get()!=''&&df_precio.firstSQL",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "66",
        F_INLINE_ => "1",
        C_VIEW_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_catX",
        F_ALIAS_ => "Cat.",
        F_HELP_ => "Precio del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT catX('+df_cod_prod.getStr()+','+ctf.getVal()+','+df_fact_num.getVal()+')'",
        F_QUERY_REF_ => "df_cantidad.hasChanged()||operation==CHANGE_&&ct.get()!=''&&df_catX.firstSQL",
        F_LENGTH_ => "10",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "67",
        F_INLINE_ => "1",
        C_VIEW_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        F_FORMULA_ => "df_precio.getVal() * df_cantidad.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "145",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( df_precio.getVal()>0 && df_cantidad.getVal()>0 && df_precioMin.getVal()<= df_precio.getVal()  && (df_cantidad.getVal()<= df_disp.getVal())  ){ enableAcceptButton() }else{ disableAcceptButton() } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock0",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_SHOW_ => "df_fact_estado.get()!='Abierta'||df_descrip.get()=='---'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_SHOW_ => "df_fact_estado.get()!='Abierta'&&df_fact_estado.get()!=''",
        F_FORMULA_ => "'( ! ) Esta factura se encuentra en '+df_fact_estado.get()+' no puede volver a cargar...'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "175",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
