<?php
$Obj->name = "caja_x_suc_aper";
$Obj->alias = "Apertura y Cierre de Cajas de Esta Sucursal";
$Obj->help = "Apertura y Cierre de Cajas de Esta Sucursal";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "caja";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'SELECT caja_abrir('+cj_empr.getStr()+', '+cj_fecha.getStr()+')'";
$Obj->p_change = "'update caja_mov set cm_id = id'";
$Obj->p_delete = "";
$Obj->Zebra = "white, lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "cj_empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Codigo de la Empresa",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "20",
        F_FORMULA_ => "sup['__local']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Numero de Referencia",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "5",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nombre_suc",
        F_ALIAS_ => "Nombre Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select emp_nombre from par_empresas where emp_cod like '+cj_empr.getStr()",
        F_QUERY_REF_ => "nombre_suc.firstSQL",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_SHOW_ => "cj_empr.get()!=''",
        C_CHANGE_ => "false",
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
        F_NAME_ => "cj_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado actual",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "35",
        V_DEFAULT_ => "'Abierto'",
        C_VIEW_ => "operation!=INSERT_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_verifica",
        F_ALIAS_ => "Verificaci�n",
        F_HELP_ => "Verifica el estado del caja",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT caja_verifica( '+cj_fecha.getStr()+', '+cj_empr.getStr()+')' ",
        F_QUERY_REF_ => "cj_fecha.hasChanged()||cj_empr.hasChanged()||cj_verifica.firstSQL",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "cj_empr.get()!=''",
        C_VIEW_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_anterior",
        F_ALIAS_ => "Saldo Anterior",
        F_HELP_ => "Saldo Anterior",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cj_saldo as cj_anterior FROM caja WHERE cj_empr='+cj_empr.getStr()+'  and cj_estado = |{Cerrado}| ORDER BY id DESC LIMIT 1'",
        F_QUERY_REF_ => "operation!=INSERT_&&((cj_anterior.firstSQL||cj_empr.hasChanged()))",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "operation!=CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_entrada",
        F_ALIAS_ => "Entradas",
        F_HELP_ => "Entradas del dia",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "operation!=INSERT_&&operation!=CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_salida",
        F_ALIAS_ => "Salidas",
        F_HELP_ => "Salidas del dia",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "operation!=INSERT_&&operation!=CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_saldo",
        F_ALIAS_ => "Saldo ",
        F_HELP_ => "Saldo final",
        F_TYPE_ => "formula",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "100",
        C_VIEW_ => "operation!=INSERT_&&operation!=CHANGE_",
        F_FORMULA_ => "cj_anterior.getVal()-cj_salida.getVal()+cj_entrada.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_aut_abrir",
        F_ALIAS_ => "Abrir caja",
        F_HELP_ => "Abrir caja para ese d�a?",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "cj_verifica.get()=='Autorizado'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_conf_abrir",
        F_ALIAS_ => "Confirme",
        F_HELP_ => "Confirme para abrir",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "115",
        C_SHOW_ => "cj_aut_abrir.get()=='Si'",
        C_VIEW_ => "cj_ref.notEmpty()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_aut_cerrar",
        F_ALIAS_ => "Autoriza Cierre",
        F_HELP_ => "Autoriza Cierre",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "cj_estado.get()=='Abierto'",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_conf_cerrar",
        F_ALIAS_ => "Confirme",
        F_HELP_ => "Confirme cierre de caja - IRREVERS�BLE",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "125",
        C_SHOW_ => "cj_aut_cerrar.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_det",
        F_ALIAS_ => "Detalles",
        F_HELP_ => "Detalles del caja",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cm_ref='+cj_ref.getStr()+' order by id DESC'",
        F_LINK_ => "db.caja_mov",
        F_SEND_ => "cj_ref.get()",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_SHOW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_cerrar",
        F_ALIAS_ => "Cierra Caja",
        F_HELP_ => "Cierra Caja actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT caja_cerrar('+cj_ref.getStr()+', '+cj_fecha.getStr()+', '+cj_empr.getStr()+')'",
        F_QUERY_REF_ => "cj_conf_cerrar.get()=='Si'&&cj_cerrar.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "145",
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
        F_ORD_ => "150",
        C_SHOW_ => "cj_cerrar.get()=='1'||cj_conf_abrir.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',1000);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableAccept",
        F_ALIAS_ => "Inhabilita Accept",
        F_HELP_ => "Inhabilita Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita bot�n de borrar",
        F_HELP_ => "Inhabilita bot�n de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "310",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__insertar",
        F_ALIAS_ => "Inserta registro",
        F_HELP_ => "Inserta registro",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'insert into  caja (id, cj_ref, cj_empr, cj_fecha, cj_estado, cj_anterior, cj_entrada, cj_salida, cj_saldo)values(default,'+cj_ref.getVal()+','+ cj_empr.getStr()+',current_date, |{Abierto}|, '+ cj_anterior.getVal()+', 0, 0, '+ cj_anterior.getVal()+')'",
        F_QUERY_REF_ => "cj_conf_abrir.get()=='Si'&&__insertar.firstSQL",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "330",
        C_SHOW_ => "cj_conf_abrir.get()=='Si'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__insertar2",
        F_ALIAS_ => "Inserta registro",
        F_HELP_ => "Inserta registro",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT caja_abrir('+cj_empr.getStr()+', '+cj_fecha.getStr()+')'",
        F_QUERY_REF_ => "__insertar.get()=='__NO DATA__'&&__insertar2.firstSQL",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "340",
        C_SHOW_ => "__insertar.get()=='__NO DATA__'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "update_cmid",
        F_ALIAS_ => "update_cmid",
        F_HELP_ => "update_cmid",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update caja_mov set cm_id = id'",
        F_QUERY_REF_ => "update_cmid.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "350",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_corr_saldo",
        F_ALIAS_ => "Corrige Saldo",
        F_HELP_ => "Corrige",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select caja_corregir_saldo('+cj_ref.getVal()+')'",
        F_QUERY_REF_ => "cj_corr_saldo.firtsSQL",
        F_NODB_ => "1",
        F_ORD_ => "360",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__close",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "370",
        C_SHOW_ => "cj_estado.get()=='Cerrado'",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('self.close()',3000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
