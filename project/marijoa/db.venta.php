<?php
$Obj->name = "venta";
$Obj->alias = "Venta de Productos";
$Obj->help = "Factura de Venta de Productos";
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
$Obj->NoInsert = "";
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
        F_FORMULA_ => "'80027779-1'",
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
        F_LENGTH_ => "8",
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        C_SHOW_ => "fact_empaque.get()=='No'&&fact_estado.get()=='Abierta'",
        C_CHANGE_ => "fact_turno.get()==''",
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
        C_SHOW_ => "fact_empaque.get()=='No'&&fact_estado.get()=='Abierta'",
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        C_SHOW_ => "fact_empaque.get()=='No'&&fact_estado.get()=='Abierta'",
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
        C_VIEW_ => "operation==CONSULT_",
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_sin_cod",
        F_ALIAS_ => "Tipo de Venta",
        F_HELP_ => "Seleccionar tipo de Venta",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Normal,Venta sin Codigo,Registrar Faltante",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "true",
        C_VIEW_ => "true",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "cambiar_cli",
        F_ALIAS_ => "Generar Venta",
        F_HELP_ => "Generar una nueva factura de Venta",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT act_factura_det('+fact_nro.getVal()+','+fact_nom_cli.getStr()+','+fact_cli_cat.getVal()+','+fact_cli_ci.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
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
        F_INLINE_ => "1",
        C_SHOW_ => "fact_cli_ci.get()!='1' &&fact_nom_cli.get()!='__NO DATA__'&&fact_nom_cli.get()!='SIN NOMBRE'",
        C_VIEW_ => "fact_cli_ci.get()!='1'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "messagebox",
        F_ALIAS_ => "Msj.:",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",        
        F_NODB_ => "1",
        F_ORD_ => "160",
		F_INLINE_ => "1",        
		C_SHOW_ => "true",
		C_VIEW_ => "true",
		C_CHANGE_ => "false",		
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

		
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
        F_QUERY_ => "'SELECT venta_gen('+fact_iva.getStr()+','+ fact_emp_dir.getStr()+','+fact_emp_tel.getStr()+','+ fact_cli_ci.getStr()+','+ fact_cli_cat.get()+',convert(cast(convert('+fact_nom_cli.getStr()+' using latin1) as binary) using utf8),'+ fact_tipo.getStr()+','+ fact_fecha.getStr()+', '+fact_ruc.getStr()+' ,'+ fact_vend_cod.getStr()+' , '+func_nombre.getStr()+','+fact_localidad.getStr()+','+fact_nro_orden.getStr()+','+fact_turno.getVal()+');'",
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
        F_NAME_ => "fact_no_cod",
        F_ALIAS_ => "Detalle de Factura (Sin Codigo)",
        F_HELP_ => "Detalle de Factura",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'df_fact_num='+fact_nro.get()",
        F_LINK_ => "db.det_factura_000",
        F_SEND_ => "el['fact_nro'].get()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "121",
        C_SHOW_ => "fact_nro.getVal()!=''&&func_nombre.get()!='__NO DATA__'&&fact_sin_cod.get()=='Venta sin Codigo'",
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
        F_SEND_ => "el['fact_nro'].get()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "121",
        C_SHOW_ => "fact_nro.getVal()!=''&&func_nombre.get()!='__NO DATA__'&&fact_sin_cod.get()=='Normal' && fact_aceptar.get()==''",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_faltante",
        F_ALIAS_ => "Detalle Registro de Faltante de Mercaderias",
        F_HELP_ => "Detalle Registro de Faltante de Mercaderias",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'fact_nro='+fact_nro.get()",
        F_LINK_ => "db.mnt_prod_falt",
        F_SEND_ => "fact_nro.get()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "121",
        C_SHOW_ => "fact_nro.getVal()!=''&&func_nombre.get()!='__NO DATA__'&&fact_sin_cod.get()=='Registrar Faltante'",
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
        F_NAME_ => "fact_finalizar",
        F_ALIAS_ => "Finalizar",
        F_HELP_ => "Finalizar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "156",
        C_SHOW_ => "fact_ver_caja.get()!='__NO DATA__'&&fact_gen_venta.get()=='Si'&&fact_aceptar.get()!='OK'||fact_nro.get()>0 && fact_estado.get()=='Abierta'&&cont_cred.get()!='Seleccione'",
        C_VIEW_ => "openSubform",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "cont_cred",
        F_ALIAS_ => "Medio de pago: ",
        F_HELP_ => "El cliente avonara al contado",
        F_TYPE_ => "select_list",      
		F_OPTIONS_ => "Seleccione,Tarjeta,Otro",
        F_NODB_ => "1",
        F_ORD_ => "157",
		F_INLINE_ => "1",
		V_DEFAULT_ => "'Seleccione'",
        C_SHOW_ => "fact_ver_caja.get()!='__NO DATA__'&&fact_gen_venta.get()=='Si'&&fact_aceptar.get()!='OK'||fact_nro.get()>0 && fact_estado.get()=='Abierta' ",
        C_VIEW_ => "openSubform",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cont_deta",
        F_ALIAS_ => "Cantidad de detalles",
        F_HELP_ => "Contar cantidad de detalles de esta factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(df_renglon) from det_factura where df_fact_num ='+fact_nro.getVal()",
        F_QUERY_REF_ => "(fact_finalizar.get()=='Si' && fact_finalizar.hasChanged()) ||operation==CHANGE_",
        F_LENGTH_ => "5",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "158",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cont_correct_deta",
        F_ALIAS_ => "cantidad de detalle con precio",
        F_HELP_ => "Cantidad de detalle con precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(if(df_precio=0,0,1)) as verif from det_factura where df_fact_num = '+fact_nro.getVal()",
        F_QUERY_REF_ => "(fact_finalizar.get()=='Si' && fact_finalizar.hasChanged())",
        F_LENGTH_ => "5",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "159",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_empaque",
        F_ALIAS_ => "Revisado por Empaque",
        F_HELP_ => "Revisado por Empaque",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "5",
        F_ORD_ => "160",
        C_VIEW_ => "fact_estado.get()=='Empaque'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));


$Obj->Add(
    array(
        F_NAME_ => "fact_mov_fact",
        F_ALIAS_ => "Confirmar (Revisado por Empaque)",
        F_HELP_ => "Confirmar (Revisado por Empaque)",
        F_TYPE_ => "proc",
        F_QUERY_ => "'UPDATE factura set fact_estado = |{En_caja}|, fact_empaque = |{Si}| WHERE fact_nro = '+fact_nro.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "161",
        C_SHOW_ => "(fact_empaque.get()=='Si'&&fact_estado.get()=='Empaque' )&&!fact_mov_fact.get() ",
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
        F_ORD_ => "162",
        V_DEFAULT_ => "'Abierta'",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cambiar_es",
        F_ALIAS_ => "Volver a Abrir esta Factura",
        F_HELP_ => "Cambiar estado de factura",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update factura set fact_estado = '+fact_estado.getStr()+', fact_empaque = |{No}| where fact_nro ='+fact_nro.getVal()+''",
        F_NODB_ => "1",
        F_ORD_ => "163",
        C_SHOW_ => "operation==CHANGE_&&fact_estado.get()=='Abierta'",
        C_VIEW_ => "fact_estado.get()=='Abierta'&&fact_empaque.get()=='Si' &&operation==CHANGE_",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_aceptar",
        F_ALIAS_ => "Confirmar",
        F_HELP_ => "Aceptar Enviar la Factura a Caja para ser Pagada",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT actualizar_factura('+fact_nro.getVal()+' ,'+ fact_vend_cod.getStr() +' ,'+ (cont_cred.get()=='Tarjeta'?0:1) +')' ",
        F_QUERY_REF_ => "fact_aceptar.firstSQL&&fact_finalizar.get()=='Si'&&cont_cred.get()!='Seleccione'",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "164",
        C_SHOW_ => "(fact_finalizar.get()=='Si'&&(fact_cont_deta.getVal()>0&&fact_cont_correct_deta.getVal()==fact_cont_deta.getVal()))&&fact_estado.get()=='Abierta'&&cont_cred.get()!='Seleccione'",
        C_VIEW_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_retorno",
        F_ALIAS_ => "Retorno del procedimiento",
        F_HELP_ => "Retorno del procedimiento actualizar factura",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "165",
        C_VIEW_ => "false",
        F_FORMULA_ => "fact_aceptar.get()",
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
        F_ORD_ => "166",
        V_DEFAULT_ => "' '",
        C_VIEW_ => "operation==CHANGE_&&fact_estado.get()=='En_caja'&&fact_empaque.get()=='Si'",
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
        F_ORD_ => "167",
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
        F_ORD_ => "168",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_total_pagr",
        F_ALIAS_ => "Total a Pagar  (Moneda de Referencia)",
        F_HELP_ => "Importe total de la factura",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_total from factura where fact_nro ='+fact_nro.getVal()",
        F_QUERY_REF_ => "fact_retorno.hasChanged()||fact_total_pagr.firstSQL&&fact_nro.getVal()>0",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "169",
        C_VIEW_ => "operation==CHANGE_&&fact_tipo.get()=='Contado' ",
        C_CHANGE_ => "false",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

$Obj->Add(
    array(
        F_NAME_ => "fact_total",
        F_ALIAS_ => "Total a Pagar (Otra moneda)",
        F_HELP_ => "Importe total de la factura",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "170",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_tipo.get()=='Contado'",
        C_VIEW_ => "fact_estado.get()=='En_caja'&&fact_empaque.get()=='Si'&&fact_cotiz.getVal()>1",
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
        F_ORD_ => "171",
        C_SHOW_ => "fact_tipo.get()=='Contado'&&fact_estado.get()=='En_caja'",
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
        F_ORD_ => "172",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_tipo.get()=='Contado'&&fact_estado.get()=='En_caja'",
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
        F_ORD_ => "173",
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
        C_SHOW_ => "fact_estado.get()=='En_caja'&&fact_empaque.get()=='Si'",
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
        C_VIEW_ => "fact_retorno.get()=='OK'",
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
        C_VIEW_ => "fact_retorno.get()=='OK'",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));

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
        C_SHOW_ => "fact_mov_fact.get()||fact_cerrar.get() ",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.opener.location.reload(); setTimeout('self.close()',100)",
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
        F_NAME_ => "fact_margen",
        F_ALIAS_ => "Margen de Ganancia",
        F_HELP_ => "Margen de Ganancia",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_ORD_ => "211",
        C_VIEW_ => "false",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));

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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msj",
        F_ALIAS_ => "Mensaje error detalle de factura",
        F_HELP_ => "Mensaje error detalle de factura",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "777",
        C_VIEW_ => "false",
		C_SHOW_ => "fact_cont_correct_deta.hasChanged()&&fact_cont_correct_deta.getVal()",
        F_FORMULA_ => "var msj=document.getElementById('messagebox'); if(fact_cont_correct_deta.getVal()!=fact_cont_deta.getVal()){setValue('messagebox','Existen codigos con precio 0!!');msj.style.fontWeight='900';msj.style.color='red';}else{setValue('messagebox','OK');msj.style.color='green';}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hideLimiteCredito",
        F_ALIAS_ => "Esconder limite de credito",
        F_HELP_ => "Esconder limite de credito",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "779",
        C_VIEW_ => "false",
		C_SHOW_ => "fact_busc_cli.get()!=''",
        F_FORMULA_ => "if(!(fact_limite.getVal()>0)){document.getElementById('fact_limite').hidden=true; document.getElementById('lbl_fact_limite').hidden=true;}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
