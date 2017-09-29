<?php
$Obj->name = "mnt_cli_insv";
$Obj->alias = "Clientes (Ventas)";
$Obj->help = "Clientes";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_cli";
$Obj->Filter = "";
$Obj->Sort = "cli_fullname";
$Obj->p_insert = "";
$Obj->p_change = "'select makeLog_(|{MODIFICAR}|,|{CLIENTE NRO '+cli_ci.get()+'}|,|{'+p_user_+'}|)'";
$Obj->p_delete = "'select makeLog_(|{BORRAR}|,|{CLIENTE NRO '+cli_ci.get()+'}|,|{'+p_user_+'}|)'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "10";
$Obj->Add(
    array(
        F_NAME_ => "cli_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_ci_s",
        F_ALIAS_ => "Nro Cédula o R.U.C.",
        F_HELP_ => "Nro Cédula del Cliente o R.U.C.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(|{'+sup['fact_busc_cli']+'}|,|{}|)'",
        F_QUERY_REF_ => "cli_ci_s.firstSQL",
        F_LENGTH_ => "16",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_POSVAL_ => "cli_ci_s.validCIMarijoa()",
        F_MESSAGE_ => "'Nro Cedula Invalido!!! No se aceptan caracteres especiales ni espacios...'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "tipo_doc",
        F_ALIAS_ => "Tipo Documento",
        F_HELP_ => "Tipo Documento",
        F_TYPE_ => "select_list",
		F_REQUIRED_ => "1",
        F_OPTIONS_ => ",CI,DNI,RG,Passaporte,Otro",
		V_DEFAULT_ => "''",
        F_ORD_ => "11",
		 F_NODB_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			
		
$Obj->Add(
    array(
        F_NAME_ => "cli_ci",
        F_ALIAS_ => "Nro Cédula o R.U.C.",
        F_HELP_ => "Nro Cédula o R.U.C.",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_BROW_ => "1",
        F_ORD_ => "12",
		C_CHANGE_ => "false",
        F_INLINE_ => "1",
        C_SHOW_ => "", 
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	       
		
$Obj->Add(
    array(
        F_NAME_ => "verif",
        F_ALIAS_ => "Verificacion de Cliente",
        F_HELP_ => "Verificacion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(cli_ci) from mnt_cli where cli_ci ='+cli_ci.getStr()",
        F_QUERY_REF_ => "cli_ci.hasChanged()&&cli_ci.getVal()>0",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_SHOW_ => "cli_ci.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "msg0",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "16",
        C_SHOW_ => "!cli_ci_s.validCIMarijoa()",
        F_FORMULA_ => "'Nro Cedula Invalido!!! No se aceptan caracteres especiales ni espacios...'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_fullname",
        F_ALIAS_ => "Nombre y Apellido",
        F_HELP_ => "Nombre y Apellido del Cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_cat",
        F_ALIAS_ => "Categoría",
        F_HELP_ => "Categoría del Cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "21",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'1'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg1",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "22",
        C_VIEW_ => "!cli_fullname.validNameMarijoa()&&cli_fullname.get()!=''   ",
        F_FORMULA_ => "'Nombre Invalido!!! No se aceptan caracteres especiales ni Numeros'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_fecha_nac",
        F_ALIAS_ => "Fecha Nacimiento",
        F_HELP_ => "Fecha Nacimiento",
        F_TYPE_ => "date",
        F_ORD_ => "46",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_tel1",
        F_ALIAS_ => "Telefono 1",
        F_HELP_ => "Telefono 1",
        F_TYPE_ => "text",
        F_LENGTH_ => "13",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_tel2",
        F_ALIAS_ => "Telefono 2",
        F_HELP_ => "Telefono 2",
        F_TYPE_ => "text",
        F_LENGTH_ => "13",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_emai",
        F_ALIAS_ => "Email",
        F_HELP_ => "Email",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));


		
$Obj->Add(
    array(
        F_NAME_ => "pais",
        F_ALIAS_ => "Pais",
        F_HELP_ => "Pais",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Paraguay,Brasil,Argentina,Otro",
        F_ORD_ => "71",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "dep_estado",
        F_ALIAS_ => "Departamento/Estado",
        F_HELP_ => "Departamento/Estado",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_ORD_ => "83",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ciudad",
        F_ALIAS_ => "Ciudad",
        F_HELP_ => "Ciudad",
        F_TYPE_ => "text",
        F_LENGTH_ => "73",
        F_BROW_ => "1",
        F_ORD_ => "84",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "cli_dir",
        F_ALIAS_ => "Dirección",
        F_HELP_ => "Dirección",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "300",
        F_BROW_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "verif.getVal()>0||!cli_ci_s.validCIMarijoa() || cli_ci.get()=='80005190-4'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__unlock",
        F_ALIAS_ => "Desbloquea el boton Insert/Accept",
        F_HELP_ => "Desbloqueael boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "verif.getVal()<1&&cli_ci_s.validCIMarijoa() && cli_ci.get()!='80005190-4' ",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_fecha_ins",
        F_ALIAS_ => "Fecha Alta",
        F_HELP_ => "Fecha Alta",
        F_TYPE_ => "date",
        F_ORD_ => "150",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_suc",
        F_ALIAS_ => "Sucursal Alta",
        F_HELP_ => "Sucursal Alta",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_ORD_ => "160",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "sup['fact_localidad']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_vend",
        F_ALIAS_ => "Vendedor Asignado",
        F_HELP_ => "Vendedor Asignado",
        F_TYPE_ => "formula",
        F_LENGTH_ => "24",
        F_ORD_ => "170",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "sup['fact_vend_cod']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_cta_cont",
        F_ALIAS_ => "Codigo Cuenta Contable",
        F_HELP_ => "Codigo Cuenta Contable",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_ORD_ => "180",
        V_DEFAULT_ => "'1.01.03.01.01'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_ocupacion",
        F_ALIAS_ => "Ocupacion del cliente",
        F_HELP_ => "Ocupacion del cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_ORD_ => "190",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_situacion",
        F_ALIAS_ => "Situacion",
        F_HELP_ => "Situacion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Dependiente,Independiente",
        F_ORD_ => "200",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style0",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_SHOW_ => "!cli_ci.validCIMarijoa()",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msg0}|).setAttribute(|{style}|,|{height:24px;color:red;font-size:14px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style1",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_SHOW_ => "!cli_fullname.validNameMarijoa()&&cli_fullname.get()!=''",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msg1}|).setAttribute(|{style}|,|{height:24px;color:red;font-size:14px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "dv",
        F_ALIAS_ => "dv",
        F_HELP_ => "dv",
        F_TYPE_ => "formula",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "302",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(tipo_doc.get()!='CI' ){   setValue('cli_ci',cli_ci_s.get())   }else{  setValue('cli_ci',cli_ci_s.get()+|{-}|+calcularDV( cli_ci_s.get() )) }    ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

?>
