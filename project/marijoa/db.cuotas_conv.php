<?php
$Obj->name = "cuotas_conv";
$Obj->alias = "Cuotas por Convenios";
$Obj->help = "Cuotas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cuotas_conv";
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
        F_NAME_ => "ct_ref",
        F_ALIAS_ => "Nº Factura ",
        F_HELP_ => "Nº Factura Relacionada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

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
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_nro",
        F_ALIAS_ => "Nº de Cuota",
        F_HELP_ => "Nº de Cuota",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(ct_nro) + 1 from cuotas where ct_ref = '+ct_ref.getVal()+''",
        F_QUERY_REF_ => "if(operation==INSERT_){ ct_nro.firstSQL || ct_ref.hasChanged() }",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_conv",
        F_ALIAS_ => "Convenio",
        F_HELP_ => "Convenio",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_cod,conv_nombre",
        F_BROW_ => "1",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_porc",
        F_ALIAS_ => "Porcentaje de Descuento",
        F_HELP_ => "Porcentaje de Descuento",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_porc",
        F_RELFIELD_ => "conv_cod",
        F_LOCALFIELD_ => "ct_conv",
        F_LENGTH_ => "10",
        F_DEC_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "28",
        C_CHANGE_ => "false",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_conv_n",
        F_ALIAS_ => "Nombre Convenio",
        F_HELP_ => "Nombre Convenio",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_nombre",
        F_RELFIELD_ => "conv_cod",
        F_LOCALFIELD_ => "ct_conv",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "29",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_fecha_venc",
        F_ALIAS_ => "Fecha vencimiento",
        F_HELP_ => "Fecha vencimiento",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "true",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto o Valor de la cuota",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_descuento",
        F_ALIAS_ => "Descuento",
        F_HELP_ => "Descuento",
        F_TYPE_ => "formula",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "44",
        C_CHANGE_ => "ct_monto.hasChanged()",
        F_FORMULA_ => "(ct_monto.getVal()*ct_porc.getVal())/100",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_total",
        F_ALIAS_ => "Monto Total sin Descuento",
        F_HELP_ => "Monto total sin descuento",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "47",
        C_CHANGE_ => "ct_descuento.hasChanged()",
        F_FORMULA_ => "ct_monto.getVal() - ct_descuento.getVal()",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

$Obj->Add(
    array(
        F_NAME_ => "ct_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cancelada",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        G_SHOW_ => "44",
        G_CHANGE_ => "44"));

?>
