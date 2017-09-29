<?php
$Obj->name = "prod_act";
$Obj->alias = "Analisis de Productos (Actualizacion)";
$Obj->help = "Analisis de Productos (Actualizacion)";
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
        F_NAME_ => "msg_0",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "160",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "4",
        F_FORMULA_ => "'SOLO PONGA % O UN DIGITO EN EL AÑO!!! NO PONGA 08, 09 ETC. EJ:  8  O  9  PARA PRODS. DEL 2008 O 2009 '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg_20",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "160",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "4",
        F_FORMULA_ => "'NO DEJAR % EN LA CASILLA DE AÑOS (REPETIR EL ULTIMO AÑO SI LE SOBRAN AÑOS)'",
        G_SHOW_ => "64",
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
        F_NAME_ => "p_local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Localidad o Sucursal en donde se encuentra el Producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_anio",
        F_ALIAS_ => "Terminacion de Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "15",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "anio",
        F_ALIAS_ => "Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  concat(|{%}|,|{'+p_anio.get()+'}|)'",
        F_QUERY_REF_ => "p_anio.hasChanged()||anio.firstSQL",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_anio1",
        F_ALIAS_ => "Terminacion de Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "16",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "anio1",
        F_ALIAS_ => "Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  concat(|{%}|,|{'+p_anio1.get()+'}|)'",
        F_QUERY_REF_ => "p_anio1.hasChanged()||anio1.firstSQL",
        F_LENGTH_ => "4",
        F_ORD_ => "16",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_anio2",
        F_ALIAS_ => "Terminacion de Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "16",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "anio2",
        F_ALIAS_ => "Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  concat(|{%}|,|{'+p_anio2.get()+'}|)'",
        F_QUERY_REF_ => "p_anio2.hasChanged()||anio2.firstSQL",
        F_LENGTH_ => "4",
        F_ORD_ => "17",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_anio3",
        F_ALIAS_ => "Terminacion de Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "18",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "anio3",
        F_ALIAS_ => "Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  concat(|{%}|,|{'+p_anio3.get()+'}|)'",
        F_QUERY_REF_ => "p_anio3.hasChanged()||anio3.firstSQL",
        F_LENGTH_ => "4",
        F_ORD_ => "18",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_anio4",
        F_ALIAS_ => "Terminacion de Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "19",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "anio4",
        F_ALIAS_ => "Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  concat(|{%}|,|{'+p_anio4.get()+'}|)'",
        F_QUERY_REF_ => "p_anio4.hasChanged()||anio4.firstSQL",
        F_LENGTH_ => "4",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_prov",
        F_ALIAS_ => "Buscar Importador",
        F_HELP_ => "Buscar Importador",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_import",
        F_ALIAS_ => "Importado por",
        F_HELP_ => "Importado por",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_import from mnt_prod where p_import like |{'+busc_prov.get()+'%}|  limit 1'",
        F_QUERY_REF_ => "busc_prov.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "115",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "116",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Pago",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "117",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_combinado",
        F_ALIAS_ => "Combinado",
        F_HELP_ => "Codigo Combinado Resumen ",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "119",
        V_DEFAULT_ => "'%'",
        F_FORMULA_ => " ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p1",
        F_ALIAS_ => "Precio 1",
        F_HELP_ => "Precio 1",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "120",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pc",
        F_ALIAS_ => "Precio Compra",
        F_HELP_ => "Precio Compra",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_color",
        F_FILTER_ => "'TRUE ORDER BY c_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "121",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdp",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,si,%",
        F_NODB_ => "1",
        F_ORD_ => "122",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "count_prods",
        F_ALIAS_ => "Cantidad de Productos",
        F_HELP_ => "Cantidad de Productos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT count(*) from mnt_prod p  WHERE p_fam like '+p_fam.getStr()+' and p_grupo like '+p_grupo.getStr()+' and p_tipo like '+p_tipo.getStr()+' and p_combinado like '+p_combinado.getStr()+' and (p_cod like '+anio.getStr()+' or p_cod like '+anio1.getStr()+' or p_cod like '+anio2.getStr()+'  or p_cod like '+anio3.getStr()+' or p_cod like '+anio4.getStr()+') and p_local like '+p_local.getStr()+' and p_import like '+p_import.getStr()+' and prod_fin_pieza like '+fdp.getStr()+' and p_precio_1 like '+p1.getStr()+' and p_color like '+p_color.getStr()+' and p_compra like '+pc.getStr()+'  '",
        F_QUERY_REF_ => "p_tipo.hasChanged()||p_fam.hasChanged()||p_grupo.hasChanged()||p_combinado.hasChanged()||anio.hasChanged()||p_import.hasChanged()||p_local.hasChanged()||fdp.hasChanged()||p1.hasChanged()||pc.hasChanged()||p_color.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "125",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_prods",
        F_ALIAS_ => "                       Suma de Metros",
        F_HELP_ => "Cantidad de Productos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(p_cant) from mnt_prod p  WHERE   p_fam like '+p_fam.getStr()+' and p_grupo like '+p_grupo.getStr()+' and p_tipo like '+p_tipo.getStr()+' and p_combinado like '+p_combinado.getStr()+' and (p_cod like '+anio.getStr()+' or p_cod like '+anio1.getStr()+' or p_cod like '+anio2.getStr()+'  or p_cod like '+anio3.getStr()+' or p_cod like '+anio4.getStr()+') and p_local like '+p_local.getStr()+' and p_import like '+p_import.getStr()+' and prod_fin_pieza like '+fdp.getStr()+' and p_precio_1 like '+p1.getStr()+' and p_color like '+p_color.getStr()+' and p_compra like '+pc.getStr()+'  '",
        F_QUERY_REF_ => "p_tipo.hasChanged()||p_fam.hasChanged()||p_grupo.hasChanged()||p_combinado.hasChanged()||anio.hasChanged()||p_import.hasChanged()||p_local.hasChanged()||fdp.hasChanged()||p1.hasChanged()||pc.hasChanged()||p_color.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "127",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_x_pr_comp",
        F_ALIAS_ => "Suma (Cantidad * Precio de Compra + Recargo)",
        F_HELP_ => "Cantidad * Precio de Compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum((((p_compra * p_porc_recargo) / 100) + p_compra) * p_cant) from mnt_prod  WHERE  p_fam like '+p_fam.getStr()+' and p_grupo like '+p_grupo.getStr()+' and p_tipo like '+p_tipo.getStr()+' and p_combinado like '+p_combinado.getStr()+' and (p_cod like '+anio.getStr()+' or p_cod like '+anio1.getStr()+' or p_cod like '+anio2.getStr()+'  or p_cod like '+anio3.getStr()+' or p_cod like '+anio4.getStr()+') and p_local like '+p_local.getStr()+' and p_import like '+p_import.getStr()+' and prod_fin_pieza like '+fdp.getStr()+' and p_precio_1 like '+p1.getStr()+' and p_color like '+p_color.getStr()+' and p_compra like '+pc.getStr()+' '",
        F_QUERY_REF_ => "p_tipo.hasChanged()||p_fam.hasChanged()||p_grupo.hasChanged()||p_combinado.hasChanged()||anio.hasChanged()||p_import.hasChanged()||p_local.hasChanged()||fdp.hasChanged()||p1.hasChanged()||pc.hasChanged()||p_color.hasChanged()",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "128",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "promedio",
        F_ALIAS_ => "Promedio",
        F_HELP_ => "Promedio",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "129",
        F_INLINE_ => "1",
        C_SHOW_ => "cant_prods.getVal()>0",
        F_FORMULA_ => "cant_x_pr_comp.getVal()/cant_prods.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_prods",
        F_ALIAS_ => "      Ver lista de Productos con estas Caracteristicas      ",
        F_HELP_ => "Muestra Productos con estas Caracteristicas",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.act_precios",
        F_NODB_ => "1",
        F_ORD_ => "137",
        C_SHOW_ => "cant_prods.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_precios",
        F_ALIAS_ => "Ver Precios Actuales",
        F_HELP_ => "Ver Precios Actuales",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ver_precios",
        F_NODB_ => "1",
        F_ORD_ => "137",
        F_INLINE_ => "1",
        C_SHOW_ => "cant_prods.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nuevo_precio",
        F_ALIAS_ => "Nuevo Precio Minimo",
        F_HELP_ => "Nuevo Precio Minimo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "138",
        C_SHOW_ => "cant_prods.getVal()>0",
        F_FORMULA_ => "promedio.getVal()/0.8",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_1",
        F_ALIAS_ => "Precio 1",
        F_HELP_ => "Precio cliente 1",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "174",
        C_SHOW_ => "cant_prods.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_2",
        F_ALIAS_ => "Precio 2",
        F_HELP_ => "Precio cliente 2",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+p_precio_1.getVal()+'-'+p_precio_1.getVal()+'*p_desc_2/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p_precio_1.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "175",
        C_SHOW_ => "cant_prods.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_3",
        F_ALIAS_ => "Precio 3",
        F_HELP_ => "Precio cliente 3",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+el['p_precio_1'].getVal()+'-'+el['p_precio_1'].getVal()+'*p_desc_3/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p_precio_1.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "178",
        C_SHOW_ => "cant_prods.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_4",
        F_ALIAS_ => "Precio 4",
        F_HELP_ => "Precio cliente 4",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+el['p_precio_1'].getVal()+'-'+el['p_precio_1'].getVal()+'*p_desc_4/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p_precio_1.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "179",
        C_SHOW_ => "cant_prods.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_5",
        F_ALIAS_ => "Precio 5",
        F_HELP_ => "Precio cliente 5",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+el['p_precio_1'].getVal()+'-'+el['p_precio_1'].getVal()+'*p_desc_5/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p_precio_1.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "180",
        C_SHOW_ => "cant_prods.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_error",
        F_ALIAS_ => "ATENCION",
        F_HELP_ => "ATENCION",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "185",
        C_SHOW_ => "(el['p_precio_1'].getVal()<el['nuevo_precio'].getVal())||(el['p_precio_2'].getVal()<el['nuevo_precio'].getVal())||(el['p_precio_3'].getVal()<el['nuevo_precio'].getVal())||(el['p_precio_4'].getVal()<el['nuevo_precio'].getVal())||(el['p_precio_5'].getVal()<el['nuevo_precio'].getVal())",
        F_FORMULA_ => "'Estás vendiendo abajo del mínimo de venta! CUIDADO!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "upd0",
        F_ALIAS_ => "Actualizar Precios",
        F_HELP_ => "Cambiar Precios de todos estos productos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "190",
        C_SHOW_ => "p_precio_5.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "200",
        F_INLINE_ => "1",
        C_SHOW_ => "upd0.get()=='Si'",
        F_FORMULA_ => "'ESTO PODRIA SER MUY PELIGROSO!!!  ¿ESTA SEGURO DE LO QUE ESTA HACIENDO?'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "upd1",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "202",
        F_INLINE_ => "1",
        C_SHOW_ => "upd0.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "upd2",
        F_ALIAS_ => "Aceptar (Modificara todos los precios)",
        F_HELP_ => "Aceptar (Modificara todos los precios)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'UPDATE mnt_prod SET p_valmin = '+nuevo_precio.getVal()+', p_precio_1 = '+p_precio_1.getVal()+',p_precio_2 = '+p_precio_2.getVal()+',p_precio_3 = '+p_precio_3.getVal()+',p_precio_4 = '+p_precio_4.getVal()+',p_precio_5 = '+p_precio_5.getVal()+' WHERE  p_fam like '+p_fam.getStr()+' and p_grupo like '+p_grupo.getStr()+' and p_tipo like '+p_tipo.getStr()+' and p_combinado like '+p_combinado.getStr()+'  and (p_cod like '+anio.getStr()+' or p_cod like '+anio1.getStr()+' or p_cod like '+anio2.getStr()+'  or p_cod like '+anio3.getStr()+' or p_cod like '+anio4.getStr()+') and p_local like '+p_local.getStr()+' and p_import like '+p_import.getStr()+' and prod_fin_pieza like '+fdp.getStr()+' and p_precio_1 like '+p1.getStr()+' and p_color like '+p_color.getStr()+' and p_compra like '+pc.getStr()+' '",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "upd1.get()=='Si'",
        C_VIEW_ => "count_prods.getVal()<5001",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__messaje",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "220",
        F_FORMULA_ => "'Actualizacion hasta 5000 productos'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
