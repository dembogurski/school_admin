<?php
$Obj->name = "mnt_ajustes";
$Obj->alias = "Ajustes";
$Obj->help = "Ajustes de Mercaderia";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_ajustes";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "'select ajustar_codigo('+aj_signo.getStr()+','+aj_ajuste.getVal()+','+aj_prod.getVal()+','+aj_inicial.getVal()+','+aj_final.getVal()+','+aj_oper.getStr()+','+aj_motivo.getStr()+','+aj_p_local.getStr()+');'";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "aj_prod",
        F_ALIAS_ => "Producto",
        F_HELP_ => "Codigo del Producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "0",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha del Ajuste",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "20",
        V_DEFAULT_ => "thisDate_",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_usuario",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Usuario",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_ORD_ => "30",
        V_DEFAULT_ => "p_user_",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_inicial",
        F_ALIAS_ => "Inicial",
        F_HELP_ => "Existencia Inicial",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "40",
        F_FORMULA_ => "sup['p_cant']||sup['f_cant']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_oper",
        F_ALIAS_ => "Operacion",
        F_HELP_ => "Operacion",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Aumento en Entrada,Aumento en Salida,Aumento en Inventario,Aumento x Informacion Viciada,Aumento x Variacion de Rendimiento Promedio,Disminucion en Entrada,Disminucion en Salida,Disminucion en Inventario,Disminucion x Informacion Viciada,Disminucion x Variacion de Rendimiento Promedio,Disminucion x Fallas",
        F_LENGTH_ => "50",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "45",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_ajuste",
        F_ALIAS_ => "Ajuste",
        F_HELP_ => "Ajuste Efectuado",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "50",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_final",
        F_ALIAS_ => "Final",
        F_HELP_ => "Existencia Final",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_FORMULA_ => "aj_oper.get().substring(0,7)=='Aumento'?aj_inicial.getVal()+aj_ajuste.getVal():aj_inicial.getVal()-aj_ajuste.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_signo",
        F_ALIAS_ => "Signo",
        F_HELP_ => "Signo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        F_FORMULA_ => "aj_oper.get().substring(0,7)=='Aumento'?'+':'-'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_porc",
        F_ALIAS_ => " ",
        F_HELP_ => "Porcentaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        F_FORMULA_ => "if(aj_final.getVal() > (((aj_inicial.getVal() * 10) / 100) + aj_inicial.getVal()) ){'Mayor a 10%'}else if(aj_final.getVal() < (  aj_inicial.getVal() - ((aj_inicial.getVal() * 10) / 100)  ) ){  'Menor a 10%'}else{ 'Dentro del Rango'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_motivo",
        F_ALIAS_ => "Motivo de Ajuste",
        F_HELP_ => "Motivo de Ajuste",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "400",
        F_REQUIRED_ => "1",
        F_ORD_ => "75",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__disableChange",
        F_ALIAS_ => "Inhabilita boton de Modificar",
        F_HELP_ => "Inhabilita boton de Modificar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
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
        F_NAME_ => "__lock_unlock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept ",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_VIEW_ => "false",
       // F_FORMULA_ => "if( aj_final.getVal()<0 ){disableAcceptButton() }else{ enableAcceptButton() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_hora",
        F_ALIAS_ => "Hora",
        F_HELP_ => "Hora del Ajuste",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CURRENT_TIME'",
        F_QUERY_REF_ => "aj_hora.firstSQL",
        F_ORD_ => "110",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style0",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " if( aj_porc.get()=='Dentro del Rango'){ document.getElementById(|{aj_porc}|).setAttribute(|{style}|,|{height:28px;color:green;font-size:14px;}|)  }else{ document.getElementById(|{aj_porc}|).setAttribute(|{style}|,|{height:45px;color:red;font-size:24px;}|)  }  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_suc",
        F_ALIAS_ => "Suc",
        F_HELP_ => "Suc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select local from p_users where name = |{'+p_user_+'}| '",
        F_QUERY_REF_ => "aj_suc.firstSQL",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_ORD_ => "130",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_p_local",
        F_ALIAS_ => "Suc P",
        F_HELP_ => "Suc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_local from mnt_prod where p_cod =  '+aj_prod.getVal()+'  '",
        F_QUERY_REF_ => "aj_p_local.firstSQL&&aj_prod.get()!=''",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "135",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_cant_v",
        F_ALIAS_ => "Cant. Vendida",
        F_HELP_ => "Cant. Vendida",
        F_TYPE_ => "text",
        F_LENGTH_ => "16",
        F_DEC_ => "2",
        F_ORD_ => "140",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_verificador",
        F_ALIAS_ => "Verificador",
        F_HELP_ => "Verificador",
        F_TYPE_ => "text",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "150",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
