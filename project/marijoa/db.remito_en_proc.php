<?php
$Obj->name = "remito_en_proc";
$Obj->alias = "Nota de Remision en Proceso";
$Obj->help = "Nota de Remision";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "nota_remision";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "rem_nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Numero del remito",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "5",
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
        F_ORD_ => "7",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de emisión del remito",
        F_TYPE_ => "date",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_origen",
        F_ALIAS_ => "Origen",
        F_HELP_ => "Origen",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "' true order by emp_cod'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "12",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_dir_origen",
        F_ALIAS_ => "Direccion de Origen",
        F_HELP_ => "Direccion de Origen",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_nombre",
        F_RELFIELD_ => "emp_cod",
        F_LOCALFIELD_ => "rem_origen",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "12",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_destino",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Destino",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "' true order by emp_cod'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_dir_destino",
        F_ALIAS_ => "Direccion de Destino",
        F_HELP_ => "Direccion de Destino",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_nombre",
        F_RELFIELD_ => "emp_cod",
        F_LOCALFIELD_ => "rem_destino",
        F_LENGTH_ => "30",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_busc_vend",
        F_ALIAS_ => "Buscar Funcionario a Responsabilizar",
        F_HELP_ => "Buscar Funcionario Responsable",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "14",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_vend_cod",
        F_ALIAS_ => "Responsable",
        F_HELP_ => "Código y nombre compledo del funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "rem_busc_vend.hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_fullname LIKE |{'+rem_busc_vend.get()+'%}| ORDER BY func_cod LIMIT 20'",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_ORD_ => "15",
        F_POSVAL_ => "rem_origen.get()==''&&rem_destino.get()==''||rem_origen.get()!=rem_destino.get()",
        F_MESSAGE_ => "'El Origen del producto no puede ser igual al Destino. Por vavor cambie el destino!!!.'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_func_nombre",
        F_ALIAS_ => "Nombre del funcionario",
        F_HELP_ => "Nombre del funcionario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select func_fullname from mnt_func where func_cod = '+rem_vend_cod.getStr()+' '",
        F_QUERY_REF_ => "rem_vend_cod.hasChanged()",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "18",
        F_INLINE_ => "1",
        C_VIEW_ => "operation==CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_abrir",
        F_ALIAS_ => "Volver a Abrir",
        F_HELP_ => "Volver a Abrir",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "19",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "208",
        G_CHANGE_ => "208"));

$Obj->Add(
    array(
        F_NAME_ => "rem_conf",
        F_ALIAS_ => "Confirmar Abrir",
        F_HELP_ => "Confirmar Abrir",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update nota_remision set rem_estado = |{Abierta}| where rem_nro = '+rem_nro.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "19",
        F_INLINE_ => "1",
        C_SHOW_ => "rem_abrir.get()=='Si'",
        G_SHOW_ => "208",
        G_CHANGE_ => "208"));

$Obj->Add(
    array(
        F_NAME_ => "rem_receive",
        F_ALIAS_ => "             Puntear p/Recibir             ",
        F_HELP_ => "Recibir Productos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rem_recibir",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_SHOW_ => "operation==CHANGE_ ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_detalle",
        F_ALIAS_ => "Detalle del remito",
        F_HELP_ => "Detalle del remito",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'rem_nro='+rem_nro.get()",
        F_LINK_ => "db.remito_det_recib",
        F_SEND_ => "rem_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_SHOW_ => "rem_nro.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado Abierta, En Proceso, Cerrada",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_ORD_ => "210",
        V_DEFAULT_ => "'Abierta'",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_aceptar",
        F_ALIAS_ => "Aceptar (Finalizar Remision)",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_OPTIONS_ => "rem_nro integer, rem_origen varchar(5), rem_destino varchar(5), rem_cod_func varchar(8), rem_func_nombre varchar(60), rem_dir_destino varchar(50), rem_dir_origen varchar(50)",
        F_QUERY_ => "'SELECT genera_nota_remision('+rem_nro.getStr()+','+rem_origen.getStr()+','+rem_destino.getStr()+','+rem_vend_cod.getStr()+','+rem_func_nombre.getStr()+' ,'+rem_dir_destino.getStr()+','+rem_dir_origen.getStr()+')' ",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_SHOW_ => "openSubform&&rem_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_total_recib",
        F_ALIAS_ => "Productos Punteados",
        F_HELP_ => "Total recibido",
        F_TYPE_ => "text",
        F_MULTI_ => "1.14",
        F_LENGTH_ => "60",
        F_ORD_ => "240",
        C_VIEW_ => "operation==CHANGE_&&!rem_actualizar.get()&&rem_estado.get()=='En Proceso'&&txt.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "60",
        F_ORD_ => "240",
        C_VIEW_ => "operation==CHANGE_&&rem_estado.get()=='En Proceso'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "txt",
        F_ALIAS_ => "Recibir x Punteo en TXT",
        F_HELP_ => "Recibir Todos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "251",
        C_SHOW_ => "operation==CHANGE_&&rem_estado.get()=='En Proceso'",
        G_SHOW_ => "268435472",
        G_CHANGE_ => "268435472"));

