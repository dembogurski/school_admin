<?php
/** project/marijoa/reports/rep.pedido_internac.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "pedido_internac";
$Obj->alias = "Nota de Pedido de Compra Internacional";
$Obj->ndoc = "Nota de Pedido Internacional";
$Obj->help = "Nota de Pedido Internacional";
$Obj->query = "'SELECT p.id as id, p.nro_pedido_int AS Nro,usuario as Usuario,suc as Suc,p.cli_ruc AS RUC, c.cli_fullname AS Cliente, sector AS Sector,p_grupo AS Grupo,p_tipo AS Tipo, p.p_color AS Color, p.p_cant AS Cant,ponderacion AS Ponderacion,cant_pond AS Cant_Pond,precio_est AS PrecioEst FROM pedido_int_det p, mnt_cli c  WHERE p.cli_ruc = c.cli_ci AND nro_pedido_int = '+el['nro_pedido_int']+' order by suc asc,Cliente asc '";
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
