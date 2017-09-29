<?php
$Obj->name = "bcos_chq";
$Obj->alias = "Cheques";
$Obj->help = "Cheques";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "bcos_chq";
$Obj->Filter = "";
$Obj->Sort = "id DESC";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "200";
$Obj->Add(
    array(
        F_NAME_ => "chq_cta",
        F_ALIAS_ => "Cuenta",
        F_HELP_ => "Cuenta",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Banco",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda utilizada",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "18",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_num",
        F_ALIAS_ => "Numero",
        F_HELP_ => "Numero del cheque",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_emis",
        F_ALIAS_ => "Fecha Emisión",
        F_HELP_ => "Fecha Emisión",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "40",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "chq_estado.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_pag",
        F_ALIAS_ => "Fecha Pgto",
        F_HELP_ => "Fecha de pagamento del cheque",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "chq_estado.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_valor",
        F_ALIAS_ => "Valor",
        F_HELP_ => "Valor del cheque",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "chq_estado.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_monto_utili",
        F_ALIAS_ => "Monto Utilizado",
        F_HELP_ => "Monto Utilizado",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_ORD_ => "62",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_conc",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto de cheque",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_ORD_ => "65",
        C_VIEW_ => "chq_estado.get()!='Abierto'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_benef",
        F_ALIAS_ => "Beneficiario",
        F_HELP_ => "Beneficiario",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "chq_estado.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_oper",
        F_ALIAS_ => "Operación",
        F_HELP_ => "Operación a efectuar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Anular,Borrar",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_SHOW_ => "chq_estado.get()!='Pagado'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_mot_anul",
        F_ALIAS_ => "Anulación",
        F_HELP_ => "Motivo de Anulación",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "chq_estado.get()=='Anulado'||chq_oper.get()=='Anular'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_aut_anular",
        F_ALIAS_ => "Anular",
        F_HELP_ => "Anular",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",No,Si",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "82",
        C_VIEW_ => "chq_oper.get()=='Anular'&&chq_mot_anul.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_anula",
        F_ALIAS_ => "Anular",
        F_HELP_ => "Anular",
        F_TYPE_ => "proc",
        F_QUERY_ => "'UPDATE bcos_chq SET chq_estado=|{Anulado}|, chq_mot_anul='+chq_mot_anul.getStr()+' WHERE chq_num='+chq_num.getStr()+' AND chq_cta='+chq_cta.getStr()",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "84",
        C_VIEW_ => "chq_aut_anular.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_conf_borrar",
        F_ALIAS_ => "Confirme para borrar",
        F_HELP_ => "Confirme para borrar el cheque",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",NO,Si",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "85",
        C_SHOW_ => "chq_oper.get()=='Borrar'",
        C_VIEW_ => "chq_estado.get()==''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_borrar",
        F_ALIAS_ => "Borrar",
        F_HELP_ => "Borrar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'DELETE FROM bcos_chq WHERE chq_num='+chq_num.getStr()+' AND chq_cta='+chq_cta.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "86",
        C_SHOW_ => "chq_conf_borrar.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_formato",
        F_ALIAS_ => "Formato",
        F_HELP_ => "Formato",
        F_TYPE_ => "text",
        F_ORD_ => "88",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_mult",
        F_ALIAS_ => "Utilizar para pago Multiple",
        F_HELP_ => "Utilizar para pago Multiple",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si",
        F_ORD_ => "89",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_tipo",
        F_ALIAS_ => "Tipo Al Dia/Diferido",
        F_HELP_ => "Tipo Al Dia/Diferido",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_x_factura",
        F_ALIAS_ => "Emitido x Factura",
        F_HELP_ => "Emitido x Factura",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_ORD_ => "94",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "95",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableAccept",
        F_ALIAS_ => "Inhabilita Accept",
        F_HELP_ => "Inhabilita Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
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
        F_ORD_ => "110",
        C_SHOW_ => "chq_anula.get()==true",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.location.reload()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goBack",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "chq_borrar.get()==true",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',100)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
