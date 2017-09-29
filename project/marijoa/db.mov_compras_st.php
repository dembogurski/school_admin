<?php
$Obj->name = "mov_compras_st";
$Obj->alias = "Compras Abiertas (Stock)";
$Obj->help = "Compras Abiertas (Stock)";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mov_compras";
$Obj->Filter = "";
$Obj->Sort = "c_fecha asc";
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
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_LENGTH_ => "2",
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
        C_CHANGE_ => "operation==INSERT_||(operation==CHANGE_&&c_estado.get()=='Abierta')",
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
        F_NAME_ => "c_conf_comb",
        F_ALIAS_ => "Combustible x Confeccion     ",
        F_HELP_ => "Combustible x Confeccion de Manteles",
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
        F_NAME_ => "c_mant_vehic",
        F_ALIAS_ => "Mant. Vehiculo x Confeccion",
        F_HELP_ => "Mantenimiento de Vehiculo x Confeccion",
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
        F_NAME_ => "c_conf_sueldos",
        F_ALIAS_ => "Sueldos x Confeccion         ",
        F_HELP_ => "Sueldos x Confeccion",
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
        F_NAME_ => "c_conf_frac",
        F_ALIAS_ => "Fracccionamientos x Confeccion",
        F_HELP_ => "Fracccionamientos x Confeccion",
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
        F_NAME_ => "c_conf_cost",
        F_ALIAS_ => "Costo x Confeccion",
        F_HELP_ => "Costo x Confeccion",
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
        F_FORMULA_ => "(( ( c_fi.getVal()+c_fn.getVal()+c_di.getVal()+c_iva.getVal()+c_fif.getVal()+c_seg.getVal()+c_fit.getVal()+c_comis_rem.getVal()+c_cp.getVal()+c_viatico.getVal()+c_manip.getVal()+c_comis_forw.getVal()+c_multas.getVal()+c_otros.getVal() + c_conf_comb.getVal() + c_mant_vehic.getVal() +  c_conf_sueldos.getVal() +c_conf_frac.getVal() + c_conf_cost.getVal() ) / c_valor_total.getVal()  )     * 100).toFixed(2)",
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
        F_ORD_ => "97",
        C_VIEW_ => "true",
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
        F_ORD_ => "98",
        C_SHOW_ => "(operation==INSERT_&&allValid&&c_tipo.get()!='')&&c_valor_total.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_gen",
        F_ALIAS_ => "Genera Compra",
        F_HELP_ => "Genera Compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cpr_genera('+el['c_ref'].getStr()+', '+el['c_empr'].getStr()+', '+el['c_fecha'].getStr()+', '+el['c_fechafac'].getStr()+', '+el['c_prov'].getStr()+', '+el['c_factura'].getStr()+', '+el['c_moneda'].getStr()+', '+el['c_cambio'].getStr()+','+c_tipo.getStr()+','+c_nac_int.getStr()+','+c_valor_total.getVal()+','+c_fi.getVal()+','+c_fn.getVal()+','+c_di.getVal()+','+c_otros.getVal()+','+c_sobre_costo.getVal()+','+c_valor_factl.getVal()+','+c_ant.getStr()+','+c_cta_ant.getStr()+','+c_iva.getVal()+','+c_fif.getVal()+','+c_seg.getVal()+','+c_fit.getVal()+','+c_comis_rem.getVal()+','+c_cp.getVal()+','+c_viatico.getVal()+','+c_manip.getVal()+','+c_comis_forw.getVal()+','+c_multas.getVal()+','+c_conf_comb.getVal()+','+c_mant_vehic.getVal()+','+c_conf_sueldos.getVal()+','+c_conf_frac.getVal()+','+c_conf_cost.getVal()+')'",
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
        F_OPTIONS_ => "Abierta,Controlada,En Finanzas",
        F_LENGTH_ => "15",
        F_BROW_ => "1",
        F_ORD_ => "105",
        C_SHOW_ => "operation!=INSERT_",
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
        F_ORD_ => "108",
        F_INLINE_ => "1",
        C_VIEW_ => "c_dev.get()=='*'",
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
        F_ORD_ => "108",
        F_INLINE_ => "1",
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
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "pack_type",
        F_ALIAS_ => "Tipo Salida",
        F_HELP_ => "Tipo Salida del Reporte de Diferencias",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Todos,Solo Incompletos,Diff Each/Ticket,Con Obs",
        F_NODB_ => "1",
        F_ORD_ => "109",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&(c_estado.get()=='Abierta' || c_estado.get()=='Controlada' )",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "packing_result",
        F_ALIAS_ => "Packing Diff",
        F_HELP_ => "Packing Diff",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.packing_result",
        F_NODB_ => "1",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&( c_estado.get()=='Abierta' || c_estado.get()=='Controlada' )",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "packing_res_mts",
        F_ALIAS_ => "Diferencia en Metros y Valores",
        F_HELP_ => "Diferencia en Metros y Valores",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.packing_res_mts",
        F_NODB_ => "1",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&(  c_estado.get()=='Controlada' )",
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
        F_ORD_ => "110",
        C_VIEW_ => "c_dev.get()=='*'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir_dev",
        F_ALIAS_ => "Imprimir Devoluciones",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.mov_compras_dev",
        F_NODB_ => "1",
        F_ORD_ => "111",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_",
        C_VIEW_ => "c_dev.get()=='*'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "subir_archivo",
        F_ALIAS_ => "      Precarga      ",
        F_HELP_ => "Subir Archivo (Cargar Lote)",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.precarga",
        F_NODB_ => "1",
        F_ORD_ => "114",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "subir_packing",
        F_ALIAS_ => "Subir Packing List",
        F_HELP_ => "Subir Packing List",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.upload_packing",
        F_NODB_ => "1",
        F_ORD_ => "114",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_limite",
        F_ALIAS_ => "Limite",
        F_HELP_ => "Limite Registros",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "114",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "packing_list",
        F_ALIAS_ => "Descarga (Packing List)",
        F_HELP_ => "Packing List",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.packing_list",
        F_NODB_ => "1",
        F_ORD_ => "114",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'&&c_limite.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "update_data",
        F_ALIAS_ => "Actualizar Datos",
        F_HELP_ => "Actualizacion de Datos de Productos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.update_data",
        F_NODB_ => "1",
        F_ORD_ => "114",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "frac_x_color",
        F_ALIAS_ => "Fraccionar x Colores",
        F_HELP_ => "Herramienta dinamica para Fraccionamiento por Color",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.frac_x_color",
        F_NODB_ => "1",
        F_ORD_ => "114",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "frac_x_fgt",
        F_ALIAS_ => "Fraccionar x FGT",
        F_HELP_ => "Herramienta dinamica para Fraccionamiento por Sector Grupo y Tipo",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.fracc_x_fgt",
        F_NODB_ => "1",
        F_ORD_ => "114",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "remitir",
        F_ALIAS_ => "Remitir",
        F_HELP_ => "Herramienta dinamica para Remitir Filtrando por Sector Grupo y Tipo",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.mov_comp_rem",
        F_NODB_ => "1",
        F_ORD_ => "114",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "recib_rollos",
        F_ALIAS_ => "Recepcion C/Laser",
        F_HELP_ => "Recepcion de Rollos para Impresion con Lector Laser",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.recib_laser",
        F_NODB_ => "1",
        F_ORD_ => "114",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_cant_trs",
        F_ALIAS_ => "Cantidad de Productos en Transito",
        F_HELP_ => "Cantidad de Productos en Transito",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT count(*) FROM mnt_prod WHERE p_ref = '+c_ref.getVal()+' and prod_fin_pieza = |{Tr}|'",
        F_QUERY_REF_ => "c_estado.hasChanged()||c_estado.get()=='En Finanzas'",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "114",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_type",
        F_ALIAS_ => "Tipo de Insercsion",
        F_HELP_ => "Con Devolucion o Descuento",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Nuevo,Clon",
        F_NODB_ => "1",
        F_ORD_ => "114",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_filtrar",
        F_ALIAS_ => "Filtrar x Codigo",
        F_HELP_ => "Filtrar x Codigo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Padre,Codigo",
        F_NODB_ => "1",
        F_ORD_ => "116",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_filter",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Aplicar Filtro: Ingrese un codigo y abra el detalle de factura",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "118",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_&&c_estado.get()=='Abierta'",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_filtro",
        F_ALIAS_ => " ",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "119",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(c_filtrar.get()=='Padre'){'p_padre'}else{'p_cod'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_compras_det",
        F_ALIAS_ => "Detalle de la Compra",
        F_HELP_ => "Detalle de la Compra",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'p_ref='+el['c_ref'].getStr()+' and '+c_filtro.get()+' like |{'+p_filter.get()+'}|'",
        F_LINK_ => "db.mnt_prod_view",
        F_SEND_ => "c_ref.get()",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        C_SHOW_ => "(operation==SHOW_||(el['c_estado'].get()=='Abierta'&&operation!=INSERT_) )&&c_valor_total.getVal()>0&&c_type.get()=='Nuevo'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_compras_detc",
        F_ALIAS_ => "Detalle de la Compra (Clonar)",
        F_HELP_ => "Detalle de la Compra",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'p_ref='+el['c_ref'].getStr()+' and p_padre = |{}| and p_cod like |{'+p_filter.get()+'%}|'",
        F_LINK_ => "db.mnt_prod_clon",
        F_SEND_ => "c_ref.get()",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_SHOW_ => "(operation==SHOW_||(el['c_estado'].get()=='Abierta'&&operation!=INSERT_) )&&c_valor_total.getVal()>0&&c_type.get()=='Clon'",
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
        F_ORD_ => "140",
        C_SHOW_ => "false",
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
        F_ORD_ => "150",
        C_VIEW_ => "c_dev.get()=='*'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_lib_ins",
        F_ALIAS_ => "Libera Insertar",
        F_HELP_ => "Libera Insertar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "160",
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
        F_ORD_ => "170",
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
        F_ORD_ => "180",
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
        F_ORD_ => "190",
        C_SHOW_ => "c_estado.get()=='Cerrada' ",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "ATENCION!",
        F_TYPE_ => "formula",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_SHOW_ => "c_estado.get()=='Cerrada' || (c_estado.get()=='En Finanzas' && c_cant_trs.getVal()>0 )",
        C_VIEW_ => "true",
        F_FORMULA_ => "'ATENCION! '+c_cant_trs.getVal()+' Productos estan En Transito, Liberelos antes de pasar a Finanzas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_bloq_ins",
        F_ALIAS_ => "Bloquea Insertar",
        F_HELP_ => "Bloquea Insertar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "operation==INSERT_ || (operation==CHANGE_ && c_estado.get()=='En Finanzas' && c_cant_trs.getVal()>0 )",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_lib_tr",
        F_ALIAS_ => "Liberar Productos a la Venta",
        F_HELP_ => "Liberar Productos a la Venta",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set prod_fin_pieza = |{No}| where p_ref = '+c_ref.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_SHOW_ => "c_cant_trs.getVal()>0 && c_estado.get()=='En Finanzas'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
