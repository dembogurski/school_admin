<?php
$Obj->name = "hist_inventario";
$Obj->alias = "Historial de Inventario";
$Obj->ndoc = "Historial de Inventario";
$Obj->help = "Historial de Inventario";
$Obj->query = "'SELECT usuario,date_format(fecha,|{%d-%m-%y %H:%i}|) AS fecha ,tipo,codigo,suc,gramaje,ancho,cant,kilos,tara, kilosr,cantr,diff_mts FROM inv WHERE codigo = '+el[codigo]+''";
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
