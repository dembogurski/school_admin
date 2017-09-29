<?php
/** data.menu__.base.php	    ( data_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->alias = "M A R I J O A";
$Obj->doc = "";
$Obj->help = "Menu principal del Sistema";
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
        G_SHOW_ => "140979228"));

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
        G_SHOW_ => "140782860"));

$Obj->Add(
    array(
        F_NAME_ => "man_div_empr",
        F_ALIAS_ => "Empresa",
        F_HELP_ => "Datos de las Empresas del grupo",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.par_empresas",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "man_div_prov",
        F_ALIAS_ => "Proveedores",
        F_HELP_ => "Proveedores de la empresa",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_prov",
        F_FILTER_ => "",
        G_SHOW_ => "393504"));

$Obj->Add(
    array(
        F_NAME_ => "man_div_provs",
        F_ALIAS_ => "Proveedores de Servicios",
        F_HELP_ => "Proveedores de Servicios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_prov_serv",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "man_div_prcons",
        F_ALIAS_ => "Buscar Proveedores de Servicios",
        F_HELP_ => "Proveedores de Servicios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mnt_pr_srv_con",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "man_caja",
        F_ALIAS_ => "Caja",
        F_HELP_ => "Mantenimiento de parametros de caja",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "8224"));

$Obj->Add(
    array(
        F_NAME_ => "man_caja_con",
        F_ALIAS_ => "Conceptos",
        F_HELP_ => "Conceptos de Caja",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.caja_con",
        F_FILTER_ => "cjc_cod not like |{%-%}|",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "man_caja_mon",
        F_ALIAS_ => "Monedas",
        F_HELP_ => "Registro de Monedas existentes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.caja_monedas",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "man_caja_bill",
        F_ALIAS_ => "Billetes",
        F_HELP_ => "Registro de Billetes existentes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.billetes",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "man_caja_camb",
        F_ALIAS_ => "Cotizaciones",
        F_HELP_ => "Cotizaciones diarias",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.caja_cambios",
        F_FILTER_ => "",
        G_SHOW_ => "8232"));

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
        G_SHOW_ => "4104"));

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
        G_SHOW_ => "65576"));

$Obj->Add(
    array(
        F_NAME_ => "man_adm_param",
        F_ALIAS_ => "Parámetros",
        F_HELP_ => "Parámetros Diversos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.adm_param",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod",
        F_ALIAS_ => "Productos",
        F_HELP_ => "Mantenimientos relativos a Productos",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "134283296"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_fam",
        F_ALIAS_ => "Sectores",
        F_HELP_ => "Mantenimiento de Sectores",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_fam",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_grupo",
        F_ALIAS_ => "Grupos",
        F_HELP_ => "Mantenimiento de Grupos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_grupo",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_tipo",
        F_ALIAS_ => "Tipos",
        F_HELP_ => "Mantenimiento de Tipos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_tipo",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_temp",
        F_ALIAS_ => "Temporadas",
        F_HELP_ => "Mantenimiento de Temporadas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_temp",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_estr",
        F_ALIAS_ => "Estructuras",
        F_HELP_ => "Mantenimiento de Estructuras",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_estruc",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_clas",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Mantenimiento de Clasificación",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_clasif",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_color",
        F_ALIAS_ => "Colores",
        F_HELP_ => "Mantenimiento de Colores",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_color",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_comp",
        F_ALIAS_ => "Composición",
        F_HELP_ => "Composición del producto",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_comp",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_liso",
        F_ALIAS_ => "Tipo de color",
        F_HELP_ => "Mantenimiento del tipo de color",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_lisoest",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_prod",
        F_ALIAS_ => "Productos",
        F_HELP_ => "Productos del sistema",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_prod",
        F_FILTER_ => "",
        G_SHOW_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "man_prod_rot",
        F_ALIAS_ => "Productos de Alta Rotacion",
        F_HELP_ => "Productos de Alta Rotacion",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_prod_rot",
        F_FILTER_ => "",
        G_SHOW_ => "134217760"));

$Obj->Add(
    array(
        F_NAME_ => "facturacion",
        F_ALIAS_ => "Facturación Cliente",
        F_HELP_ => "Facturación de Productos a Clientes",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "174335118"));

$Obj->Add(
    array(
        F_NAME_ => "fact_proveedor",
        F_ALIAS_ => "Facturacion Proveedores",
        F_HELP_ => "Facturacion Proveedores",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "136916360"));

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
        G_SHOW_ => "1036"));

$Obj->Add(
    array(
        F_NAME_ => "contab",
        F_ALIAS_ => "Contabilidad",
        F_HELP_ => "Contabilidad",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "16778272"));

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
        G_SHOW_ => "16778240"));

$Obj->Add(
    array(
        F_NAME_ => "cuentas",
        F_ALIAS_ => "Plan de Cuentas",
        F_HELP_ => "Plan de Cuentas",
        F_TYPE_ => "menu",
        R_TABLE_ => "contab",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.plan_cuentas",
        F_FILTER_ => "",
        G_SHOW_ => "16777248"));

$Obj->Add(
    array(
        F_NAME_ => "plan_ctas_filt",
        F_ALIAS_ => "Filtrar Cuentas",
        F_HELP_ => "Filtrar Cuentas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "cuentas",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.plan_ctas_filter",
        F_FILTER_ => "",
        G_SHOW_ => "16777248"));

$Obj->Add(
    array(
        F_NAME_ => "pcuentas",
        F_ALIAS_ => "Plan de Cuentas",
        F_HELP_ => "Plan de Cuentas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "cuentas",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.plan_cuentas",
        F_FILTER_ => "",
        G_SHOW_ => "16777248"));

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
        G_SHOW_ => "13320"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nueva_vent",
        F_ALIAS_ => "Nueva Venta",
        F_HELP_ => "Nueva Venta",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.venta",
        F_FILTER_ => "",
        G_SHOW_ => "134217734"));

$Obj->Add(
    array(
        F_NAME_ => "fact_venta_abi",
        F_ALIAS_ => "Ventas Abiertas de todas las sucursales",
        F_HELP_ => "Ventas Abiertas de todas las sucursales",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.venta",
        F_FILTER_ => "fact_estado=|{Abierta}|",
        G_SHOW_ => "134225952"));

$Obj->Add(
    array(
        F_NAME_ => "filter_venta_ab",
        F_ALIAS_ => "Ventas Abiertas de una Suc (Filtro)",
        F_HELP_ => "Ventas Abiertas de todas las sucursales",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.filter_vent_ab",
        F_FILTER_ => "",
        G_SHOW_ => "134225952"));

$Obj->Add(
    array(
        F_NAME_ => "presups_all",
        F_ALIAS_ => "Presupuestos",
        F_HELP_ => "Presupuestos x Sucursal",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.presupuestos",
        F_FILTER_ => "",
        G_SHOW_ => "134225952"));

$Obj->Add(
    array(
        F_NAME_ => "aper_cierre_ind",
        F_ALIAS_ => "Apertura y Cierre de caja",
        F_HELP_ => "Apertura y Cierre por Sucursal",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.aper_cierre_caj",
        F_FILTER_ => "",
        G_SHOW_ => "1028"));

$Obj->Add(
    array(
        F_NAME_ => "mov_caja_apert",
        F_ALIAS_ => "Cajas de Todas las Sucursales",
        F_HELP_ => "Apertura y Cierre de caja de Todas las Sucursales",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.caja_edit",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "compras_general",
        F_ALIAS_ => "Compras",
        F_HELP_ => "Compras de Productos en General",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mov_compras",
        F_FILTER_ => "",
        G_SHOW_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "mov_prod_comp",
        F_ALIAS_ => "Compras Abiertas",
        F_HELP_ => "Compras de Productos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "compras_general",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mov_compras",
        F_FILTER_ => "c_estado=|{Abierta}|",
        G_SHOW_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "mov_prod_comp5",
        F_ALIAS_ => "Compras Abiertas (Stock)",
        F_HELP_ => "Compras Abiertas (Stock)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "compras_general",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mov_compras_st",
        F_FILTER_ => "c_estado=|{Abierta}|",
        G_SHOW_ => "65792"));

$Obj->Add(
    array(
        F_NAME_ => "mov_prod_comp6",
        F_ALIAS_ => "Compras Controladas",
        F_HELP_ => "Compras Controladas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "compras_general",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mov_compras_st",
        F_FILTER_ => "c_estado=|{Controlada}|",
        G_SHOW_ => "65792"));

$Obj->Add(
    array(
        F_NAME_ => "mov_prod_comp2",
        F_ALIAS_ => "Compras en Finanzas",
        F_HELP_ => "Compras en Finanzas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "compras_general",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mov_compras",
        F_FILTER_ => "c_estado=|{Cerrada}|",
        G_SHOW_ => "264"));

$Obj->Add(
    array(
        F_NAME_ => "mov_prod_comp4",
        F_ALIAS_ => "Compras en Administracion",
        F_HELP_ => "Compras en Administracion",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mov_compras",
        F_FILTER_ => "c_estado=|{En Finanzas}|",
        G_SHOW_ => "2056"));

$Obj->Add(
    array(
        F_NAME_ => "mov_prod_comp3",
        F_ALIAS_ => "Compras (General)",
        F_HELP_ => "Compras (General)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "compras_general",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cons_compras",
        F_FILTER_ => "",
        G_SHOW_ => "196648"));

$Obj->Add(
    array(
        F_NAME_ => "modif_precios",
        F_ALIAS_ => "Modificacion de Precios x Referencia",
        F_HELP_ => "Modificacion de Precios x Referencia de Compra",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mnt_precios",
        F_FILTER_ => "",
        G_SHOW_ => "196648"));

$Obj->Add(
    array(
        F_NAME_ => "fraccionamientos",
        F_ALIAS_ => "Fraccionamientos",
        F_HELP_ => "Fraccionar",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mov_frac",
        F_FILTER_ => "",
        G_SHOW_ => "532656"));

$Obj->Add(
    array(
        F_NAME_ => "mov_prod_frac",
        F_ALIAS_ => "Fraccionar (buscar por código)",
        F_HELP_ => "Fraccionar (buscar por código)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "fraccionamientos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mov_frac",
        F_FILTER_ => "",
        G_SHOW_ => "532656"));

$Obj->Add(
    array(
        F_NAME_ => "mov_frac_lotes",
        F_ALIAS_ => "Fraccionar x Lotes",
        F_HELP_ => "Fraccionar x Lotes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "fraccionamientos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mov_frac_lotes",
        F_FILTER_ => "",
        G_SHOW_ => "8368"));

$Obj->Add(
    array(
        F_NAME_ => "recepcion",
        F_ALIAS_ => "Recepcion de Mercaderias",
        F_HELP_ => "Recepcion de Mercaderias",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rec_laser",
        F_FILTER_ => "",
        G_SHOW_ => "8368"));

$Obj->Add(
    array(
        F_NAME_ => "gramaje_muestra",
        F_ALIAS_ => "Gramaje de Muestra e Imagen",
        F_HELP_ => "Gramaje de Muestra e Imagen",
        F_TYPE_ => "submenu",
        R_TABLE_ => "recepcion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.gramaje_muestra",
        F_FILTER_ => "",
        G_SHOW_ => "8368"));

$Obj->Add(
    array(
        F_NAME_ => "rec_lector",
        F_ALIAS_ => "Recepcion C/Lector",
        F_HELP_ => "Recepcion C/Lector",
        F_TYPE_ => "submenu",
        R_TABLE_ => "recepcion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rec_laser",
        F_FILTER_ => "",
        G_SHOW_ => "8368"));

$Obj->Add(
    array(
        F_NAME_ => "ajustes",
        F_ALIAS_ => "Ajustes",
        F_HELP_ => "Ajustes",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ajustes",
        F_FILTER_ => "",
        G_SHOW_ => "176"));

$Obj->Add(
    array(
        F_NAME_ => "ajustes_x_cod",
        F_ALIAS_ => "Ajustar (buscar por código)",
        F_HELP_ => "Ajustar (buscar por código)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "ajustes",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ajustes",
        F_FILTER_ => "",
        G_SHOW_ => "2098352"));

$Obj->Add(
    array(
        F_NAME_ => "ajustes_ent",
        F_ALIAS_ => "Ajustes de Entrada",
        F_HELP_ => "Ajustar (buscar por código)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "ajustes",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ajuste_ent",
        F_FILTER_ => "",
        G_SHOW_ => "1638400"));

$Obj->Add(
    array(
        F_NAME_ => "ajustes_reg",
        F_ALIAS_ => "Registro de Ajustes Pendientes",
        F_HELP_ => "Registro de Ajustes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "ajustes",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.reg_ajustes",
        F_FILTER_ => "aj_estado=|{Pendiente}|",
        G_SHOW_ => "134227088"));

$Obj->Add(
    array(
        F_NAME_ => "ajustes_aj",
        F_ALIAS_ => "Registro de Ajustes Cerrados",
        F_HELP_ => "Registro de Ajustes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "ajustes",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.reg_ajustes",
        F_FILTER_ => "aj_estado=|{Ajustado}|",
        G_SHOW_ => "144"));

$Obj->Add(
    array(
        F_NAME_ => "man_div_cli",
        F_ALIAS_ => "Clientes",
        F_HELP_ => "Clientes de la Empresa",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_cli",
        F_FILTER_ => "",
        G_SHOW_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "mnt_div_func",
        F_ALIAS_ => "Funcionarios",
        F_HELP_ => "Funcionarios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_func",
        F_FILTER_ => "func_estado=|{Activo}|",
        G_SHOW_ => "2056"));

$Obj->Add(
    array(
        F_NAME_ => "mnt_div_funi",
        F_ALIAS_ => "Funcionarios Inactivos",
        F_HELP_ => "Funcionarios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_func",
        F_FILTER_ => "func_estado=|{Inactivo}|",
        G_SHOW_ => "2056"));

$Obj->Add(
    array(
        F_NAME_ => "func_ord_suc",
        F_ALIAS_ => "Funcionarios Ord. x Suc.",
        F_HELP_ => "Funcionarios Ord. x Suc.",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_func_x_suc",
        F_FILTER_ => "func_estado=|{Activo}|",
        G_SHOW_ => "3592"));

$Obj->Add(
    array(
        F_NAME_ => "func_cons",
        F_ALIAS_ => "Buscar Funcionarios",
        F_HELP_ => "Buscar Funcionarios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mnt_func_cons",
        F_FILTER_ => "",
        G_SHOW_ => "3592"));

$Obj->Add(
    array(
        F_NAME_ => "man_div_conv",
        F_ALIAS_ => "Convenios",
        F_HELP_ => "Convenios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_conv",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "man_bcos_bcos",
        F_ALIAS_ => "Control de bancos",
        F_HELP_ => "Control de bancos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_bcos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos",
        F_FILTER_ => "",
        G_SHOW_ => "4096"));

$Obj->Add(
    array(
        F_NAME_ => "man_bacos_ctas",
        F_ALIAS_ => "Cuentas",
        F_HELP_ => "Cuentas Bancarias",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_bcos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos_ctas",
        F_FILTER_ => "",
        G_SHOW_ => "4096"));

$Obj->Add(
    array(
        F_NAME_ => "man_bcos_conc",
        F_ALIAS_ => "Conceptos de Cuentas",
        F_HELP_ => "Conceptos de Cuentas corrientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_bcos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "man_bcos_mov",
        F_ALIAS_ => "Movimiento",
        F_HELP_ => "Movimiento",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_bcos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos_ctas_det",
        F_FILTER_ => "",
        G_SHOW_ => "4104"));

$Obj->Add(
    array(
        F_NAME_ => "tesoreria",
        F_ALIAS_ => "Tesoreria",
        F_HELP_ => "Tesoreria",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "1064"));

$Obj->Add(
    array(
        F_NAME_ => "dist_ingresos",
        F_ALIAS_ => "Distribución de Ingresos",
        F_HELP_ => "Distribución de Ingresos",
        F_TYPE_ => "menu",
        R_TABLE_ => "tesoreria",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.tesoreria",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "sueldos",
        F_ALIAS_ => "Sueldos y Comisiones",
        F_HELP_ => "Pago de Sueldos y Comisiones",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "8256"));

$Obj->Add(
    array(
        F_NAME_ => "suel_comis",
        F_ALIAS_ => "Pago Individual de Sueldos y Comisiones",
        F_HELP_ => "Pago Individual de Sueldos y Comisiones",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.sueldos_func",
        F_FILTER_ => "sue_nro_liquid > 0",
        G_SHOW_ => "3080"));

$Obj->Add(
    array(
        F_NAME_ => "sueldo_var",
        F_ALIAS_ => "Calculo de Sueldo x Variable",
        F_HELP_ => "Calculo de Sueldo x Variable",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.sueldos_var",
        F_FILTER_ => "",
        G_SHOW_ => "11272"));

$Obj->Add(
    array(
        F_NAME_ => "fact_ventas_cer",
        F_ALIAS_ => "Ventas Cerradas",
        F_HELP_ => "Ventas Cerradas",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.venta",
        F_FILTER_ => "fact_estado=|{Cerrada}|",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "fact_venta_caja",
        F_ALIAS_ => "Ventas en Caja",
        F_HELP_ => "Todas las Facturas en proceso de pago en Caja",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.fact_en_caja",
        F_FILTER_ => "",
        G_SHOW_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "man_meses",
        F_ALIAS_ => "Meses y dias habiles",
        F_HELP_ => "Meses y dias habiles",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.meses",
        F_FILTER_ => "",
        G_SHOW_ => "33"));

$Obj->Add(
    array(
        F_NAME_ => "imp_code",
        F_ALIAS_ => "Impesion de código de Barras",
        F_HELP_ => "Imprimir código de Barras",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.imp_code_bar",
        F_FILTER_ => "",
        G_SHOW_ => "134226064"));

$Obj->Add(
    array(
        F_NAME_ => "imp_code_bar",
        F_ALIAS_ => "Imprimir código 1ra vez",
        F_HELP_ => "Imprimir código de Barras x primera vez",
        F_TYPE_ => "submenu",
        R_TABLE_ => "imp_code",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.imp_code_bar",
        F_FILTER_ => "",
        G_SHOW_ => "134226064"));

$Obj->Add(
    array(
        F_NAME_ => "re_imp_code",
        F_ALIAS_ => "Reimpresion de codigos",
        F_HELP_ => "Reimpresiones de codigos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "imp_code",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reimp_code",
        F_FILTER_ => "",
        G_SHOW_ => "134226064"));

$Obj->Add(
    array(
        F_NAME_ => "re_imp_codl",
        F_ALIAS_ => "Reimpresion de codigos x Lotes",
        F_HELP_ => "Reimpresiones de codigos Lotes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "imp_code",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reimp_code_lotes",
        F_FILTER_ => "",
        G_SHOW_ => "2097408"));

$Obj->Add(
    array(
        F_NAME_ => "imp_code_estant",
        F_ALIAS_ => "Impesion de código p/Estantes",
        F_HELP_ => "Impesion de código p/Estantes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "imp_code",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.code_bar_estante",
        F_FILTER_ => "",
        G_SHOW_ => "536936448"));

$Obj->Add(
    array(
        F_NAME_ => "imp_code_tara",
        F_ALIAS_ => "Impesion Gramaje de Taras",
        F_HELP_ => "Impesion Gramaje de Taras",
        F_TYPE_ => "submenu",
        R_TABLE_ => "imp_code",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.imp_tara",
        F_FILTER_ => "",
        G_SHOW_ => "536936448"));

$Obj->Add(
    array(
        F_NAME_ => "prod_buscar",
        F_ALIAS_ => "Buscar Productos Plus",
        F_HELP_ => "Buscar Productos Plus",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.prod_buscar",
        F_FILTER_ => "",
        G_SHOW_ => "146"));

$Obj->Add(
    array(
        F_NAME_ => "buscar_producto",
        F_ALIAS_ => "Consultar Productos",
        F_HELP_ => "Consultar Productos ",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.consultar_prod",
        F_FILTER_ => "",
        G_SHOW_ => "134349072"));

$Obj->Add(
    array(
        F_NAME_ => "cons_personaliz",
        F_ALIAS_ => "Consulta Personalizada de Productos",
        F_HELP_ => "Consulta Personalizada de Productos",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cons_pers_ant",
        F_FILTER_ => "",
        G_SHOW_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "cons_pers_prod",
        F_ALIAS_ => "Consulta Personalizada de Prod. Guia",
        F_HELP_ => "Consulta Personalizada",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cons_personaliz",
        F_FILTER_ => "",
        G_SHOW_ => "16"));

$Obj->Add(
    array(
        F_NAME_ => "cons_empaque",
        F_ALIAS_ => "Consulta Productos Empaque",
        F_HELP_ => "Consulta Productos de Empaque",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cons_pers_emp",
        F_FILTER_ => "",
        G_SHOW_ => "262272"));

$Obj->Add(
    array(
        F_NAME_ => "categorias",
        F_ALIAS_ => "Categorías de Cliente",
        F_HELP_ => "Categorias de Cliente",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.categorias",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "remito",
        F_ALIAS_ => "Nota Remisión (Traslados)",
        F_HELP_ => "Nota Remisión  ( Traslados )",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "553648176"));

$Obj->Add(
    array(
        F_NAME_ => "suel_func_all",
        F_ALIAS_ => "Reporte Pago Sueldos",
        F_HELP_ => "Impresion de Liquidaciones",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.sue_func_all",
        F_FILTER_ => "",
        G_SHOW_ => "3080"));

$Obj->Add(
    array(
        F_NAME_ => "fact_empaque",
        F_ALIAS_ => "Empaque",
        F_HELP_ => "Empaque",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.empaque",
        F_FILTER_ => "",
        G_SHOW_ => "131200"));

$Obj->Add(
    array(
        F_NAME_ => "descuentos",
        F_ALIAS_ => "Descuentos",
        F_HELP_ => "Descuentos",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "2056"));

$Obj->Add(
    array(
        F_NAME_ => "rep_varios",
        F_ALIAS_ => "Reportes Varios",
        F_HELP_ => "Reportes Varios",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "134750216"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_ctas",
        F_ALIAS_ => "Cuentas Corrientes",
        F_HELP_ => "Cuentas Corrientes",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.bcos_ctas",
        F_FILTER_ => "",
        G_SHOW_ => "5120"));

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
        F_NAME_ => "bcos_chq_ter",
        F_ALIAS_ => "Cheques de Terceros",
        F_HELP_ => "Cheques",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.chq_terceros_in",
        F_FILTER_ => "",
        G_SHOW_ => "9256"));

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
        F_NAME_ => "bcos_chq_cnab",
        F_ALIAS_ => "Abiertos - No Emitidos x Factura (Consultar)",
        F_HELP_ => "Abiertos - No Emitidos x Factura (Consultar)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.bcos_chq_cnab",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "varios",
        F_ALIAS_ => "Varios",
        F_HELP_ => "Varios",
        F_TYPE_ => "header",
        R_TABLE_ => "",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "137110682"));

$Obj->Add(
    array(
        F_NAME_ => "remito_abierto",
        F_ALIAS_ => "Notas de Remision Abiertas",
        F_HELP_ => "Generar Modificar Remito de Mercaderias",
        F_TYPE_ => "submenu",
        R_TABLE_ => "remito",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.remito",
        F_FILTER_ => "rem_estado=|{Abierta}|",
        G_SHOW_ => "27263008"));

$Obj->Add(
    array(
        F_NAME_ => "remito_en_proc",
        F_ALIAS_ => "Notas de Remision en Proceso",
        F_HELP_ => "Notas de Remision en Proceso",
        F_TYPE_ => "submenu",
        R_TABLE_ => "remito",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.remito_en_proc",
        F_FILTER_ => "rem_estado=|{En Proceso}|",
        G_SHOW_ => "10485808"));

$Obj->Add(
    array(
        F_NAME_ => "remito_cerrado",
        F_ALIAS_ => "Notas de Remision Cerradas",
        F_HELP_ => "Notas de Remision Cerradas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "remito",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.remito",
        F_FILTER_ => "rem_estado=|{Cerrada}|",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "func_extras",
        F_ALIAS_ => "Ingresos Extras de Funcionarios",
        F_HELP_ => "Ingresos Extras de Funcionarios",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "func_ingresos",
        F_ALIAS_ => "Ingresos Extras de Funcionarios",
        F_HELP_ => "Ingresos Extras de Funcionarios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "func_extras",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.func_ingresos",
        F_FILTER_ => "desc_estado=|{Pendiente}|",
        G_SHOW_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "pagos_adelant",
        F_ALIAS_ => "Pagos Adelantados",
        F_HELP_ => "Pagos Adelantados",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "rep_compras",
        F_ALIAS_ => "Reportes de Compras/Ventas",
        F_HELP_ => "Reportes de Compras/Ventas por totales",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reportes",
        F_FILTER_ => "",
        G_SHOW_ => "136841256"));

$Obj->Add(
    array(
        F_NAME_ => "rep_cmp_vent_de",
        F_ALIAS_ => "Reporte Compras/Ventas Detalladas",
        F_HELP_ => "Reporte Compras/Ventas Detalladas ",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reprt_detallado",
        F_FILTER_ => "",
        G_SHOW_ => "136841256"));

$Obj->Add(
    array(
        F_NAME_ => "rep_cmp_vent_d2",
        F_ALIAS_ => "Reporte Compras/Ventas Detalladas (Editable)",
        F_HELP_ => "Reporte Compras/Ventas Detalladas 2",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reprt_detallado2",
        F_FILTER_ => "",
        G_SHOW_ => "136841256"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas_cuot",
        F_ALIAS_ => "Reporte Ventas a Credito (Cuotas)",
        F_HELP_ => "Reporte Ventas a Credito (Cuotas)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_ventas_cred",
        F_FILTER_ => "",
        G_SHOW_ => "19013644"));

$Obj->Add(
    array(
        F_NAME_ => "rep_calif_prod",
        F_ALIAS_ => "Reporte Calificacion de Productos x Marg",
        F_HELP_ => "Reporte Calificacion de Productos x Margen",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_calif_prod",
        F_FILTER_ => "",
        G_SHOW_ => "136454144"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stock",
        F_ALIAS_ => "Reporte de Stock",
        F_HELP_ => "Reporte de Stock",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_stock",
        F_FILTER_ => "",
        G_SHOW_ => "136323096"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stcok_min",
        F_ALIAS_ => "Reporte de Stock Minimo",
        F_HELP_ => "Reporte de Stock Minimo",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_stock_min",
        F_FILTER_ => "",
        G_SHOW_ => "137371656"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stad_cortes",
        F_ALIAS_ => "Reporte Estadistico de Cortes",
        F_HELP_ => "Estadistico de Cortes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_stad_cortes",
        F_FILTER_ => "",
        G_SHOW_ => "136454408"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir_chq",
        F_ALIAS_ => "Impresion de Cheques",
        F_HELP_ => "Impresion de Cheques",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.imprimir_chq",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "desc_a_funcion",
        F_ALIAS_ => "Descuentos a Funcionarios",
        F_HELP_ => "Descuentos a Funcionarios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "descuentos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.sue_descuentos",
        F_FILTER_ => "desc_estado=|{Pendiente}|",
        G_SHOW_ => "3080"));

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
        G_SHOW_ => "1028"));

$Obj->Add(
    array(
        F_NAME_ => "pago_indiv",
        F_ALIAS_ => "Pagos Adelantados (Todos)",
        F_HELP_ => "Pagos Adelantados",
        F_TYPE_ => "submenu",
        R_TABLE_ => "pagos_adelant",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.pagos_adelantad",
        F_FILTER_ => "true order by id desc",
        G_SHOW_ => "2056"));

$Obj->Add(
    array(
        F_NAME_ => "det_trans_func",
        F_ALIAS_ => "Movimientos de cuentas de Funcionarios",
        F_HELP_ => "Detalle de Movimientos de cuentas de Funcionarios",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.det_mov_func",
        F_FILTER_ => "",
        G_SHOW_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "det_mis_trans",
        F_ALIAS_ => "Detalle de Mis Movimientos de Cuenta",
        F_HELP_ => "Detalle de Mis Movimientos de Cuenta",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.det_mis_Mov",
        F_FILTER_ => "",
        G_SHOW_ => "255"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas_conv",
        F_ALIAS_ => "Reporte de Ventas con Convenios",
        F_HELP_ => "Reporte de Ventas con Convenios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_vtas_conv",
        F_FILTER_ => "",
        G_SHOW_ => "9224"));

$Obj->Add(
    array(
        F_NAME_ => "cuentas_cobrar",
        F_ALIAS_ => "Cuentas por Cobrar",
        F_HELP_ => "Cuentas por Cobrar",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.caja_ctas_cob",
        F_FILTER_ => "",
        G_SHOW_ => "9260"));

$Obj->Add(
    array(
        F_NAME_ => "cuentas_cobrarv",
        F_ALIAS_ => "Cuentas por Cobrar (Ver)",
        F_HELP_ => "Cuentas por Cobrar",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.caja_ctas_cobv",
        F_FILTER_ => "",
        G_SHOW_ => "1068"));

$Obj->Add(
    array(
        F_NAME_ => "cuentas_pagar",
        F_ALIAS_ => "Compras Cerradas",
        F_HELP_ => "Cuentas por Pagar",
        F_TYPE_ => "submenu",
        R_TABLE_ => "compras_general",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.caja_ctas_pagar",
        F_FILTER_ => "",
        G_SHOW_ => "3112"));

$Obj->Add(
    array(
        F_NAME_ => "ventas_convenio",
        F_ALIAS_ => "Reporte de Ventas con Convenios (Cuotas)",
        F_HELP_ => "Reporte de Ventas con Convenios (Cuotas)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_ventas_conv",
        F_FILTER_ => "",
        G_SHOW_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "usuarios",
        F_ALIAS_ => "Usuarios",
        F_HELP_ => "Usuarios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_users",
        F_FILTER_ => "",
        G_SHOW_ => "544"));

$Obj->Add(
    array(
        F_NAME_ => "_passwd_all",
        F_ALIAS_ => "Contraseñas de Usuarios",
        F_HELP_ => "Permite el cambio de la contrasena del usuario",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.user_pass__",
        F_FILTER_ => "",
        G_SHOW_ => "544"));

$Obj->Add(
    array(
        F_NAME_ => "mnt_frmto_chq",
        F_ALIAS_ => "Formatos de Cheques",
        F_HELP_ => "Formatos de Cheques",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_bcos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.chq_formatos",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "rep_translados",
        F_ALIAS_ => "Reporte de Translados de Mercaderias (Ad",
        F_HELP_ => "Reporte de Translados de Mercaderias (Admin)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_translados",
        F_FILTER_ => "",
        G_SHOW_ => "24"));

$Obj->Add(
    array(
        F_NAME_ => "rep_translados2",
        F_ALIAS_ => "Reporte de Translados de Mercaderias",
        F_HELP_ => "Reporte de Translados de Mercaderias",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_translados2",
        F_FILTER_ => "",
        G_SHOW_ => "2236440"));

$Obj->Add(
    array(
        F_NAME_ => "ventas_abiertas",
        F_ALIAS_ => "Mis Ventas Abiertas",
        F_HELP_ => "Mis Ventas Abiertas",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ventas_abiertas",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "mis_vntas_cerr",
        F_ALIAS_ => "Mis Ventas Cerradas",
        F_HELP_ => "Mis Ventas Cerradas",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ventas_cerr_vend",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "fact_presup",
        F_ALIAS_ => "Nuevo Presupuesto",
        F_HELP_ => "Presupuestos",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.presupuesto",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "mis_presupuestos",
        F_ALIAS_ => "Mis Presupuestos",
        F_HELP_ => "Mis Presupuestos",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mis_presupuestos",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "imprimir_lista",
        F_ALIAS_ => "Impresion de Listados",
        F_HELP_ => "Impresion de Listados",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "131104"));

$Obj->Add(
    array(
        F_NAME_ => "lista_prec_5",
        F_ALIAS_ => "Lista de Precios",
        F_HELP_ => "Imprimir lista de Precios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "imprimir_lista",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.lista_precios",
        F_FILTER_ => "",
        G_SHOW_ => "134217858"));

$Obj->Add(
    array(
        F_NAME_ => "lista_prec_m",
        F_ALIAS_ => "Lista de Precios Mayoristas",
        F_HELP_ => "Imprimir lista de Precios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "imprimir_lista",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.lista_precios_may",
        F_FILTER_ => "",
        G_SHOW_ => "4325408"));

$Obj->Add(
    array(
        F_NAME_ => "rep_mis_ventas",
        F_ALIAS_ => "Resumen de mis Ventas",
        F_HELP_ => "Resumen de mis Ventas",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_mis_ventas",
        F_FILTER_ => "",
        G_SHOW_ => "2"));

$Obj->Add(
    array(
        F_NAME_ => "rep_vnts_func",
        F_ALIAS_ => "Ventas de Funcionarios",
        F_HELP_ => "Ventas de Funcionarios",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_vnts_x_func",
        F_FILTER_ => "",
        G_SHOW_ => "134229004"));

$Obj->Add(
    array(
        F_NAME_ => "transf_cuentas",
        F_ALIAS_ => "Transferencias entre Cuentas",
        F_HELP_ => "Transferencias entre Cuentas",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.trans_entre_cta",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "reg_tesorria",
        F_ALIAS_ => "Registro General de Tesoreria",
        F_HELP_ => "Registro de Tesoreria",
        F_TYPE_ => "menu",
        R_TABLE_ => "tesoreria",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.regist_testoria",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "reg_tesor_cons",
        F_ALIAS_ => "Consultar Registro de Tesoreria",
        F_HELP_ => "Consultar Registro de Tesoreria",
        F_TYPE_ => "menu",
        R_TABLE_ => "tesoreria",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reg_tesor_cons",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_fallas",
        F_ALIAS_ => "Tipos de Fallas",
        F_HELP_ => "Clasificación de Tipos de fallas en las Piezas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_tipo_fallas",
        F_FILTER_ => "",
        G_SHOW_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "rem_ab_x_suc",
        F_ALIAS_ => "Remisiones Abiertas de esta Sucursal",
        F_HELP_ => "Remisiones Abiertas de esta Sucursal",
        F_TYPE_ => "submenu",
        R_TABLE_ => "remito",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rem_ab_x_suc",
        F_FILTER_ => "",
        G_SHOW_ => "555745424"));

$Obj->Add(
    array(
        F_NAME_ => "rem_proc_x_suc",
        F_ALIAS_ => "Remisiones en Proceso de esta Sucursal",
        F_HELP_ => "Remisiones en Proceso de esta Sucursal",
        F_TYPE_ => "submenu",
        R_TABLE_ => "remito",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rem_proc_x_suc",
        F_FILTER_ => "",
        G_SHOW_ => "555745424"));

$Obj->Add(
    array(
        F_NAME_ => "ajuste_prod",
        F_ALIAS_ => "Movimiento de Productos",
        F_HELP_ => "Movimiento de Productos",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.traza_prodcutos",
        F_FILTER_ => "",
        G_SHOW_ => "141567120"));

$Obj->Add(
    array(
        F_NAME_ => "reporte_cons",
        F_ALIAS_ => "Reporte de Consolidaciones (Tesoreria)",
        F_HELP_ => "Reporte de Consolidaciones Solo para el Tesorero",
        F_TYPE_ => "menu",
        R_TABLE_ => "tesoreria",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_consolid",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "rep_prod_prov",
        F_ALIAS_ => "Reporte Productos x Proveedor",
        F_HELP_ => "Reporte Productos x Proveedor",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_prods_prov",
        F_FILTER_ => "",
        G_SHOW_ => "136454272"));

$Obj->Add(
    array(
        F_NAME_ => "rep_prod_vend",
        F_ALIAS_ => "Reporte Variado de Productos",
        F_HELP_ => "Reporte Variado de Productos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_prods_vend",
        F_FILTER_ => "",
        G_SHOW_ => "134217858"));

$Obj->Add(
    array(
        F_NAME_ => "rep_mov_caja",
        F_ALIAS_ => "Reporte de Movimientos de Caja",
        F_HELP_ => "Reporte de Movimientos de Caja",
        F_TYPE_ => "menu",
        R_TABLE_ => "tesoreria",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_mov_caja",
        F_FILTER_ => "",
        G_SHOW_ => "1032"));

$Obj->Add(
    array(
        F_NAME_ => "vent_cons",
        F_ALIAS_ => "Consultar Venta",
        F_HELP_ => "Consultar Venta",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.venta_cons",
        F_FILTER_ => "",
        G_SHOW_ => "2229260"));

$Obj->Add(
    array(
        F_NAME_ => "act_prod",
        F_ALIAS_ => "Analisis de Productos (Actualizacion)",
        F_HELP_ => "Analisis de Productos (Actualizacion)",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.prod_act",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "rep_consolid_ad",
        F_ALIAS_ => "Reporte Consolidaciones (Administracion)",
        F_HELP_ => "Reporte Consolidaciones (Administracion)",
        F_TYPE_ => "menu",
        R_TABLE_ => "tesoreria",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_consolid_admin",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "inf_ctas_cob",
        F_ALIAS_ => "Informe de Cuentas por cobrar",
        F_HELP_ => "Informe de Cuentas por cobrar",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_cuentas_cob",
        F_FILTER_ => "",
        G_SHOW_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "log_audit",
        F_ALIAS_ => "Log de Autitoria",
        F_HELP_ => "Log de Autitoria",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.audit_log_",
        F_FILTER_ => "",
        G_SHOW_ => "65568"));

$Obj->Add(
    array(
        F_NAME_ => "cons_audit_log",
        F_ALIAS_ => "Consultar Log de Autitoria",
        F_HELP_ => "Consultar Log de Autitoria",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.audit_log_cons",
        F_FILTER_ => "",
        G_SHOW_ => "65568"));

$Obj->Add(
    array(
        F_NAME_ => "coor_prod",
        F_ALIAS_ => "Correccion de Productos",
        F_HELP_ => "Correccion de Productos",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.correcc_prod",
        F_FILTER_ => "",
        G_SHOW_ => "131104"));

$Obj->Add(
    array(
        F_NAME_ => "lista_gr_tipo",
        F_ALIAS_ => "Lista por Grupo y Tipo",
        F_HELP_ => "Lista por Grupo y Tipo",
        F_TYPE_ => "submenu",
        R_TABLE_ => "imprimir_lista",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_lista_gr_tip",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "rep_prod_stock",
        F_ALIAS_ => "Reporte Stock Actual",
        F_HELP_ => "Reporte Stock Actual",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_productos_stock",
        F_FILTER_ => "",
        G_SHOW_ => "136388656"));

$Obj->Add(
    array(
        F_NAME_ => "mnt_system",
        F_ALIAS_ => "Mantenimiento de Sistema",
        F_HELP_ => "Mantenimiento de Sistema",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

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
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "gastos",
        F_ALIAS_ => "Registro de Gastos",
        F_HELP_ => "Registro de Gastos",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.gastos",
        F_FILTER_ => "true order by id desc",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "gastos_x_suc",
        F_ALIAS_ => "Registro de Gastos x SUC",
        F_HELP_ => "Registro de Gastos",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.gastos_x_suc",
        F_FILTER_ => "true order by id desc",
        G_SHOW_ => "16777248"));

$Obj->Add(
    array(
        F_NAME_ => "gastos_cons",
        F_ALIAS_ => "Consultar Gastos",
        F_HELP_ => "Registro de Gastos",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.gastos_cons",
        F_FILTER_ => "",
        G_SHOW_ => "16777248"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_ctas_movs",
        F_ALIAS_ => "Movimientos de Cuentas",
        F_HELP_ => "Movimientos de Cuentas",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.bcos_ctas_movs",
        F_FILTER_ => "",
        G_SHOW_ => "1064"));

$Obj->Add(
    array(
        F_NAME_ => "remito_cons",
        F_ALIAS_ => "Consultar Nota de Remision",
        F_HELP_ => "Consultar Nota de Remision",
        F_TYPE_ => "submenu",
        R_TABLE_ => "remito",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.remito_cons",
        F_FILTER_ => "",
        G_SHOW_ => "18882744"));

$Obj->Add(
    array(
        F_NAME_ => "pago_sueldos",
        F_ALIAS_ => "Reporte Pago de Sueldos (SUC)",
        F_HELP_ => "Reporte Pago de Sueldos por Sucursal",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.sue_func_all",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "caja_chica_ab",
        F_ALIAS_ => "Caja Chica",
        F_HELP_ => "Caja Chica",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.caja_chi_x_suc",
        F_FILTER_ => "",
        G_SHOW_ => "9220"));

$Obj->Add(
    array(
        F_NAME_ => "lista_clientes",
        F_ALIAS_ => "Lista de Clientes",
        F_HELP_ => "Lista de Clientes ",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_cli_view",
        F_FILTER_ => "",
        G_SHOW_ => "131072"));

$Obj->Add(
    array(
        F_NAME_ => "mnt_pend",
        F_ALIAS_ => "Mantenimientos Pendientes",
        F_HELP_ => "Mantenimientos Pendientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "mnt_system",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_system",
        F_FILTER_ => "estado=|{Pendiente}|",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "mnt_anu",
        F_ALIAS_ => "Mantenimientos Anulados",
        F_HELP_ => "Mantenimientos Anulados",
        F_TYPE_ => "submenu",
        R_TABLE_ => "mnt_system",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_system",
        F_FILTER_ => "estado=|{Anulado}|",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "mnt_can",
        F_ALIAS_ => "Mantenimientos Cancelados",
        F_HELP_ => "Mantenimientos Cancelados",
        F_TYPE_ => "submenu",
        R_TABLE_ => "mnt_system",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_system",
        F_FILTER_ => "estado=|{Cancelado}|",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "mnt_prog",
        F_ALIAS_ => "Mantenimientos En Progreso",
        F_HELP_ => "Mantenimientos En Progreso",
        F_TYPE_ => "submenu",
        R_TABLE_ => "mnt_system",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_system",
        F_FILTER_ => "estado=|{En Progreso}|",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "rep_mov_caja_in",
        F_ALIAS_ => "Reporte Movimientos de Caja",
        F_HELP_ => "Reporte Movimientos de Caja",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_mov_caja_in",
        F_FILTER_ => "",
        G_SHOW_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "compras_sin_dff",
        F_ALIAS_ => "Compras Sin Detalle Financiero (Filtro)",
        F_HELP_ => "Compras Sin Detalle Financiero (Filtro)",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ctas_pag_sdf_fi",
        F_FILTER_ => "",
        G_SHOW_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cons_compras_st",
        F_ALIAS_ => "Compras (General) Stock",
        F_HELP_ => "Compras (General) Stock",
        F_TYPE_ => "submenu",
        R_TABLE_ => "compras_general",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cons_compras_st",
        F_FILTER_ => "",
        G_SHOW_ => "65552"));

$Obj->Add(
    array(
        F_NAME_ => "transf",
        F_ALIAS_ => "Transferencias entre Piezas",
        F_HELP_ => "Transferencias entre Piezas",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.transf_piezas",
        F_FILTER_ => "",
        G_SHOW_ => "65584"));

$Obj->Add(
    array(
        F_NAME_ => "transferencias",
        F_ALIAS_ => "Transferencias entre Piezas en Gral.",
        F_HELP_ => "Transferencias entre Piezas en Gral.",
        F_TYPE_ => "submenu",
        R_TABLE_ => "transf",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.transf_piezas",
        F_FILTER_ => "",
        G_SHOW_ => "65584"));

$Obj->Add(
    array(
        F_NAME_ => "transfepend",
        F_ALIAS_ => "Transferencias entre Piezas Pendientes",
        F_HELP_ => "Transferencias entre Piezas Pendientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "transf",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.transf_piezas",
        F_FILTER_ => "estado=|{Pendiete}|",
        G_SHOW_ => "2162688"));

$Obj->Add(
    array(
        F_NAME_ => "transfrecib",
        F_ALIAS_ => "Transferencias entre Piezas Recibidas",
        F_HELP_ => "Transferencias entre Piezas en Recibidas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "transf",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.transf_piezas",
        F_FILTER_ => "estado=|{Recibido}|",
        G_SHOW_ => "65568"));

$Obj->Add(
    array(
        F_NAME_ => "transf_pend",
        F_ALIAS_ => "Transferencias de Piezas Pendientes",
        F_HELP_ => "Transferencias de Piezas Pendientes",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.transf_pend",
        F_FILTER_ => "",
        G_SHOW_ => "128"));

$Obj->Add(
    array(
        F_NAME_ => "rep_cheques",
        F_ALIAS_ => "Reporte de Cheques",
        F_HELP_ => "Reporte de Cheques",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.bcos_chq_rep",
        F_FILTER_ => "",
        G_SHOW_ => "1064"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_corr_saldo",
        F_ALIAS_ => "Correccion de Saldo",
        F_HELP_ => "Correccion de Saldo",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.bcos_corr_saldo",
        F_FILTER_ => "",
        G_SHOW_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "rep_mov_cuenta",
        F_ALIAS_ => "Reporte de Movimientos de Cuenta",
        F_HELP_ => "Reporte de Movimientos de Cuenta",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.bcos_rep_mov",
        F_FILTER_ => "",
        G_SHOW_ => "1056"));

$Obj->Add(
    array(
        F_NAME_ => "cuotas_de_conv",
        F_ALIAS_ => "Cuotas de Convenios",
        F_HELP_ => "Cuotas de Convenios",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.cuotas_conv",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "rep_mov_cj_ts",
        F_ALIAS_ => "Reporte Movimientos de Caja Tesoreria",
        F_HELP_ => "Reporte Movimientos de Caja Tesoreria",
        F_TYPE_ => "menu",
        R_TABLE_ => "tesoreria",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_mov_caja_ts",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "cons_ctas_conv",
        F_ALIAS_ => "Consultar Cuotas de Convenios",
        F_HELP_ => "Consultar Cuotas de Convenios",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cuotas_conv_cons",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "rep_recup_fact",
        F_ALIAS_ => "Reporte de Recuperacion de Facturas",
        F_HELP_ => "Reporte de Recuperacion de Facturas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_recup_fact",
        F_FILTER_ => "",
        G_SHOW_ => "131104"));

$Obj->Add(
    array(
        F_NAME_ => "vent_tmp",
        F_ALIAS_ => "Consultar Venta (Vendedor x Fecha)",
        F_HELP_ => "Consultar Venta",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.vent_tmp",
        F_FILTER_ => "",
        G_SHOW_ => "8228"));

$Obj->Add(
    array(
        F_NAME_ => "rep_gastos",
        F_ALIAS_ => "Reporte de Gastos",
        F_HELP_ => "Reporte de Gastos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_gastos",
        F_FILTER_ => "",
        G_SHOW_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "cons_descuentos",
        F_ALIAS_ => "Consultar Descuentos",
        F_HELP_ => "Consultar Descuentos de Funcionarios",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.sue_desc_consul",
        F_FILTER_ => "",
        G_SHOW_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "depositos",
        F_ALIAS_ => "Depositos en Cta. Cte. Proveedor",
        F_HELP_ => "Depositos en Cta. Cte. Proveedor",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.depositos",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "ctas_pagadas",
        F_ALIAS_ => "Reporte Cuentas Pagadas",
        F_HELP_ => "Reporte Cuentas Pagadas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_cts_pagadas",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "retazos",
        F_ALIAS_ => "Retazos",
        F_HELP_ => "Productos Retazos",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.retazos",
        F_FILTER_ => "",
        G_SHOW_ => "8224"));

$Obj->Add(
    array(
        F_NAME_ => "rep_vents_ret",
        F_ALIAS_ => "Reporte de Ventas con Retazos",
        F_HELP_ => "Reporte de Ventas con Retazos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_vent_ret",
        F_FILTER_ => "",
        G_SHOW_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "rep_finaliz_pie",
        F_ALIAS_ => "Reporte de Fin de Piezas y Retazos",
        F_HELP_ => "Reporte de Finalizaciones de Piezas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_fdplog",
        F_FILTER_ => "",
        G_SHOW_ => "134357136"));

$Obj->Add(
    array(
        F_NAME_ => "cons_cli",
        F_ALIAS_ => "Buscar Clientes",
        F_HELP_ => "Buscar Clientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mnt_cli_cons",
        F_FILTER_ => "",
        G_SHOW_ => "138551340"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas_fgt",
        F_ALIAS_ => "Reporte Ventas Sector,Grupo,Tipo (ETC)",
        F_HELP_ => "Reporte Ventas Sector,Grupo,Tipo",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.repventa_fgt",
        F_FILTER_ => "",
        G_SHOW_ => "157425664"));

$Obj->Add(
    array(
        F_NAME_ => "cons_extras",
        F_ALIAS_ => "Consultar Ingresos Extras Funcionarios",
        F_HELP_ => "Consultar Ingresos Extras",
        F_TYPE_ => "submenu",
        R_TABLE_ => "func_extras",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.func_ingresos_cons",
        F_FILTER_ => "",
        G_SHOW_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "rep_gr_ventas",
        F_ALIAS_ => "Reporte Grafico de Ventas",
        F_HELP_ => "Reporte Grafico de Ventas",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_grafico",
        F_FILTER_ => "",
        G_SHOW_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ajustes",
        F_ALIAS_ => "Reporte de Ajustes x Proveedor",
        F_HELP_ => "Reporte de Ajustes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_ajustes",
        F_FILTER_ => "",
        G_SHOW_ => "134217776"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ajus_user",
        F_ALIAS_ => "Reporte de Ajustes",
        F_HELP_ => "Reporte de Ajustes x Sucursal y Usuarios",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ajustes_x_user",
        F_FILTER_ => "",
        G_SHOW_ => "422781056"));

$Obj->Add(
    array(
        F_NAME_ => "cons_chq_terc",
        F_ALIAS_ => "Cheques de Terceros (Cobros)",
        F_HELP_ => "Consultar Cheques de Terceros",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq_ter",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cheq_terceros_cons",
        F_FILTER_ => "",
        G_SHOW_ => "1064"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_chq_tr_ins",
        F_ALIAS_ => "Cheques de Terceros (Administracion)",
        F_HELP_ => "Cheques de Terceros (Administracion)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq_ter",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.cheq_terins",
        F_FILTER_ => "chq_recibido=|{}| or chq_recibido=|{No Recibido}|",
        G_SHOW_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_chq_tr_cad",
        F_ALIAS_ => "Cheques de Terceros (Gerencia)",
        F_HELP_ => "Cheques de Terceros (Admin)",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq_ter",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.cheq_ter_ger",
        F_FILTER_ => "chq_recibido=|{Recibido}| and (chq_recibido2=|{}| or chq_recibido2=|{No Recibido}|)",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stock_fgt",
        F_ALIAS_ => "Reporte Stock Resumido",
        F_HELP_ => "Reporte Stock Sector Grupo Tip Resumido",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_stock_FGT",
        F_FILTER_ => "",
        G_SHOW_ => "1187872"));

$Obj->Add(
    array(
        F_NAME_ => "rep_stock_color",
        F_ALIAS_ => "Reporte Stock Colores",
        F_HELP_ => "Reporte Stock Colores",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_stock_colores",
        F_FILTER_ => "",
        G_SHOW_ => "68223248"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas_x_cl",
        F_ALIAS_ => "Reporte de Ventas Por Cliente*",
        F_HELP_ => "Reporte de Ventas Por Cliente",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ventas_x_client",
        F_FILTER_ => "",
        G_SHOW_ => "157425664"));

$Obj->Add(
    array(
        F_NAME_ => "rep_monit_cli",
        F_ALIAS_ => "Reporte Monitoreo de Clientes",
        F_HELP_ => "Reporte Monitoreo de Clientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.monit_client",
        F_FILTER_ => "",
        G_SHOW_ => "157425664"));

$Obj->Add(
    array(
        F_NAME_ => "rep_ventas_x_ve",
        F_ALIAS_ => "Reporte de Ventas Por Vendedor*",
        F_HELP_ => "Reporte de Ventas Por Vendedor",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ventas_x_vend",
        F_FILTER_ => "",
        G_SHOW_ => "21168128"));

$Obj->Add(
    array(
        F_NAME_ => "estado_cta_prov",
        F_ALIAS_ => "Estado de Cuentas Proveedores",
        F_HELP_ => "Estado de Cuentas Proveedores",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.estado_cta_prov",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "liq_salarios_lg",
        F_ALIAS_ => "Liquidacion Legal de Salarios",
        F_HELP_ => "Liquidacion Legal de Salarios",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "liq_sal_pendien",
        F_ALIAS_ => "Liquidaciones Pendientes",
        F_HELP_ => "Liquidaciones Pendientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "liq_salarios_lg",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.liq_salarios_lg",
        F_FILTER_ => "estado != |{X}|",
        G_SHOW_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "liq_sal_impres",
        F_ALIAS_ => "Liquidaciones Impresas",
        F_HELP_ => "Liquidaciones Impresas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "liq_salarios_lg",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.liq_salarios_lg",
        F_FILTER_ => "estado = |{X}|",
        G_SHOW_ => "2048"));

$Obj->Add(
    array(
        F_NAME_ => "rep_alta_client",
        F_ALIAS_ => "Reporte de Altas de Clientes",
        F_HELP_ => "Reporte de Altas de Clientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_alta_client",
        F_FILTER_ => "",
        G_SHOW_ => "153231360"));

$Obj->Add(
    array(
        F_NAME_ => "dev_prods_prov",
        F_ALIAS_ => "Devolucion de Productos",
        F_HELP_ => "Devolucion de Productos a Proveedores",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mov_compras_dev",
        F_FILTER_ => "",
        G_SHOW_ => "65808"));

$Obj->Add(
    array(
        F_NAME_ => "notas_pedido",
        F_ALIAS_ => "Notas de Pedido",
        F_HELP_ => "Notas de Pedido",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "677388448"));

$Obj->Add(
    array(
        F_NAME_ => "ped_ab_x_suc",
        F_ALIAS_ => "Pedidos Abiertos de Esta Sucursal",
        F_HELP_ => "Pedidos Abiertos de Esta Sucursal",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_pedido",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.pedido_ab_xsuc",
        F_FILTER_ => "",
        G_SHOW_ => "140517552"));

$Obj->Add(
    array(
        F_NAME_ => "ped_pn_x_suc",
        F_ALIAS_ => "Pedidos Pendientes Entrantes  <----",
        F_HELP_ => "Pedidos Pendientes Entrantes a Esta Sucursal",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_pedido",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.pedido_pn_xsuc",
        F_FILTER_ => "",
        G_SHOW_ => "673194160"));

$Obj->Add(
    array(
        F_NAME_ => "ped_pn_x_sal",
        F_ALIAS_ => "Pedidos Pendientes Salientes  ---->",
        F_HELP_ => "Pedidos Pendientes Salientes de Esta Sucursal",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_pedido",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.pedido_pn_sal",
        F_FILTER_ => "",
        G_SHOW_ => "136454176"));

$Obj->Add(
    array(
        F_NAME_ => "ped_pn_x_pr",
        F_ALIAS_ => "Pedidos Pendientes a Proveedores",
        F_HELP_ => "Pedidos que faltan solicitar a Proveedores",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_pedido",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.pedido_pn_prov",
        F_FILTER_ => "",
        G_SHOW_ => "65840"));

$Obj->Add(
    array(
        F_NAME_ => "ped_cr_x_suc",
        F_ALIAS_ => "Pedidos Cerrados",
        F_HELP_ => "Pedidos Cerrados de Esta Sucursal",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_pedido",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.nota_pedido",
        F_FILTER_ => "estado=|{Cerrada}| order by id desc",
        G_SHOW_ => "136323120"));

$Obj->Add(
    array(
        F_NAME_ => "ped_cons",
        F_ALIAS_ => "Consultar Pedidos",
        F_HELP_ => "Consultar Pedidos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_pedido",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.nota_pedido_cons",
        F_FILTER_ => "",
        G_SHOW_ => "135266464"));

$Obj->Add(
    array(
        F_NAME_ => "ped_reports",
        F_ALIAS_ => "Reporte de Pedidos y Tracking",
        F_HELP_ => "Reporte de Pedidos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_pedido",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.pedido_rep",
        F_FILTER_ => "",
        G_SHOW_ => "140517552"));

$Obj->Add(
    array(
        F_NAME_ => "buscar",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar Clientes Proveedores",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.buscador",
        F_FILTER_ => "",
        G_SHOW_ => "17172776"));

$Obj->Add(
    array(
        F_NAME_ => "agenda",
        F_ALIAS_ => "Agenda",
        F_HELP_ => "Agenda",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.agenda",
        F_FILTER_ => "",
        G_SHOW_ => "393216"));

$Obj->Add(
    array(
        F_NAME_ => "ven_en_caja_aud",
        F_ALIAS_ => "Ventas en Caja x Sucursal",
        F_HELP_ => "Ventas en Caja",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.fact_en_caja_filter",
        F_FILTER_ => "",
        G_SHOW_ => "131072"));

$Obj->Add(
    array(
        F_NAME_ => "devoluciones",
        F_ALIAS_ => "Devoluciones de Productos",
        F_HELP_ => "Devoluciones de Productos",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.devoluciones",
        F_FILTER_ => "",
        G_SHOW_ => "8332"));

$Obj->Add(
    array(
        F_NAME_ => "soicitud_devol",
        F_ALIAS_ => "Registro de Solicitud de Devoluciones",
        F_HELP_ => "Registro de Solicitud de Devoluciones",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.reg_pedido_dev",
        F_FILTER_ => "",
        G_SHOW_ => "134488228"));

$Obj->Add(
    array(
        F_NAME_ => "vales_de_compra",
        F_ALIAS_ => "Vales de Compras",
        F_HELP_ => "Vales de Compras",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.vales_com_x_suc",
        F_FILTER_ => "",
        G_SHOW_ => "1"));

$Obj->Add(
    array(
        F_NAME_ => "sorteo",
        F_ALIAS_ => "Sorteo de Vales",
        F_HELP_ => "sorteo",
        F_TYPE_ => "menu",
        R_TABLE_ => "varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.sorteos",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "comparat_ventas",
        F_ALIAS_ => "Reporte comparativo de Ventas",
        F_HELP_ => "Reporte comparativo de Ventas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.comparat_ventas",
        F_FILTER_ => "",
        G_SHOW_ => "131360"));

$Obj->Add(
    array(
        F_NAME_ => "comparat_cli",
        F_ALIAS_ => "Reporte comparativo x Productos",
        F_HELP_ => "Reporte comparativo x Productos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.comparat_cli_pr",
        F_FILTER_ => "",
        G_SHOW_ => "4333600"));

$Obj->Add(
    array(
        F_NAME_ => "rep_prod_undef",
        F_ALIAS_ => "Reporte de Productos Indefinidos",
        F_HELP_ => "Reporte de Productos Indefinidos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_prod_undef",
        F_FILTER_ => "",
        G_SHOW_ => "196768"));

$Obj->Add(
    array(
        F_NAME_ => "prestamosp",
        F_ALIAS_ => "Prestamos",
        F_HELP_ => "Prestamos",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.prestamos",
        F_FILTER_ => "estado=|{Pendiente}|",
        G_SHOW_ => "12"));

$Obj->Add(
    array(
        F_NAME_ => "prestamosc",
        F_ALIAS_ => "Prestamos Cancelados",
        F_HELP_ => "Prestamos",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.prestamos",
        F_FILTER_ => "estado=|{Cancelado}|",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "repos_cod_indef",
        F_ALIAS_ => "Reposicion de Codigos Indefinidos",
        F_HELP_ => "Reposicion de Codigos Indefinidos",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.repos_pos_venta",
        F_FILTER_ => "",
        G_SHOW_ => "65664"));

$Obj->Add(
    array(
        F_NAME_ => "reporte_prestam",
        F_ALIAS_ => "Reporte de Prestamos",
        F_HELP_ => "Reporte de Prestamos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_prestamos",
        F_FILTER_ => "",
        G_SHOW_ => "40"));

$Obj->Add(
    array(
        F_NAME_ => "docs",
        F_ALIAS_ => "Documentos Legales",
        F_HELP_ => "Documentos Legales",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "busc_prestamos",
        F_ALIAS_ => "Buscar Prestamos",
        F_HELP_ => "Buscar Prestamos",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.prestamos_cons",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "cambio_div",
        F_ALIAS_ => "Cambio de Divisas",
        F_HELP_ => "Cambio de Divisas",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cambio_div",
        F_FILTER_ => "",
        G_SHOW_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "deposito_cc",
        F_ALIAS_ => "Depositos en Cuenta Corriente",
        F_HELP_ => "Depositos en Cuenta Corriente",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.depositos_cc",
        F_FILTER_ => "",
        G_SHOW_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "extrac_caja",
        F_ALIAS_ => "Extraccion de Caja",
        F_HELP_ => "Extraccion de Caja",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.extracc_caja",
        F_FILTER_ => "",
        G_SHOW_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "docs_hab",
        F_ALIAS_ => "Carga de Documentos Legales",
        F_HELP_ => "Documentos Abiertos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "docs",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.docs",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "docs_legales_re",
        F_ALIAS_ => "Reporte de Documentos Legales",
        F_HELP_ => "Reporte de Documentos Legales",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.docs_rep",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "docs_leg_cons",
        F_ALIAS_ => "Consultar Documentos Legales",
        F_HELP_ => "Consultar Documentos Legales",
        F_TYPE_ => "submenu",
        R_TABLE_ => "docs",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.docs_cons",
        F_FILTER_ => "",
        G_SHOW_ => "8"));

$Obj->Add(
    array(
        F_NAME_ => "vent_discr",
        F_ALIAS_ => "Ventas Discriminadas/Mayoristas",
        F_HELP_ => "Ventas Discriminadas o Mayoristas",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ventas_discrim",
        F_FILTER_ => "",
        G_SHOW_ => "8352"));

$Obj->Add(
    array(
        F_NAME_ => "reserv",
        F_ALIAS_ => "Reservas",
        F_HELP_ => "Reservas",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reservas",
        F_FILTER_ => "",
        G_SHOW_ => "134348802"));

$Obj->Add(
    array(
        F_NAME_ => "reservas",
        F_ALIAS_ => "Generar Reserva",
        F_HELP_ => "Reservas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "reserv",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reservas",
        F_FILTER_ => "",
        G_SHOW_ => "134217730"));

$Obj->Add(
    array(
        F_NAME_ => "reser_ab_x_suc",
        F_ALIAS_ => "Reservas Abiertas",
        F_HELP_ => "Reservas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "reserv",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reser_ab_x_suc",
        F_FILTER_ => "",
        G_SHOW_ => "134356996"));

$Obj->Add(
    array(
        F_NAME_ => "reservas_x_suc",
        F_ALIAS_ => "Reservas en Caja",
        F_HELP_ => "Reservas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "reserv",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reservas_x_suc",
        F_FILTER_ => "",
        G_SHOW_ => "134356996"));

$Obj->Add(
    array(
        F_NAME_ => "reserv_pen_suc",
        F_ALIAS_ => "Reservas Pendientes de Retiro",
        F_HELP_ => "Reservas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "reserv",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reserv_pen_suc",
        F_FILTER_ => "",
        G_SHOW_ => "134356996"));

$Obj->Add(
    array(
        F_NAME_ => "reserv_ven_suc",
        F_ALIAS_ => "Reservas Vencidas",
        F_HELP_ => "Reservas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "reserv",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reserv_ven_suc",
        F_FILTER_ => "",
        G_SHOW_ => "134356996"));

$Obj->Add(
    array(
        F_NAME_ => "reserv_rep",
        F_ALIAS_ => "Reporte de Reservas",
        F_HELP_ => "Reservas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "reserv",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.reservas_rep",
        F_FILTER_ => "",
        G_SHOW_ => "134356996"));

$Obj->Add(
    array(
        F_NAME_ => "nota_compra",
        F_ALIAS_ => "Nota de Compra a Comun",
        F_HELP_ => "Nota de Compra a Proveedores",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.nota_compra",
        F_FILTER_ => "",
        G_SHOW_ => "196880"));

$Obj->Add(
    array(
        F_NAME_ => "nota_compra_rep",
        F_ALIAS_ => "Reporte de Notas de Compra",
        F_HELP_ => "Reporte de Notas de Compra",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.nota_compra_rep",
        F_FILTER_ => "",
        G_SHOW_ => "131344"));

$Obj->Add(
    array(
        F_NAME_ => "notas_compras",
        F_ALIAS_ => "Notas de Compras a Proveedores",
        F_HELP_ => "Notas de Compras a Proveedores Nacionales e Internacionales",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.notas_compras",
        F_FILTER_ => "",
        G_SHOW_ => "196880"));

$Obj->Add(
    array(
        F_NAME_ => "ubic_prod_laser",
        F_ALIAS_ => "Ubicacion de Productos (Laser)",
        F_HELP_ => "Ubicacion de Productos",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ubic_ins_laser",
        F_FILTER_ => "",
        G_SHOW_ => "1638416"));

$Obj->Add(
    array(
        F_NAME_ => "ubic_cons",
        F_ALIAS_ => "Consultar Existencia de Productos x Cuadrante",
        F_HELP_ => "Consultar Ubicacion de Productos",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ubic_cons",
        F_FILTER_ => "",
        G_SHOW_ => "1638656"));

$Obj->Add(
    array(
        F_NAME_ => "chq_ter_x_caja",
        F_ALIAS_ => "Cheques de Terceros (Caja)",
        F_HELP_ => "Cheques de Terceros",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.chq_ter_x_cj",
        F_FILTER_ => "",
        G_SHOW_ => "4096"));

$Obj->Add(
    array(
        F_NAME_ => "rep_vent_totale",
        F_ALIAS_ => "Reporte de Ventas TOTALES x SUC",
        F_HELP_ => "Reporte de Ventas TOTALES x SUC",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_ventas_tot",
        F_FILTER_ => "",
        G_SHOW_ => "134359040"));

$Obj->Add(
    array(
        F_NAME_ => "rep_remisiones",
        F_ALIAS_ => "Reporte de Remisiones",
        F_HELP_ => "Reporte de Remisiones",
        F_TYPE_ => "submenu",
        R_TABLE_ => "remito",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_remisiones",
        F_FILTER_ => "",
        G_SHOW_ => "144"));

$Obj->Add(
    array(
        F_NAME_ => "empaque_cortes",
        F_ALIAS_ => "Cortes en Empaque",
        F_HELP_ => "Cortes en Empaque",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.empaque_cortes",
        F_FILTER_ => "",
        G_SHOW_ => "8336"));

$Obj->Add(
    array(
        F_NAME_ => "est_tiempos",
        F_ALIAS_ => "Reporte Estadistico de Tiempos de Ventas",
        F_HELP_ => "Reporte Estadistico de Tiempos de Ventas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.est_tiempos",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "fact_contable",
        F_ALIAS_ => "Facturas Contables",
        F_HELP_ => "Registro de Facturas Contables",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.fact_cont",
        F_FILTER_ => "",
        G_SHOW_ => "16777217"));

$Obj->Add(
    array(
        F_NAME_ => "fact_contab_gen",
        F_ALIAS_ => "Generar Facturas Contables",
        F_HELP_ => "Registro de Facturas Contables",
        F_TYPE_ => "submenu",
        R_TABLE_ => "fact_contable",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.fact_cont_gen",
        F_FILTER_ => "",
        G_SHOW_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "rep_devol",
        F_ALIAS_ => "Reporte de Devoluciones",
        F_HELP_ => "Reporte de Devoluciones",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.devol_rep",
        F_FILTER_ => "",
        G_SHOW_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "bcos_cons_mov",
        F_ALIAS_ => "Consultar Movimientos de Cuenta",
        F_HELP_ => "Consultar Movimientos de Cuenta",
        F_TYPE_ => "menu",
        R_TABLE_ => "bancos",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.bcos_movs_cons",
        F_FILTER_ => "",
        G_SHOW_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "cheq_ter_rep",
        F_ALIAS_ => "Reporte de Cheques de Terceros",
        F_HELP_ => "Reporte de Cheques de Terceros",
        F_TYPE_ => "submenu",
        R_TABLE_ => "bcos_chq_ter",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cheq_terceros_rep",
        F_FILTER_ => "",
        G_SHOW_ => "16786464"));

$Obj->Add(
    array(
        F_NAME_ => "est_cli_x_cat",
        F_ALIAS_ => "Reporte Estructura Clientes x Categoria",
        F_HELP_ => "Reporte Estructura Clientes x Categoria",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.est_cli_x_cat",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "repos_prods",
        F_ALIAS_ => "Reporte para Reposicion de (Intersuc)",
        F_HELP_ => "Reporte para repocicion de Productos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.repos_prod",
        F_FILTER_ => "",
        G_SHOW_ => "131360"));

$Obj->Add(
    array(
        F_NAME_ => "repos_prodsa",
        F_ALIAS_ => "Reporte para Reposicion de (General)",
        F_HELP_ => "Reporte para repocicion de Productos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.repos_prod_a",
        F_FILTER_ => "",
        G_SHOW_ => "139552"));

$Obj->Add(
    array(
        F_NAME_ => "confecciones",
        F_ALIAS_ => "Confecciones",
        F_HELP_ => "Confecciones",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "151068960"));

$Obj->Add(
    array(
        F_NAME_ => "confec_new",
        F_ALIAS_ => "Nueva Confeccion",
        F_HELP_ => "Generar Confecciones Nuevas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "confecciones",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.venta_confec",
        F_FILTER_ => "",
        G_SHOW_ => "151068960"));

$Obj->Add(
    array(
        F_NAME_ => "confec_ab",
        F_ALIAS_ => "Confecciones Abiertas",
        F_HELP_ => "Confecciones Abiertas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "confecciones",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.venta_confec",
        F_FILTER_ => "fact_estado=|{Abierta}| AND fact_vend_cod=p_user_",
        G_SHOW_ => "151068960"));

$Obj->Add(
    array(
        F_NAME_ => "confec_cer",
        F_ALIAS_ => "Confecciones Cerradas",
        F_HELP_ => "Confecciones Cerradas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "confecciones",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.venta_confec",
        F_FILTER_ => "fact_estado=|{Cerrada}| AND fact_vend_cod=p_user_",
        G_SHOW_ => "151068960"));

$Obj->Add(
    array(
        F_NAME_ => "aper_factura",
        F_ALIAS_ => "Abrir Facturas",
        F_HELP_ => "Abrir Facturas",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.vent_aper",
        F_FILTER_ => "",
        G_SHOW_ => "33562752"));

$Obj->Add(
    array(
        F_NAME_ => "fact_cont_x_suc",
        F_ALIAS_ => "Facturas Impresas de Esta Sucursal",
        F_HELP_ => "Facturas Impresas de Esta Sucursal",
        F_TYPE_ => "submenu",
        R_TABLE_ => "fact_contable",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.fact_cont_x_suc",
        F_FILTER_ => "",
        G_SHOW_ => "4"));

$Obj->Add(
    array(
        F_NAME_ => "nota_comp_ab",
        F_ALIAS_ => "Notas de Compras Abiertas",
        F_HELP_ => "Notas de Compras Abiertas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_compras",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.notas_compras",
        F_FILTER_ => "n_estado = |{Abierta}|",
        G_SHOW_ => "196880"));

$Obj->Add(
    array(
        F_NAME_ => "nota_comp_pe",
        F_ALIAS_ => "Notas de Compras Pendientes",
        F_HELP_ => "Notas de Compras Pendientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_compras",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.notas_compras",
        F_FILTER_ => "n_estado = |{Pendiente}|",
        G_SHOW_ => "196880"));

$Obj->Add(
    array(
        F_NAME_ => "nota_comp_ce",
        F_ALIAS_ => "Notas de Compras Cerradas",
        F_HELP_ => "Notas de Compras Cerradas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "notas_compras",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.notas_compras",
        F_FILTER_ => "n_estado = |{Cerrada}|",
        G_SHOW_ => "196880"));

$Obj->Add(
    array(
        F_NAME_ => "asientos_cont",
        F_ALIAS_ => "Asientos Contables",
        F_HELP_ => "Asientos Contables",
        F_TYPE_ => "menu",
        R_TABLE_ => "contab",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.asientos_cont",
        F_FILTER_ => "",
        G_SHOW_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "asientos_cons",
        F_ALIAS_ => "Consultar Asientos Contables",
        F_HELP_ => "Asientos Contables",
        F_TYPE_ => "menu",
        R_TABLE_ => "contab",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.asientos_cons",
        F_FILTER_ => "",
        G_SHOW_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "as_libro_diari",
        F_ALIAS_ => "Impresion de Informes Contables",
        F_HELP_ => "Impresion de Informes Contables",
        F_TYPE_ => "menu",
        R_TABLE_ => "contab",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.as_libro_diario",
        F_FILTER_ => "",
        G_SHOW_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_clientes",
        F_ALIAS_ => "Tipos de Clientes",
        F_HELP_ => "Tipos de Clientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_tipo_cli",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "tabla_prom",
        F_ALIAS_ => "Tabla de Promedios",
        F_HELP_ => "Tabla de Promedios de compras",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_prom_comp",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "categ_vend",
        F_ALIAS_ => "Categorias de Vendedores",
        F_HELP_ => "Tabla de Categorias de Vendedores",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_adm",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_cat_vend",
        F_FILTER_ => "",
        G_SHOW_ => "32"));

$Obj->Add(
    array(
        F_NAME_ => "corr_cli",
        F_ALIAS_ => "Correccion de datos de Clientes",
        F_HELP_ => "Correccion de datos de Clientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mnt_cli_clean",
        F_FILTER_ => "",
        G_SHOW_ => "131072"));

$Obj->Add(
    array(
        F_NAME_ => "faltantes",
        F_ALIAS_ => "Reporte de Productos Faltantes",
        F_HELP_ => "Reporte de Productos Faltantes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_faltantes",
        F_FILTER_ => "",
        G_SHOW_ => "142614560"));

$Obj->Add(
    array(
        F_NAME_ => "control_empaque",
        F_ALIAS_ => "Reporte Control de Empaque",
        F_HELP_ => "Reporte Control de Empaque",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.rep_control_emp",
        F_FILTER_ => "",
        G_SHOW_ => "142615712"));

$Obj->Add(
    array(
        F_NAME_ => "inventario",
        F_ALIAS_ => "Inventario",
        F_HELP_ => "Inventario",
        F_TYPE_ => "menu",
        R_TABLE_ => "man",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.inventario",
        F_FILTER_ => "",
        G_SHOW_ => "67174400"));

$Obj->Add(
    array(
        F_NAME_ => "invent_unit",
        F_ALIAS_ => "Inventario x Unidad",
        F_HELP_ => "Inventario",
        F_TYPE_ => "submenu",
        R_TABLE_ => "inventario",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.inventario",
        F_FILTER_ => "",
        G_SHOW_ => "67108864"));

$Obj->Add(
    array(
        F_NAME_ => "invent_x_peso",
        F_ALIAS_ => "Control de Inventario x Kg.",
        F_HELP_ => "Control de Inventario",
        F_TYPE_ => "submenu",
        R_TABLE_ => "inventario",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.inv",
        F_FILTER_ => "",
        G_SHOW_ => "67108896"));

$Obj->Add(
    array(
        F_NAME_ => "invent_x_peso_b",
        F_ALIAS_ => "Control de Inventario C/Balanza",
        F_HELP_ => "Control de Inventario",
        F_TYPE_ => "submenu",
        R_TABLE_ => "inventario",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.inv_balanza",
        F_FILTER_ => "",
        G_SHOW_ => "67174432"));

$Obj->Add(
    array(
        F_NAME_ => "gramaje",
        F_ALIAS_ => "Calculo de Gramaje",
        F_HELP_ => "Control de Gramaje",
        F_TYPE_ => "submenu",
        R_TABLE_ => "inventario",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.mnt_prod_gram",
        F_FILTER_ => "",
        G_SHOW_ => "67174432"));

$Obj->Add(
    array(
        F_NAME_ => "gram_tara",
        F_ALIAS_ => "Gramaje de Taras",
        F_HELP_ => "Gramaje de las Taras",
        F_TYPE_ => "submenu",
        R_TABLE_ => "inventario",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.taras",
        F_FILTER_ => "",
        G_SHOW_ => "67174432"));

$Obj->Add(
    array(
        F_NAME_ => "det_ventas_x_cl",
        F_ALIAS_ => "Reporte de Ventas con Detalle x Cliente",
        F_HELP_ => "Reporte de Ventas x Cliente Detallado",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.detalle_vent_cli",
        F_FILTER_ => "",
        G_SHOW_ => "130"));

$Obj->Add(
    array(
        F_NAME_ => "rebaje_precios",
        F_ALIAS_ => "Modificación de Precios x Fallas",
        F_HELP_ => "Modificación de Precios x Fallas",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.hist_precios",
        F_FILTER_ => "",
        G_SHOW_ => "413212960"));

$Obj->Add(
    array(
        F_NAME_ => "hist_prec_rep",
        F_ALIAS_ => "Reporte de Modificacion de Precios x Fal",
        F_HELP_ => "Reporte de Alteracion de Precios x Fallas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.hist_prec_rep",
        F_FILTER_ => "",
        G_SHOW_ => "142606376"));

$Obj->Add(
    array(
        F_NAME_ => "vent_discr_may",
        F_ALIAS_ => "Reporte Ventas Discriminadas / Mayorista",
        F_HELP_ => "Reporte Ventas Discriminadas / Mayoristas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.vent_discr_may",
        F_FILTER_ => "",
        G_SHOW_ => "142606376"));

$Obj->Add(
    array(
        F_NAME_ => "nota_credito",
        F_ALIAS_ => "Notas de Credito",
        F_HELP_ => "Notas de Credito",
        F_TYPE_ => "menu",
        R_TABLE_ => "mov_caja",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.nota_credito",
        F_FILTER_ => "",
        G_SHOW_ => "16777220"));

$Obj->Add(
    array(
        F_NAME_ => "ventas_anuladas",
        F_ALIAS_ => "Ventas Anuladas",
        F_HELP_ => "Ventas Anuladas de forma Automatica",
        F_TYPE_ => "menu",
        R_TABLE_ => "facturacion",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.ventas_anuladas",
        F_FILTER_ => "",
        G_SHOW_ => "16785536"));

$Obj->Add(
    array(
        F_NAME_ => "politica_cortes",
        F_ALIAS_ => "Politica de Cortes",
        F_HELP_ => "Politica de Cortes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.pol_cortes",
        F_FILTER_ => "",
        G_SHOW_ => "256"));

$Obj->Add(
    array(
        F_NAME_ => "politica_abast",
        F_ALIAS_ => "Politica de Abastecimiento",
        F_HELP_ => "Politica de Abastecimiento",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_prod",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.pol_abast",
        F_FILTER_ => "",
        G_SHOW_ => "256"));

$Obj->Add(
    array(
        F_NAME_ => "nota_ped_intern",
        F_ALIAS_ => "Notas de Pedidos Internacionales",
        F_HELP_ => "Notas de Pedidos Internacionales",
        F_TYPE_ => "menu",
        R_TABLE_ => "fact_proveedor",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "",
        F_FILTER_ => "",
        G_SHOW_ => "5251072"));

$Obj->Add(
    array(
        F_NAME_ => "pedido_int_ab",
        F_ALIAS_ => "Notas de Pedido Abierta",
        F_HELP_ => "Notas de Pedido Abiertas  para Cargar",
        F_TYPE_ => "submenu",
        R_TABLE_ => "nota_ped_intern",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.pedido_int_cab",
        F_FILTER_ => "estado = |{Abierta}|",
        G_SHOW_ => "5251072"));

$Obj->Add(
    array(
        F_NAME_ => "pedido_int_proc",
        F_ALIAS_ => "Notas de Pedido En Proceso",
        F_HELP_ => "Notas de Pedido En Proceso",
        F_TYPE_ => "submenu",
        R_TABLE_ => "nota_ped_intern",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.pedido_int_cab",
        F_FILTER_ => "estado = |{En_Proceso}|",
        G_SHOW_ => "288"));

$Obj->Add(
    array(
        F_NAME_ => "pedido_int_cerr",
        F_ALIAS_ => "Notas de Pedido Cerradas",
        F_HELP_ => "Notas de Pedido Cerradas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "nota_ped_intern",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.pedido_int_cab",
        F_FILTER_ => "estado = |{Cerrada}|",
        G_SHOW_ => "288"));

$Obj->Add(
    array(
        F_NAME_ => "articulos",
        F_ALIAS_ => "Articulos e Insumos",
        F_HELP_ => "Articulos e Insumos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_articulos",
        F_FILTER_ => "",
        G_SHOW_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "sol_insumo_gen",
        F_ALIAS_ => "Generar Solicitud Articulos e Insumos",
        F_HELP_ => "Solicitud Articulos e Insumos Abiertos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_sol_insumo",
        F_FILTER_ => "estado=|{Abierta}| AND usuario=p_user_",
        G_SHOW_ => "16801824"));

$Obj->Add(
    array(
        F_NAME_ => "sol_insumo",
        F_ALIAS_ => "Solicitud Articulos e Insumos Abiertos",
        F_HELP_ => "Solicitud Articulos e Insumos Abiertos",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_sol_insumo_edit",
        F_FILTER_ => "estado=|{Abierta}| AND usuario=p_user_",
        G_SHOW_ => "16801824"));

$Obj->Add(
    array(
        F_NAME_ => "sol_insumo_p",
        F_ALIAS_ => "Solicitud Articulos e Insumos Pendientes",
        F_HELP_ => "Solicitud Articulos e Insumos Pendientes",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_sol_insumo",
        F_FILTER_ => "estado=|{Pendiente}|",
        G_SHOW_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "sol_insumo_c",
        F_ALIAS_ => "Solicitud Articulos e Insumos Cerradas",
        F_HELP_ => "Solicitud Articulos e Insumos Cerradas",
        F_TYPE_ => "submenu",
        R_TABLE_ => "man_div",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.mnt_sol_insumo",
        F_FILTER_ => "estado=|{Cerrada}|",
        G_SHOW_ => "16777216"));

$Obj->Add(
    array(
        F_NAME_ => "pol_abast_rep",
        F_ALIAS_ => "Reporte de Abastecimiento",
        F_HELP_ => "Reporte de Abastecimiento",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.pol_abast_rep",
        F_FILTER_ => "",
        G_SHOW_ => "8192"));

$Obj->Add(
    array(
        F_NAME_ => "calc_gramaje",
        F_ALIAS_ => "Reporte para Calculo de Gramaje",
        F_HELP_ => "Reporte para Calculo de Gramaje",
        F_TYPE_ => "submenu",
        R_TABLE_ => "rep_varios",
        F_OPER_ => "20_ Consult",
        F_LINK_ => "db.cal_gramaje",
        F_FILTER_ => "",
        G_SHOW_ => "33"));

$Obj->Add(
    array(
        F_NAME_ => "cronog_jornales",
        F_ALIAS_ => "Calendario de Actividades de Jornaleros",
        F_HELP_ => "Calendario de Actividades Jornaleros",
        F_TYPE_ => "menu",
        R_TABLE_ => "sueldos",
        F_OPER_ => "1_ Browse",
        F_LINK_ => "db.cronog_jornales",
        F_FILTER_ => "",
        G_SHOW_ => "2592"));

?>
