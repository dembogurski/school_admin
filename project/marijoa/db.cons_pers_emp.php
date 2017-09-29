<?php
$Obj->name = "cons_pers_emp";
$Obj->alias = "Consultar Productos";
$Obj->help = "Consultar Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "busc_prod_browse";
$Obj->Filter = "db.mnt_prod_show";
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
        F_NAME_ => "msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "2",
        F_FORMULA_ => "'Filtre  aqui los datos del Producto!!! SE LISTAN LOS PRIMEROS 30 DATOS'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_estado_prod",
        F_ALIAS_ => "Ver Estado del Producto",
        F_HELP_ => "Ver Estado del Producto",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.estado_producto",
        F_NODB_ => "1",
        F_ORD_ => "22",
        F_INLINE_ => "1",
        C_SHOW_ => "p_cod.get()!=''",
        G_SHOW_ => "64",
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
        F_FILTER_ => "'true order by emp_cod'",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "28",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        F_FORMULA_ => "'( ! ) Los Items de la derecha son solo guías!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Família",
        F_HELP_ => "Família a que pertenece",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "30",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f",
        F_ALIAS_ => "Família",
        F_HELP_ => "Família a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_fam.hasChanged()",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_cod,''",
        F_FILTER_ => "'f_cod like |{'+p_fam.get()+'%}| or f_cod like |{%'+p_fam.get()+'%}|  order by f_cod'",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "42",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "g",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_grupo.hasChanged()",
        F_RELTABLE_ => "mnt_grupo",
        F_SHOWFIELD_ => "g_cod,''",
        F_FILTER_ => "'g_cod  like |{'+p_grupo.get()+'%}| or g_cod  like |{%'+p_grupo.get()+'%}|  ORDER BY g_cod limit 30' ",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de tela",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "50",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "t",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de tela",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_tipo.hasChanged()",
        F_RELTABLE_ => "mnt_tipo",
        F_SHOWFIELD_ => "t_cod,''",
        F_FILTER_ => "'t_cod  like |{'+p_tipo.get()+'%}| or t_cod  like |{%'+p_tipo.get()+'%}| ORDER BY t_cod limit 30'",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "55",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_comp",
        F_ALIAS_ => "Composición",
        F_HELP_ => "Composición de la mercadería",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "60",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c",
        F_ALIAS_ => "Composición",
        F_HELP_ => "Composición de la mercadería",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_comp.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_comp",
        F_SHOWFIELD_ => "cp_cod,''",
        F_FILTER_ => "'cp_cod  like |{'+p_comp.get()+'%}| or cp_cod  like |{%'+p_comp.get()+'%}| ORDER BY cp_cod' ",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_temp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada em que se usa",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "70",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada em que se usa",
        F_TYPE_ => "select_list",
        F_DSL_ => " ",
        F_RELTABLE_ => "mnt_temp",
        F_SHOWFIELD_ => "tp_cod,''",
        F_FILTER_ => "'true ORDER BY tp_cod' ",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "72",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_estruc",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura de la tela",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "80",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "e",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura de la tela",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_estruc",
        F_SHOWFIELD_ => "e_cod,''",
        F_FILTER_ => "'true ORDER BY e_cod' ",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "82",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_clasif",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Clasificación de la tela",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "90",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cl",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Clasificación de la tela",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_clasif.hasChanged()",
        F_RELTABLE_ => "mnt_clasif",
        F_SHOWFIELD_ => "cl_cod,''",
        F_FILTER_ => "'cl_cod  like |{'+p_clasif.get()+'%}| or   cl_cod  like |{%'+p_clasif.get()+'%}|  ORDER BY cl_cod' ",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "92",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_lisoest",
        F_ALIAS_ => "Liso/Estamp",
        F_HELP_ => "Liso/Estampado",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "95",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "l",
        F_ALIAS_ => "Liso/Estamp",
        F_HELP_ => "Liso/Estampado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_lisoest",
        F_SHOWFIELD_ => "l_cod,''",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "105",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cr",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "p_color.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'c_cod  like |{'+p_color.get()+'%}| or c_cod  like |{%'+p_color.get()+'%}| ORDER BY c_cod' ",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo de familas del producto",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "131",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_cod.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "130",
        F_NODB_ => "1",
        F_ORD_ => "149",
        F_FORMULA_ => "'Use el comodin (%) para abarcar busquedas mas amplias Ej.:   %a cuandros%  '",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_descri",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "100",
        F_BROW_ => "1",
        F_ORD_ => "150",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad Comprada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "200",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prod_fin_pieza",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,%,Si,R",
        F_ORD_ => "205",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__report",
        F_ALIAS_ => "Ver Resultados",
        F_HELP_ => "Ver Resultados en forma de reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.busc_prod",
        F_NODB_ => "1",
        F_ORD_ => "210",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
