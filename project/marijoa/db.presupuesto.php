<?php
$Obj->name = "presupuesto";
$Obj->alias = "Presupuesto de Venta";
$Obj->help = "Presupuesto de Venta de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "factura";
$Obj->Filter = "";
$Obj->Sort = "fact_nro desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "'SELECT borrar_venta('+fact_nro.getVal()+'|{'+p_user_+'}|)'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "";
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
        F_OPTIONS_ => "DB",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select current_date'",
        F_QUERY_REF_ => "fact_fecha.firstSQL&&operation==CONSULT_&&fact_fecha.get()==''",
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
        F_TYPE_ => "formula",
        F_LENGTH_ => "15",
        F_ORD_ => "20",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "'80001404-9'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_iva",
        F_ALIAS_ => "I.V.A.",
        F_HELP_ => "I.V.A.",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_DEC_ => "1",
        F_ORD_ => "30",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "10",
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
        F_NAME_ => "style0",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(fact_diff.getVal()<0){document.getElementById(|{fact_diff}|).setAttribute(|{style}|,|{height:26px;color:red;font-size:18px;}|) }else{ document.getElementById(|{fact_diff}|).setAttribute(|{style}|,|{height:22px;color:black;font-size:12px;}|)  } ",
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
        F_NAME_ => "fact_turno",
        F_ALIAS_ => "Turno :",
        F_HELP_ => "Ingrese aqui el turno del cliente",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "fact_estado.get()=='Presup'",
        C_CHANGE_ => "fact_turno.get()==''&&operation==CONSULT_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_busc_cli",
        F_ALIAS_ => "Buscar Cliente :",
        F_HELP_ => "Busca Clientes (Ingrese C.I. o R.U.C. para nuevo Cliente)",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_SHOW_ => "fact_estado.get()=='Presup'",
        C_CHANGE_ => "operation==CONSULT_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cli_ci",
        F_ALIAS_ => "Nº C.I. o R.U.C.",
        F_HELP_ => "Nº Cédula o R.U.C. del cliente",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "fact_busc_cli.hasChanged()",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_ci,cli_fullname",
        F_FILTER_ => "'cli_fullname LIKE |{'+fact_busc_cli.get()+'%}|  or cli_ci LIKE |{'+fact_busc_cli.get()+'%}| ORDER BY cli_fullname asc LIMIT 30'  ",
        F_LENGTH_ => "14",
        F_REQUIRED_ => "1",
        F_ORD_ => "43",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cli_cat",
        F_ALIAS_ => "Cat.",
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
        F_ORD_ => "43",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'1'",
        C_CHANGE_ => "fact_cli_ci.hasChanged()&&fact_cli_ci.get()!=''",
        F_FORMULA_ => " ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_edit",
        F_ALIAS_ => "Editar Cliente",
        F_HELP_ => "Editar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "44",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cli_ci.get()!='1'&&fact_cli_ci.get()!=''",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nuevo_cli",
        F_ALIAS_ => "Nuevo Cliente",
        F_HELP_ => "Permite registrar un Nuevo Cliente",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cli_fullname LIKE |{'+fact_busc_cli.get()+'%}| '  ",
        F_LINK_ => "db.mnt_cli_insv",
        F_SEND_ => "el['fact_nro'].get()",
        F_NODB_ => "1",
        F_ORD_ => "48",
        F_INLINE_ => "1",
        C_SHOW_ => "el['fact_busc_cli'].get()!='' && el['fact_cli_ci'].get()==''",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nom_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Nombre completo del cliente",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cli_fullname, cli_cat from mnt_cli WHERE cli_ci ='+el['fact_cli_ci'].getStr()",
        F_QUERY_REF_ => "el['fact_cli_ci'].hasChanged()||fact_nom_cli.firstSQL",
        F_SHOWFIELD_ => " ",
        F_RELFIELD_ => " ",
        F_LOCALFIELD_ => " ",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_r0",
        F_ALIAS_ => " ",
        F_HELP_ => "Tipo de Vendedor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(db('func_tipo')=='Minorista'){0}else if(db('func_tipo')=='Confeccionista'){3}else if(db('func_tipo')=='Mayorista'){4}else if(db('func_tipo')=='*'){0}else{0}",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_r1",
        F_ALIAS_ => "<-->",
        F_HELP_ => "Tipo de Vendedor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(db('func_tipo')=='Minorista'){2}else if(db('func_tipo')=='Confeccionista'){3}else if(db('func_tipo')=='Mayorista'){5}else if(db('func_tipo')=='*'){7}else {0}",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_vend_cod",
        F_ALIAS_ => "Vendedor",
        F_HELP_ => "Código y nombre compledo del Vendedor",
        F_TYPE_ => "formula",
        F_LENGTH_ => "16",
        F_REQUIRED_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "fact_estado.get()=='Presup'",
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
        F_QUERY_ => "'select func_fullname, func_tipo from mnt_func where func_cod = '+fact_vend_cod.getStr()+' '",
        F_QUERY_REF_ => "func_nombre.firstSQL",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "operation==CONSULT_||operation==SHOW_",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_subfrm_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'cli_ci='+fact_cli_ci.getStr()+' '",
        F_LINK_ => "db.mnt_cli_vend",
        F_SEND_ => "fact_cli_ci.get()",
        F_NODB_ => "1",
        F_ORD_ => "76",
        C_SHOW_ => "fact_edit.get()=='Si'&&fact_cli_ci.get()!=''",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_sin_cod",
        F_ALIAS_ => "Tipo de Venta",
        F_HELP_ => "Seleccionar tipo de Venta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Normal",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "cambiar_cli",
        F_ALIAS_ => "Cambiar Cliente",
        F_HELP_ => "Cambiar Cliente",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT act_factura_det('+fact_nro.getVal()+','+fact_nom_cli.getStr()+','+fact_cli_cat.getVal()+','+fact_cli_ci.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "fact_cli_ci.get()!='1'&&operation==CONSULT_ &&fact_nom_cli.get()!='__NO DATA__'",
        C_VIEW_ => "!cambiar_cli.get()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_z_cuotas",
        F_ALIAS_ => "Cuotas Pendientes",
        F_HELP_ => "Cuotas Pendientes",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT FLOOR( SUM(ct_monto - ct_entrega) ) FROM cuotas WHERE ct_estado = |{Pendiente}| AND ct_deudor = '+fact_nom_cli.getStr()",
        F_QUERY_REF_ => "fact_nom_cli.hasChanged()||fact_z_cuotas.firstSQL&&fact_cli_ci.get()!='1'",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "fact_cli_ci.get()!='1' &&fact_nom_cli.get()!='__NO DATA__'&&fact_nom_cli.get()!='SIN NOMBRE'",
        C_VIEW_ => "fact_cli_ci.get()!='1'",
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
        F_ORD_ => "91",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cli_ci.get()!='1' &&fact_nom_cli.get()!='__NO DATA__'",
        C_VIEW_ => "fact_cli_ci.get()!='1'&&cambiar_cli.get()",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_diff",
        F_ALIAS_ => "Diferencia",
        F_HELP_ => "Monto que puede llevar a Credito",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "93",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_limite.getVal() > 0",
        C_VIEW_ => "fact_limite.getVal() > 0",
        F_FORMULA_ => "formatNumber((fact_limite.getVal() - fact_z_cuotas.getVal()),0,|{.}|,|{}|,|{}|,|{}|,|{-}|,|{}|) ",
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
        F_ORD_ => "96",
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
        F_ORD_ => "100",
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
        F_BROW_ => "1",
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
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT presupuesto_gen('+fact_iva.getStr()+','+ fact_emp_dir.getStr()+','+fact_emp_tel.getStr()+','+ fact_cli_ci.getStr()+','+ fact_cli_cat.get()+','+fact_nom_cli.getStr()+','+ fact_tipo.getStr()+','+ fact_fecha.getStr()+', '+fact_ruc.getStr()+' ,'+ fact_vend_cod.getStr()+' , '+func_nombre.getStr()+','+fact_localidad.getStr()+','+fact_nro_orden.getStr()+','+fact_turno.getVal()+');'",
        F_QUERY_REF_ => "fact_nro.firstSQL&&operation==CONSULT_&&fact_fecha.get()!=''&&func_nombre.get()!=''&&fact_turno.getVal()>0&&fact_turno.getVal()<104&&fact_cli_ci.get()!='1'&&cambiar_cli.get()&&(fact_cli_cat.getVal()>=fact_r0.getVal()&& fact_cli_cat.getVal() <=  fact_r1.getVal())",
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
        F_ALIAS_ => "Generar Presupuesto",
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
        F_OPTIONS_ => "'df_fact_num='+fact_nro.get()",
        F_LINK_ => "db.det_factura_ins",
        F_SEND_ => "fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "121",
        C_SHOW_ => "fact_nro.getVal()!=''&&func_nombre.get()!='__NO DATA__' ",
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
        F_OPTIONS_ => "Presup,Abierta",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "160",
        V_DEFAULT_ => "'Presup'",
        C_SHOW_ => "false",
        C_VIEW_ => "true",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_tipo",
        F_ALIAS_ => "Forma de Pago",
        F_HELP_ => "Tipo de Factura o Forma de pago",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Contado,Credito",
        F_LENGTH_ => "10",
        F_ORD_ => "162",
        C_VIEW_ => "operation==CHANGE_",
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
        F_ORD_ => "163",
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
        F_QUERY_REF_ => "(fact_moneda.hasChanged()||fact_cotiz.firstSQL)&&fact_moneda.get()!=''",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_ORD_ => "164",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
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
        F_ORD_ => "165",
        F_INLINE_ => "1",
        C_VIEW_ => "fact_cli_ci.get()!='1'&&openSubform||operation==SHOW_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_bcont",
        F_ALIAS_ => "Nº Factura Contable",
        F_HELP_ => "Buscar Factura Contable",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_ORD_ => "166",
        G_SHOW_ => "16777216",
        G_CHANGE_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cont",
        F_ALIAS_ => "Nº Factura",
        F_HELP_ => "Nº Factura",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "fact_bcont.hasChanged()",
        F_RELTABLE_ => "fact_cont",
        F_SHOWFIELD_ => "f_nro,''",
        F_FILTER_ => "'f_estado = |{Disponible}| and f_suc = '+fact_localidad.getStr()+' and f_nro like |{'+fact_bcont.get()+'%}|  order by f_nro + 0 asc  limit 30'",
        F_NODB_ => "1",
        F_ORD_ => "167",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_localidad.get()!='Undefined'",
        G_SHOW_ => "16777216",
        G_CHANGE_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "fact_parte",
        F_ALIAS_ => "Parte",
        F_HELP_ => "Parte",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "1,2,3,4,5,6,7,8,9,10",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "168",
        F_INLINE_ => "1",
        V_DEFAULT_ => "'1'",
        C_SHOW_ => "fact_localidad.get()!='Undefined'&&fact_cont.get()!=''",
        G_SHOW_ => "16777216",
        G_CHANGE_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "fact_impr_cont",
        F_ALIAS_ => "Imprimir Factura",
        F_HELP_ => "Imprime en Factura",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fact_cont",
        F_NODB_ => "1",
        F_ORD_ => "169",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cont.get()!=''",
        G_SHOW_ => "16777216",
        G_CHANGE_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "fact_conver",
        F_ALIAS_ => "Convertir en Factura",
        F_HELP_ => "Convertir en Factura",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "operation==CHANGE_&&fact_estado.get()=='Presup'",
        C_VIEW_ => "fact_estado.get()=='Presup'&&operation==CHANGE_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_finalizar",
        F_ALIAS_ => "Cerrar (Guardar Presupuesto)",
        F_HELP_ => "Cerrar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_VIEW_ => "openSubform",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cambiar_es",
        F_ALIAS_ => "Confirme Convertir este Presupuesto en Factura",
        F_HELP_ => "Cambiar estado de factura",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update factura set fact_estado = |{Abierta}|, fact_empaque = |{No}|, fact_fecha = current_date where fact_nro ='+fact_nro.getVal()+''",
        F_NODB_ => "1",
        F_ORD_ => "171",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&fact_estado.get()=='Presup'&&fact_conver.get()=='Si'&&!fact_cambiar_es.get()",
        C_VIEW_ => "fact_estado.get()=='Presup'&&operation==CHANGE_&&fact_conver.get()=='Si'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_impr_mat",
        F_ALIAS_ => "Imprimir Ticket",
        F_HELP_ => "Imprime este Presupuesto en formato Ticket",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fact_clie_mat",
        F_NODB_ => "1",
        F_ORD_ => "182",
        F_INLINE_ => "1",
        C_VIEW_ => "false//fact_cli_ci.get()!='1'&&openSubform",
        G_SHOW_ => "1",
        G_CHANGE_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "fact_close",
        F_ALIAS_ => "Self.close",
        F_HELP_ => "Self.close",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "201",
        C_SHOW_ => "fact_finalizar.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "self.close()",
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
        C_SHOW_ => "fact_estado.get()=='Abierta'&&operation==CHANGE_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "202",
        C_SHOW_ => "fact_cambiar_es.get()",
        F_FORMULA_ => "'( ! ) La Factura se encuentra entre sus Ventas Abiertas para ser Editada o Enviada a Caja'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "221",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

?>
