<?php
$Obj->name = "devoluciones";
$Obj->alias = "Detalle de Devoluciones";
$Obj->help = "Devoluciones de productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "devoluciones";
$Obj->Filter = "";
$Obj->Sort = "dv_hoy desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "_user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Usuario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "6",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_sentinela",
        F_ALIAS_ => "Sentinela Venta || devolucion usado como ref sup en subforms",
        F_HELP_ => "Sentinela",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "8",
        V_DEFAULT_ => "'Devolucion'",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ref_caja",
        F_ALIAS_ => "Caja",
        F_HELP_ => "Verificar si caja esta Abierto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cj_ref from caja where  cj_empr = '+__local.getStr()+' and cj_estado = |{Abierto}| limit 1'",
        F_QUERY_REF_ => "__local.get()!=''&&ref_caja.firstSQL",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_ORD_ => "9",
        C_SHOW_ => "__local.get()!=''",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_POSVAL_ => "ref_caja.get()!='__NO DATA__'",
        F_MESSAGE_ => "'No hay caja Abierta para esta Fecha!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dev_nro",
        F_ALIAS_ => "Nro:",
        F_HELP_ => "Nro:",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dv_hoy",
        F_ALIAS_ => " ",
        F_HELP_ => "Fecha de Hoy",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_comp",
        F_ALIAS_ => "Tipo Comprobante",
        F_HELP_ => "Tipo Comprobante",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Ticket Interno,Factura Legal",
        F_NODB_ => "1",
        F_ORD_ => "12",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_legal",
        F_ALIAS_ => "Factura Legal Nº",
        F_HELP_ => "Factura Legal Nº",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_VIEW_ => "tipo_comp.get()=='Factura Legal'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "factura",
        F_ALIAS_ => "Nº de Ticket",
        F_HELP_ => "Nº de Ticket o Boleta interna",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT f_ref FROM fact_cont  WHERE f_suc = '+__local.getStr()+' AND f_nro = '+fact_legal.getVal()+' ORDER BY id DESC LIMIT 1 '",
        F_QUERY_REF_ => "fact_legal.hasChanged()",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "14",
        C_CHANGE_ => "tipo_comp.get()=='Ticket Interno'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_cli",
        F_ALIAS_ => "Buscar Cliente",
        F_HELP_ => "Buscar Cliente Ingrese el código o el nombre",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT fact_nom_cli from factura WHERE fact_nro = '+factura.getStr()+' LIMIT 1 '",
        F_QUERY_REF_ => "factura.hasChanged()",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dv_cli",
        F_ALIAS_ => "Cliente",
        F_HELP_ => "Cliente",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_cli.hasChanged()",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_cli",
        F_SHOWFIELD_ => "cli_ci,cli_fullname",
        F_FILTER_ => "'cli_fullname like |{'+busc_cli.get()+'%}| order by cli_fullname limit 20'",
        F_ORD_ => "20",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dv_nomcli",
        F_ALIAS_ => "Nombre de cliente",
        F_HELP_ => "Nombre de cliente",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cli_fullname from mnt_cli where cli_ci = '+dv_cli.getStr()+' limit 1'",
        F_QUERY_REF_ => "dv_cli.hasChanged()||dv_nomcli.firstSQL",
        F_LOCALFIELD_ => "dv_cli",
        F_LENGTH_ => "35",
        F_BROW_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cli_cat",
        F_ALIAS_ => "Categoría",
        F_HELP_ => "Categoría del Cliente",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select cli_cat from mnt_cli where cli_ci = '+dv_cli.getStr()+' limit 1'",
        F_QUERY_REF_ => "dv_cli.hasChanged()||cli_cat.firstSQL",
        F_LOCALFIELD_ => "dv_cli",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "24",
        F_INLINE_ => "1",
        C_SHOW_ => "dv_cli.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "diffdate",
        F_ALIAS_ => "Diferencia de Fecha en Dias",
        F_HELP_ => "Diferencia de Fecha en Dias",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT datediff(now(),fact_fecha )  FROM factura WHERE fact_nro = '+fact_nro.getVal()+' '",
        F_QUERY_REF_ => "fact_nro.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "24",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_nro.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dv_fecha_fact",
        F_ALIAS_ => "Rango (Fecha Factura) ",
        F_HELP_ => "Fecha Factura (Entre esta fecha y hoy)",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "'01-01-2013'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hasta",
        F_ALIAS_ => "Hasta",
        F_HELP_ => "Hasta",
        F_TYPE_ => "date",
        F_NODB_ => "1",
        F_ORD_ => "34",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nro",
        F_ALIAS_ => "Nº Facturas - Fecha de Compra",
        F_HELP_ => "Nº Facturas - Fecha de Compra",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "dv_fecha_fact.hasChanged() || dv_cli.hasChanged() || factura.hasChanged()",
        F_RELTABLE_ => "factura",
        F_SHOWFIELD_ => "fact_nro,concat(date_format(fact_fecha,|{%d-%m-%Y}|), |{       }|,fact_nom_cli)",
        F_FILTER_ => "' fact_fecha between |{'+dv_fecha_fact.getYear()+'-'+dv_fecha_fact.getMonth()+'-'+dv_fecha_fact.getDay()+'}|  and |{'+hasta.getYear()+'-'+hasta.getMonth()+'-'+hasta.getDay()+'}|  and fact_cli_ci like '+dv_cli.getStr()+' and fact_estado = |{Cerrada}| or (fact_nro = '+factura.getVal()+') order by fact_fecha desc limit 40' ",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "45",
        C_SHOW_ => "dv_cli.get()!='' || factura.get()!=''",
        C_CHANGE_ => "dv_cli.hasChanged()||dv_fecha_fact.hasChanged() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Devolucion",
        F_HELP_ => "Elija el Tipo de Solicitud",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Directa,Con Registro Anterior",
        F_NODB_ => "1",
        F_ORD_ => "46",
        C_SHOW_ => "fact_nro.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "reg_devol",
        F_ALIAS_ => "Solicitudes de Devolucion",
        F_HELP_ => "Solicitudes de Devolucion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT count(*),estado,date_format(fecha_venc,|{%d-%m-%Y}|) as VENC FROM reg_pedido_dev WHERE factura = '+fact_nro.getVal()+' GROUP BY estado ASC '",
        F_QUERY_REF_ => "(tipo.hasChanged()&&tipo.get()=='Con Registro Anterior')||(tipo.get()=='Con Registro Anterior')",
        F_LENGTH_ => "4",
        F_ORD_ => "47",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_nro.get()!=''",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado_r",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "48",
        F_INLINE_ => "1",
        C_SHOW_ => "reg_devol.getVal()>0&&tipo.get()=='Con Registro Anterior'",
        F_FORMULA_ => "db('estado')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_venc",
        F_ALIAS_ => "Fecha Venc.",
        F_HELP_ => "Fecha Venc.",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "48",
        F_INLINE_ => "1",
        C_SHOW_ => "reg_devol.getVal()>0&&tipo.get()=='Con Registro Anterior'",
        F_FORMULA_ => "db('VENC')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgLock1",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "48",
        C_SHOW_ => "diffdate.getVal()>1&&tipo.get()=='Directa'",
        F_FORMULA_ => "'( ! ) No se permiten Devoluciones directas por Ventas mayores a 1 dia!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgLock2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "90",
        F_NODB_ => "1",
        F_ORD_ => "48",
        C_SHOW_ => "reg_devol.getVal()<1&&tipo.get()=='Con Registro Anterior'",
        F_FORMULA_ => "'No se ha encontrado ningun registro de solicitud de devolucion para este Nº de Factura!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgLock3",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "76",
        F_NODB_ => "1",
        F_ORD_ => "48",
        C_SHOW_ => "reg_devol.getVal()>0&&tipo.get()=='Con Registro Anterior'&&estado_r.get()=='Expirado'",
        F_FORMULA_ => "'El registro de solicitud ha expirado en la fecha '+fecha_venc.getStr()+' '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "State",
        F_HELP_ => "State",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "49",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(diffdate.getVal()<2&&tipo.get()=='Directa'){true}else if(estado_r.get()=='Pendiente'&&reg_devol.getVal()>0&&tipo.get()=='Con Registro Anterior'){ true}else{false}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dv_det_fact",
        F_ALIAS_ => "Detalle de factura",
        F_HELP_ => "Detalle de factura",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'df_fact_num = '+fact_nro.get()",
        F_LINK_ => "db.det_fact_noedit",
        F_SEND_ => "fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod_prod",
        F_ALIAS_ => "Código del Producto a Devolver",
        F_HELP_ => "Código del Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_ORD_ => "52",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_vendida",
        F_ALIAS_ => "Cantidad Vendida",
        F_HELP_ => "Cantidad Vendida",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select df_cantidad from det_factura where df_cod_prod = '+cod_prod.getVal()+' and df_fact_num = '+fact_nro.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "53",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "precio",
        F_ALIAS_ => "Precio",
        F_HELP_ => "Precio del Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  df_precio from det_factura where df_cod_prod = '+cod_prod.getVal()+' and df_fact_num = '+fact_nro.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "16",
        F_ORD_ => "54",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sub_tot",
        F_ALIAS_ => "Valor",
        F_HELP_ => "Valor",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select df_subtotal from det_factura where df_fact_num = '+fact_nro.getVal()+' and df_cod_prod = '+cod_prod.getVal()",
        F_QUERY_REF_ => "cod_prod.hasChanged()",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "55",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgLock4",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "70",
        F_NODB_ => "1",
        F_ORD_ => "55",
        C_SHOW_ => "cant_vendida.getVal()<10&&cod_prod.getVal()>0",
        F_FORMULA_ => "'Cantidad < 10 Metros Solo se permitida la devolucion por Fallas!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_dev",
        F_ALIAS_ => "Cantidad a Devolver",
        F_HELP_ => "Cantidad a Devolver",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "56",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_dev",
        F_ALIAS_ => "Valor de Rembolso",
        F_HELP_ => "Valor que se le debe devolver al cliente",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "57",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        F_FORMULA_ => "precio.getVal() * cant_dev.getVal() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "motivo",
        F_ALIAS_ => "Motivo",
        F_HELP_ => "Motivo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Falla Total,Falla Parcial,Otro",
        F_ORD_ => "57",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "forma",
        F_ALIAS_ => "Forma de devolucion",
        F_HELP_ => "Forma Entrega de devolucion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Efectivo",
        F_ORD_ => "58",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_valid",
        F_ALIAS_ => "¿Cargar el producto Devuelto al stock?",
        F_HELP_ => "¿Cargar el producto Devuelto al stock?",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si",
        F_ORD_ => "59",
        F_INLINE_ => "1",
        C_SHOW_ => "fact_nro.get()!=''&&estado.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ef_conf",
        F_ALIAS_ => "Devolver",
        F_HELP_ => "Devolver",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Si",
        F_NODB_ => "1",
        F_ORD_ => "59",
        C_SHOW_ => "(forma.get()=='Efectivo'||forma.get()=='Nota Credito') && monto_dev.getVal()>0&&operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_mov_caja",
        F_ALIAS_ => "Generar Movimiento de Caja",
        F_HELP_ => "Generar Movimiento de Caja",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_NODB_ => "1",
        F_ORD_ => "59",
        F_INLINE_ => "1",
        C_SHOW_ => "(forma.get()=='Efectivo'||forma.get()=='Nota Credito') && monto_dev.getVal()>0&&operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dev_efec",
        F_ALIAS_ => "Proceder con la Devolucion",
        F_HELP_ => "Devolver en Efectivo",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select dev_prod_caja('+cod_prod.getVal()+','+cant_dev.getVal()+','+__local.getStr()+','+monto_dev.getVal()+' ,'+ref_caja.getVal()+','+_user.getStr()+',|{Si}|,'+fact_nro.getVal()+','+gen_mov_caja.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_SHOW_ => "cant_dev.getVal()<=cant_vendida.getVal()&&fact_nro.get()!=''&&estado.get()",
        C_VIEW_ => "monto_dev.getVal()>0&&operation==INSERT_&&ef_conf.get()=='Si'&&!dev_efec.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__makeInsert",
        F_ALIAS_ => "Fuerza el insert",
        F_HELP_ => "Fuerza el insert",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "dev_efec.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "forceInsert()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_SHOW_ => "(cant_dev.getVal()>cant_vendida.getVal())&&cant_vendida.getVal()>0",
        F_FORMULA_ => "'( ! )  Cantidad a devolver supera la cantidad vendida!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style1",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_SHOW_ => "diffdate.getVal()>1&&tipo.get()=='Directa'",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msgLock1}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style2",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_SHOW_ => "reg_devol.getVal()<1&&tipo.get()=='Con Registro Anterior'",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msgLock2}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style3",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_SHOW_ => "reg_devol.getVal()>0&&tipo.get()=='Con Registro Anterior'&&estado_r.get()=='Expirado'",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msgLock3}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style4",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_SHOW_ => "cant_vendida.getVal()<10&&cod_prod.getVal()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msgLock4}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
