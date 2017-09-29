<?php
$Obj->name = "rep_ventas_conv";
$Obj->alias = "Reporte de Ventas con Convenios (Cuotas)";
$Obj->help = "Reporte de Ventas con Convenios (Cuotas)";
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_imp",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº de Impresion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select max(id) + 1 as nro from regist_imp_conv'",
        F_QUERY_REF_ => "nro_imp.firstSQL",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "5",
        C_CHANGE_ => "false",
        G_SHOW_ => "36",
        G_CHANGE_ => "36"));
		
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
		F_INLINE_ => "1",
        F_ORD_ => "6",
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
        F_NAME_ => "desde",
        F_ALIAS_ => "Fecha desde",
        F_HELP_ => "Imprimir desde esta fecha",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Fecha hasta",
        F_HELP_ => "Fecha hasta",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "21",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "convenios",
        F_ALIAS_ => "Convenios",
        F_HELP_ => "Convenios",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_cod,conv_nombre",
        F_BROW_ => "1",
        F_ORD_ => "22",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "con_nombre",
        F_ALIAS_ => "Nombre de Convenio",
        F_HELP_ => "Nombre de Convenio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select conv_nombre from mnt_conv where conv_cod = '+convenios.getVal()",
        F_QUERY_REF_ => "convenios.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "24",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "porc",
        F_ALIAS_ => "Porcentaje de Descuento",
        F_HELP_ => "Porcentaje de Descuento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select conv_porc from mnt_conv where conv_cod = '+convenios.getStr()+''",
        F_QUERY_REF_ => "convenios.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "25",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo de Comvenio",
        F_HELP_ => "Tipo de Comvenio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select conv_tipo from mnt_conv where conv_cod = '+convenios.getStr()+''",
        F_QUERY_REF_ => "convenios.hasChanged()",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ult_imp",
        F_ALIAS_ => "Ultima fecha de Ipresion",
        F_HELP_ => "Ultima fecha de Ipresion",
        F_TYPE_ => "date",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select DATE_FORMAT(hasta,|{%d-%m-%Y}|)  from regist_imp_conv where convenios = '+convenios.getVal()+' and estado = |{Cobrado}| order by id desc limit 1'",
        F_QUERY_REF_ => "convenios.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "26",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "factura",
        F_ALIAS_ => "Facturas Pendientes Seleccione p/ Cancelar",
        F_HELP_ => "Cuotas Pendientes",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "convenios.hasChanged()||desdeinv.hasChanged()||hastainv.hasChanged()||desde.hasChanged()||hasta.hasChanged()",
        F_RELTABLE_ => "cuotas_conv,factura",
        F_SHOWFIELD_ => "ct_ref,concat(|{ Cuota Nro: }|,ct_nro,|{  Monto: }|,ct_total,|{  Venc:  }|,ct_fecha_venc)",
        F_FILTER_ => "' ct_fecha_venc BETWEEN '+desdeinv.getStr()+' and '+hastainv.getStr()+' and ct_conv = '+convenios.getStr()+' and ct_estado = |{Pendiente}| AND factura.fact_nro = cuotas_conv.ct_ref'",
        F_NODB_ => "1",
        F_ORD_ => "31",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cuotas_nro",
        F_ALIAS_ => "Cuotas Nro:",
        F_HELP_ => "Cuotas Pendientes",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "factura.hasChanged()",
        F_RELTABLE_ => "cuotas_conv",
        F_SHOWFIELD_ => "ct_nro,concat(|{  Venc:  }|,ct_fecha_venc)",
        F_FILTER_ => "'ct_ref = '+factura.getStr()+' and ct_estado = |{Pendiente}| '",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_cuotas",
        F_ALIAS_ => "Ver Reporte Lista de Cuotas Pendientes",
        F_HELP_ => "Ver Reporte Lista de Cuotas Pendientes",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.cuotas_de_convs",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "forma",
        F_ALIAS_ => "Forma de Cobro",
        F_HELP_ => "Forma de Cobro",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Caja,Cheque",
        F_NODB_ => "1",
        F_ORD_ => "45",
        C_SHOW_ => "desde.get()!=''&&hasta.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sum",
        F_ALIAS_ => "Monto de la Cuota",
        F_HELP_ => "Monto total de la Cuota",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ct_total FROM factura, cuotas_conv where ct_ref = '+factura.getStr()+' and ct_nro = '+cuotas_nro.getVal()+'  and ct_conv = '+convenios.getStr()+' and ct_estado = |{Pendiente}| AND factura.fact_nro = cuotas_conv.ct_ref'",
        F_QUERY_REF_ => "factura.hasChanged()||cuotas_nro.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "46",
        C_SHOW_ => "convenios.notEmpty()&&factura.getVal()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suma_cheques",
        F_ALIAS_ => "Monto Total en Cheques",
        F_HELP_ => "Monto Total en Cheques",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(chq_moneda_ref - chq_monto_util) from cheq_terceros where chq_ref = '+nro_cobro.getStr()",
        F_QUERY_REF_ => "forma.get()=='Cheque'||cancelar.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "47",
        F_INLINE_ => "1",
        C_SHOW_ => "forma.get()=='Cheque'&&factura.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cancelar",
        F_ALIAS_ => "Cancelar cuota",
        F_HELP_ => "Cancelar cuota",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "48",
        F_INLINE_ => "1",
        C_SHOW_ => "convenios.get()!=''&&factura.getVal()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desdeinv",
        F_ALIAS_ => "Fecha desde Invertida",
        F_HELP_ => "Fecha desde Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        C_CHANGE_ => "desde.hasChanged()",
        F_FORMULA_ => "desde.getYear()+'-'+desde.getMonth() +'-'+ desde.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hastainv",
        F_ALIAS_ => "Fecha hasta Invertida",
        F_HELP_ => "Fecha hasta Invertida",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        C_CHANGE_ => "hasta .hasChanged()",
        F_FORMULA_ => "hasta .getYear()+'-'+hasta.getMonth()+'-'+ hasta.getDay()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));



