<?php
$Obj->name = "rep_mov_caja";
$Obj->alias = "Reporte de Movimientos de caja";
$Obj->ndoc = "Reporte de Movimientos de caja";
$Obj->help = "Reporte de Movimientos de caja";
$Obj->query = "'select distinct (m.id), cm_empr as SUC,DATE_FORMAT(cm_fecha,|{%d-%m-%Y}|) as FECHA,time(m.cm_hora) as HORA,cm_tipo as EoS,CONCAT(cm_con ,|{ }|,cjc_descri) AS CONCEPTO,cm_compl as COMPL,cm_moneda as MONEDA,cm_entrada as ENTRADA,cm_salida as SALIDA,cm_cambio as COTIZ,cm_entrada_ref as E_REF,cm_salida_ref as S_REF from caja_mov m,caja_con c where m.cm_con = c.cjc_cod and cm_fecha between '+el['fecha_inv']+' and '+el['fechah_inv']+' and cm_moneda like '+el['moneda']+' and cm_empr like '+el['empr']+' and cm_tipo like '+el['es']+' and cm_con like '+el['mov_cons']+' order by m.id asc '";
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
