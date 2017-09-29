<?php
$Obj->name = "rem_recibir";
$Obj->alias = "Puntear Remision para Recibir";
$Obj->ndoc = "Nota de Remision";
$Obj->help = "Nota de Remision";
$Obj->query = "'select df_cod_prod as CODIGO_PRODUCTO, df_descrip AS DESCRIPCION, df_disponible AS CANTIDAD, enviado as ENVIADO,marcar as RECIBIDO,kg_env as KGE,kg_rec as KGR,p_ancho as ANCHO, p_gram AS GRAMAJE,ajuste AS AJUSTE,tara AS TARA,p_kg AS KG FROM remito_det d, mnt_prod p WHERE p.p_cod = d.df_cod_prod AND rem_nro ='+el['rem_nro']+' order by df_cod_prod asc'";
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
