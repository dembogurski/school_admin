<?php
$Obj->name = "liq_salarios_lg";
$Obj->alias = "Liquidación Legal de Salarios";
$Obj->help = "Liquidación Legal de Salarios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "liq_salarios_lg";
$Obj->Filter = "";
$Obj->Sort = "nombre asc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "empleador",
        F_ALIAS_ => "Empleador",
        F_HELP_ => "Empleador",
        F_TYPE_ => "text",
        F_LENGTH_ => "60",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "n_mes",
        F_ALIAS_ => "Nro Mes",
        F_HELP_ => "Nro Mes",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  right( left(CURRENT_DATE,7),2) as nn'",
        F_QUERY_REF_ => "n_mes.firstSQL",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "patronal",
        F_ALIAS_ => "Nro Patronal",
        F_HELP_ => "Patronal",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nombre",
        F_ALIAS_ => "Apellido y Nombre Funcionario",
        F_HELP_ => "Apellido y Nombre Funcionario",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "40",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "salario",
        F_ALIAS_ => "Salario",
        F_HELP_ => "Salario",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_ORD_ => "55",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "horas_extras",
        F_ALIAS_ => "Horas Extras",
        F_HELP_ => "Horas Extras",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "60",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "comis",
        F_ALIAS_ => "Comisiones",
        F_HELP_ => "Comisiones",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
		F_DEC_ => "0",     
        F_ORD_ => "65",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "oi",
        F_ALIAS_ => "Otros Ingresos",
        F_HELP_ => "Otros Ingresos",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
		F_DEC_ => "0",     
        F_ORD_ => "70",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo Ingreso",
        F_HELP_ => "Tipo Ingreso",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_ORD_ => "76",
		 F_NODB_ => "1",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "total_s",
        F_ALIAS_ => "Total Salario",
        F_HELP_ => "Total Salario",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "0",     
		F_FORMULA_ => "(sub_total.getVal()+ horas_extras.getVal() + comis.getVal() + oi.getVal() )",
        F_BROW_ => "1",
        F_ORD_ => "80",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ips",
        F_ALIAS_ => "I.P.S.",
        F_HELP_ => "I.P.S.",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
		F_FORMULA_ => " Math.round((total_s.getVal() * 9) / 100)",
        F_ORD_ => "90",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "od",
        F_ALIAS_ => "Otros Descuentos",
        F_HELP_ => "Otros Descuentos",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
		F_DEC_ => "0",
        F_ORD_ => "95",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "todal_dsc",
        F_ALIAS_ => "Total Des.",
        F_HELP_ => "Total descuentos",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
		F_FORMULA_ => "ips.getVal()+od.getVal()",
        F_ORD_ => "100",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sub_total",
        F_ALIAS_ => "Subtotal",
        F_HELP_ => "Subtotal",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
		F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "105",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "saldo",
        F_ALIAS_ => "Saldo a Cobrar",
        F_HELP_ => "Saldo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
		F_FORMULA_ => "total_s.getVal() - todal_dsc.getVal() ",
        F_BROW_ => "1",
        F_ORD_ => "110",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dt",
        F_ALIAS_ => "Dias Trabajados",
        F_HELP_ => "Dias Trabajados",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado Marcar/Desmarcar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",X",
        F_BROW_ => "1",
        F_ORD_ => "150",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "marcar",
        F_ALIAS_ => "Desmarcar Todos",
        F_HELP_ => "Desmarcar Todos",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "150",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "proc",
        F_ALIAS_ => "Confirme Marcar todos como Pendiente",
        F_HELP_ => "Confirme Marcar todos como Pendiente",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update liq_salarios_lg set estado = |{}|;'",
        F_NODB_ => "1",
        F_ORD_ => "155",
        F_INLINE_ => "1",
        C_SHOW_ => "marcar.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mesa",
        F_ALIAS_ => "Mes",
        F_HELP_ => "Mes",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select m_mes from meses where m_code = '+n_mes.getStr()",
        F_QUERY_REF_ => "n_mes.hasChanged()||estado.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_SHOW_ => "n_mes.get()!=''&&operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "diah",
        F_ALIAS_ => "Cant. Dias",
        F_HELP_ => "Cantidad de Dias",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select m_cant_dias from meses where m_code = '+n_mes.getStr()",
        F_QUERY_REF_ => "n_mes.hasChanged()||estado.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "170",
        F_INLINE_ => "1",
        C_SHOW_ => "n_mes.get()!=''&&operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "anio",
        F_ALIAS_ => "Año",
        F_HELP_ => "Año",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select left(CURRENT_DATE,4)'",
        F_QUERY_REF_ => "n_mes.hasChanged()||estado.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "180",
        F_INLINE_ => "1",
        C_SHOW_ => "n_mes.get()!=''&&operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir",
        F_ALIAS_ => "Imprimir Liquidacion",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.liquid_legal",
        F_NODB_ => "1",
        F_ORD_ => "190",
        F_INLINE_ => "1",
        C_SHOW_ => "anio.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "imprimirH",
        F_ALIAS_ => "Impresion Horizontal",
        F_HELP_ => "Impresion Horizontal",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.liquid_legalH",
        F_NODB_ => "1",
        F_ORD_ => "192",
        F_INLINE_ => "1",
        C_SHOW_ => "anio.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mg_sup",
        F_ALIAS_ => "Margen Superior",
        F_HELP_ => "Margen Superior",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select 40'",
        F_QUERY_REF_ => "mg_sup.firstSQL",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "195",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mg_iz",
        F_ALIAS_ => "Margen Izquierdo",
        F_HELP_ => "Margen Izquierdo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select 38'",
        F_QUERY_REF_ => "mg_iz.firstSQL",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "200",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
