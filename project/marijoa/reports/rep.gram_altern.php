<?php
/** project/marijoa/reports/rep.gram_altern.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "gram_altern";
$Obj->alias = "Alternativas para Gramaje";
$Obj->ndoc = "Alternativas para Gramaje";
$Obj->help = "Alternativas para Gramaje";
$Obj->query = "'SELECT p_ref as REF,p_fam AS FAMILIA,p_grupo AS GRUPO, p_tipo AS TIPO FROM mnt_prod WHERE p_cod = '+el['codigo']+''";
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
