<?php
$Obj->name = "inv_balanza";
$Obj->alias = "Inventario x Peso ";
$Obj->help = "Inventario x Kilos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "inv";
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
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_LENGTH_ => "24",
        F_BROW_ => "1",
        F_ORD_ => "4",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Ud. Se encuentra en la Sucursal:",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rep",
        F_ALIAS_ => "Inventario x Peso (Formulario)",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.inv_balanza",
        F_NODB_ => "1",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_fam",
        F_FILTER_ => "'f_cod <> |{JOSE YUNIS}| and f_cod <> |{ACTIVO FIJO}| and f_cod <> |{VENTA POR KG}| ORDER BY f_cod'",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
		V_DEFAULT_ => "'%'",
        F_ORD_ => "115",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_OPTIONS_ => "%",
		F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_grupo,|{}|",
        F_FILTER_ => "'p_fam like |{'+p_fam.get()+'}| group by p_grupo'",
		F_DSL_ => "p_fam.hasChanged()",		
        F_LENGTH_ => "10",
        F_BROW_ => "1",
		V_DEFAULT_ => "'%'",
        F_ORD_ => "116",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_OPTIONS_ => "%",
		F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_tipo,|{}|",
        F_FILTER_ => "'p_fam like |{'+p_fam.get()+'}| and p_grupo like |{'+p_grupo.get()+'}| group by p_tipo'",
		F_DSL_ => "p_grupo.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "117",
		V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		
$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
		F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select date_format(min(date(str_to_date(fecha,|{%d-%m-%Y %h:%i:%s}|))),|{%d-%m-%Y}|) as min_fecha from inv'",
        F_QUERY_REF_ => "desde.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "119",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
		F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select date_format(max(date(str_to_date(fecha,|{%d-%m-%Y %h:%i:%s}|))),|{%d-%m-%Y}|) as min_fecha from inv'",
        F_QUERY_REF_ => "hasta.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "120",
        V_DEFAULT_ => "thisDate_",
		F_INLINE_ => "1",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));


$Obj->Add(
    array(
        F_NAME_ => "usuario_select",
        F_ALIAS_ => "Usuario:",
        F_HELP_ => "Seleccione un usuario para el reporte",
        F_TYPE_ => "dynamic_select_list",
        F_OPTIONS_ => "%",
		F_RELTABLE_ => "inv",
        F_SHOWFIELD_ => "usuario,|{}|",
        F_FILTER_ => "'usuario <> |{Developer}| group by usuario'",
		F_DSL_ => "usuario_select.firstSQL&&usuario_select.get()==''&&verif.get()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "118",
		C_VIEW_ => "verif.get()",		
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		
$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Suc:",
        F_HELP_ => "Elegir sucurzal",
        F_TYPE_ => "dynamic_select_list",
		F_RELTABLE_ => "inv",
        F_SHOWFIELD_ => "suc,|{}|",
        F_FILTER_ => "'usuario <> |{Developer}| group by suc'",
		F_DSL_ => "suc.firstSQL&&suc.get()==''&&verif.get()",
        F_NODB_ => "1",
        F_ORD_ => "150",
        F_INLINE_ => "1",	
		C_VIEW_ => "verif.get()",
        G_SHOW_ => "68256150",
        G_CHANGE_ => "68256150"));
/**
$Obj->Add(
    array(
        F_NAME_ => "proc",
        F_ALIAS_ => "Procesados:",
        F_HELP_ => "Filtrar Procesados",
        F_TYPE_ => "select_list",
		F_OPTIONS_ =>"%,Si,No",		
        F_NODB_ => "1",
        F_ORD_ => "150",
        F_INLINE_ => "1",		
		V_DEFAULT_ => "'%'",
        G_SHOW_ => "68256150",
        G_CHANGE_ => "68256150"));
*/

