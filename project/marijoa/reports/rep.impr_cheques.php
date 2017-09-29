<?php
/** project/marijoa/reports/rep.impr_cheques.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "impr_cheques";
$Obj->alias = "Impresion de Cheques totos los formatos";
$Obj->ndoc = "Impresion de Cheques totos los formatos";
$Obj->help = "Impresion de Cheques totos los formatos";
$Obj->query = "'SELECT f.chq_formato as FORMATO  FROM chq_formatos f, bcos_chq c WHERE c.chq_formato = f.chq_cod AND  chq_num = '+el['chq_num']+' '";
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
