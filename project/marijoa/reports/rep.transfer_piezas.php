<?php
$Obj->name = "transfer_piezas";
$Obj->alias = "Trasnferencias entre Piezas";
$Obj->ndoc = "Trasnferencias entre Piezas";
$Obj->help = "Trasnferencias entre Piezas";
$Obj->query = "'select __user as USUARIO, suc_o as ORIGEN, suc_de as DESTINO, fecha  as FECHA,codigo_de as COD,cant_de as CANT_M, cantidad as CANTIDAD, cant_final_de AS CANT_FINAL, codigo_a as CODIGO_A , cant_a as CANT_MOMENT, cant_final_a as CANT_FINAL_A, __userr as RECEPTOR from transf_piezas where codigo_de = '+el['cod_prod']+' or codigo_a = '+el['cod_prod']+' order by id asc' ";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
