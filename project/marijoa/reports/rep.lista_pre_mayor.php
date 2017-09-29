<?php
/** project/marijoa/reports/rep.lista_pre_mayor.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "lista_pre_mayor";
$Obj->alias = "Lista de Precios Mayoristas";
$Obj->ndoc = "Lista de Precios Mayoristas";
$Obj->help = "Lista de Precios Mayoristas";
$Obj->query = "'SELECT p_cod AS CODIGO, p_fam AS FAMILIA,p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR, p_descri AS DESCRIP, p_precio_1 AS PRECIO_1,p_precio_2 AS PRECIO_2,p_precio_3 AS PRECIO_3,p_precio_4 AS PRECIO_4,p_precio_5 AS PRECIO_5,p_precio_6 AS PRECIO_6,p_precio_7 AS PRECIO_7,p_cant as CANT, p.p_local as SUC   FROM mnt_prod p WHERE p_cod  LIKE '+el['p_cod']+'   AND p.p_fam LIKE '+el['p_fams']+' AND p.p_grupo LIKE  '+el['p_grupos']+' AND p.p_tipo LIKE '+el['p_tipos']+' AND p.p_color LIKE '+el['p_colors']+' AND p.p_local LIKE '+el['local']+' and p.prod_fin_pieza = |{No}| order by p_fam, p_grupo, p_tipo asc LIMIT 2000'";
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
