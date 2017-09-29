<?php
$Obj->name = "pg_cob";
$Obj->alias = "Pagares por cobrar";
$Obj->ndoc = "Pagares por cobrar";
$Obj->help = "Pagares por cobrar";
$Obj->query = "'select pg_ref as REF, pg_nro as NUMERO, pg_monto as MONTO, pg_estado as ESTADO, pg_fecha as FECHA, pg_deudor as DEUDOR,pg_entregado as ENTREGADO, pg_saldo as SALDO FROM PAGARES where pg_estado like '+el[estado]+' and __local like '+el[__local]+' and pg_deudor like '+el[deudor]+'  and pg_fecha BETWEEN '+el['desdeinv']+' AND '+el['hastainv']+''";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MONTO,SALDO";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
