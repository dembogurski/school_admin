<?php
$Obj->name = "prod_buscar";
$Obj->alias = "Buscar Productos";
$Obj->help = "Buscar Productos";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mnt_prod";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "1";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "key_word",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Palabra Clave a buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "1",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant_min",
        F_ALIAS_ => "Cantidad mayor a:",
        F_HELP_ => "Stock minimo",
        F_TYPE_ => "text",
        F_LENGTH_ => "4",
        F_BROW_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "1",
		F_INLINE_ => "1",
        V_DEFAULT_ => "'0'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fdp",
        F_ALIAS_ => "Fin de Pieza: ",
        F_HELP_ => "Esdado FDP del producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Si,No,",
		F_LENGTH_ => "14",
        F_BROW_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "1",
		F_INLINE_ => "1",
        V_DEFAULT_ => "'No'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "filtro_1",
        F_ALIAS_ => "Filtro1",
        F_HELP_ => "Filtrar por",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Sector,Grupo,Tipo",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "3",
        F_INLINE_ => "0",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "filtro_1_",
        F_ALIAS_ => "contiene",
        F_HELP_ => "Palabra a buscar",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "4",
		F_INLINE_ => "1",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod_terminacion",
        F_ALIAS_ => "Cod.Terminacion:",
        F_HELP_ => "Terminacion = anio del codigo",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "33",
		F_LENGTH_ => "2",
		F_INLINE_ => "1",
        V_DEFAULT_ => "''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
/**
$Obj->Add(
    array(
        F_NAME_ => "cod_terminacion",
        F_ALIAS_ => "Cod.Terminacion:",
        F_HELP_ => "Terminacion = anio del codigo",    
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "true",
        F_QUERY_REF_ => "cod_terminacion.firstSQL",
        F_RELTABLE_ => "mnt_prod",
        F_SHOWFIELD_ => "distinct(right(p_cod,2)) as t,''",
        F_FILTER_ => "'right(p_cod,2) is not null and right(p_cod,2)>0 and right(p_cod,2)<=right(year(date(now())),2) and prod_fin_pieza <> |{Si}| and p_cant>0 and p_local <> 11 group by right(p_cod,2)  UNION SELECT |{%}|, |{}| order by t asc'",
        F_LENGTH_ => "2",
        F_NODB_ => "1",		
        F_ORD_ => "33",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));*/
		
$Obj->Add(
    array(
        F_NAME_ => "filtro_1_build",
        F_ALIAS_ => "filter builder",
        F_HELP_ => "filter builder",
        F_TYPE_ => "formula",       
        F_NODB_ => "1",
        F_ORD_ => "7",
		F_INLINE_ => "1",
		C_VIEW_ => "false",
		C_SHOW_ => "filtro_1.hasChanged()||filtro_1_.hasChanged()",
        F_FORMULA_ => "switch(filtro_1.get()){case 'Sector':'and p_fam like :'+filtro_1_.get()+'`';break;case 'Grupo':'and p_grupo like :'+filtro_1_.get()+'`';break;case 'Tipo':'and p_tipo like :'+filtro_1_.get()+'`';break;default:''}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "filtro_2",
        F_ALIAS_ => "Filtro2",
        F_HELP_ => "Filtrar por",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "%,Color,Composicion,Clasificacion,Estructura",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "8",
        F_INLINE_ => "0",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "filtro_2_",
        F_ALIAS_ => "contiene",
        F_HELP_ => "Palabra a buscar",
        F_TYPE_ => "text",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "9",
		F_INLINE_ => "1",
        V_DEFAULT_ => "'%'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "buscar",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Boton buscar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT 1+1'",
        F_NODB_ => "1",
        F_ORD_ => "9",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "filtro_2_build",
        F_ALIAS_ => "filter builder",
        F_HELP_ => "filter builder",
        F_TYPE_ => "formula",       
        F_NODB_ => "1",
        F_ORD_ => "10",
		C_VIEW_ => "false",
		C_SHOW_ => "filtro_2.hasChanged()||filtro_2_.hasChanged()",
        F_FORMULA_ => "switch(filtro_2.get()){case 'Color':'and p_color like :'+filtro_2_.get()+'`';break;case 'Composicion':'and p_comp like :'+filtro_2_.get()+'`';break;case 'Clasificacion':'and p_clasif like :'+filtro_2_.get()+'`';break;case 'Estructura':'and p_estruc like :'+filtro_2_.get()+'`';break;default:''}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "res_busqueda",
        F_ALIAS_ => "Resultado",
        F_HELP_ => "Resultado",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'(p_fam like |{'+key_word.get()+'}| or p_grupo like |{'+key_word.get()+'}| or p_tipo like |{'+key_word.get()+'}| )'+(filtro_1_build.get()).replace(/`/g,'}|').replace(/:/g,'|{')+' '+(filtro_2_build.get()).replace(/`/g,'}|').replace(/:/g,'|{')+' and prod_fin_pieza like '+fdp.getStr()+' and p_cant>'+cant_min.getVal()+' and p_local <>|{11}| and p_cod regexp |{'+cod_terminacion.get()+'$}| group by p_fam,p_grupo,p_tipo,p_color order by p_fam,p_grupo,p_tipo'",
        F_LINK_ => "db.prod_buscar_result",
        F_SEND_ => "''",
        F_NODB_ => "1",
        F_ORD_ => "26",
        C_SHOW_ => "operation!=INSERT_",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

		
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "201",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "showResult",
        F_ALIAS_ => "Result",
        F_HELP_ => "",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "202",
        C_VIEW_ => "false",
		C_SHOW_ => "buscar.get()",
        F_FORMULA_ => "setIframe(null,'cap`res_busqueda`Resultado');setValue('buscar',false);buscar.validate();document.getElementById('buscar').label='Buscar';",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));



?>
