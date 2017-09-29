<?php
$Obj->name = "reserva_mat";
$Obj->alias = "Reserva";
$Obj->ndoc = "Reserva";
$Obj->help = "Reserva";
$Obj->query = "'SELECT  codigo AS Cod_Producto,  descrip AS Descripcion, precio AS Precio, cantidad AS Cantidad,  subtotal AS Subtotal FROM reserva_det WHERE nro_res = '+el['nro_res']+' order by id asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "Subtotal";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
