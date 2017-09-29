<?php
$Obj->name = "translados";
$Obj->alias = "Translados O Remisiones de Mercaderias";
$Obj->doc = "Translados O Remisiones de Mercaderias";
$Obj->help = "Translados O Remisiones de Mercaderias";
$Obj->query = "'select r.rem_nro as Nro, r.rem_fecha as FECHA, r.rem_vend_cod as FUNCIONARIO,r.rem_func_nombre as RESPONSABLE, r.rem_receptor as RECEPTOR, d.df_cod_prod AS CODIGO, d.df_descrip as DESCRIP, d.df_disponible as CANTIDAD from nota_remision r, remito_det d where r.rem_nro = d.rem_nro and  r.rem_origen = '+el['origen']+' and r.rem_destino = '+el['destino']+' and r.rem_fecha between  '+el['desdeinv']+' and '+el['hastainv']+''";
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
