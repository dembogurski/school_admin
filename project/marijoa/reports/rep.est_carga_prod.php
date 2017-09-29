<?php
$Obj->name = "est_carga_prod";
$Obj->alias = "Estadistica de Carga de Productos";
$Obj->ndoc = "Estadistica de Carga de Productos";
$Obj->help = "Estadistica de Carga de Productos";
$Obj->query = "'SELECT LEFT(upper(c.c_nac_int),3) AS IMP_EXP, date_format(fecha,|{%d-%m-%Y}|) AS FECHA,  p.p_cod as CODIGO,p.p_padre AS PADRE,usuario as USUARIO, p.p_cant_compra AS CANT_COMPRA,p_compra * p.p_cant_compra AS COSTO, p.p_lisoest as LISOEST, p.p_porc_recargo AS REC, ((p.p_cant_compra * p.p_compra) * p.p_porc_recargo) / 100 AS G_ADMIN FROM _audit_log_ a, mnt_prod p, mov_compras c WHERE p.p_ref = c.c_ref AND a.descrip = p.p_cod AND a.accion = |{INSERTAR}| AND c.c_nac_int like '+el['nac_int']+' AND a.usuario like '+el[busc_func]+' AND  a.fecha BETWEEN  '+el[desde]+' AND '+el[hasta]+''";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CANT_COMPRA";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
