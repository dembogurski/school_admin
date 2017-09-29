<?php
$Obj->name = "imprimir_cheque";
$Obj->alias = "Imprimir Cheques";
$Obj->doc = "Imprimir Cheques";
$Obj->help = "Imprimir Cheques";
$Obj->query = "'SELECT  chq_cta , chq_num, chq_estado, chq_fecha_emis, chq_fecha_pag, chq_valor, chq_benef, chq_bco, chq_moneda, chq_mot_anul, chq_ref, chq_conc, chq_formato, chq_mult FROM bcos_chq where chq_mult = |{Si}|'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
