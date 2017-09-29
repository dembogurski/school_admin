<?php
$Obj->name = "repos_pos_venta";
$Obj->alias = "Reposicion de Codigos (Pos-Venta)";
$Obj->help = "Reposicion de Codigos (Pos-Venta)";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
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
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "12",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_factura",
        F_ALIAS_ => "Nro Factura",
        F_HELP_ => "Nro Factura",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "clie",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT fact_nom_cli, fact_localidad FROM  factura WHERE fact_nro = '+nro_factura.getVal()",
        F_QUERY_REF_ => "nro_factura.hasChanged()",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_suc",
        F_ALIAS_ => "Suc Venta",
        F_HELP_ => "Suc Venta",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "28",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('fact_localidad')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod000",
        F_ALIAS_ => "Codigos Indefinidos",
        F_HELP_ => "Codigos Indefinidos",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "nro_factura.hasChanged()",
        F_RELTABLE_ => "det_factura",
        F_SHOWFIELD_ => "concat(det_factura.id),concat(df_descrip,|{  Precio:  }|,df_precio,|{  Cantidad:  }|,df_cantidad )",
        F_FILTER_ => "'df_fact_num = '+nro_factura.getVal()+' and df_cod_prod = |{000}|'",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cantv",
        F_ALIAS_ => "Cantidad Vendida",
        F_HELP_ => "Cantidad Vendida",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select df_cantidad from det_factura where df_fact_num = '+nro_factura.getVal()+' and id = '+cod000.getVal()+' and df_cod_prod = |{000}|' ",
        F_QUERY_REF_ => "cod000.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "preocio_v",
        F_ALIAS_ => "Precio Venta",
        F_HELP_ => "Precio Venta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select df_precio from det_factura where df_fact_num = '+nro_factura.getVal()+' and id = '+cod000.getVal()+' and df_cod_prod = |{000}|' ",
        F_QUERY_REF_ => "cod000.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cat_v",
        F_ALIAS_ => "Categoria Venta",
        F_HELP_ => "Categoria Venta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT fact_cli_cat FROM factura WHERE factura.fact_nro = '+nro_factura.getVal()+' '",
        F_QUERY_REF_ => "cod000.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codremp",
        F_ALIAS_ => "Codigo de Remplazo",
        F_HELP_ => "Codigo de Remplazo",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prod_descrip",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Desciprcion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(p_fam,|{ - }|, p_grupo,|{ - }|,p_tipo,|{ - }|, p_color), p_local, p_cant,prod_fin_pieza from mnt_prod where p_cod = '+codremp.getStr()",
        F_QUERY_REF_ => "codremp.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "55",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc_prod",
        F_ALIAS_ => "Suc. Prod",
        F_HELP_ => "Sucursal del Producto Actualmente",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "56",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('p_local')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prod_cant",
        F_ALIAS_ => "Cantidad actual",
        F_HELP_ => "Cantidad actual",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "57",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "precio_prod",
        F_ALIAS_ => "Precio del producto",
        F_HELP_ => "Precio del producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_'+cat_v.getVal()+' FROM mnt_prod WHERE p_cod = '+codremp.getStr()",
        F_QUERY_REF_ => "codremp.hasChanged()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "57",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgc",
        F_ALIAS_ => " < ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "46",
        F_NODB_ => "1",
        F_ORD_ => "58",
        F_INLINE_ => "1",
        C_SHOW_ => "prod_cant.get()!=''&&prod_cant.getVal()<=0",
        F_FORMULA_ => "'Stock insuficiente!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg_p",
        F_ALIAS_ => " < ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "104",
        F_NODB_ => "1",
        F_ORD_ => "58",
        F_INLINE_ => "1",
        C_SHOW_ => "precio_prod.getVal()>0&&(preocio_v.getVal()-precio_prod.getVal()<0)",
        F_FORMULA_ => "'Precio de venta no corresponde a la categoria! Verifique si el precio esta correcto antes de Remplazar'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desc",
        F_ALIAS_ => "( ! ) Descuento:",
        F_HELP_ => "Descuento",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "59",
        C_SHOW_ => "precio_prod.getVal()>0&&(preocio_v.getVal()-precio_prod.getVal()<0)",
        F_FORMULA_ => "(precio_prod.getVal() * cantv.getVal()) - ( preocio_v.getVal() * cantv.getVal() )",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg_p2",
        F_ALIAS_ => " < ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "104",
        F_NODB_ => "1",
        F_ORD_ => "59",
        F_INLINE_ => "1",
        C_SHOW_ => "precio_prod.getVal()>0&&(preocio_v.getVal()-precio_prod.getVal()<0)",
        F_FORMULA_ => "'Remplazando esta pieza corre el riesgo de llevarse un descuento en el Premio'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prod_fp",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_FORMULA_ => "db('prod_fin_pieza')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgp",
        F_ALIAS_ => " < ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "46",
        F_NODB_ => "1",
        F_ORD_ => "61",
        F_INLINE_ => "1",
        C_SHOW_ => "prod_fp.get()!=''&&prod_fp.get()=='Si'",
        F_FORMULA_ => "'Producto con Fin de Pieza!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "conf",
        F_ALIAS_ => "Confirme el Remplazo de la pieza",
        F_HELP_ => "Confirme el Remplazo de la pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "65",
        C_SHOW_ => "codremp.getVal()>0&&fact_suc.get()==__local.get()&&fact_suc.get()==suc_prod.get()&&prod_cant.getVal()>0&&prod_fp.get()!='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "finalizar_trans",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update det_factura set df_cod_prod = '+codremp.getVal()+' where df_fact_num = '+nro_factura.getVal()+' and id = '+cod000.getVal()+' '",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_SHOW_ => "conf.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desc_stock",
        F_ALIAS_ => "Descontar del Stock",
        F_HELP_ => "Descontar del Stock",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update mnt_prod set p_cant = p_cant - '+cantv.getVal()+' where p_cod = '+codremp.getStr()+' '",
        F_QUERY_REF_ => "finalizar_trans.get()&&desc_stock.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_SHOW_ => "finalizar_trans.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "set_log",
        F_ALIAS_ => "Descontar del Stock",
        F_HELP_ => "Descontar del Stock",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'insert into _audit_log_(usuario,fecha,hora,accion,descrip,x0_,x1_,y0_,y1_,y2_,y3_)values(|{'+p_user_+'}|,current_date,current_time,|{REM000}|,|{Remplazo 000}|,'+nro_factura.getVal()+','+codremp.getStr()+','+cantv.getVal()+' ,'+preocio_v.getVal()+','+precio_prod.getVal()+','+desc.getVal()+')'",
        F_QUERY_REF_ => "finalizar_trans.get()&&set_log.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_SHOW_ => "finalizar_trans.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "finalizar_trans.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',800)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "46",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "__local.get()!=fact_suc.get()&&fact_suc.get()!=''",
        F_FORMULA_ => "'Esta factura no pertenece a su sucursal!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg2",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "70",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "suc_prod.get()!=fact_suc.get()&&fact_suc.get()!=''&&suc_prod.get()!=''",
        F_FORMULA_ => "'El codigo a reemplazar no se encuentra en la sucursal de venta!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msg}|).setAttribute(|{style}|,|{height:45px;color:red;font-size:24px;}|);  ",
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
        F_FORMULA_ => "document.getElementById(|{msg2}|).setAttribute(|{style}|,|{height:40px;color:red;font-size:18px;}|);  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style3",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msgc}|).setAttribute(|{style}|,|{color:red;font-size:12px;}|);  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style4",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msgp}|).setAttribute(|{style}|,|{color:red;font-size:12px;}|);  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style5",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msg_p}|).setAttribute(|{style}|,|{color:red;font-size:12px;}|); document.getElementById(|{msg_p2}|).setAttribute(|{style}|,|{color:red;font-size:12px;}|); ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
