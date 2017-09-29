<?php
$Obj->name = "ajuste_ent";
$Obj->alias = "Ajustes de Productos";
$Obj->help = "Ajustes de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "tmp";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "f_cod",
        F_ALIAS_ => "Código Padre",
        F_HELP_ => "Código del Producto a fraccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nombre_prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT pr.prov_nombre  FROM mnt_prod p, mov_compras c, mnt_prov pr WHERE  p.p_ref = c.c_ref AND c.c_prov = pr.prov_cod AND  p.p_cod = '+f_cod.getStr()",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_aj",
        F_ALIAS_ => "Cantidad de Ajustes",
        F_HELP_ => "Cantidad de Ajustes",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT COUNT(*) FROM mnt_ajustes WHERE aj_prod = '+f_cod.getStr()",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{f_cod}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tab0",
        F_ALIAS_ => "tab",
        F_HELP_ => "tab",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{f_cod}|).setAttribute(|{tabindex}|,|{2}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hfocus",
        F_ALIAS_ => "Has Focus",
        F_HELP_ => "Has Focus",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( document.getElementById(|{f_cod}|).hasAttribute(|{focused}|) ) { true }else{ false }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_sql",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion + Obtiene datos de Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_descri, p_fam, p_grupo, p_tipo, p_comp, p_temp, p_estruc, p_clasif, p_color, p_cant, p_local,p_cant_compra, prod_fin_pieza,p_ancho,p_ref from mnt_prod where p_cod ='+ f_cod.getVal()  ",
        F_QUERY_REF_ => "f_cod.hasChanged() ",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "21",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "false",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => "Sub Caracterisitcas",
        F_HELP_ => "Descipcion",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "25",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        F_FORMULA_ => "db('p_fam')+'-'+  db('p_grupo') +'-'+   db('p_tipo,') +'-'+   db('p_comp') +'-'+   db('p_temp')+'-'+   db('p_estruc')  +'-'+  db('p_clasif') +'-'+   db('p_color')  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cant_comp",
        F_ALIAS_ => "Cantidad de Compra",
        F_HELP_ => "Cantidad de Compra",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_FORMULA_ => "db('p_cant_compra')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_dest",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Destino",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CONCAT(|{Suc.: }|,r.rem_destino,|{    Estado Remito:  }|, r.rem_estado )  FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado != |{Cerrada}| AND d.df_cod_prod = '+f_cod.getVal()",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_LENGTH_ => "42",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_suc",
        F_ALIAS_ => "Suc Producto",
        F_HELP_ => "Descipcion",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "31",
        F_INLINE_ => "1",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        F_FORMULA_ => "db('p_local')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style0",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "32",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{f_cant}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cant",
        F_ALIAS_ => "Cantidad en Stock",
        F_HELP_ => "Cantidad en Stock",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "true",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "diff",
        F_ALIAS_ => "Diferencia",
        F_HELP_ => "Diferencia de Metraje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        F_FORMULA_ => "f_cant.getVal()-cant_real.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_real",
        F_ALIAS_ => "Cantidad Real",
        F_HELP_ => "Cantidad Real",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "diff2",
        F_ALIAS_ => "Diferencia",
        F_HELP_ => "Diferencia de Metraje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        F_FORMULA_ => "if (( parseFloat( diff.getVal() ) * 100 % 100)>=0.5){ Math.round(parseFloat(diff.getVal())*100)/100+0.00; }else{ Math.round(parseFloat(diff.getVal())*100)/100; }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ancho",
        F_ALIAS_ => "Ancho",
        F_HELP_ => "Ancho",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_ancho from mnt_prod where p_cod ='+ f_cod.getVal()  ",
        F_QUERY_REF_ => "f_cod.hasChanged() ",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "91",
        C_VIEW_ => "true",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "kg",
        F_ALIAS_ => "Kilos del Rollo",
        F_HELP_ => "Kilogramos del Rollo completo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_kg from mnt_prod where p_cod ='+ f_cod.getVal()  ",
        F_QUERY_REF_ => "f_cod.hasChanged() ",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "92",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tara",
        F_ALIAS_ => "Tara en Gramos",
        F_HELP_ => "Tara",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_tara from mnt_prod where (p_cod =  '+f_cod.getVal()+' or p_padre ='+f_cod.getVal()+')  and p_tara > 0 LIMIT  1 '",
        F_QUERY_REF_ => "f_sql.hasChanged() ",
        F_LENGTH_ => "6",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "93",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_set_kg",
        F_ALIAS_ => "Guardar Kilaje,Tara y Ancho",
        F_HELP_ => "Guardar Kilaje de este Codigo",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set p_kg = '+kg.getVal()+', p_tara = '+tara.getVal()+', p_ancho = '+ancho.getVal()+' where p_cod = '+f_cod.getVal()",
        F_ORD_ => "93",
        F_INLINE_ => "1",
        C_VIEW_ => "kg.get()!='' && kg.getVal() > 0 && !aj_set_kg.get() && !kg.hasChanged() ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "kg_desc",
        F_ALIAS_ => "Kilos en Descarga",
        F_HELP_ => "Kilogramos del Rollo en la descarga",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_kg_real from packing_list where p_cod ='+ f_cod.getVal()",
        F_QUERY_REF_ => "f_cod.hasChanged() ",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "94", 
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "style1",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{cant_real}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|); document.getElementById(|{diff2}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|); ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style2",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "102",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{tol}|).setAttribute(|{style}|,|{height:45px;color:red;font-size:32px;}|);   document.getElementById(|{ancho}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|); ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style3",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "103",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{aj_cant}|).setAttribute(|{style}|,|{height:50px;width:200px;color:black;font-size:32px;}|); document.getElementById(|{espacio}|).setAttribute(|{style}|,|{opacity:0;}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style5",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "104",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{tara}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|);  document.getElementById(|{kg}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|);    ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tol",
        F_ALIAS_ => "Tolerancia",
        F_HELP_ => "Tolerancia",
        F_TYPE_ => "formula",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "105",
        C_VIEW_ => "cant_real.get() != '0.00' && ( Math.abs( diff2.getVal() ) >  ((f_cant.getVal() * 10 ) / 100 )    )   ",
        F_FORMULA_ => "if(  (Math.abs( diff2.getVal() ) >  (f_cant.getVal() * 10 ) / 100 )   ){'ERROR: Corte sobre tolerancia!'}else{ 'Ok!!!' }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "errmsg",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "106",
        C_VIEW_ => "(p_suc.get()!='00'||p_suc.get()!='26')&&f_cod.get()!=''&&p_suc.get()!=''",
        F_FORMULA_ => "'Codigo no se encuentra en Produccion!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "errmsgkg",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "106",
        C_VIEW_ => "(kg.get()=='' || kg.get()=='0.000')&&f_cod.get()!=''",
        F_FORMULA_ => "'Este rollo no tiene asingado el Kg.'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "sign",
        F_ALIAS_ => "Signo",
        F_HELP_ => "Signo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( diff2.getVal()>=0 ){ '-' }else{ '+' }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "oper",
        F_ALIAS_ => "Operación",
        F_HELP_ => "Operación",
        F_TYPE_ => "formula",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "120",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( diff2.getVal()>=0 ){ 'Disminucion en Entrada' }else{ 'Aumento en Entrada' }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "espacio",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "125",
        C_SHOW_ => "cant_real.getVal()>0&&tol.get()!='ERROR: Corte sobre tolerancia!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ajuestes_ajax",
        F_ALIAS_ => "Ajuste Alternativo",
        F_HELP_ => "Ajustar Codigos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ajustes_entrada",
        F_NODB_ => "1",
        F_ORD_ => "128",
        C_SHOW_ => "f_cod.getVal()>0 && (cant_aj.getVal()<1) && ((p_suc.get()=='00' || p_suc.get()=='26')&&f_cod.get()!=''&&p_suc.get()!='') && (kg.getVal()>0&&f_cod.get()!='')    ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_cant",
        F_ALIAS_ => "Ajustar",
        F_HELP_ => "Ajusta Cantidad en Stock",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select ajuste_ent('+f_cod.getStr()+',|{'+p_user_+'}|,'+f_cant.getVal()+', '+diff2.getVal()+' ,'+cant_real.getVal()+','+oper.getStr()+','+sign.getStr()+','+tara.getVal()+','+ancho.getVal()+')'",
        F_ORD_ => "130",
        C_SHOW_ => "!aj_cant.get()&&cant_real.getVal()>0&&tol.get()!='ERROR: Corte sobre tolerancia!'",
        C_VIEW_ => "(p_suc.get()=='00'|| p_suc.get()=='26')&&cant_aj.getVal()<1 && false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style8",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "131",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{aj_admin}|).setAttribute(|{style}|,|{height:50px;color:black;font-size:32px;}|);  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj_admin",
        F_ALIAS_ => "Ajustar como Supervisor",
        F_HELP_ => "Ajustar como Supervisor",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select ajuste_ent('+f_cod.getStr()+',|{'+p_user_+'}|,'+f_cant.getVal()+', '+diff2.getVal()+' ,'+cant_real.getVal()+','+oper.getStr()+','+sign.getStr()+','+tara.getVal()+','+ancho.getVal()+')'",
        F_ORD_ => "140",
        C_SHOW_ => "cant_real.getVal()>0&&tol.get()=='ERROR: Corte sobre tolerancia!'&&cant_aj.getVal()<1 && false",
        G_SHOW_ => "65536",
        G_CHANGE_ => "65536"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "150",
        C_SHOW_ => "aj_cant.get()||aj_admin.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',800)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "select_text",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "false",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(hfocus.get()){ document.getElementById('f_cod').select()  }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_bloqueo",
        F_ALIAS_ => "Desabilita el boton Consult",
        F_HELP_ => "Desabilita el boton Consult",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_SHOW_ => "f_bloqueo.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "setFocus",
        F_ALIAS_ => "Set Focus",
        F_HELP_ => "Set Focus",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "190",
        C_SHOW_ => "!hfocus.get()&&f_sql.get()==''",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{f_cod}|).focus()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "( ! )",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "47",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_SHOW_ => "cant_aj.getVal()>0",
        F_FORMULA_ => "'( ! ) El codigo ya ha sido ajustado!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style4",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{errmsg}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style6",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{errmsgkg}|).setAttribute(|{style}|,|{height:30px;color:red;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style7",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{msg}|).setAttribute(|{style}|,|{height:30px;color:blue;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style9",
        F_ALIAS_ => "Style 8",
        F_HELP_ => "Style 8",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{ajuestes_ajax}|).setAttribute(|{style}|,|{color:black;font-size:20px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "SUC:",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "400",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
