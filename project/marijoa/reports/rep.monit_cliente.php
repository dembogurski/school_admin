<?php
/** project/marijoa/reports/rep.monit_client.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "monit_cliente";
$Obj->alias = "Reporte de Monitorio de Clientes";
$Obj->ndoc = "Reporte de Monitorio de Clientes";
$Obj->help = "Reporte de Monitorio de Clientes";
$Obj->query = "'SELECT cli_cat AS CAT, c.cli_tipo AS TIPO, c.cli_prom AS PROMEDIO, cli_fullname AS CLIENTE, sum(d.df_cantidad) AS CANT, sum(d.df_subtotal) AS SUBTOTAL, round(sum(  d.df_subtotal - (  (p.p_compra * -1) - (p.p_compra * p_porc_recargo / 100)  * -1 ) * d.df_cantidad ),0)  AS MARGEN  FROM factura f,det_factura d, mnt_prod p, mnt_cli c WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_cli_ci = c.cli_ci AND f.fact_localidad LIKE  '+el['suc']+' AND  f.fact_fecha BETWEEN '+el['desde']+' AND '+el['hasta']+'AND fact_cli_cat LIKE '+el['cli_cat']+' AND f. fact_estado = |{Cerrada}| AND c.cli_tipo LIKE '+el['cli_tipo']+'   GROUP BY CAT ASC, TIPO ASC,PROMEDIO ASC,CLIENTE ASC   ORDER BY  SUBTOTAL DESC  '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "SUBTOTAL ,MARGEN,CANT";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
