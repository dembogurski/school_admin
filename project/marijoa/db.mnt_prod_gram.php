<?php
$Obj->name = "mnt_prod_gram";
$Obj->alias = "Gramaje de Productos";
$Obj->help = "Gramaje de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
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
        F_NAME_ => "codigo",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        
        F_NODB_ => "1",
        F_ORD_ => "10",
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
        F_NAME_ => "p_ref",
        F_ALIAS_ => "Ref",
        F_HELP_ => "Nº de Referencia de Compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_ref from mnt_prod where p_cod = '+codigo.getVal()+''",
        F_QUERY_REF_ => "codigo.hasChanged()",         
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "6",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	


$Obj->Add(
    array(
        F_NAME_ => "reload__",
        F_ALIAS_ => "",
        F_HELP_ => "",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "7",
		F_LENGTH_ => "8",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "true",
		F_INLINE_ => "1",
        F_FORMULA_ => "'Recargar'",
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
        F_FORMULA_ => "if( document.getElementById(|{reload__}|).hasAttribute(|{focused}|) ) { window.location.reload() }else{ false }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64")); 		
		
$Obj->Add(
    array(
        F_NAME_ => "stylerec",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{reload__}|).setAttribute(|{style}|,|{color:orangered;font-weight:bolder;}|)   ",
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
        F_FORMULA_ => " document.getElementById(|{codigo}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|)   ",
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
        F_FORMULA_ => " document.getElementById(|{codigo}|).setAttribute(|{tabindex}|,|{2}|)   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));


$Obj->Add(
    array(
        F_NAME_ => "f_sql",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion + Obtiene datos de Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_descri, p_fam, p_grupo, p_tipo, p_comp, p_temp, p_estruc, p_clasif, p_color, p_cant, p_local,p_cant_compra, prod_fin_pieza, p_gram from mnt_prod where p_cod ='+ codigo.getVal()  ",
        F_QUERY_REF_ => "codigo.hasChanged() ",
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
        F_NAME_ => "p_suc",
        F_ALIAS_ => "Suc Producto",
        F_HELP_ => "Descipcion",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
		F_INLINE_ => "1",
        F_ORD_ => "31",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        F_FORMULA_ => "db('p_local')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	
		
		
		$Obj->Add(
    array(
        F_NAME_ => "p_fdp",
        F_ALIAS_ => "Fin de Pieza     ",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
		F_INLINE_ => "1",
        F_ORD_ => "31",
        C_VIEW_ => "f_sql.get()!='__NO DATA__'",
        F_FORMULA_ => "db('prod_fin_pieza')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	
		 

				
		
	$Obj->Add(
    array(
        F_NAME_ => "mover",
        F_ALIAS_ => "Mover a esta Sucursal",
        F_HELP_ => "Mover a esta Sucursal",
        F_TYPE_ => "select_list", 
        F_OPTIONS_ => "No,Si",
        F_DEC_ => "2",	
		F_INLINE_ => "1",	
		C_VIEW_ => "p_suc.get()=='11'",		
        F_NODB_ => "1",
        F_ORD_ => "32",
        G_SHOW_ => "32",
        G_CHANGE_ => "32"));	
		
$Obj->Add(
    array(
        F_NAME_ => "conf",
        F_ALIAS_ => "Confirme Mover a Esta Sucursal",
        F_HELP_ => "Confirme Mover a Esta Sucursal",
        F_TYPE_ => "proc",
		F_QUERY_ => "'update mnt_prod set p_local = '+__local.getStr()+' where p_cod = '+codigo.getVal()+' '",
        F_ORD_ => "33",
		F_NODB_ => "1",
		F_INLINE_ => "1",
        C_VIEW_ => "p_suc.get()=='11'&&!conf.get()&&mover.get()=='Si'",	
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	


$Obj->Add(
    array(
        F_NAME_ => "log_inventario",
        F_ALIAS_ => "Log Inventario",
        F_HELP_ => "Registra el punteo y el movimiento de la pieza",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'INSERT INTO inv_control(codigo,suc_p,suc_s,hits,usuario,fecha_hora,duplicado)VALUES('+codigo.getVal()+','+__local.getStr()+','+p_suc.getStr()+',1,|{'+p_user_+'}|,current_time,null)'",
        F_QUERY_REF_ => "conf.get()&&log_inventario.firstSQL",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "34",
		C_VIEW_ => "false",	
        C_CHANGE_ => "false",
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
        F_ORD_ => "37",
        C_VIEW_ => "__local.get()!=p_suc.get()&&p_suc.get()!=''",
        F_FORMULA_ => "'El producto no figura en esta sucursal!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "style0",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "38",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{f_cant}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|);  document.getElementById(|{gram_grab}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|)    ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cant",
        F_ALIAS_ => "Metraje en el Sistema",
        F_HELP_ => "Cantidad en Stock",
        F_TYPE_ => "formula",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
		F_DEC_ => "2",
        F_ORD_ => "40",
        C_VIEW_ => "true",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "gram_grab",
        F_ALIAS_ => "Gramaje Actual",
        F_HELP_ => "Gramos x M^2",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "42",
        F_INLINE_ => "1",
		F_LENGTH_ => "10",
        F_DEC_ => "2",
        C_SHOW_ => "true",
        C_VIEW_ => "true",
        F_FORMULA_ => "db('p_gram')",
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
        F_ALIAS_ => "Metraje Real",
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
        F_NAME_ => "ancho",
        F_ALIAS_ => "Ancho (Mts)",
        F_HELP_ => "Ancho Real",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2", 
		 
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

$Obj->Add(
    array(
        F_NAME_ => "kilos",
        F_ALIAS_ => "Peso en Kilos",
        F_HELP_ => "Cantidad en Kilos",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	
		
$Obj->Add(
    array(
        F_NAME_ => "set_p_kg",
        F_ALIAS_ => "Modificat Kg de Descarga",
        F_HELP_ => "Modificat Kg Descarga",
        F_TYPE_ => "proc",
		F_QUERY_ => "'select mod_kg('+codigo.getVal()+','+kilos.getVal()+',|{'+p_user_+'}|)'",
        F_ORD_ => "94",
		F_NODB_ => "1",
		F_INLINE_ => "1",
        C_SHOW_ => "kilos.get()>0&&codigo.get()>0&&(p_user_=='Jack'||p_user_=='TonyG')",
		C_VIEW_ => "", 
		G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

$Obj->Add(
    array(
        F_NAME_ => "tara_tipo",
        F_ALIAS_ => "Tara",
        F_HELP_ => "Tara",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "taras",
        F_SHOWFIELD_ => "codigot,concat(descrip,|{-}|, round(gramos,0),|{ Grs }|)",
        F_DEC_ => "2",		 
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cm_tara",
        F_ALIAS_ => "Largo (Cm)",
        F_HELP_ => "Largo en Cm",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT cm from taras where codigot = '+tara_tipo.getVal()+' '",
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
        F_ALIAS_ => "Tara (Grs)",
        F_HELP_ => "Tara",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT gramos * '+cm_tara.getVal()+' / cm FROM taras where codigot = '+tara_tipo.getVal()+' '",
        F_QUERY_REF_ => "tara_tipo.hasChanged()&&cm_tara.getVal()>0 ||  cm_tara.hasChanged()&&cm_tara.getVal()>0",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "71",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	


		


$Obj->Add(
    array(
        F_NAME_ => "gramaje",
        F_ALIAS_ => "Gramos x M^2",
        F_HELP_ => "Gramos x M^2",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "72", 
		F_LENGTH_ => "10",
        F_DEC_ => "2",
        C_SHOW_ => "true",
        C_VIEW_ => "true",
        F_FORMULA_ => "((kilos.getVal() - (tara.getVal() / 1000) ) * 1000)/(cant_real.getVal()*ancho.getVal())",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "espacio",
        F_ALIAS_ => " ",
        F_HELP_ => "Espacio",
        F_TYPE_ => "text",
        F_LENGTH_ => "1",
         
        F_NODB_ => "1",
		F_INLINE_ => "1",
        F_ORD_ => "73",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		
		
$Obj->Add(
    array(
        F_NAME_ => "set_gram",
        F_ALIAS_ => "Grabar Gramaje",
        F_HELP_ => "Ajusta Cantidad en Stock",
        F_TYPE_ => "proc",
		F_QUERY_ => "'select set_gramaje('+codigo.getVal()+','+ancho.getVal()+','+gramaje.getVal()+',|{'+p_user_+'}|)'",
        F_ORD_ => "94",
		F_NODB_ => "1",
		F_INLINE_ => "1",
        C_SHOW_ => "gramaje.getVal()>0&&!set_gram.get()",
		C_VIEW_ => "", 
		G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

   $Obj->ADD(
    array(
        F_NAME_ => "msgalerta",
        F_ALIAS_ => "ATENCION",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "95",
        C_VIEW_ => "__local.get()==p_suc.get()&&p_suc.get()!='' && codigo.getVal() > 0 && (gramaje.getVal() < 10 || gramaje.getVal() > 500) && kilos.getVal() > 0",
        F_FORMULA_ => "'ATENCION! GRAMAJE FUERA DE RANGO!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			


$Obj->Add(
    array(
        F_NAME_ => "style1",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "99",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{cant_real}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|); document.getElementById(|{ancho}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|); document.getElementById(|{kilos}|).setAttribute(|{style}|,|{height:45px;color:green;font-size:32px;}|); document.getElementById(|{tara}|).setAttribute(|{style}|,|{height:30px;color:blck;font-size:20px;}|);  ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "stylealert",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "99",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{msgalerta}|).setAttribute(|{style}|,|{height:45px;color:orange;font-size:32px;}|);   ",
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
        F_FORMULA_ => "if(hfocus.get()){ document.getElementById('codigo').select()  }",
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
/*
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
        F_FORMULA_ => "document.getElementById(|{codigo}|).focus()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	*/

$Obj->Add(
    array(
        F_NAME_ => "style2",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{gramaje}|).setAttribute(|{style}|,|{height:42px;color:red;font-size:32px;}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		

$Obj->Add(
    array(
        F_NAME_ => "success",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
		F_LENGTH_ => "40",
        F_ORD_ => "360",
        C_SHOW_ => "set_gram.get()",
        
        F_FORMULA_ => "'Gramaje Grabado con exito!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "style3",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_SHOW_ => "set_gram.get()",
		C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{success}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:22px;}|);   ",
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
        F_FORMULA_ => " document.getElementById(|{tara_tipo}|).setAttribute(|{style}|,|{font-weight:bolder;color:black;font-size:10px;width:380px}|);",
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
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "400",
        C_SHOW_ => "set_gram.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setTimeout('window.location.reload()',2000)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		

$Obj->Add(
    array(
        F_NAME_ => "suc_alt",
        F_ALIAS_ => "Suc (Alt)",
        F_HELP_ => "Suc",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_DEC_ => "2",	
		F_ORD_ => "499",	
		F_OPTIONS_ => "%",	
		C_SHOW_ => "false",		
        F_NODB_ => "1",
        F_ORD_ => "70",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
		
 $Obj->Add(
    array(
        F_NAME_ => "altern",
        F_ALIAS_ => "Ver Codigos Alternativos",
        F_HELP_ => "Fraccionar y Remitir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.gram_altern",
        F_NODB_ => "1", 
		F_INLINE_ => "1",		
        F_ORD_ => "500",
        C_SHOW_ => "codigo.getVal()>0 && false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			

	

?>
