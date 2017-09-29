<?php
$Obj->name = "codigo_barras";
$Obj->alias = "Codigo de Barras";
$Obj->ndoc = "Codigo de Barras";
$Obj->help = "Genera e imprmime codigo de barras";
$Obj->query = "'select distinct p_ref as REF, p_cod as CODIGO_BARRAS, p_local as LOCALIDAD,p_descri, p_fam, p_grupo,p_tipo,p_comp,p_temp,p_estruc,p_clasif,p_color,p_cant, p_precio_1 as PRECIO,p_ancho ,p_echo_en ,p_import  from mnt_prod p, _audit_log_  a WHERE  p.p_cod = a.descrip AND a.accion = |{INSERTAR}|  and p_cod >=  '+el[f_codigo_nuevo]+'    and p_cod <=  '+el[f_rango]+'  and p_cod like '+el[f_term]+' and (p_ref like '+el[f_ref]+' or p_factura like '+el[f_ref]+') AND a.usuario LIKE '+el['usuario']+' order by p_cod asc'";
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
