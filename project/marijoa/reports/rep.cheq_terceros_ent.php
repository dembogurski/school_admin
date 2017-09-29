<?php
$Obj->name = "cheq_terceros";
$Obj->alias = "Reporte de Cheques de Terceros";
$Obj->ndoc = "Reporte de Cheques de Terceros";
$Obj->help = "Reporte de Cheques de Terceros";
$Obj->query = "'SELECT  chq_ref AS REF,__local as SUC,chq_tipo as TIPO,chq_nro_rec AS REC, chq_bco AS BANCO, chq_cta AS CUENTA, chq_num AS NRO,date_format(chq_fecha_pag,|{%d-%m-%Y}|) AS FECHA_PAG,date_format(fechadep,|{%d-%m-%Y}|) AS FECHA_DEP, date_format(fechaacred,|{%d-%m-%Y}|) AS FECHA_ACREED,chq_nro_dep  as NRO_DEP,b_nombre as BANCO_DEP,chq_nro_rec as RECIBO, cta as CUENTA_DEP,__cj_bco as FORMA,chq_valor AS VALOR, chq_moneda AS MON,chq_cotiz AS COTIZ, chq_moneda_ref AS VALOR_GS,chq_estado AS ESTADO,chq_nombre_de AS NOMBRE_DE,date_format(chq_fecha_emis,|{%d-%m-%Y}|) AS FECHA_EMIS, date_format(chq_fecha_ins,|{%d-%m-%Y}|) AS FECHA_INS,chq_docs AS DOCS, chq_recibido as ADMIN,chq_recibido2 as GERENCIA FROM cheq_terceros t LEFT JOIN bcos b ON  t.bco = b.b_cod WHERE   chq_fecha_pag BETWEEN '+el[desde]+' AND '+el[hasta]+' and chq_bco like '+el[chq_bco]+' and chq_cta like '+el[chq_cta]+' and chq_num like '+el[chq_num]+' and chq_nombre_de like '+el[chq_nombre_de]+' and __local like '+el[empr]+' AND chq_estado like '+el[estado]+' AND chq_recibido like '+el[recibido]+' AND chq_recibido2 like '+el[recibido2]+' order by chq_moneda asc, t.id desc '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "VALOR_GS";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
