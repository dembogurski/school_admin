<?php
$Obj->name = "mnt_precios";
$Obj->alias = "Modificacion de Precios x Factura de Compra";
$Obj->help = "Modificacion de Precios x Factura de Compra";
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
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia de Factura de Compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_ref from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()&&codigo.getVal()>0",
        F_LENGTH_ => "6",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => "Descrip",
        F_HELP_ => "Referencia de Factura de Compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(p_fam,|{ - }|,p_grupo,|{ - }|,p_tipo,|{ - }|,p_color) from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()&&codigo.getVal()>0",
        F_LENGTH_ => "70",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "familia",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "ref.hasChanged()&&ref.get()!=''",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_fam,''",
        F_FILTER_ => "'p_ref = '+ref.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "familia.hasChanged()&&ref.get()!=''",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_grupo,''",
        F_FILTER_ => "'p_ref = '+ref.getVal()+' and p_fam = '+familia.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "grupo.hasChanged()&&ref.get()!=''",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_tipo,''",
        F_FILTER_ => "'p_ref = '+ref.getVal()+'  and p_fam = '+familia.getStr()+' and p_grupo = '+grupo.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "tipo.hasChanged()&&ref.get()!=''",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_color,''",
        F_FILTER_ => "'p_ref = '+ref.getVal()+'  and p_fam = '+familia.getStr()+' and p_grupo = '+grupo.getStr()+' and p_tipo = '+tipo.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		

$Obj->Add(
    array(
        F_NAME_ => "p_compra",
        F_ALIAS_ => "Precio Compra",
        F_HELP_ => "Precio Compra",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "(color.hasChanged()||color.hasChanged())&&ref.get()!=''",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct p_compra,''",
        F_FILTER_ => "'p_ref = '+ref.getVal()+'  and p_fam = '+familia.getStr()+' and p_grupo = '+grupo.getStr()+' and p_tipo = '+tipo.getStr()+'  and p_color like '+color.getStr() ",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "pvm",
        F_ALIAS_ => "Nuevo Valor Minimo",
        F_HELP_ => "Nuevo Valor Minimo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_valmin from mnt_prod where p_ref = '+ref.getVal()+' and  p_fam = '+familia.getStr()+' and p_grupo = '+grupo.getStr()+' and p_tipo = '+tipo.getStr()",
        F_QUERY_REF_ => "ref.hasChanged()||color.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p1n",
        F_ALIAS_ => "Nuevo Precio 1",
        F_HELP_ => "Nuevo Precio 1",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_precio_1 from mnt_prod where p_ref = '+ref.getVal()+' and p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()&&codigo.getVal()>0",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p2n",
        F_ALIAS_ => "Nuevo Precio 2",
        F_HELP_ => "Nuevo Precio 2",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+p1n.getVal()+'-'+p1n.getVal()+'*p_desc_2/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p1n.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p3n",
        F_ALIAS_ => "Nuevo Precio 3",
        F_HELP_ => "Nuevo Precio 3",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+p1n.getVal()+'-'+p1n.getVal()+'*p_desc_3/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p1n.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p4n",
        F_ALIAS_ => "Nuevo Precio 4",
        F_HELP_ => "Nuevo Precio 4",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+p1n.getVal()+'-'+p1n.getVal()+'*p_desc_4/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p1n.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p5n",
        F_ALIAS_ => "Nuevo Precio 5",
        F_HELP_ => "Nuevo Precio 5",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+p1n.getVal()+'-'+p1n.getVal()+'*p_desc_5/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p1n.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "p6n",
        F_ALIAS_ => "Nuevo Precio 6",
        F_HELP_ => "Nuevo Precio 6",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+p1n.getVal()+'-'+p1n.getVal()+'*p_desc_6/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p1n.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

$Obj->Add(
    array(
        F_NAME_ => "p7n",
        F_ALIAS_ => "Nuevo Precio 7",
        F_HELP_ => "Nuevo Precio 7",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+p1n.getVal()+'-'+p1n.getVal()+'*p_desc_7/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p1n.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			

$Obj->Add(
    array(
        F_NAME_ => "motivo",
        F_ALIAS_ => "Motivo",
        F_HELP_ => "Motivo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Actualizacion de Precios Autorizado Por GG,Precio de Venta Mal Asignado,Error de Carga,Asignacion de precios a codigo reutilizado para manteles,Tela Vencida,Error de Recepcion,Asignacion de precio de Saldo,Venta en Triple Cero",
        F_NODB_ => "1",
        F_ORD_ => "32",
        C_VIEW_ => "ref.getVal()>0",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_rep",
        F_ALIAS_ => "Elija una Opcion",
        F_HELP_ => "Tipo de Reporte",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Previsualizar los Codigos Afectados,Modificar los Precios",
        F_NODB_ => "1",
        F_ORD_ => "35",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "preview",
        F_ALIAS_ => "Ver codigos a Modificar",
        F_HELP_ => "Ver codigos a Modificar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.det_comp_fgt",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "(tipo_rep.get()=='Previsualizar los Codigos Afectados'&&grupo.get()!=''&&ref.getVal()>0)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "preview_upd",
        F_ALIAS_ => "Confirme Modificar los Precios",
        F_HELP_ => "Ver codigos a Modificar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.det_comp_fgt",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "ref.getVal()>0&&p1n.getVal()>0&&p2n.getVal()>0&&p3n.getVal()>0&&p4n.getVal()>0&&p5n.getVal()>0&&tipo_rep.get()=='Modificar los Precios'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
