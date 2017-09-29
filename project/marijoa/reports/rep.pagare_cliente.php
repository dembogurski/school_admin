<?php
$Obj->name = "pagare_cliente";
$Obj->alias = "PAGARE A LA ORDEN";
$Obj->ndoc = "PAGARE A LA ORDEN";
$Obj->help = "PAGARE A LA ORDEN";
$Obj->query = "'SELECT pg_ref AS REF,pg_nro AS NRO,  pg_monto AS MONTO,DATE_FORMAT(pg_fecha,|{%d}|) AS DIA_VENC, DATE_FORMAT(pg_fecha,|{%m}|) AS MES_VENC,DATE_FORMAT(pg_fecha,|{%Y}|) AS ANIO_VENC FROM pagares WHERE  pg_ref = '+el['dp_fact_nro']+'  AND pg_nro = '+el['nro_pg']+' '";
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
