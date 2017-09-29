<?php
$Obj->name = "inv_confec";
$Obj->alias = "Inventario Confecciones";
$Obj->help = "Inventario Confecciones";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "inv_confec";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'SELECT ins_confec('+c_tela.getStr()+','+c_precio_costo.getVal()+','+c_cant.getVal()+','+c_codigo.getVal()+','+c_ref.getVal()+',|{insert}|)'";
$Obj->p_change = "'SELECT ins_confec('+c_tela.getStr()+','+c_precio_costo.getVal()+','+c_cant.getVal()+','+c_codigo.getVal()+','+c_ref.getVal()+',|{change}|)'";
$Obj->p_delete = "'SELECT ins_confec('+c_tela.getStr()+','+c_precio_costo.getVal()+','+c_cant.getVal()+','+c_codigo.getVal()+','+c_ref.getVal()+',|{delete}|)'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "c_ref",
        F_ALIAS_ => "Ref",
        F_HELP_ => "Referencia ",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_ORD_ => "2",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock_un",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        F_FORMULA_ => "if((c_cant.getVal()> 0 && p_cant.getVal()>0 && c_medida.getVal()>0) && (c_cant.getVal() <= p_cant.getVal()) && (p_suc.get()==__local.get()) ){ enableAcceptButton() } else { disableAcceptButton() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_interno",
        F_ALIAS_ => "Interno",
        F_HELP_ => "Número Interno",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "4",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_factura",
        F_ALIAS_ => "Factura",
        F_HELP_ => "Factura de compra",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_factura",
        F_RELFIELD_ => "p_cod",
        F_LOCALFIELD_ => "c_codigo",
        F_LENGTH_ => "20",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_user",
        F_ALIAS_ => "usuario",
        F_HELP_ => "usuario",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC:",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_tela",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion de La Tela entregada",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "concat(p_grupo,|{-}|,p_tipo,|{-}|,p_color,|{-}|,p_descri)",
        F_RELFIELD_ => "p_cod",
        F_LOCALFIELD_ => "c_codigo",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant",
        F_ALIAS_ => "Cantidad Actual",
        F_HELP_ => "Stock Actual en Metros",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_cant",
        F_RELFIELD_ => "p_cod",
        F_LOCALFIELD_ => "c_codigo",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_ORD_ => "54",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_suc",
        F_ALIAS_ => "Sucursal Actual",
        F_HELP_ => "Sucursal Actual del Producto",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_local",
        F_RELFIELD_ => "p_cod",
        F_LOCALFIELD_ => "c_codigo",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cant",
        F_ALIAS_ => "Cant. a Entregar.",
        F_HELP_ => "Cantidad en Mestros",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_medida",
        F_ALIAS_ => "Medida",
        F_HELP_ => "Medida",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "1",
        F_BROW_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cant_est",
        F_ALIAS_ => "Cant. Estimada",
        F_HELP_ => "Cant. Estimada",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_DEC_ => "1",
        F_BROW_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        F_FORMULA_ => "c_cant.getVal()/c_medida.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_precio_costo",
        F_ALIAS_ => "Precio Costo",
        F_HELP_ => "Precio Costo de La mercaderia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT  p_compra + ((p_compra * p_porc_recargo ) / 100)   FROM mnt_prod WHERE p_cod = '+c_codigo.getVal()",
        F_QUERY_REF_ => "c_codigo.hasChanged()",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "90",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
