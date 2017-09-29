<?php
$Obj->name = "pagos_adelantad";
$Obj->alias = "Pagos Adelantados";
$Obj->help = "Pagos Adelantados";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "pagos_adelantados";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_orden",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº de Orden de Cobro",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
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
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ref_caja",
        F_ALIAS_ => "Caja",
        F_HELP_ => "Verificar si caja esta Abierto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cj_ref from caja where  cj_empr = '+__local.getStr()+' and cj_estado = |{Abierto}| limit 1'",
        F_QUERY_REF_ => "__local.hasChanged()&&__local.get()!=''",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "8",
        C_VIEW_ => "false",
        F_POSVAL_ => "ref_caja.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja Abierta para esta Fecha!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_func",
        F_ALIAS_ => "Buscar Funcionario",
        F_HELP_ => "Busca al Funcionario",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_func_cod",
        F_ALIAS_ => "Funcionario",
        F_HELP_ => "Código y nombre compledo del Funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_func.hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_fullname LIKE |{%'+busc_func.get()+'%}| ORDER BY func_cod'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_func_nomb",
        F_ALIAS_ => "Nombre del funcionario",
        F_HELP_ => "Nombre del funcionario",
        F_TYPE_ => "text",
        F_QUERY_ => "'select func_fullname from mnt_func where func_cod = '+desc_func_cod.getStr()+' '",
        F_QUERY_REF_ => "desc_func_cod.hasChanged()",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "35",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desc_monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "65",
        G_CHANGE_ => "65"));

$Obj->Add(
    array(
        F_NAME_ => "desc_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado del Descuento (Pendiente o Cancelado) ",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "50",
        V_DEFAULT_ => "'Pendiente'",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_cj_bco",
        F_ALIAS_ => "Forma de Pago",
        F_HELP_ => "Forma de Pago",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Caja,Banco,Caja Chica",
        F_NODB_ => "1",
        F_ORD_ => "52",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_cj",
        F_ALIAS_ => "Afectar a Caja de la Sucursal:",
        F_HELP_ => "Caja de SUC:",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "53",
        F_INLINE_ => "1",
        C_SHOW_ => "sue_cj_bco.get()!='Banco'",
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
        F_NODB_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        C_SHOW_ => "sue_cj_bco.get()=='Banco'",
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
        F_NODB_ => "1",
        F_ORD_ => "55",
        F_INLINE_ => "1",
        C_SHOW_ => "sue_cj_bco.get()=='Banco'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_cj_ref",
        F_ALIAS_ => "Caja Ref",
        F_HELP_ => "Caja Ref",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cj_ref from caja where cj_estado = |{Abierto}| and cj_fecha = current_date and cj_empr = '+sue_cj.getStr()+' order by id desc limit 1'",
        F_QUERY_REF_ => "sue_cj.hasChanged()&&sue_cj.get()!=''&&sue_cj_bco.get()=='Caja'",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "56",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_chica_ref",
        F_ALIAS_ => "Caja Chica Ref",
        F_HELP_ => "Caja Ref",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cj_ref_chi from caja_chica where cj_estado = |{Abierta}| AND cj_tipo =  |{Empresa}| AND cj_empr = '+sue_cj.getStr()+' order by id desc limit 1'",
        F_QUERY_REF_ => "sue_cj_bco.get()=='Caja Chica'&&sue_cj.hasChanged()",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "56",
        C_SHOW_ => "sue_cj_bco.get()=='Caja Chica'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg_chica",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "58",
        C_SHOW_ => "cj_chica_ref.get()=='__NO DATA__'&& sue_cj.get()!=''",
        F_FORMULA_ => "'( ! ) No hay referencia de Caja chica Abierta para el dia de la fecha. Favor Abrir Primero!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg_caja",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "(sue_cj_ref.get()=='__NO DATA__' || sue_cj_ref.get()=='') && sue_cj.get()!='' && sue_cj_bco.get()=='Caja' ",
        F_FORMULA_ => "'( ! ) No hay referencia de Caja  Abierta para el dia de la fecha en esta Sucursal Favor Abrir Primero!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario que hace el pago adelantado",
        F_HELP_ => "Usuario que hace el pago adelantado",
        F_TYPE_ => "formula",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_ ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "confirmar",
        F_ALIAS_ => "Confirmar Pago Adelantado",
        F_HELP_ => "Confirmar Pago Adelantado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_QUERY_ => " ",
        F_NODB_ => "1",
        F_ORD_ => "65",
        C_SHOW_ => "desc_monto.getVal()>0&&operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pago_ins_caja",
        F_ALIAS_ => "Aceptar (Pagar en Efectivo)",
        F_HELP_ => "Aceptar Caja",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT gen_mult_pago_adel('+desc_func_cod.getStr()+','+desc_func_nomb.getStr()+','+desc_monto.getVal()+' ,'+usuario.getStr()+', 1 ,'+sue_cj_ref.getStr()+','+sue_cj.getStr()+','+fecha.getStr()+')'",
        F_BROW_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_SHOW_ => "desc_monto.getVal()>0&&sue_cj_ref.get()!='__NO DATA__'&&confirmar.get()=='Si'&&sue_cj.get()!=''",
        C_VIEW_ => "sue_cj_bco.get()=='Caja'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pago_ins_cchica",
        F_ALIAS_ => "Aceptar (Efectivo Caja Chica)",
        F_HELP_ => "Aceptar Caja Chica",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT gen_mult_pago_adelcc('+desc_func_cod.getStr()+','+desc_func_nomb.getStr()+','+desc_monto.getVal()+' ,'+usuario.getStr()+', 1 ,'+cj_chica_ref.getStr()+','+__local.getStr()+','+fecha.getStr()+')'",
        F_BROW_ => "1",
        F_ORD_ => "71",
        C_SHOW_ => "desc_monto.getVal()>0&&sue_cj_ref.get()!='__NO DATA__'&&confirmar.get()=='Si'&&sue_cj_bco.get()=='Caja Chica'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pago_ins_cta",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar Cta. Cte.",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT gen_mult_pago_adelbc('+desc_func_cod.getStr()+','+desc_func_nomb.getStr()+','+desc_monto.getVal()+' ,'+usuario.getStr()+', 1 ,'+cta.getStr()+','+__local.getStr()+','+fecha.getStr()+')'",
        F_BROW_ => "1",
        F_ORD_ => "72",
        C_SHOW_ => "desc_monto.getVal()>0&&confirmar.get()=='Si'&&sue_cj_bco.get()=='Banco'&&cta.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "pago_ins_caja.get()||pago_ins_cchica.get()||pago_ins_cta.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.location.reload()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
