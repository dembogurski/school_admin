<?php
$Obj->name = "notas_remision";
$Obj->alias = "Reporte de Remisiones";
$Obj->ndoc = "Reporte de Remisiones";
$Obj->help = "Reporte de Remisiones";
$Obj->query = "'SELECT r.rem_nro AS NRO, DATE_FORMAT(r.rem_fecha,|{%d-%m-%Y}|) AS FECHA, d.df_cod_prod AS CODIGO, d.df_descrip AS DESCRIP, d.df_disponible AS CANTIDAD, d.marcar as RECIBIDO  FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_origen = '+el[suco]+'  AND r.rem_destino = '+el[sucd]+'  AND r.rem_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+'  AND r.rem_estado = |{Cerrada}| order by  r.rem_fecha desc,  r.rem_nro desc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "old['NRO']!=el['NRO']";
$Obj->subtotal = "CANTIDAD";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANTIDAD";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
