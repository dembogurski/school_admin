<?php
$Obj->name = "cuotas";
$Obj->alias = "Cuotas a cobrar";
$Obj->help = "Cuotas a cobrar";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "cuotas";
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
        F_NAME_ => "nro_cob",
        F_ALIAS_ => "Nº de Cobro",
        F_HELP_ => "Nº de Cobro",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_ref",
        F_ALIAS_ => "Nº Factura ",
        F_HELP_ => "Nº Factura Relacionada",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Generar Movimiento de caja en Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_ORD_ => "12",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_cta_rec",
        F_ALIAS_ => "Cta. Rec.",
        F_HELP_ => "Cta. Rec.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT emp_cta_cont FROM par_empresas WHERE emp_cod = '+__local.getStr()",
        F_QUERY_REF_ => "__local.hasChanged()||ct_cta_rec.firstSQL",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Nro de caja",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ __local.getStr() +' AND cj_estado=|{Abierto}| and cj_fecha = current_date'",
        F_QUERY_REF_ => "__caja_ref.firstSQL||__local.hasChanged()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_nro",
        F_ALIAS_ => "Nº de Cuota",
        F_HELP_ => "Nº de Cuota",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(ct_nro) + 1 from cuotas where ct_ref = '+ct_ref.getVal()+''",
        F_QUERY_REF_ => "if(operation==INSERT_){ ct_nro.firstSQL }",
        F_LENGTH_ => "3",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_porc",
        F_ALIAS_ => "Porcentaje de Descuento",
        F_HELP_ => "Porcentaje de Descuento",
        F_TYPE_ => "text",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "5",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
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
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_deudor",
        F_ALIAS_ => "Deudor",
        F_HELP_ => "Deudor",
        F_TYPE_ => "text",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "35",
        F_FORMULA_ => " ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_ci",
        F_ALIAS_ => "CI/RUC",
        F_HELP_ => "CI/RUC",
        F_TYPE_ => "formula",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "36",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['n_deudor']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_cta_cont",
        F_ALIAS_ => "Cuenta Contable",
        F_HELP_ => "Cuenta Contable",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cli_cta_cont FROM mnt_cli WHERE cli_ci = '+ct_ci.getStr()",
        F_QUERY_REF_ => "ct_cta_cont.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "38",
        F_INLINE_ => "1",
        C_SHOW_ => "ct_ci.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_monto",
        F_ALIAS_ => "Monto de la cuota",
        F_HELP_ => "Monto o Valor de la cuota",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "40",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_descuento",
        F_ALIAS_ => "Descuento",
        F_HELP_ => "Descuento",
        F_TYPE_ => "formula",
        F_DEC_ => "2",
        F_ORD_ => "44",
        C_VIEW_ => "false",
        C_CHANGE_ => "ct_monto.hasChanged()",
        F_FORMULA_ => "(ct_monto.getVal()*ct_porc.getVal())/100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_total",
        F_ALIAS_ => "Monto Total de la cuota",
        F_HELP_ => "Monto total sin descuento",
        F_TYPE_ => "formula",
        F_DEC_ => "2",
        F_ORD_ => "47",
        C_SHOW_ => "false",
        C_CHANGE_ => "ct_descuento.hasChanged()",
        F_FORMULA_ => "ct_monto.getVal() - ct_descuento.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_entrega",
        F_ALIAS_ => "Monto entregado",
        F_HELP_ => "Monto entregado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ct_entrega from cuotas where ct_nro = '+ct_nro.getVal()+' and ct_ref = '+ct_ref.getVal()",
        F_QUERY_REF_ => "ct_entrega.firstSQL||ct_ent_actual.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "48",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rest",
        F_ALIAS_ => "Restante",
        F_HELP_ => "Restante",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "52",
        F_INLINE_ => "1",
        F_FORMULA_ => "ct_monto.getVal()-ct_entrega.getVal()-ret_iva.getVal() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ret_iva",
        F_ALIAS_ => "Ret. de IVA",
        F_HELP_ => "Retencion de IVA",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "53",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "porc_ret",
        F_ALIAS_ => "Valor Retencion",
        F_HELP_ => "Valor de Retencion a agregar",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "53",
        F_INLINE_ => "1",
        C_SHOW_ => "!ret_iva.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "add_ret_iva",
        F_ALIAS_ => "Agregar Retencion de IVA",
        F_HELP_ => "Agregar Retencion de IVA",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update cuotas set ret_iva = '+porc_ret.getVal()+' , rest =  ct_total - '+porc_ret.getVal()+' where ct_nro = '+ct_nro.getVal()+' and ct_ref = '+ct_ref.getVal()+''",
        F_NODB_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        C_SHOW_ => "!ret_iva.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_ent_actual",
        F_ALIAS_ => "Monto entrega actual",
        F_HELP_ => "Monto que entrega en este momento",
        F_TYPE_ => "text",
        F_QUERY_ => " ",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "55",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cj_bco",
        F_ALIAS_ => "Forma de Cobro",
        F_HELP_ => "Forma de Cobro",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Caja,Depositos,Cheque,Nota de Credito,Refinanciar",
        F_NODB_ => "1",
        F_ORD_ => "56",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chqs",
        F_ALIAS_ => "Cheques disponibles",
        F_HELP_ => "Cheques disponibles",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "__cj_bco.hasChanged()&&__cj_bco.get()=='Cheque'",
        F_RELTABLE_ => "cheq_terceros",
        F_SHOWFIELD_ => "chq_num,chq_moneda_ref",
        F_FILTER_ => "'chq_ref = '+nro_cob.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "57",
        F_INLINE_ => "1",
        C_SHOW_ => "__cj_bco.get()=='Cheque'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_res",
        F_ALIAS_ => "Valor Restante",
        F_HELP_ => "Valor Restante",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT SUM(chq_moneda_ref - chq_monto_util ) FROM cheq_terceros WHERE chq_num ='+chqs.getStr()",
        F_QUERY_REF_ => "chqs.hasChanged()",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "57",
        F_INLINE_ => "1",
        C_SHOW_ => "__cj_bco.get()=='Cheque'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Tipo de Moneda ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_NODB_ => "1",
        F_ORD_ => "59",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cotiz",
        F_ALIAS_ => "Cotizacion",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+__moneda.getStr()+');'",
        F_QUERY_REF_ => "__moneda.hasChanged()||__cotiz.firstSQL",
        F_LENGTH_ => "20",
        F_DEC_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_m_ref",
        F_ALIAS_ => "Equivalencia",
        F_HELP_ => "Monto Ref",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "61",
        F_INLINE_ => "1",
        F_FORMULA_ => "ct_ent_actual.getVal()*__cotiz.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg_caja",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "90",
        F_NODB_ => "1",
        F_ORD_ => "62",
        C_SHOW_ => "operation==CHANGE_&&__cj_bco.get()=='Caja'&&__caja_ref.getVal()<1",
        F_FORMULA_ => "'( ! ) No hay caja Abierta en Fecha para esta Sucursal!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "63",
        F_FORMULA_ => "if(rest.getVal() <= 0){ 'Cancelada' }else{'Pendiente'}",
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
        F_ORD_ => "65",
        C_SHOW_ => "operation==CHANGE_&&__cj_bco.get()=='Caja'",
        F_FORMULA_ => "'( ! ) Cobrando esta cuota generara movimiento de caja por el monto de entrega actual.'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "comp",
        F_ALIAS_ => "Comprobante",
        F_HELP_ => "Comprobante",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "66",
        C_SHOW_ => "__cj_bco.get()=='Depositos'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "verif",
        F_ALIAS_ => "Verificacion de Monto (Saldo)",
        F_HELP_ => "Verificacion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ctd_saldo from bcos_ctas_det where ctd_doc ='+comp.getStr()",
        F_QUERY_REF_ => "comp.hasChanged()",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "68",
        F_INLINE_ => "1",
        C_VIEW_ => "__cj_bco.get()=='Depositos'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_cmp_asoc",
        F_ALIAS_ => "Comprobantes ( Nº Recibo o Nº de deposito )",
        F_HELP_ => "Comprobante Asociado ( Nº Recibo o Nº de deposito )",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "__cj_bco.get()=='Depositos'|| __cj_bco.get()=='Caja'",
        C_CHANGE_ => "__cj_bco.get()=='Caja'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "comp_nc",
        F_ALIAS_ => "Nº Nota de Credito",
        F_HELP_ => "Nº Nota de Credito",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "comp_nc.firstSQL",
        F_RELTABLE_ => "nota_credito",
        F_SHOWFIELD_ => "nro_nc,concat(obs,|{ Monto: }|,monto,|{ Saldo: }|,saldo)",
        F_FILTER_ => "'cli_ci = '+ct_ci.getStr()+' and saldo > 0'",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "84",
        C_VIEW_ => "__cj_bco.get()=='Nota de Credito'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hab",
        F_ALIAS_ => "Cobrar",
        F_HELP_ => "Cobrar esta cuota",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "operation==CHANGE_ && __cj_bco.get() != 'Refinanciar'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_cobrar",
        F_ALIAS_ => "Confirmar Cobro (Deposito)",
        F_HELP_ => "Cobrar esta Cuota",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cobrar_cuota('+ct_ref.getVal()+','+ct_nro.getVal()+','+__caja_ref.getVal()+','+__local.getStr()+', '+monto_m_ref.getVal()+','+comp.getStr()+',|{Deposito}|,'+ct_cta_cont.getStr()+','+__cotiz.getVal()+', '+__moneda.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "operation==CHANGE_&&hab.get()=='Si'&&ct_estado.get()!='Cancelada'",
        C_VIEW_ => " ct_ent_actual.getVal()>0&&__cj_bco.get()=='Depositos'  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_cobrar_cj",
        F_ALIAS_ => "Confirmar Cobro (Caja)",
        F_HELP_ => "Cobrar esta Cuota",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cobrar_cuota('+ct_ref.getVal()+','+ct_nro.getVal()+','+__caja_ref.getVal()+','+__local.getStr()+', '+ct_ent_actual.getVal()+','+ct_cmp_asoc.getStr()+',|{Caja}|,'+ct_cta_cont.getStr()+','+__cotiz.getVal()+', '+__moneda.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "operation==CHANGE_&&hab.get()=='Si'&&ct_estado.get()!='Cancelada'",
        C_VIEW_ => "ct_ent_actual.getVal()>0&&__cj_bco.get()=='Caja'&&ct_cmp_asoc.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_cobrar_nc",
        F_ALIAS_ => "Confirmar Cobro (Nota Credito)",
        F_HELP_ => "Cobrar esta Cuota",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cobrar_cuota_nc('+ct_ref.getVal()+','+ct_nro.getVal()+','+__local.getStr()+', '+monto_m_ref.getVal()+','+comp_nc.getStr()+','+ct_cta_cont.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "operation==CHANGE_&&hab.get()=='Si'&&ct_estado.get()!='Cancelada'",
        C_VIEW_ => "ct_ent_actual.getVal()>0&&__cj_bco.get()=='Nota de Credito'&&comp_nc.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_cobrar_chq",
        F_ALIAS_ => "Cobrar con Cheque o Pagar Parcialmente",
        F_HELP_ => "Cobrar con Cheque",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cobrar_cuota_chq('+ct_ref.getVal()+','+ct_nro.getVal()+','+__local.getStr()+', '+monto_m_ref.getVal()+','+chqs.getStr()+','+ct_cta_cont.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "!ct_cobrar_chq.get()&&hab.get()=='Si' && nro_cob.get()!=''",
        C_VIEW_ => "ct_ent_actual.getVal()>0&&__cj_bco.get()=='Cheque'&&( ct_ent_actual.getVal() <= chq_res.getVal() )",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ct_refinanciar",
        F_ALIAS_ => "Cancelar x Refinanciacion",
        F_HELP_ => "Cancelar x Refinanciacion",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select refinanciar_cuota('+ct_ref.getVal()+','+ct_nro.getVal()+','+__local.getStr()+', '+monto_m_ref.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_SHOW_ => "!ct_refinanciar.get() && (ct_ent_actual.getVal()==  rest.getVal()) && __cj_bco.get()=='Refinanciar' && (p_user_ == 'Developer' || p_user_ == 'lisaalegre')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_SHOW_ => "ct_cobrar.get()||ct_cobrar_cj.get()||add_ret_iva.get()||ct_cobrar_chq.get() || ct_refinanciar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.location.reload()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__check",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "( ! )",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "310",
        C_SHOW_ => "monto_m_ref.getVal() > rest.getVal()",
        F_FORMULA_ => "if( monto_m_ref.getVal() > rest.getVal() ){ 'ATENCION!!! MONTO ENTREGA MAYOR A LA DEUDA' }else{ 'Ok' }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__color",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "( ! )",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "320",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( monto_m_ref.getVal() > rest.getVal() ){ document.getElementById(|{__check}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:20px;}|); }else{ document.getElementById(|{__check}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:20px;}|); }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
