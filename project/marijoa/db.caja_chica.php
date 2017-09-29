<?php
$Obj->name = "caja_chica";
$Obj->alias = "Caja Chica";
$Obj->help = "Registro de Caja Chica";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "caja_chica";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "'insert into caja_chica_mov( cj_ref_chi, __date,__local, __user, __moneda, __cotiz, monto, concepto, compl, entrada_ref, salida_ref,concepto_princ,con_nombre,subc_nombre,tipo,tipo_iva)values( '+cj_ref_chi.getVal()+', current_date,'+cj_empr.getStr()+', '+cj_user.getStr()+', |{G$}|, 1,'+cj_saldo_ini.getVal()+',|{6-3}|,concat(|{Saldo Anterior: }|,'+cj_ant.getStr()+',|{  }|,'+cj_comp.getStr()+',|{ Valor: }|,'+cj_saldo_ini.getVal()+'), '+cj_total.getVal()+', 0,|{6}|,|{Entradas Diversas}|,|{Desembolso}|,'+cj_tipo.getStr()+',|{----}|)'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "cj_empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Codigo de la Empresa",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_ORD_ => "5",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_ref_chi",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Numero de Referencia",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha del caja",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario Sabemos lo que estas haciendo",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_ ",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__caja_ref",
        F_ALIAS_ => "Obtiene Nro de caja Abierta de esta Suc",
        F_HELP_ => "Obtiene Nro de caja Abierta de esta Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM  caja WHERE  cj_empr='+ cj_empr.getStr() +' AND cj_estado=|{Abierto}| order by id desc limit 1'",
        F_QUERY_REF_ => "__caja_ref.firstSQL&&cj_empr.notEmpty()&&false",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "26",
        C_SHOW_ => "cj_empr.get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "__caja_ref.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! Favor Abrir Caja...  ' ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Particular,Empresa",
        F_BROW_ => "1",
		 F_LENGTH_ => "10",
        F_ORD_ => "27",
        C_VIEW_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Caja",
        F_HELP_ => "Tipo Caja",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "28",
        C_VIEW_ => "operation!=INSERT_",
        F_FORMULA_ => "cj_tipo.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_abierta",
        F_ALIAS_ => "Cant. Cajas Abiertas x Suc",
        F_HELP_ => "Cant. Cajas Abiertas x Suc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT COUNT(id) FROM caja_chica WHERE cj_estado = |{Abierta}| AND cj_empr = '+cj_empr.getStr()+' and cj_tipo = '+cj_tipo.getStr()+' '",
        F_QUERY_REF_ => "cj_abierta.firstSQL&&cj_empr.notEmpty()||cj_tipo.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "29",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_ref_ant",
        F_ALIAS_ => "Ultima Ref",
        F_HELP_ => "Ref Ant",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref_chi FROM caja_chica c WHERE c.cj_empr = '+cj_empr.getStr()+' AND c.cj_estado = |{Cerrada}| and cj_tipo = '+cj_tipo.getStr()+' ORDER BY c.id DESC LIMIT 1'",
        F_QUERY_REF_ => "operation==INSERT_&&cj_ref_ant.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_ant",
        F_ALIAS_ => "Saldo Anterior",
        F_HELP_ => "Saldo Anterior",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT SUM(entrada_ref-salida_ref) FROM caja_chica_mov m WHERE  cj_ref_chi ='+cj_ref_ant.getStr()+' AND tipo like '+cj_tipo.getStr()",
        F_QUERY_REF_ => "operation==INSERT_&&cj_ant.firstSQL&&cj_ref_ant.getVal()>0&&cj_tipo.hasChanged()",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_saldo_ini",
        F_ALIAS_ => "Monto de Desembolso",
        F_HELP_ => "Monto de Desembolso",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_comp",
        F_ALIAS_ => "Nro Comprobante",
        F_HELP_ => "Nro Comprobante",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_saldo_final",
        F_ALIAS_ => "Saldo Actual o Momentaneo",
        F_HELP_ => "Saldo Final o Momentaneo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(m.entrada_ref) - sum(m.salida_ref) from caja_chica c, caja_chica_mov m where  c.cj_ref_chi = m.cj_ref_chi and c.cj_ref_chi = '+cj_ref_chi.getVal()",
        F_QUERY_REF_ => "cj_saldo_final.firstSQL||operation==SHOW_||operation==BROWSE_",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_VIEW_ => "operation!=INSERT_",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "65",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado actual",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,Cerrada",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "tipo_iva",
        F_ALIAS_ => "Tipo Factura",
        F_HELP_ => "Tipo Iva",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Exenta,10%,5%",
        F_LENGTH_ => "10",
		F_NODB_ => "1",
		F_INLINE_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "62",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "print",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.caja_chica",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_movs",
        F_ALIAS_ => "Movimientos",
        F_HELP_ => "Movimientos de Caja Chica",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cj_ref_chi='+cj_ref_chi.getVal()+' AND tipo like '+cj_tipo.getStr()+' '",
        F_LINK_ => "db.caja_chica_mov",
        F_SEND_ => "cj_ref_chi.get()",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "cj_ref_chi.notEmpty()&&operation==CHANGE_&&cj_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "cj_saldo_ini.getVal()<=0||__caja_ref.get()=='__NO DATA__'||(cj_abierta.getVal()>0&&operation==INSERT_)",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__unlock",
        F_ALIAS_ => "Desbloquea el boton Insert/Accept",
        F_HELP_ => "Desbloqueael boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "cj_saldo_ini.getVal()>0&&__caja_ref.get()!='__NO DATA__'&&(cj_abierta.getVal()<1&&operation==INSERT_)",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cj_total",
        F_ALIAS_ => "Total Ingreso",
        F_HELP_ => "Total Ingreso",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        F_FORMULA_ => "cj_saldo_ini.getVal() + cj_ant.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "600",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{tipo}|).setAttribute(|{style}|,|{height:30px;color:blue;font-size:18px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
$Obj->Add(
    array(
        F_NAME_ => "style2",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "600",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{cj_tipo}|).setAttribute(|{style}|,|{height:30px;color:blue;font-size:18px;width:150px}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

?>