$Obj->Add(
    array(
        F_NAME_ => "gen_progrso",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.inv_progreso",
        F_NODB_ => "1",
        F_ORD_ => "26",
		F_BROW_ => "0",
		F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tot_metos",
        F_ALIAS_ => "Totales: Metros",
        F_HELP_ => "Total de metros",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(p_cant) from mnt_prod where p_fam like |{'+p_fam.get()+'}| and p_grupo like |{'+p_grupo.get()+'}| and p_tipo like |{'+p_tipo.get()+'}| and p_local like |{'+((verif.get())?suc.get():__local.get())+'}| and prod_fin_pieza <> |{Si}| and p_cant > 0'",
        F_QUERY_REF_ => "p_fam.hasChanged()||p_grupo.hasChanged()||p_tipo.hasChanged()||suc.hasChanged()",
        F_LENGTH_ => "11",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "0",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tot_piezas",
        F_ALIAS_ => "Piezas",
        F_HELP_ => "Total de piezas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from mnt_prod where p_fam like |{'+p_fam.get()+'}| and p_grupo like |{'+p_grupo.get()+'}| and p_tipo like |{'+p_tipo.get()+'}| and p_local like |{'+((verif.get())?suc.get():__local.get())+'}| and prod_fin_pieza <> |{Si}| and p_cant > 0'",
        F_QUERY_REF_ => "p_fam.hasChanged()||p_grupo.hasChanged()||p_tipo.hasChanged()||suc.hasChanged()",
        F_LENGTH_ => "11",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "inv",
        F_ALIAS_ => "Procesadas",
        F_HELP_ => "Total de piezas procesadas Inventario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from mnt_prod inner join inv on p_cod=codigo where p_fam like |{'+p_fam.get()+'}| and p_grupo like |{'+p_grupo.get()+'}| and p_tipo like |{'+p_tipo.get()+'}| and p_local like |{'+((verif.get())?suc.get():__local.get())+'}| and usuario <> |{Developer}|'",
        F_QUERY_REF_ => "p_fam.hasChanged()||p_grupo.hasChanged()||p_tipo.hasChanged()||suc.hasChanged()",
        F_LENGTH_ => "11",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
/**
$Obj->Add(
    array(
        F_NAME_ => "aj_mas",
        F_ALIAS_ => "Ajustes: (+)",
        F_HELP_ => "Total de ajustes positivos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(aj_ajuste) from mnt_ajustes inner join inv on aj_prod=codigo inner join mnt_prod on aj_prod=p_cod where p_fam like |{'+p_fam.get()+'}| and p_grupo like |{'+p_grupo.get()+'}| and p_tipo like |{'+p_tipo.get()+'}| and p_local like |{'+suc.get()+'}| and usuario <> |{Developer}| and usuario like |{'+usuario_select.get()+'}| and aj_signo = |{+}|;'",
        F_QUERY_REF_ => "p_fam.hasChanged()||p_grupo.hasChanged()||p_tipo.hasChanged()||suc.hasChanged()||usuario_select.hasChanged()",
        F_LENGTH_ => "11",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_menos",
        F_ALIAS_ => "(-)",
        F_HELP_ => "Total de ajustes negativos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(aj_ajuste) from mnt_ajustes inner join inv on aj_prod=codigo inner join mnt_prod on aj_prod=p_cod where p_fam like |{'+p_fam.get()+'}| and p_grupo like |{'+p_grupo.get()+'}| and p_tipo like |{'+p_tipo.get()+'}| and p_local like |{'+suc.get()+'}| and usuario <> |{Developer}| and usuario like |{'+usuario_select.get()+'}| and aj_signo = |{-}|'",
        F_QUERY_REF_ => "p_fam.hasChanged()||p_grupo.hasChanged()||p_tipo.hasChanged()||suc.hasChanged()||usuario_select.hasChanged()",
        F_LENGTH_ => "11",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

	*/	
$Obj->Add(
    array(
        F_NAME_ => "verif",
        F_ALIAS_ => "verificacion",
        F_HELP_ => "verificacion",
        F_TYPE_ => "formula",
        F_LENGTH_ => "24",
        F_BROW_ => "1",
        F_ORD_ => "4",
        F_FORMULA_ => "usuario.get().toLowerCase()=='jack'||usuario.get().toLowerCase()=='developer'||usuario.get().toLowerCase()=='ricardo'||usuario.get().toLowerCase()=='victor'||(/(victor)[0-9]{2}/i).test(usuario.get())",
		C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));


?>
