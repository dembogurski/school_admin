<?php
$Obj->name = "rep_prod_stock";
$Obj->alias = "Reporte de Stock Actual";
$Obj->help = "Reporte de Stock Actual";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "1",
        F_FORMULA_ => "'El simbolo % indica todos!!!'",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aut_lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_SHOW_ => "aut_lock.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_localidad",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "111",
        F_FORMULA_ => "'Filtre  aqui los datos del Producto!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg4",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "111",
        F_FORMULA_ => "'Si no escribe como esta a la derecha ponga % al final'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_FILTER_ => " ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "115",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fams",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_fam.hasChanged()",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_cod,''",
        F_FILTER_ => "'f_cod like |{'+p_fam.get()+'%}| order by f_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "115",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_FILTER_ => " ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "116",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupos",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_grupo.hasChanged()",
        F_RELTABLE_ => "mnt_grupo",
        F_SHOWFIELD_ => "g_cod,''",
        F_FILTER_ => "'g_cod like |{'+p_grupo.get()+'%}| order by g_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "116",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Pago",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_FILTER_ => " ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "117",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipos",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo ",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_tipo.hasChanged()",
        F_RELTABLE_ => "mnt_tipo",
        F_SHOWFIELD_ => "t_cod,''",
        F_FILTER_ => "'t_cod like |{'+p_tipo.get()+'%}| order by t_cod asc'",
        F_NODB_ => "1",
        F_ORD_ => "117",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_comp",
        F_ALIAS_ => "Composición",
        F_HELP_ => "Composición de la mercadería",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_comp",
        F_FILTER_ => "'TRUE ORDER BY cp_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "118",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_temp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada em que se usa",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_temp",
        F_FILTER_ => "'true ORDER BY tp_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "119",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_estruc",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura de la tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_estruc",
        F_FILTER_ => "'true ORDER BY e_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg5",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "65",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        F_FORMULA_ => "'Clasif y Estruct elegir %% para mostrar, % no mostrar'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_clasif",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Clasificación de la tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_clasif",
        F_FILTER_ => "'true ORDER BY cl_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "121",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_color",
        F_FILTER_ => "'TRUE ORDER BY c_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "122",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_lisoest",
        F_ALIAS_ => "Liso/Estampado",
        F_HELP_ => "Liso/Estampado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,%%",
        F_RELTABLE_ => "mnt_lisoest",
        F_FILTER_ => "'true ORDER BY l_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "123",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_term",
        F_ALIAS_ => "Terminacion del Año",
        F_HELP_ => "Terminacion del Año",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "139",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg3",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "140",
        F_INLINE_ => "1",
        F_FORMULA_ => "'Ejemplo  %09  para productos con terminacion 09  '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p1",
        F_ALIAS_ => "Valor Venta 1",
        F_HELP_ => "Valor Venta 1",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Mostrar,No Mostrar",
        F_NODB_ => "1",
        F_ORD_ => "510",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p2",
        F_ALIAS_ => "Valor Venta 2",
        F_HELP_ => "Valor Venta 2",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Mostrar,No Mostrar",
        F_NODB_ => "1",
        F_ORD_ => "520",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p3",
        F_ALIAS_ => "Valor Venta 3",
        F_HELP_ => "Valor Venta 3",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Mostrar,No Mostrar",
        F_NODB_ => "1",
        F_ORD_ => "530",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p4",
        F_ALIAS_ => "Valor Venta 4",
        F_HELP_ => "Valor Venta 4",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Mostrar,No Mostrar",
        F_NODB_ => "1",
        F_ORD_ => "540",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p5",
        F_ALIAS_ => "Valor Venta 5",
        F_HELP_ => "Valor Venta 5",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Mostrar,No Mostrar",
        F_NODB_ => "1",
        F_ORD_ => "550",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "m1",
        F_ALIAS_ => "Px",
        F_HELP_ => "Px",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "552",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(p1.get()=='Mostrar'){'%%'}else{'%'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "m2",
        F_ALIAS_ => "Px",
        F_HELP_ => "Px",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "553",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(p2.get()=='Mostrar'){'%%'}else{'%'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "m3",
        F_ALIAS_ => "Px",
        F_HELP_ => "Px",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "557",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(p3.get()=='Mostrar'){'%%'}else{'%'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "m4",
        F_ALIAS_ => "Px",
        F_HELP_ => "Px",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "558",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(p4.get()=='Mostrar'){'%%'}else{'%'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "m5",
        F_ALIAS_ => "Px",
        F_HELP_ => "Px",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "559",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(p5.get()=='Mostrar'){'%%'}else{'%'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdp",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,%,Si,R,RS",
        F_NODB_ => "1",
        F_ORD_ => "560",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "preciox",
        F_ALIAS_ => "Precio_",
        F_HELP_ => "Precio_",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "1,2,3,4,5",
        F_NODB_ => "1",
        F_ORD_ => "561",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "precio",
        F_ALIAS_ => "Precio",
        F_HELP_ => "Precio",
        F_TYPE_ => "formula",
        F_QUERY_ => " ",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "562",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "'p_precio_'+preciox.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "simp",
        F_ALIAS_ => "Ver Reporte Simplificado",
        F_HELP_ => "Ver Reporte Simplificado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "580",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stock",
        F_ALIAS_ => "Generar Reporte",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_prod_exist",
        F_NODB_ => "1",
        F_ORD_ => "600",
        C_SHOW_ => "true",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stock2",
        F_ALIAS_ => "Generar Reporte  (En Formato CSV) Para exportar a Exell",
        F_HELP_ => "Genera Reporte en formato CSV para exportar a Exell",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.file_prod_exist",
        F_NODB_ => "1",
        F_ORD_ => "610",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prods_no_gramados",
        F_ALIAS_ => "Reporte de Productos No gramados",
        F_HELP_ => "Reporte de Productos No gramados",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.prods_sin_gramaje",
        F_NODB_ => "1",
        F_ORD_ => "700",
        F_INLINE_ => "1",
        C_SHOW_ => "rep_localidad.get()!=''&&rep_localidad.get()!='%'&&rep_localidad.get()!='%%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prods_gramados",
        F_ALIAS_ => "Reporte de Productos Con Gramaje",
        F_HELP_ => "Reporte de Productos Con Gramaje",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.prods_con_gramaje",
        F_NODB_ => "1",
        F_ORD_ => "700",
        F_INLINE_ => "1",
        C_SHOW_ => "rep_localidad.get()!=''&&rep_localidad.get()!='%'&&rep_localidad.get()!='%%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
