<?php
/** marijoa/table.caja_cambios__.php   ( table_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Table->name  = "caja_cambios";
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
        F_NAME_ => "cb_fecha",
        F_TYPE_ => "date",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "cb_moneda",
        F_TYPE_ => "varchar(5)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "cb_compra",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "cb_venta",
        F_TYPE_ => "INT",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "cb_ref",
        F_TYPE_ => "varchar(5)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

?>
