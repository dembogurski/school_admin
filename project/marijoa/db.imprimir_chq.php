<?php
$Obj->name = "imprimir_chq";
$Obj->alias = "Impresion de Cheques";
$Obj->help = "Impresion de Cheques";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "60",
        G_CHANGE_ => "60"));

$Obj->Add(
    array(
        F_NAME_ => "cta_bco",
        F_ALIAS_ => "Banco",
        F_HELP_ => "Código del banco",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "bcos",
        F_SHOWFIELD_ => "b_nombre",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "serie",
        F_ALIAS_ => "Serie",
        F_HELP_ => "Serie",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "12",
        V_DEFAULT_ => "'%-'",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "nro_ini",
        F_ALIAS_ => "Nº Cheque Inicial",
        F_HELP_ => "Nº Cheque Inicial",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "nro_fin",
        F_ALIAS_ => "Imprimir hasta",
        F_HELP_ => "Imprimir hasta",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "ini",
        F_ALIAS_ => "Nro Inicio",
        F_HELP_ => "Emitido",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "nro_ini.onChange()",
        F_LENGTH_ => "18",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "32",
        C_CHANGE_ => "false",
        F_FORMULA_ => "serie.get()+''+nro_ini.get()",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "final",
        F_ALIAS_ => "Nro final",
        F_HELP_ => "Nro final hasta donde se va a imprimir",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "nro_fin.onChange()",
        F_LENGTH_ => "18",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "34",
        C_CHANGE_ => "false",
        F_FORMULA_ => "if(nro_fin.get()=='' ){ serie.get()+''+nro_ini.get()  }else{ serie.get()+''+nro_fin.get()   }",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "filtro",
        F_ALIAS_ => "Filtro de Estados de Cheques",
        F_HELP_ => "Filtro de Estados de Cheques",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Emitido,Pagado",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "38",
        G_SHOW_ => "8",
        G_CHANGE_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "cheques",
        F_ALIAS_ => "Cheques ",
        F_HELP_ => "Listado de Cheques ",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'chq_estado='+filtro.getStr()",
        F_LINK_ => "db.bcos_chq",
        F_SEND_ => "0",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.imp_chq_bco_reg",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "cta_bco.getVal()==1",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir_cont",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.imp_chq_bco_con",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "cta_bco.getVal()==2",
        G_SHOW_ => "40",
        G_CHANGE_ => "40"));

?>
