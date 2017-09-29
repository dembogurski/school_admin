<?php
$Obj->name = "rep_prods_vend";
$Obj->alias = "Reporte Variado de Productos";
$Obj->help = "Reporte Variado de Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "temp";
$Obj->Filter = "db.mnt_prod_cons";
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
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_busqueda",
        F_ALIAS_ => "Tipo de Busqueda",
        F_HELP_ => "Tipo de Busqueda",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Codigo Especifico,Grupo Tipo Color",
        F_NODB_ => "1",
        F_ORD_ => "6",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del producto",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_NODB_ => "1",
        F_ORD_ => "24",
        C_SHOW_ => "tipo_busqueda.get()=='Codigo Especifico'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "if(p_cod.get()==''){'%'}else{p_cod.get()}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod_prod",
        F_ALIAS_ => "Codigo",
        F_HELP_ => "Codigo",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "25",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "p_cod.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "remito",
        F_ALIAS_ => "Remision",
        F_HELP_ => "Verifica si se encuentra en remision",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CONCAT(|{En Remision  }|, r.rem_estado ,|{  Destino }|, r.rem_dir_destino,|{ Nro: }|,r.rem_nro) FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado <> |{Cerrada}| AND d.df_cod_prod = '+p_cod.getVal()+' '",
        F_QUERY_REF_ => "p_cod.hasChanged()",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "26",
        F_INLINE_ => "1",
        C_SHOW_ => "tipo_busqueda.get()=='Codigo Especifico'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Localidad (Sucursal)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_ORD_ => "30",
        C_SHOW_ => "tipo_busqueda.get()!='Codigo Especifico'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%",
        F_RELTABLE_ => "mnt_prod",
		F_SHOWFIELD_ => "p_fam,|{}|",
        F_FILTER_ => "'p_fam <> |{JOSE YUNIS}| and p_fam <> |{}| group by p_fam'",		
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "115",
		C_SHOW_ => "tipo_busqueda.get()=='Grupo Tipo Color'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_OPTIONS_ => "%",
		F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_grupo,|{}|",
        F_FILTER_ => "'p_fam like |{'+p_fam.get()+'%}| and p_grupo <> |{}| group by p_grupo'",
		F_DSL_ => "p_fam.hasChanged()",		
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "116",
		C_SHOW_ => "tipo_busqueda.get()=='Grupo Tipo Color'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "keyword_tipos",
        F_ALIAS_ => "Filtro Tipos",
        F_HELP_ => "Filtrar tipos",
        F_TYPE_ => "text",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "20",
		F_VALUE_ => "%",
        C_SHOW_ => "tipo_busqueda.get()=='Grupo Tipo Color'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "dynamic_select_list",
        F_OPTIONS_ => "%",
		F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_tipo,|{}|",
        F_FILTER_ => "'p_grupo like |{'+p_grupo.get()+'%}| and p_tipo like |{'+keyword_tipos.get()+'%}| and p_tipo <> |{}| group by p_tipo'",
		F_DSL_ => "p_grupo.hasChanged()||keyword_tipos.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "117",
		C_SHOW_ => "tipo_busqueda.get()=='Grupo Tipo Color'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color",
        F_TYPE_ => "dynamic_select_list",
        F_OPTIONS_ => "%",
		F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "p_color,|{}|",
        F_FILTER_ => "'p_tipo like |{'+p_tipo.get()+'}| and p_color <> |{}| group by p_color'",
		F_DSL_ => "p_tipo.hasChanged()",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "117",
		C_SHOW_ => "tipo_busqueda.get()=='Grupo Tipo Color'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdp",
        F_ALIAS_ => "Fin de Pieza",
        F_HELP_ => "Fin de Pieza",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si,%",
        F_NODB_ => "1",
        F_ORD_ => "65",
        C_SHOW_ => "tipo_busqueda.get()!='Codigo Especifico'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_min",
        F_ALIAS_ => "Cantidad mayor a: ",
        F_HELP_ => "Cantidad Minima para el reporte",
        F_TYPE_ => "text",
		F_LENGTH_ => "3",	
		F_VALUE_=> "0",
        F_NODB_ => "1",
        F_ORD_ => "66",
		F_INLINE_ => "1",
        C_SHOW_ => "tipo_busqueda.get()!='Codigo Especifico'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "check_cant_min",
        F_ALIAS_ => "check_cant_min",
        F_HELP_ => "Validator",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "112",
		C_SHOW_ => "tipo_busqueda.get()!='Codigo Especifico'&&(cant_min.hasChanged()&&isNaN(cant_min.get()))",
		C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById('error_message').innerHTML='Cantidad minima debe ser un numero entre 0 a 999';document.getElementById('error_message').style.display='block'",		
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "hideMSJ",
        F_ALIAS_ => "hideMSJ",
        F_HELP_ => "hide message",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "111",
		C_SHOW_ => "cant_min.hasChanged()&&!isNaN(cant_min.get())",
		C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById('error_message').style.display='none'",		
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "91",
        F_FORMULA_ => "'( ! ) Maximo 2000 registros...'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fracs",
        F_ALIAS_ => "Ver Informe (Productos Identicos de la Misma compra)",
        F_HELP_ => "Fraccionamientos",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rep_frac",
        F_ORD_ => "100",
        C_SHOW_ => "cod_prod.get()!=''&&tipo_busqueda.get()=='Codigo Especifico'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver",
        F_ALIAS_ => "Ver Informe",
        F_HELP_ => "Ver Informe",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.prods_vendedor",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "tipo_busqueda.get()!='Codigo Especifico'&&!isNaN(cant_min.get())",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

		
$Obj->Add(
    array(
        F_NAME_ => "css",
        F_ALIAS_ => "css",
        F_HELP_ => "css",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
		F_ORD_ => "191",
		C_VIEW_ => "false",		
        C_SHOW_ => "true",
        F_FORMULA_ => "document.getElementById(|{keyword_tipos}|).setAttribute(|{style}|,|{font-weight: bold;color:green}|);document.getElementById(|{p_tipo}|).setAttribute(|{style}|,|{font-weight: bold;color:green}|)",		
		G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		

?>
