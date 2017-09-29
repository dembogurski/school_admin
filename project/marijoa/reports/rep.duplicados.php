<?php
/** project/marijoa/reports/rep.duplicados.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "duplicados";
$Obj->alias = "Reporte de Duplicados ";
$Obj->ndoc = "Reporte de Duplicados ";
$Obj->help = "Reporte de Duplicados ";
$Obj->query = "'SELECT codigo AS CODIGO, suc_p AS SUC_P, suc_s AS SUC_S, hits AS HITS, usuario AS USUARIO, fecha_hora AS FECHA_HORA, duplicado AS DUPLICADO FROM inv_control WHERE codigo IN (SELECT codigo  FROM inv_control AS x GROUP BY codigo HAVING count(*)>1 AND inv_control.codigo=x.codigo) ORDER BY codigo,fecha_hora ASC  '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "old['CODIGO']!=el['CODIGO']";
$Obj->subtotal = "DUPLICADO";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
