<?php
$Obj->name = "mnt_cli_clean";
$Obj->alias = "Correccion de Clientes";
$Obj->help = "Correccion de Clientes";
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
        F_ORD_ => "4",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b1",
        F_ALIAS_ => "Buscar Cliente",
        F_HELP_ => "Buscar Cliente",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c1",
        F_ALIAS_ => "Cliente 1",
        F_HELP_ => "Cliente 1",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b1.hasChanged()",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_ci,concat(cli_fullname,|{  CAT: }|,cli_cat,|{   ID: }|,id) as  FULL1",
        F_FILTER_ => "'cli_ci like |{'+b1.get()+'%}| or cli_fullname like |{'+b1.get()+'%}|  limit 30'",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "edit",
        F_ALIAS_ => "Editar Cliente",
        F_HELP_ => "Editar Cliente",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",No,Si",
        F_NODB_ => "1",
        F_ORD_ => "21",
        F_INLINE_ => "1",
        C_SHOW_ => "c1.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "editar_cliente",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cli_ci = '+c1.getStr()",
        F_LINK_ => "db.mnt_cli_filtro",
        F_SEND_ => "c1.get()",
        F_NODB_ => "1",
        F_ORD_ => "22",
        C_SHOW_ => "edit.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b2",
        F_ALIAS_ => "Buscar Cliente",
        F_HELP_ => "Buscar Cliente",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c2",
        F_ALIAS_ => "Cliente 2",
        F_HELP_ => "Cliente 2",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b2.hasChanged()",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_ci,concat(cli_fullname,|{  CAT: }|,cli_cat,|{   ID: }|,id) as  FULL2",
        F_FILTER_ => "'cli_ci like |{'+b2.get()+'%}| or cli_fullname like |{'+b2.get()+'%}|  or id = |{'+b2.getVal()+'}|   limit 30'",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "del2",
        F_ALIAS_ => "Eliminar este Cliente",
        F_HELP_ => "Eliminar este Cliente",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        C_SHOW_ => "id0.get()!=id1.get()&&id1.get()!=''&& id0.get()!='1'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "id0",
        F_ALIAS_ => "ID 1",
        F_HELP_ => "ID 1",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "true",
        F_FORMULA_ => "db('FULL1').substring( db('FULL1').indexOf(|{ID:}|) +4,60)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "id1",
        F_ALIAS_ => "ID 2",
        F_HELP_ => "ID 2",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        F_FORMULA_ => "db('FULL2').substring( db('FULL2').indexOf(|{ID:}|) +4,60)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
 

$Obj->Add(
    array(
        F_NAME_ => "cli_ventas",
        F_ALIAS_ => "Contar Ventas",
        F_HELP_ => "Ventas",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si,No lo se",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant1",
        F_ALIAS_ => "Cant. Facturas Cliente 1",
        F_HELP_ => "Cantidad de Facturas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from factura  where fact_cli_ci = '+c1.getStr()",
        F_QUERY_REF_ => "cli_ventas.hasChanged()||del2.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant2",
        F_ALIAS_ => "Cant. Facturas Cliente 2",
        F_HELP_ => "Cantidad de Facturas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from factura  where fact_cli_ci = '+c2.getStr()",
        F_QUERY_REF_ => "cli_ventas.hasChanged()||del2.hasChanged()|| c2.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "migrar",
        F_ALIAS_ => "Migrar de 2 a 1",
        F_HELP_ => "Migrar de 2 a 1",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "c1.get()!=c2.get()&&c2.get()!=''&&c1.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "confirmar",
        F_ALIAS_ => "Confirmar Migrar Facturas de 2 a 1 (Eliminara el cliente 2)",
        F_HELP_ => "Confirmar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select migrar_facturas('+c2.getStr()+', '+c1.getStr()+', '+del2.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "migrar.get()=='Si'&&!confirmar.get()&&c1.get()!=c2.get()&&c2.get()!=''",
        C_VIEW_ => "c2.get()!='1'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "doclick",
        F_ALIAS_ => "click",
        F_HELP_ => "Contro click",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "123",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( !openSubform   ){  document.getElementById(|{cap`editar_cliente`Cliente}|).click(); openSubform=true; }else{openSubform=false;  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "open_sub",
        F_ALIAS_ => "Abre Subformulario",
        F_HELP_ => "Abre Subformulario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "124",
        C_SHOW_ => "edit.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{editar_cliente}|).setAttribute(|{hidden}|,|{false}|); document.getElementById(|{hbox_editar_cliente}|).setAttribute(|{height}|,|{180}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "134",
        C_SHOW_ => "confirmar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',500); ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
