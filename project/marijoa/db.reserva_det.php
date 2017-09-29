<?php
$Obj->name = "reserva_det";
$Obj->alias = "Detalle de Reserva";
$Obj->help = "Detalle de Reserva";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "reserva_det";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'SELECT actualiza_reserva('+nro_res.getVal()+','+codigo.getVal()+',|{RS}|)'";
$Obj->p_change = "'SELECT actualiza_reserva('+nro_res.getVal()+','+codigo.getVal()+',|{RS}|)'";
$Obj->p_delete = "'SELECT actualiza_reserva('+nro_res.getVal()+','+codigo.getVal()+',|{No}|)'";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "nro_res",
        F_ALIAS_ => "Nro de Reserva",
        F_HELP_ => "Genera Reserva",
        F_TYPE_ => "text",
        F_LENGTH_ => "6",
        F_ORD_ => "4",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "4",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prod_cant",
        F_ALIAS_ => "Cantidad Actual",
        F_HELP_ => "Cantidad Actual",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "prod_suc",
        F_ALIAS_ => "SUC",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('p_local')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => "Descrip",
        F_HELP_ => "Descipcion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(p_fam,|{ - }|,p_grupo,|{ - }|,p_tipo,|{ - }|,p_color),p_cant,p_local from productos where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
		C_CHANGE_=>"codigo.get()=='000'",
        F_REQUIRED_ => "1",
        F_ORD_ => "16",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cantidad",
        F_ALIAS_ => "Cantidad a Reservar",
        F_HELP_ => "Cantidad de reserva",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "precio",
        F_ALIAS_ => "Precio",
        F_HELP_ => "Precio Minimo para este cliente",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_'+sup['categ']+' FROM mnt_prod WHERE p_cod ='+codigo.getStr() ",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "22",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "subtotal",
        F_ALIAS_ => "SubTotal",
        F_HELP_ => "SubTotal",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "24",
        F_INLINE_ => "1",
        F_FORMULA_ => "cantidad.getVal()*precio.getVal()",
		C_CHANGE_=>"codigo.get()=='000'",
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
        F_ORD_ => "40",
        C_SHOW_ => "descrip.get()=='__NO DATA__' && codigo.get()!='000'",
        F_FORMULA_ => "'( ! ) El producto no existe o ha sido marcado con Fin de Pieza!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lockins",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "false",
        F_FORMULA_ => "if((sup['estado']=='Abierta' && cantidad.getVal() > 0 && cantidad.getVal() <= prod_cant.getVal() && __local.getStr()==prod_suc.getStr() ) || (codigo.get()=='000' && subtotal.getVal()>0) ){  enableAcceptButton() }else{ disableAcceptButton() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
