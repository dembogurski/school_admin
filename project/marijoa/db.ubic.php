<?php
$Obj->name = "ubic";
$Obj->alias = "Ubicacion de Mercaderias";
$Obj->help = "Ubicacion de Mercaderias";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "ubic";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "'update ubic set estado = |{Fuera de Cuadrante}|  where codigo = '+codigo.getStr()+' and id  != '+last_id.getVal()+' + 1'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
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
        F_ORD_ => "10",
        C_SHOW_ => "operation==INSERT_",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
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
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Obtiene datos del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat( p.p_grupo,|{-}|,p.p_tipo,|{-}|, p.p_color,|{-}|,p.p_fam,|{-}|, p.p_descri,|{-}|, p.p_estruc,|{-}|, p.p_lisoest)  from mnt_prod p where  p.p_cod like '+codigo.getStr()",
        F_QUERY_REF_ => "codigo.hasChanged()||(operation==SHOW_&&codigo.firstSQL)",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "35",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ultima_oper",
        F_ALIAS_ => "Ultima Operacion",
        F_HELP_ => "Ultima Operacion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select operacion,estante,suc from ubic where codigo ='+codigo.getStr()+' order by id desc limit 1'",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "36",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "u_suc",
        F_ALIAS_ => "DEP",
        F_HELP_ => "DEP",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "37",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        F_FORMULA_ => "db('suc')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "u_est",
        F_ALIAS_ => "Ubicacion",
        F_HELP_ => "Ubicacion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(|{Dep: }|,suc,|{ Estante: }|,estante,|{ Fila: }|,fila,|{ Col: }|, col)  from ubic where codigo = '+codigo.getStr()+' ORDER BY id DESC LIMIT 1'",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "38",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "operacion",
        F_ALIAS_ => "Operación",
        F_HELP_ => "Operación",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "E,S",
        F_LENGTH_ => "39",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sucs",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc'",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "operacion.get()=='E'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estant",
        F_ALIAS_ => "Estante",
        F_HELP_ => "Estante",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "A,B,C,D,E,F,G,H,I,J,K",
        F_SHOWFIELD_ => "e_cod,e_cod",
        F_LENGTH_ => "41",
        F_NODB_ => "1",
        F_ORD_ => "44",
        C_SHOW_ => "operacion.get()=='E'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estante",
        F_ALIAS_ => "Estante",
        F_HELP_ => "Estante",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "45",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(operacion.get()=='E'){estant.get()}else{db('estante')}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "filax",
        F_ALIAS_ => "Fila",
        F_HELP_ => "Fila",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20",
        F_NODB_ => "1",
        F_ORD_ => "46",
        C_VIEW_ => "operacion.get()=='E'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "colx",
        F_ALIAS_ => "Columna",
        F_HELP_ => "Columna",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20",
        F_NODB_ => "1",
        F_ORD_ => "47",
        F_INLINE_ => "1",
        C_VIEW_ => "operacion.get()=='E'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cfila",
        F_ALIAS_ => "Consulta Fila",
        F_HELP_ => "Consulta Fila",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fila from ubic where codigo ='+codigo.getStr()+' order by id desc limit 1'",
        F_QUERY_REF_ => "operacion.get()=='S'&&operacion.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "48",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ccol",
        F_ALIAS_ => "Consulta Col",
        F_HELP_ => "Consulta Col",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select col from ubic where codigo ='+codigo.getStr()+' order by id desc limit 1'",
        F_QUERY_REF_ => "operacion.get()=='S'&&operacion.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "49",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Suc",
        F_HELP_ => "Suc",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "operacion.get()=='S'",
        F_FORMULA_ => "if(operacion.get()=='E'){ sucs.get() }else{ u_suc.get() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fila",
        F_ALIAS_ => "Fila",
        F_HELP_ => "Fila",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "operacion.get()=='S'",
        F_FORMULA_ => "if(operacion.get()=='E'){ filax.get() }else{ cfila.get() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "col",
        F_ALIAS_ => "Columna",
        F_HELP_ => "Columna",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_VIEW_ => "operacion.get()=='S'",
        F_FORMULA_ => "if(operacion.get()=='E'){ colx.get() }else{ ccol.get() } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "ultima_oper.get()=='E' && operacion.get()=='E' || ultima_oper.get()=='S' && operacion.get()=='S' || descrip.get()=='__NO DATA__'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => " ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "45",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "ultima_oper.get()=='E'",
        F_FORMULA_ => "'( ! ) Solo se puede dar Salida al Producto!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "45",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "ultima_oper.get()=='S'",
        F_FORMULA_ => "'( ! ) Solo puede dar Entrada al producto!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__unlock",
        F_ALIAS_ => "Desbloquea el boton Insert/Accept",
        F_HELP_ => "Desbloqueael boton Insert/Accept",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "((ultima_oper.get()=='E' && operacion.get()=='S') || (ultima_oper.get()=='S' && operacion.get()=='E') || (ultima_oper.get()=='__NO' && operacion.get()=='E'))&&descrip.get()!='__NO DATA__'",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "last_id",
        F_ALIAS_ => "Ultimo ID",
        F_HELP_ => "Ultimo ID",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select id from ubic order by id desc limit 1'",
        F_QUERY_REF_ => "last_id.firstSQL||colx.hasChanged()||estante.hasChanged()||codigo.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "105",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "formula",
        F_ORD_ => "110",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(operacion.get()=='E'){'En Cuadrante' }else{'Fuera de Cuadrante'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
