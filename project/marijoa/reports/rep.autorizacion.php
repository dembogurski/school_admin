<?php
$Obj->name = "autorizacion";
$Obj->alias = "Autorizacion de Firmantes";
$Obj->ndoc = "Autorizacion de Firmantes";
$Obj->help = "Autorizacion de Firmantes";
$Obj->query = "'SELECT cli_ci AS CI, cli_fullname AS CLIENTE, cli_tel1 AS TEL, cli_dir AS DIR, pais AS PAIS, dep_estado AS ESTADO FROM mnt_cli WHERE cli_ci = '+el['dp_ci']+'     LIMIT 1'";
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
