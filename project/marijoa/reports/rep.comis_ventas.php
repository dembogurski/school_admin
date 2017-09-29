<?php
/** project/marijoa/reports/rep.comis_ventas.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "comis_ventas";
$Obj->alias = "Calculo de Comision por Ventas";
$Obj->ndoc = "Calculo de Comision por Ventas";
$Obj->help = "Calculo de Comision por Ventas";
$Obj->query = "'SELECT f.fact_vend_cod AS Vendedor,f.fact_cli_cat AS Cat,p_fam,p_grupo,p_tipo,p_compra AS P1, fact_localidad AS Suc,  SUM( df_cantidad) AS Unidades   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND f.fact_estado = |{Cerrada}|  AND f.fact_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+' and f.fact_localidad = '+el[empr]+' AND d.df_cod_prod =  p.p_cod AND ((p_fam LIKE |{HOGAR}| AND  p_grupo LIKE |{SABANAS HECHAS}|  AND p_tipo LIKE |{300 HILOS SATINADA%}|) OR  (p_fam LIKE |{HOGAR}| AND  p_grupo LIKE |{TOALLAS}|  AND p_tipo LIKE |{PARA EL CUERPO}| AND p_compra = 12925.00) OR  (p_fam LIKE |{HOGAR}| AND  p_grupo LIKE |{TOALLAS}|  AND p_tipo LIKE |{PARA EL CUERPO}| AND p_compra = 18800.00) OR  (p_fam LIKE |{HOGAR}| AND  p_grupo LIKE |{COBERTORES}|  AND p_tipo LIKE |{JUEGO DE EDREDONES Y FUNDAS%}|) )GROUP BY Cat,p_fam,p_grupo,p_tipo, P1, Vendedor ORDER BY Suc ASC, Vendedor ASC, Cat ASC   '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "el['Vendedor']!=old['Vendedor']";
$Obj->subtotal = "Unidades";
$Obj->dec_sub = "0";
$Obj->cond_tot = "endConsult";
$Obj->total = "Unidades";
$Obj->dec_tot = "0";
$Obj->query_end = "";
?>
