<?php
$Obj->name = "code_bar_estante";
$Obj->alias = "Imprimir codigo de barras para Estantes";
$Obj->help = "Imprimir codigo de barras de producto";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "imprimir_codigo_barras";
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
        F_NAME_ => "f_bloqueo",
        F_ALIAS_ => "Desabilita el boton Consult",
        F_HELP_ => "Desabilita el boton Consult",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "2",
        C_SHOW_ => "f_bloqueo.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "empr",
        F_ALIAS_ => "Sucursal de Distribucion de Gastos",
        F_HELP_ => "Empresa a listar",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'true order by emp_cod asc '",
        F_NODB_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estante",
        F_ALIAS_ => "Estante",
        F_HELP_ => "Estante",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z",
        F_NODB_ => "1",
        F_ORD_ => "5",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dfila",
        F_ALIAS_ => "De Fila",
        F_HELP_ => "Código del Producto a fraccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "afila",
        F_ALIAS_ => "Hasta Fila        ",
        F_HELP_ => "Código del Producto a fraccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dcol",
        F_ALIAS_ => "De Columna",
        F_HELP_ => "Imprimir hasta ",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "62",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "acol",
        F_ALIAS_ => "Hasta Columna",
        F_HELP_ => "Imprimir hasta ",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "62",
        F_INLINE_ => "1",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "print_custom",
        F_ALIAS_ => "    Impresion Codigos para Estantes    ",
        F_HELP_ => "Imprimir Code 39",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.code_custom",
        F_NODB_ => "1",
        F_ORD_ => "600",
        C_VIEW_ => "true",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

?>
