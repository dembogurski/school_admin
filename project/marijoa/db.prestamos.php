<?php
$Obj->name = "prestamos";
$Obj->alias = "Prestamos";
$Obj->help = "Prestamos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "prestamos";
$Obj->Filter = "";
$Obj->Sort = "nro_prestamo desc";
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
        C_SHOW_ => "operation!=CHANGE_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
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
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "caja_id",
        F_ALIAS_ => "cm_id",
        F_HELP_ => "cm_id",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select _autonum(|{cm_id}|);'",
        F_QUERY_REF_ => "caja_id.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "6",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_prestamo",
        F_ALIAS_ => "Nro Prestamo",
        F_HELP_ => "Nro Prestamo",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "7",
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
        F_ORD_ => "8",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aut_local",
        F_ALIAS_ => "Operaciones en Suc:",
        F_HELP_ => "( ! ) Ud. Realizara operaciones en caja de SUCURSAL:",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "aut_local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_cj_chica",
        F_ALIAS_ => "Caja/CajaChica",
        F_HELP_ => "Caja/CajaChica",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Caja,Caja Chica",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_ref_chica",
        F_ALIAS_ => "Ref Caja Chica",
        F_HELP_ => "Ref Caja Chica",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cj_ref_chi from caja_chica where cj_estado = |{Abierta}| order by id desc limit 1'",
        F_QUERY_REF_ => "cj_cj_chica.get()=='Caja Chica'&&cj_cj_chica.hasChanged()",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
        C_VIEW_ => "cj_cj_chica.get()=='Caja Chica'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_ver_caja",
        F_ALIAS_ => "Verifica si caja esta abierta",
        F_HELP_ => "Verifica si caja esta abierta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ aut_local.getStr() +' AND cj_estado=|{Abierto}| order by id desc limit 1'",
        F_QUERY_REF_ => "aut_local.get()!=''",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_SHOW_ => "aut_local.get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "fact_ver_caja.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "razon",
        F_ALIAS_ => "Nombre o Razon Social",
        F_HELP_ => "Nombre o Razon Social",
        F_TYPE_ => "text",
        F_LENGTH_ => "64",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "21",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Tipo de Moneda ",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_descri",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "22",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__cotiz",
        F_ALIAS_ => "Cotizacion del dia",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio_venta('+__moneda.getStr()+');'",
        F_QUERY_REF_ => "__moneda.hasChanged()||__cotiz.firstSQL",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto",
        F_ALIAS_ => "Monto",
        F_HELP_ => "Monto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_m_ref",
        F_ALIAS_ => "Monto Ref",
        F_HELP_ => "Monto Ref",
        F_TYPE_ => "formula",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "32",
        C_VIEW_ => "false",
        F_FORMULA_ => "monto.getVal()*__cotiz.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_comp",
        F_ALIAS_ => "Comprobante",
        F_HELP_ => "Comprobante",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_REQUIRED_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "operation!=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "120",
        C_SHOW_ => "operation!=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "130",
        V_DEFAULT_ => "'Pendiente'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cancelar",
        F_ALIAS_ => "Cancelar Prestamo",
        F_HELP_ => "Cancelar Prestamo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "132",
        F_INLINE_ => "1",
        C_SHOW_ => "estado.get()=='Pendiente'&&operation==CHANGE_",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "nro_comp2",
        F_ALIAS_ => "Comprobante Cobro",
        F_HELP_ => "Comprobante",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "134",
        C_SHOW_ => "if(estado.get()=='Pendiente'&&operation!=INSERT_&&cancelar.get()=='Si'){true}else if(estado.get()=='Cancelado'&&operation==SHOW_){true}else{false}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs2",
        F_ALIAS_ => "Observacion Cobro",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "135",
        C_SHOW_ => "if(estado.get()=='Pendiente'&&operation!=INSERT_&&cancelar.get()=='Si'){true}else if(estado.get()=='Cancelado'&&operation==SHOW_){true}else{false}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_sal",
        F_ALIAS_ => "Aceptar (Registrar Prestamo)",
        F_HELP_ => "Aceptar (Registrar Salida)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_ins_asiento('+fact_ver_caja.getStr()+', '+caja_id.getVal()+','+aut_local.getStr()+', current_date,|{45-0}|,|{S}|,concat(|{Comprobante: '+nro_comp.get()+' Obs:'+obs.get()+'}|), '+__moneda.getStr()+',0 ,'+monto.getVal()+','+__cotiz.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "500",
        C_SHOW_ => "operation==INSERT_&&cj_cj_chica.get()=='Caja'",
        C_VIEW_ => "allValid",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_salchic",
        F_ALIAS_ => "Aceptar (Registrar Prestamo En Caja Chica)",
        F_HELP_ => "Aceptar (Registrar Salida)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'insert into caja_chica_mov (id, cj_ref_chi, __user, __local, __moneda, __cotiz, monto, entrada_ref, salida_ref, concepto, compl, __date, concepto_princ, con_nombre, subc_nombre, depar)values(default,'+cj_ref_chica.getVal()+',|{'+p_user_+'}|, '+aut_local.getStr()+', '+__moneda.getStr()+', '+__cotiz.getVal()+', '+monto.getVal()+',0, '+monto_m_ref.getVal()+', |{45-0}|, concat(|{Comprobante: '+nro_comp.get()+' Obs:'+obs.get()+'}|), current_date,|{45}|, |{Pestamos}|, |{Pestamo}|, |{Administracion}|)'",
        F_NODB_ => "1",
        F_ORD_ => "505",
        C_SHOW_ => "operation==INSERT_&&cj_cj_chica.get()=='Caja Chica'",
        C_VIEW_ => "allValid",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "makeInsert_",
        F_ALIAS_ => "Make Insert",
        F_HELP_ => "Make Insert",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "510",
        C_SHOW_ => "aceptar_sal.get()||aceptar_salchic.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "forceInsert()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "forma",
        F_ALIAS_ => "Forma de Cobro",
        F_HELP_ => "Forma de Cobro",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Caja,Cheque",
        F_NODB_ => "1",
        F_ORD_ => "520",
        C_SHOW_ => "operation==CHANGE_&& estado.get()=='Pendiente'&&cancelar.get()=='Si'",
        C_VIEW_ => "estado.get()=='Pendiente'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Realizar Operacionen SUC:",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "525",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'03'",
        C_SHOW_ => "operation==CHANGE_&& estado.get()=='Pendiente'&&cancelar.get()=='Si'&&forma.get()=='Caja'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_chq",
        F_ALIAS_ => "Registrar un Cheque?",
        F_HELP_ => "Registrar un Cheque",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si,Ya se ha Registrado un cheque",
        F_NODB_ => "1",
        F_ORD_ => "530",
        F_INLINE_ => "1",
        C_SHOW_ => "forma.get()=='Cheque'&&operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_ter",
        F_ALIAS_ => "Registrar Cheque",
        F_HELP_ => "Registrar Cheque",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'chq_ref = '+nro_prestamo.getStr()",
        F_LINK_ => "db.cheq_terins",
        F_SEND_ => "nro_prestamo.get()",
        F_NODB_ => "1",
        F_ORD_ => "540",
        C_SHOW_ => "gen_chq.get()=='Si'&&operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_ent",
        F_ALIAS_ => "Aceptar (Cobrar en Efectivo)",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select caja_ins_asiento('+fact_ver_caja.getStr()+', '+caja_id.getVal()+','+empr.getStr()+', current_date,|{45-0}|,|{E}|,concat(|{Cobro Prestamo '+razon.get()+' Comprobante: '+nro_comp2.get()+' Obs:'+obs2.get()+'}|), '+__moneda.getStr()+','+monto.getVal()+' ,0,'+__cotiz.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "600",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&!aceptar_ent.get()",
        C_VIEW_ => "allValid && forma.get()=='Caja' && estado.get()=='Pendiente' && cancelar.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_cheque",
        F_ALIAS_ => "Nº Cheque",
        F_HELP_ => "Nº Cheque",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_ORD_ => "630",
        C_SHOW_ => "if(estado.get()=='Pendiente'&&operation!=INSERT_&&cancelar.get()=='Si'&&forma.get()=='Cheque'){true}else if(estado.get()=='Cancelado'&&operation==SHOW_){true}else{false}",
        C_VIEW_ => "gen_chq.get()=='Ya se ha Registrado un cheque'||estado.get()=='Cancelado'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nombre_de",
        F_ALIAS_ => "Beneficiario",
        F_HELP_ => "Beneficiario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select chq_nombre_de from cheq_terceros where chq_num = '+nro_cheque.getStr()+' limit 1'",
        F_QUERY_REF_ => "nro_cheque.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "640",
        F_INLINE_ => "1",
        C_SHOW_ => "forma.get()=='Cheque'&&operation==CHANGE_&&estado.get()=='Pendiente'&&nro_cheque.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "valor_chq",
        F_ALIAS_ => "Valor",
        F_HELP_ => "Valor",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select chq_moneda_ref from cheq_terceros where chq_num = '+nro_cheque.getStr()+' limit 1'",
        F_QUERY_REF_ => "nro_cheque.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "641",
        F_INLINE_ => "1",
        C_SHOW_ => "forma.get()=='Cheque'&&operation==CHANGE_&&estado.get()=='Pendiente'&&nro_cheque.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_pres_x_ch",
        F_ALIAS_ => "Monto de Prestamos cubiertos por este Cheque",
        F_HELP_ => "Monto de Prestamos cubiertos por este Cheque",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(monto_m_ref) from prestamos where nro_cheque = '+nro_cheque.getStr()",
        F_QUERY_REF_ => "nro_cheque.hasChanged()||monto_pres_x_ch.firstSQL",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "645",
        C_VIEW_ => "operation!=INSERT_&&nro_cheque.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aceptar_chq",
        F_ALIAS_ => "Cancelar con cheque",
        F_HELP_ => "Cancelar con cheque",
        F_TYPE_ => "proc",
        F_QUERY_ => "'Select 1 + 1'",
        F_NODB_ => "1",
        F_ORD_ => "648",
        F_INLINE_ => "1",
        C_SHOW_ => "nro_cheque.get()!=''&&nombre_de.get()!=''&&nombre_de.get()!='__NO DATA__'&&valor_chq.getVal()>=monto_pres_x_ch.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__update",
        F_ALIAS_ => "Cambia estado",
        F_HELP_ => "Cambia estado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update prestamos set estado = |{Cancelado}|, nro_comp2 = '+nro_comp2.getStr()+',obs2 = '+obs2.getStr()+'    where nro_prestamo = '+nro_prestamo .getVal()",
        F_QUERY_REF_ => "aceptar_ent.get()",
        F_NODB_ => "1",
        F_ORD_ => "650",
        C_SHOW_ => "operation==CHANGE_ && !__update.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__updateCHQ",
        F_ALIAS_ => "Cambia estado",
        F_HELP_ => "Cambia estado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update prestamos set estado = |{Cancelado}|, nro_comp2 = '+nro_comp2.getStr()+',obs2 = '+obs2.getStr()+', nro_cheque = '+nro_cheque .getStr()+'  where nro_prestamo = '+nro_prestamo .getVal()",
        F_QUERY_REF_ => "aceptar_chq.get()",
        F_NODB_ => "1",
        F_ORD_ => "800",
        C_SHOW_ => "operation==CHANGE_ && !__updateCHQ.get()",
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
        F_ORD_ => "900",
        C_SHOW_ => "valor_chq.getVal()<monto_pres_x_ch.getVal()&&nro_cheque.get()!=''",
        C_VIEW_ => "operation==CHANGE_&&estado.get()=='Pendiente'",
        F_FORMULA_ => "'( ! ) Valor de Prestamos cubiertos mayor al valor del cheque.!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goback",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "999",
        C_SHOW_ => "aceptar_ent.get()||aceptar_chq.get()||aceptar_salchic.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload(); setTimeout('self.close()',1000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
