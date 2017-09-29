<?php
/** project/marijoa/reports/rep.ajuste_salida.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "ajuste_salida";
$Obj->alias = "Reporte de Ajustes en Salida";
$Obj->ndoc = "Reporte de Ajustes en Salida";
$Obj->help = "Reporte de Ajustes en Salida";
$Obj->query = "'SELECT a.id as ID,aj_suc as SUC,aj_prod AS CODIGO,aj_usuario as USUARIO,date_format(aj_fecha,|{%d-%m-%Y}|) AS FECHA,aj_hora AS HORA ,aj_usuario AS USUARIO,aj_inicial AS C_INI, aj_ajuste AS AJUSTE,aj_final AS C_FINAL, aj_oper AS OPERACION, aj_motivo AS MOTIVO,aj_cant_v as CANT_V,aj_verificador as VERIF, prod_fin_pieza AS FP FROM mnt_ajustes a, mnt_prod p WHERE a.aj_prod = p.p_cod and aj_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+' AND aj_usuario LIKE '+el[usuario]+' AND aj_oper LIKE '+el[oper]+' AND aj_motivo LIKE '+el[conc_ajuste]+' and aj_suc like '+el[suc_]+' and aj_motivo like '+el[vend_porc]+' '";
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
