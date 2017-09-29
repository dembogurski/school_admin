<?php
$Obj->name = "imp_chq_bco_reg";
$Obj->alias = "Impresion de Cheques Banco Regional";
$Obj->ndoc = "Impresion de Cheques Banco Regional";
$Obj->help = "Impresion de Cheques Banco Regional";
$Obj->query = "'SELECT chq_cta, chq_num, chq_estado, chq_fecha_emis, chq_fecha_pag, chq_valor, chq_benef, chq_bco, chq_moneda  FROM bcos_chq WHERE  chq_num >= '+el['ini']+' and chq_num <= '+el['final']+' and chq_bco = '+el['cta_bco']+'' ";
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
