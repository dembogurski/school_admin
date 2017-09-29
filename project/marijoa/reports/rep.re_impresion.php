<?php
/** project/marijoa/reports/rep.re_impresion.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "re_impresion";
$Obj->alias = "Codigos a Remprimir";
$Obj->ndoc = "Codigos a Remprimir";
$Obj->help = "Codigos a Remprimir";
$Obj->query = "'SELECT codigo AS CODIGOS   FROM mnt_prod p, reg_impresion r WHERE p.p_cod = r.codigo and codigo >=  '+el[f_codigo_nuevo]+'  AND codigo <=  '+el[f_rango]+'  AND codigo LIKE '+el[f_term]+' '";
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
