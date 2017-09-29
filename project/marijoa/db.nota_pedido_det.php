<?php
$Obj->name = "nota_pedido_det";
$Obj->alias = "Detalle de Nota de Pedido";
$Obj->help = "Detalle de Nota de Pedido";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "nota_pedido_det";
$Obj->Filter = "";
$Obj->Sort = "";
$Obj->p_insert = "";
$Obj->p_change = "'SELECT revisar_pedido_det('+nro_pedido.getVal()+')'";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "1";
$Obj->Limit = "";
$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "2",
        C_SHOW_ => "sup['estado']=='Abierta'",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__user",
        F_ALIAS_ => "Usuario",
        F_HELP_ => "Código del usuario",
        F_TYPE_ => "formula",
        F_RELTABLE_ => "mnt_func",
        F_NODB_ => "1",
        F_ORD_ => "4",
        C_CHANGE_ => "false",
        F_FORMULA_ => "p_user_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "nro_pedido",
        F_ALIAS_ => "Nro Pedido",
        F_HELP_ => "Nro Pedido",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "10",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "estado_cab",
        F_ALIAS_ => "Estado Pedido",
        F_HELP_ => "Estado Pedido",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select estado from nota_pedido where nro = '+nro_pedido.getVal()",
        F_QUERY_REF_ => "estado_cab.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "15",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "codigo",
        F_ALIAS_ => "Código",
        F_HELP_ => "Codigo",
        F_TYPE_ => "text",
        F_LENGTH_ => "14",
        F_BROW_ => "1",
        F_ORD_ => "20",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "grupo",
        F_ALIAS_ => "Grupo",
        F_HELP_ => "Grupo",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "30",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "tipo",
        F_ALIAS_ => "Tipo",
        F_HELP_ => "Tipo",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "40",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "color",
        F_ALIAS_ => "Color",
        F_HELP_ => "Color",
        F_TYPE_ => "text",
        F_LENGTH_ => "40",
        F_BROW_ => "1",
        F_ORD_ => "50",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "descrip",
        F_ALIAS_ => "Descrip",
        F_HELP_ => "Descipcion",
        F_TYPE_ => "text",
        F_LENGTH_ => "80",
        F_ORD_ => "54",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cantidad",
        F_ALIAS_ => "Cantidad",
        F_HELP_ => "Cantidad",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_DEC_ => "2",
        F_BROW_ => "1",
        F_ORD_ => "60",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "urge",
        F_ALIAS_ => "Urgente",
        F_HELP_ => "Urgente",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "70",
        F_INLINE_ => "1",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "busc",
        F_ALIAS_ => "Buscar",
        F_HELP_ => "Buscar",
        F_TYPE_ => "text",
        F_LENGTH_ => "20",
        F_NODB_ => "1",
        F_ORD_ => "80",
        F_INLINE_ => "1",
        G_SHOW_ => "131104",
        G_CHANGE_ => "131104"));

$Obj->Add(
    array(
        F_NAME_ => "prov",
        F_ALIAS_ => "Proveedor",
        F_HELP_ => "Proveedor",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "busc.hasChanged()",
        F_RELTABLE_ => "mnt_prov",
        F_SHOWFIELD_ => "prov_nombre,prov_tel",
        F_FILTER_ => "'prov_nombre like |{'+busc.get()+'%}|order by prov_nombre asc'",
        F_ORD_ => "90",
        F_INLINE_ => "1",
        G_SHOW_ => "131104",
        G_CHANGE_ => "131104"));

$Obj->Add(
    array(
        F_NAME_ => "precio",
        F_ALIAS_ => "Precio",
        F_HELP_ => "Precio",
        F_TYPE_ => "text",
        F_QUERY_ => " ",
        F_QUERY_REF_ => " ",
        F_LENGTH_ => "16",
        F_DEC_ => "0",
        F_ORD_ => "100",
        F_INLINE_ => "1",
        G_SHOW_ => "131104",
        G_CHANGE_ => "131104"));

