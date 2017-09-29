<?php
$Obj->name = "rep_prod_prov";
$Obj->alias = "Reporte de Productos (Prov-Cod-Suc-ETC.)";
$Obj->ndoc = "Reporte de Productos";
$Obj->help = "Reporte de Productos";
$Obj->query = "'SELECT c.c_prov AS PROV,pr.prov_nombre as NOMBRE_PROV ,p.p_cod AS CODIGO,p_ref as REF, p.p_local as SUC,p_foto as FOTO,p.p_fam as FAM,p.p_grupo as GRUPO,p.p_tipo as TIPO,p.p_comp as COMP,p.p_temp as TEMP,p.p_estruc as ESTRUCT,p.p_clasif as CLASIF, p.p_color as COLOR,p.p_descri as DESCRIP,p.p_cant as CANT,p_ancho as ANCHO,p.p_precio_1 as PRECIO_1,((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 AS PREC_COSTO   FROM mov_compras c, mnt_prod p,mnt_prov pr  where c.c_ref = p.p_ref AND c.c_prov like '+el['prov']+' and p.p_cod like '+el['cod']+' and p.p_local like '+el['p_local']+'  and p.p_grupo like '+el['p_grupo']+'  and p.p_tipo like '+el['p_tipo']+' and p.p_color like   '+el['p_color']+' and p.p_descri like   '+el['p_descri']+' and pr.prov_cod = c.c_prov and p.prod_fin_pieza like '+el['fdp']+' and p_cant > '+el['cant']+' order by  COLOR ASC,GRUPO ASC, TIPO ASC limit 2000  '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "1";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
