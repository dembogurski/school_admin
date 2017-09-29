<?php
/** project/marijoa/reports/rep.fact_cont.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "fact_cont";
$Obj->alias = "Factura Contable";
$Obj->ndoc = "Factura Contable";
$Obj->help = "Factura Contable";
$Obj->query = "'SELECT f.fact_nro AS NRO,f.fact_localidad AS SUC, upper(f.fact_nom_cli) AS CLIENTE, f.fact_cli_ci AS CI,c.cli_dip_ci as DIPCI, c.cli_dir AS DIR, c.ciudad AS CIUDAD  FROM factura f, mnt_cli c   WHERE f.fact_cli_ci = c.cli_ci AND f.fact_nro = '+el['fact_nro']+' '";
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
