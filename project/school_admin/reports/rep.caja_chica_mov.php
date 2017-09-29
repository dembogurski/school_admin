<?php
$Obj->name = "caja_chica_mov";
$Obj->alias = "Reporte de Caja Chica";
$Obj->ndoc = "Reporte de Caja Chica";
$Obj->help = "Reporte de Caja Chica";
$Obj->query = "'select  cj_ref_chi as Nro, __user as USUARIO, __local AS SUC, entrada_ref AS ENTRADA, salida_ref AS SALIDA, compl AS INFO_COMPL ,DATE_FORMAT( __date,|{%d-%m-%Y}|) AS FECHA,  con_nombre, c.cjc_descri AS subc_nombre, depar ,tipo_iva from   caja_chica_mov m, caja_con c where __date BETWEEN  '+el['desde']+'  and '+el['hasta']+' and tipo like '+el[cj_tipo]+'  and __local like '+el['__local']+' AND c.cjc_cod = m.concepto order by __date asc,  m.id asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "ENTRADA,SALIDA";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
