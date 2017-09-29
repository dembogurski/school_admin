<?php
/** project/marijoa/reports/rep.prorrat_gastos.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "prorrat_gastos";
$Obj->alias = "Prorrateo de Gastos";
$Obj->ndoc = "Prorrateo de Gastos";
$Obj->help = "Prorrateo de Gastos";
$Obj->query = "'SELECT fact_localidad AS SUC,sum(df_subtotal)  AS TOTAL FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND f.fact_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+' AND  f.fact_estado = |{Cerrada}| GROUP BY SUC ASC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "TOTAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
