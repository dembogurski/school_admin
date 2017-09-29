<?php
$Obj->name = "fdp_compr_res";
$Obj->alias = "Reporte de Fines de Pieza relacionados con Compras RESUMIDO";
$Obj->ndoc = "Reporte de Fines de Pieza relacionados con Compras";
$Obj->help = "Reporte de Fines de Pieza relacionados con Compras";
$Obj->query = "'select p.p_grupo as GRUPO, p.p_tipo AS TIPO , a.aj_inicial AS CANT_INICIAL,  a.aj_ajuste as AJUSTE, a.aj_signo as SIGNO, a.aj_final as FINAL from mnt_prod p, mov_compras c, mnt_ajustes a where  c.c_ref = p.p_ref and c_fecha between  '+el[desdeinv]+' and '+el[hastainv]+' and p.p_local like '+el[nsuc]+'  and p.p_grupo like '+el['p_grupo']+' and p.p_tipo like '+el['p_tipo']+' and p.p_color like '+el['p_color']+' and c.c_prov like '+el['prov']+' and c.c_ref like '+el['ref']+' and a.aj_prod = p.p_cod and a.aj_oper like '+el['aj_oper']+' order by p.p_grupo, p.p_tipo asc'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "1";
$Obj->cond_sub = "el['GRUPO']!=old['GRUPO'] && el['TIPO']!=old['TIPO'] ";
$Obj->subtotal = "CANT_INICIAL,AJUSTE, FINAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "endConsult";
$Obj->total = "CANT_INICIAL,AJUSTE, FINAL";
$Obj->dec_tot = "2";
$Obj->query_end = "";
?>
