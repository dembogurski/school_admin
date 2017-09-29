<?php
$Obj->name = "chq_terceros_in";
$Obj->alias = "Cheques de Terceros";
$Obj->help = "Cheques de Terceros";
$Obj->copy_from = "";
$Obj->Inheritance = "cheq_terceros";
$Obj->File = "cheq_terceros";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "";
$Obj->Limit = "";


$Obj->Add(
    array(
        F_NAME_ => "chq_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_REQUIRED_ => "1",
        F_ORD_ => "3",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_nombre_de",
        F_ALIAS_ => "Titular",
        F_HELP_ => "Nombre de ",
        F_TYPE_ => "text",
        F_LENGTH_ => "100",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "chq_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo Al Dia, Diferido",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Al Dia,Diferido",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
		C_VIEW_ => "true",
        F_ORD_ => "14",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Suc",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "formula",        
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "85",
        C_VIEW_ => "true",
		F_FORMULA_ => "sup['sue_cj']",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		
$Obj->Add(
    array(
        F_NAME_ => "chq_docs",
        F_ALIAS_ => "Documentos al que Afecta",
        F_HELP_ => "Documentos al que Afecta este Cheque",
        F_TYPE_ => "formula",
        F_LENGTH_ => "600",
        F_BROW_ => "1",
        F_ORD_ => "20",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "'Factura Nro: '+sup['dp_fact_nro']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "chq_monto_util",
        F_ALIAS_ => "Monto Utilizado",
        F_HELP_ => "Monto Utilizado",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_ORD_ => "30",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "chq_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Cobrado,Devolvido,Anulado",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
		C_VIEW_ => "false",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

		
		
$Obj->Add(
    array(
        F_NAME_ => "chq_recibido",
        F_ALIAS_ => "Recibido (Administracion)",
        F_HELP_ => "Recibido (Tiene en poder)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No Recibido,Recibido",
        F_BROW_ => "",
        F_ORD_ => "130",
		C_VIEW_ => "false",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "chq_recibido2",
        F_ALIAS_ => "Recibido (Gerencia)",
        F_HELP_ => "Recibido (Tiene en poder)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",No Recibido,Recibido",
        F_BROW_ => "",
        F_ORD_ => "140",
        C_VIEW_ => "false",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "chq_fecha_ins",
        F_ALIAS_ => "Fecha Registro",
        F_HELP_ => "Fecha Registro",
        F_TYPE_ => "date",
        F_BROW_ => "",
        F_ORD_ => "150",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	
		
$Obj->Add(
    array(
        F_NAME_ => "chq_docs",
        F_ALIAS_ => "Documentos al que Afecta",
        F_HELP_ => "Documentos al que Afecta este Cheque",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "800",
		F_BROW_ => "",
        F_ORD_ => "160",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		
		

?>
