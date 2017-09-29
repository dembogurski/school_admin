<?php
/** project/marijoa/reports/rep.rep_log_fdp.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */  
 
 

 
$Obj->name = "rep_log_fdp";
$Obj->alias = "Reporte de Finalizaciones de Piezas";
$Obj->ndoc = "Reporte de Finalizaciones de Piezas";
$Obj->help = "Reporte de Finalizaciones de Piezas";
$Obj->query = "'select f.codigo as CODIGO, usuario AS USUARIO, suc as SUC, DATE_FORMAT(fecha,|{%d-%m-%Y}|) as FECHA, hora AS HORA , descrip AS DESCRIP, grupo as GRUPO, tipo as TIPO,p_cant_compra as C_INI, stockf as STOCK,p_compra AS P_COMPRA,p_porc_recargo as REC from prod_fdp f, mnt_prod p where p.p_cod = f.codigo and usuario like '+el['usuario']+' and fecha BETWEEN '+el['desde']+' and '+el['hasta']+' and suc like '+el['suc_']+'  and grupo like '+el['grupo']+' and tipo like '+el['tipo']+' and descrip like '+el['cod']+' and accion = |{FDP}| and stockf > '+el['canti']+' order by suc asc' ";
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
