<?php
$Obj->name = "rem_ab_x_suc";
$Obj->alias = "Remito Abierto por Sucursal";
$Obj->help = "Remito Abierto por Sucursal";
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
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Codigo del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
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
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__moveto",
        F_ALIAS_ => "Moverme a",
        F_HELP_ => "Moverme a",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        G_SHOW_ => "268435968",
        G_CHANGE_ => "268435968"));

$Obj->Add(
    array(
        F_NAME_ => "__movme",
        F_ALIAS_ => "Transladarme",
        F_HELP_ => "Transladarme",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update p_users set  local = '+__moveto.getStr()+' where name = '+__user.getStr()",
        F_BROW_ => "1",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=__moveto.get()&&__moveto.get()!=''",
        G_SHOW_ => "268435968",
        G_CHANGE_ => "268435968"));

$Obj->Add(
    array(
        F_NAME_ => "rem_ab",
        F_ALIAS_ => "Remisiones Abiertas",
        F_HELP_ => "Remisiones Abiertas",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'rem_estado=|{Abierta}| and rem_origen='+__local.getStr()+''",
        F_LINK_ => "db.remito",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(__movme.get()&&_trustee>510){ setTimeout('window.location.reload()',500); }",
        G_SHOW_ => "512",
        G_CHANGE_ => "512"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "__local.get()==__moveto.get()",
        F_FORMULA_ => "'( ! ) Ya estas ahi TORPE!!! :P '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "open_sub",
        F_ALIAS_ => "Abre Subformulario",
        F_HELP_ => "Abre Subformulario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "122",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{rem_ab}|).setAttribute(|{hidden}|,|{false}|);  document.getElementById(|{hbox_rem_ab}|).setAttribute(|{height}|,|{260}|);   ",
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
        F_FORMULA_ => "if( !openSubform   ){ document.getElementById(|{cap`rem_ab`Remisiones Abiertas}|).click(); openSubform=true;}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
