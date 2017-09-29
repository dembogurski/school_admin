<?php
/** project/marijoa/reports/rep.promo_primavera.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "promo_primavera";
$Obj->alias = "Promo Primavera en Marijoa";
$Obj->ndoc = "Promo Primavera en Marijoa";
$Obj->help = "Promo Primavera en Marijoa";
$Obj->query = "'SELECT SUM(df_subtotal) AS CRUCERO  FROM det_factura d, mnt_prod p WHERE p.p_cod = d.df_cod_prod AND p.p_fam = |{CRUCERO}| AND df_fact_num = '+el['df_fact_num']+' '";
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
