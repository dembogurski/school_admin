<?php
$Obj->name = "cheq_cob";
$Obj->alias = "Cheques de terceros por cobrar";
$Obj->ndoc = "Cheques de terceros por cobrar";
$Obj->help = "Cheques de terceros por cobrar";
$Obj->query = "'select chq_num as NUMERO, chq_cta as CUENTA, chq_bco as BANCO, chq_fecha_emis as FECHA_EMISION, chq_fecha_pag as FECHA_PAGO,chq_valor AS VALOR, chq_moneda as MONEDA, chq_cotiz as COTIZ, chq_moneda_ref as MONEDA_REF, chq_nombre_de AS NOMBRE_DE from cheq_terceros where __local like '+el[__local]+' and chq_estado like '+el[estado]+' and chq_nombre_de like '+el[deudor]+' and chq_fecha_pag BETWEEN '+el['desdeinv']+' AND '+el['hastainv']+''";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MONEDA_REF";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
