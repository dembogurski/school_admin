<?php
/** project/marijoa/reports/rep.pol_abast_rep.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "pol_abast_rep";
$Obj->alias = "Reporte de Abastecimiento";
$Obj->ndoc = "Reporte de Abastecimiento";
$Obj->help = "Reporte de Abastecimiento";
$Obj->query = "'SELECT sector,grupo,tipo,cant_min FROM pol_abast WHERE temporada = '+el['temporada']+' AND suc = '+el['__suc']+'   ORDER BY sector ASC, grupo ASC , tipo ASC'";
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
