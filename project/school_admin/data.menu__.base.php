<?php
/** data.menu__.base.php	Principal    ( data_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->alias = "School Admin";
$Obj->doc = "Principal";
$Obj->help = "Principal menu";
$Obj->Add(
    array(
        F_NAME_ => "man",
        F_ALIAS_ => "Archivo",
        F_HELP_ => "Mantenimientos Diversos",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "man_div",
        F_ALIAS_ => "Diversos",
        F_HELP_ => "Diversos Mantenimientos",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "man_div_empr",
        F_ALIAS_ => "Instituciones Educativas",
        F_HELP_ => "Datos de las Escuelas y/o Colegios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.par_empresas",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "man_bcos",
        F_ALIAS_ => "Bancos",
        F_HELP_ => "Registro de Bancos, cuentas y cheques",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "man_bcos_bcos",
        F_ALIAS_ => "Registro de bancos",
        F_HELP_ => "Registro de bancos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_bcos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos",
        F_FILTER_ => "",
        G_SHOW_ => "4096"));

$Obj->Add(
    array(
        F_NAME_ => "man_adm",
        F_ALIAS_ => "Administrativos",
        F_HELP_ => "Datos Administrativos",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "departamentos",
        F_ALIAS_ => "Departamentos",
        F_HELP_ => "Departamentos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.departamentos",
        F_FILTER_ => "",
        G_SHOW_ => "4096"));

$Obj->Add(
    array(
        F_NAME_ => "mov_caja",
        F_ALIAS_ => "Caja",
        F_HELP_ => "movimientos de Caja",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "bancos",
        F_ALIAS_ => "Bancos",
        F_HELP_ => "Control de Bancos",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_chq",
        F_ALIAS_ => "Cheques",
        F_HELP_ => "Cheques",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos_chq",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_chq_ab",
        F_ALIAS_ => "Abiertos",
        F_HELP_ => "Cheques Abiertos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos_chq_mov",
        F_FILTER_ => "chq_estado=|{Abierto}|",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_chq_emit",
        F_ALIAS_ => "Emitidos",
        F_HELP_ => "Emitidos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos_chq_mov",
        F_FILTER_ => "chq_estado=|{Emitido}|",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_chq_pag",
        F_ALIAS_ => "Pagados",
        F_HELP_ => "Cheques Pagados",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos_chq_mov",
        F_FILTER_ => "chq_estado=|{Pagado}|",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_chq_rec",
        F_ALIAS_ => "Rechazados",
        F_HELP_ => "Rechazados Por el Banco",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos_chq_mov",
        F_FILTER_ => "chq_estado=|{Rechazado}|",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_chq_anul",
        F_ALIAS_ => "Anulados",
        F_HELP_ => "Cheques Anulados",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos_chq_mov",
        F_FILTER_ => "chq_estado=|{Anulado}|",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_chq_cons",
        F_ALIAS_ => "Todos - Consultar",
        F_HELP_ => "Todos - Consultar",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.bcos_chq_cons",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "man_adm_param",
        F_ALIAS_ => "Parametros",
        F_HELP_ => "Parametros Diversos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.par_parametros",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "man_caja_con",
        F_ALIAS_ => "Conceptos",
        F_HELP_ => "Conceptos de Caja",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.caja_con",
        F_FILTER_ => "cjc_cod not like |{%-%}|",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "man_caja_mon",
        F_ALIAS_ => "Monedas",
        F_HELP_ => "Registro de Monedas existentes",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.caja_monedas",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "man_caja_camb",
        F_ALIAS_ => "Cotizaciones",
        F_HELP_ => "Cotizaciones diarias",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.caja_cambios",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "ctrol_caja_chi",
        F_ALIAS_ => "Control de Fondos Fijos (Caja Chica)",
        F_HELP_ => "Control de Fondos Fijos (Caja Chica)",
        F_TYPE_ => "menu",
        R_TABLE_ => "contab",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.caja_chi_control",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "caja_ing_egr",
        F_ALIAS_ => "Ingresos y Egresos de Caja",
        F_HELP_ => "Ingresos y Egresos de Caja",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.caja_ing_egreso",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "rep_mov_caja_in",
        F_ALIAS_ => "Reporte Movimientos de Caja",
        F_HELP_ => "Reporte Movimientos de Caja",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_mov_caja",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "caja_chica_head",
        F_ALIAS_ => "Caja Chica",
        F_HELP_ => "Caja Chica",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "caja_chica_ab",
        F_ALIAS_ => "Caja Chica",
        F_HELP_ => "Caja Chica",
        F_TYPE_ => "menu",
        R_TABLE_ => "caja_chica_head",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.caja_chi_x_suc",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "alumnos",
        F_ALIAS_ => "Alumnos",
        F_HELP_ => "Alumnos",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.alumnos",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "grados",
        F_ALIAS_ => "Grados",
        F_HELP_ => "Grados",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.grados",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "cobros",
        F_ALIAS_ => "Cobros de Cuotas y Matriculas",
        F_HELP_ => "Cobros de Cuotas y Matriculas",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.caja_cobros",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

?>
