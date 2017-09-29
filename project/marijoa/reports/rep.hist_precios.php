<?php
$Obj->name = "hist_precios";
$Obj->alias = "Historial de Modificacion de Precios";
$Obj->ndoc = "Historial de Modificacion de precios";
$Obj->help = "Historial de Modificacion de precios";
$Obj->query = "'SELECT nro,date_format(fecha,|{%d-%m-%Y}|) AS fecha,usuario,h.codigo,h.p_cant as p_cant,h.p_valmin as p_valmin,h.p_compra as p_compra,    concat(h.p_precio_1,|{ >  }|,p_precio_1n)  AS p1,    concat(h.p_precio_2,|{ >  }|,p_precio_2n)  AS p2,    concat(h.p_precio_3,|{ >  }|,p_precio_3n)  AS p3,    concat(h.p_precio_4,|{ >  }|,p_precio_4n)  AS p4,    concat(h.p_precio_5,|{ >  }|,p_precio_5n)  AS p5,    motivo,obs,p_fam,p_grupo,p_tipo, p_color, volumen_orig, vol_actual, t.codigo as falla,t.descrip as nombre_falla  FROM hist_precios h, mnt_prod p, mnt_tipo_fallas t WHERE p.p_cod = h.codigo  and h.motivo = t.codigo  AND fecha between '+el['desde']+' and  '+el['hasta']+' and p_suc like '+el['empr']+' and motivo like '+el['motivo']+' '";
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
