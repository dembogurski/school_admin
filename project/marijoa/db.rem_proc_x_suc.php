<?php
$Obj->name = "rem_proc_x_suc";
$Obj->alias = "Remisiones en Proceso por Sucursal";
$Obj->help = "Remisiones en Proceso por Sucursal";
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
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select emp_nombre from par_empresas where emp_cod like '+__local.getStr()",
        F_QUERY_REF_ => "__local.hasChanged()||__suc.firstSQL",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_en_proc",
        F_ALIAS_ => "Remisiones en Proceso",
        F_HELP_ => "Remisiones en Proceso",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'rem_estado=|{En Proceso}| and rem_destino='+__local.getStr()+''",
        F_LINK_ => "db.remito_en_proc",
        F_SEND_ => "''",
        F_BROW_ => "1",
        F_ORD_ => "30",
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
        F_FORMULA_ => "if( !openSubform   ){  document.getElementById(|{cap`rem_en_proc`Remisiones en Proceso}|).click(); openSubform=true; }else{openSubform=false;  }",
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
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{rem_en_proc}|).setAttribute(|{hidden}|,|{false}|); document.getElementById(|{hbox_rem_en_proc}|).setAttribute(|{height}|,|{400}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
