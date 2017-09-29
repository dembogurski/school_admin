<?php
$Obj->name = "vent_aper";
$Obj->alias = "Abrir Facturas";
$Obj->help = "Abrir Facturas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_vend",
        F_ALIAS_ => "Buscar Vendedor",
        F_HELP_ => "Buscar Funcionario Responsable",
        F_TYPE_ => "text",
        F_LENGTH_ => "18",
        F_NODB_ => "1",
        F_ORD_ => "3",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vend_cod",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Código y nombre compledo del funcionario",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_vend.hasChanged()",
        F_RELTABLE_ => "mnt_func",
        F_SHOWFIELD_ => "func_cod,func_fullname",
        F_FILTER_ => "' (func_fullname like |{'+busc_vend.get()+'%}| or func_cod like |{'+busc_vend.get()+'%}|) and func_lugar_trab = '+__local.getStr()",
        F_NODB_ => "1",
        F_ORD_ => "3",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nro",
        F_ALIAS_ => "Facturas",
        F_HELP_ => "Facturas",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "vend_cod.hasChanged()",
        F_RELTABLE_ => "factura",
        F_SHOWFIELD_ => "fact_nro,concat(fact_nom_cli,|{ Total:  }|,fact_total)",
        F_FILTER_ => "'fact_vend_cod = '+vend_cod.getStr()+' and fact_estado = |{En_caja}| and fact_localidad = '+__local.getStr()+' and fact_fecha = current_date '",
        F_NODB_ => "1",
        F_ORD_ => "12",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_est",
        F_ALIAS_ => "Estado de Factura",
        F_HELP_ => "Estado de Factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_estado from factura where fact_nro = '+fact_nro.getVal()",
        F_QUERY_REF_ => "fact_nro.hasChanged()&&fact_nro.getVal()>0",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "make_conf",
        F_ALIAS_ => "Confirme Abrir Factura",
        F_HELP_ => "Confime",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        C_SHOW_ => "f_est.get()!='Abierta'&&fact_nro.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reabrir",
        F_ALIAS_ => "Abre la Factura",
        F_HELP_ => "Abre la Factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT abrir_factura('+fact_nro.getVal()+',|{'+p_user_+'}|) '",
        F_QUERY_REF_ => "make_conf.hasChanged()&&make_conf.get()=='Si'",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__goback",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "reabrir.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload(); setTimeout('self.close()',2500)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "reabrir.getVal()>0",
        F_FORMULA_ => "'( ! ) Listo operacion realizada con exito!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
