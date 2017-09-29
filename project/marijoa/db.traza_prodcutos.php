<?php
$Obj->name = "traza_prodcutos";
$Obj->alias = "Informe de Movimiento de Articulo";
$Obj->help = "Informe de Movimiento de Articulo";
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
        F_ORD_ => "4",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod_prod",
        F_ALIAS_ => "Código del Producto",
        F_HELP_ => "Código del Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "padre",
        F_ALIAS_ => "Padre",
        F_HELP_ => "Padre",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_padre from mnt_prod where p_cod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "creador",
        F_ALIAS_ => "Usuario que Creo",
        F_HELP_ => "Usuario que Creo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(usuario,|{  }|,DATE_FORMAT(fecha, |{%d-%m-%Y}| ) , |{ }|, hora ) from _audit_log_ where descrip like |{'+cod_prod.get()+'}| and accion like |{INSERTAR}|'",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "45",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "remito",
        F_ALIAS_ => "Remision",
        F_HELP_ => "Verifica si se encuentra en remision",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CONCAT(|{En Remision  }|, r.rem_estado ,|{  Destino }|, r.rem_dir_destino,|{ Nro: }|,r.rem_nro) FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado <> |{Cerrada}| AND d.df_cod_prod = '+cod_prod.getVal()+' '",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "13",
        C_VIEW_ => "cod_prod.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_confirmar",
        F_ALIAS_ => "Marcar como Fin de Pieza",
        F_HELP_ => "Marcar como Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "13",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "df_fin_pieza",
        F_ALIAS_ => "Marcar con Fin de Pieza ",
        F_HELP_ => "Marcar ",
        F_TYPE_ => "proc",
        //F_QUERY_ => "'update mnt_prod set prod_fin_pieza = |{Si}|  where p_cod = '+cod_prod.getVal()",
        F_QUERY_ => "'select set_fdp(|{'+p_user_+'}|, '+cod_prod.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
        C_SHOW_ => "df_confirmar.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_actual",
        F_ALIAS_ => "Cantidad Actual",
        F_HELP_ => "Cantidad Actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_cant from mnt_prod where p_cod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desc",
        F_ALIAS_ => "Grupo Tipo Color",
        F_HELP_ => "Descrip",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(p_grupo,|{ - }| ,p_tipo,|{ - }|,p_color ) from mnt_prod where p_cod ='+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descripcion",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descrip",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_descri, prod_fin_pieza from mnt_prod where p_cod ='+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "16",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_compra",
        F_ALIAS_ => "Cantidad de Compra/Fraccionada",
        F_HELP_ => "Cantidad de compra o en el momento del fraccionamiento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_cant_compra from mnt_prod where p_cod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "17",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdp_r",
        F_ALIAS_ => "Fin Pieza Si/No/R",
        F_HELP_ => "Estado",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "18",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('prod_fin_pieza')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_local_prod",
        F_ALIAS_ => "SUC",
        F_HELP_ => "Sucursal en donde se encuentra el Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_local from mnt_prod where p_cod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_SHOWFIELD_ => "emp_cod",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "19",
        F_INLINE_ => "1",
        C_SHOW_ => "cod_prod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_ancho",
        F_ALIAS_ => "Ancho",
        F_HELP_ => "Ancho",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_ancho from mnt_prod where p_cod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_gram",
        F_ALIAS_ => "Gramaje M^2",
        F_HELP_ => "Gramaje",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_gram from mnt_prod where p_cod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "21",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_kg_actual",
        F_ALIAS_ => "Kg. Calc",
        F_HELP_ => "Kg.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select round(((p_cant * p_ancho) * p_gram) / 1000,3) from mnt_prod where p_cod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "22",
        F_INLINE_ => "1",
        C_SHOW_ => "cod_prod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant_aj",
        F_ALIAS_ => "Cant. Ajustes",
        F_HELP_ => "Kg.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from mnt_ajustes where  aj_prod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "22",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_kg_desc",
        F_ALIAS_ => "Kg. Descarga",
        F_HELP_ => "Kg.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select round( p_kg_real,3) from packing_list where p_cod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "22",
        F_INLINE_ => "1",
        C_SHOW_ => "p_cant_aj.getVal()<1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_ajustes",
        F_ALIAS_ => "Ver Informe de Ajustes",
        F_HELP_ => "Ver Informe de Ajustes",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ajustes_prod",
        F_NODB_ => "1",
        F_ORD_ => "23",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mov_ventas",
        F_ALIAS_ => "Ver Movimiento por ventas",
        F_HELP_ => "Ver Movimiento por ventas",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.mov_x_venta_pro",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mov_ventas2",
        F_ALIAS_ => "Ver Movimiento con datos de Empaque",
        F_HELP_ => "Ver Movimiento por ventas",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.mov_x_venta_emp",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "info_trans",
        F_ALIAS_ => "Informe de Translados",
        F_HELP_ => "Informe de Translados",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.translado_prod",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fracs",
        F_ALIAS_ => "Ver Historial de Fraccionamientos",
        F_HELP_ => "Fraccionamientos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_frac",
        F_ORD_ => "50",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fracss",
        F_ALIAS_ => "Ver Fraccionamientos (Solo de esta Pieza)",
        F_HELP_ => "Fraccionamientos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_frac2",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "transf_positiva",
        F_ALIAS_ => "Trasnferencias Entre piezas ",
        F_HELP_ => "Trasnferencias",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.transfer_piezas",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "cod_prod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ubic_hist",
        F_ALIAS_ => "Historial de Ubicaciones",
        F_HELP_ => "Historial de Ubicaciones",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.hist_ubic",
        F_NODB_ => "1",
        F_ORD_ => "72",
        F_INLINE_ => "1",
        C_SHOW_ => "codigo.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "editar",
        F_ALIAS_ => "Editar Producto",
        F_HELP_ => "Editar Producto",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'p_cod = '+cod_prod.getVal()",
        F_LINK_ => "db.mnt_prod_cons",
        F_SEND_ => "cod_prod.get()",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "cod_prod.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod",
        F_ALIAS_ => "Replica del Codigo para Ver donde se punteo",
        F_HELP_ => "Replica del Codigo para Ver donde se punteo",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "81",
        C_VIEW_ => "false",
        F_FORMULA_ => "cod_prod.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Otra Replica del Codigo para Ver donde se punteo",
        F_HELP_ => "Replica del Codigo para Ver donde se punteo",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "83",
        C_VIEW_ => "false",
        F_FORMULA_ => "cod_prod.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_punteo",
        F_ALIAS_ => "Verificar Lugar de Punteo",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.inv_check",
        F_NODB_ => "1",
        F_ORD_ => "122",
        F_INLINE_ => "1",
        C_SHOW_ => "cod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
