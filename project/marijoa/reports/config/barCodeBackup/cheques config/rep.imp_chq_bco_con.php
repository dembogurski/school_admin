<?php
$Obj->name = "imp_chq_bco_con";
$Obj->alias = "Impresion de Cheque Banco Continental";
$Obj->ndoc = "Impresion de Cheque Banco Continental";
$Obj->help = "Impresion de Cheque Banco Continental";
$Obj->query = "'SELECT chq_cta, chq_num, chq_estado, chq_fecha_emis, chq_fecha_pag, chq_valor, chq_benef, chq_bco, chq_moneda  FROM bcos_chq WHERE   chq_num >= '+el['ini']+' and chq_num <= '+el['final']+' and  chq_bco = '+el['cta_bco']+'' ";
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
