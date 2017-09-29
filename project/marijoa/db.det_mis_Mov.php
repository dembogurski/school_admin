<?php
$Obj->name = "det_mis_mov";
$Obj->alias = "Detalle de mis Movimientos de cuenta";
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
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del funcionario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "35",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        F_FORMULA_ => "if( __user.get()=='' ){ p_user_ }else{  __user.get()  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_liquid",
        F_ALIAS_ => "Nro de Liquidacion",
        F_HELP_ => "Nro de Liquidacion",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "sueldos_func",
        F_SHOWFIELD_ => "sue_nro_liquid,concat( sue_mes,|{-}|,anio)",
        F_FILTER_ => "'sue_cod_func=|{'+p_user_+'}| order by id desc '",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "45",
        C_SHOW_ => "__user.get()!=''",
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
