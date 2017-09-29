<?php
$Obj->name = "mnt_prod_show";
$Obj->alias = "Productos";
$Obj->help = "Mantenimiento de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prod";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'SELECT refresh_prod_comp('+p_cant.getVal()+','+p_cod.getVal()+','+p_ref.getVal()+','+p_anio.getStr()+')'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "50";
$Obj->Add(
    array(
        F_NAME_ => "p_year",
        F_ALIAS_ => "Año Actual",
        F_HELP_ => "Año Actual",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_anio",
        F_ALIAS_ => "Año",
        F_HELP_ => "Año",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_year.get().substr(8,12)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_SHOW_ => "false",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select codigo_prod('+p_anio.getStr()+')'",
        F_QUERY_REF_ => "p_cod.firstSQL&&operation==INSERT_",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "4",
        C_SHOW_ => "p_anio.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "8",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['c_ref']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_factura",
        F_ALIAS_ => "Factura",
        F_HELP_ => "Factura",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "20",
        F_ORD_ => "7",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['c_factura']",
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
        V_DEFAULT_ => "sup['c_fechafac']",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Família",
        F_HELP_ => "Família a que pertenece",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_fam",
        F_FILTER_ => "'true ORDER BY f_cod'",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "                                    Grupo                ",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_grupo",
        F_FILTER_ => "'TRUE ORDER BY g_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        C_SHOW_ => "el['p_fam'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de tela",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_tipo",
        F_FILTER_ => "'TRUE ORDER BY t_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "el['p_fam'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_comp",
        F_ALIAS_ => "Composición    ",
        F_HELP_ => "Composición de la mercadería",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_comp",
        F_FILTER_ => "'TRUE ORDER BY cp_cod' ",
        F_LENGTH_ => "40",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_SHOW_ => "el['p_fam'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_temp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada em que se usa",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_temp",
        F_FILTER_ => "'true ORDER BY tp_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "70",
        C_SHOW_ => "el['p_fam'].get()!=''",
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
        F_RELTABLE_ => "mnt_clasif",
        F_FILTER_ => "'true ORDER BY cl_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "90",
        C_SHOW_ => "el['p_fam'].get()!=''",
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
        F_RELTABLE_ => "mnt_color",
        F_FILTER_ => "'TRUE ORDER BY c_cod' ",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "96",
        C_SHOW_ => "el['p_fam'].get()!=''",
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
        F_BROW_ => "1",
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
        C_SHOW_ => "el['p_grupo'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant_compra",
        F_ALIAS_ => "Cantidad de Compra",
        F_HELP_ => "Cantidad de Compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_cant_compra from mnt_prod where p_cod = '+p_cod.getVal()+''",
        F_QUERY_REF_ => "p_cant_compra.firstSQL",
        F_ORD_ => "101",
        F_INLINE_ => "1",
        C_SHOW_ => "p_cod.get()!=''",
        C_VIEW_ => "operation!=INSERT_",
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
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "p_local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "190",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableChange",
        F_ALIAS_ => "Inhabilita boton de Modificar",
        F_HELP_ => "Inhabilita boton de Modificar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
