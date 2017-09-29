<?php
$Obj->name = "cheq_tercerosv";
$Obj->alias = "Cheques de Terceros";
$Obj->help = "Cheques de Terceros";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cheq_terceros";
$Obj->Filter = "";
$Obj->Sort = "id, chq_fecha_pag DESC";
$Obj->p_insert = "'update cheq_terceros set chq_recibido2 = |{Recibido}| where chq_ref = '+chq_ref.getStr()+' and chq_num = '+chq_num.getStr()+' and chq_fecha_pag = current_date'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "chq_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_REQUIRED_ => "1",
        F_ORD_ => "3",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_REQUIRED_ => "1",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_num",
        F_ALIAS_ => "Numero",
        F_HELP_ => "Numero del cheque",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_nombre_de",
        F_ALIAS_ => "Nombre de ",
        F_HELP_ => "Nombre de ",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "100",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "25",
        F_FORMULA_ => "if(operation==INSERT_){ sup['n_deudor'] }else{ chq_nombre_de.get() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_emis",
        F_ALIAS_ => "Fecha Emision",
        F_HELP_ => "Fecha Emision",
        F_TYPE_ => "date",
        F_QUERY_REF_ => "chq_fecha_emis.firstSQL",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "chq_estado.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_pag",
        F_ALIAS_ => "Fecha Limite cobro",
        F_HELP_ => "Fecha Limite cobro del cheque",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_valor",
        F_ALIAS_ => "Valor",
        F_HELP_ => "Valor del cheque",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda utilizada",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_cotiz",
        F_ALIAS_ => "Cotizacion del dia",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+chq_moneda.getStr()+');'",
        F_QUERY_REF_ => "chq_moneda.hasChanged()||chq_cotiz.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_ORD_ => "68",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_moneda_ref",
        F_ALIAS_ => "Monto (Ref) ",
        F_HELP_ => "Monto (Moneda Referencia) ",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_CHANGE_ => "chq_valor.hasChanged()||chq_cotiz.hasChanged()",
        F_FORMULA_ => "chq_cotiz.getVal()*chq_valor.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Obtiene Localidad",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "85",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Obtiene Nro de caja Abierta de esta Suc",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ __local.getStr() +' AND cj_estado=|{Abierto}|'",
        F_QUERY_REF_ => "__caja_ref.firstSQL",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "__local.get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "__caja_ref.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cobrado,Devuelto,Anulado",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_mot_anul",
        F_ALIAS_ => "Anulación",
        F_HELP_ => "Motivo de Anulación",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "120",
        C_VIEW_ => "chq_estado.get()=='Anulado'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_recibido",
        F_ALIAS_ => "Recibido",
        F_HELP_ => "Recibido (Tiene en poder)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Recibido,No Recibido",
        F_BROW_ => "1",
        F_ORD_ => "130",
        G_SHOW_ => "1024",
        G_CHANGE_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "chq_recibido2",
        F_ALIAS_ => "Recibido por Administracion",
        F_HELP_ => "Recibido (Tiene en poder)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",No Recibido,Recibido",
        F_BROW_ => "1",
        F_ORD_ => "140",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

?>
