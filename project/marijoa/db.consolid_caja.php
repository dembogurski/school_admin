<?php
$Obj->name = "consolid_caja";
$Obj->alias = "Consolidacion de cajas";
$Obj->help = "Consolidacion de cajas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "consolid_caja";
$Obj->Filter = "";
$Obj->Sort = "fecha desc";
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
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_FORMULA_ => "'Para que se pueda hacer una transferencia monetaria de una caja la caja origen debe estar Cerrada'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha en que se realiza la operación",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "15",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Código del funcionario",
        F_HELP_ => "Código del funcionario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "18",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "transf_de",
        F_ALIAS_ => "Transferir de ",
        F_HELP_ => "Transferir de ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "verif_de",
        F_ALIAS_ => "Verifica que esten cerradas todas las cajas de esta Suc",
        F_HELP_ => "Verifica que esten cerradas todas las cajas de esta Suc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(cj_ref)   FROM  caja WHERE  cj_empr='+ transf_de.getStr() +' AND cj_estado=|{Abierto}|'",
        F_QUERY_REF_ => "transf_de.hasChanged()",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "22",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "caja_de",
        F_ALIAS_ => "Obtiene Referencia de ultima caja cerrada ",
        F_HELP_ => "Obtiene Referencia de ultima caja cerrada ",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT max(cj_ref) FROM  caja WHERE  cj_empr='+ transf_de.getStr() +' AND cj_estado=|{Cerrado}|'",
        F_QUERY_REF_ => "transf_de.hasChanged()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "25",
        C_SHOW_ => "fecha.get()!=''",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "transf_a",
        F_ALIAS_ => "Transferir a ",
        F_HELP_ => "Transferir a ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "caja_a",
        F_ALIAS_ => "Obtiene Referencia de caja Abierta",
        F_HELP_ => "Obtiene Referencia de caja Abierta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT  cj_ref  FROM  caja WHERE  cj_empr='+ transf_a.getStr() +' AND cj_estado=|{Abierto}|'",
        F_QUERY_REF_ => "transf_a.hasChanged()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "31",
        C_SHOW_ => "fecha.get()!=''",
        C_VIEW_ => "false",
        F_MESSAGE_ => " ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg_ok",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_FORMULA_ => "if(verif_de.getVal()<1&&caja_a.getVal()>0){'Puede realzar la operacion de transferencia... '}else{'ATENCION!!! Caja Origen debe estar Cerrada y la del Destino Abierta para transferencias!!!'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda a transferir",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_descri",
        F_BROW_ => "1",
        F_ORD_ => "32",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotiz",
        F_ALIAS_ => "Cotizacion del dia",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+moneda.getStr()+');'",
        F_QUERY_REF_ => "moneda.hasChanged()||cotiz.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "33",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_CHANGE_ => "moneda.hasChanged()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ce_cant from caja_exist where ce_moneda= '+moneda.getStr()+' and ce_ref = '+caja_de.getStr()",
        F_QUERY_REF_ => "moneda.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "35",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_ref",
        F_ALIAS_ => "Monto (Moneda de Referencia)",
        F_HELP_ => "Monto (Moneda de Referencia)",
        F_TYPE_ => "formula",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "38",
        C_CHANGE_ => "moneda.hasChanged()||cotiz.hasChanged()||monto.hasChanged()",
        F_FORMULA_ => "monto.getVal()*cotiz.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "confirmar",
        F_ALIAS_ => "Transferir",
        F_HELP_ => "Transferir",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_QUERY_ => " ",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "monto.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "transferir",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_ins_asiento('+caja_de.getStr()+', null,'+transf_de.getStr()+', current_date,|{5}|,|{S}|,|{Consolidacion de Caja}|, '+moneda.getStr()+',0 ,'+monto.getVal()+', '+cotiz.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "confirmar.get()=='Si'&&caja_a.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "actualiz_caja",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select caja_ins_asiento('+caja_a.getStr()+', null,'+transf_a.getStr()+', current_date,|{5}|,|{E}|,|{Consolidacion de Caja}|, '+moneda.getStr()+','+monto.getVal()+',0, '+cotiz.getVal()+')'",
        F_QUERY_REF_ => "transferir.get()",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "transferir.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__makeInsert",
        F_ALIAS_ => "Fuerza el insert",
        F_HELP_ => "Fuerza el insert",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "transferir.get()&&operation==INSERT_",
        C_VIEW_ => "false",
        F_FORMULA_ => "forceInsert()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "confirmar.get()=='No'",
        F_FORMULA_ => "'Utilize esta area para transeferir todas las monedas de una Caja a Otra!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gs",
        F_ALIAS_ => "Total G$",
        F_HELP_ => "Total G$ en existencia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ce_cant from caja_exist where ce_moneda= |{G$}| and ce_ref = '+caja_de.getStr()",
        F_QUERY_REF_ => "caja_de.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "confirmar.get()=='No'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "us",
        F_ALIAS_ => "Total U$",
        F_HELP_ => "Total U$ en existencia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ce_cant from caja_exist where ce_moneda= |{U$}| and ce_ref = '+caja_de.getStr()",
        F_QUERY_REF_ => "caja_de.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_SHOW_ => "confirmar.get()=='No'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotizus",
        F_ALIAS_ => "Cotizacion del dia Dolares",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio(|{U$}|);'",
        F_QUERY_REF_ => "cotizus.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "135",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rs",
        F_ALIAS_ => "Total R$",
        F_HELP_ => "Total R$ en existencia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ce_cant from caja_exist where ce_moneda= |{R$}| and ce_ref = '+caja_de.getStr()",
        F_QUERY_REF_ => "caja_de.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "confirmar.get()=='No'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotizrs",
        F_ALIAS_ => "Cotizacion del dia Reales",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio(|{R$}|);'",
        F_QUERY_REF_ => "cotizrs.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "145",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ps",
        F_ALIAS_ => "Total P$",
        F_HELP_ => "Total P$ en existencia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ce_cant from caja_exist where ce_moneda= |{P$}| and ce_ref = '+caja_de.getStr()",
        F_QUERY_REF_ => "caja_de.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "150",
        C_SHOW_ => "confirmar.get()=='No'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotizps",
        F_ALIAS_ => "Cotizacion del dia Pesos",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio(|{P$}|);'",
        F_QUERY_REF_ => "cotizps.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "200",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pasar_todo",
        F_ALIAS_ => "Pasar todo",
        F_HELP_ => "Pasar todo",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_ins_asiento('+caja_de.getStr()+', null,'+transf_de.getStr()+', current_date,|{5}|,|{S}|,|{Consolidacion de Caja}|, |{G$}|,0 ,'+gs.getVal()+', 1)'",
        F_NODB_ => "1",
        F_ORD_ => "203",
        C_SHOW_ => "confirmar.get()=='No'&&caja_de.getVal()>0&&caja_a.getVal()>0&&operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pasar_us",
        F_ALIAS_ => "Pasar U$",
        F_HELP_ => "Pasar U$",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select caja_ins_asiento('+caja_de.getStr()+', null,'+transf_de.getStr()+', current_date,|{5}|,|{S}|,|{Consolidacion de Caja}|, |{U$}|,0 ,'+us.getVal()+', '+cotizus.getVal()+')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "us.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pasar_rs",
        F_ALIAS_ => "Pasar R$",
        F_HELP_ => "Pasar R$",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select caja_ins_asiento('+caja_de.getStr()+', null,'+transf_de.getStr()+', current_date,|{5}|,|{S}|,|{Consolidacion de Caja}|, |{R$}|,0 ,'+rs.getVal()+', '+cotizrs.getVal()+')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_SHOW_ => "rs.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pasar_ps",
        F_ALIAS_ => "Pasar P$",
        F_HELP_ => "Pasar P$",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select caja_ins_asiento('+caja_de.getStr()+', null,'+transf_de.getStr()+', current_date,|{5}|,|{S}|,|{Consolidacion de Caja}|, |{P$}|,0 ,'+ps.getVal()+', '+cotizps.getVal()+')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "230",
        C_SHOW_ => "ps.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "act_gs",
        F_ALIAS_ => "Actualizar G$",
        F_HELP_ => "Actualizar G$",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select caja_ins_asiento('+caja_a.getStr()+', null,'+transf_a.getStr()+', current_date,|{5}|,|{E}|,|{Consolidacion de Caja}|, |{G$}|,'+gs.getVal()+',0, 1)'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "240",
        C_SHOW_ => "gs.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "act_us",
        F_ALIAS_ => "Actualizar U$",
        F_HELP_ => "Actualizar U$",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select caja_ins_asiento('+caja_a.getStr()+', null,'+transf_a.getStr()+', current_date,|{5}|,|{E}|,|{Consolidacion de Caja}|, |{U$}|,'+us.getVal()+',0, '+cotizus.getVal()+')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "250",
        C_SHOW_ => "us.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "act_rs",
        F_ALIAS_ => "Actualizar R$",
        F_HELP_ => "Actualizar R$",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select caja_ins_asiento('+caja_a.getStr()+', null,'+transf_a.getStr()+', current_date,|{5}|,|{E}|,|{Consolidacion de Caja}|, |{R$}|,'+rs.getVal()+',0, '+cotizrs.getVal()+')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "260",
        C_SHOW_ => "rs.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "act_ps",
        F_ALIAS_ => "Actualizar P$",
        F_HELP_ => "Actualizar P$",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select caja_ins_asiento('+caja_a.getStr()+', null,'+transf_a.getStr()+', current_date,|{5}|,|{E}|,|{Consolidacion de Caja}|, |{P$}|,'+ps.getVal()+',0, '+cotizps.getVal()+')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "270",
        C_SHOW_ => "ps.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ins_gs",
        F_ALIAS_ => "Insertar en consolidacion de caja",
        F_HELP_ => "Insertar en consolidacion de caja",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'insert into consolid_caja values (default, '+transf_de.getStr()+','+transf_a.getStr()+', '+__user.getStr()+', current_date, '+gs.getVal()+',|{G$}|, 1, '+gs.getVal()+')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "280",
        C_SHOW_ => "gs.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ins_us",
        F_ALIAS_ => "Insertar en consolidacion de caja",
        F_HELP_ => "Insertar en consolidacion de caja",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'insert into consolid_caja values (default, '+transf_de.getStr()+','+transf_a.getStr()+', '+__user.getStr()+', current_date, '+us.getVal()+',|{U$}|, '+cotizus.getVal()+', '+us.getVal()*cotizus.getVal() +')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "285",
        C_SHOW_ => "us.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ins_rs",
        F_ALIAS_ => "Insertar en consolidacion de caja",
        F_HELP_ => "Insertar en consolidacion de caja",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'insert into consolid_caja values (default, '+transf_de.getStr()+','+transf_a.getStr()+', '+__user.getStr()+', current_date, '+rs.getVal()+',|{R$}|, '+cotizrs.getVal()+', '+rs.getVal()*cotizrs.getVal() +')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "290",
        C_SHOW_ => "rs.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ins_ps",
        F_ALIAS_ => "Insertar en consolidacion de caja",
        F_HELP_ => "Insertar en consolidacion de caja",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'insert into consolid_caja values (default, '+transf_de.getStr()+','+transf_a.getStr()+', '+__user.getStr()+', current_date, '+ps.getVal()+',|{P$}|, '+cotizps.getVal()+', '+ps.getVal()*cotizps.getVal() +')'",
        F_QUERY_REF_ => "pasar_todo.get()&&sentinela.getVal()<1",
        F_NODB_ => "1",
        F_ORD_ => "295",
        C_SHOW_ => "ps.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sentinela",
        F_ALIAS_ => "Sentinela",
        F_HELP_ => "Sentinela",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "499",
        C_VIEW_ => "false",
        C_CHANGE_ => "pasar_todo.hasChanged()",
        F_FORMULA_ => "if(pasar_todo.get()){ 1 }else{ 0 }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "509",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
