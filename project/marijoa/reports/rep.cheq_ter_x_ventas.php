<?php
$Obj->name = "cheq_ter_x_ventas";
$Obj->alias = "Reporte de Cheques de Terceros Registrados x Ventas";
$Obj->ndoc = "Reporte de Cheques de Terceros";
$Obj->help = "Reporte de Cheques de Terceros";
$Obj->query = "'SELECT  chq_ref AS REF, chq_bco AS BANCO, chq_cta AS CUENTA, chq_num AS NRO,DATE_FORMAT(chq_fecha_pag,|{%d-%m-%Y}|) AS FECHA_PAG,chq_valor AS VALOR, chq_moneda AS MON,chq_cotiz AS COTIZ, chq_moneda_ref AS VALOR_GS,chq_estado AS ESTADO,chq_nombre_de AS NOMBRE_DE,DATE_FORMAT(chq_fecha_emis,|{%d-%m-%Y}|) AS FECHA_EMIS,chq_fecha_ins AS FECHA_INS,chq_docs AS DOCS, chq_recibido as ADMIN,chq_recibido2 as GERENCIA FROM factura f, cheq_terceros c  WHERE f.fact_nro = c.chq_ref AND chq_fecha_ins BETWEEN '+el[desde]+' AND '+el[hasta]+' AND chq_bco LIKE '+el[chq_bco]+' AND chq_cta LIKE '+el[chq_cta]+' AND chq_num LIKE '+el[chq_num]+' AND chq_nombre_de LIKE '+el[chq_nombre_de]+' AND __local LIKE '+el[empr]+' AND chq_estado like '+el[estado]+' AND chq_recibido like '+el[recibido]+' AND chq_recibido2 like '+el[recibido2]+' '";
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
