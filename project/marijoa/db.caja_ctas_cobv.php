<?php
$Obj->name = "caja_ctas_cobv";
$Obj->alias = "Cuentas a Cobrar (Ver)";
$Obj->help = "Cuentas a Cobrar";
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
        F_NODB_ => "1",
        F_ORD_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "2",
        F_FORMULA_ => "'Filtre Cuotas, Pagares y Cheques acotando las fechas de y a.'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre,emp_cod",
        F_FILTER_ => "'emp_cod <> |{03}| and emp_cod <> |{00}|  order by emp_cod asc'",
        F_LENGTH_ => "04",
        F_NODB_ => "1",
        F_ORD_ => "3",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha de",
        F_HELP_ => "Fecha de",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_a",
        F_ALIAS_ => "Fecha a",
        F_HELP_ => "Fecha a",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_inv",
        F_ALIAS_ => "Fecha Invetida",
        F_HELP_ => "Fecha Invetida",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_VIEW_ => "false",
        C_CHANGE_ => "fecha.hasChanged()",
        F_FORMULA_ => "fecha.getYear()+'-'+fecha.getMonth()+'-'+fecha.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_inva",
        F_ALIAS_ => "Fecha Invetida a",
        F_HELP_ => "Fecha Invetida a",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "fecha.hasChanged()",
        F_FORMULA_ => "fecha_a.getYear()+'-'+fecha_a.getMonth()+'-'+fecha_a.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Con Estado de Cuotas",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cancelada,%",
        F_NODB_ => "1",
        F_ORD_ => "17",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "deudor",
        F_ALIAS_ => "Deudor",
        F_HELP_ => "Deudor a seleccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "18",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_deudor",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "deudor.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "cuotas",
        F_SHOWFIELD_ => "distinct ct_ci,ct_deudor",
        F_FILTER_ => "'ct_estado like |{'+estado.get()+'}| and ct_deudor like |{'+deudor.get()+'%}| ORDER BY ct_deudor ASC'",
        F_NODB_ => "1",
        F_ORD_ => "19",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "limite_credito",
        F_ALIAS_ => "Limite Credito",
        F_HELP_ => "Limite Credito",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cli_limit from mnt_cli where cli_ci = '+n_deudor.getStr()+''",
        F_QUERY_REF_ => "n_deudor.hasChanged()",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "22",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "deuda_actual",
        F_ALIAS_ => "Deuda Actual",
        F_HELP_ => "Deuda Actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(ct_monto - ct_entrega ) FROM cuotas WHERE  ct_estado  like |{Pendiente}| AND ct_ci LIKE '+n_deudor.getStr()+' '",
        F_QUERY_REF_ => "n_deudor.hasChanged()",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "print",
        F_ALIAS_ => "Imprimir Estado de Cuenta",
        F_HELP_ => "Imprimir Estado de Cuenta",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.estado_ctas_cli",
        F_NODB_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_tipo",
        F_ALIAS_ => "Filtrar por Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Clientes,Previciones,Incobrables",
        F_NODB_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g_rep",
        F_ALIAS_ => "Ver Informe",
        F_HELP_ => "Ver Informe",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ct_cli_prev_inc",
        F_NODB_ => "1",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        C_SHOW_ => "ct_tipo.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "g_rep_hist",
        F_ALIAS_ => "Ver Informe Mensual",
        F_HELP_ => "Ver Informe Mensual",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.deudas_cli_mens",
        F_NODB_ => "1",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        C_SHOW_ => "fecha.get()!=''&&fecha_a.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

?>
