<?php
$Obj->name = "bcos_ctas";
$Obj->alias = "Cuentas Bancarias";
$Obj->help = "Cuentas Bancarias";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "bcos_ctas";
$Obj->Filter = "";
$Obj->Sort = "cta_bco,cta_num";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "cta_bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Código del banco",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "bcos",
        F_SHOWFIELD_ => "b_nombre",
        F_LENGTH_ => "10",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_n_banco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "bcos",
        F_SHOWFIELD_ => "b_nombre",
        F_RELFIELD_ => "b_cod",
        F_LOCALFIELD_ => "cta_bco",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_num",
        F_ALIAS_ => "Numero",
        F_HELP_ => "Numero de la cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_busc",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "21",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_cta_cont",
        F_ALIAS_ => "Codigo Cuenta Contable",
        F_HELP_ => "Codigo Cuenta Contable",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "cta_busc.hasChanged()",
        F_RELTABLE_ => "plan_cuentas",
        F_SHOWFIELD_ => "c_cod,c_descrip",
        F_FILTER_ => "'c_descrip like |{'+cta_busc.get()+'%}| limit 30'",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "22",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de cuenta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Cuenta Corriente,Ahorro,Outro",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda Utilizada",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_descri",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "40",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_ent",
        F_ALIAS_ => "Entidad",
        F_HELP_ => "Entidad",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "*,Particular",
        F_BROW_ => "1",
        F_ORD_ => "42",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_saldo",
        F_ALIAS_ => "Saldo",
        F_HELP_ => "Saldo de la cuenta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT SUM(ctd_entrada - ctd_salida) FROM bcos_ctas_det WHERE ctd_cta = '+cta_num.getStr()",
        F_QUERY_REF_ => "cta_saldo.firstSQL",
        F_LENGTH_ => "20",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "45",
        C_SHOW_ => "openSubform==false",
        C_VIEW_ => "operation!=INSERT_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_fecha_mov",
        F_ALIAS_ => "Filtro Fecha",
        F_HELP_ => "Filtro Fecha",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "48",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_mov_compl",
        F_ALIAS_ => "Filtro Complemento",
        F_HELP_ => "Filtro Complemento",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "49",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_det",
        F_ALIAS_ => "Movimientos",
        F_HELP_ => "Detalle de movimiento",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'ctd_cta='+cta_num.getStr()+' and ctd_fecha like |{'+cta_fecha_mov.get()+'%}| and  ctd_compl  like  concat(|{%}|,'+cta_mov_compl.getStr()+',|{%}|)  '",
        F_LINK_ => "db.bcos_ctas_det",
        F_SEND_ => "cta_num.get()",
        F_NODB_ => "1",
        F_ORD_ => "55",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_cheques",
        F_ALIAS_ => "Cheques Abiertos",
        F_HELP_ => "Cheques",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'chq_cta='+cta_num.getStr()+' AND chq_estado=|{Abierto}| '",
        F_LINK_ => "db.bcos_chq",
        F_SEND_ => "cta_num.get()",
        F_NODB_ => "1",
        F_ORD_ => "56",
        C_SHOW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_gen_chq",
        F_ALIAS_ => "Generar cheques",
        F_HELP_ => "Generar cheques",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_chq_ini",
        F_ALIAS_ => "Cheque Inicial",
        F_HELP_ => "Cheque Inicial",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "cta_gen_chq.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_chq_serie",
        F_ALIAS_ => "Serie",
        F_HELP_ => "Serie",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_SHOW_ => "cta_gen_chq.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_chq_tipo",
        F_ALIAS_ => "Tipo de Cheque",
        F_HELP_ => "Tipo de Cheque",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Al Dia,Diferido",
        F_NODB_ => "1",
        F_ORD_ => "78",
        C_SHOW_ => "cta_gen_chq.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_num_chq",
        F_ALIAS_ => "Número de cheques",
        F_HELP_ => "Número de cheques",
        F_TYPE_ => "text",
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "cta_gen_chq.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_formato",
        F_ALIAS_ => "Formato de Cheque",
        F_HELP_ => "Formato de Cheque",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "cta_bco.hasChanged()||cta_formato.firstSQL",
        F_RELTABLE_ => "chq_formatos",
        F_SHOWFIELD_ => "chq_cod,chq_descrip",
        F_FILTER_ => "'chq_banco = '+cta_bco.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "85",
        C_SHOW_ => "cta_gen_chq.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_conf",
        F_ALIAS_ => "Confirme",
        F_HELP_ => "Confirme con atención",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "cta_gen_chq.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_gen",
        F_ALIAS_ => "GENERAR CHEQUES",
        F_HELP_ => "GENERAR los cheques",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT bcos_gen_cheques('+cta_chq_ini.getStr()+', '+cta_num_chq.getStr()+', '+cta_bco.getStr()+', '+cta_num.getStr()+', '+cta_moneda.getStr()+', '+cta_chq_serie.getStr()+','+cta_formato.getVal()+','+cta_chq_tipo.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "cta_gen_chq.get()=='Si'&&cta_chq_ini.getVal()*cta_num_chq.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cta_temp",
        F_ALIAS_ => "Saldo Temporal",
        F_HELP_ => "Saldo Temporal - Uso interno",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_ORD_ => "110",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "cta_gen.get()==true",
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
        F_ORD_ => "130",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
