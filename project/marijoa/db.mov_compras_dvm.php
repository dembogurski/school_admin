<?php
$Obj->name = "mov_compras_dvm";
$Obj->alias = "Devolucion de Productos (Proveedores)";
$Obj->help = "Devolucion de Productos (Proveedores)";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mov_compras_dev";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'select ajuste_dev('+c_ref.getStr()+','+c_cod.getStr()+','+c_cant.getVal()+','+__user.getStr()+','+ c_motivo.getStr()+',|{-}|)' ";
$Obj->p_change = "";
$Obj->p_delete = "'select ajuste_dev('+c_ref.getStr()+','+c_cod.getStr()+','+c_cant.getVal()+','+__user.getStr()+','+ c_motivo.getStr()+',|{+}|)' ";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "c_ref",
        F_ALIAS_ => "Nro Referencia",
        F_HELP_ => "Referencia ",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "text",
        F_RELTABLE_ => "mnt_func",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_prov",
        F_ALIAS_ => "Codigo Proveedor",
        F_HELP_ => "Vefif",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select c.c_prov from mov_compras c where c_ref ='+c_ref.getStr()",
        F_QUERY_REF_ => "c_ref.hasChanged()",
        F_LENGTH_ => "8",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha actual",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_ORD_ => "18",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Codigo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "c_ref.hasChanged()",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_cod,concat(p_fam,|{-}|, p_grupo,|{-}|, p_tipo,|{-}|, p_comp,|{-}|, p_temp,|{-}|, p_estruc,|{-}|, p_clasif,|{-}|, p_color)",
        F_FILTER_ => "'p_ref ='+c_ref.getStr()",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        C_SHOW_ => "c_ref.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_count",
        F_ALIAS_ => "Vefificacion",
        F_HELP_ => "Vefif",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from mov_compras_dev where c_cod = '+c_cod.getStr()",
        F_QUERY_REF_ => "c_cod.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "25",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fechafac",
        F_ALIAS_ => "Fecha Factura",
        F_HELP_ => "Fecha factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  DATE_FORMAT(c.c_fechafac,|{%d-%m-%Y}|),c_moneda,c_cambio  from mov_compras c where c_ref ='+c_ref.getStr()+' or c_factura = '+c_ref.getStr()+'  limit 1'",
        F_QUERY_REF_ => "c_ref.hasChanged()",
        F_BROW_ => "1",
        F_ORD_ => "28",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cantc",
        F_ALIAS_ => "Cantidad Comprada",
        F_HELP_ => "Cantidad Comprada",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_cant_compra from mnt_prod  where p_cod = '+c_cod.getStr()",
        F_QUERY_REF_ => "c_cod.hasChanged()",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_precio",
        F_ALIAS_ => "Precio",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_compra from mnt_prod where p_cod='+c_cod.getStr()",
        F_QUERY_REF_ => "c_cod.hasChanged()",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_valor",
        F_ALIAS_ => "Valor",
        F_HELP_ => "Valor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "c_cantc.getVal()*c_precio.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cant",
        F_ALIAS_ => "Cantidad a Devolver",
        F_HELP_ => "Cantidad en Mestros a Devolver",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "100",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_mon",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_ORD_ => "102",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cot",
        F_ALIAS_ => "Cotiz",
        F_HELP_ => "Cotiz",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_ORD_ => "103",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_valor_dev",
        F_ALIAS_ => "Valor Devolucion",
        F_HELP_ => "Valor de Devolucion",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "105",
        F_INLINE_ => "1",
        F_FORMULA_ => "(c_cant.getVal()*c_precio.getVal()) / c_cot.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_motivo",
        F_ALIAS_ => "Motivo",
        F_HELP_ => "Motivo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Por Falla de Material,Por Faltante de metraje,No corresponde al pedido,Por Canje,Por Diferencia de Precio",
        F_REQUIRED_ => "1",
        F_ORD_ => "106",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "90",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "c_count.getVal()>0",
        F_FORMULA_ => "'( ! ) Este codigo ya ha sido Insertado como devolucion...' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "c_count.getVal()>0||c_cant.getVal()<0.01||(c_cant.getVal()>c_cantc.getVal())",
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
        F_ORD_ => "130",
        C_SHOW_ => "c_count.getVal()<1&&c_cant.getVal()>0&&(c_cant.getVal()<=c_cantc.getVal())",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "c_cant.getVal()>c_cantc.getVal()",
        F_FORMULA_ => "'( ! ) No se deberia poder devolver mas de lo que se compro!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado de la Devolucion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente",
        F_BROW_ => "1",
        F_ORD_ => "150",
        C_CHANGE_ => "false",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "c_mult",
        F_ALIAS_ => "Pago Multiple",
        F_HELP_ => "Utilizar para pago multiple",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si",
        F_BROW_ => "1",
        F_ORD_ => "170",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
