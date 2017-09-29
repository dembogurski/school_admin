<?php
$Obj->name = "busc_producto";
$Obj->alias = "Buscar Productos";
$Obj->help = "Busqueda de Productos";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "2",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "false",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_CHANGE_ => "false",
        F_FORMULA_ => "'Utilize los combos para filtrar el producto que desea buscar (El simbolo de % indica todos)'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_sucursal",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true ORDER BY emp_cod'",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
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
        F_ORD_ => "95",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_sql",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion + Obtiene datos de Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  p_descri, p_combinado, p_cant from mnt_prod where p_cod ='+ busc_productos.getVal()  ",
        F_QUERY_REF_ => "busc_productos.hasChanged() ",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_ORD_ => "96",
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
        F_ORD_ => "97",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdp",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,%,Si",
        F_NODB_ => "1",
        F_ORD_ => "98",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_productos",
        F_ALIAS_ => "Producto/s (Código - Cantidad)",
        F_HELP_ => "Producto/s Lista de productos con estas especificaciones",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "fdp.hasChanged()||p_cod.hasChanged()||p_fam.hasChanged()||p_grupo.hasChanged()||p_tipo.hasChanged()||p_comp.hasChanged()||p_temp.hasChanged()||p_estruc.hasChanged()||p_clasif.hasChanged()||p_lisoest.hasChanged()||   p_color.hasChanged()||busc_sucursal.hasChanged()||p_cod.hasChanged()",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_cod, p_cant",
        F_FILTER_ => "'p_cod LIKE |{'+p_cod.get()+'%}| and p_fam  LIKE |{'+p_fam.get()+'%}|   and p_grupo LIKE |{'+p_grupo.get()+'%}| and p_tipo LIKE  |{'+p_tipo.get()+'%}| and p_comp LIKE |{'+p_comp.get()+'%}| and p_temp LIKE |{'+p_temp.get()+'%}| and p_estruc LIKE |{'+p_estruc.get()+'%}| and p_clasif LIKE |{'+p_clasif.get()+'%}| and p_lisoest LIKE |{'+p_lisoest.get()+'%}| and p_color LIKE |{'+p_color.get()+'%}|  and p_local LIKE |{'+busc_sucursal.get()+'%}| and prod_fin_pieza LIKE |{'+fdp.get()+'}| LIMIT 20 '",
        F_NODB_ => "1",
        F_ORD_ => "99",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        F_FORMULA_ => "'<--- Codigo del producto y la cantidad existente.'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_print",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Habilitar impresion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "101",
        C_SHOW_ => "busc_productos.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_imprimir_ind",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.codigo_barras_2",
        F_NODB_ => "1",
        F_ORD_ => "101",
        F_INLINE_ => "1",
        C_SHOW_ => "f_print.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg_frac",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "102",
        C_SHOW_ => "busc_productos.getVal()>0",
        F_FORMULA_ => "'Utilize esta area para fraccionar el producto seleccionado!!!'",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "f_cant_frac",
        F_ALIAS_ => "Cantidad a Fraccionar",
        F_HELP_ => "Cantidad a Fraccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "103",
        C_SHOW_ => "busc_productos.getVal()>0",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "f_habilitar",
        F_ALIAS_ => "Fraccionar",
        F_HELP_ => "Fraccionar este producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "104",
        C_SHOW_ => "f_cant_frac.getVal() > 0 && f_sql.get()!='__NO DATA__'",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "f_fraccionar",
        F_ALIAS_ => "Confirmar Fraccionamiento",
        F_HELP_ => "Fracciona este producto",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select count(p_cod) from mnt_prod where id = 0'",
        F_NODB_ => "1",
        F_ORD_ => "105",
        F_INLINE_ => "1",
        C_SHOW_ => "f_cant_frac.getVal() > 0  && f_sql.get()!='__NO DATA__'&&f_habilitar.get()=='Si'",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "f_proc_return",
        F_ALIAS_ => "Retorno del procedimiento",
        F_HELP_ => "Retorno del procedimiento",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "115",
        C_VIEW_ => "false",
        F_FORMULA_ => "f_fraccionar.get()",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "f_codigo_nuevo",
        F_ALIAS_ => "Codigo del Producto Fraccionado",
        F_HELP_ => "Codigo del nuevo fraccionado recientemente.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'Select fraccionar('+busc_productos.getVal()+','+f_cant_frac.getVal()+', '+f_fecha.getStr()+')'",
        F_QUERY_REF_ => "f_proc_return.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "116",
        C_SHOW_ => "true",
        C_VIEW_ => "f_fraccionar.get()",
        C_CHANGE_ => "false",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "f_imprimir",
        F_ALIAS_ => "Imprimir el Nuevo Código",
        F_HELP_ => "Imprimir codigo de barras",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.codigo_barras",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "117",
        C_SHOW_ => "f_codigo_nuevo.getVal()>0",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "msg_fin",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "118",
        C_SHOW_ => "busc_productos.getVal()>0",
        F_FORMULA_ => "'Utilize esta area para Marcar o descmarcar un procucto como fin de Pieza!'",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "prod_fin_pieza",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",No,Si",
        F_NODB_ => "1",
        F_ORD_ => "119",
        C_SHOW_ => "busc_productos.get()!=''",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "p_finalizar_pie",
        F_ALIAS_ => " Presione aqui para Marcar/Desmarcar como Final de Pieza ",
        F_HELP_ => "Marcar ",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set prod_fin_pieza = '+prod_fin_pieza.getStr()+' where p_cod = '+busc_productos.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        C_SHOW_ => "prod_fin_pieza.get()!=''",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "f_hasta",
        F_ALIAS_ => "Imprimir hasta ",
        F_HELP_ => "Imprimir hasta ",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "121",
        V_DEFAULT_ => "f_codigo_nuevo.get()",
        C_SHOW_ => "f_codigo_nuevo.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "f_rango",
        F_ALIAS_ => "Rango",
        F_HELP_ => "Rango",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "122",
        V_DEFAULT_ => "f_codigo_nuevo.get()",
        C_SHOW_ => "f_codigo_nuevo.getVal()>0",
        C_VIEW_ => "false",
        C_CHANGE_ => "f_codigo_nuevo.hasChanged()||f_hasta.hasChanged()",
        F_FORMULA_ => "if( f_hasta.getVal()>0 ){  f_hasta.get()   }else{ f_codigo_nuevo.get()  } ",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "125",
        C_SHOW_ => "el['p_clasif'].get()!=''",
        C_VIEW_ => "false",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "sub_ajuste",
        F_ALIAS_ => "Ajustes",
        F_HELP_ => "Ajustes de Mercaderia",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'aj_prod='+busc_productos.getVal()",
        F_LINK_ => "db.mnt_ajustes",
        F_SEND_ => "busc_productos.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "129",
        C_SHOW_ => "false",
        C_VIEW_ => "false",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "p_suc_name",
        F_ALIAS_ => "Nombre Sucursal",
        F_HELP_ => "Nombre Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select emp_nombre from par_empresas e, mnt_prod p where e.emp_cod = p.p_local and p.p_cod = '+busc_productos.getVal()+' limit 1'",
        F_QUERY_REF_ => "busc_productos.hasChanged()",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "139",
        C_VIEW_ => "false",
        G_SHOW_ => "16",
        G_CHANGE_ => "16"));

?>
