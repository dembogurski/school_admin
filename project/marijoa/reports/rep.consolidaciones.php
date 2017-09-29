<?php
$Obj->name = "consolidaciones";
$Obj->alias = "Consolidaciones";
$Obj->ndoc = "Consolidaciones";
$Obj->help = "Consolidaciones";
$Obj->query = "'select cm_fecha as FECHA,cm_con as CONCEPTO, cm_compl as COMPLEMENTO, cm_moneda AS MONEDA, cm_entrada as ENTRADA, cm_cambio as COTIZ, cm_entrada_ref as MONTO_Moneda_Ref   from caja_mov where cm_empr = '+el[__local]+' and cm_con = 5  and cm_entrada_ref > 0 and cm_fecha = '+el[fecha]+' '";
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
