<?php
$Obj->name = "venta_en_caja";
$Obj->alias = "Venta de Productos";
$Obj->help = "Venta de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "factura";
$Obj->Filter = "";
$Obj->Sort = "fact_nro desc";
$Obj->p_insert = "";
$Obj->p_change = "'select makeLog_(|{MODIFICAR}|,|{FACTURA Nro '+fact_nro.get()+' estado :  '+fact_estado.get()+'}|,|{'+p_user_+'}|)'";
$Obj->p_delete = "'select makeLog_(|{BORRAR}|,|{FACTURA Nro '+fact_nro.get()+' estado :  '+fact_estado.get()+'}|,|{'+p_user_+'}|)'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__change",
        F_ALIAS_ => "__change",
        F_HELP_ => "Operation = CHANGE_",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "operation=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_sentinela",
        F_ALIAS_ => "Sentinela Venta || devolucion usado como ref sup en subforms",
        F_HELP_ => "Sentinela",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "4",
        V_DEFAULT_ => "'Venta'",
        C_VIEW_ => "false",
        G_SHOW_ => "288",
        G_CHANGE_ => "288"));

$Obj->Add(
    array(
        F_NAME_ => "fact_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de emisión de la factura",
        F_TYPE_ => "date",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select current_date'",
        F_QUERY_REF_ => "fact_fecha.firstSQL",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "12",
        C_VIEW_ => "false",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_ruc",
        F_ALIAS_ => "R.U.C.",
        F_HELP_ => "R.U.C.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_ruc_emp from adm_param'",
        F_QUERY_REF_ => "el['fact_ruc'].firstSQL",
        F_LENGTH_ => "15",
        F_ORD_ => "20",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_iva",
        F_ALIAS_ => "I.V.A.",
        F_HELP_ => "I.V.A.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'Select p_iva from adm_param'",
        F_QUERY_REF_ => "el['fact_iva'].firstSQL",
        F_RELTABLE_ => "adm_param",
        F_RELFIELD_ => "fact_iva",
        F_LOCALFIELD_ => "p_iva",
        F_LENGTH_ => "4",
        F_DEC_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_localidad",
        F_ALIAS_ => "Obtiene Localidad",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "fact_localidad.firstSQL",
        F_LENGTH_ => "3",
        F_ORD_ => "31",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_emp_datos",
        F_ALIAS_ => "Consulta datos de la empresa",
        F_HELP_ => "Consulta datos de la empresa",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select emp_nombre,emp_dir, emp_tel, emp_cod from par_empresas where emp_cod ='+ fact_localidad.getStr()",
        F_QUERY_REF_ => "fact_localidad.get()!=''&&fact_emp_datos.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "33",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_emp_dir",
        F_ALIAS_ => "Dirección de la Empresa",
        F_HELP_ => "Dirección de la Empresa (Propia)",
        F_TYPE_ => "formula",
        F_MULTI_ => "1",
        F_LENGTH_ => "150",
        F_ORD_ => "35",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "''+fact_localidad.get()+' '+ db('emp_nombre')+' - '+ db('emp_ciudad') +'-' + db('emp_dir')+' ' ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_emp_tel",
        F_ALIAS_ => "Telefono de la Empresa",
        F_HELP_ => "Telefono de la Empresa (Propia)",
        F_TYPE_ => "formula",
        F_LENGTH_ => "13",
        F_ORD_ => "38",
        C_VIEW_ => "false",
        F_FORMULA_ => "db('emp_tel')",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cli_ci",
        F_ALIAS_ => "Nº C.I. o R.U.C.",
        F_HELP_ => "Nº Cédula o R.U.C. del cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_REQUIRED_ => "1",
        F_ORD_ => "43",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "diplomatico",
        F_ALIAS_ => "Diplomatico",
        F_HELP_ => "El cliente es Diplomatico",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT  if(cli_dip_ci is null or trim(cli_dip_ci)=|{}|,|{No}|,|{Si}|) from mnt_cli WHERE cli_ci ='+el['fact_cli_ci'].getStr()",
        F_QUERY_REF_ => "fact_cli_ci.hasChanged()||diplomatico.firstSQL",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "151",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cli_ci.get()!='1'",
        C_VIEW_ => "fact_cli_ci.get()!='1'",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cli_cat",
        F_ALIAS_ => "Categoría",
        F_HELP_ => "Categoría del Cliente",
        F_TYPE_ => "text",
        F_OPTIONS_ => "1",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_cat",
        F_RELFIELD_ => "cli_ci",
        F_LOCALFIELD_ => "fact_cli_ci",
        F_LENGTH_ => "2",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "44",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'1'",
        C_CHANGE_ => "fact_cli_ci.hasChanged()",
        F_FORMULA_ => " ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nom_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Nombre completo del cliente",
        F_TYPE_ => "text",
        F_SHOWFIELD_ => " ",
        F_RELFIELD_ => " ",
        F_LOCALFIELD_ => " ",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_limite",
        F_ALIAS_ => "Limite Credito",
        F_HELP_ => "Limite",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT  cli_limit from mnt_cli WHERE cli_ci ='+el['fact_cli_ci'].getStr()",
        F_QUERY_REF_ => "fact_cli_ci.hasChanged()||fact_limite.firstSQL&&fact_cli_ci.get()!='1'",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "51",
        C_SHOW_ => "fact_cli_ci.get()!='1' &&fact_nom_cli.get()!='__NO DATA__'",
        C_VIEW_ => "fact_cli_ci.get()!='1'",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_z_cuotas",
        F_ALIAS_ => "Cuotas Pendientes",
        F_HELP_ => "Cuotas Pendientes",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT FLOOR( SUM(ct_monto) ) FROM cuotas WHERE ct_estado = |{Pendiente}| AND ct_deudor = '+fact_nom_cli.getStr()",
        F_QUERY_REF_ => "fact_nom_cli.hasChanged()||fact_z_cuotas.firstSQL&&fact_cli_ci.get()!='1'",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "52",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cli_ci.get()!='1' &&fact_nom_cli.get()!='__NO DATA__'&&fact_nom_cli.get()!='SIN NOMBRE'",
        C_VIEW_ => "fact_cli_ci.get()!='1'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "cuotas_vencidas",
        F_ALIAS_ => "Cuotas Vencidas",
        F_HELP_ => "Sumatoria de cuotas Vencidas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select FLOOR( SUM(ct_monto)) from cuotas where ct_ci = |{'+fact_cli_ci.get()+'}| and ct_estado = |{Pendiente}| and datediff(ct_fecha_venc,date(now()))<0 '",
        F_QUERY_REF_ => "fact_nom_cli.hasChanged()||cuotas_vencidas.firstSQL&&fact_cli_ci.get()!='1'",		
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "301",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cli_ci.get()!='1' &&fact_nom_cli.get()!='__NO DATA__'&&fact_nom_cli.get()!='SIN NOMBRE'",
        C_VIEW_ => "fact_cli_ci.get()!='1'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_diff",
        F_ALIAS_ => "Diferencia",
        F_HELP_ => "Monto que puede llevar a Credito",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "53",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_limite.getVal() > 0",
        C_VIEW_ => "fact_limite.getVal() > 0",
        F_FORMULA_ => "formatNumber((fact_limite.getVal() - fact_z_cuotas.getVal()),0,|{.}|,|{}|,|{}|,|{}|,|{-}|,|{}|) ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "style0",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(fact_diff.getVal()<0){document.getElementById(|{fact_diff}|).setAttribute(|{style}|,|{height:26px;color:red;font-size:18px;}|) }else{ document.getElementById(|{fact_diff}|).setAttribute(|{style}|,|{height:22px;color:black;font-size:12px;}|)  } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_vend_cod",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Código y nombre compledo del Vendedor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "16",
        F_REQUIRED_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "fact_estado.get()=='Abierta'",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "func_nombre",
        F_ALIAS_ => "Nombre del funcionario",
        F_HELP_ => "Nombre del funcionario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select func_fullname from mnt_func where func_cod = '+fact_vend_cod.getStr()+' '",
        F_QUERY_REF_ => "func_nombre.firstSQL",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "operation==CONSULT_",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_busc_vend",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "No se encuentra en el registro de funcionarios",
        F_TYPE_ => "formula",
        F_LENGTH_ => "64",
        F_NODB_ => "1",
        F_ORD_ => "91",
        C_SHOW_ => "func_nombre.get()=='__NO DATA__'",
        C_VIEW_ => "true",
        F_FORMULA_ => "'Ud. no es un Vendedor no puede generar facturas ni modificar!!!'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_ver_caja",
        F_ALIAS_ => "Verifica si caja esta abierta",
        F_HELP_ => "Verifica si caja esta abierta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_estado FROM  caja WHERE  cj_empr='+ db('emp_cod') +' AND cj_estado=|{Abierto}|'",
        F_QUERY_REF_ => "db('emp_cod')!=''&&fact_ver_caja.firstSQL",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "92",
        C_SHOW_ => "el['fact_fecha'].get()!=''",
        C_VIEW_ => "false",
        F_POSVAL_ => "el['fact_ver_caja'].get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja abierta para esta Fecha!!! ' ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_comi_vend",
        F_ALIAS_ => "Comision del Vendedor",
        F_HELP_ => "Comision del Vendedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_ORD_ => "105",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_estado_com",
        F_ALIAS_ => "Estado de la comision del vendedor",
        F_HELP_ => "Estado de la comision del vendedor (Pagada - No Pagada)",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_ORD_ => "110",
        V_DEFAULT_ => "'No Pagada'",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nro",
        F_ALIAS_ => "Nº de Factura",
        F_HELP_ => "Nº de Factura",
        F_TYPE_ => "text",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "111",
        F_UNIQ_ => "1",
        C_SHOW_ => "fact_nro.firstSQL&&operation==CONSULT_&&fact_fecha.get()!=''&&func_nombre.get()!='__NO DATA__'",
        C_VIEW_ => "fact_gen_venta.get()=='Si'||operation==CHANGE_",
        C_CHANGE_ => "false",
        F_FORMULA_ => "db",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_gen_venta",
        F_ALIAS_ => "Generar Factura",
        F_HELP_ => "Genera Factura de venta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "115",
        C_SHOW_ => "allValid && fact_nro.getVal()==0 && fact_ver_caja.get()!='__NO DATA__'",
        C_VIEW_ => "false//operation!=INSERT_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_detalle",
        F_ALIAS_ => "Detalle de Factura",
        F_HELP_ => "Detalle de Factura",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'df_fact_num='+fact_nro.getVal()",
        F_LINK_ => "db.det_factura",
        F_SEND_ => "fact_nro.getVal()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "121",
        C_SHOW_ => "fact_nro.getVal()!=''&&func_nombre.get()!='__NO DATA__'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "open_sub",
        F_ALIAS_ => "Abre Subformulario",
        F_HELP_ => "Abre Subformulario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "122",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{fact_detalle}|).setAttribute(|{hidden}|,|{false}|);  document.getElementById(|{hbox_fact_detalle}|).setAttribute(|{height}|,|{260}|);   ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "doclick",
        F_ALIAS_ => "click",
        F_HELP_ => "Contro click",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "123",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( !openSubform   ){ document.getElementById(|{cap`fact_detalle`Detalle de Factura}|).click(); openSubform=true;}",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_conv",
        F_ALIAS_ => "Convenio con que Compro",
        F_HELP_ => "Convenio con que Compro",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "mnt_conv",
        F_SHOWFIELD_ => "conv_cod,conv_nombre",
        F_LENGTH_ => "15",
        F_ORD_ => "130",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nro_orden",
        F_ALIAS_ => "Nº de Orden de Convenio",
        F_HELP_ => "Nº de Orden de Convenio",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_ORD_ => "134",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "bloqueo",
        F_ALIAS_ => "Bloqueo de boton consult",
        F_HELP_ => "Bloqueo de boton consult",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "151",
        C_SHOW_ => "bloqueo.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_estado",
        F_ALIAS_ => "Estado de la Factura",
        F_HELP_ => "Estado de la Factura",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "En_caja,Abierta",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "160",
        C_VIEW_ => "false",
        G_SHOW_ => "132",
        G_CHANGE_ => "132"));

