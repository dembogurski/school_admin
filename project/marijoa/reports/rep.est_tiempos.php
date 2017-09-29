<?php
$Obj->name = "est_tiempos";
$Obj->alias = "Reporte Estadistico de Tiempos de Ventas";
$Obj->ndoc = "Reporte Estadistico de Tiempos de Ventas";
$Obj->help = "Reporte Estadistico de Tiempos de Ventas";
$Obj->query = "'SELECT turno as TURNO,usuario AS USUARIO, date_format(fecha,|{%d-%m-%Y}|) AS FECHA, hora AS APERTURA, x0_ AS CIERRE, x1_ AS DELAY, y0_ AS ITEMS, y1_ AS MTS, y2_ AS TOTAL   FROM _audit_log_ WHERE ACCION LIKE |{LOG_FACT}| AND y2_ IS NOT NULL AND fecha BETWEEN '+el[desde]+' AND '+el[hasta]+' AND usuario LIKE '+el[user]+' AND y0_ LIKE '+el[it]+' AND y3_ LIKE '+el[suc]+' ORDER BY id asc, turno ASC, hora ASC '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
