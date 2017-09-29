<?php
$Obj->name = "det_mov_func";
$Obj->alias = "Detalle de Movimientos de cuenta de Funcionarios";
$Obj->help = "Retiros, Ingresos Extras, Descuentos ";
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
        F_NAME_ => "busc_func",
        F_ALIAS_ => "Buscar Funcionario",
        F_HELP_ => "Busca al Funcionario",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_cod_func",
        F_ALIAS_ => "Funcionario",
        F_HELP_ => "Código y nombre completo del funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_func.hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "'func_fullname LIKE |{'+el['busc_func'].get()+'%}| or func_cod LIKE |{'+el['busc_func'].get()+'%}|'",
        F_LENGTH_ => "30",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_liquid",
        F_ALIAS_ => "Nro de Liquidacion",
        F_HELP_ => "Nro de Liquidacion",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "sue_cod_func.hasChanged()",
        F_RELTABLE_ => "sueldos_func",
        F_SHOWFIELD_ => "sue_nro_liquid,concat( sue_mes,|{-}|,anio)",
        F_FILTER_ => "'sue_cod_func='+sue_cod_func.getStr()+' order by id desc '",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "45",
        C_SHOW_ => "sue_cod_func.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sue_inprimir",
        F_ALIAS_ => "                    Ver detalle                    ",
        F_HELP_ => "Imprime la liquidacion actual",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.liquid_sueldo",
        F_NODB_ => "1",
        F_ORD_ => "150",
        F_INLINE_ => "1",
        C_VIEW_ => "nro_liquid.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
