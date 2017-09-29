<?php
$Obj->name = "ajustes_prod";
$Obj->alias = "Ajuste de Producto";
$Obj->ndoc = "Ajuste de Producto";
$Obj->help = "Ajuste de Producto";
$Obj->query = "'select aj_fecha as FECHA, aj_usuario as USUARIO, aj_inicial as CANT_INI, aj_ajuste as AJUSTE,aj_final AS FINAL,aj_oper as OPERACION,LEFT( aj_motivo,50) as MOTIVO from mnt_ajustes where aj_prod = '+el['cod_prod']+' order by id asc '";
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
