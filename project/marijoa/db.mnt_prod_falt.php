<?php
$Obj->name = "mnt_prod_falt";
$Obj->alias = "Registro de Productos Faltantes";
$Obj->help = "Productos Faltantes";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prod_falt";
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
        F_NAME_ => "fact_nro",
        F_ALIAS_ => "Nº de Factura",
        F_HELP_ => "Nº de Factura",
        F_TYPE_ => "text",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        F_FORMULA_ => "db",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "turno",
        F_ALIAS_ => "Turno",
        F_HELP_ => "Turno",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['fact_turno']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['fact_localidad']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Usuario",
        F_TYPE_ => "formula",
        F_SHOWFIELD_ => "name,name",
        F_LENGTH_ => "30",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        F_FORMULA_ => "sup['fact_vend_cod']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cat",
        F_ALIAS_ => "Cat",
        F_HELP_ => "Suc",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['fact_cli_cat']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_fam",
        F_FILTER_ => "'true ORDER BY f_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No Registrado",
        F_RELTABLE_ => "mnt_grupo",
        F_FILTER_ => "'TRUE ORDER BY g_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Pago",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_tipo.hasChanged()",
        F_OPTIONS_ => "No Registrado",
        F_RELTABLE_ => "mnt_tipo",
        F_SHOWFIELD_ => "t_cod,''",
        F_FILTER_ => "'t_cod like |{'+b_tipo.get()+'%}| ORDER BY t_cod asc Limit 30'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color  ",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'true ORDER BY c_cod asc'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad Solicitada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "91",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color2",
        F_ALIAS_ => "Color 2",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'true ORDER BY c_cod asc'",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "92",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant2",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad Solicitada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "93",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color3",
        F_ALIAS_ => "Color 3",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'true ORDER BY c_cod asc'",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "93",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant3",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad Solicitada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "94",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color4",
        F_ALIAS_ => "Color 4",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'true ORDER BY c_cod asc'",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "96",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant4",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad Solicitada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "97",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Obs:",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "600",
        F_ORD_ => "128",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "insertar",
        F_ALIAS_ => "      Insertar       ",
        F_HELP_ => "Insertar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select registrar_faltante('+fact_nro.getVal()+','+turno.getVal()+','+suc.getStr()+','+usuario.getStr()+','+cat.getVal()+','+p_fam.getStr()+','+p_grupo.getStr()+','+p_tipo.getStr()+','+p_color.getStr()+','+p_color2.getStr()+','+p_color3.getStr()+','+p_color4.getStr()+','+cant.getVal()+','+cant2.getVal()+','+cant3.getVal()+','+cant4.getVal()+','+obs.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "allValid && cant.getVal()>0&&!insertar.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goback",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "150",
        C_SHOW_ => "insertar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();  setTimeout('self.close()',1000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_SHOW_ => "insertar.get()",
        F_FORMULA_ => "'( ! ) Ok!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
