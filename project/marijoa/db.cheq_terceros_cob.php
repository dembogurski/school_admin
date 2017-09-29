<?php
$Obj->name = "cheq_terceros";
$Obj->alias = "Cheques de Terceros (Cobros Depositos)";
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
        F_ORD_ => "5",
        C_CHANGE_ => "false",
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
        C_CHANGE_ => "false",
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
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_nombre_de",
        F_ALIAS_ => "Nombre de ",
        F_HELP_ => "Nombre de ",
        F_TYPE_ => "text",
        F_LENGTH_ => "100",
        F_BROW_ => "1",
        F_ORD_ => "25",
        C_CHANGE_ => "false",
        F_FORMULA_ => " ",
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
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_pag",
        F_ALIAS_ => "Fecha Limite cobro",
        F_HELP_ => "Fecha Limite cobro del cheque",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_CHANGE_ => "false",
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
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda utilizada",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
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
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL&&operation==INSERT_",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_ORD_ => "85",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "110",
        C_CHANGE_ => "false",
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
        F_ALIAS_ => "Recibido (Administracion)",
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
        F_ALIAS_ => "Recibido (Gerencia)",
        F_HELP_ => "Recibido (Tiene en poder)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Recibido,No Recibido",
        F_BROW_ => "1",
        F_ORD_ => "135",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "__cj_bco",
        F_ALIAS_ => "Forma de Cobro",
        F_HELP_ => "Forma de Cobro",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Caja,Banco",
        F_ORD_ => "140",
        C_SHOW_ => "chq_estado.get()=='Pendiente' || chq_estado.get()=='Cobrado'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cj",
        F_ALIAS_ => "Caja de SUC:",
        F_HELP_ => "Caja de SUC:",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "141",
        F_INLINE_ => "1",
        C_SHOW_ => "__cj_bco.get()=='Caja'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "bcos",
        F_SHOWFIELD_ => "b_cod,b_nombre",
        F_ORD_ => "150",
        F_INLINE_ => "1",
        C_SHOW_ => "__cj_bco.get()=='Banco'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "bco.hasChanged()",
        F_RELTABLE_ => "bcos_ctas",
        F_SHOWFIELD_ => "cta_num,cta_moneda",
        F_LOCALFIELD_ => "dif",
        F_FILTER_ => "'cta_bco='+bco.getStr()",
        F_LENGTH_ => "20",
        F_ORD_ => "160",
        F_INLINE_ => "1",
        C_SHOW_ => "__cj_bco.get()=='Banco'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fechadep",
        F_ALIAS_ => "Fecha de Deposito",
        F_HELP_ => "Fecha de Deposito",
        F_TYPE_ => "date",
        F_ORD_ => "161",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_SHOW_ => "__cj_bco.get()=='Banco'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fechaacred",
        F_ALIAS_ => "Fecha de Acreditacion",
        F_HELP_ => "Fecha de Acreditacion",
        F_TYPE_ => "date",
        F_ORD_ => "161",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_SHOW_ => "__cj_bco.get()=='Banco'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_nro_dep",
        F_ALIAS_ => "Nº de Deposito",
        F_HELP_ => "Nº de Deposito",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_ORD_ => "161",
        C_VIEW_ => "__cj_bco.get()=='Banco'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_nro_rec",
        F_ALIAS_ => "Nº de Recibo",
        F_HELP_ => "Nº de Recibo",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_ORD_ => "161",
        F_INLINE_ => "1",
        C_VIEW_ => "__cj_bco.get()=='Banco'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cmp",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "162",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "diffDate(fechadep.getDate(),|{2009-03-31}|)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Obtiene Nro de caja Abierta de esta Suc",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ __cj.getStr() +' AND cj_estado=|{Abierto}| order by id desc limit 1'",
        F_QUERY_REF_ => "__caja_ref.firstSQL||__cj.hasChanged()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_SHOW_ => "__cj.get()!=''",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_SHOW_ => "__caja_ref.get()=='__NO DATA__'",
        F_FORMULA_ => "'( ! ) No hay referencia de caja Abierta para el dia de la fecha. Favor Abrir Primero!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cobrar",
        F_ALIAS_ => "Cobrar                                   ",
        F_HELP_ => "Cobrar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "190",
        C_SHOW_ => "__cj_bco.get()!='' && chq_estado.get()=='Pendiente' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "_mov_cta",
        F_ALIAS_ => "        Mover a Cuenta Corriente (Depositar)        ",
        F_HELP_ => "Mover a Cuenta Corriente (Depositar en una Cuenta Corriente)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select bcos_ins_asiento('+cta.getStr()+','+fechadep.getStr()+',|{55}|,CONCAT(|{Cobro Cheque Nro }|,'+chq_num.getStr()+',|{ Nro Dep.: }|,'+chq_nro_dep.getStr()+' ),'+chq_valor.getVal()+',0);'",
        F_NODB_ => "1",
        F_ORD_ => "200",
        F_INLINE_ => "1",
        C_SHOW_ => "__cobrar.get()=='Si'&&__cj_bco.get()=='Banco'&&cta.get()!=''",
        C_VIEW_ => "chq_estado.get()=='Pendiente'&&(cmp.getVal()>0)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "_mov_caja",
        F_ALIAS_ => "          Cobrar en Efectivo          ",
        F_HELP_ => "Cobrar en Efectivo",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_ins_asiento('+__caja_ref.getStr()+',NULL,'+__cj.getStr()+',current_date,|{6}|,|{E}|,CONCAT(|{Cobro Cheque Nro }|,'+chq_num.getStr()+'),'+chq_moneda.getStr()+','+chq_valor.getVal()+',0,'+chq_cotiz.getVal()+');'",
        F_NODB_ => "1",
        F_ORD_ => "210",
        F_INLINE_ => "1",
        C_SHOW_ => "__cj_bco.get()=='Caja'&&__cobrar.get()=='Si'&&__caja_ref.get()!='__NO DATA__' && __cj.get()!=''",
        C_VIEW_ => "chq_estado.get()=='Pendiente'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__update",
        F_ALIAS_ => "Cambia estado",
        F_HELP_ => "Cambia estado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update cheq_terceros set chq_estado = |{Cobrado}| where chq_num = '+chq_num.getStr()",
        F_QUERY_REF_ => "(_mov_caja.get()||_mov_cta.get())&&__update.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_SHOW_ => "_mov_caja.get()||_mov_cta.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goBack",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "230",
        C_SHOW_ => "_mov_cta.get()||_mov_caja.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',700);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__delCache",
        F_ALIAS_ => "Clean Cache",
        F_HELP_ => "Clean Cache",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'delete from tmp_caja'",
        F_QUERY_REF_ => "__delCache.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "240",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
