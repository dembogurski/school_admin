<?php
$Obj->name = "movs_de_cuenta";
$Obj->alias = "Movimientos de cuenta Bancaria";
$Obj->ndoc = "Movimientos de cuenta Bancaria";
$Obj->help = "Movimientos de cuenta Bancaria";
$Obj->query = "'select DATE_FORMAT(ctd_fecha,|{%d-%m-%Y}|)   as FECHA,ctd_compl AS COMPLEMENTO, ctd_doc as DOC, ctd_anterior AS S_ANTERIOR ,ctd_entrada AS ENTRADA ,ctd_salida AS SALIDA, ctd_actual AS SALDO_ACTUAL from bcos_ctas_det  where ctd_cta like '+el['chq_cta']+' and ctd_fecha between '+el['desde']+' and '+el['hasta']+' and ctd_compl like '+el['compl']+'   order by ctd_fecha,id '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['FECHA']!=old['FECHA']";
$Obj->subtotal = "ENTRADA ,SALIDA,SALDO_ACTUAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "true";
$Obj->total = "ENTRADA ,SALIDA,SALDO_ACTUAL";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
