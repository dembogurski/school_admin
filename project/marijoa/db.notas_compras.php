<?php
$Obj->name = "notas_compras";
$Obj->alias = "Planilla de Compras";
$Obj->help = "Planilla de Compras";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "notas_compras";
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
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_SHOW_ => "operation==INSERT_",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nro de Planilla",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT nota_compra_gen('+n_invoice.getStr()+','+n_mar.getStr()+','+n_nac_int.getStr()+',|{'+n_fecha.get()+'}|  ,|{'+n_fecha_prev.get()+'}|,'+__user.getStr()+','+n_moneda.getStr()+','+n_cotiz.getVal()+')'",
        F_QUERY_REF_ => "n_gen.hasChanged()&&n_gen.get()=='Si'",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "4",
        C_SHOW_ => "allValid||operation==CHANGE_||operation==SHOW_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_invoice",
        F_ALIAS_ => "Invoice",
        F_HELP_ => "Invoice",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "n_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_nac_int",
        F_ALIAS_ => "Nacional/Importacion",
        F_HELP_ => "Nacional/Importacion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Nacional,Internacional",
        F_BROW_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "n_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "caja_monedas",
        F_SHOWFIELD_ => "m_cod,''",
        F_ORD_ => "24",
        F_INLINE_ => "1",
        C_CHANGE_ => "n_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_cotiz",
        F_ALIAS_ => "Cotiz.",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select obtener_cambio('+n_moneda.getStr()+');'",
        F_QUERY_REF_ => "n_moneda.hasChanged()",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_CHANGE_ => "n_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_b_mar",
        F_ALIAS_ => "Mar/Proveedor",
        F_HELP_ => "Mar/Proveedor",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "n_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_pr",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "n_b_mar.hasChanged()",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_nombre,prov_ciudad",
        F_FILTER_ => "'prov_nombre like |{'+n_b_mar.get()+'%}|'",
        F_NODB_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        C_VIEW_ => "n_nac_int.get()=='Nacional'&&n_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_mar",
        F_ALIAS_ => "Mar/Proveedor",
        F_HELP_ => "Mar/Proveedor",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "100",
        C_CHANGE_ => "operation==INSERT_",
        F_FORMULA_ => "if(operation==INSERT_){  if(n_nac_int.get()=='Nacional'){n_pr.get()}else{n_b_mar.get().toUpperCase()}}else{n_mar.get()}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_fecha",
        F_ALIAS_ => "Fecha Compra",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "102",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "n_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_fecha_prev",
        F_ALIAS_ => "Fecha de Llegada",
        F_HELP_ => "Fecha de Llegada en Destino",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "104",
        F_INLINE_ => "1",
        C_CHANGE_ => "n_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_gen",
        F_ALIAS_ => "Generar Planilla",
        F_HELP_ => "Generar Planilla",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "allValid&&n_nro.getVal()<1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__change",
        F_ALIAS_ => "Operation = CHANGE_",
        F_HELP_ => "Operation = CHANGE_",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "n_nro.getVal()>0&&n_gen.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "operation=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_det",
        F_ALIAS_ => "Detalle de Compra",
        F_HELP_ => "Detalle de Compra",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'d_nro = '+n_nro.getVal()",
        F_LINK_ => "db.nota_compra_det",
        F_SEND_ => "n_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "130",
        C_SHOW_ => "operation==CHANGE_&&n_estado.get()=='Abierta'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => " ",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "66",
        F_NODB_ => "1",
        F_ORD_ => "140",
        C_SHOW_ => "operation==CHANGE_&&n_estado.get()=='Cerrada'",
        F_FORMULA_ => "'Area para Control de Calidad'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_sucia",
        F_ALIAS_ => "Sucia",
        F_HELP_ => "Cantidad en Metros que esta Sucia",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_ORD_ => "150",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_lav",
        F_ALIAS_ => "Lavar",
        F_HELP_ => "Lavar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Lavable,No Lavable",
        F_ORD_ => "160",
        F_INLINE_ => "1",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_falla",
        F_ALIAS_ => "Falla",
        F_HELP_ => "Cantidad en Metros que esta Fallada",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_ORD_ => "170",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_tipo_falla",
        F_ALIAS_ => "Tipo de Falla",
        F_HELP_ => "Tipo de Falla",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Totalmente,Medianamente,Parcialmente",
        F_ORD_ => "180",
        F_INLINE_ => "1",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_frac_orig",
        F_ALIAS_ => "Frac. en Origen",
        F_HELP_ => "Fraccionada en Origen",
        F_TYPE_ => "text",
        F_LENGTH_ => "50",
        F_ORD_ => "190",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "200",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Abierta,Pendiente,Cerrada",
        F_BROW_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_print",
        F_ALIAS_ => "Imprimir",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.nota_comp_ctrol",
        F_NODB_ => "1",
        F_ORD_ => "220",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
