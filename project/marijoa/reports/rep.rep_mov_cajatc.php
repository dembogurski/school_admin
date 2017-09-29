<?php
$Obj->name = "rep_mov_caja";
$Obj->alias = "Reporte de Movimientos de caja";
$Obj->ndoc = "Reporte de Movimientos de caja";
$Obj->help = "Reporte de Movimientos de caja";
$Obj->query = "'select distinct (id), cm_empr as SUC,DATE_FORMAT(cm_fecha,|{%d-%m-%Y}|) as FECHA,cm_tipo as EoS,cm_compl as COMPL,cm_moneda as MONEDA,cm_entrada as ENTRADA,cm_salida as SALIDA,cm_cambio as COTIZ,cm_entrada_ref as E_REF,cm_salida_ref as S_REF, '+el['cambiomerc']+' as COTIZM,cm_entrada * '+el['cambiomerc']+' as E_REFM,cm_salida * '+el['cambiomerc']+' as S_REFM from caja_mov where cm_fecha between '+el['fecha_inv']+' and '+el['fechah_inv']+' and cm_moneda like '+el['moneda']+' and cm_empr like '+el['empr']+' and cm_tipo like '+el['es']+' and ( cm_con like |{55}| or cm_con like |{54}| or cm_con like |{53}| ) order by id asc '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "E_REF,S_REF";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
