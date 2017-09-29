<?php
$Obj->name = "mnt_cambio";
$Obj->alias = "Cambio";
$Obj->help = "Cambio  Diario";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_cambio";
$Obj->Filter = "";
$Obj->Sort = "cb_fecha DESC";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "cb_bloqueos",
        F_ALIAS_ => "Bloqueo",
        F_HELP_ => "Bloqueo de botones",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cb_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha del cambio",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "cb_mon",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda a determinar el cambio",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_monedas",
        F_SHOWFIELD_ => "m_nombre",
        F_FILTER_ => "'m_ref!=|{Si}|'",
        F_LENGTH_ => "3",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "cb_compra",
        F_ALIAS_ => "Compra",
        F_HELP_ => "Valor para Compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cb_compra FROM mnt_cambio WHERE cb_fecha<='+el['cb_fecha'].getStr()+' AND cb_mon='+el['cb_mon'].getStr()+' ORDER BY cb_fecha DESC'",
        F_QUERY_REF_ => "el['cb_mon'].hasChanged()||el['cb_fecha'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cb_venta",
        F_ALIAS_ => "Venta",
        F_HELP_ => "Valor para Venta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cb_venta FROM mnt_cambio WHERE cb_fecha<='+el['cb_fecha'].getStr()+' AND cb_mon='+el['cb_mon'].getStr()+' ORDER BY cb_fecha DESC'",
        F_QUERY_REF_ => "el['cb_mon'].hasChanged()||el['cb_fecha'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cb_verif",
        F_ALIAS_ => "Verifique",
        F_HELP_ => "Verifique si los datos están correctos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Ok",
        F_LENGTH_ => "2",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "45",
        C_SHOW_ => "el['cb_mon'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cb_actualiza",
        F_ALIAS_ => "Actualizar",
        F_HELP_ => "Actualizar las informaciones",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT mnt_cambio('+el['cb_fecha'].getStr()+','+el['cb_mon'].getStr()+','+el['cb_compra'].getStr()+','+el['cb_venta'].getStr()+');'",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "el['cb_verif'].get()=='Ok'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
