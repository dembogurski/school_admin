<?php
$Obj->name = "nota_compra_det";
$Obj->alias = "Detalle de Nota de Compra";
$Obj->help = "Detalle de Nota de Compra";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "nota_compra_det";
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
        F_NAME_ => "d_nro",
        F_ALIAS_ => "Nº",
        F_HELP_ => "Nº",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "d_nom_orig",
        F_ALIAS_ => "Nombre en Origen",
        F_HELP_ => "Nombre en Origen",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT d_nom_orig FROM nota_compra_det order by id desc limit 1'",
        F_QUERY_REF_ => "d_nom_orig.firstSQL&&operation==INSERT_",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "20",
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
        F_QUERY_ => "'SELECT p_fam FROM nota_compra_det order by id desc limit 1'",
        F_QUERY_REF_ => "b_fam.firstSQL&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "115",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_fam",
        F_ALIAS_ => "Sector",
        F_HELP_ => "Sector",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_fam.get()!=''&&p_fam.firstSQL",
        F_RELTABLE_ => "mnt_fam",
        F_SHOWFIELD_ => "f_cod,''",
        F_FILTER_ => "'f_cod like |{'+b_fam.get()+'%}| order by f_cod asc'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "115",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_grupo FROM nota_compra_det order by id desc limit 1'",
        F_QUERY_REF_ => "b_grupo.firstSQL&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "116",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_grupo",
        F_ALIAS_ => "Grupo  ",
        F_HELP_ => "Grupo a que pertenece",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_grupo.hasChanged()||d_nom_orig.hasChanged()",
        F_RELTABLE_ => "mnt_grupo",
        F_SHOWFIELD_ => "g_cod,''",
        F_FILTER_ => "'g_cod like |{'+b_grupo.get()+'%}| order by g_cod asc'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "116",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "b_tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo de Pago",
        F_TYPE_ => "text",
        F_OPTIONS_ => " ",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_tipo FROM nota_compra_det order by id desc limit 1'",
        F_QUERY_REF_ => "b_tipo.firstSQL&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "117",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_tipo",
        F_ALIAS_ => "Tipo    ",
        F_HELP_ => "Tipo ",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_tipo.hasChanged()||d_nom_orig.hasChanged()",
        F_RELTABLE_ => "mnt_tipo",
        F_SHOWFIELD_ => "t_cod,''",
        F_FILTER_ => "'t_cod like |{'+b_tipo.get()+'%}| order by t_cod asc'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "117",
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
        F_QUERY_ => "'SELECT p_color FROM nota_compra_det order by id desc limit 1'",
        F_QUERY_REF_ => "b_color.firstSQL&&operation==INSERT_",
        F_FILTER_ => " ",
        F_LENGTH_ => "24",
        F_NODB_ => "1",
        F_ORD_ => "117",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_color",
        F_ALIAS_ => "Color  ",
        F_HELP_ => "Color",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "b_color.hasChanged()||d_nom_orig.hasChanged()",
        F_RELTABLE_ => "mnt_color",
        F_SHOWFIELD_ => "c_cod,''",
        F_FILTER_ => "'c_cod like |{'+b_color.get()+'%}| order by c_cod asc'",
        F_BROW_ => "1",
        F_ORD_ => "117",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => "Descrip",
        F_HELP_ => "Descipcion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT descrip FROM nota_compra_det order by id desc limit 1'",
        F_QUERY_REF_ => "descrip.firstSQL&&operation==INSERT_",
        F_LENGTH_ => "60",
        F_ORD_ => "127",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "paq",
        F_ALIAS_ => "Paquete",
        F_HELP_ => "Paquete",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "137",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ancho",
        F_ALIAS_ => "          Ancho",
        F_HELP_ => "Ancho",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "139",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cant",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad de datos",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_ORD_ => "157",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "unid",
        F_ALIAS_ => "Unidad de Medida",
        F_HELP_ => "Unidad de Medida",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Metros,Kilos,Yardas",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "158",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gramage",
        F_ALIAS_ => "Gramos M^2",
        F_HELP_ => "Gramos x Metro Cuadrado",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "2",
        F_ORD_ => "167",
        C_SHOW_ => "unid.get()=='Kilos'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "metros",
        F_ALIAS_ => "Cant. en Metros",
        F_HELP_ => "Cant. de Metros",
        F_TYPE_ => "formula",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "177",
        F_FORMULA_ => "if(unid.get()=='Yardas'){   cant.getVal() * 0.9144;}else if(unid.get()=='Kilos'){    ((cant.getVal() * 1000) / gramage.getVal() ) / ancho.getVal()}else{   cant.getVal()}",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "origen",
        F_ALIAS_ => "Origen",
        F_HELP_ => "Origen",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_ORD_ => "187",
        F_INLINE_ => "1",
        C_VIEW_ => "sup['n_estado']!='Cerrada'&&operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "realmts",
        F_ALIAS_ => "Real",
        F_HELP_ => "Real",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_DEC_ => "2",
        F_ORD_ => "197",
        F_INLINE_ => "1",
        C_VIEW_ => "sup['n_estado']!='Cerrada'&&operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_precio_aux",
        F_ALIAS_ => "Precio Compra Aux",
        F_HELP_ => "Precio Compra Aux",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "198",
        F_INLINE_ => "1",
        C_VIEW_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "moneda",
        F_ALIAS_ => "Moneda",
        F_HELP_ => "Moneda",
        F_TYPE_ => "formula",
        F_ORD_ => "207",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['n_moneda']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cotiz",
        F_ALIAS_ => "Cotiz.",
        F_HELP_ => "Cotizacion del dia",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_ORD_ => "218",
        F_INLINE_ => "1",
        V_DEFAULT_ => "1",
        C_VIEW_ => "false",
        F_FORMULA_ => "sup['n_cotiz']",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "subtotal",
        F_ALIAS_ => "SubTotal",
        F_HELP_ => "SubTotal",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select '+p_precio_aux.getVal()*cant.getVal()+''",
        F_QUERY_REF_ => "p_precio_aux.hasChanged()&&p_precio_aux.getVal()>0",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "220",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "subtotal_ref",
        F_ALIAS_ => "Subtotal Gs.",
        F_HELP_ => "Subtotal Gs.",
        F_TYPE_ => "formula",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_ORD_ => "227",
        F_INLINE_ => "1",
        F_FORMULA_ => "subtotal.get()*cotiz.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "p_compra",
        F_ALIAS_ => "Precio de Compra",
        F_HELP_ => "Precio Unitario de Compra",
        F_TYPE_ => "formula",
        F_OPTIONS_ => " ",
        F_LENGTH_ => "14",
        F_DEC_ => "2",
        F_ORD_ => "228",
        F_INLINE_ => "1",
        C_SHOW_ => "true",
        F_FORMULA_ => "subtotal_ref.getVal()/metros.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo_med",
        F_ALIAS_ => "Tipo de Medición",
        F_HELP_ => "Tipo de Medición",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",Manual,Maquina",
        F_ORD_ => "237",
        C_VIEW_ => "sup['n_estado']!='Cerrada'&&operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
