<?php
$Obj->name = "vent_tmp";
$Obj->alias = "Facturas de Ventas";
$Obj->help = "Facturas de Ventas";
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
        F_NAME_ => "busc_vend",
        F_ALIAS_ => "Buscar Vendedor",
        F_HELP_ => "Buscar Funcionario Responsable",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "2",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vend_cod",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Código y nombre compledo del funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_vend.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_cod like |{'+busc_vend.get()+'%}|'",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha en que se realiza la operación",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "facts",
        F_ALIAS_ => "Facturas",
        F_HELP_ => "Facturas",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "fecha.hasChanged()||vend_cod.hasChanged()",
        F_RELTABLE_ => "factura",
        F_SHOWFIELD_ => "fact_nro,concat(|{Total:   }|,fact_total, |{    CI:  }|,fact_cli_ci, |{  Nombre:  }|, fact_nom_cli, |{ Cat:  }|, fact_cli_cat) ",
        F_FILTER_ => "'fact_vend_cod = '+vend_cod.getStr()+' and fact_fecha ='+fecha.getStr()+' limit 100'",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cicli",
        F_ALIAS_ => "Nro Cedula",
        F_HELP_ => "Nro Cedula",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_cli_ci from factura where fact_nro = '+facts.getVal()",
        F_QUERY_REF_ => "facts.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "31",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cinom",
        F_ALIAS_ => "Nombre Cliente",
        F_HELP_ => "Nombre",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cli_fullname from mnt_cli where cli_ci =  '+cicli.getStr()",
        F_QUERY_REF_ => "cicli.hasChanged()",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "32",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_edit",
        F_ALIAS_ => "Editar Cliente",
        F_HELP_ => "Editar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "32",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_subfrm_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cli_ci='+cicli.getStr()",
        F_LINK_ => "db.mnt_cli_vend",
        F_SEND_ => "cicli.get()",
        F_NODB_ => "1",
        F_ORD_ => "32",
        C_SHOW_ => "fact_edit.get()=='Si'&&cicli.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "catcli",
        F_ALIAS_ => "Categoria",
        F_HELP_ => "Categoria",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cli_cat from mnt_cli where cli_ci = '+cicli.getStr()",
        F_QUERY_REF_ => "cicli.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "33",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "corregir_cli",
        F_ALIAS_ => "Corregir datos",
        F_HELP_ => "Corregir datos",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update factura set fact_nom_cli = '+cinom.getStr()+', fact_cli_cat = '+catcli.getVal()+' where fact_nro = '+facts.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "34",
        F_INLINE_ => "1",
        C_VIEW_ => "catcli.get()!='__NO DATA__'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_total",
        F_ALIAS_ => "Total de Factura",
        F_HELP_ => "Total de Factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  fact_total,fact_estado,fact_localidad from factura where fact_nro =  '+ facts.getVal()",
        F_QUERY_REF_ => "facts.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "est",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_FORMULA_ => "db('fact_estado')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "loc",
        F_ALIAS_ => "Local",
        F_HELP_ => "Localidad",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('fact_localidad')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cerrar",
        F_ALIAS_ => "Cerrar",
        F_HELP_ => "Cerrar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "est.get()!='Cerrada'",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "cer",
        F_ALIAS_ => "Confirmar",
        F_HELP_ => "Confirmar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cerrar_venta('+facts.getVal()+','+loc.getStr()+',|{G$}|,1, 1,|{Contado}|,0,0,0,'+f_total.getVal()+')' ",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "cerrar.get()=='Si'",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "cer.get()",
        F_FORMULA_ => "'( ! ) Ok Venta cerrada. !!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
