<?php
$Obj->name = "reservas_rep";
$Obj->alias = "Reporte de Reservas";
$Obj->ndoc = "Reporte de Reservas";
$Obj->help = "Reporte de Reservas";
$Obj->query = "'SELECT r.nro_res AS NRO, r.__user AS USURIO, r.__local AS SUC, DATE_FORMAT(r.desde,|{%d-%m%Y}|) AS REGISTRO,DATE_FORMAT(r.hasta,|{%d-%m%Y}|) AS VENC, r.fact_cli_ci AS CI, r.fact_nom_cli AS CLIENTE, r.r_total AS TOTAL, r.r_senia AS SENHA,  r.estado AS ESTADO,d.codigo AS CODIGO ,d.descrip AS DESCRIP, d.cantidad AS CANT, d.precio AS PRECIO, d.subtotal AS SUBTOTAL  FROM reservas r, reserva_det d WHERE r.nro_res = d.nro_res  AND r.estado LIKE  '+el[estado]+' AND r.desde BETWEEN '+el[desde]+' AND  '+el[hasta]+' and r.__local like '+el['suc']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "SUBTOTAL,SENHA,CANT";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
