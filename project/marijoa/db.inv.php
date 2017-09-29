<?php
$Obj->name = "inv";
$Obj->alias = "Inventario x Kilos";
$Obj->help = "Inventario x Kilos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "inv";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "usuario",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_LENGTH_ => "24",
        F_BROW_ => "1",
        F_ORD_ => "4",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Ud. Se encuentra en la Sucursal:",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_LENGTH_ => "30",
        F_BROW_ => "1",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        C_SHOW_ => "false",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo Inventario",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Peso,Unidad",
        F_LENGTH_ => "10",
        F_ORD_ => "6",
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
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "dup",
        F_ALIAS_ => "Duplicados",
        F_HELP_ => "Duplicados",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT count(*)  from inv where codigo = '+codigo.getStr()+' '",
        F_QUERY_REF_ => "codigo.hasChanged()&&codigo.getVal()>0&&operation==INSERT_",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgdupli",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_LENGTH_ => "32",
        F_NODB_ => "1",
        F_ORD_ => "12",
        C_VIEW_ => "dup.getVal()>0",
        F_FORMULA_ => "'Codigo duplicado!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Suc",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_local,p_cant,p_gram,p_ancho,concat(p_grupo,|{ - }|,p_tipo,|{ - }|,p_color) as descri from mnt_prod where p_cod = '+codigo.getStr()+' '",
        F_QUERY_REF_ => "codigo.hasChanged()&&codigo.getVal()>0||operation==CHANGE_&&suc.firstSQL",
        F_LENGTH_ => "4",
        F_BROW_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => " ",
        F_HELP_ => "dd",
        F_TYPE_ => "formula",
        F_LENGTH_ => "70",
        F_NODB_ => "1",
        F_ORD_ => "21",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        F_FORMULA_ => "db('descri')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gramaje",
        F_ALIAS_ => "Gramaje",
        F_HELP_ => "Gramaje",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "30",
        F_FORMULA_ => "db('p_gram')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ancho",
        F_ALIAS_ => "Ancho",
        F_HELP_ => "Ancho",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('p_ancho')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant",
        F_ALIAS_ => "Cantidad Metros",
        F_HELP_ => "Cantidad en el Momento",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "50",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "kilos",
        F_ALIAS_ => "Kilaje  ",
        F_HELP_ => "Kilaje",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "((gramaje.getVal() * cant.getVal() * ancho.getVal()) / 1000).toFixed(2)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rephist",
        F_ALIAS_ => "Ver historial",
        F_HELP_ => "Ver Historial",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.hist_inventario",
        F_NODB_ => "1",
        F_ORD_ => "65",
        F_INLINE_ => "1",
        C_VIEW_ => "dup.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tara_tipo",
        F_ALIAS_ => "Tara",
        F_HELP_ => "Tara",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "taras",
        F_SHOWFIELD_ => "descrip,concat(|{ }|, round(gramos,0),|{ Grs }|)",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_tara",
        F_ALIAS_ => "Largo",
        F_HELP_ => "Largo en Cm",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cm from taras where descrip = '+tara_tipo.getStr()+' '",
        F_QUERY_REF_ => "tara_tipo.hasChanged()",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tara",
        F_ALIAS_ => "Tara",
        F_HELP_ => "Tara",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT gramos * '+cm_tara.getVal()+' / cm FROM taras where descrip = '+tara_tipo.getStr()+' '",
        F_QUERY_REF_ => "tara_tipo.hasChanged()&&cm_tara.getVal()>0 ||  cm_tara.hasChanged()&&cm_tara.getVal()>0",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "kilosr",
        F_ALIAS_ => "Kilaje Real",
        F_HELP_ => "Kilaje Real",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "72",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cantr",
        F_ALIAS_ => "Cantidad Real Metros",
        F_HELP_ => "Cantidad Real",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_VIEW_ => "kilosr.getVal()>0",
        C_CHANGE_ => "false",
        F_FORMULA_ => "( ((kilosr.getVal() - (tara.getVal() / 1000)) * 1000) / (gramaje.getVal() * ancho.getVal()) ).toFixed(2)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "diff_mts",
        F_ALIAS_ => "Diff. Metros",
        F_HELP_ => "Diferencia en Metros",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        C_VIEW_ => "kilosr.getVal()>0",
        C_CHANGE_ => "false",
        F_FORMULA_ => "( cantr.getVal()  - cant.getVal() ).toFixed(2)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hfocus",
        F_ALIAS_ => "Has Focus",
        F_HELP_ => "Has Focus",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( document.getElementById(|{codigo}|).hasAttribute(|{focused}|) ) { true }else{ false }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "select_text",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==INSERT_ && !hfocus.get() && suc.get()==''",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{codigo}|).select() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgsuc",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "__local.get()!=suc.get()&&suc.get()!=''",
        F_FORMULA_ => "if(suc.get()=='__NO'){'El codigo no existe o no ha sido registrado.'}else{'El producto no figura en esta sucursal!!!'}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylec",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{codigo}|).setAttribute(|{style}|,|{height:42px;color:green;font-size:28px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylesuc",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(__local.get()!=suc.get()){  document.getElementById(|{suc}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:18px;}|); }else{ document.getElementById(|{suc}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:18px;}|); }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylemsgsuc",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{msgsuc}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:18px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "styledes",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{descrip}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:18px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylegram",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{gramaje}|).setAttribute(|{style}|,|{height:24px;color:blue;font-size:15px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "styleancho",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{ancho}|).setAttribute(|{style}|,|{height:24px;color:blue;font-size:15px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylecant",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{cant}|).setAttribute(|{style}|,|{height:24px;color:blue;font-size:15px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylekilos",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{kilos}|).setAttribute(|{style}|,|{height:24px;color:blue;font-size:15px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylekilosr",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{kilosr}|).setAttribute(|{style}|,|{height:32px;color:green;font-size:20px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "styletaratipo",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{tara_tipo}|).setAttribute(|{style}|,|{font-weight:bolder;color:black;font-size:12px;width:250px}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylecmtara",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{cm_tara}|).setAttribute(|{style}|,|{height:28px;color:black;font-size:18px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "styletara",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{tara}|).setAttribute(|{style}|,|{height:28px;color:black;font-size:18px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylemtsr",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{cantr}|).setAttribute(|{style}|,|{height:32px;color:orange;font-size:20px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylediff",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => " if( diff_mts.getVal() > 0  ){ document.getElementById(|{diff_mts}|).setAttribute(|{style}|,|{height:32px;color:green;font-size:20px;}|); }else{ document.getElementById(|{diff_mts}|).setAttribute(|{style}|,|{height:32px;color:red;font-size:20px;}|);  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "styledupli",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msgdupli}|).setAttribute(|{style}|,|{height:32px;color:red;font-size:20px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgchange",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "operation==CHANGE_",
        F_FORMULA_ => "'ATENCION! Al modificar y aceptar se tomaran los datos actuales del producto'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msggramerr",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "codigo.getVal()>0&&gramaje.getVal()==0&&tipo.get()=='Peso'",
        F_FORMULA_ => "'ERROR de Gramaje!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylemsgchange",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msgchange}|).setAttribute(|{style}|,|{height:32px;color:red;font-size:20px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylemsgerrgram",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msggramerr}|).setAttribute(|{style}|,|{height:32px;color:red;font-size:20px;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(__local.get()!=suc.get() || (tipo.get()=='Peso' && kilosr.getVal()==0 || tipo.get()=='Peso' && gramaje.getVal()==0   ) || dup.get()>0 ){  disableAcceptButton() }else{ enableAcceptButton()  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
