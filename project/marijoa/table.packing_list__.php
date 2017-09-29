<?php
/** marijoa/table.packing_list__.php   ( table_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Table->name  = "packing_list";
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
        F_NAME_ => "pack_ref",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_design",
        F_TYPE_ => "varchar(50)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_mar",
        F_TYPE_ => "varchar(20)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_bag",
        F_TYPE_ => "varchar(8)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_precio",
        F_TYPE_ => "DOUBLE(14,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_color_desc",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_each_quty",
        F_TYPE_ => "DOUBLE(14,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_unit",
        F_TYPE_ => "varchar(8)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
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
        F_NAME_ => "p_qty_ticket",
        F_TYPE_ => "DOUBLE(14,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_kg_real",
        F_TYPE_ => "DOUBLE(12,3)",
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
        F_NAME_ => "p_foto",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_obs",
        F_TYPE_ => "varchar(1024)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_equiv",
        F_TYPE_ => "DOUBLE(12,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "p_mts",
        F_TYPE_ => "DOUBLE(12,2)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

?>
