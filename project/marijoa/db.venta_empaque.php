<?php
$Obj->name = "venta_empaque";
$Obj->alias = "Venta de Productos en Empaque";
$Obj->help = "Venta de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "factura";
$Obj->Filter = "";
$Obj->Sort = "fact_nro desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "1";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "fact_nro",
        F_ALIAS_ => "Nº de Factura",
        F_HELP_ => "Nº de Factura",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "3",
        F_UNIQ_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_no_delete",
        F_ALIAS_ => "Desabilitar boton borrar",
        F_HELP_ => "Desabilitar boton borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_no_change",
        F_ALIAS_ => "Desabilitar boton Modificar",
        F_HELP_ => "Desabilitar boton Modificar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de emisión de la factura",
        F_TYPE_ => "date",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "12",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_localidad",
        F_ALIAS_ => "           Suc:",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cli_ci",
        F_ALIAS_ => "Nº C.I. o R.U.C.",
        F_HELP_ => "Nº Cédula o R.U.C. del cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_REQUIRED_ => "1",
        F_ORD_ => "43",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nom_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Nombre completo del cliente",
        F_TYPE_ => "text",
        F_SHOWFIELD_ => " ",
        F_RELFIELD_ => " ",
        F_LOCALFIELD_ => " ",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cont_deta",
        F_ALIAS_ => "Reglones",
        F_HELP_ => "Contar cantidad de detalles de esta factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(df_renglon) from det_factura where df_fact_num ='+fact_nro.getVal() ",
        F_QUERY_REF_ => "false",
        F_LENGTH_ => "5",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "52",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "openSubform",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_items",
        F_ALIAS_ => "Cantidad de Items?",
        F_HELP_ => "Cantidad de Items?",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "53",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_empaquetador",
        F_ALIAS_ => "Empaquetador",
        F_HELP_ => "Codigo del Empaquetador",
        F_TYPE_ => "formula",
        F_LENGTH_ => "16",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "true",
        C_VIEW_ => "true",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_vend_cod",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Codigo y nombre compledo del Vendedor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "16",
        F_REQUIRED_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "fact_empaque.get()=='No'&&fact_estado.get()=='Abierta'",
        C_VIEW_ => "true",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "func_nombre",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Nombre del funcionario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select func_fullname from mnt_func where func_cod = '+fact_vend_cod.getStr()+' '",
        F_QUERY_REF_ => "func_nombre.firstSQL",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_detalle",
        F_ALIAS_ => "Detalle de Factura",
        F_HELP_ => "Detalle de Factura",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'df_fact_num='+fact_nro.get()",
        F_LINK_ => "db.det_factura_emp",
        F_SEND_ => "el['fact_nro'].get()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "121",
        C_SHOW_ => "fact_nro.getVal()!=''&&fact_cont_deta.get()==fact_items.get()",
        C_VIEW_ => "fact_cont_deta.get()==fact_items.get()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "open_sub",
        F_ALIAS_ => "Abre Subformulario",
        F_HELP_ => "Abre Subformulario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "122",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{fact_detalle}|).setAttribute(|{hidden}|,|{false}|);  document.getElementById(|{hbox_fact_detalle}|).setAttribute(|{height}|,|{260}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "doclick",
        F_ALIAS_ => "click",
        F_HELP_ => "Contro click",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "123",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( !openSubform   ){ document.getElementById(|{cap`fact_detalle`Detalle de Factura}|).click(); openSubform=true; }",
        G_SHOW_ => "1",
));

$Obj->Add(
    array(
        F_NAME_ => "bloqueo",
        F_ALIAS_ => "Bloqueo de boton consult",
        F_HELP_ => "Bloqueo de boton consult",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "151",
        C_SHOW_ => "bloqueo.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_empaque",
        F_ALIAS_ => "Revisado por Empaque",
        F_HELP_ => "Revisado por Empaque",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_LENGTH_ => "5",
        F_ORD_ => "159",
        C_SHOW_ => "fact_cont_deta.get()==fact_items.get()",
        C_VIEW_ => "fact_estado.get()=='Empaque'&&operation==CHANGE_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cont_revis",
        F_ALIAS_ => "Items Revisados",
        F_HELP_ => "Revisados",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(id) as cant from det_factura where df_fact_num = '+fact_nro.getVal()+' and df_estado = |{Revisado}| '",
        F_QUERY_REF_ => "false",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "160",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'0'",
        C_VIEW_ => "openSubform",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_total",
        F_ALIAS_ => "Total a Pagar ",
        F_HELP_ => "Importe total de la factura",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_VIEW_ => "fact_estado.get()=='Empaque'",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_mov_fact",
        F_ALIAS_ => "Confirmar (Revisado por Empaque)",
        F_HELP_ => "Confirmar (Revisado por Empaque)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT controlado_emp('+fact_empaquetador.getStr()+','+fact_nro.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "161",
        C_SHOW_ => "!fact_mov_fact.get()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_estado",
        F_ALIAS_ => "Estado de la Factura",
        F_HELP_ => "Estado de la Factura",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "En_caja,Abierta",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "162",
        V_DEFAULT_ => "'Abierta'",
        C_VIEW_ => "operation==CHANGE_&&fact_empaque.get()=='Si'&&fact_estado.get()=='En_caja' ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__goback",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "191",
        C_SHOW_ => "fact_mov_fact.get() ",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload(); setTimeout('self.close()',500)",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__log",
        F_ALIAS_ => "Make Log",
        F_HELP_ => "Make Log",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select makeLog_(|{MODIFICAR}|,concat(|{Empaque -> Caja Nro: }|,'+fact_nro.getVal()+'),'+fact_vend_cod.getStr()+')'",
        F_QUERY_REF_ => "fact_mov_fact.get()",
        F_NODB_ => "1",
        F_ORD_ => "211",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_sent",
        F_ALIAS_ => "Sentinela",
        F_HELP_ => "Sentinela",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select 1+1 '",
        F_QUERY_REF_ => "fact_empaque.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "221",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

?>