$Obj->Add(
    array(
        F_NAME_ => "fact_empaque",
        F_ALIAS_ => "Empaque",
        F_HELP_ => "Revisado por Empaque",
        F_TYPE_ => "text",
        F_LENGTH_ => "5",
        F_BROW_ => "1",
        F_ORD_ => "160",
        C_VIEW_ => "operation!=CHANGE_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_tipo",
        F_ALIAS_ => "Forma de Pago",
        F_HELP_ => "Tipo de Factura o Forma de pago",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Contado,Credito,Donacion",
        F_LENGTH_ => "10",
        F_ORD_ => "162",
        V_DEFAULT_ => "' '",
        C_VIEW_ => "operation==CHANGE_&&fact_estado.get()=='En_caja'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_flete",
        F_ALIAS_ => "Cargar Flete al Detalle",
        F_HELP_ => "Cargar Flete al Detalle",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "163",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_tipo.get()=='Credito'&&operation==CHANGE_&&!fact_cflete.get()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_espacio",
        F_ALIAS_ => " ",
        F_HELP_ => "Cargar Flete",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select df_renglon + 1 from det_factura where df_fact_num = '+fact_nro.getVal()+' order by id desc limit 1'",
        F_QUERY_REF_ => "fact_espacio.firstSQL",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "163",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_tipo.get()=='Credito'&&operation==CHANGE_&&!fact_cflete.get()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cflete",
        F_ALIAS_ => "Cargar Flete",
        F_HELP_ => "Cargar Flete",
        F_TYPE_ => "proc",
        F_QUERY_ => "'insert into det_factura (id, df_renglon, df_descrip, df_precio, df_cantidad, df_subtotal, df_cod_prod, df_fact_num, df_estado)values(default, '+fact_espacio.getVal()+', |{Flete}|, '+fact_flete.getVal()+', 1, '+fact_flete.getVal()+', 1, '+fact_nro.getVal()+',|{}|)'",
        F_NODB_ => "1",
        F_ORD_ => "163",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_flete.getVal()>0&&!fact_cflete.get()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_conf",
        F_ALIAS_ => "Cargar Confecciones",
        F_HELP_ => "Cargar Confecciones",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "163",
        F_INLINE_ => "1",
        C_VIEW_ => "operation==CHANGE_ && (fact_tipo.get()=='Contado' || fact_tipo.get()=='Credito') ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_espacio2",
        F_ALIAS_ => " ",
        F_HELP_ => "Cargar Flete",
        F_TYPE_ => "text",
        F_QUERY_REF_ => "fact_espacio.firstSQL",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "163",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_tipo.get()=='Credito'&&operation==CHANGE_&&!fact_cflete.get()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cconf",
        F_ALIAS_ => "Cargar Conf",
        F_HELP_ => "Cargar Conf",
        F_TYPE_ => "proc",
        F_QUERY_ => "'insert into det_factura (id, df_renglon, df_descrip, df_precio, df_cantidad, df_subtotal, df_cod_prod, df_fact_num, df_estado)values(default, '+fact_espacio.getVal()+', |{Confeccion}|, '+fact_conf.getVal()+', 1, '+fact_conf.getVal()+', 1, '+fact_nro.getVal()+',|{}|)'",
        F_NODB_ => "1",
        F_ORD_ => "163",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_conf.getVal()>0&&!fact_cconf.get()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_descuento",
        F_ALIAS_ => "Cargar Descuento Infonet",
        F_HELP_ => "Cierra esta factura",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT cargar_descuento('+fact_nro.getVal()+',20,'+fact_vend_cod.getStr()+');'",
        F_NODB_ => "1",
        F_ORD_ => "164",
        F_INLINE_ => "1",
        C_SHOW_ => "!fact_descuento.get()",
        C_VIEW_ => "fact_estado.get()=='En_caja'&&operation==CHANGE_&&fact_tipo.get()=='Credito'&&false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cargar_senia",
        F_ALIAS_ => "Cargar Seña",
        F_HELP_ => "Cierra Seña",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT cargar_senia('+fact_nro.getVal()+','+fact_vend_cod.getStr()+','+fact_senia.getVal()+');'",
        F_NODB_ => "1",
        F_ORD_ => "164",
        F_INLINE_ => "1",
        C_SHOW_ => "!fact_cargar_senia.get()",
        C_VIEW_ => "fact_estado.get()=='En_caja'&&operation==CHANGE_&&fact_senia.getVal()>0",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_desc",
        F_ALIAS_ => "Descuento",
        F_HELP_ => "Descuento",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT sum(df_subtotal) * -1 FROM det_factura WHERE df_cod_prod = 1001 AND df_fact_num = '+fact_nro.getVal()+''",
        F_QUERY_REF_ => "fact_tipo.hasChanged()&&fact_tipo.get()=='Credito'",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "166",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_borrar_desc",
        F_ALIAS_ => "Borrar Descuento",
        F_HELP_ => "Cierra esta factura",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select borrar_descuento('+fact_nro.getVal()+')'",
        F_ORD_ => "167",
        F_INLINE_ => "1",
        C_VIEW_ => "!fact_borrar_desc.get() && fact_tipo.get()=='Credito' &&  fact_desc.getVal()>0 ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_updt_total",
        F_ALIAS_ => "Actualiza totol de factura + flete",
        F_HELP_ => "Actualiza totol de factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update factura set fact_total = fact_total + '+fact_flete.getVal()+' where fact_nro = '+fact_nro.getVal()+''",
        F_QUERY_REF_ => "fact_cflete.get()&&fact_updt_total.firstSQL",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "168",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cflete.get()&&operation==CHANGE_",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_updt_totc",
        F_ALIAS_ => "Actualiza totol de factura + confeccion",
        F_HELP_ => "Actualiza totol de factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update factura set fact_total = fact_total + '+fact_conf.getVal()+' where fact_nro = '+fact_nro.getVal()+''",
        F_QUERY_REF_ => "fact_cconf.get()&&fact_updt_totc.firstSQL",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "169",
        C_SHOW_ => "fact_cconf.get()&&operation==CHANGE_",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "90",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "fact_cflete.get()||fact_cconf.get()",
        F_FORMULA_ => "'( ! ) Item agregado al detalle. Puede proceder a cargar detalle financiero...'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => " Moneda con que va a abonar",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_descri",
        F_REQUIRED_ => "1",
        F_ORD_ => "171",
        V_DEFAULT_ => "'G$'",
        C_VIEW_ => "fact_estado.get()=='En_caja'&&fact_tipo.get()=='Contado'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cotiz",
        F_ALIAS_ => "Cotizacion del dia",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+fact_moneda.getStr()+');'",
        F_QUERY_REF_ => "fact_moneda.hasChanged()&&fact_moneda.get()!=''",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_ORD_ => "172",
        F_INLINE_ => "1",
        C_VIEW_ => "fact_estado.get()=='En_caja'&&fact_tipo.get()=='Contado'",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_total_pagr",
        F_ALIAS_ => "Total a Pagar  (Gs)",
        F_HELP_ => "Importe total de la factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select CEIL(fact_total) from factura where fact_nro ='+fact_nro.getVal()",
        F_QUERY_REF_ => "fact_total_pagr.firstSQL||fact_updt_total.hasChanged()",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "173",
        C_VIEW_ => "operation==CHANGE_&&fact_tipo.get()=='Contado' ",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_res",
        F_ALIAS_ => "Ticket de Reserva",
        F_HELP_ => "Ticket de Reserva Nº",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "173",
        F_INLINE_ => "1",
        C_VIEW_ => "operation==CHANGE_ && (fact_tipo.get()=='Contado') ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_senia",
        F_ALIAS_ => "Seña",
        F_HELP_ => "Seña",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT  r_senia from reservas WHERE nro_res = '+fact_res.getVal()",
        F_QUERY_REF_ => "fact_res.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "173",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_res.getVal()>0",
        C_VIEW_ => "fact_res.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_total",
        F_ALIAS_ => "Total a Pagar",
        F_HELP_ => "Importe total de la factura",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "174",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_tipo.get()=='Contado'",
        C_VIEW_ => "fact_estado.get()=='En_caja'&&fact_cotiz.getVal()>1",
        F_FORMULA_ => "fact_total_pagr.getVal()/fact_cotiz.getVal()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_entrega",
        F_ALIAS_ => "Monto de Entraga",
        F_HELP_ => "Monto que Entraga el Cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "175",
        C_SHOW_ => "fact_tipo.get()=='Contado'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_vuelto",
        F_ALIAS_ => "Vuelto",
        F_HELP_ => "Vuelto",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "176",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_tipo.get()=='Contado'",
        F_FORMULA_ => "fact_entrega.getVal()-fact_total.getVal()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_det_pago",
        F_ALIAS_ => "Detalle de Pago",
        F_HELP_ => "Detalle de Pago",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'dp_fact_nro = '+fact_nro.getVal()",
        F_LINK_ => "db.fact_detalle_pg",
        F_SEND_ => "fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "177",
        C_SHOW_ => "fact_tipo.get()=='Credito'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_concepto",
        F_ALIAS_ => "Concepto",
        F_HELP_ => "Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cjc_cod from caja_con where cjc_descri like |{%'+fact_tipo.get()+'%}| '",
        F_QUERY_REF_ => "fact_tipo.hasChanged()",
        F_LENGTH_ => "5",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "178",
        C_SHOW_ => "fact_estado.get()=='En_caja'",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__cursor",
        F_ALIAS_ => " ",
        F_HELP_ => "Este campo es solamente para que el cursor se pare aqui",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "179",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_nro.firstSQL&&fact_nro.getVal()>0&&fact_ver_caja.get()=='Abierto'&&fact_estado.get()=='En_caja'&&fact_vuelto.getVal()>=0&&(fact_tipo.get()=='Contado' ||fact_tipo.get()=='Donacion')",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_imprimir",
        F_ALIAS_ => "Imprimir Presupuesto",
        F_HELP_ => "Imprime este Presupuesto",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.factura_cliente",
        F_NODB_ => "1",
        F_ORD_ => "181",
        C_SHOW_ => "(fact_estado.get()=='En_caja'||fact_estado.get()=='Cerrada')&&operation==CHANGE_  ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cont",
        F_ALIAS_ => "Nº Factura",
        F_HELP_ => "Nº Factura",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "fact_cont.firstSQL",
        F_RELTABLE_ => "fact_cont",
        F_SHOWFIELD_ => "f_nro,''",
        F_FILTER_ => "'f_estado = |{Disponible}| and f_suc = '+fact_localidad.getStr()+'  order by f_nro + 0 asc limit 20'",
        F_NODB_ => "1",
        F_ORD_ => "183",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_localidad.get()!='Undefined'",
        G_SHOW_ => "4",
        G_CHANGE_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "fact_parte",
        F_ALIAS_ => "Parte",
        F_HELP_ => "Parte",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "1,2,3,4,5,6,7,8,9,10",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "183",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'1'",
        C_SHOW_ => "fact_localidad.get()!='Undefined'&&fact_cont.get()!=''",
        G_SHOW_ => "4",
        G_CHANGE_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "fact_impr_cont",
        F_ALIAS_ => "Imprimir Factura",
        F_HELP_ => "Imprime en Factura",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fact_cont",
        F_NODB_ => "1",
        F_ORD_ => "184",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_estado.get()!='Abierta' && fact_cont.get()!=''  && operation==CHANGE_ && (fact_tipo.get()=='Contado' || fact_tipo.get()=='Credito')  ",
        G_SHOW_ => "4",
        G_CHANGE_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cerrar",
        F_ALIAS_ => "Cerrar venta",
        F_HELP_ => "Cierra esta factura",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT cerrar_venta('+fact_nro.getVal()+','+fact_localidad.getStr()+','+fact_moneda.getStr()+','+fact_cotiz.getVal()+','+fact_concepto.getVal()+' ,'+fact_tipo.getStr()+','+fact_conv.getVal()+','+fact_nro_orden.getStr()+','+fact_vuelto.getVal()+','+fact_entrega.getVal()+');'",
        F_ORD_ => "185",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cerrar.firstSQL&&fact_nro.firstSQL&&fact_nro.getVal()>0&&fact_ver_caja.get()=='Abierto'&&fact_estado.get()=='En_caja'&&fact_vuelto.getVal()>=0&&(fact_tipo.get()=='Contado' ||fact_tipo.get()=='Donacion')",
        C_VIEW_ => "!fact_cerrar.get() ||  (fact_moneda.get()!='G$'&&fact_cotiz.getVal()>1  )",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__goback",
        F_ALIAS_ => "Volver",
        F_HELP_ => "Volver",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "191",
        C_SHOW_ => "fact_cerrar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload();setTimeout('self.close()',100)",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_no_delete",
        F_ALIAS_ => "Desabilitar boton borrar",
        F_HELP_ => "Desabilitar boton borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "201",
        C_SHOW_ => "true //fact_estado.get()!='Abierta'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "211",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cconf.get()||fact_cflete.get()||fact_descuento.get()||fact_borrar_desc.get()||fact_cargar_senia.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',2500)",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "cuotas_vencidas_style",
        F_ALIAS_ => "Style CV",
        F_HELP_ => "Style CV",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{cuotas_vencidas}|).setAttribute(|{style}|,|{color:red;font-size:20px;border:none;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));


?>
