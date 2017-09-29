<?php
$Obj->name = "depositos";
$Obj->alias = "Depositos en Cta. Cte. Proveedor";
$Obj->help = "Depositos en Cta. Cte. Proveedor";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "depositos";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'select caja_ins_asiento('+__caja_ref.getStr()+',0,'+__local.getStr()+',current_date, |{55-1}|, |{S}|,concat(|{Deposito CC. Prov: }|, |{'+prov_nombre.get()+' }|,|{Dep.Nro:'+nro_dep.get()+'}| ) ,'+moneda.getStr()+', 0, '+monto.getVal()+','+__cotiz.getVal()+') '";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "nro_dep",
        F_ALIAS_ => "Nº de Deposito",
        F_HELP_ => "Nº de Deposito",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "2",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "3",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
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
        F_ORD_ => "4",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
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
        F_QUERY_REF_ => "__caja_ref.firstSQL||__local.hasChanged()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_SHOW_ => "__local.get()!=''&&operation==INSERT_",
        C_VIEW_ => "false",
        F_POSVAL_ => "__caja_ref.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_prov",
        F_ALIAS_ => "Buscar Proveedor",
        F_HELP_ => "Buscar Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_prov.hasChanged()",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_cod,prov_nombre",
        F_FILTER_ => "'prov_nombre like |{'+busc_prov.get()+'%}| order by prov_nombre'",
        F_ORD_ => "6",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov_nombre",
        F_ALIAS_ => "Nombre",
        F_HELP_ => "Nombre del Proveedor",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select prov_nombre from mnt_prov where prov_cod = '+prov.getStr()",
        F_QUERY_REF_ => "prov.hasChanged()",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "7",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda a transferir",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_ORD_ => "29",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "exist_encia",
        F_ALIAS_ => "Existencia",
        F_HELP_ => "Existencia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ce_cant from caja_exist where ce_moneda = '+moneda.getStr()+' and ce_ref = '+__caja_ref.getVal()+' '",
        F_QUERY_REF_ => "moneda.hasChanged()",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "32",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "33",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cotiz",
        F_ALIAS_ => "Cotizacion",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio_venta('+moneda.getStr()+');'",
        F_QUERY_REF_ => "moneda.hasChanged()||__cotiz.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_ORD_ => "36",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo",
        F_ALIAS_ => "Saldo (No Utilizado)",
        F_HELP_ => "Saldo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_FORMULA_ => "monto.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(saldo.getVal()>0){'Pendiente'}else{'Cerrado'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "monto.getVal() > exist_encia.getVal()",
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
        F_ORD_ => "90",
        C_SHOW_ => "monto.getVal() <= exist_encia.getVal()",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
