<?php
/** project/marijoa/reports/rep.sorteo.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "sorteo";
$Obj->alias = "Sorteo de Vales de Compras";
$Obj->ndoc = "Sorteo de Vales de Compras";
$Obj->help = "Sorteo de Vales de Compras";
$Obj->query = "'SELECT c.id AS ID, c.cli_ci AS CI, UPPER(c.cli_fullname) AS CLIENTE,f.fact_cli_cat AS CAT, CONCAT(cli_tel1,|{ - }|,cli_tel2) AS TELEFONOS,CONCAT(c.cli_dir,|{  }|,c.ciudad,|{ - }|,c.dep_estado,|{ - }|,c.pais) AS DIR,c.cli_fecha_ins AS REGISTRADO_EN, f.fact_total AS TOTAL FROM mnt_cli c, factura f WHERE f.fact_cli_ci <> |{1}| AND c.cli_ci = f.fact_cli_ci AND f.fact_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+'  AND f.fact_estado = |{Cerrada}| AND f.fact_total > '+el['totalv']+'  and f.fact_localidad like '+el['suc']+' and  (f.fact_cli_cat like '+el[categ]+' or f.fact_cli_cat like '+el[categ2]+' )  '";
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
