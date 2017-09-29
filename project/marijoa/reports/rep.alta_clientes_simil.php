<?php
/** project/marijoa/reports/rep.alta_clientes.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "alta_clientes_fecha";
$Obj->alias = "Reporte de Altas de Clientes";
$Obj->ndoc = "Reporte de Altas de Clientes";
$Obj->help = "Reporte de Altas de Clientes";
$Obj->query = "'SELECT id,cli_fullname AS CLIENTE, cli_ci as CI_RUC,cli_tel1 AS TEL, cli_cat AS CATEGORIA, DATE_FORMAT(cli_fecha_ins,|{%d-%m-%Y}|) AS FECHA_ALTA, cli_suc AS SUC, cli_vend AS VENDEDOR,concat(cli_dir,|{ - }|,ciudad,|{ - }|,dep_estado,|{ - }|,pais) AS DIR  FROM mnt_cli WHERE cli_fecha_ins BETWEEN '+el['desdeinv']+' AND  '+el['hastainv']+' AND cli_vend like '+el['vend']+' AND cli_suc like  '+el['suc_']+'  '";
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
