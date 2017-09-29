<?php
$Obj->name = "mov_frac";
$Obj->alias = "Fraccionamiento";
$Obj->help = "Fraccionamiento de mercadoria";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "mov_frac";
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
        F_NAME_ => "__local",
        F_ALIAS_ => "Sucursal",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

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
        F_NAME_ => "remision",
        F_ALIAS_ => " ",
        F_HELP_ => " ",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT CONCAT(|{Remision   }|,r.rem_estado, |{  [De }|,r.rem_origen, |{ --> }|,r.rem_destino, |{] Nro: }|,r.rem_nro) FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado LIKE |{En Proceso}|AND d.df_cod_prod = '+f_cod.getStr()+' ORDER BY r.id DESC LIMIT 1'",
        F_QUERY_REF_ => "f_cod.hasChanged()&&f_cod.get()!=''",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "11",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "_user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Usuario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        F_FORMULA_ => "p_user_",
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
        F_QUERY_ => "'select p_descri, p_fam, p_grupo, p_tipo, p_comp, p_temp, p_estruc, p_clasif, p_color, p_cant, p_local from mnt_prod where p_cod ='+ f_cod.get()  ",
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
        F_NAME_ => "nombre_suc",
        F_ALIAS_ => "Nombre Sucursal",
        F_HELP_ => "Nombre de la Sucursal",
        F_TYPE_ => "text",
        F_QUERY_ => "'select emp_nombre from par_empresas where emp_cod like '+suc.getStr()",
        F_QUERY_REF_ => "suc.hasChanged()",
        F_RELTABLE_ => "par_empresas",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "46",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_cant_frac",
        F_ALIAS_ => "Cantidad a Fraccionar",
        F_HELP_ => "Cantidad a Fraccionar",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "50",
        C_CHANGE_ => "remision.get()=='__NO DATA__'",
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
        F_NAME_ => "f_habilitar",
        F_ALIAS_ => "Fraccionar",
        F_HELP_ => "Fraccionar este producto",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_LENGTH_ => "3",
        F_BROW_ => "1",
        F_ORD_ => "65",
        C_SHOW_ => "(f_cant_frac.getVal() > 0 && f_cant.getVal() > 0 && f_sql.get()!='__NO DATA__')&& (f_cant.getVal() > f_cant_frac.getVal())",
        C_VIEW_ => "__local.get()==suc.get()&& suc.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_fraccionar",
        F_ALIAS_ => "Confirmar",
        F_HELP_ => "Fracciona este producto",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select count(p_cod) from mnt_prod where id = 0'",
        F_NODB_ => "1",
        F_ORD_ => "70",
        C_SHOW_ => "f_cant_frac.getVal() > 0 && f_cant.getVal() > 0 && f_sql.get()!='__NO DATA__'&&f_habilitar.get()=='Si'&&!f_fraccionar.get()",
        F_POSVAL_ => "f_habilitar.get()=='Si'",
        F_MESSAGE_ => "'El Producto ha sido fraccionado con exito... '",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_proc_return",
        F_ALIAS_ => "Retorno del procedimiento",
        F_HELP_ => "Retorno del procedimiento",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_VIEW_ => "false",
        F_FORMULA_ => "f_fraccionar.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_codigo_nuevo",
        F_ALIAS_ => "Codigo del Producto Fraccionado",
        F_HELP_ => "Codigo del nuevo fraccionado recientemente.",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'Select fraccionar('+f_cod.getVal()+','+f_cant_frac.getVal()+', '+f_fecha.getStr()+')'",
        F_QUERY_REF_ => "f_proc_return.hasChanged()",
        F_NODB_ => "1",
        F_ORD_ => "80",
        C_SHOW_ => "f_sql.get()!='__NO DATA__'",
        C_VIEW_ => "f_fraccionar.get()",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "trans",
        F_ALIAS_ => "Transladar (Remitir) a: ",
        F_HELP_ => "Destinar a (Carga en una nota de remision Abierta)",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => ",",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_NODB_ => "1",
        F_ORD_ => "85",
        F_INLINE_ => "1",
        C_SHOW_ => "f_codigo_nuevo.get()!=''&&f_sql.get()!='__NO DATA__'",
        C_VIEW_ => "__local.get()==suc.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_remito",
        F_ALIAS_ => "Remisiones Abiertas",
        F_HELP_ => "Remisiones Abiertas",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "trans.hasChanged()",
        F_RELTABLE_ => "nota_remision",
        F_SHOWFIELD_ => "rem_nro,rem_vend_cod",
        F_FILTER_ => "'rem_estado = |{Abierta}| and rem_destino = '+trans.getStr()+' '",
        F_NODB_ => "1",
        F_ORD_ => "86",
        F_INLINE_ => "1",
        C_SHOW_ => "f_codigo_nuevo.get()!=''&&f_sql.get()!='__NO DATA__'&&trans.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "make_trans",
        F_ALIAS_ => "Remitir",
        F_HELP_ => "Cargar en Nota de Remision",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select cargar_detalle_remi('+f_remito.getVal()+','+f_codigo_nuevo.getStr()+','+descrip.getStr()+' ,'+f_cant_frac.getVal()+','+_user.getStr()+')'",
        F_NODB_ => "1",
        F_ORD_ => "87",
        F_INLINE_ => "1",
        C_SHOW_ => "(trans.get()!=''&&f_sql.get()!='__NO DATA__')&&trans.get()!=suc.get()&&!make_trans.get()&&f_remito.getVal()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgrem",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "87",
        C_SHOW_ => "make_trans.get()",
        F_FORMULA_ => "'Ok! El producto ha sido cargado en la Remision'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msg",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "80",
        F_NODB_ => "1",
        F_ORD_ => "87",
        C_SHOW_ => "__local.get()!=suc.get()&& suc.get()!=''",
        F_FORMULA_ => "'ATENSION!!! Sucursal del Producto no es igual a esta!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_term",
        F_ALIAS_ => "Terminacion",
        F_HELP_ => "Terminacion",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select  CONCAT(|{%}|, RIGHT(|{'+f_codigo_nuevo.getVal()+'}|,2) )'",
        F_QUERY_REF_ => "f_codigo_nuevo.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "88",
        C_SHOW_ => "f_codigo_nuevo.get()!=''",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_desc_hijo",
        F_ALIAS_ => "Descripcion",
        F_HELP_ => "Descripcion + Obtiene datos de Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p_descri from mnt_prod where p_cod ='+ f_codigo_nuevo.getVal()",
        F_QUERY_REF_ => "f_codigo_nuevo.hasChanged() ",
        F_LENGTH_ => "70",
        F_NODB_ => "1",
        F_ORD_ => "94",
        C_SHOW_ => "f_codigo_nuevo.get()!=''",
        C_CHANGE_ => "!f_mod_desc.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_mod_desc",
        F_ALIAS_ => "Cambiar Descripcion",
        F_HELP_ => "Cambiar Descripcion",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update mnt_prod set p_descri = '+f_desc_hijo.getStr()+'  where p_cod = '+f_codigo_nuevo.getVal()+' '",
        F_NODB_ => "1",
        F_ORD_ => "95",
        F_INLINE_ => "1",
        C_SHOW_ => "f_desc_hijo.get()!=''&&!f_mod_desc.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "msgmed2",
        F_ALIAS_ => "Mensaje",
        F_HELP_ => "Mensaje",
        F_TYPE_ => "formula",
        F_LENGTH_ => "40",
        F_NODB_ => "1",
        F_ORD_ => "96",
        C_SHOW_ => "f_mod_desc.get()",
        F_FORMULA_ => "'Ok!!! Descripcion Modificada!!!'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_continuar",
        F_ALIAS_ => "               Siguiente               ",
        F_HELP_ => "Siguiente",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select 1'",
        F_NODB_ => "1",
        F_ORD_ => "179",
        C_SHOW_ => "f_codigo_nuevo.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_hasta",
        F_ALIAS_ => "Imprimir hasta ",
        F_HELP_ => "Imprimir hasta ",
        F_TYPE_ => "text",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_NODB_ => "1",
        F_ORD_ => "180",
        V_DEFAULT_ => "f_codigo_nuevo.get()",
        C_SHOW_ => "f_codigo_nuevo.get()!=''",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "f_rango",
        F_ALIAS_ => "Rango",
        F_HELP_ => "Rango",
        F_TYPE_ => "formula",
        F_LENGTH_ => "8",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "199",
        V_DEFAULT_ => "f_codigo_nuevo.get()",
        C_SHOW_ => "f_codigo_nuevo.get()!=''",
        C_VIEW_ => "false",
        C_CHANGE_ => "f_codigo_nuevo.hasChanged()||f_hasta.hasChanged()",
        F_FORMULA_ => "if( f_hasta.getVal()>0 ){  f_hasta.get()   }else{ f_codigo_nuevo.get()  } ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__reload",
        F_ALIAS_ => "Recargar",
        F_HELP_ => "Recargar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "200",
        C_SHOW_ => "f_continuar.get()",
        C_VIEW_ => "false",
        F_FORMULA_ => "window.location.reload()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "aj",
        F_ALIAS_ => "Ajustar",
        F_HELP_ => "Ajustar",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'aj_prod='+f_cod.getVal()",
        F_LINK_ => "db.mnt_ajustes",
        F_SEND_ => "f_cod.getVal()",
        F_BROW_ => "1",
        F_ORD_ => "210",
        C_SHOW_ => "f_cod.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__log",
        F_ALIAS_ => "Make Log",
        F_HELP_ => "Make Log",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select makeLog_(|{INSERTAR}|,|{'+f_codigo_nuevo.get()+'}|,'+_user.getStr()+')'",
        F_QUERY_REF_ => "__log.firstSQL&&f_codigo_nuevo.getVal()>0",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_SHOW_ => "f_codigo_nuevo.getVal()>0",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylemsg",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{msg}|).setAttribute(|{style}|,|{height:24px;color:red;font-size:14px;font-weight:bolder}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylemsgrem",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{msgrem}|).setAttribute(|{style}|,|{height:24px;color:blue;font-size:14px;font-weight:bolder}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "stylenewcode",
        F_ALIAS_ => "Style",
        F_HELP_ => "Style",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "300",
        C_VIEW_ => "false",
        F_FORMULA_ => " document.getElementById(|{f_codigo_nuevo}|).setAttribute(|{style}|,|{height:30px;color:green;font-size:18px;font-weight:bolder}|);",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

?>
