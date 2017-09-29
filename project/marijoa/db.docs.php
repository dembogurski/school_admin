<?php
$Obj->name = "docs";
$Obj->alias = "Documentos Legales";
$Obj->help = "Documentos Legales";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "docs";
$Obj->Filter = "";
$Obj->Sort = "fecha desc, id desc";
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
        F_ALIAS_ => "SUC:",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'emp_cod <> 11 order by emp_cod asc'",
        F_LENGTH_ => "8",
        F_ORD_ => "4",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_doc",
        F_ALIAS_ => "Tipo de Doc.",
        F_HELP_ => "Tipo de Doc.",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Factura,Factura Compra,Nota Credito,Recibo,Retencion",
        F_BROW_ => "1",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "new_prov",
        F_ALIAS_ => "Editar Proveedor",
        F_HELP_ => "Editar Proveedor",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "6",
        F_INLINE_ => "1",
        G_SHOW_ => "13",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_prov",
        F_ALIAS_ => "Buscar Proveedor",
        F_HELP_ => "Buscar Proveedor",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "11",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prov",
        F_ALIAS_ => "Proveedor de Servicios",
        F_HELP_ => "Proveedor de Servicios",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_prov.hasChanged()",
        F_RELTABLE_ => "proveedores",
        F_SHOWFIELD_ => "prov_nombre,tipo",
        F_FILTER_ => "'prov_nombre like |{'+busc_prov.get()+'%}|'",
        F_BROW_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prs",
        F_ALIAS_ => "Proveedores de Servicios",
        F_HELP_ => "Proveedores de Servicios",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'prov_nombre like '+prov.getStr()",
        F_LINK_ => "db.mnt_pr_srv_e",
        F_SEND_ => "prov.get()",
        F_NODB_ => "1",
        F_ORD_ => "14",
        C_SHOW_ => "new_prov.get()=='Si'",
        C_VIEW_ => "new_prov.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ruc",
        F_ALIAS_ => "RUC",
        F_HELP_ => "RUC",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select prov_ruc from mnt_prov_serv where prov_nombre like '+prov.getStr()",
        F_QUERY_REF_ => "prov.hasChanged()||ruc.firstSQL",
        F_RELTABLE_ => "mnt_prov_serv",
        F_RELFIELD_ => "prov_nombre",
        F_LOCALFIELD_ => "prov",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "es",
        F_ALIAS_ => "Entrada/Salida",
        F_HELP_ => "Entrada/Salida",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "S,E",
        F_LENGTH_ => "2",
        F_REQUIRED_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "15",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc_conc",
        F_ALIAS_ => "Buscar Concepto",
        F_HELP_ => "Buscar Concepto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat('+ults.getStr()+',|{}|)'",
        F_QUERY_REF_ => "ults.hasChanged()",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "16",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "concepto",
        F_ALIAS_ => "Sub Concepto",
        F_HELP_ => "Sub Concepto",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc_conc.hasChanged()",
        F_RELTABLE_ => "caja_con",
        F_SHOWFIELD_ => "cjc_cod,cjc_descri",
        F_FILTER_ => "'cjc_tipo='+es.getStr()+' and cjc_descri like |{'+busc_conc.get()+'%}| and cjc_cod like |{%-%}|'",
        F_REQUIRED_ => "1",
        F_ORD_ => "17",
        F_INLINE_ => "1",
        C_SHOW_ => "es.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ults",
        F_ALIAS_ => "Ultimos Servicios",
        F_HELP_ => "Ultimos Servicios",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "ruc.hasChanged()",
        F_RELTABLE_ => "docs, caja_con",
        F_SHOWFIELD_ => "cjc_descri,concat(|{  Cod: }|,cjc_cod,|{  Fecha: }|,fecha)",
        F_FILTER_ => "'ruc like|{'+ruc.get()+'}| AND concepto = cjc_cod'",
        F_NODB_ => "1",
        F_ORD_ => "17",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_doc",
        F_ALIAS_ => "Nro de Factura",
        F_HELP_ => "Nro de Documento (Factura)",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "18",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "22",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "valor_mon",
        F_ALIAS_ => "Valor",
        F_HELP_ => "Valor",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "25",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,m_descri",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotiz",
        F_ALIAS_ => "Cotiz",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "' SELECT obtener_cambio('+moneda.getStr()+')'",
        F_QUERY_REF_ => "moneda.hasChanged()&&moneda.get()!=''",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_ORD_ => "29",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "valor",
        F_ALIAS_ => "Valor Factura Gs.",
        F_HELP_ => "Valor",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        F_FORMULA_ => "valor_mon.getVal()*cotiz.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Factura",
        F_HELP_ => "Tipo Factura",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Contado,Credito",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_SHOW_ => "tipo_doc.get()!='Nota Credito'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_iva",
        F_ALIAS_ => "Tipo IVA",
        F_HELP_ => "Tipo IVA",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "10%,5%,Exenta",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "iva5",
        F_ALIAS_ => "IVA5",
        F_HELP_ => "IVA5",
        F_TYPE_ => "formula",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_ORD_ => "51",
        F_FORMULA_ => "if(tipo_iva.get()=='5%'){ valor.getVal()/21  }else{0}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "iva10",
        F_ALIAS_ => "IVA10",
        F_HELP_ => "IVA10",
        F_TYPE_ => "formula",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "52",
        F_INLINE_ => "1",
        F_FORMULA_ => "if(tipo_iva.get()=='10%'){ valor.getVal()/11 }else{0}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "emp",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Empresa",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Marijoa S.R.L.,Comercial E Ind. Marijoa S.R.L.,Particular",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_mov",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Gasto,Activo,Cancelacion",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "compl",
        F_ALIAS_ => "Complemento",
        F_HELP_ => "Complemento",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "400",
        F_ORD_ => "510",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No Enviado,Enviado",
        F_LENGTH_ => "24",
        F_ORD_ => "515",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_oc",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Doc. Original/Copia",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Original,Copia",
        F_BROW_ => "1",
        F_ORD_ => "520",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
