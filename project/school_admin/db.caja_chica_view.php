<?php
$Obj->name = "caja_chica_view";
$Obj->alias = "Caja Chica";
$Obj->help = "Registro de Caja Chica";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "caja_chica";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "'insert into caja_chica_mov(id, cj_ref_chi, __date, __user, __moneda, __cotiz, monto, concepto, compl, entrada_ref, salida_ref)values(default, '+cj_ref_chi.getVal()+', current_date, '+cj_user.getStr()+', |{G$}|, 1,'+cj_saldo_ini.getVal()+',|{Saldo Inicial}|, |{}|, '+cj_saldo_ini.getVal()+', 0)'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "60";
$Obj->Add(
    array(
        F_NAME_ => "cj_ref_chi",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Numero de Referencia",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Codigo de la Empresa",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_cod_tesoreria from adm_param'",
        F_QUERY_REF_ => "cj_empr.firstSQL&&operation==INSERT_",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => " ",
        F_FILTER_ => " ",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario que registra esta caja",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_ ",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Obtiene Nro de caja Abierta de esta Suc",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ cj_empr.getStr() +' AND cj_estado=|{Abierto}| order by id desc limit 1'",
        F_QUERY_REF_ => "__caja_ref.firstSQL&&cj_empr.notEmpty()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "26",
        C_SHOW_ => "cj_empr.get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "__caja_ref.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! Favor Abrir Caja...  ' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha del caja",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_saldo_ini",
        F_ALIAS_ => "Saldo Inicial",
        F_HELP_ => "Saldo Inicial",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "40",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_saldo_final",
        F_ALIAS_ => "Saldo Actual o Momentaneo",
        F_HELP_ => "Saldo Final o Momentaneo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  sum(m.entrada_ref) - sum(m.salida_ref) from caja_chica c, caja_chica_mov m where  c.cj_ref_chi = m.cj_ref_chi and c.cj_ref_chi = '+cj_ref_chi.getVal()",
        F_QUERY_REF_ => "cj_saldo_final.firstSQL||operation==SHOW_",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_VIEW_ => "operation!=INSERT_",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado actual",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,Cerrada",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "1024",
        G_CHANGE_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "cj_movs",
        F_ALIAS_ => "Movimientos",
        F_HELP_ => "Movimientos de Caja Chica",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cj_ref_chi='+cj_ref_chi.getVal()",
        F_LINK_ => "db.caja_chica_movv",
        F_SEND_ => "cj_ref_chi.get()",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "cj_ref_chi.notEmpty()&&operation==CHANGE_",
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
        C_SHOW_ => "cj_saldo_ini.getVal()<=0||__caja_ref.get()=='__NO DATA__'",
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
        C_SHOW_ => "cj_saldo_ini.getVal()>0&&__caja_ref.get()!='__NO DATA__'",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
