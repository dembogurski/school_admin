<?php
$Obj->name = "pedido_int_det";
$Obj->alias = "Detalle de Pedido";
$Obj->help = "Detalle de Pedido";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "pedido_int_det";
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
        F_NAME_ => "nro_pedido_int",
        F_ALIAS_ => "Nº Nota",
        F_HELP_ => "Nº Nota",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "4",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select local from p_users where name = |{'+p_user_+'}| '",
        F_QUERY_REF_ => "suc.firstSQL",
        F_LENGTH_ => "4",
        F_ORD_ => "8",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_cli",
        F_ALIAS_ => "Buscar Cliente",
        F_HELP_ => "Buscar Cliente Ingrese el código o el nombre",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_ruc",
        F_ALIAS_ => "Nro Cédula o R.U.C.",
        F_HELP_ => "Nro Cédula del Cliente o R.U.C.",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_cli.hasChanged()",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_ci,cli_fullname",
        F_FILTER_ => "'cli_fullname like |{'+busc_cli.get()+'%}| limit 30'",
        F_LENGTH_ => "18",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_nombre",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_fullname",
        F_RELFIELD_ => "cli_ci",
        F_LOCALFIELD_ => "cli_ruc",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sector",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_cod,''",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo          ",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_grupo.hasChanged()",
        F_RELTABLE_ => "mnt_grupo",
        F_FILTER_ => "'g_cod like |{'+b_grupo.get()+'%}| ORDER BY g_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "82",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo             ",
        F_HELP_ => "Tipo de tela",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_tipo.hasChanged()",
        F_RELTABLE_ => "mnt_tipo",
        F_FILTER_ => "'t_cod like |{'+b_tipo.get()+'%}| ORDER BY t_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "92",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "96",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color           ",
        F_HELP_ => "Color de la Tela",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_color.hasChanged()",
        F_RELTABLE_ => "mnt_color",
        F_FILTER_ => "'c_cod like |{'+b_color.get()+'%}| ORDER BY c_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "98",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant",
        F_ALIAS_ => "Cantidad en Metros",
        F_HELP_ => "Cantidad",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "102",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ponderacion",
        F_ALIAS_ => "Ponderacion",
        F_HELP_ => "Ponderacion",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_DEC_ => "2",
        F_ORD_ => "112",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_pond",
        F_ALIAS_ => "Cant. Ponderada",
        F_HELP_ => "Cant. Ponderada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_ORD_ => "122",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "precio_est",
        F_ALIAS_ => "Precio Estimado",
        F_HELP_ => "Precio Estimado",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_ORD_ => "132",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Obs:",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "144",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "lock_unlock",
        F_ALIAS_ => "Lock Unlock",
        F_HELP_ => "Lock Unlock",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "162",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( p_cant.getVal() > 0 && allValid ){  enableAcceptButton() }else{ disableAcceptButton() } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
