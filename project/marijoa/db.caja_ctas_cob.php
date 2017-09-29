<?php
$Obj->name = "caja_ctas_cob";
$Obj->alias = "Cuentas a Cobrar";
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
        F_NAME_ => "nro_cobro",
        F_ALIAS_ => "Nº de Cobro",
        F_HELP_ => "Nº de Cobro",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(|{Cobro }|,_autonum(|{nro_cobro}|));'",
        F_QUERY_REF_ => "proc.get()&&nro_cobro.firstSQL",
        F_LENGTH_ => "10",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dp_conv",
        F_ALIAS_ => "Cobrar con Tarjeta",
        F_HELP_ => "Tarjeta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_cod,conv_nombre",
        F_FILTER_ => "'conv_tipo <> |{Convenio}|'",
        F_LENGTH_ => "15",
        F_ORD_ => "4",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_num,cta_bco",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_SHOW_ => "dp_conv.get()!='No'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "proc",
        F_ALIAS_ => "Nuevo Cobro",
        F_HELP_ => "Nuevo Cobro",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select 1 + 1'",
        F_NODB_ => "1",
        F_ORD_ => "8",
        F_INLINE_ => "1",
        C_SHOW_ => "!proc.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha Emision Cuotas desde",
        F_HELP_ => "Fecha de",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "10",
        V_DEFAULT_ => "'01-01-2010'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_a",
        F_ALIAS_ => "Fecha Emision Cuotas hasta",
        F_HELP_ => "Fecha a",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'01-01-2020'",
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
        F_NAME_ => "amor_de",
        F_ALIAS_ => "Amortizaciones desde",
        F_HELP_ => "Fecha de",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "17",
        V_DEFAULT_ => "'01-01-2010'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "amor_a",
        F_ALIAS_ => "Amortizaciones hasta",
        F_HELP_ => "Fecha a",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "18",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'01-01-2020'",
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
        F_RELTABLE_ => "cuotas c",
        F_SHOWFIELD_ => "distinct ct_ci,ct_deudor ",
        F_FILTER_ => "'ct_deudor LIKE |{'+deudor.get()+'%}| OR ct_ci LIKE |{'+deudor.get()+'%}|   ORDER BY ct_deudor ASC'",
        F_NODB_ => "1",
        F_ORD_ => "19",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cancelada,%",
        F_NODB_ => "1",
        F_ORD_ => "19",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "SUC",
        F_HELP_ => "SUC",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc'",
        F_LENGTH_ => "15",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vendedor",
        F_ALIAS_ => "Vendedor:",
        F_HELP_ => "Vendedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "21",
		V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_vendedor",
        F_ALIAS_ => ":",
        F_HELP_ => " ",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "vendedor.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname ",
        F_FILTER_ => "'func_cod LIKE |{'+vendedor.get()+'%}| OR func_fullname LIKE |{'+vendedor.get()+'%}|   ORDER BY func_fullname ASC'",
        F_NODB_ => "1",
        F_ORD_ => "19",
        F_INLINE_ => "1",
		V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "print0",
        F_ALIAS_ => "Estado de Cuenta",
        F_HELP_ => "Imprimir Estado de Cuenta",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.estado_ctas_cli",
        F_NODB_ => "1",
        F_ORD_ => "21",
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
        F_DEC_ => "0",
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
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__diff",
        F_ALIAS_ => "Diferecia de linea de credito:",
        F_HELP_ => "Diferecia de linea de credito",
        F_TYPE_ => "formula",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "24",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        F_FORMULA_ => "limite_credito.getVal()-deuda_actual.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "print",
        F_ALIAS_ => "Historial",
        F_HELP_ => "Imprimir Estado de Cuenta",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.historial_cli",
        F_NODB_ => "1",
        F_ORD_ => "24",
        F_INLINE_ => "1",
        C_SHOW_ => "n_deudor.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cuotas",
        F_ALIAS_ => "Cuotas",
        F_HELP_ => "Cuotas",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'ct_fecha_venc>='+fecha_inv.getStr()+'  and  ct_fecha_venc<='+fecha_inva.getStr()+'          and ct_estado = |{Pendiente}| AND ct_ci = |{'+n_deudor.get()+'}| order by id desc'",
        F_LINK_ => "db.cuotas_cobrar",
        F_SEND_ => "nro_cobro.get()",
        F_NODB_ => "1",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pagares",
        F_ALIAS_ => "Pagares",
        F_HELP_ => "Pagares",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'pg_fecha>='+fecha_inv.getStr()+'  and  pg_fecha<='+fecha_inva.getStr()+'  and pg_estado= |{Pendiente}| AND pg_deudor LIKE |{'+n_deudor.get()+'%}|'",
        F_LINK_ => "db.pagares",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cliente",
        F_ALIAS_ => "Nombre Cliente",
        F_HELP_ => "Nombre del Cliente",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cli_fullname from mnt_cli where cli_ci = '+n_deudor.getStr()+' limit 1'",
        F_QUERY_REF_ => "n_deudor.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "35",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cheques_ter",
        F_ALIAS_ => "Cheques de Terceros (Solo para insertar nuevos)",
        F_HELP_ => "Cheques de Terceros (Solo para crear nuevos si hace falta)",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'chq_ref = '+nro_cobro.getStr()+' or chq_nombre_de = '+cliente.getStr()",
        F_LINK_ => "db.cheq_terc_cobros",
        F_SEND_ => "nro_cobro.get()",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "n_deudor.get()!='' && nro_cobro.get() !='' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cuenta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_num,concat(cta_tipo,|{ }|,cta_moneda) ",
        F_NODB_ => "1",
        F_ORD_ => "43",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "depositos",
        F_ALIAS_ => "Depositar",
        F_HELP_ => "Depositar",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'ctd_nro_cobro='+nro_cobro.getVal()",
        F_LINK_ => "db.bcos_ctas_det_cob",
        F_SEND_ => "cuenta.get()",
        F_NODB_ => "1",
        F_ORD_ => "45",
        C_VIEW_ => "nro_cobro.notEmpty()&&cuenta.notEmpty()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "conv",
        F_ALIAS_ => "Convenios",
        F_HELP_ => "Registro de Impresiones de Convenios",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'regist_imp_conv.id > 0 '",
        F_LINK_ => "db.regist_imp_comv",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "52",
        F_FORMULA_ => "'( ! )  Para pagar multiples cuotas genera un nuevo cobro arriba... '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cobro_mult_cuot",
        F_ALIAS_ => "Cobro de Multiples Cuotas",
        F_HELP_ => "Cobro de Multiples Cuotas (Insertar Pagares primero)",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'nro_cob='+nro_cobro.getStr()",
        F_LINK_ => "db.cobro_mult_cuot",
        F_SEND_ => "nro_cobro.get()",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "false",
        C_VIEW_ => "nro_cobro.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fin",
        F_ALIAS_ => "Finalizar ",
        F_HELP_ => "Finalizar ",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "nro_cobro.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "_confirmar",
        F_ALIAS_ => "Confirmar",
        F_HELP_ => "Confirmar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cambiar_estado_cuota('+nro_cobro.getStr()+','+dp_conv.getVal()+','+cta.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_SHOW_ => "fin.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goBack",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "_confirmar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',300);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cheques_ter_pen",
        F_ALIAS_ => "Cheques de Terceros (Pendientes de Cobro)",
        F_HELP_ => "Cheques de Terceros (Pendientes de Cobro)",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'chq_estado = |{Pendiente}| and chq_fecha_pag between '+fecha_inv.getStr()+' and '+fecha_inva.getStr()+' and chq_nombre_de = '+n_deudor.getStr() ",
        F_LINK_ => "db.cheq_terceros_cob",
        F_SEND_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "131",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " if(__diff.getVal()<0){ document.getElementById(|{__diff}|).setAttribute(|{style}|,|{color:red;font-weight:bolder;}|); }else{ document.getElementById(|{__diff}|).setAttribute(|{style}|,|{color:green;font-weight:bolder;}|); } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