$Obj->Add(
    array(
        F_NAME_ => "estado",
        F_ALIAS_ => "Marcar",
        F_HELP_ => "Para cargar en una Nota de Remision Marque con la x aqui Seleccione Si (Le mostrara el Nro de Remision Abierta hacia el Destino Si no existe una Abierta le sistema le generara una), y luego confirme que cargara toda la pieza al detalle de la Nota de Remision",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Pendiente,Enviado,Suspendido",
        F_BROW_ => "1",
        F_ORD_ => "150",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "remitir",
        F_ALIAS_ => "Cargar en una Nota de Remision",
        F_HELP_ => "Cargar en una Nota de Remision",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "160",
        C_SHOW_ => "sup['estado']=='Pendiente'&&estado.get()=='x'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_nro",
        F_ALIAS_ => "Nº Remision",
        F_HELP_ => "Numero del remito que esta Abierto de esta sucursal a otra",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select genera_remito ('+sup['__locald']+', '+sup['__local']+','+__user.getStr()+')'",
        F_QUERY_REF_ => "remitir.get()=='Si'&&rem_nro.firstSQL",
        F_LENGTH_ => "10",
        F_NODB_ => "1",
        F_ORD_ => "170",
        F_INLINE_ => "1",
        C_SHOW_ => "remitir.get()=='Si'",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "ins_rem",
        F_ALIAS_ => "Confirmar Insertar en la Remision",
        F_HELP_ => "Confirmar Insertar en la Remision",
        F_TYPE_ => "proc",
        F_QUERY_ => "'insert into remito_det (id, rem_nro, df_cod_prod, df_descrip, df_disponible, marcar, enviado)values(default,'+rem_nro.getStr()+','+codigo.getStr()+', |{ '+grupo.get()+' '+tipo.get()+' '+color.get()+' }| ,'+cantidad.getVal()+', |{}|, |{}|)'",
        F_NODB_ => "1",
        F_ORD_ => "175",
        F_INLINE_ => "1",
        C_SHOW_ => "rem_nro.getVal()>0&&!ins_rem.get()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "message",
        F_ALIAS_ => "Ok",
        F_HELP_ => "Ayuda",
        F_TYPE_ => "formula",
        F_MULTI_ => "1",
        F_LENGTH_ => "60",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_VIEW_ => "sup['estado']=='Pendiente'&&ins_rem.get()",
        F_FORMULA_ => "'Ok... puede presionar Aceptar'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "help",
        F_ALIAS_ => "Ayuda",
        F_HELP_ => "Ayuda",
        F_TYPE_ => "formula",
        F_MULTI_ => "1.06",
        F_LENGTH_ => "1024",
        F_NODB_ => "1",
        F_ORD_ => "180",
        C_VIEW_ => "sup['estado']=='Pendiente'&&!ins_rem.get()",
        F_FORMULA_ => "'Para cargar en una Nota de Remision Marque con la x aqui Seleccione Si (Le mostrara el Nro de Remision Abierta hacia el Destino Si no existe una Abierta le sistema le generara una), y luego confirme que cargara toda la pieza al detalle de la Nota de Remision, Presione Aceptar para finalizar...'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "registra_ubic",
        F_ALIAS_ => "Sala del Estante",
        F_HELP_ => "Registra Salida de Producto",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select ins_ubic('+__user.getStr()+','+codigo.getStr()+')'",
        F_QUERY_REF_ => "ins_rem.get()&&registra_ubic.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "190",
        C_SHOW_ => "ins_rem.get()",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_ped",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha",
        F_TYPE_ => "date",
        F_ORD_ => "200",
        G_SHOW_ => "131104",
        G_CHANGE_ => "131104"));

$Obj->Add(
    array(
        F_NAME_ => "fecha_previsto",
        F_ALIAS_ => "Fecha Prevista",
        F_HELP_ => "Fecha Prevista para Recepcion de Pedido",
        F_TYPE_ => "date",
        F_BROW_ => "1",
        F_ORD_ => "210",
        G_SHOW_ => "131104",
        G_CHANGE_ => "131104"));

$Obj->Add(
    array(
        F_NAME_ => "__disableDel",
        F_ALIAS_ => "Inhabilita boton de borrar",
        F_HELP_ => "Inhabilita boton de borrar",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "220",
        C_VIEW_ => "false",
        F_FORMULA_ => "if (p_user_!='Developer'){ if(estado_cab.get()!='Abierta'){ disableDeleteButton() }else{ enableDeleteButton() } }",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "1024",
        F_ORD_ => "230",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod_rem",
        F_ALIAS_ => "Codigo de Remplazo",
        F_HELP_ => "Codigo de Remplazo",
        F_TYPE_ => "text",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_ORD_ => "240",
        C_VIEW_ => "false",
        G_SHOW_ => "65584",
        G_CHANGE_ => "65584"));

?>
