<?php
$Obj->name = "factura_confec";
$Obj->alias = "Presupuesto de Confeccion";
$Obj->ndoc = "Presupuesto de Confeccion";
$Obj->help = "Presupuesto";
$Obj->query = "'SELECT  c_interno AS Interno,c_user AS Usuario,c_codigo AS Codigo, CONCAT(p_grupo,|{ - }|,p_tipo,|{ - }|,p_color,|{ - }|,p_descri) AS Descripcion,c_cant AS Cantidad,c_precio_costo AS Precio,(c_cant * c_precio_costo) AS Subtotal,c_medida AS Medida,c_cant_est AS Cant_estimada FROM inv_confec,mnt_prod WHERE mnt_prod.p_cod=c_codigo AND c_ref='+el['fact_nro']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "Subtotal ";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
