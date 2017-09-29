<?php
$Obj->name = "caja_mov";
$Obj->alias = "Movimiento de caja";
$Obj->help = "Movimiento de caja";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "caja_mov";
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
        F_NAME_ => "cm_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_id",
        F_ALIAS_ => "Identificador",
        F_HELP_ => "Identificador",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_ORD_ => "15",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa",
        F_TYPE_ => "formula",
        F_LENGTH_ => "2",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        F_FORMULA_ => "sup['cj_empr']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha del movimiento",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        F_FORMULA_ => "sup['cj_fecha']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_con",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto de caja",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_descri",
        F_FILTER_ => "'cjc_autom!=|{Si}| ORDER BY cjc_cod'",
        F_LENGTH_ => "5",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "db('cb_fecha')==''",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_n_con",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_descri",
        F_RELFIELD_ => "cjc_cod",
        F_LOCALFIELD_ => "cm_con",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "45",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_le_con",
        F_ALIAS_ => "le_concepto",
        F_HELP_ => "Le concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CONCAT(cjc_cod,|{ - }|,cjc_descri),cjc_compl, cjc_tipo, cjc_autom FROM caja_con WHERE cjc_cod='+cm_con.getStr()",
        F_QUERY_REF_ => "cm_con.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "db('cb_fecha')!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "formula",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        F_FORMULA_ => "db('cjc_tipo')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select floor(rand() * 10000)'",
        F_QUERY_REF_ => "cm_compl.firstSQL&&operation==INSERT_",
        F_LENGTH_ => "100",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "db('cjc_compl')=='Si'",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "cm_cambio.getVal()==cm_mult.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_moneda_2",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda - Solo lectura",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "85",
        C_VIEW_ => "cm_cambio.getVal()!=cm_mult.getVal()",
        C_CHANGE_ => "false",
        F_FORMULA_ => "cm_moneda.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_le_moneda",
        F_ALIAS_ => "Le Moneda",
        F_HELP_ => "Le Moneda",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT * FROM caja_cambios WHERE cb_fecha='+cm_fecha.getStr()+' AND cb_moneda='+cm_moneda.getStr() ",
        F_QUERY_REF_ => "cm_moneda.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_mult",
        F_ALIAS_ => "Multiplicador",
        F_HELP_ => "Multiplicador",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_VIEW_ => "false",
        F_FORMULA_ => "cm_le_moneda.get()=='__NO DATA__'?1:(cm_tipo.get()=='E'?db('cb_venta'):db('cb_compra'))",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_entrada",
        F_ALIAS_ => "Entrada",
        F_HELP_ => "Entrada",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "104",
        C_VIEW_ => "cm_tipo.get()=='E'",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_salida",
        F_ALIAS_ => "Salida",
        F_HELP_ => "Salida",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "108",
        C_VIEW_ => "cm_tipo.get()=='S'",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_cambio",
        F_ALIAS_ => "Cambio",
        F_HELP_ => "Cambio",
        F_TYPE_ => "formula",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "operation==INSERT_",
        C_CHANGE_ => "!cm_mult.hasChanged()",
        F_FORMULA_ => "cm_mult.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_entrada_ref",
        F_ALIAS_ => "Entrada ref",
        F_HELP_ => "Valor Referencia",
        F_TYPE_ => "formula",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "120",
        C_VIEW_ => "cm_tipo.get()=='E'&&cm_entrada.getVal()>0&&operation==INSERT_",
        F_FORMULA_ => "cm_cambio.getVal()*cm_entrada.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_salida_ref",
        F_ALIAS_ => "Salida ref",
        F_HELP_ => "Valor Referencia",
        F_TYPE_ => "formula",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "130",
        C_VIEW_ => "cm_tipo.get()=='S'&&cm_salida.getVal()>0&&operation==INSERT_",
        F_FORMULA_ => "cm_cambio.getVal()*cm_salida.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_estado",
        F_ALIAS_ => "Estado (Saldo)",
        F_HELP_ => "Saldo en ese momento",
        F_TYPE_ => "text",
        F_LENGTH_ => "18",
        F_DEC_ => "2",
        F_ORD_ => "136",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_conf",
        F_ALIAS_ => "Confira",
        F_HELP_ => "Confira con atención",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "cm_cambio.get()!=''&&operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_insertar",
        F_ALIAS_ => "Insertar",
        F_HELP_ => "Insertar el asiento en el caja",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT caja_ins_asiento('+cm_ref.getStr()+', '+cm_id.getStr()+', '+cm_empr.getStr()+', '+cm_fecha.getStr()+', '+cm_con.getStr()+', '+cm_tipo.getStr()+', '+cm_compl.getStr()+', '+cm_moneda.getStr()+', '+cm_entrada.getStr()+', '+cm_salida.getStr()+', '+cm_cambio.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "150",
        C_SHOW_ => "allValid&&cm_entrada.getVal()+cm_salida.getVal()!=0",
        C_VIEW_ => "operation==INSERT_&&cm_compl.get()!=''",
        F_POSVAL_ => "cm_insertar.getVal()>=0",
        F_MESSAGE_ => "'CAJA NO PUEDE QUEDARSE NEGATIVO'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_aut_del",
        F_ALIAS_ => "Borrar Registro",
        F_HELP_ => "Borrar Registro",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",No,Si,Talvez,No sé",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_del",
        F_ALIAS_ => "Borrar",
        F_HELP_ => "Borrar",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT caja_del_asiento('+cm_id.getStr()+')'",
        F_QUERY_REF_ => "cm_aut_del.get()=='Si'&&cm_del.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "operation==CHANGE_",
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
        F_ORD_ => "190",
        C_SHOW_ => "cm_del.get()=='1' ",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',100)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableAccept",
        F_ALIAS_ => "Inhabilita Accept",
        F_HELP_ => "Inhabilita Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "cm_insertar.get()=='1'",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.location.reload()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
