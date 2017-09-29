<?php
$Obj->name = "prestamos";
$Obj->alias = "Reporte de Prestamos";
$Obj->ndoc = "Reporte de Prestamos";
$Obj->help = "Reporte de Prestamos";
$Obj->query = "'select   distinct nro_cheque CHEQUE,c.chq_valor AS VALOR_CHQ, chq_nombre_de as NOMBRE_DE   from cheq_terceros c, prestamos p where c.chq_num = p.nro_cheque and p.estado = |{Cancelado}| AND fecha between '+el[desde]+' and '+el[hasta]+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['CHEQUE']!=old['CHEQUE']";
$Obj->subtotal = "VALOR_CHQ,MONTO_MREF";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
