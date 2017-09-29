<?php
$Obj->name = "facts_ab_anul";
$Obj->alias = "Facturas Re Editadas (Anuladas)";
$Obj->ndoc = "Facturas Re Editadas (Anuladas)";
$Obj->help = "Facturas ReAbiertas";
$Obj->query = "'SELECT usuario,fecha,hora,descrip,fact_estado ,fact_localidad as suc FROM _audit_log_ a, factura f WHERE accion LIKE |{Abrir%}| AND fecha between '+el[desde]+' and '+el[hasta]+' AND a.descrip = f.fact_nro AND f.fact_estado like |{Anulada}| and fact_localidad like '+el['suc']+'  ORDER BY fecha desc,hora desc,usuario''";
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
