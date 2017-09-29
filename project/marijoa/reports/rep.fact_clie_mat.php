<?php
$Obj->name = "fact_cli_mat";
$Obj->alias = "Presupuesto";
$Obj->ndoc = "Presupuesto";
$Obj->help = "Presupuesto";
$Obj->query = "'SELECT df_renglon AS Nro , df_cod_prod AS Cod_Producto, df_descrip AS Descripcion,df_precio AS Precio,df_cantidad AS Cantidad, df_subtotal AS Subtotal FROM det_factura WHERE df_fact_num = '+el['fact_nro']+' order by df_renglon asc'";
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
