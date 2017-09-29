<?php
$Obj->name = "translado_prod";
$Obj->alias = "Detalle de Translado de Producto";
$Obj->ndoc = "Detalle de Translado de Producto";
$Obj->help = "Detalle de Translado de Producto";
$Obj->query = "'SELECT n.rem_nro AS Nro,rem_func_nombre as RESPONSABLE, DATE_FORMAT(n.rem_fecha,|{%d-%m-%Y}|) AS FECHA,DATE_FORMAT(n.rem_fecha_cier,|{%d-%m-%Y}|) AS FECHA_CIERRE,n.rem_estado AS ESTADO,   n.rem_dir_origen AS ORIGEN,       n.rem_dir_destino AS DESTINO,    n.rem_receptor AS RECEPTOR,  r.df_disponible AS CANTDISPONIBLE,  p.p_cant_compra AS CANTINICIAL,  p.p_padre as CODIGOPADRE   FROM nota_remision n, remito_det r, mnt_prod p  WHERE n.rem_nro = r.rem_nro AND r.df_cod_prod = '+el['cod_prod']+' and p.p_cod = '+el['cod_prod']+' and p.p_cod = r.df_cod_prod order by rem_fecha asc,  r.rem_nro asc'";
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
