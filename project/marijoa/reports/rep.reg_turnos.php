<?php
$Obj->name = "reg_turnos";
$Obj->alias = "Estadistica de Atencion de (Turnos)";
$Obj->ndoc = "Estadistica de Atencion de (Turnos)";
$Obj->help = "Estadistica de Atencion de (Turnos)";
$Obj->query = "'SELECT  DATE_FORMAT(fecha,|{%M-%d}| ) AS DIA, DATE_FORMAT(fecha,|{%a}| ) AS DIA_SEM, SUM( IF( diff_ant < 5, 1,0)) AS CERO_5, SUM( IF( diff_ant BETWEEN 5 AND 10, 1,0)) AS CINCO_10, SUM( IF( diff_ant BETWEEN 10 AND 15, 1,0)) AS DIEZ_15, SUM( IF( diff_ant > 15, 1,0)) AS MAYOR_15  FROM reg_turnos r WHERE  r.fecha   BETWEEN '+el[desde]+' AND '+el[hasta]+' AND suc = '+el[suc]+' GROUP BY DIA ORDER BY DATE_FORMAT(fecha,|{%m-%d}|) ASC '";
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
