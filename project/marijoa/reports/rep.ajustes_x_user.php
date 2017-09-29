<?php
$Obj->name = "ajustes_x_user";
$Obj->alias = "Reporte de Ajustes por Usuario";
$Obj->ndoc = "Reporte de Ajustes por Usuario";
$Obj->help = "Reporte de Ajustes por Usuario";
$Obj->query = "'select aj_prod as CODIGO,p.p_grupo AS GRUPO, p.p_tipo AS TIPO,aj_usuario as USUARIO,  aj_fecha as FECHA,aj_hora as HORA,  aj_inicial as MTS_ORIGINAL, aj_ajuste AS AJUSTE, aj_final as FINAL,aj_signo as SIGNO, aj_oper AS OPERACION  from mnt_ajustes, mnt_prod p where aj_prod = p.p_cod AND aj_suc LIKE '+el['suc_']+' AND aj_usuario like '+el['usuario']+' and aj_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "MTS_ORIGINAL,AJUSTE,FINAL";
$Obj->dec_sub = "2";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
