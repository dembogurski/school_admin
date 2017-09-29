<?php
$Obj->name = "det_trasnlado";
$Obj->alias = "Detalle de Translados";
$Obj->ndoc = "Detalle de Translados";
$Obj->help = "Detalle de Translados";
$Obj->query = "'SELECT n.rem_nro AS Nro,       n.rem_fecha AS FECHA,       n.rem_dir_origen AS ORIGEN,       n.rem_dir_destino AS DESTINO,       n.rem_receptor AS RECEPTOR,       r.df_disponible AS CANTDISPONIBLE,               p.p_cant_compra AS CANTINICIAL,       p.p_padre as CODIGOPADRE         FROM nota_remision n, remito_det r, mnt_prod p  WHERE n.rem_nro = r.rem_nro AND r.df_cod_prod = '+el['cod_prod']+' and p.p_cod = '+el['cod_prod']+' and p.p_cod = r.df_cod_prod;'";
$Obj->del_prg = "1";
$Obj->del_tpl = "1";
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
