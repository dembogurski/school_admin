<?php
$Obj->name = "caja_chica_chan";
$Obj->alias = "Caja Chica (Abierta)";
$Obj->help = "Caja Chica (Abierta para Movimientos)";
$Obj->copy_from = "";
$Obj->Inheritance = "caja_chica";
$Obj->File = "caja_chica";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'insert into caja_chica_mov( cj_ref_chi, __date,__local, __user, __moneda, __cotiz, monto, concepto, compl, entrada_ref, salida_ref,concepto_princ,con_nombre,subc_nombre,tipo,tipo_iva)values( '+cj_ref_chi.getVal()+', current_date,'+cj_empr.getStr()+', '+cj_user.getStr()+', |{G$}|, 1,'+cj_saldo_ini.getVal()+',|{6-3}|,concat(|{Saldo Anterior: }|,'+cj_ant.getStr()+',|{  }|,'+cj_comp.getStr()+',|{ Valor: }|,'+cj_saldo_ini.getVal()+'), '+cj_total.getVal()+', 0,|{6}|,|{Entradas Diversas}|,|{Desembolso}|,'+cj_tipo.getStr()+',|{----}|)'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "10",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
