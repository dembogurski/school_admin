<?php
$Obj->name = "asientos_det";
$Obj->alias = "Detalle de Asientos";
$Obj->help = "Detalle de Asientos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "asientos_det";
$Obj->Filter = "";
$Obj->Sort = "nro_orden asc";
$Obj->p_insert = "'SELECT asiento_corr_saldos('+codigo.getStr()+', '+fecha.getStr()+', '+suc.getStr()+')'";
$Obj->p_change = "'SELECT asiento_corr_saldos('+codigo.getStr()+', '+fecha.getStr()+', '+suc.getStr()+')'";
$Obj->p_delete = "'SELECT asiento_corr_saldos('+codigo.getStr()+', '+fecha.getStr()+', '+suc.getStr()+')'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "nro_as",
        F_ALIAS_ => "Nº Asiento",
        F_HELP_ => "Nº",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_ORD_ => "4",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['suc']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_orden",
        F_ALIAS_ => "Nº de Orden",
        F_HELP_ => "Nº de Orden",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) + 1 from asientos_det where nro_as = '+nro_as.getVal() ",
        F_QUERY_REF_ => "operation==INSERT_&&nro_orden.firstSQL",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "12",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_cuenta",
        F_ALIAS_ => "Buscar Cuenta",
        F_HELP_ => "Buscar Cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta",
        F_ALIAS_ => "cta",
        F_HELP_ => "cta",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_cuenta.hasChanged()",
        F_RELTABLE_ => "plan_cuentas",
        F_SHOWFIELD_ => "c_descrip,''",
        F_FILTER_ => "'c_descrip like |{'+busc_cuenta.get()+'%}| or c_cod = '+busc_cuenta.getStr()+' and c_acent = |{Si}|'",
        F_LENGTH_ => "20",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select c_cod, c_int, c_nivel,c_db_hb,c_tipo from plan_cuentas where c_descrip = '+cta.getStr()+' '",
        F_QUERY_REF_ => "cta.hasChanged()",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cuenta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "plan_cuentas",
        F_SHOWFIELD_ => "c_descrip",
        F_RELFIELD_ => "c_cod",
        F_LOCALFIELD_ => "codigo",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "62",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_db_hb",
        F_ALIAS_ => "Debe/Haber",
        F_HELP_ => "Debe/Haber",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "64",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('c_db_hb')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_ORD_ => "64",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['fecha']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "integr",
        F_ALIAS_ => "Cuenta Integradora",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select c_descrip from plan_cuentas where c_cod = '+c_int.getStr()+' '",
        F_QUERY_REF_ => "c_int.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "68",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_int",
        F_ALIAS_ => "Cuenta Integradora",
        F_HELP_ => "Cuenta Integradora",
        F_TYPE_ => "formula",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "69",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "db('c_int')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_tipo",
        F_ALIAS_ => "Tipo de Cuenta",
        F_HELP_ => "Tipo de Cuenta",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        F_FORMULA_ => "db('c_tipo')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "db_hb",
        F_ALIAS_ => "Debe/Haber",
        F_HELP_ => "Debe/Haber",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Debe,Haber",
        F_NODB_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(debe) from asientos_det where nro_as = '+nro_as.getVal()",
        F_QUERY_REF_ => "db_hb.hasChanged()&&db_hb.get()=='Haber'",
        F_LENGTH_ => "18",
        F_DEC_ => "2",
        F_ORD_ => "95",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo_ant_suc",
        F_ALIAS_ => "Saldo Ant Suc",
        F_HELP_ => "Saldo Ant Suc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT saldo_suc FROM asientos_cont a, asientos_det d WHERE a.nro_as = d.nro_as AND d.nro_as < '+nro_as.getVal()+' AND codigo = '+codigo.getStr()+' and a.suc = '+suc.getStr()+' and a.fecha <= |{'+sup['fecha']+'}|  ORDER BY a.fecha desc limit 1'",
        F_QUERY_REF_ => "(codigo.hasChanged()|| saldo_ant.firstSQL)&&nro_as.get()!=''",
        F_LENGTH_ => "18",
        F_DEC_ => "2",
        F_ORD_ => "95",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo_ant",
        F_ALIAS_ => "Saldo Anterior",
        F_HELP_ => "Saldo Anterior",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT saldo FROM asientos_cont a, asientos_det d WHERE a.nro_as = d.nro_as AND d.nro_as < '+nro_as.getVal()+' AND codigo = '+codigo.getStr()+' and a.fecha <= |{'+sup['fecha']+'}|  ORDER BY a.fecha desc limit 1'",
        F_QUERY_REF_ => "(codigo.hasChanged()|| saldo_ant_suc.firstSQL)&&nro_as.get()!=''",
        F_LENGTH_ => "18",
        F_DEC_ => "2",
        F_ORD_ => "96",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "debe",
        F_ALIAS_ => "Debe",
        F_HELP_ => "Debe",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "18",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "100",
        F_FORMULA_ => "if(db_hb.get()=='Debe'){monto.getVal()}else{0}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "haber",
        F_ALIAS_ => "Haber",
        F_HELP_ => "Haber",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "18",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        F_FORMULA_ => "if(db_hb.get()=='Haber'){monto.getVal()}else{0}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo_suc",
        F_ALIAS_ => "Saldo x Suc",
        F_HELP_ => "Saldo Suc",
        F_TYPE_ => "formula",
        F_LENGTH_ => "18",
        F_DEC_ => "2",
        F_ORD_ => "115",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(c_tipo.get()=='Activo' || c_tipo.get()=='Egresos'){ saldo_ant_suc.getVal() + debe.getVal() - haber.getVal() }else{  saldo_ant_suc.getVal() + haber.getVal() - debe.getVal() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo",
        F_ALIAS_ => "Saldo",
        F_HELP_ => "Saldo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "18",
        F_DEC_ => "2",
        F_ORD_ => "120",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(c_tipo.get()=='Activo' || c_tipo.get()=='Egresos'){ saldo_ant.getVal() + debe.getVal() - haber.getVal() }else{  saldo_ant.getVal() + haber.getVal() - debe.getVal() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
