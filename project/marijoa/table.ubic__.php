<?php
/** marijoa/table.ubic__.php   ( table_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Table->name  = "ubic";
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
        F_NAME_ => "__user",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "fecha",
        F_TYPE_ => "date",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "codigo",
        F_TYPE_ => "varchar(14)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "descrip",
        F_TYPE_ => "varchar(80)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "ultima_oper",
        F_TYPE_ => "varchar(4)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "u_est",
        F_TYPE_ => "varchar(39)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "operacion",
        F_TYPE_ => "varchar(39)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "estant",
        F_TYPE_ => "varchar(41)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "suc",
        F_TYPE_ => "varchar(4)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "estante",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "filax",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "colx",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "cfila",
        F_TYPE_ => "varchar(4)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "ccol",
        F_TYPE_ => "varchar(4)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "fila",
        F_TYPE_ => "varchar(4)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "col",
        F_TYPE_ => "varchar(4)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "__lock",
        F_TYPE_ => "varchar(50)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "__msg",
        F_TYPE_ => "varchar(45)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "__msg2",
        F_TYPE_ => "varchar(45)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "__unlock",
        F_TYPE_ => "varchar(50)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "last_id",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "1",
        F_UNIQ_ => ""));

$Table->Add(
    array(
        F_NAME_ => "estado",
        F_TYPE_ => "varchar(60)",
        F_NULL_ => "",
        F_KEY_ => "",
        F_DEFAULT_ => "",
        F_EXTRA_ => "",
        F_NODB_ => "",
        F_UNIQ_ => ""));

?>
