<?php
$Obj->name = "mnt_func";
$Obj->alias = "Funcionarios";
$Obj->help = "Funcionarios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_func";
$Obj->Filter = "";
$Obj->Sort = "func_cod asc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "100";
$Obj->Add(
    array(
        F_NAME_ => "func_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "5",
        F_DEC_ => "0",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "p_users",
        F_SHOWFIELD_ => "name,obs",
        F_FILTER_ => "'true order by name asc'",
        F_LENGTH_ => "16",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_lugar_trab",
        F_ALIAS_ => "Lugar de Trabajo",
        F_HELP_ => "Sucursal en a la que pertenece el Funcionario",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "15",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_fullname",
        F_ALIAS_ => "Nombre Completo",
        F_HELP_ => "Nombre Completo",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_ci",
        F_ALIAS_ => "Nº Cédula",
        F_HELP_ => "Nº Cédula",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_fecha_nac",
        F_ALIAS_ => "Fecha Nacimiento",
        F_HELP_ => "Fecha Nacimiento",
        F_TYPE_ => "date",
        F_ORD_ => "35",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_fecha_cont",
        F_ALIAS_ => "Fecha de Contratación",
        F_HELP_ => "Fecha de Contratación",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "37",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_sueldo",
        F_ALIAS_ => "Sueldo C",
        F_HELP_ => "Sueldo C",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "2048",
        G_CHANGE_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "func_sueldo_r",
        F_ALIAS_ => "Sueldo R",
        F_HELP_ => "Sueldo R",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_ips",
        F_ALIAS_ => "I.P.S.",
        F_HELP_ => "I.P.S.",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        G_SHOW_ => "2048",
        G_CHANGE_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "func_h_extras",
        F_ALIAS_ => "Horas Extras",
        F_HELP_ => "Horas Extras",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        G_SHOW_ => "2048",
        G_CHANGE_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "func_tel1",
        F_ALIAS_ => "Telefono1",
        F_HELP_ => "Telefono1",
        F_TYPE_ => "text",
        F_LENGTH_ => "13",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_tel2",
        F_ALIAS_ => "Telefono2",
        F_HELP_ => "Telefono2",
        F_TYPE_ => "text",
        F_LENGTH_ => "13",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_dir",
        F_ALIAS_ => "Dirección",
        F_HELP_ => "Dirección",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "300",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_email",
        F_ALIAS_ => "Email",
        F_HELP_ => "Email",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_tipo",
        F_ALIAS_ => "Tipo Clientes",
        F_HELP_ => "Tipo de Clientes Habilitados",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Minorista,Confeccionista,Mayorista,Ninguno,*",
        F_BROW_ => "1",
        F_ORD_ => "115",
        G_SHOW_ => "544",
        G_CHANGE_ => "544"));

$Obj->Add(
    array(
        F_NAME_ => "func_cat",
        F_ALIAS_ => "Categoria",
        F_HELP_ => "Categoria",
        F_TYPE_ => "select_list",
        F_DSL_ => "func_cat.firstSQL",
        F_RELTABLE_ => "mnt_cat_vend",
        F_SHOWFIELD_ => "categ,concat(a_min,|{-}|,a_max)",
        F_ORD_ => "116",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_calc_var",
        F_ALIAS_ => "Calculo de Meta x Antiguedad",
        F_HELP_ => "Calculo de Meta x Antiguedad",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.meta_x_antigued",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_fecha_sal",
        F_ALIAS_ => "Fecha Retiro",
        F_HELP_ => "Fecha Retiro",
        F_TYPE_ => "date",
        F_ORD_ => "125",
        C_SHOW_ => "func_estado.get()=='Inactivo'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_motivo_sal",
        F_ALIAS_ => "Motivo de Retiro",
        F_HELP_ => "Motivo de Retiro de la Empresa",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "130",
        C_SHOW_ => "func_estado.get()=='Inactivo'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_cargo",
        F_ALIAS_ => "Cargo",
        F_HELP_ => "Cargo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Vendedor,Administrador,Gerente,Tesorero,Conciliador,Gerente de Ventas,Cajero,Empacador,Recepcionista,Maquinista,Otro",
        F_BROW_ => "1",
        F_ORD_ => "140",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_estado",
        F_ALIAS_ => "Estado Actual",
        F_HELP_ => "Estado Actual del Funcionario",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Activo,Inactivo",
        F_ORD_ => "999",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
