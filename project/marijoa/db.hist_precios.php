<?php
$Obj->name = "hist_precios";
$Obj->alias = "Modificacion de Precios";
$Obj->help = "Historial de Modificacion de Precios";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "hist_precios";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "'select modificar_precios('+codigo.getVal()+','+p_precio_1n.getVal()+','+p_precio_2n.getVal()+','+p_precio_3n.getVal()+','+p_precio_4n.getVal()+','+p_precio_5n.getVal()+','+usuario.getStr()+')'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_SHOW_ => "operation!=INSERT_   ",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "2",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_RELTABLE_ => "mnt_func",
        F_ORD_ => "3",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "u_suc",
        F_ALIAS_ => "Sucursal de Usuario",
        F_HELP_ => "Sucursal de Usuario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select local from p_users where name = |{'+p_user_+'}| '",
        F_QUERY_REF_ => "u_suc.firstSQL",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "6",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_OPTIONS_ => " ",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "14",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "20",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant",
        F_ALIAS_ => "Cantidad:",
        F_HELP_ => "Cantidad:",
        F_TYPE_ => "formula",
        F_LENGTH_ => "12",
        F_ORD_ => "21",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_suc",
        F_ALIAS_ => "Suc:",
        F_HELP_ => "Suc:",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_ORD_ => "22",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('p_local')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fdp",
        F_ALIAS_ => "Fin Pieza",
        F_HELP_ => "Fin Pieza",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('prod_fin_pieza')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_ref",
        F_ALIAS_ => "Ref",
        F_HELP_ => "Ref",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "db('p_ref')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select concat(p_fam,|{-}|, p_grupo,|{-}|, p_tipo,|{-}|, p_color,|{-}|, p_descri), p_local, p_cant, prod_fin_pieza,p_ref from mnt_prod where p_cod ='+ codigo.getVal()  ",
        F_QUERY_REF_ => "codigo.hasChanged() ",
        F_LENGTH_ => "100",
        F_NODB_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "motivo",
        F_ALIAS_ => "Motivo",
        F_HELP_ => "Motivo",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_tipo_fallas",
        F_SHOWFIELD_ => "codigo,descrip",
        F_REQUIRED_ => "1",
        F_ORD_ => "32",
        C_VIEW_ => "codigo.getVal()>0",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_f",
        F_ALIAS_ => "Cantidad de metros dañados",
        F_HELP_ => "Cantidad de metros dañados a Fraccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "34",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_mod",
        F_ALIAS_ => "Modificar los Precios del:",
        F_HELP_ => "Elegir el codigo a Modificar los Precios",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Codigo Hijo,Codigo Padre",
        F_NODB_ => "1",
        F_ORD_ => "34",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cant.getVal()>cant_f.getVal()&&cant_f.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_valmin",
        F_ALIAS_ => "Venta mínimo",
        F_HELP_ => "Precio de Venta mínimo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_valmin from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_compra",
        F_ALIAS_ => "Precio Costo    ",
        F_HELP_ => "Precio de Costo Precio de Compra + % Recargo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_compra + ((p_compra * p_porc_recargo) / 100) from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_1",
        F_ALIAS_ => "Precio 1",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_1 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_1n",
        F_ALIAS_ => "Nuevo Precio 1",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_1 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_2",
        F_ALIAS_ => "Precio 2",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_2 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_2n",
        F_ALIAS_ => "Nuevo Precio 2",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_2 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_3",
        F_ALIAS_ => "Precio 3",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_3 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "70",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_3n",
        F_ALIAS_ => "Nuevo Precio 3",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_3 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_4",
        F_ALIAS_ => "Precio 4",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_4 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_4n",
        F_ALIAS_ => "Nuevo Precio 4",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_4 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_5",
        F_ALIAS_ => "Precio 5",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_5 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_5n",
        F_ALIAS_ => "Nuevo Precio 5",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_5 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "p_precio_6",
        F_ALIAS_ => "Precio 6",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_6 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "82",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_6n",
        F_ALIAS_ => "Nuevo Precio 6",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_6 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "82",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

