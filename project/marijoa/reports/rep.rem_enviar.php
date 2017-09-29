<?php
$Obj->name = "rem_enviar";
$Obj->alias = "Puntear Remision para enviar";
$Obj->ndoc = "Nota de Remision";
$Obj->help = "Nota de Remision";
$Obj->query = "'SELECT df_cod_prod as CODIGO_PRODUCTO, df_descrip AS DESCRIPCION, df_disponible AS CANTIDAD,p_cant as CANT_ACTUAL, enviado as ENVIADO,kg_env as KGE,p_ancho as ANCHO, p_gram AS GRAMAJE,p_kg as KG, p_fam as SECTOR, p_grupo as GRUPO, p_tipo as TIPO, p_clasif as CLASIF FROM remito_det d, mnt_prod p where p.p_cod = d.df_cod_prod and rem_nro ='+el['rem_nro']+' order by df_cod_prod asc'";
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
