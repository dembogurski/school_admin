<?php
$Obj->name = "mnt_prom_comp";
$Obj->alias = "Tabla de Promedios de Compras";
$Obj->help = "Tabla de Promedios de Compras";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prom_comp";
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
        F_NAME_ => "cod_prom",
        F_ALIAS_ => "Codigo de Promedio",
        F_HELP_ => "Codigo de Promedio",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descipcion del promedio de compra Rangos etc",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cat",
        F_ALIAS_ => "Categoria",
        F_HELP_ => "Categoria",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "categorias",
        F_SHOWFIELD_ => "cat_code,cat_descrip",
        F_BROW_ => "1",
        F_ORD_ => "30",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
