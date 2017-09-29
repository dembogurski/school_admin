<?php
/** project/marijoa/reports/rep.rep_log_fdp.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */  
 
 

 
$Obj->name = "fdp_resumen";
$Obj->alias = "Reporte de Finalizaciones de Piezas Resumido";
$Obj->ndoc = "Reporte de Finalizaciones de Piezas Resumido";
$Obj->help = "Reporte de Finalizaciones de Piezas Resumido";
$Obj->query = "'select f.codigo as CODIGO,p.p_grupo as GRUPO,p.p_tipo as TIPO, usuario AS USUARIO, suc as SUC, DATE_FORMAT(fecha,|{%d-%m-%Y}|) as FECHA, hora AS HORA , descrip AS DESCRIP, grupo as GRUPO, tipo as TIPO,p_cant_compra as C_INI, p_cant as STOCK,p_compra AS P_COMPRA,p_porc_recargo as REC,if((p_tipo regexp |{borda}| or p_clasif regexp |{borda}|),1,0) as verif  from prod_fdp f inner join mnt_prod p on p.p_cod = f.codigo inner join mnt_ajustes a on p.p_cod=a.aj_prod and a.aj_oper in (|{Disminucion en Entrada}|,|{Aumento en Entrada}|) where usuario like '+el['usuario']+' and fecha BETWEEN '+el['desde']+' and '+el['hasta']+' and suc like '+el['suc_']+'  and grupo like '+el['grupo']+' and tipo like '+el['tipo']+' and descrip like '+el['cod']+' and accion = |{FDP}| and p_cant > '+el['canti']+' and right(p_cod,2) > 13 group by p.p_cod having(verif=0) order by fecha asc, suc asc,p.p_grupo ASC, p.p_tipo ASC' ";
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