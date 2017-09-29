<?php
$Obj->name = "prod_ins_manual";
$Obj->alias = "Insercion directa de productos";
$Obj->help = "Insercion directa de productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prod";
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
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_verif",
        F_ALIAS_ => "Verificacion",
        F_HELP_ => "Verificacion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT count(*) from mnt_prod where p_cod = '+p_cod.getVal()",
        F_QUERY_REF_ => "p_cod.hasChanged()",
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "4",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_factura",
        F_ALIAS_ => "Factura",
        F_HELP_ => "Factura",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_ORD_ => "7",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fecha",
        F_ALIAS_ => "Fecha Factura",
        F_HELP_ => "Fecha de la factura del producto",
        F_TYPE_ => "date",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "ATENCION!!!",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_SHOW_ => "p_verif.getVal()>0",
        F_FORMULA_ => "'( ! ) ATENCION!!! PRODUCTO YA CARGADO ANTERIORMENTE!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Família",
        F_HELP_ => "Família a que pertenece",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_fam",
        F_FILTER_ => "'true ORDER BY f_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "                                    Grupo                ",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_grupo",
        F_FILTER_ => "'TRUE ORDER BY g_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_tipo",
        F_FILTER_ => "'TRUE ORDER BY t_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_comp",
        F_ALIAS_ => "Composición    ",
        F_HELP_ => "Composición de la mercadería",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_comp",
        F_FILTER_ => "'TRUE ORDER BY cp_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_temp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada em que se usa",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_temp",
        F_FILTER_ => "'true ORDER BY tp_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_estruc",
        F_ALIAS_ => "                                                  Estructura",
        F_HELP_ => "Estructura de la tela",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_estruc",
        F_LENGTH_ => "40",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_SHOW_ => "el['p_fam'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_clasif",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Clasificación de la tela",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_clasif",
        F_FILTER_ => "'true ORDER BY cl_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_lisoest",
        F_ALIAS_ => "                                                 Liso/Estamp",
        F_HELP_ => "Liso/Estampado",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_lisoest",
        F_FILTER_ => "'true ORDER BY l_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "95",
        F_INLINE_ => "1",
        C_SHOW_ => "el['p_fam'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_color",
        F_FILTER_ => "'TRUE ORDER BY c_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "96",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_iden",
        F_ALIAS_ => "                        Productos Identicos",
        F_HELP_ => "Productos Identicos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from mnt_prod where  p_fam  LIKE |{'+p_fam.get()+'%}|   and p_grupo LIKE |{'+p_grupo.get()+'%}| and p_tipo LIKE  |{'+p_tipo.get()+'%}| and p_comp LIKE |{'+p_comp.get()+'%}| and p_temp LIKE |{'+p_temp.get()+'%}| and p_estruc LIKE |{'+p_estruc.get()+'%}| and p_clasif LIKE |{'+p_clasif.get()+'%}| and p_lisoest LIKE |{'+p_lisoest.get()+'%}| and p_color LIKE |{%}|  and p_cant > 0 and prod_fin_pieza = |{No}| '",
        F_QUERY_REF_ => "p_fam.hasChanged()||p_grupo.hasChanged()||p_estruc.hasChanged()||p_lisoest.hasChanged() ",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "96",
        F_INLINE_ => "1",
        C_VIEW_ => "el['p_fam'].get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_descri",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_ORD_ => "97",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_combinado",
        F_ALIAS_ => "Resumen",
        F_HELP_ => "Codigo Combinado Resumen ",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "97",
        C_SHOW_ => "p_fam.get()!=''&&p_grupo.get()!=''      /*el['p_c_total'].getVal()!=0*/",
        C_VIEW_ => "false",
        C_CHANGE_ => "p_fam.hasChanged()||p_grupo.hasChanged()||p_tipo.hasChanged()||p_comp.hasChanged()||p_estruc.hasChanged()",
        F_FORMULA_ => "el['p_fam'].get()+'-'+el['p_grupo'].get()+'-'+el['p_tipo'].get()/*+'-'+el['p_comp'].get()+'-'+el['p_estruc'].get()+'-'+el['p_clasif'].get()+'-'+el['p_lisoest'].get()*/",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_moneda",
        F_ALIAS_ => "Moneda Utilizada",
        F_HELP_ => "Moneda Utilizada para los cálculos",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_ORD_ => "98",
        C_SHOW_ => "el['p_comp'].get()!=''",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['c_moneda']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cambio",
        F_ALIAS_ => "Cambio calculado",
        F_HELP_ => "Cambio calculado para el costo",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "99",
        V_DEFAULT_ => "sup['c_cambio']",
        C_SHOW_ => "el['p_comp'].get()!=''",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad Comprada",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "101",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant_compra",
        F_ALIAS_ => "Cantidad de Compra",
        F_HELP_ => "Cantidad de Compra",
        F_TYPE_ => "text",
        F_ORD_ => "101",
        F_INLINE_ => "1",
        C_VIEW_ => "operation!=INSERT_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_c_total",
        F_ALIAS_ => "Valor. Total",
        F_HELP_ => "Valor. Total",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "102",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_compra",
        F_ALIAS_ => "Precio de Compra",
        F_HELP_ => "Precio Unitario de Compra",
        F_TYPE_ => "formula",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "103",
        F_INLINE_ => "1",
        C_SHOW_ => "el['p_cant'].getVal()!=0&el['p_c_total'].getVal()!=0",
        C_CHANGE_ => "p_cant.hasChanged()||p_c_total.hasChanged()",
        F_FORMULA_ => "p_c_total.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_porc_recargo",
        F_ALIAS_ => "% de Recargo",
        F_HELP_ => "% de Recargo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "7",
        F_BROW_ => "1",
        F_ORD_ => "104",
        F_INLINE_ => "1",
        F_FORMULA_ => "0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_valmin",
        F_ALIAS_ => "Venta mínimo",
        F_HELP_ => "Precio de Venta mínimo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CEILING('+el['p_compra'].getVal()+'/p_margen) + CEILING(('+p_compra.getVal()*p_porc_recargo.getVal()+') / 100) FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "el['p_compra'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "106",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_1",
        F_ALIAS_ => "Precio 1",
        F_HELP_ => "Precio cliente 1",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_1 FROM mnt_prod WHERE p_combinado='+el['p_combinado'].getStr()+' ORDER BY id DESC LIMIT 1'",
        F_QUERY_REF_ => "el['p_combinado'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "110",
        C_SHOW_ => "el['p_cant'].getVal()!=0",
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
        F_ORD_ => "120",
        C_VIEW_ => "p_c_total.getVal()!=0",
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
        F_QUERY_REF_ => "el['p_precio_1'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "130",
        C_SHOW_ => "el['p_c_total'].getVal()!=0",
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
        F_QUERY_REF_ => "el['p_precio_1'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "140",
        C_SHOW_ => "el['p_c_total'].getVal()!=0",
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
        F_QUERY_REF_ => "el['p_precio_1'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "150",
        C_SHOW_ => "el['p_c_total'].getVal()!=0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_update",
        F_ALIAS_ => "Actualizar Precios de productos con esta caracteristica",
        F_HELP_ => "Actualizar Precios de productos con esta caracteristica",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set p_precio_1 = '+p_precio_1.getVal()+', p_precio_2 = '+p_precio_2.getVal()+', p_precio_3 = '+p_precio_3.getVal()+', p_precio_4 = '+p_precio_4.getVal()+', p_precio_5 = '+p_precio_4.getVal()+' where p_fam  LIKE |{'+p_fam.get()+'%}|   and p_grupo LIKE |{'+p_grupo.get()+'%}| and p_tipo LIKE  |{'+p_tipo.get()+'%}| and p_comp LIKE |{'+p_comp.get()+'%}| and p_temp LIKE |{'+p_temp.get()+'%}| and p_estruc LIKE |{'+p_estruc.get()+'%}| and p_clasif LIKE |{'+p_clasif.get()+'%}| and p_lisoest LIKE |{'+p_lisoest.get()+'%}| and p_color LIKE |{%}|  and p_cant > 0 and prod_fin_pieza = |{No}|'",
        F_NODB_ => "1",
        F_ORD_ => "155",
        F_INLINE_ => "1",
        C_SHOW_ => "(p_c_total.getVal()>0&&  (el['p_precio_1'].getVal()>el['p_valmin'].getVal())||(el['p_precio_2'].getVal()>el['p_valmin'].getVal())||(el['p_precio_3'].getVal()>el['p_valmin'].getVal())||(el['p_precio_4'].getVal()>el['p_valmin'].getVal())||(el['p_precio_5'].getVal()>el['p_valmin'].getVal()))&&p_iden.getVal()>0",
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
        F_ORD_ => "160",
        C_SHOW_ => "(el['p_precio_1'].getVal()<el['p_valmin'].getVal())||(el['p_precio_2'].getVal()<el['p_valmin'].getVal())||(el['p_precio_3'].getVal()<el['p_valmin'].getVal())||(el['p_precio_4'].getVal()<el['p_valmin'].getVal())||(el['p_precio_5'].getVal()<el['p_valmin'].getVal())",
        F_FORMULA_ => "'Estás vendiendo abajo del mínimo de venta! CUIDADO!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_padre",
        F_ALIAS_ => "Padre",
        F_HELP_ => "Producto Padre",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_ORD_ => "180",
        C_SHOW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_local",
        F_ALIAS_ => "Localidad",
        F_HELP_ => "Localidad o Sucursal en donde se encuentra el Producto",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "16",
        F_ORD_ => "190",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prod_fin_pieza",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_ORD_ => "195",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prod_translado",
        F_ALIAS_ => "Aceptar",
        F_HELP_ => "Aceptar",
        F_TYPE_ => "proc",
        F_OPTIONS_ => "destino varchar(4), cod_prod integer, descrip varchar(60), disponible float(10,2)",
        F_QUERY_ => "'select cargar_detalle_remi('+p_local.getStr()+','+prod_destino.getStr()+','+p_cod.getStr()+','+p_combinado.getStr()+' ,'+p_cant.getVal()+')'",
        F_NODB_ => "1",
        F_ORD_ => "205",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sub_ajuste",
        F_ALIAS_ => "Ajustes",
        F_HELP_ => "Ajustes de Mercaderia",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'aj_prod='+p_cod.getVal()",
        F_LINK_ => "db.mnt_ajustes",
        F_SEND_ => "p_cod.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "207",
        C_SHOW_ => "(p_cod.get()!=''&&operation!=INSERT_)&&sup['c_bloq_ins']!='' ",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__makeInsert",
        F_ALIAS_ => "Fuerza el insert",
        F_HELP_ => "Fuerza el insert",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "prod_translado.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "forceInsert()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_SHOW_ => "p_verif.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
