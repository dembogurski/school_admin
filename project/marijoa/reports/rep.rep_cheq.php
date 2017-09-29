<?php
$Obj->name = "rep_cheq";
$Obj->alias = "Reporte de Cheques";
$Obj->ndoc = "Reporte de Cheques";
$Obj->help = "Reporte de Cheques";
$Obj->query = "'select chq_num as Nro,chq_cta as CTA, DATE_FORMAT(chq_fecha_emis,|{%d-%m-%Y}|) as FECHA_EMISION, DATE_FORMAT(chq_fecha_pag,|{%d-%m-%Y}|) AS FECHA_PAGO, chq_valor AS VALOR, chq_benef AS BENEFICIARIO,cjc_descri AS CONCEPTO, chq_compl AS COMPL, chq_moneda AS MONEDA, chq_estado AS ESTADO  from bcos_chq b, caja_con c where b.chq_conc = c.cjc_cod AND chq_cta like '+el[chq_cta]+' and chq_estado LIKE '+el[chq_estado]+'  and chq_fecha_emis between '+el[chq_fecha_pag]+' and '+el[chq_fecha_pagh]+' and chq_benef like '+el[chq_benef]+' order by chq_fecha_emis asc,chq_num asc  '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['FECHA_PAGO']!=old['FECHA_PAGO']";
$Obj->subtotal = "VALOR";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "VALOR";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
