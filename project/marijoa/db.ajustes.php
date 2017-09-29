<?php
$Obj->name = "ajustes";
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

/*
$Obj->Add(
    array(
        F_NAME_ => "aj_pend",
        F_ALIAS_ => "Pedidos de Ajustes Pendientes",
        F_HELP_ => "Pedidos de Ajustes Pendientes",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'aj_estado = |{Pendiente}|'",
        F_LINK_ => "db.reg_ajustes",
        F_SEND_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "6",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));*/

$Obj->Add(
    array(
        F_NAME_ => "f_cod",
        F_ALIAS_ => "Código",
        F_HELP_ => "Código del Producto a fraccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_ORD_ => "10",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_proveedor",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select pr.prov_nombre from mnt_prod p, mov_compras c, mnt_prov pr where p.p_ref = c.c_ref and c.c_prov = pr.prov_cod  and p.p_cod ='+f_cod.getStr()",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "12",
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
		F_LENGTH_ => "4",
        F_ORD_ => "13",
		C_CHANGE_ => "false",
        F_INLINE_ => "1",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			

$Obj->Add(
    array(
        F_NAME_ => "f_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "15",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "false",
        C_CHANGE_ => "operation==INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_sql",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion + Obtiene datos de Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_descri, p_fam, p_grupo, p_tipo, p_comp, p_temp, p_estruc, p_clasif, p_color, p_cant, p_local,p_cant_compra,p_ancho, prod_fin_pieza from mnt_prod where p_cod ='+ f_cod.get()  ",
        F_QUERY_REF_ => "f_cod.hasChanged() ",
        F_LENGTH_ => "50",
        F_NODB_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
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
        F_NAME_ => "f_cant",
        F_ALIAS_ => "Cantidad en Stock",
        F_HELP_ => "Cantidad en Stock",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "40",
        F_FORMULA_ => "db('p_cant')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "suc",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Sucursal",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "45",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('p_local')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
 

$Obj->Add(
    array(
        F_NAME_ => "fdp_r",
        F_ALIAS_ => "Fin Pieza Si/No/R",
        F_HELP_ => "Estado",
        F_TYPE_ => "formula",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "48",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('prod_fin_pieza')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "p_ancho",
        F_ALIAS_ => "Ancho",
        F_HELP_ => "Ancho",
        F_TYPE_ => "formula",
        F_LENGTH_ => "6",
        F_NODB_ => "1",
        F_ORD_ => "49",
        F_INLINE_ => "1",
        F_FORMULA_ => "db('p_ancho')",
		C_CHANGE_ => "p_ancho.getVal()>0 && (p_user_ == 'Developer' || p_user_ == 'mariaestela' || p_user_ == 'victor' )",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));	

$Obj->Add(
    array(
        F_NAME_ => "updtancho",
        F_ALIAS_ => "Actualizar Ancho",
        F_HELP_ => "Confirmar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set p_ancho = '+p_ancho.getVal()+' where p_cod = '+f_cod.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "50",
		F_INLINE_ => "1",
        C_SHOW_ => "db('p_ancho')!=p_ancho.getVal() && p_ancho.getVal()>0 && (p_user_ == 'Developer' || p_user_ == 'mariaestela' || p_user_ == 'victor' )",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		

$Obj->Add(
    array(
        F_NAME_ => "f_bloqueo",
        F_ALIAS_ => "Desabilita el boton Consult",
        F_HELP_ => "Desabilita el boton Consult",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "60",
        C_SHOW_ => "f_bloqueo.firstSQL",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "smg_aj",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "25",
        C_VIEW_ => "cant_aj.get()!=''&&cant_aj.getVal()<1&&suc.get()=='00'",
        F_FORMULA_ => "'Este codigo no tiene ajuste Inicial del Medidor'",
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
        F_FORMULA_ => " document.getElementById(|{smg_aj}|).setAttribute(|{style}|,|{height:38px;color:red;font-size:26px;}|)   ",
        G_SHOW_ => "589824",
        G_CHANGE_ => "589824"));		

$Obj->Add(
    array(
        F_NAME_ => "sub_ajuste",
        F_ALIAS_ => "Ajustes",
        F_HELP_ => "Ajustes de Mercaderia",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'aj_prod='+f_cod.getVal()",
        F_LINK_ => "db.mnt_ajustes",
        F_SEND_ => "f_cod.getVal()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "f_cod.get()!=''&&f_sql.get()!='__NO DATA__' && ((cant_aj.getVal()>0&&cant_aj.get()!='' ) || (suc.get()!='00') ) ",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "edit_ajustes",
        F_ALIAS_ => "Editar Ajustes",
        F_HELP_ => "Modificar",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'aj_prod='+f_cod.getVal()",
        F_LINK_ => "db.mnt_ajustes_edit",
        F_SEND_ => "f_cod.getVal()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "((f_cod.get()!=''&&f_sql.get()!='__NO DATA__' && ((cant_aj.getVal()>0&&cant_aj.get()!='' ) || (suc.get()!='00') )) && (p_user_=='Jack' || p_user_ == 'Developer' || p_user_ == 'elisa' || p_user_ == 'Lelia'))",
        //C_VIEW_ => "operation!=INSERT_",       
        G_SHOW_ => "1024",
        G_CHANGE_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "fact_nro",
        F_ALIAS_ => "Nº de Factura (Edición de Detalle)",
        F_HELP_ => "Nro de factura",
        F_TYPE_ => "text",
        F_NODB_ => "1",
        F_ORD_ => "72",
        G_SHOW_ => "1024",
        G_CHANGE_ => "1024"));

$Obj->Add(
    array(
        F_NAME_ => "det_fact",
        F_ALIAS_ => "Detalle de Factura (Ajustes)",
        F_HELP_ => "Detalle de Factura (Ajustes)",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'df_fact_num='+fact_nro.getVal()",
        F_LINK_ => "db.det_factura_emp",
        F_SEND_ => "fact_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "74",
        C_SHOW_ => "fact_nro.getVal()>1000",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__aux",
        F_ALIAS_ => "Calculos auxiliares",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_FORMULA_ => "'( ! ) Calculos auxiliares'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cant_comp",
        F_ALIAS_ => "Cantidad de Compra",
        F_HELP_ => "Cantidad de Compra",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "81",
        F_FORMULA_ => "db('p_cant_compra')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "transfp",
        F_ALIAS_ => "Suma de Transferencias (+)",
        F_HELP_ => "Suma de Transferencias (+)",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(cantidad) from transf_piezas where codigo_a =  '+f_cod.getVal()",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "82",
        C_SHOW_ => "f_cod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ajp",
        F_ALIAS_ => "Suma de Ajustes (+)",
        F_HELP_ => "Suma de Ajustes (+)",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(aj_ajuste) from mnt_ajustes where aj_prod ='+f_cod.getVal()+' and aj_signo = |{+}|  '",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "83",
        C_SHOW_ => "f_cod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "totp",
        F_ALIAS_ => "TOTAL (+)",
        F_HELP_ => "TOTAL (+)",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "85",
        F_INLINE_ => "1",
        C_SHOW_ => "f_cant_comp.get()!=''",
        F_FORMULA_ => "f_cant_comp.getVal()+transfp.getVal()+ajp.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "vtas",
        F_ALIAS_ => "Suma de Ventas",
        F_HELP_ => "Suma de Ventas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(df_cantidad) from det_factura d, factura f where d.df_cod_prod = '+f_cod.getStr()+' and d.df_fact_num = f.fact_nro and f.fact_estado = |{Cerrada}|'",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "90",
        C_SHOW_ => "f_cod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "transf",
        F_ALIAS_ => "Suma de Transferencias (-)",
        F_HELP_ => "Suma de Transferencias (-)",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(cantidad) from transf_piezas where codigo_de =  '+f_cod.getVal()",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "100",
        C_SHOW_ => "f_cod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "frac",
        F_ALIAS_ => "Suma de Fracciones",
        F_HELP_ => "Suma de Fracciones",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(p_cant_compra) from mnt_prod where p_padre = '+f_cod.getVal()",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "110",
        C_SHOW_ => "f_cod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ajn",
        F_ALIAS_ => "Suma de Ajustes (-)",
        F_HELP_ => "Suma de Ventas",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select sum(aj_ajuste) from mnt_ajustes where aj_prod ='+f_cod.getVal()+' and aj_signo = |{-}| and aj_oper <> |{Disminucion x Informacion Viciada}| '",
        F_QUERY_REF_ => "f_cod.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "120",
        C_SHOW_ => "f_cod.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "totn",
        F_ALIAS_ => "TOTAL (-)",
        F_HELP_ => "TOTAL (-)",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "130",
        F_INLINE_ => "1",
        C_SHOW_ => "f_cant_comp.get()!=''",
        F_FORMULA_ => "vtas.getVal()+transf.getVal()+frac.getVal()+ajn.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "st",
        F_ALIAS_ => "Cantidad en Stock",
        F_HELP_ => "Cantidad en Stock",
        F_TYPE_ => "formula",
        F_ORD_ => "140",
        F_INLINE_ => "1",
        C_SHOW_ => "f_cant_comp.get()!=''",
        F_FORMULA_ => "totp.getVal()-totn.getVal()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "corregir",
        F_ALIAS_ => "Corregir",
        F_HELP_ => "Corregir",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "150",
        F_INLINE_ => "1",
        C_SHOW_ => "st.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "updt",
        F_ALIAS_ => "Aprete este boton si esta seguro que no irá a prision por hacer la corrección...",
        F_HELP_ => "Confirmar",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set p_cant = '+st.getVal()+' where p_cod = '+f_cod.getVal()",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_SHOW_ => "corregir.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ver_estado_prod",
        F_ALIAS_ => "Ver Estado del Producto",
        F_HELP_ => "Ver Estado del Producto",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.estado_producto",
        F_NODB_ => "1",
        F_ORD_ => "170",
        C_SHOW_ => "f_cant_comp.get()!=''&&descrip.get()!='__NO DATA__'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "fact_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_estado from factura where fact_nro =  '+fact_nro.getVal()",
        F_QUERY_REF_ => "fact_nro.hasChanged() && fact_nro.getVal() > 0",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_SHOW_ => "true",
        C_CHANGE_ => "false",
		C_SHOW_ => "fact_nro.getVal()>1000",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
		
$Obj->Add(
    array(
        F_NAME_ => "fact_cli_cat",
        F_ALIAS_ => "Cat",
        F_HELP_ => "Cat",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_cli_cat from factura where fact_nro =  '+fact_nro.getVal()",
        F_QUERY_REF_ => "fact_nro.hasChanged() && fact_nro.getVal() > 0",
        F_LENGTH_ => "4",
		C_SHOW_ => "fact_nro.getVal()>1000",
        F_NODB_ => "1",
        F_ORD_ => "190",
        C_SHOW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));		
		
$Obj->Add(
    array(
        F_NAME_ => "fact_empaque",
        F_ALIAS_ => "Empaque",
        F_HELP_ => "Cat",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select fact_empaque from factura where fact_nro =  '+fact_nro.getVal()",
        F_QUERY_REF_ => "fact_nro.hasChanged() && fact_nro.getVal() > 0",
        F_BROW_ => "1",
        F_NODB_ => "1",
		C_SHOW_ => "fact_nro.getVal()>1000",
		F_LENGTH_ => "4",
        F_ORD_ => "190",
        C_SHOW_ => "true",
        C_CHANGE_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));			
		

?>
