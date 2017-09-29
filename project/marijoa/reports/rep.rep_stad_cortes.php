<?php
$Obj->name = "rep_stad_cortes";
$Obj->alias = "Estadistica de Cortes";
$Obj->ndoc = "Estadistica de Cortes";
$Obj->help = "Estadistica de Cortes";
$Obj->query = "'SELECT  df.df_cantidad AS CORTE, COUNT(*) AS REPETICIONES,df.df_cantidad * COUNT(*) AS MULT    FROM facturas_all f, det_factura df, productos_all p WHERE p.p_cod = df_cod_prod AND f.fact_nro = df.df_fact_num AND f.fact_localidad LIKE '+el[rep_localidad]+' AND    p.p_fam LIKE '+el[p_fam]+' AND p.p_grupo LIKE  '+el[p_grupo]+' AND p.p_tipo LIKE '+el[p_tipo]+' AND p.p_comp LIKE  '+el[p_comp]+' AND p.p_temp LIKE '+el[p_temp]+'   AND p.p_estruc LIKE '+el[p_estruc]+'AND p.p_clasif LIKE '+el[p_clasif]+' AND p.p_color LIKE '+el[p_color]+' AND p.p_lisoest LIKE '+el[p_lisoest]+'    AND f.fact_fecha BETWEEN '+el[desdeinv]+' AND '+el[hastainv]+' and f.fact_cli_cat like  '+el[cli_cat]+' GROUP BY df.df_cantidad HAVING COUNT(*) > 1 ORDER BY REPETICIONES DESC,CORTE ASC'";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "1";
$Obj->pre_sub = "";
$Obj->cond_sub = "endConsult";
$Obj->subtotal = "CORTE,REPETICIONES,MULT";
$Obj->dec_sub = "0";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
