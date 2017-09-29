<?php
$Obj->name = "correcc_prod";
$Obj->alias = "Correccion de Caracteristicas de Producto";
$Obj->help = "Correccion de Caracteristicas de Producto";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "6",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fam",
        F_ALIAS_ => "Sector en el Producto",
        F_HELP_ => "Sector",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "15",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "grup",
        F_ALIAS_ => "Grupo en el Producto",
        F_HELP_ => "Grupo",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tip",
        F_ALIAS_ => "Tipo en el Producto",
        F_HELP_ => "Tipo en el Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "35",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cla",
        F_ALIAS_ => "Clasificacion",
        F_HELP_ => "Clasificacion",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "36",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "est",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "37",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desc",
        F_ALIAS_ => "Descrip",
        F_HELP_ => "Descrip",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "38",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant",
        F_ALIAS_ => "Cantidad de datos",
        F_HELP_ => "Cantidad de datos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT COUNT(*) FROM mnt_prod WHERE p_fam LIKE '+fam.getStr()+' AND p_grupo LIKE '+grup.getStr()+' AND p_tipo  LIKE '+tip.getStr()+' AND p_clasif  LIKE '+cla.getStr()+' AND p_estruc  LIKE '+est.getStr()+' and p_descri LIKE '+desc.getStr()+' and p_cod LIKE '+codigo.getStr()+' '",
        F_QUERY_REF_ => "tip.hasChanged()||grup.hasChanged()||fam.hasChanged()||cla.hasChanged()||est.hasChanged()||desc.hasChanged()||codigo.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "43",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "espacio",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "44",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_rep",
        F_ALIAS_ => "Ver Reporte",
        F_HELP_ => "Ver Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.correccion_prod",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        C_SHOW_ => "cant.getVal()>0&&cant.getVal()<5000",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bf",
        F_ALIAS_ => "Buscar Sector",
        F_HELP_ => "Buscar Sector",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat('+fam.getStr()+',|{}|)'",
        F_QUERY_REF_ => "fam.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "55",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ffam",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "bf.hasChanged()",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_cod,''",
        F_FILTER_ => "'f_cod like |{'+bf.get()+'%}| '",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "56",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bg",
        F_ALIAS_ => "Buscar Grupo",
        F_HELP_ => "Buscar Grupo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat('+grup.getStr()+',|{}|)'",
        F_QUERY_REF_ => "grup.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "57",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fgru",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "bg.hasChanged()",
        F_RELTABLE_ => "mnt_grupo",
        F_SHOWFIELD_ => "g_cod,''",
        F_FILTER_ => "'g_cod like |{'+bg.get()+'%}| '",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "58",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "bt",
        F_ALIAS_ => "Buscar Tipo",
        F_HELP_ => "Buscar Tipo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat('+tip.getStr()+',|{}|)'",
        F_QUERY_REF_ => "tip.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "59",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ftip",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "bt.hasChanged()",
        F_RELTABLE_ => "mnt_tipo",
        F_SHOWFIELD_ => "t_cod,''",
        F_FILTER_ => "'t_cod like |{'+bt.get()+'%}| '",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fcl",
        F_ALIAS_ => "Buscar Clasif",
        F_HELP_ => "Buscar Clasif",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat('+cla.getStr()+',|{}|)'",
        F_QUERY_REF_ => "cla.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "66",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fcla",
        F_ALIAS_ => "Clasif",
        F_HELP_ => "clasif",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "fcl.hasChanged()",
        F_RELTABLE_ => "mnt_clasif",
        F_SHOWFIELD_ => "cl_cod,''",
        F_FILTER_ => "'cl_cod like |{'+fcl.get()+'%}| '",
        F_NODB_ => "1",
        F_ORD_ => "67",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fe",
        F_ALIAS_ => "Buscar Estruc",
        F_HELP_ => "Buscar Estruc",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "68",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fes",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_estruc",
        F_SHOWFIELD_ => "e_cod,''",
        F_NODB_ => "1",
        F_ORD_ => "69",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdes",
        F_ALIAS_ => "Buscar Descripcion",
        F_HELP_ => "Buscar Descripcion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat('+desc.getStr()+',|{}|)'",
        F_QUERY_REF_ => "desc.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdescri",
        F_ALIAS_ => "Descripciones",
        F_HELP_ => "Descripciones en Productos",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "fdes.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_descri,''",
        F_FILTER_ => "'p_descri like |{'+fdes.get()+'%}| limit 10'",
        F_NODB_ => "1",
        F_ORD_ => "71",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "conf",
        F_ALIAS_ => "Confirme la Modificacion",
        F_HELP_ => "Confirme la Modificacion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "74",
        C_SHOW_ => "ffam.get()!='' && fgru.get()!='' && ftip.get()!='' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "upd",
        F_ALIAS_ => "Proceder (Modifica Descripcion)",
        F_HELP_ => "Modificar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set p_fam = '+ffam.getStr()+', p_grupo = '+fgru.getStr()+', p_tipo = '+ftip.getStr()+', p_clasif = '+fcla.getStr()+', p_estruc = '+fes.getStr()+', p_descri = '+fdescri.getStr()+'  where p_fam like '+fam.getStr()+' and p_grupo like '+grup.getStr()+' and p_tipo like '+tip.getStr()+' and p_clasif like '+cla.getStr()+' and p_estruc like '+est.getStr()+' and p_descri like '+desc.getStr()+' and p_cod LIKE '+codigo.getStr()+' '",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_SHOW_ => "conf.get()=='Si'&& !(updd.get()||upd.get())",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "updd",
        F_ALIAS_ => "Proceder (No Modifica Descripcion)",
        F_HELP_ => "Modificar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set p_fam = '+ffam.getStr()+', p_grupo = '+fgru.getStr()+', p_tipo = '+ftip.getStr()+', p_clasif = '+fcla.getStr()+', p_estruc = '+fes.getStr()+' where p_fam like '+fam.getStr()+' and p_grupo like '+grup.getStr()+' and p_tipo like '+tip.getStr()+' and p_clasif like '+cla.getStr()+' and p_estruc like '+est.getStr()+' and p_descri like '+desc.getStr()+' and p_cod LIKE '+codigo.getStr()+' '",
        F_NODB_ => "1",
        F_ORD_ => "75",
        F_INLINE_ => "1",
        C_SHOW_ => "conf.get()=='Si'&& !(updd.get()||upd.get())",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip_rep",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "76",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(upd.get()){fdescri.get()}else{'%'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_result",
        F_ALIAS_ => "Ver Resultado de Correccion",
        F_HELP_ => "Ver Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.corr_prod_res",
        F_NODB_ => "1",
        F_ORD_ => "77",
        C_SHOW_ => "conf.get()=='Si'&&(upd.get()||updd.get())",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "85",
        C_SHOW_ => "next.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',800)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "next",
        F_ALIAS_ => "Siguiente ---->",
        F_HELP_ => "Siguiente",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select 1'",
        F_NODB_ => "1",
        F_ORD_ => "95",
        C_SHOW_ => "upd.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "105",
        C_SHOW_ => "cant.getVal()>5000",
        F_FORMULA_ => "'( ! ) Se ha denegado la generacion de reportes muy grandes!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
