<?php
$Obj->name = "nota_remision";
$Obj->alias = "Nota de Remision";
$Obj->ndoc = "Nota de Remision";
$Obj->help = "Nota de Remision";
$Obj->query = "'select df_cod_prod as CODIGO_PRODUCTO, df_descrip AS DESCRIPCION, df_disponible AS CANTIDAD, enviado as ENVIADO,marcar as REC,kg_env as KGE,kg_rec as KGR,mts_calc_env, mts_calc_rec,tara from remito_det where rem_nro ='+el['rem_nro']+' order by df_cod_prod asc'";
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
