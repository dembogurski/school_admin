<?php
$Obj->name = "ubic_cons";
$Obj->alias = "Reporte de Ubicaic�n de Productos";
$Obj->ndoc = "Reporte de Ubicaic�n de Productos";
$Obj->help = "Reporte de Ubicaic�n de Productos";
$Obj->query = "'SELECT codigo AS Codigo, __user AS Usuario,DATE_FORMAT(fecha,|{%d-%m-%Y}|) AS Fecha, descrip, suc,operacion AS Oper,estante AS Estante,fila AS Fila,col AS Col,estado AS Estado FROM (SELECT c.* FROM ubic c, mnt_prod p WHERE c.codigo = p.p_cod AND p.p_local = '+el['suc']+' and  suc = '+el['suc']+' AND estante = '+el['estante']+' AND fila = '+el['fila']+' AND col = '+el['col']+' AND estado LIKE |{%En Cuadrante%}| GROUP BY codigo ORDER BY c.id DESC ) ubic  GROUP BY codigo ORDER BY fecha ASC '";
$Obj->del_tpl = "";
$Obj->del_prg = "";
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
