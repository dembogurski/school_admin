<?php
$Obj->name = "mult_pago_adel";
$Obj->alias = "Gererar multiples amortizaciones por Pagos Adelantados";
$Obj->help = "Gerera multiples amortizaciones por Pagos Adelantados";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Obtiene Localidad",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "fact_ver_caja",
        F_ALIAS_ => "Verifica si caja esta abierta",
        F_HELP_ => "Verifica si caja esta abierta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ __local.getStr() +' AND cj_estado=|{Abierto}|'",
        F_QUERY_REF_ => "__local.get()!=''",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_ORD_ => "12",
        C_SHOW_ => "__local.get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "fact_ver_caja.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "busc_func",
        F_ALIAS_ => "Buscar Funcionario",
        F_HELP_ => "Busca al Funcionario",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_func_cod",
        F_ALIAS_ => "Funcionario",
        F_HELP_ => "Código y nombre compledo del Funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_func.hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_fullname LIKE |{%'+busc_func.get()+'%}| ORDER BY func_cod LIMIT 20'",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_func_nomb",
        F_ALIAS_ => "Nombre del funcionario",
        F_HELP_ => "Nombre del funcionario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select func_fullname from mnt_func where func_cod = '+desc_func_cod.getStr()+' '",
        F_QUERY_REF_ => "desc_func_cod.hasChanged()",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario que hace el pago adelantado",
        F_HELP_ => "Usuario que hace el pago adelantado",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_ ",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_cant",
        F_ALIAS_ => "Cantidad de pagos adelantados a Generar",
        F_HELP_ => "Cantidad de pagos adelantados a Generar",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_unit",
        F_ALIAS_ => "Montos Unitarios",
        F_HELP_ => "Montos Unitarios",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_CHANGE_ => "desc_cant.hasChanged()||monto.hasChanged()",
        F_FORMULA_ => "monto.getVal()/desc_cant.getVal()",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_confirmar",
        F_ALIAS_ => "Generar Pagos Adelantados",
        F_HELP_ => "Generar Pagos Adelantados",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "monto.getVal()>0&&desc_func_cod.get()!=''",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_aceptar",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'Select gen_mult_pago_adel('+desc_func_cod.getStr()+','+desc_func_nomb.getStr()+','+desc_unit.getVal()+','+usuario.getStr()+' ,'+desc_cant.getVal()+','+fact_ver_caja.getStr()+','+__local.getStr()+',|{No}| )'",
        F_BROW_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "desc_unit.get()!='Infinity'&& desc_confirmar.get()=='Si'",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_pendientes",
        F_ALIAS_ => "Pagos Adelantados Pendientes de este Funcionario",
        F_HELP_ => "Pagos Adelantados Pendientes de este Funcionario",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'desc_func_cod='+desc_func_cod.getStr()+' and desc_estado= |{Pendiente}|'",
        F_LINK_ => "db.pagos_adelantad",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "110",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "115",
        F_FORMULA_ => "'Utilize esta area para borrar Adelantos...(Cierre y abra la grilla para actualizar) '",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_nroini",
        F_ALIAS_ => "Nº Inicio",
        F_HELP_ => "Nº Inicio",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_nrofin",
        F_ALIAS_ => "Nº Fin",
        F_HELP_ => "Nº Fin",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "130",
        F_INLINE_ => "1",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_conf",
        F_ALIAS_ => "¿Esta seguro que desea borrar estas amortizaciones?",
        F_HELP_ => "¿Esta seguro que desea borrar estas amortizaciones?",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "135",
        F_INLINE_ => "1",
        C_SHOW_ => "desc_nroini.getVal()>0&&desc_nrofin.getVal()>0&&desc_func_cod.get()!=''",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "desc_borrar",
        F_ALIAS_ => "Borrar Adelantos",
        F_HELP_ => "Borrar Adelantos",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update pagos_adelantados set desc_estado = |{Anulado}| where nro_orden >= '+desc_nroini.getVal()+' and nro_orden <=  '+desc_nrofin.getVal()+' '",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "desc_conf.get()=='Si'",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

?>
