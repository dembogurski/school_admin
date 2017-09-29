<?php
$Obj->name = "buscador";
$Obj->alias = "Buscador";
$Obj->help = "Buscador";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
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
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "buscar",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "resultado",
        F_ALIAS_ => "Cliente/s",
        F_HELP_ => "Resultado de la busqueda",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "buscar.hasChanged()",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_fullname,''",
        F_FILTER_ => "'cli_fullname like |{'+buscar.get()+'%}| limit 20'",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tel1",
        F_ALIAS_ => "Telefonos",
        F_HELP_ => "Telefonos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(c.cli_tel1,|{  }|, c.cli_tel2) from mnt_cli c where c.cli_fullname like '+resultado.getStr() ",
        F_QUERY_REF_ => "resultado.get()!=''&&resultado.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dirs",
        F_ALIAS_ => "Direccion",
        F_HELP_ => "Direccion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cli_dir from mnt_cli c where c.cli_fullname like '+resultado.getStr() ",
        F_QUERY_REF_ => "resultado.get()!=''&&resultado.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "40",
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
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "resultadop",
        F_ALIAS_ => "Proveedores/s",
        F_HELP_ => "Resultado de la busqueda",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "buscar.hasChanged()",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_nombre,''",
        F_FILTER_ => "'prov_nombre like |{'+buscar.get()+'%}|'",
        F_NODB_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tel1p",
        F_ALIAS_ => "Telefonos",
        F_HELP_ => "Telefonos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(prov_tel,|{  }|,prov_fax) from mnt_prov c where prov_nombre like '+resultadop.getStr() ",
        F_QUERY_REF_ => "resultadop.get()!=''&&resultadop.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dirsp",
        F_ALIAS_ => "Direccion",
        F_HELP_ => "Direccion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(prov_dir,|{  }|,prov_ciudad) prov_dir from mnt_prov   where prov_nombre like '+resultadop.getStr() ",
        F_QUERY_REF_ => "resultadop.get()!=''&&resultadop.hasChanged()",
        F_LENGTH_ => "1024",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "espacios",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "105",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "resagenda",
        F_ALIAS_ => "Agenda",
        F_HELP_ => "Resultado de la busqueda",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "buscar.hasChanged()",
        F_RELTABLE_ => "agenda",
        F_SHOWFIELD_ => "nombre,''",
        F_FILTER_ => "'nombre like |{'+buscar.get()+'%}|'",
        F_NODB_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tel1a",
        F_ALIAS_ => "Telefonos",
        F_HELP_ => "Telefonos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select tel from agenda  where nombre like '+resagenda.getStr() ",
        F_QUERY_REF_ => "resagenda.get()!=''&&resagenda.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dirsa",
        F_ALIAS_ => "Direccion",
        F_HELP_ => "Direccion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select dir from agenda   where nombre like '+resagenda.getStr() ",
        F_QUERY_REF_ => "resagenda.get()!=''&&resagenda.hasChanged()",
        F_LENGTH_ => "1024",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
