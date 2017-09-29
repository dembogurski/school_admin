<?php
$Obj->name = "hist_ubic";
$Obj->alias = "Historial de Ubicaciones x Codigo";
$Obj->ndoc = "Historial de Ubicaciones x Codigo";
$Obj->help = "Historial de Ubicaciones x Codigo";
$Obj->query = "'SELECT __user AS Usuario,DATE_FORMAT(fecha,|{%d-%m-%Y}|) AS Fecha,descrip AS Descrip,suc AS Suc,operacion AS Oper,estante AS Estante,fila AS Fila, col AS Col FROM ubic WHERE codigo = '+el['codigo']+' order by id asc'";
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
