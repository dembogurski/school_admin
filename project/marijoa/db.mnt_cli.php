<?php
$Obj->name = "mnt_cli";
$Obj->alias = "Clientes";
$Obj->help = "Clientes";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_cli";
$Obj->Filter = "";
$Obj->Sort = "cli_fullname";
$Obj->p_insert = "";
$Obj->p_change = "'select makeLog_(|{MODIFICAR}|,|{CLIENTE NRO '+cli_ci.get()+' CAT '+cli_cat.get()+' }|,|{'+p_user_+'}|)'";
$Obj->p_delete = "'select makeLog_(|{BORRAR}|,|{CLIENTE NRO '+cli_ci.get()+'}|,|{'+p_user_+'}|)'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "100";
$Obj->Add(
    array(
        F_NAME_ => "cli_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_ci",
        F_ALIAS_ => "Nro Cédula o R.U.C.",
        F_HELP_ => "Nro Cédula del Cliente o R.U.C.",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_dip_ci",
        F_ALIAS_ => "Cédula Diplomatica",
        F_HELP_ => "Nro Cédula Diplomatica",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_BROW_ => "1",        
        F_ORD_ => "21",        
        G_SHOW_ => "64",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_id",
        F_ALIAS_ => "ID",
        F_HELP_ => "ID",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select id from mnt_cli where  cli_ci= '+cli_ci.getStr()",
        F_QUERY_REF_ => "cli_id.firstSQL",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_ci_ant",
        F_ALIAS_ => "CI TMP",
        F_HELP_ => "CI TMP",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cli_ci from mnt_cli where cli_ci = '+cli_ci.getStr()",
        F_QUERY_REF_ => "cli_ci_ant.firstSQL",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
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
        F_QUERY_REF_ => "cli_ci.hasChanged()",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgc",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "16",
        C_SHOW_ => "verif.getVal()>0",
        F_FORMULA_ => "if(verif.getVal()>0){'( ! ) Nro C.I. R.U.C. Ya Existe en la Base de Datos!!!' }else{'Ok'}",
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
        F_ORD_ => "20",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_suc",
        F_ALIAS_ => "Sucursal Alta",
        F_HELP_ => "Sucursal Alta",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_cat",
        F_ALIAS_ => "Categoría",
        F_HELP_ => "Categoría del Cliente",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "categorias",
        F_SHOWFIELD_ => "cat_code,cat_descrip",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_vend",
        F_ALIAS_ => "Vendedor Asignado",
        F_HELP_ => "Vendedor Asignado",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_tipo",
        F_ALIAS_ => "Tipo de Cliente",
        F_HELP_ => "Tipo de Cliente",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_tipo_cli",
        F_SHOWFIELD_ => "cod_tipo,''",
        F_ORD_ => "41",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_prom",
        F_ALIAS_ => "Codigo de Promedio",
        F_HELP_ => "Codigo de Promedio",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_prom_comp",
        F_SHOWFIELD_ => "cod_prom,descrip",
        F_ORD_ => "42",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_limit",
        F_ALIAS_ => "Limite de Credito",
        F_HELP_ => "Limite de Credito",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_REQUIRED_ => "1",
        F_ORD_ => "44",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_nro_cta",
        F_ALIAS_ => "Nº de Cuenta Corriente",
        F_HELP_ => "Nº de Cuenta Corriente del cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_fecha_nac",
        F_ALIAS_ => "Fecha Nacimiento",
        F_HELP_ => "Fecha Nacimiento",
        F_TYPE_ => "date",
        F_ORD_ => "50",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_tel1",
        F_ALIAS_ => "Telefono 1",
        F_HELP_ => "Telefono 1",
        F_TYPE_ => "text",
        F_LENGTH_ => "13",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_tel2",
        F_ALIAS_ => "Telefono 2",
        F_HELP_ => "Telefono 2",
        F_TYPE_ => "text",
        F_LENGTH_ => "13",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_emai",
        F_ALIAS_ => "Email",
        F_HELP_ => "Email",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_ORD_ => "70",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "pais",
        F_ALIAS_ => "Pais",
        F_HELP_ => "Pais",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Paraguay,Brasil,Argentina,Otro",
        F_ORD_ => "100",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "dep_estado",
        F_ALIAS_ => "Departamento/Estado",
        F_HELP_ => "Departamento/Estado",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_ORD_ => "110",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "ciudad",
        F_ALIAS_ => "Ciudad",
        F_HELP_ => "Ciudad",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_dir",
        F_ALIAS_ => "Dirección",
        F_HELP_ => "Dirección",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "300",
        F_BROW_ => "1",
        F_ORD_ => "130",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_convenios",
        F_ALIAS_ => "Convenios",
        F_HELP_ => "Convenios",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'us_ci='+el['cli_ci'].getStr()",
        F_LINK_ => "db.us_conv",
        F_SEND_ => "el['cli_ci'].get()",
        F_RELTABLE_ => "cli_conv",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "allValid",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "cli_fecha_ins",
        F_ALIAS_ => "Fecha Alta",
        F_HELP_ => "Fecha Alta",
        F_TYPE_ => "date",
        F_ORD_ => "150",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "2236424",
        G_CHANGE_ => "2236424"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(p_user_!='Developer'){disableDeleteButton()}else{enableDeleteButton()}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "verif.getVal()>0 || cli_ci.get()=='80005190-4'",
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
        F_ORD_ => "180",
        C_SHOW_ => "verif.getVal()<1 && cli_ci.get()!='80005190-4'",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
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
        F_NAME_ => "cli_auths",
        F_ALIAS_ => "Lista de Autorizacion",
        F_HELP_ => "Lista de Autorizacion",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cli_ruc='+cli_ci.getStr()",
        F_LINK_ => "db.autorizados",
        F_SEND_ => "cli_ci.get()",
        F_NODB_ => "1",
        F_ORD_ => "210",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
 		
?>
