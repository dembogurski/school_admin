<?php
$Obj->name = "imprimir_lista";
$Obj->alias = "Impresion de lista de precios";
$Obj->ndoc = "Impresion de lista de precios";
$Obj->help = "Impresion de lista de precios";
$Obj->query = "'SELECT distinct p_cod as CODIGO,CONCAT(p_fam,|{-}|,p_grupo,|{-}|,p_tipo,|{-}|,p_comp,|{-}|,p_temp,|{-}|,p_estruc,|{-}|,p_clasif,|{-}|,p_lisoest,|{-}|,p_color)AS DESCRIPCION, p_precio_1 as PRECIO_1,p_precio_2 as PRECIO_2,p_precio_3 as PRECIO_3,p_precio_4 as PRECIO_4,p_precio_5 as PRECIO_5 FROM mnt_prod WHERE p_cod LIKE '+el['p_cod']+' and p_fam  LIKE '+el['p_fam']+' and p_grupo LIKE '+el['p_grupo']+' and p_tipo LIKE  '+el['p_tipo']+' and p_comp LIKE '+el['p_comp']+' and p_temp LIKE '+el['p_temp']+'and p_estruc LIKE '+el['p_estruc']+' and p_clasif LIKE '+el['p_clasif']+' and p_lisoest LIKE '+el['p_lisoest']+' and p_color LIKE '+el['p_color']+' and prod_fin_pieza like |{No}| and p_cant > 0 and p_local like '+el['local']+' group by p_fam,p_tipo,p_grupo,p_precio_1,p_precio_2,p_precio_3,p_precio_4,p_precio_5;' ";
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
