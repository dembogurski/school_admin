<?php
$Obj->name = "mov_compras";
$Obj->alias = "Compras";
$Obj->help = "Movimento de Compras";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mov_compras";
$Obj->Filter = "";
$Obj->Sort = "c_fecha desc";
$Obj->p_insert = "";
$Obj->p_change = "'UPDATE mnt_prod p, adm_param c SET p_porc_recargo = '+c_sobre_costo.getVal()+', p_valmin = CEILING(p_compra/c.p_margen) + CEILING((p_compra*p_porc_recargo / 100)) WHERE p.p_ref = '+c_ref.getVal()";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "c_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia ",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "6",
        F_ORD_ => "10",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_bloq_ins",
        F_ALIAS_ => "Bloquea Insertar",
        F_HELP_ => "Bloquea Insertar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "12",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_nombre",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "15",
        V_DEFAULT_ => "'00'",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_busc",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_NODB_ => "1",
        F_ORD_ => "16",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor de los productos",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "c_busc.hasChanged()",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_cod,prov_nombre",
        F_FILTER_ => "'prov_nombre like |{'+c_busc.get()+'%}| ORDER BY prov_nombre'",
        F_LENGTH_ => "5",
        F_REQUIRED_ => "1",
        F_ORD_ => "18",
        F_INLINE_ => "1",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fecha",
        F_ALIAS_ => "Fecha actual",
        F_HELP_ => "Fecha actual",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_REQUIRED_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fechafac",
        F_ALIAS_ => "Fecha Factura",
        F_HELP_ => "Fecha Compra (Factura)",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "operation!=SHOW_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_caja",
        F_ALIAS_ => "Le caja",
        F_HELP_ => "Le caja de la BD",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cj_ref FROM caja WHERE  cj_empr='+el['c_empr'].getStr()+' AND cj_estado=|{Abierto}|'",
        F_QUERY_REF_ => "el['c_empr'].hasChanged||el['c_fecha'].hasChanged()||el['c_caja'].firstSQL",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        F_POSVAL_ => "el['c_caja'].get()!='__NO DATA__'",
        F_MESSAGE_ => "'No Hay Caja Abierto para esa Fecha!!! '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_n_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor - Nombre",
        F_TYPE_ => "text",
        F_RELATION_ => "1",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_nombre",
        F_RELFIELD_ => "prov_cod",
        F_LOCALFIELD_ => "c_prov",
        F_LENGTH_ => "60",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_c_fact",
        F_ALIAS_ => "Con Factura",
        F_HELP_ => "Con Factura",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_NODB_ => "1",
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_factura",
        F_ALIAS_ => "Factura",
        F_HELP_ => "Factura de compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(|{N/A}|)'",
        F_QUERY_REF_ => "c_c_fact.get()=='No'&&c_factura.firstSQL",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_CHANGE_ => "c_c_fact.get()!='No'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_c_int",
        F_ALIAS_ => "Con Interno",
        F_HELP_ => "Con Interno",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Si,No",
        F_NODB_ => "1",
        F_ORD_ => "72",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_interno",
        F_ALIAS_ => "Interno",
        F_HELP_ => "Número Interno",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(|{N/A}|)'",
        F_QUERY_REF_ => "c_c_int.get()=='No'&&c_interno.firstSQL",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "73",
        F_INLINE_ => "1",
        C_CHANGE_ => "c_c_int.get()!='No'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda utilizada para la compra",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_descri",
        F_LENGTH_ => "10",
        F_REQUIRED_ => "1",
        F_ORD_ => "75",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cambio",
        F_ALIAS_ => "Cambio",
        F_HELP_ => "Cambio del día",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+c_moneda.getStr()+');'",
        F_QUERY_REF_ => "c_moneda.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_ORD_ => "78",
        F_INLINE_ => "1",
        C_SHOW_ => "el['c_moneda'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cambio_merc",
        F_ALIAS_ => "Cambio Mercado",
        F_HELP_ => "Cambio Mercado",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_ORD_ => "78",
        F_INLINE_ => "1",
        C_SHOW_ => "el['c_moneda'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_nac_int",
        F_ALIAS_ => "Tipo de compra",
        F_HELP_ => "Tipo de compra",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Nacional,Internacional",
        F_BROW_ => "1",
        F_ORD_ => "78",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_ant",
        F_ALIAS_ => "Con Anticipo",
        F_HELP_ => "Con Pago Adelantado o Giro por Adelantado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "78",
        F_INLINE_ => "1",
        C_VIEW_ => "c_nac_int.get()=='Internacional'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cta_ant",
        F_ALIAS_ => "Destino de Anticipo",
        F_HELP_ => "Destino de Anticipo",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "plan_cuentas",
        F_SHOWFIELD_ => "c_cod,c_descrip",
        F_FILTER_ => "'c_int like |{1.01.15.01}|'",
        F_NODB_ => "1",
        F_ORD_ => "78",
        F_INLINE_ => "1",
        C_VIEW_ => "c_nac_int.get()=='Internacional'&&c_ant.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_valor_factl",
        F_ALIAS_ => "    Valor Factura Legal           ",
        F_HELP_ => "Valor Factura Legal",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_ORD_ => "79",
        F_INLINE_ => "1",
        C_VIEW_ => "c_c_fact.get()!='No'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_desglosar",
        F_ALIAS_ => "Desglosar Gastos",
        F_HELP_ => "Desglosar Gastos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "79",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fi",
        F_ALIAS_ => "Flete Internacional Maritimo",
        F_HELP_ => "Flete Internacional Maritimo",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "80",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_iva",
        F_ALIAS_ => "I.V.A.                               ",
        F_HELP_ => "I.V.A. Impuesto al Valor Agregado",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "81",
        F_INLINE_ => "1",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fif",
        F_ALIAS_ => "Flete Internacional Fluvial",
        F_HELP_ => "Flete Internacional Fluvial",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "82",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_seg",
        F_ALIAS_ => "Seguro                             ",
        F_HELP_ => "Seguro contra Riesgos",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "83",
        F_INLINE_ => "1",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fit",
        F_ALIAS_ => "Flete Internacional Terrestre",
        F_HELP_ => "Flete Internacional Terrestre",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "84",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_comis_rem",
        F_ALIAS_ => "Comision sobre Remesas ",
        F_HELP_ => "Comision sobre Remesas",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "85",
        F_INLINE_ => "1",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fn",
        F_ALIAS_ => "Flete Nacional Terrestre",
        F_HELP_ => "Flete Nacional Terrestre",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "86",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_di",
        F_ALIAS_ => "Despacho de Importacion",
        F_HELP_ => "Despacho de Importacion",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "87",
        F_INLINE_ => "1",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cp",
        F_ALIAS_ => "Cargos Portuarios en Origen",
        F_HELP_ => "Cargos Portuarios en Origen",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "88",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_viatico",
        F_ALIAS_ => "Viatico Transportadora    ",
        F_HELP_ => "Viatico Transportadora",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "89",
        F_INLINE_ => "1",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_manip",
        F_ALIAS_ => "Manipuleo de CNTR",
        F_HELP_ => "Manipuleo de CNTR",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "90",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_comis_forw",
        F_ALIAS_ => "Comision Forwarder         ",
        F_HELP_ => "Comision Forwarder",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "91",
        F_INLINE_ => "1",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_multas",
        F_ALIAS_ => "Multas en Aduanas",
        F_HELP_ => "Multas en Aduanas",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "92",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_tipo",
        F_ALIAS_ => "Forma de Pago",
        F_HELP_ => "Tipo de Factura o Forma de pago",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Contado,Credito",
        F_LENGTH_ => "10",
        F_REQUIRED_ => "1",
        F_ORD_ => "92",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_otros",
        F_ALIAS_ => "Otros                                ",
        F_HELP_ => "Otros gastos ",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "93",
        F_INLINE_ => "1",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_valor_total",
        F_ALIAS_ => "Valor Total",
        F_HELP_ => "Valor Total",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "94",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_aut_gen",
        F_ALIAS_ => "Genera Compra",
        F_HELP_ => "autoriza generación de compra",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "95",
        C_SHOW_ => "(operation==INSERT_&&allValid&&c_tipo.get()!='')&&c_valor_total.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_sobre_costo",
        F_ALIAS_ => "Sobre Costo",
        F_HELP_ => "% de Recargo de mercaderia",
        F_TYPE_ => "formula",
        F_LENGTH_ => "7",
        F_DEC_ => "2",
        F_ORD_ => "96",
        F_INLINE_ => "1",
        C_VIEW_ => "c_desglosar.get()=='Si'",
        C_CHANGE_ => "c_fi.hasChanged()||c_fn.hasChanged()||c_di.hasChanged()||c_otros.hasChanged()||c_valor_total.hasChanged()",
        F_FORMULA_ => "(( ( c_fi.getVal()+c_fn.getVal()+c_di.getVal()+c_iva.getVal()+c_fif.getVal()+c_seg.getVal()+c_fit.getVal()+c_comis_rem.getVal()+c_cp.getVal()+c_viatico.getVal()+c_manip.getVal()+c_comis_forw.getVal()+c_multas.getVal()+c_otros.getVal() ) / c_valor_total.getVal()  )     * 100).toFixed(2)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_gen",
        F_ALIAS_ => "Genera Compra",
        F_HELP_ => "Genera Compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cpr_genera('+el['c_ref'].getStr()+', '+el['c_empr'].getStr()+', '+el['c_fecha'].getStr()+', '+el['c_fechafac'].getStr()+', '+el['c_prov'].getStr()+', '+el['c_factura'].getStr()+', '+el['c_moneda'].getStr()+', '+el['c_cambio'].getStr()+','+c_tipo.getStr()+','+c_nac_int.getStr()+','+c_valor_total.getVal()+','+c_fi.getVal()+','+c_fn.getVal()+','+c_di.getVal()+','+c_otros.getVal()+','+c_sobre_costo.getVal()+','+c_valor_factl.getVal()+','+c_ant.getStr()+','+c_cta_ant.getStr()+','+c_iva.getVal()+','+c_fif.getVal()+','+c_seg.getVal()+','+c_fit.getVal()+','+c_comis_rem.getVal()+','+c_cp.getVal()+','+c_viatico.getVal()+','+c_manip.getVal()+','+c_comis_forw.getVal()+','+c_multas.getVal()+' )'",
        F_QUERY_REF_ => "el['c_aut_gen'].get()=='Si'&&el['c_gen'].firstSQL",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "99",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_change",
        F_ALIAS_ => "Prepara para alteración",
        F_HELP_ => "Prepara para aleración",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "el['c_gen'].get()==1",
        C_VIEW_ => "false",
        F_FORMULA_ => "operation=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado de la compra",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,Controlada,En Finanzas,Cerrada",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "105",
        C_SHOW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_fecha_cierre",
        F_ALIAS_ => "Fecha de Cierre",
        F_HELP_ => "Fecha de Cierre",
        F_TYPE_ => "date",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT DATE_FORMAT(CURRENT_DATE,|{%d-%m-%Y}|)'",
        F_QUERY_REF_ => "c_fecha_cierre.firstSQL",
        F_ORD_ => "106",
        F_INLINE_ => "1",
        C_VIEW_ => "c_estado.get()=='Cerrada'&&operation==CHANGE_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_dev",
        F_ALIAS_ => "Devolucion o Descuento",
        F_HELP_ => "Con Devolucion o Descuento",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",*",
        F_BROW_ => "1",
        F_ORD_ => "107",
        F_INLINE_ => "1",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_descuento",
        F_ALIAS_ => "Descuento",
        F_HELP_ => "Descuento",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_ORD_ => "107",
        F_INLINE_ => "1",
        C_VIEW_ => "c_dev.get()=='*'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_obs",
        F_ALIAS_ => "Observaciones",
        F_HELP_ => "Observaciones",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "108",
        C_VIEW_ => "c_dev.get()=='*'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimirp",
        F_ALIAS_ => "Imprimir Factura (Solo Padres)",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fact_comprap",
        F_NODB_ => "1",
        F_ORD_ => "108",
        F_INLINE_ => "1",
        C_VIEW_ => "operation==CHANGE_||c_estado.get()=='Cerrada'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir",
        F_ALIAS_ => "Imprimir Factura",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fact_compra",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "operation==CHANGE_||c_estado.get()=='Cerrada'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_compras_det",
        F_ALIAS_ => "Detalle de la Compra",
        F_HELP_ => "Detalle de la Compra",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'p_ref='+el['c_ref'].getStr()+' and p_padre = |{}|'",
        F_LINK_ => "db.mnt_prod_view",
        F_SEND_ => "c_ref.get()",
        F_NODB_ => "1",
        F_ORD_ => "115",
        C_SHOW_ => "(operation==SHOW_||(el['c_estado'].get()=='Abierta'&&operation!=INSERT_) )&&c_valor_total.getVal()>0 ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_pagos_det",
        F_ALIAS_ => "Detalle Financiero de compra",
        F_HELP_ => "Detalle Financiero de compra",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'dp_fact_nro='+c_ref.getVal()",
        F_LINK_ => "db.compra_det_pago",
        F_SEND_ => "c_ref.get()",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "c_tipo.get()!=''&&operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_devoluciones",
        F_ALIAS_ => "Devoluciones",
        F_HELP_ => "Devoluciones",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'c_ref='+c_ref.getVal()",
        F_LINK_ => "db.mov_compras_dev",
        F_SEND_ => "c_ref.get()",
        F_NODB_ => "1",
        F_ORD_ => "125",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_lib_ins",
        F_ALIAS_ => "Libera Insertar",
        F_HELP_ => "Libera Insertar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_SHOW_ => "operation!=INSERT_&&el['c_aut_gen'].get()!='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "monto_abonado",
        F_ALIAS_ => "Monto Abonado",
        F_HELP_ => "Monto Abonado",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "150",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_SHOW_ => "c_estado.get()=='Cerrada'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableChange",
        F_ALIAS_ => "Inhabilita boton de Modificar",
        F_HELP_ => "Inhabilita boton de Modificar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "c_estado.get()=='Cerrada'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__enableChange",
        F_ALIAS_ => "Enable Change",
        F_HELP_ => "Enable Change",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_SHOW_ => " p_user_=='Developer' || p_user_=='Jorge' || p_user_=='arnaldoaquino' || p_user_=='belens'  && operation!=INSERT_",
        C_VIEW_ => "false",
        F_FORMULA_ => "enableChangeButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
