<?php
$Obj->name = "nota_remision_filtros";
$Obj->alias = "Nota de Remision";
$Obj->ndoc = "Nota de Remision";
$Obj->help = "Nota de Remision";
$Obj->query = "'SELECT  date_format( rem_fecha ,|{%d-%m-%Y}|) as  Fecha ,   rem_nro  as  Nro ,  concat( rem_origen ,|{-}|,   rem_dir_origen ) as  Origen ,  concat( rem_destino ,|{-}|,  rem_dir_destino ) as  Destino ,   rem_func_nombre  as  Encargado ,   rem_estado  as  Estado ,   rem_receptor  as  Receptor,rem_env_emp as Transportadora, rem_env_cod as NroLevante  FROM  marijoa . nota_remision  WHERE  rem_origen like '+el[suco]+'  AND  rem_destino like '+el[sucd]+'  AND  rem_fecha BETWEEN '+el[desde]+' AND '+el[hasta]+'  AND rem_estado = '+el[remision_estado]+' ORDER BY  rem_fecha  DESC'";
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
