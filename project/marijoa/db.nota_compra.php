<?php
$Obj->name = "nota_compra";
$Obj->alias = "Nota de Compra a Proveedores";
$Obj->help = "Nota de Compra a Proveedores";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "nota_compra";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_prov",
        F_ALIAS_ => "Buscar Proveedor",
        F_HELP_ => "Buscar Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pr",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_prov.hasChanged()",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_nombre,prov_ciudad",
        F_FILTER_ => "'prov_nombre like |{'+busc_prov.get()+'%}|'",
        F_BROW_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_ped",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "100",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_prev",
        F_ALIAS_ => "Fecha Llegada",
        F_HELP_ => "Fecha Prevista de Llegada",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nom_in_prov",
        F_ALIAS_ => "Nombre del Prod. en el Proveedor",
        F_HELP_ => "Nombre del Producto en el Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gr",
        F_ALIAS_ => "Buscar Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "140",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "gr.hasChanged()",
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_grupo",
        F_SHOWFIELD_ => "g_cod,''",
        F_FILTER_ => "'g_cod like |{'+gr.get()+'%}| order by g_cod asc'",
        F_REQUIRED_ => "1",
        F_ORD_ => "141",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tp",
        F_ALIAS_ => "Buscar Tipo",
        F_HELP_ => "Tipo en que se usa",
        F_TYPE_ => "text",
        F_DSL_ => " ",
        F_RELTABLE_ => "mnt_temp",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "150",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo   ",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "tp.hasChanged()",
        F_OPTIONS_ => ",%",
        F_RELTABLE_ => "mnt_tipo",
        F_SHOWFIELD_ => "t_cod,''",
        F_FILTER_ => "'t_cod like |{'+tp.get()+'%}| order by t_cod asc'",
        F_LENGTH_ => "40",
        F_REQUIRED_ => "1",
        F_ORD_ => "151",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "clr",
        F_ALIAS_ => "Buscar Color",
        F_HELP_ => "Color al que pertenece",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "160",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "color",
        F_ALIAS_ => "Color ",
        F_HELP_ => "Color",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "clr.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'c_cod like |{'+clr.get()+'%}| order by c_cod asc'",
        F_LENGTH_ => "40",
        F_REQUIRED_ => "1",
        F_ORD_ => "161",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "precio",
        F_ALIAS_ => "Precio de Compra",
        F_HELP_ => "Precio de Compra",
        F_TYPE_ => "text",
        F_QUERY_ => " ",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "170",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mts",
        F_ALIAS_ => "Metros",
        F_HELP_ => "Cantidad de Metros Comprados",
        F_TYPE_ => "text",
        F_QUERY_ => " ",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "175",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "400",
        F_ORD_ => "185",
        V_DEFAULT_ => "'400 caracteres'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "insertar",
        F_ALIAS_ => "      Insertar       ",
        F_HELP_ => "Insertar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'INSERT INTO nota_compra(id,pr,fecha_ped,fecha_prev, nom_in_prov, grupo,tipo,color,precio,mts,__user,obs)VALUES(|{default}|,'+pr.getStr()+','+fecha_ped.getStr()+','+fecha_prev.getStr()+','+nom_in_prov.getStr()+','+grupo.getStr()+', '+tipo.getStr()+','+color.getStr()+','+precio.getStr()+','+mts.getStr()+', '+__user.getStr()+','+obs.getStr()+');'",
        F_NODB_ => "1",
        F_ORD_ => "195",
        C_SHOW_ => "allValid",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
