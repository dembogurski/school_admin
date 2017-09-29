<?php
/** marijoa/table.mnt_prod__.php   ( table_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Table->name  = "mnt_prod";
$Table->index = "";

$Table->Add(
    array(
        F_NAME_ => "id",
        F_TYPE_ => "INT UNSIGNED",
        F_NULL_ => "NOT NULL",
        F_KEY_ => "PRI",
        F_DEFAULT_ => "NULL",
        F_EXTRA_ => "AUTO_INCREMENT"));

$Table->Add(
    array(
        F_NAME_ => "p_year",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_anio",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "__lock",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_cod",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_ref",
        F_TYPE_ => "varchar(8)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_factura",
        F_TYPE_ => "varchar(20)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "c_estadofact",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_fecha",
        F_TYPE_ => "date",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_user",
        F_TYPE_ => "varchar(24)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_fam",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_grupo",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_tipo",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_comp",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_temp",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_estruc",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_clasif",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_lisoest",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_color",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_iden",
        F_TYPE_ => "varchar(5)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_descri",
        F_TYPE_ => "varchar(80)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_combinado",
        F_TYPE_ => "varchar(80)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_moneda",
        F_TYPE_ => "varchar(5)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_cambio",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_cant",
        F_TYPE_ => "DOUBLE(15,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_cant_r",
        F_TYPE_ => "DOUBLE(15,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_cant_compra",
        F_TYPE_ => "DOUBLE(14,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_c_total",
        F_TYPE_ => "DOUBLE(15,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_compra",
        F_TYPE_ => "DOUBLE(15,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_porc_recargo",
        F_TYPE_ => "varchar(7)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_valmin",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_precio_1",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_precio_2",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_precio_3",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_precio_4",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_precio_5",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_precio_6",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_precio_7",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "prod_fin_pieza",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_precio_error",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_local",
        F_TYPE_ => "varchar(3)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_ancho",
        F_TYPE_ => "DOUBLE(10,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_kg_bruto",
        F_TYPE_ => "DOUBLE(8,3)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_tara",
        F_TYPE_ => "DOUBLE(12,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_kg",
        F_TYPE_ => "DOUBLE(12,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_gram2",
        F_TYPE_ => "DOUBLE(12,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_gram",
        F_TYPE_ => "DOUBLE(12,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "tolerancia",
        F_TYPE_ => "varchar(4)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "__msggram",
        F_TYPE_ => "varchar(84)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_echo_en",
        F_TYPE_ => "varchar(35)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_import",
        F_TYPE_ => "varchar(40)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_suc_act",
        F_TYPE_ => "varchar(3)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_padre",
        F_TYPE_ => "varchar(10)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "style1",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "__disableDel",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "__disableChange",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_densidad",
        F_TYPE_ => "varchar(14)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_gram_m",
        F_TYPE_ => "DOUBLE(12,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

?>
