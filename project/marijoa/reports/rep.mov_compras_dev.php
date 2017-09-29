<?php
$Obj->name = "mov_compras_dev";
$Obj->alias = "Devoluciones de Una Compra";
$Obj->ndoc = "Devoluciones de Una Compra";
$Obj->help = "Devoluciones de Una Compra";
$Obj->query = "'select d.c_ref as REF, d.c_fecha AS FECHA, d.c_cod AS COD,c_motivo AS MOTIVO, __user AS USUARIO,c_cant AS CANT, c_precio AS PRECIO, c_valor AS VALOR_MON, c_valor_dev AS VALOR, concat(p.p_fam,|{-}|, p.p_grupo,|{-}|, p.p_tipo,|{-}|, p.p_color) as COMB from mov_compras_dev d, mnt_prod p  where d.c_ref = p.p_ref and d.c_cod = p.p_cod and d.c_ref = '+el['c_ref']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsutl";
$Obj->subtotal = "VALOR";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