$Obj->Add(
    array(
        F_NAME_ => "accept_all",
        F_ALIAS_ => "Recibir Todos",
        F_HELP_ => "Recibir Todos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "251",
        C_SHOW_ => "operation==CHANGE_&&!accept_all_conf.get()&&txt.get()=='Si'",
        G_SHOW_ => "268435472",
        G_CHANGE_ => "268435472"));

$Obj->Add(
    array(
        F_NAME_ => "accept_all_conf",
        F_ALIAS_ => "Confirmar Recibir Todos ",
        F_HELP_ => "Confirmar Recibir Todos los productos",
        F_TYPE_ => "proc",
        F_QUERY_ => "'UPDATE mnt_prod p, remito_det d SET marcar = |{Recibido}|,p_local = '+__local.getStr()+' WHERE  p.p_cod = d.df_cod_prod AND d.rem_nro = '+rem_nro.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "252",
        F_INLINE_ => "1",
        C_SHOW_ => "accept_all.get()=='Si'&&!accept_all_conf.get()",
        G_SHOW_ => "268435472",
        G_CHANGE_ => "268435472"));

$Obj->Add(
    array(
        F_NAME_ => "__msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "70",
        F_NODB_ => "1",
        F_ORD_ => "252",
        C_SHOW_ => "accept_all_conf.get()",
        F_FORMULA_ => "'( ! ) Ok todos los productos han sido recibidos puede finalizar!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "finalizar",
        F_ALIAS_ => "Finalizar",
        F_HELP_ => "Finalizar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "253",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_tot_piez",
        F_ALIAS_ => "TOTAL DE PIEZAS",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from remito_det where rem_nro = '+rem_nro.get()+' '",
        F_QUERY_REF_ => "rem_tot_piez.firstSQL",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "255",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_recib",
        F_ALIAS_ => "Cant. Recibida",
        F_HELP_ => "Cant. Recibida",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from remito_det where rem_nro = '+rem_nro.get()+' and marcar = |{Recibido}| AND kg_rec > 0'",
        F_QUERY_REF_ => "finalizar.hasChanged()",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "256",
        F_INLINE_ => "1",
        C_SHOW_ => "finalizar.get()=='Si'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_proceder",
        F_ALIAS_ => "         Recibir estos productos         ",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.recibir_prods",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => " operation==CHANGE_&&rem_total_recib.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_imprimir",
        F_ALIAS_ => "             Imprimir             ",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.nota_remision",
        F_NODB_ => "1",
        F_ORD_ => "260",
        F_INLINE_ => "1",
        C_SHOW_ => " rem_aceptar.get()||operation==CHANGE_ ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_actualizar",
        F_ALIAS_ => "             Terminar             ",
        F_HELP_ => "Actualiza los cambios",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cierra_remision('+rem_nro.getVal()+','+rem_total_recib.getStr()+','+rem_obs.getStr()+','+rem_receptor.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "265",
        F_INLINE_ => "1",
        C_SHOW_ => "(operation==CHANGE_&&rem_estado.get()=='En Proceso')&&(rem_destino.get()==__local.get())",
        C_VIEW_ => "cant_recib.getVal() > 0 && finalizar.get()=='Si' && (cant_recib.getVal() == rem_tot_piez.getVal())",
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
        F_ORD_ => "266",
        C_SHOW_ => "finalizar.get()=='Si' && (cant_recib.getVal() < rem_tot_piez.getVal())",
        F_FORMULA_ => "'( ! ) Debe marcar todos los productos como Recibido para poder Finalizar'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_receptor",
        F_ALIAS_ => "Funcionario que recibe",
        F_HELP_ => "Funcionario que recibe",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "270",
        C_VIEW_ => "false",
        F_FORMULA_ => "|{'+p_user_+'}|",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "280",
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
        F_ORD_ => "300",
        C_SHOW_ => "rem_estado.get()!='Abierta'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "60",
        G_CHANGE_ => "60"));

$Obj->Add(
    array(
        F_NAME_ => "rem_meg",
        F_ALIAS_ => "Mensage!!!",
        F_HELP_ => "Mensage!!!",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "310",
        C_SHOW_ => " rem_destino.get()!=__local.get()",
        F_FORMULA_ => "'La Nota de Remision solo se puede Cerrar o Dar por Terminada en el Destino!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style1",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "410",
        C_SHOW_ => "finalizar.get()=='Si' && (cant_recib.getVal() < rem_tot_piez.getVal())",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{__msg}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:18px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style2",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "410",
        C_SHOW_ => " rem_destino.get()!=__local.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{rem_meg}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:18px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goback",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "420",
        C_SHOW_ => "rem_actualizar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',800)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
