<?php
$Obj->name = "inventario";
$Obj->alias = "Reporte de Inventario";
$Obj->ndoc = "Inventario";
$Obj->help = "Inventario";
$Obj->query = "'SELECT p_cod,p_fam,p_grupo, p_tipo,p_color,p_cant, codigo,suc_p as suc_punteo ,suc_s,hits,usuario,fecha_hora, duplicado,p.p_compra as fob, ((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1  as p_compra  FROM mnt_prod p LEFT JOIN inv_control i ON p.p_cod = i.codigo and i.suc_p =  '+el['suc_']+'   WHERE p.p_local = '+el['suc_']+' AND prod_fin_pieza <> |{Si}| AND p_cant > 0  '";
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
