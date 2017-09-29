<?php
$Obj->name = "mnt_cli_filtro";
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_ci",
        F_ALIAS_ => "Nro Cédula o R.U.C.",
        F_HELP_ => "Nro Cédula del Cliente o R.U.C.",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "if( (p_user_ == 'Developer' || p_user_ == 'mariaestela' || p_user_ == 'sandra' || p_user_ == 'MiguelL' || p_user_ == 'EditaDominski' || p_user_ == 'arnaldoaquino' || p_user_ == 'marcianef'  || p_user_ == 'lisandro'  || p_user_ == 'CesarV' || p_user_ == 'RocioL' || p_user_ == 'MildaBenitez' || p_user_ == 'CarolinaAmarilla' ) && operation==CHANGE_ ){ true }else{false}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        F_NAME_ => "dv",
        F_ALIAS_ => "DV",
        F_HELP_ => "dv",
        F_TYPE_ => "formula",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        C_VIEW_ => "operation==CHANGE_",
        F_FORMULA_ => " calcularDV( cli_ci.get() ) ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_dip_ci",
        F_ALIAS_ => "Cédula Diplomatica",
        F_HELP_ => "Nro Cédula Diplomatica",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_BROW_ => "1",        
        F_ORD_ => "21",        
        C_CHANGE_ => "if( (p_user_ == 'Developer' || p_user_ == 'mariaestela' || p_user_ == 'sandra' || p_user_ == 'MiguelL' || p_user_ == 'EditaDominski' || p_user_ == 'arnaldoaquino' || p_user_ == 'marcianef'  || p_user_ == 'lisandro'  || p_user_ == 'CesarV'  || p_user_ == 'Jack'  || p_user_.toLowerCase() == 'mildabenitez' || p_user_ == 'RocioL' ) && operation==CHANGE_ ){ true }else{false}",
        G_SHOW_ => "64",        
        G_CHANGE_ => "2236424"));

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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_suc",
        F_ALIAS_ => "Sucursal Alta",
        F_HELP_ => "Sucursal Alta",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        F_ORD_ => "32",
        G_SHOW_ => "8519712",
        G_CHANGE_ => "8519712"));

$Obj->Add(
    array(
        F_NAME_ => "cli_tipo",
        F_ALIAS_ => "Tipo de Cliente",
        F_HELP_ => "Tipo de Cliente",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_tipo_cli",
        F_SHOWFIELD_ => "cod_tipo,''",
        F_ORD_ => "38",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_vend",
        F_ALIAS_ => "Vendedor Asignado",
        F_HELP_ => "Vendedor Asignado",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "43",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_fecha_nac",
        F_ALIAS_ => "Fecha Nacimiento",
        F_HELP_ => "Fecha Nacimiento",
        F_TYPE_ => "date",
        F_ORD_ => "50",
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
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_prom_mens",
        F_ALIAS_ => "Limite Credito (Sistema)",
        F_HELP_ => "Total de los Ultimos 6 meses / 3",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT REPLACE(FORMAT(FLOOR( SUM(fact_total) / 6 / 3),0),|{,}|,|{.}|) FROM factura WHERE fact_cli_ci = '+cli_ci.getStr()+'  AND fact_fecha BETWEEN  date_sub(CURRENT_DATE, INTERVAL 180 DAY) and CURRENT_DATE;'",
        F_QUERY_REF_ => "cli_prom_mens.firstSQL",
        F_LENGTH_ => "16",
		 
        F_NODB_ => "1",
        F_ORD_ => "66",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_emai",
        F_ALIAS_ => "Email",
        F_HELP_ => "Email",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
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
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dep_estado",
        F_ALIAS_ => "Departamento/Estado",
        F_HELP_ => "Departamento/Estado",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_ORD_ => "110",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ciudad",
        F_ALIAS_ => "Ciudad",
        F_HELP_ => "Ciudad",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_ORD_ => "120",
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
        F_ORD_ => "130",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(p_user_ != 'Developer' && p_user_ != 'EditaDominski'  && p_user_ != 'sandra' && p_user_ != 'mariaestela' && p_user_ != 'MiguelL' && p_user_ != 'arnaldoaquino' && p_user_ != 'marcianef' && p_user_ != 'lisandro' && p_user_ != 'CesarV' ){  disableDeleteButton() } ",
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
        C_SHOW_ => "verif.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "if((p_user_ != 'Developer' && p_user_ != 'EditaDominski'  && p_user_ != 'RocioL'   && p_user_ != 'mariaestela' && p_user_ != 'MiguelL' && p_user_ != 'sandra' && p_user_ != 'arnaldoaquino' && p_user_ != 'marcianef' && p_user_ != 'lisandro' && p_user_ != 'CesarV' && p_user_ != 'RocioL' ) || cli_ci.get()=='80005190-4' ){ disableAcceptButton() } ",
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
        F_NAME_ => "ver_rep",
        F_ALIAS_ => "Ver Ventas a Este Cliente",
        F_HELP_ => "Ver Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ventas_x_cli",
        F_NODB_ => "1",
        F_ORD_ => "230",
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
        F_ORD_ => "240",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
		
	$Obj->Add(
    array(
        F_NAME_ => "lock_unclock",
        F_ALIAS_ => "lock_unclock",
        F_HELP_ => "lock_unclock",
        F_TYPE_ => "formula",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(cli_ci.get()=='80005190-4'){disableAcceptButton()} ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	
		
		 
 			

?>
