<?php
$Obj->name = "sueldos_var";
$Obj->alias = "Calculo de Sueldo x Variable";
$Obj->help = "Calculo de Sueldo x Variable";
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
        F_ORD_ => "5",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "desde",
        F_ALIAS_ => "Desde",
        F_HELP_ => "Desde",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta la Fecha",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_buscar_func",
        F_ALIAS_ => "Buscar Funcionario",
        F_HELP_ => "Busca el Funcionario ",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "16",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_cod_func",
        F_ALIAS_ => "Funcionario",
        F_HELP_ => "Código y nombre completo del funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "el['sue_buscar_func'].hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'(func_fullname LIKE |{%'+el['sue_buscar_func'].get()+'%}| or func_cod LIKE |{'+el['sue_buscar_func'].get()+'%}|) and func_estado = |{Activo}|'",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cat",
        F_ALIAS_ => "Categoria Registrada",
        F_HELP_ => "Suc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select func_cat from mnt_func where func_cod = '+sue_cod_func.getStr()+' '",
        F_QUERY_REF_ => "sue_cod_func.hasChanged()",
        F_LENGTH_ => "26",
        F_ORD_ => "25",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "antiguedad",
        F_ALIAS_ => "Antiguedad desde Contrato",
        F_HELP_ => "Antiguedad en dias",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT  datediff('+hasta.getStr()+',func_fecha_cont) AS ANT FROM mnt_func  WHERE func_cod = '+sue_cod_func.getStr()+' '",
        F_QUERY_REF_ => "sue_cod_func.hasChanged()",
        F_LENGTH_ => "10",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "antig_x_pri_fac",
        F_ALIAS_ => "Antiguedad desde 1ra Factura",
        F_HELP_ => "Antiguedad en dias desde la Primera factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT datediff('+hasta.getStr()+',fact_fecha) FROM factura WHERE fact_vend_cod = '+sue_cod_func.getStr()+' ORDER BY id ASC LIMIT 1'",
        F_QUERY_REF_ => "sue_cod_func.hasChanged()",
        F_LENGTH_ => "10",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "func_cat",
        F_ALIAS_ => "Seleccione la Categoria",
        F_HELP_ => "Categoria",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "func_cat.firstSQL",
        F_RELTABLE_ => "mnt_cat_vend",
        F_SHOWFIELD_ => "categ,concat(|{Rango Antiguedad: }|,a_min,|{-}|,a_max,|{ Meta: }|,meta)",
        F_NODB_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Sucursal (Solo p/Reporte General)",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc '",
        F_NODB_ => "1",
        F_ORD_ => "36",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep",
        F_ALIAS_ => "Generar Reporte (Calculo de Variable)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.calc_comis_vent",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "desde.notEmpty()&&hasta.notEmpty()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rep_comis",
        F_ALIAS_ => "Generar Reporte de Comisiones por Ventas Sector Hogar (Todos los Vendedores)",
        F_HELP_ => "Generar Reporte",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.comis_ventas",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        C_SHOW_ => "desde.notEmpty()&&hasta.notEmpty()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
