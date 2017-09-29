<?php
$Obj->name = "mnt_users";
$Obj->alias = "Usuarios";
$Obj->help = "Usuarios del Sistema";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "p_users";
$Obj->Filter = "";
$Obj->Sort = "name asc";
$Obj->p_insert = "";
$Obj->p_change = "'select makeLog_(|{MODIFICAR}|,|{Obs : '+obs.get()+'  Permiso '+trustee.get()+' local :  '+local.get()+' }|,|{'+p_user_+'}|)'";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "200";
$Obj->Add(
    array(
        F_NAME_ => "name",
        F_ALIAS_ => "Nombre Usuario",
        F_HELP_ => "Nombre Usuario",
        F_TYPE_ => "text",
        F_LENGTH_ => "25",
        F_BROW_ => "1",
		F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "553",
        G_CHANGE_ => "553"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
		F_REQUIRED_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "553",
        G_CHANGE_ => "553"));

$Obj->Add(
    array(
        F_NAME_ => "resh",
        F_ALIAS_ => "Preferencia de Tamaño de Ventana Horizontal",
        F_HELP_ => "Preferencia de Tamaño de Ventana Horizontal",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_ORD_ => "30",
        G_SHOW_ => "553",
        G_CHANGE_ => "553"));

$Obj->Add(
    array(
        F_NAME_ => "resv",
        F_ALIAS_ => "Preferencia de Tamaño de Ventana Vertical",
        F_HELP_ => "Preferencia de Tamaño de Ventana Vertical",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_ORD_ => "40",
        G_SHOW_ => "553",
        G_CHANGE_ => "553"));

$Obj->Add(
    array(
        F_NAME_ => "local",
        F_ALIAS_ => "Localidad (Sucursal)",
        F_HELP_ => "Localidad (Sucursal)",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "5",
		F_REQUIRED_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "553",
        G_CHANGE_ => "553"));

$Obj->Add(
    array(
        F_NAME_ => "lang",
        F_ALIAS_ => "Idioma de Preferencia",
        F_HELP_ => "Idioma de Preferencia",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "es,br,en",
        F_ORD_ => "60",
        G_SHOW_ => "553",
        G_CHANGE_ => "553"));

$Obj->Add(
    array(
        F_NAME_ => "trustee",
        F_ALIAS_ => "Permisos",
        F_HELP_ => "Relacion de Confianza del usuario",
        F_TYPE_ => "INT_PROC",
        F_LENGTH_ => "1",
		F_REQUIRED_ => "1",
		P_PROC_ => "group_trustee",
        F_ORD_ => "70",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

?>
