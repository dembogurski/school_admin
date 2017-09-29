<?php
$Obj->name = "pedido_int_cab";
$Obj->alias = "Nota de Pedido de Compra";
$Obj->help = "Nota de Pedido de Compra Iternacional";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "pedido_int_cab";
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
        F_ORD_ => "3",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "6",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select local from p_users where name = |{'+p_user_+'}| '",
        F_QUERY_REF_ => "suc.firstSQL",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "8",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "count_ab",
        F_ALIAS_ => "Cant. Abiertas",
        F_HELP_ => "Cant. Abiertas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from pedido_int_cab where estado = |{Abierta}| '",
        F_QUERY_REF_ => "count_ab.firstSQL&&operation==INSERT_",
        F_NODB_ => "1",
        F_ORD_ => "9",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_pedido_int",
        F_ALIAS_ => "Nº Nota",
        F_HELP_ => "Nº Nota",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select gen_nota_pedido('+temporada.getStr()+')';",
        F_QUERY_REF_ => "gen_nota.get()=='Si'",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
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
        F_ORD_ => "12",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "temporada",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Verano,Invierno",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,En Evaluacion,En_Proceso de Compra,Cerrada",
        F_LENGTH_ => "24",
        F_BROW_ => "1",
        F_ORD_ => "36",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sector",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "pedido_int_det",
        F_SHOWFIELD_ => "distinct sector,''",
        F_FILTER_ => "'true order by sector asc'",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        G_SHOW_ => "256",
        G_CHANGE_ => "256"));

$Obj->Add(
    array(
        F_NAME_ => "grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "sector.hasChanged()",
        F_RELTABLE_ => "pedido_int_det",
        F_SHOWFIELD_ => "distinct p_grupo,''",
        F_FILTER_ => "'sector like |{'+sector.get()+'%}|'",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "122",
        F_INLINE_ => "1",
        G_SHOW_ => "256",
        G_CHANGE_ => "256"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "grupo.hasChanged()",
        F_RELTABLE_ => "pedido_int_det",
        F_SHOWFIELD_ => "distinct p_tipo,''",
        F_FILTER_ => "'sector like |{'+sector.get()+'}| and p_grupo like|{'+grupo.get()+'}|'",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "124",
        F_INLINE_ => "1",
        G_SHOW_ => "256",
        G_CHANGE_ => "256"));

$Obj->Add(
    array(
        F_NAME_ => "n_pedido_detail",
        F_ALIAS_ => "Editar Nota de Compra Detallada",
        F_HELP_ => "Nota de Pedido de Compra Detallada",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.pedido_internac",
        F_NODB_ => "1",
        F_ORD_ => "130",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo.get()!=''",
        G_SHOW_ => "256",
        G_CHANGE_ => "256"));

$Obj->Add(
    array(
        F_NAME_ => "set_estado",
        F_ALIAS_ => "Cambiar Estado",
        F_HELP_ => "Cambiar Estado",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update pedido_int_cab set estado = '+estado.getStr()+' where nro_pedido_int = '+nro_pedido_int.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "138",
        F_INLINE_ => "1",
        C_SHOW_ => "estado.hasChanged()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_nota",
        F_ALIAS_ => "Generar Nota de Pedido",
        F_HELP_ => "Generar Nota de Pedido",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "count_ab.getVal() < 1",
        C_VIEW_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__change",
        F_ALIAS_ => "Operation = CHANGE_",
        F_HELP_ => "Operation = CHANGE_",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_SHOW_ => "nro_pedido_int.getVal()>0&&gen_nota.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "operation=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "detalle",
        F_ALIAS_ => "Detalle de Pedidos",
        F_HELP_ => "Detalle de Pedidos",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'nro_pedido_int='+nro_pedido_int.get()+'  and suc = '+suc.getStr()+' ORDER BY cli_ruc asc'",
        F_LINK_ => "db.pedido_int_det",
        F_SEND_ => "nro_pedido_int.get()",
        F_LENGTH_ => "500",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__nodel",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
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
        F_ORD_ => "200",
        C_SHOW_ => "count_ab.getVal()>0&&operation==INSERT_",
        F_FORMULA_ => "'( ! ) No se permite abrir mas de una nota de Pedido!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msg}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
