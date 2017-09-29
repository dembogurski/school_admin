<?php
/** project/marijoa/reports/rep.monit_mens_clie.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "monit_mens_clie";
$Obj->alias = "Monitoreo Mensual de Clientes";
$Obj->ndoc = "Monitoreo Mensual de Clientes";
$Obj->help = "Monitoreo Mensual de Clientes";
$Obj->query = "'SELECT DISTINCT c.cli_fullname, c.cli_ci AS ci, c.cli_cat AS cat FROM mnt_cli c, factura f WHERE f.fact_cli_ci = c.cli_ci   AND f.fact_cli_cat = '+el[cli_cat]+' and cli_cat =  '+el[cli_cat]+' AND c.cli_tipo = '+el[cli_tipo]+'AND f.fact_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+'AND f.fact_localidad like '+el[suc]+' ORDER BY cli_fullname ASC'";
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
