<?php
$Obj->name = "rem_diff_kg";
$Obj->alias = "Reporte de Remisiones con Diferencias de Kilaje";
$Obj->ndoc = "Reporte de Diferencias de Kilaje";
$Obj->help = "Reporte de Diferencias de Kilaje";
$Obj->query = "'select r.rem_nro as Nro, date_format(rem_fecha,|{%d-%m-%Y}|) as Fecha,rem_origen as Origen, rem_destino as Destino,rem_vend_cod as Usuario,rem_receptor as Receptor,DATE_FORMAT(rem_fecha_cier,|{%d-%m-%Y}|) AS Fecha_cierre, rem_obs AS Obs,df_cod_prod as Codigo,df_descrip as Descrip,df_disponible as Cant_Env,enviado as Enviado, kg_env,kg_rec, marcar as Recibido  from nota_remision r, remito_det d where r.rem_nro = d.rem_nro and r.rem_fecha_cier BETWEEN '+el['desde']+' and '+el['hasta']+' and r.rem_estado = |{Cerrada}| and r.rem_origen like '+el['suco']+' and r.rem_destino like '+el['sucd']+' and ( (kg_env > kg_rec )  or  (kg_env < kg_rec) ) order by r.id asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "el['Nro']!=old['Nro']";
$Obj->subtotal = "Cant,kg_env,kg_rec";
$Obj->dec_sub = "3";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
