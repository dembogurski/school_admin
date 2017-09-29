<?php
$Obj->name = "mnt_prod_clon";
$Obj->alias = "clonacion de Productos";
$Obj->help = "Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prod";
$Obj->Filter = "";
$Obj->Sort = "p_cod + 0";
$Obj->p_insert = "'SELECT refresh_prod_comp('+p_cant.getVal()+','+p_cod.getVal()+','+p_ref.getVal()+','+p_anio.getStr()+',|{'+p_user_+'}|,'+p_gram.getVal()+','+p_gram2.getVal()+','+p_kg_bruto.getVal()+','+p_tara.getVal()+','+p_cant_r.getVal()+')'";
$Obj->p_change = "'update mnt_prod set p_descri = '+p_descri.getStr()+', p_gram = '+p_gram.getVal()+', p_echo_en = '+p_echo_en.getStr()+', p_ancho = '+p_ancho.getVal()+' where p_padre = '+p_cod.getVal()+' '";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "999";
$Obj->Add(
    array(
        F_NAME_ => "p_year",
        F_ALIAS_ => "Año Actual",
        F_HELP_ => "Año Actual",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "thisDate_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_anio",
        F_ALIAS_ => "Año",
        F_HELP_ => "Año",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_year.get().substr(8,12)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "3",
        C_SHOW_ => "false",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select codigo_prod('+p_anio.getStr()+')'",
        F_QUERY_REF_ => "p_cod.firstSQL&&operation==INSERT_",
        F_LENGTH_ => "12",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "4",
        C_CHANGE_ => "false",
        C_SHOW_ => "p_anio.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_ref",
        F_ALIAS_ => "Referencia",
        F_HELP_ => "Referencia",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "8",
        F_ORD_ => "5",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['c_ref']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_factura",
        F_ALIAS_ => "Factura",
        F_HELP_ => "Factura",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "20",
        F_ORD_ => "7",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['c_factura']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "c_estadofact",
        F_ALIAS_ => "Estado Factura",
        F_HELP_ => "Estado Factura",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "7",
        F_INLINE_ => "1",
        F_FORMULA_ => "sup['c_estado']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fecha",
        F_ALIAS_ => "Fecha Factura",
        F_HELP_ => "Fecha de la factura del producto",
        F_TYPE_ => "date",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        V_DEFAULT_ => "sup['c_fechafac']",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "clon",
        F_ALIAS_ => "Clonar Codigo:",
        F_HELP_ => "Clonar Codigo:",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_NODB_ => "1",
        F_ORD_ => "11",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_fam FROM mnt_prod where p_cod = '+clon.getVal()+' limit 1'",
        F_QUERY_REF_ => "clon.hasChanged()&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
		
        F_NODB_ => "1",
        F_ORD_ => "12",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector         ",
        F_HELP_ => "Sector a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_fam.hasChanged()",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_cod,''",
        F_FILTER_ => "'f_cod like |{'+b_fam.get()+'%}| ORDER BY f_cod'",
        F_LENGTH_ => "40",
		F_REQUIRED_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_grupo FROM mnt_prod where p_cod = '+clon.getVal()+' limit 1'",
        F_QUERY_REF_ => "clon.hasChanged()&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "31",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo          ",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_grupo.hasChanged()",
        F_RELTABLE_ => "mnt_grupo",
        F_FILTER_ => "'g_cod like |{'+b_grupo.get()+'%}| ORDER BY g_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "40",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_tipo FROM mnt_prod where p_cod = '+clon.getVal()+' limit 1'",
        F_QUERY_REF_ => "clon.hasChanged()&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "41",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo             ",
        F_HELP_ => "Tipo de tela",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_tipo.hasChanged()",
        F_RELTABLE_ => "mnt_tipo",
        F_FILTER_ => "'t_cod like |{'+b_tipo.get()+'%}| ORDER BY t_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "42",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_cla",
        F_ALIAS_ => "Clasif",
        F_HELP_ => "Clasificacion",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_clasif FROM mnt_prod where p_cod = '+clon.getVal()+' limit 1'",
        F_QUERY_REF_ => "clon.hasChanged()&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "44",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_clasif",
        F_ALIAS_ => "Clasificación",
        F_HELP_ => "Clasificación de la tela",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_cla.hasChanged()",
        F_RELTABLE_ => "mnt_clasif",
        F_FILTER_ => "'cl_cod like |{'+b_cla.get()+'%}| ORDER BY cl_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_comp",
        F_ALIAS_ => "Comp.:",
        F_HELP_ => "Compocision",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_comp FROM mnt_prod where p_cod = '+clon.getVal()+' limit 1'",
        F_QUERY_REF_ => "clon.hasChanged()&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "51",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_comp",
        F_ALIAS_ => "Composición",
        F_HELP_ => "Composición de la mercadería",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_comp.hasChanged()",
        F_RELTABLE_ => "mnt_comp",
        F_FILTER_ => "'cp_cod like |{'+b_comp.get()+'%}| ORDER BY cp_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "60",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_color FROM mnt_prod where p_cod = '+clon.getVal()+' limit 1'",
        F_QUERY_REF_ => "clon.hasChanged()&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "66",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color           ",
        F_HELP_ => "Color de la mercadería",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_color.hasChanged()",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'c_cod like |{'+b_color.get()+'%}| ORDER BY c_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "68",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_temp",
        F_ALIAS_ => "Temporada",
        F_HELP_ => "Temporada em que se usa",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_temp",
        F_FILTER_ => "'true ORDER BY tp_cod'",
        F_LENGTH_ => "40",
		F_REQUIRED_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "el['p_fam'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_estruc",
        F_ALIAS_ => "Estructura",
        F_HELP_ => "Estructura de la tela",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_estruc",
        F_LENGTH_ => "40",
        F_ORD_ => "80",
		 F_REQUIRED_ => "1",
        F_INLINE_ => "1",
        C_SHOW_ => "el['p_fam'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_lisoest",
        F_ALIAS_ => "Liso/Estamp",
        F_HELP_ => "Liso/Estampado",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "mnt_lisoest",
        F_FILTER_ => "'true ORDER BY l_cod'",
        F_LENGTH_ => "40",
        F_ORD_ => "95",
		F_REQUIRED_ => "1",
        F_INLINE_ => "1",
        C_SHOW_ => "el['p_fam'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));



$Obj->Add(
    array(
        F_NAME_ => "p_descri",
        F_ALIAS_ => "Descripción",
        F_HELP_ => "Descripción del producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_descri FROM mnt_prod where p_cod = '+clon.getVal()+' limit 1'",
        F_QUERY_REF_ => "clon.hasChanged()&&operation==INSERT_",
        F_LENGTH_ => "80",
        F_ORD_ => "97",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
	
		
$Obj->Add(
    array(
        F_NAME_ => "p_iden",
        F_ALIAS_ => "Productos Identicos",
        F_HELP_ => "Productos Identicos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from mnt_prod where  p_fam  LIKE |{'+p_fam.get()+'%}|   and p_grupo LIKE |{'+p_grupo.get()+'%}| and p_tipo LIKE  |{'+p_tipo.get()+'%}| and p_comp LIKE |{'+p_comp.get()+'%}| and p_temp LIKE |{'+p_temp.get()+'%}| and p_estruc LIKE |{'+p_estruc.get()+'%}| and p_clasif LIKE |{'+p_clasif.get()+'%}| and p_lisoest LIKE |{'+p_lisoest.get()+'%}| and p_color LIKE |{%}|  and p_cant > 0 and prod_fin_pieza = |{No}| '",
        F_QUERY_REF_ => "p_fam.hasChanged()||p_grupo.hasChanged()||p_estruc.hasChanged()||p_lisoest.hasChanged() ",
        F_LENGTH_ => "5",
        F_NODB_ => "1",
        F_ORD_ => "98",
        F_INLINE_ => "1",
        C_VIEW_ => "el['p_fam'].get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

 
$Obj->Add(
    array(
        F_NAME_ => "p_combinado",
        F_ALIAS_ => "Resumen",
        F_HELP_ => "Codigo Combinado Resumen ",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_BROW_ => "1",
        F_ORD_ => "98",
        C_SHOW_ => "p_fam.get()!=''&&p_grupo.get()!=''      /*el['p_c_total'].getVal()!=0*/",
        C_VIEW_ => "false",
        C_CHANGE_ => "p_fam.hasChanged()||p_grupo.hasChanged()||p_tipo.hasChanged()||p_comp.hasChanged()||p_estruc.hasChanged()",
        F_FORMULA_ => "el['p_fam'].get()+'-'+el['p_grupo'].get()+'-'+el['p_tipo'].get()/*+'-'+el['p_comp'].get()+'-'+el['p_estruc'].get()+'-'+el['p_clasif'].get()+'-'+el['p_lisoest'].get()*/",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

$Obj->Add(
    array(
        F_NAME_ => "p_moneda",
        F_ALIAS_ => "Moneda Utilizada",
        F_HELP_ => "Moneda Utilizada para los cálculos",
        F_TYPE_ => "formula",
        F_LENGTH_ => "5",
        F_ORD_ => "98",
        C_SHOW_ => "el['p_comp'].get()!=''",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['c_moneda']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cambio",
        F_ALIAS_ => "Cambio calculado",
        F_HELP_ => "Cambio calculado para el costo",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "99",
        V_DEFAULT_ => "sup['c_cambio']",
        C_SHOW_ => "el['p_comp'].get()!=''",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cant",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad Comprada",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_REQUIRED_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "101",
        C_SHOW_ => "el['p_grupo'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "p_cant_r",
        F_ALIAS_ => "Cantidad Real",
        F_HELP_ => "Cantidad Comprada",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
		F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select x1_ from _audit_log_ where descrip = '+p_cod.getVal()+' and accion like |{INSERTAR}|'",
        F_QUERY_REF_ => "operation!=INSERT_&&p_cant_r.firstSQL",
        F_REQUIRED_ => "1",
		F_NODB_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "101",
		F_INLINE_ => "1",
        C_SHOW_ => "el['p_grupo'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			

$Obj->Add(
    array(
        F_NAME_ => "p_cant_compra",
        F_ALIAS_ => "Cantidad de Compra",
        F_HELP_ => "Cantidad de Compra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_cant_compra from mnt_prod where p_cod = '+p_cod.getVal()+''",
        F_QUERY_REF_ => "p_cant_compra.firstSQL",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "101",
        F_INLINE_ => "1",
        C_SHOW_ => "p_cod.get()!=''",
        C_VIEW_ => "operation!=INSERT_",
        C_CHANGE_ => "c_estadofact.get()=='Abierta'&&operation!=SHOW_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_c_total",
        F_ALIAS_ => "Valor. Total",
        F_HELP_ => "Valor. Total",
        F_TYPE_ => "text",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "102",
        C_SHOW_ => "el['p_grupo'].get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_compra",
        F_ALIAS_ => "Precio de Compra",
        F_HELP_ => "Precio Unitario de Compra",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "15",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_TOTAL_ => "1",
        F_ORD_ => "103",
        F_INLINE_ => "1",
        C_SHOW_ => "if( operation==INSERT_ ){ p_cant.getVal()>0&&p_c_total.getVal()>0}else{p_cant_compra.getVal()>0&&p_c_total.getVal()>0}",
        F_FORMULA_ => "if( operation==INSERT_ ){ el['p_c_total'].getVal()/el['p_cant'].getVal()*el['p_cambio'].getVal()}else{el['p_c_total'].getVal()/el['p_cant_compra'].getVal()*el['p_cambio'].getVal() }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_porc_recargo",
        F_ALIAS_ => "% de Recargo",
        F_HELP_ => "% de Recargo",
        F_TYPE_ => "formula",
        F_LENGTH_ => "7",
        F_BROW_ => "1",
        F_ORD_ => "104",
        F_INLINE_ => "1",
        C_VIEW_ => "el['p_cant'].getVal()!=0&el['p_c_total'].getVal()!=0",
        F_FORMULA_ => "if(sup['c_sobre_costo']!='undefined'){sup['c_sobre_costo']}else{0}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_valmin",
        F_ALIAS_ => "Venta mínimo",
        F_HELP_ => "Precio de Venta mínimo",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CEILING('+el['p_compra'].getVal()+'/p_margen) + CEILING(('+p_compra.getVal()*p_porc_recargo.getVal()+') / 100) FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "el['p_compra'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "106",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_1",
        F_ALIAS_ => "Precio 1",
        F_HELP_ => "Precio cliente 1",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_precio_1 FROM mnt_prod WHERE p_combinado='+el['p_combinado'].getStr()+' ORDER BY id DESC LIMIT 1'",
        F_QUERY_REF_ => "el['p_combinado'].hasChanged()&&operation==INSERT_",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "110",
        C_SHOW_ => "el['p_cant'].getVal()!=0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_2",
        F_ALIAS_ => "Precio 2",
        F_HELP_ => "Precio cliente 2",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+p_precio_1.getVal()+'-'+p_precio_1.getVal()+'*p_desc_2/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "p_precio_1.hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "120",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_3",
        F_ALIAS_ => "Precio 3",
        F_HELP_ => "Precio cliente 3",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+el['p_precio_1'].getVal()+'-'+el['p_precio_1'].getVal()+'*p_desc_3/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "el['p_precio_1'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "130",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_4",
        F_ALIAS_ => "Precio 4",
        F_HELP_ => "Precio cliente 4",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+el['p_precio_1'].getVal()+'-'+el['p_precio_1'].getVal()+'*p_desc_4/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "el['p_precio_1'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "140",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_5",
        F_ALIAS_ => "Precio 5",
        F_HELP_ => "Precio cliente 5",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+el['p_precio_1'].getVal()+'-'+el['p_precio_1'].getVal()+'*p_desc_5/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "el['p_precio_1'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "150",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
		$Obj->Add(
    array(
        F_NAME_ => "p_precio_6",
        F_ALIAS_ => "Precio 6",
        F_HELP_ => "Precio cliente 6",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+el['p_precio_1'].getVal()+'-'+el['p_precio_1'].getVal()+'*p_desc_6/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "el['p_precio_1'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "150",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

$Obj->Add(
    array(
        F_NAME_ => "p_precio_7",
        F_ALIAS_ => "Precio 7",
        F_HELP_ => "Precio cliente 7",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT '+el['p_precio_1'].getVal()+'-'+el['p_precio_1'].getVal()+'*p_desc_7/100 FROM adm_param LIMIT 1'",
        F_QUERY_REF_ => "el['p_precio_1'].hasChanged()",
        F_LENGTH_ => "15",
        F_DEC_ => "0",
        F_ORD_ => "150",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

$Obj->Add(
    array(
        F_NAME_ => "prod_fin_pieza",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_ORD_ => "151",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

 

$Obj->Add(
    array(
        F_NAME_ => "p_precio_error",
        F_ALIAS_ => "ATENCION",
        F_HELP_ => "ATENCION",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_SHOW_ => "(el['p_precio_1'].getVal()<el['p_valmin'].getVal())||(el['p_precio_2'].getVal()<el['p_valmin'].getVal())||(el['p_precio_3'].getVal()<el['p_valmin'].getVal())||(el['p_precio_4'].getVal()<el['p_valmin'].getVal())||(el['p_precio_5'].getVal()<el['p_valmin'].getVal())",
        F_FORMULA_ => "'Estás vendiendo abajo del mínimo de venta! CUIDADO!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
 

$Obj->Add(
    array(
        F_NAME_ => "p_local",
        F_ALIAS_ => "Localidad",
        F_HELP_ => "Localidad o Sucursal en donde se encuentra el Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "p_local.firstSQL&&operation==INSERT_",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "3",
        F_ORD_ => "190",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));



$Obj->Add(
    array(
        F_NAME_ => "p_ancho",
        F_ALIAS_ => "Ancho",
        F_HELP_ => "Ancho",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_ORD_ => "220",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "p_kg_bruto",
        F_ALIAS_ => "Kg Bruto",
        F_HELP_ => "Kg Bruto",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
		F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select y2_ from _audit_log_ where descrip = '+p_cod.getVal()+' and accion like |{INSERTAR}|'",
        F_QUERY_REF_ => "operation!=INSERT_&&p_kg_bruto.firstSQL",
        F_DEC_ => "2",
		F_INLINE_ => "1",
		F_NODB_ => "1",        
		C_VIEW_ => "",
        F_ORD_ => "221",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	
		
$Obj->Add(
    array(
        F_NAME_ => "p_tara",
        F_ALIAS_ => "Tara Grs",
        F_HELP_ => "Tara",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
		F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select y3_ from _audit_log_ where descrip = '+p_cod.getVal()+' and accion like |{INSERTAR}|'",
        F_QUERY_REF_ => "operation!=INSERT_&&p_tara.firstSQL",
        F_DEC_ => "0",
		F_INLINE_ => "1",
		F_NODB_ => "1",        
		C_VIEW_ => "",
        F_ORD_ => "223",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			

$Obj->Add(
    array(
        F_NAME_ => "p_kg",
        F_ALIAS_ => "Kilos Neto",
        F_HELP_ => "Peso en Kilos Neto (Peso de Compra)",
        F_TYPE_ => "formula", 
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_REQUIRED_ => "1",		
		F_FORMULA_ => " if(operation!=SHOW_){ p_kg.getVal() }else if(operation!=INSERT_){ p_kg_bruto.getVal()-(p_tara.getVal()/1000)}else{  ( p_gram.getVal() * p_cant_compra.getVal() * p_ancho.getVal() )  / 1000  }",
        F_NODB_ => "1",
		//C_CHANGE_ => "operation==CHANGE_", 
        F_ORD_ => "223",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
	
$Obj->Add(
    array(
        F_NAME_ => "p_gram2",
        F_ALIAS_ => "Gramaje",
        F_HELP_ => "Peso en Gramos x Metro Cuadrado",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "223",
        F_INLINE_ => "1",
        C_VIEW_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

		
$Obj->Add(
    array(
        F_NAME_ => "p_gram",
        F_ALIAS_ => "Gramaje Calc.",
        F_HELP_ => "Peso en Gramos x Metro Cuadrado",
        F_TYPE_ => "text",
		F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  ('+p_kg.getVal()+' * 1000) / ('+p_cant_r.getVal()+' * '+p_ancho.getVal()+')'",
        F_QUERY_REF_ => "p_kg.hasChanged()||p_cant_compra.hasChanged()||p_ancho.hasChanged()",		 
        F_LENGTH_ => "12",
         F_DEC_ => "2",
        F_ORD_ => "225",
        F_INLINE_ => "1",
		C_CHANGE_ => "false",
        C_SHOW_ => "operation!=INSERT_||operation==INSERT_&&p_gram2.getVal()>0",
        C_VIEW_ => "operation!=INSERT_||operation==INSERT_&&p_gram2.getVal()>0",
        //F_FORMULA_ => "if(operation!=INSERT_ || p_ancho.hasChanged()  ){ (p_kg.getVal() * 1000) / (p_cant_compra.getVal()*p_ancho.getVal())}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "tolerancia",
        F_ALIAS_ => "Tolerancia",
        F_HELP_ => "Tolerancia Error de Gramaje",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
		F_LENGTH_ => "4",
        F_ORD_ => "226",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(p_estruc.get()=='Rigido'){5}else{10}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		 

$Obj->Add(
    array(
        F_NAME_ => "__msggram",
        F_ALIAS_ => "Alerta",
        F_HELP_ => "Error de Gramaje",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
		F_LENGTH_ => "84",
        F_ORD_ => "226",
        C_VIEW_ => "operation==INSERT_&&( Math.abs( 100- ((p_gram2.getVal() * 100) / p_gram.getVal())).toFixed(1) > tolerancia.getVal()  )   &&  p_gram2.getVal()>0",
        F_FORMULA_ => "|{Atención! Verifique los datos, Diferencia en los Gramajes > a Tolerancia '+tolerancia.getStr()+'%   '+eval(( p_gram2.getVal()-p_gram.getVal()).toFixed(2))+' }|",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
 	
$Obj->Add(
    array(
        F_NAME_ => "style1",
        F_ALIAS_ => "Style 4",
        F_HELP_ => "Style 4",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
		C_VIEW_ => "false",
        C_SHOW_ =>  "operation==INSERT_&&( Math.abs( 100- ((p_gram2.getVal() * 100) / p_gram.getVal()) > tolerancia.getVal() ) )   &&  p_gram2.getVal()>0",
        F_FORMULA_ => "document.getElementById(|{__msggram}|).setAttribute(|{style}|,|{height:24px;color:red;font-size:14px;font-weight:bolder}|);   ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	
$Obj->Add(
    array(
        F_NAME_ => "p_echo_en",
        F_ALIAS_ => "Hecho en",
        F_HELP_ => "Hecho en",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_echo_en from mnt_prod order by id desc limit 1'",
        F_QUERY_REF_ => "p_echo_en.firstSQL",
        F_LENGTH_ => "35",
        F_ORD_ => "330",
        
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_import",
        F_ALIAS_ => "Importado por",
        F_HELP_ => "Importado por",
        F_TYPE_ => "formula",
        F_OPTIONS_ => "DB",
        F_LENGTH_ => "40",
        F_ORD_ => "340",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(sup['c_nac_int']=='Internacional' ){'Corporacion Textil S.A.'}else{ sup['c_n_prov'] }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
 

$Obj->Add(
    array(
        F_NAME_ => "p_suc_act",
        F_ALIAS_ => "Sucursal actual",
        F_HELP_ => "Sucursal actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_local from mnt_prod where p_cod = '+p_cod.getVal()+';'",
        F_QUERY_REF_ => "p_suc_act.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "360",
        F_INLINE_ => "1",
        C_SHOW_ => "p_cod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

 
		
$Obj->Add(
    array(
        F_NAME_ => "p_padre",
        F_ALIAS_ => "Padre",
        F_HELP_ => "Producto Padre",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_ORD_ => "380",
        C_SHOW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));				
 


$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "390",
        C_SHOW_ => "sup['c_estado']=='Cerrada'",
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
        F_ORD_ => "400",
        C_SHOW_ => "sup['c_estado']=='Cerrada'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableChangeButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

 

?>