$Obj->Add(
    array(
        F_NAME_ => "sue_cj",
        F_ALIAS_ => "SUC:",
        F_HELP_ => "Caja de SUC:",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "62",
        C_SHOW_ => "cancelar.get()=='Si'||forma.get()=='Cheque'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "cheq_terceros",
        F_ALIAS_ => "Cheques",
        F_HELP_ => "Cheques de terceros",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'chq_ref = '+nro_cobro.getStr()",
        F_LINK_ => "db.chq_terceros_conv",
        F_SEND_ => "nro_cobro.get()",
        F_NODB_ => "1",
        F_ORD_ => "66",
        C_SHOW_ => "forma.get()=='Cheque'&&factura.get()!=''&&nro_cobro.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "sue_cj_ref",
        F_ALIAS_ => "Caja Ref",
        F_HELP_ => "Caja Ref",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cj_ref from caja where cj_estado = |{Abierto}| and cj_fecha <= current_date and cj_empr = '+sue_cj.getStr()+' order by id desc limit 1'",
        F_QUERY_REF_ => "sue_cj.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "130",
        F_INLINE_ => "1",
        C_SHOW_ => "sue_cj.notEmpty()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cancel",
        F_ALIAS_ => "Cancelar esta Cuota en Efectivo",
        F_HELP_ => "Cancelar esta Cuota",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_ins_asiento('+sue_cj_ref.getVal()+', null, '+sue_cj.getStr()+', current_date, |{120-2}|, |{E}|, |{Cobro Cuota Convenio: '+factura.get()+' '+con_nombre.get()+' }|, |{G$}|, '+sum.getVal()+', 0, 1)'",
        F_NODB_ => "1",
        F_ORD_ => "135",
        F_INLINE_ => "1",
        C_SHOW_ => "cancelar.get()=='Si'&&forma.get()=='Caja'&&sue_cj.get()!=''",
        C_VIEW_ => "!cancel.get()&&sue_cj_ref.notEmpty()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cancel_chq",
        F_ALIAS_ => "Cancelar esta Cuota con Cheque/s",
        F_HELP_ => "Cancelar esta Cuota con uno o mas Cheques",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cancelar_cuota_conv('+convenios.getStr()+', '+tipo.getStr()+','+porc.getVal()+','+forma.getStr()+','+factura.getStr()+','+cuotas_nro.getVal()+','+sue_cj.getStr()+','+sum.getVal()+','+nro_cobro.getStr()+')' ",
        F_NODB_ => "1",
        F_ORD_ => "136",
        C_SHOW_ => "suma_cheques.getVal()>0&&sue_cj.get()!=''",
        C_VIEW_ => "cancelar.get()=='Si'&&forma.get()=='Cheque'&&!cancel_chq.get()&&nro_cobro.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cambiaEstado",
        F_ALIAS_ => "Cancela cuota",
        F_HELP_ => "canela cuotas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cancelar_cuota_conv('+convenios.getStr()+', '+tipo.getStr()+','+porc.getVal()+','+forma.getStr()+','+factura.getStr()+','+cuotas_nro.getVal()+','+sue_cj.getStr()+','+sum.getVal()+','+nro_cobro.getStr()+')' ",
        F_QUERY_REF_ => " cancel.get()&&__cambiaEstado.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "cancel.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__log",
        F_ALIAS_ => "Make Log",
        F_HELP_ => "Make Log",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select makeLog_(|{MODIFICAR}|,  |{Cancelacion de cuota de convenio  '+convenios.get()+'  Ref:  v }| ,|{'+p_user_+'}|);' ",
        F_QUERY_REF_ => "cancel.get()&&__log.firstSQL",
        F_ORD_ => "200",
        C_SHOW_ => "cancel.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "cancel.get()||cancel_chq.get()",
        F_FORMULA_ => "'( ! ) Listo operacion realizada con exito!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "del_cache",
        F_ALIAS_ => "Del temp caja",
        F_HELP_ => "Del temp caja",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'delete from tmp_caja; '",
        F_QUERY_REF_ => "del_cache.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "siguiente",
        F_ALIAS_ => "Siguiente",
        F_HELP_ => "Siguiente",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select 450'",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "230",
        C_VIEW_ => "cancel.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "240",
        C_SHOW_ => "siguiente.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',1000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