$Obj->Add(
    array(
        F_NAME_ => "p_precio_7",
        F_ALIAS_ => "Precio 7",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_7 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "83",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_7n",
        F_ALIAS_ => "Nuevo Precio 7",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_7 from mnt_prod where p_cod = '+codigo.getVal()",
        F_QUERY_REF_ => "codigo.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "83",
        F_INLINE_ => "1",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			

$Obj->Add(
    array(
        F_NAME_ => "__lock2",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "91",
        C_SHOW_ => "p_suc.get()!=u_suc.get()&&codigo.getVal()>0&&p_suc.get()!=''",
        F_FORMULA_ => "'Este producto no se encuentra en su sucursal!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_REQUIRED_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg1",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "cant_f.getVal()>p_cant.getVal()&&cant_f.getVal()>0",
        F_FORMULA_ => "'Cantidad inexistente!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "(p_precio_1n.getVal()<p_valmin.getVal() || p_precio_2n.getVal() <p_valmin.getVal() || p_precio_3n.getVal()<p_valmin.getVal()|| p_precio_4n.getVal()<p_valmin.getVal() || p_precio_5n.getVal()<p_valmin.getVal()) && p_precio_5n.getVal() > 0",
        F_FORMULA_ => "'Precio menor al minimo'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg3",
        F_ALIAS_ => "Atencion",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "86",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "cant_f.getVal()==p_cant.getVal()&&cant_f.getVal()>0",
        F_FORMULA_ => "'Modificará los precios del codigo Padre por falla, No se creará ningun codigo hijo!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style1",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "130",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msg}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:18px;}|); document.getElementById(|{msg1}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:18px;}|); ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style2",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "140",
        F_INLINE_ => "1",
        C_SHOW_ => "(p_precio_1n.getVal()<p_valmin.getVal() || p_precio_2n.getVal() <p_valmin.getVal() || p_precio_3n.getVal()<p_valmin.getVal()|| p_precio_4n.getVal()<p_valmin.getVal() || p_precio_5n.getVal()<p_valmin.getVal()) && p_precio_5n.getVal() > 0",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msg2}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:18px;}|);  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style3",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "140",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msg3}|).setAttribute(|{style}|,|{height:26px;color:green;font-size:14px;font-weight:bolder}|);  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "upload_images",
        F_ALIAS_ => "Adjuntar Imagenes",
        F_HELP_ => "Adjuntar Imagenes",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.adjuntar_imagen",
        F_NODB_ => "1",
        F_ORD_ => "199",
        C_VIEW_ => "p_cant.getVal()>=cant_f.getVal()&&cant_f.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "proceder_frac",
        F_ALIAS_ => "        Proceder         ",
        F_HELP_ => "Proceder",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.modif_precios",
        F_NODB_ => "1",
        F_ORD_ => "200",
        F_INLINE_ => "1",
        C_SHOW_ => "if( p_cant.getVal()==cant_f.getVal()&&cant_f.getVal() > 0 ){ true }else if(tipo_mod.get()!=''){ true }else{ false }",
        C_VIEW_ => "cant_f.getVal()<=p_cant.getVal()&&cant_f.getVal()>0&&!(p_precio_1n.getVal()<p_valmin.getVal() || p_precio_2n.getVal() <p_valmin.getVal() || p_precio_3n.getVal()<p_valmin.getVal()|| p_precio_4n.getVal()<p_valmin.getVal() || p_precio_5n.getVal() < p_valmin.getVal()) && p_precio_5n.getVal() > 0&&motivo.get()!=''&&obs.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "volumen_orig",
        F_ALIAS_ => "Volumen Original",
        F_HELP_ => "Volumen Original",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "210",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vol_actual",
        F_ALIAS_ => "Volumen Actual",
        F_HELP_ => "Volumen Actual",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "220",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
