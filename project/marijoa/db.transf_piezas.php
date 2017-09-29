<?php
$Obj->name = "transf_piezas";
$Obj->alias = "Transferencias Entre Piezas";
$Obj->help = "Transferencias Entre Piezas";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "transf_piezas";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "'select insertar_transf('+codigo_de.getVal()+','+codigo_a.getVal()+','+cantidad.getVal()+','+cantidad.getVal()+','+estado.getStr()+')'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Uusario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "2",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_ ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha en que se realiza la operación",
        F_TYPE_ => "date",
        F_OPTIONS_ => "20",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "4",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo_de",
        F_ALIAS_ => "Codigo de",
        F_HELP_ => "Codigo de",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_de",
        F_ALIAS_ => "Existencia de",
        F_HELP_ => "Cantidad en Stock o en existencia de",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  p_cant from mnt_prod where  p_cod = '+codigo_de.getVal() ",
        F_QUERY_REF_ => "codigo_de.hasChanged()  ",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip_de",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(p_descri,|{ --- }| ,p_combinado) from mnt_prod where p_cod = '+codigo_de.getVal()",
        F_QUERY_REF_ => "codigo_de.hasChanged()",
        F_LENGTH_ => "100",
        F_REQUIRED_ => "1",
        F_ORD_ => "15",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo_a",
        F_ALIAS_ => "Codigo a",
        F_HELP_ => "Codigo a",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_a",
        F_ALIAS_ => "Existencia a",
        F_HELP_ => "Cantidad en Stock o en existencia al",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  p_cant from mnt_prod where  p_cod = '+codigo_a.getVal() ",
        F_QUERY_REF_ => "codigo_a.hasChanged()  ",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_ORD_ => "22",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip_a",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(p_descri,|{ --- }| ,p_combinado) from mnt_prod where p_cod = '+codigo_a.getVal()",
        F_QUERY_REF_ => "codigo_a.hasChanged()",
        F_LENGTH_ => "100",
        F_REQUIRED_ => "1",
        F_ORD_ => "25",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc_o",
        F_ALIAS_ => "SUC origen",
        F_HELP_ => "SUC origen",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_local from mnt_prod where p_cod ='+codigo_de.getVal()",
        F_QUERY_REF_ => "codigo_de.hasChanged()",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc_de",
        F_ALIAS_ => "SUC destino",
        F_HELP_ => "SUC desctino",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_local from mnt_prod where p_cod ='+codigo_a.getVal()",
        F_QUERY_REF_ => "codigo_a.hasChanged()",
        F_LENGTH_ => "8",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cantidad",
        F_ALIAS_ => "Cantidad a Transferir:",
        F_HELP_ => "Cantidad del ajuste",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_final_de",
        F_ALIAS_ => "Cantidad Final de",
        F_HELP_ => "Cantidad Final de",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_REQUIRED_ => "1",
        F_ORD_ => "46",
        F_FORMULA_ => "cant_de.getVal()-cantidad.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_final_a",
        F_ALIAS_ => "Cantidad Final a",
        F_HELP_ => "Cantidad Final a",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_REQUIRED_ => "1",
        F_ORD_ => "47",
        F_INLINE_ => "1",
        F_FORMULA_ => "cant_a.getVal()+cantidad.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "formula",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_FORMULA_ => "if( suc_o.getStr()==suc_de.getStr() ){ 'Recibido' }else{'Pendiente'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__userr",
        F_ALIAS_ => "Receptor",
        F_HELP_ => "Código del usuario que recibe",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_user_ ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableDeleteButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableChange",
        F_ALIAS_ => "Inhabilita boton de Modificar",
        F_HELP_ => "Inhabilita boton de Modificar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
