<?php
$Obj->name = "remito";
$Obj->alias = "Nota de Remision";
$Obj->help = "Nota de Remision";
$Obj->copy_from = "";
$Obj->Inheritance = "";
$Obj->File = "nota_remision";
$Obj->Filter = "";
$Obj->Sort = "id desc";
$Obj->p_insert = "";
$Obj->p_change = "";
$Obj->p_delete = "";
$Obj->Zebra = "white,lightblue";
$Obj->Noedit = "";
$Obj->NoInsert = "";
$Obj->Limit = "100";
$Obj->Add(
    array(
        F_NAME_ => "rem_nro",
        F_ALIAS_ => "Nro",
        F_HELP_ => "Numero del remito",
        F_TYPE_ => "text",
        F_AUTONUM_ => "1",
        F_LENGTH_ => "10",
        F_DEC_ => "0",
        F_BROW_ => "1",
        F_ORD_ => "5",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "2147483647"));

$Obj->Add(
    array(
        F_NAME_ => "__local",
        F_ALIAS_ => "Obtiene Localidad",
        F_HELP_ => "Obtiene la localidad del usuario actual",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "__local.firstSQL&&operation==INSERT_",
        F_RELTABLE_ => "p_users",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "7",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__func_fullname",
        F_ALIAS_ => "Obtiene Nombre Completo",
        F_HELP_ => "Obtiene Nombre Completo del Funcionario",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'SELECT p_users.obs FROM p_users WHERE p_users.name = |{'+p_user_+'}|'",
        F_QUERY_REF_ => "__func_fullname.firstSQL&&operation==INSERT_",
        F_RELTABLE_ => "mnt_func",
        F_LENGTH_ => "3",
        F_NODB_ => "1",
        F_ORD_ => "8",
        F_INLINE_ => "1",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_fecha",
        F_ALIAS_ => "Fecha",
        F_HELP_ => "Fecha de emisi�n del remito",
        F_TYPE_ => "date",
        F_LENGTH_ => "10",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        V_DEFAULT_ => "thisDate_",
        C_VIEW_ => "true",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_fecha_cier",
        F_ALIAS_ => "Fecha Cierre",
        F_HELP_ => "Fecha Cierre",
        F_TYPE_ => "date",
        F_ORD_ => "10",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_origen",
        F_ALIAS_ => "Origen",
        F_HELP_ => "Origen",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select p.local from p_users p where name =|{'+p_user_+'}|'",
        F_QUERY_REF_ => "rem_origen.firstSQL",
        F_LENGTH_ => "6",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "11",
        C_SHOW_ => "__local.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_dir_origen",
        F_ALIAS_ => "Direccion de Origen",
        F_HELP_ => "Direccion de Origen",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select emp_nombre from par_empresas where emp_cod = '+__local.getStr()+''",
        F_QUERY_REF_ => "rem_dir_origen.firstSQL",
        F_LENGTH_ => "20",
        F_BROW_ => "1",
        F_ORD_ => "12",
        F_INLINE_ => "1",
        C_SHOW_ => "__local.get()!=''",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_destino",
        F_ALIAS_ => "Destino",
        F_HELP_ => "Destino",
        F_TYPE_ => "select_list",
        F_RELTABLE_ => "par_empresas",
        F_SHOWFIELD_ => "emp_cod,emp_nombre",
        F_FILTER_ => "'emp_cod <> '+rem_origen.getStr()+' order by emp_cod'",
        F_BROW_ => "1",
        F_REQUIRED_ => "1",
        F_ORD_ => "13",
        C_SHOW_ => "rem_origen.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_dir_destino",
        F_ALIAS_ => "Direccion de Destino",
        F_HELP_ => "Direccion de Destino",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select emp_nombre from par_empresas where emp_cod = '+rem_destino.getStr()+' '",
        F_QUERY_REF_ => "rem_destino.hasChanged()",
        F_RELTABLE_ => "par_empresas",
        F_RELFIELD_ => "emp_cod",
        F_LOCALFIELD_ => "rem_destino",
        F_LENGTH_ => "50",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "movto",
        F_ALIAS_ => "Mover Items Enviados",
        F_HELP_ => "Mover Items Enviados",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "16",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_open",
        F_ALIAS_ => "Nro Remision Abierta:",
        F_HELP_ => "Nro Remision Abierta",
        F_TYPE_ => "dynamic_select_list",
        F_DSL_ => "movto.get()=='Si'&&movto.hasChanged()",
        F_QUERY_REF_ => "rem_open.firstSQL",
        F_RELTABLE_ => "nota_remision",
        F_SHOWFIELD_ => "rem_nro,rem_func_nombre",
        F_FILTER_ => "'rem_nro <> '+rem_nro.getVal()+' and rem_estado = |{Abierta}| and rem_origen = '+rem_origen.getStr()+' and rem_destino = '+rem_destino.getStr()+''",
        F_LENGTH_ => "8",
        F_NODB_ => "1",
        F_ORD_ => "17",
        F_INLINE_ => "1",
        C_SHOW_ => "movto.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "mov",
        F_ALIAS_ => "Mover Items",
        F_HELP_ => "Mover Items",
        F_TYPE_ => "proc",
        F_QUERY_ => "'update remito_det set rem_nro = '+rem_open.getStr()+' where rem_nro = '+rem_nro.getStr()+'  and (enviado is null or enviado = |{}|) '",
        F_NODB_ => "1",
        F_ORD_ => "18",
        F_INLINE_ => "1",
        C_SHOW_ => "rem_open.getVal()>0 && movto.get()=='Si'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "gen_rem",
        F_ALIAS_ => "Generar Remito",
        F_HELP_ => "Generar Remito",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "23",
        C_VIEW_ => "operation==INSERT_&&rem_destino.get()!=''",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_insgroup",
        F_ALIAS_ => "Insertar de Forma",
        F_HELP_ => "Punteo con Laser o Manual",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "Manual,Laser",
        F_NODB_ => "1",
        F_ORD_ => "23",
        C_VIEW_ => "operation==CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "puntear_p_enviar",
        F_ALIAS_ => "Puntear p/Enviar",
        F_HELP_ => "Puntear y Pesar para Enviar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.rem_enviar",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_SHOW_ => "operation==CHANGE_ && rem_estado.get()=='Abierta' && rem_insgroup.get()=='Manual'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_env_emp_ref",
        F_ALIAS_ => "Transportadora:",
        F_HELP_ => "Puntear y Pesar para Enviar",       
		F_TYPE_ => "select_list",
		F_OPTIONS_ => "Nuevo",
        F_RELTABLE_ => "nota_remision",
        F_SHOWFIELD_ => "rem_env_emp,''",
        F_FILTER_ => "'rem_env_emp<>|{}| or rem_env_emp is not null group by rem_env_emp order by rem_env_emp asc'",        
        F_REQUIRED_ => "0",
        F_ORD_ => "23",
        C_SHOW_ => "true",        
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "0",
        C_SHOW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_env_emp",
        F_ALIAS_ => ":",
        F_HELP_ => "Empres encargada del Env�o",
        F_TYPE_ => "text",             
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_SHOW_ => "rem_env_emp_ref.get()!='Movil local'",
		C_CHANGE_ => "operation==CHANGE_ && rem_estado.get()=='Abierta'&&rem_env_emp_ref.get()=='Nuevo'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_env_cod",
        F_ALIAS_ => "Nro. Levante:",
        F_HELP_ => "Nro. Levante:",
        F_TYPE_ => "text",        
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_SHOW_ => "rem_env_emp_ref.get()!='Movil local'",
		C_CHANGE_ => "operation==CHANGE_ && rem_estado.get()=='Abierta'",
		G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_procede",
        F_ALIAS_ => "Proceder a Insertar",
        F_HELP_ => "Proceder a Insertar",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.ins_prod_remi",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_VIEW_ => "rem_insgroup.get()=='Laser'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_marcar_enviado",
        F_ALIAS_ => "Proceder a Puntear como Enviado",
        F_HELP_ => "Proceder Puntear como Enviado",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.punteo_remito",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "1",
        C_VIEW_ => "rem_insgroup.get()=='Laser'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_group",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_MULTI_ => "1.16",
        F_LENGTH_ => "30",
        F_NODB_ => "1",
        F_ORD_ => "23",
        F_INLINE_ => "0",
        C_SHOW_ => "rem_insgroup.get()=='Laser'",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_detalle",
        F_ALIAS_ => "Detalle del remito",
        F_HELP_ => "Detalle del remito",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'rem_nro='+rem_nro.get()+' '",
        F_LINK_ => "db.remito_det",
        F_SEND_ => "rem_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "26",
        C_SHOW_ => "operation!=INSERT_&&rem_nro.getVal()>0 ",
        C_VIEW_ => "operation!=INSERT_&&rem_nro.getVal()>0 ",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "cod_rep_n_remision",
        F_ALIAS_ => "Codigos repetidos en la remision",
        F_HELP_ => "Codigos repetidos en la remision",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from remito_det where rem_nro='+rem_nro.get()+' group by remito_det.df_cod_prod having(count(*)>1)'",
        F_QUERY_REF_ => "(cod_rep_n_remision.firstSQL&&rem_nro.getVal()>0)||(rem_fin.hasChanged()&&rem_fin.get()=='Si')",
        F_RELTABLE_ => "remito_det",
        F_RELFIELD_ => "df_cod_prod",
        F_LOCALFIELD_ => "rem_nro",
		F_NODB_ => "1",
        F_LENGTH_ => "2",
        F_ORD_ => "13",
        F_INLINE_ => "1",
        C_CHANGE_ => "false",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_repetidos",
        F_ALIAS_ => "Codigos repetidos en remision",
        F_HELP_ => "Codigos repetidos en remision",
        F_TYPE_ => "subform",
        F_OPTIONS_ => "'rem_nro='+rem_nro.get()+' group by remito_det.df_cod_prod having(count(*)>1)'",
        F_LINK_ => "db.remito_det",
        F_SEND_ => "rem_nro.get()",
        F_NODB_ => "1",
        F_ORD_ => "261",
        C_SHOW_ => "operation!=INSERT_&&rem_nro.getVal()>0&&cod_rep_n_remision.get()>0",
        C_VIEW_ => "operation!=INSERT_&&rem_nro.getVal()>0&&cod_rep_n_remision.get()>0",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_estado",
        F_ALIAS_ => "Estado",
        F_HELP_ => "Estado Abierta, En Proceso, Cerrada",
        F_TYPE_ => "text",
        F_LENGTH_ => "12",
        F_BROW_ => "1",
        F_ORD_ => "27",
        V_DEFAULT_ => "'Abierta'",
        C_VIEW_ => "false",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_fin",
        F_ALIAS_ => "Finalizar",
        F_HELP_ => "Finalizar",
        F_TYPE_ => "select_list",
        F_OPTIONS_ => "No,Si",
        F_NODB_ => "1",
        F_ORD_ => "27",
        C_VIEW_ => "operation!=INSERT_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_tot",
        F_ALIAS_ => "Total de Pieza",
        F_HELP_ => "Total de Pieza",
        F_TYPE_ => "proc",
        F_QUERY_ => "'select count(*) from remito_det where rem_nro = '+rem_nro.get()+' '",
        F_NODB_ => "1",
        F_ORD_ => "28",
        F_INLINE_ => "1",
        C_SHOW_ => "openSubform",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_tot_piez",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(*) from remito_det where rem_nro = '+rem_nro.get()+' '",
        F_QUERY_REF_ => "rem_tot.get()&& rem_tot_piez.firstSQL || rem_fin.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "29",
        F_INLINE_ => "1",
        C_SHOW_ => "openSubform",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_env",
        F_ALIAS_ => " ",
        F_HELP_ => "  ",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'select count(distinct(df_cod_prod)) from remito_det where enviado = |{Enviado}| and kg_env > 0 and rem_nro = '+rem_nro.get()+' '",
        F_QUERY_REF_ => "rem_tot.get()&& rem_env.firstSQL || rem_fin.hasChanged()",
        F_LENGTH_ => "4",
        F_NODB_ => "1",
        F_ORD_ => "30",
        F_INLINE_ => "1",
        C_SHOW_ => "openSubform",
        C_CHANGE_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "add_kg_all",
        F_ALIAS_ => "Agregar Kg Rec/Kg Env",
        F_HELP_ => "Agregar Kg Rec/Kg Env Tara 0 Ajuste 0",
        F_TYPE_ => "proc",
        F_QUERY_ => "'UPDATE remito_det SET marcar = |{Recibido}| ,enviado = |{Enviado}|,kg_env = 1,kg_rec = kg_env,mts_calc_env = 1, mts_calc_rec = mts_calc_env, tara = 0, ajuste = 0 WHERE rem_nro = '+rem_nro.getStr()+''",
        F_NODB_ => "1",
        F_ORD_ => "32",
        F_INLINE_ => "1",
        C_SHOW_ => "openSubform && rem_obs.get()!='' && (p_user_ == 'victor' || p_user_ == 'Douglas')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "add_kg_rec_eq_env",
        F_ALIAS_ => "Agregar Kg Rec = Kg Env",
        F_HELP_ => "Agregar Kg Recibido = Enviado",
        F_TYPE_ => "proc",
        F_QUERY_ => "'UPDATE remito_det SET marcar = |{Recibido}| ,enviado = |{Enviado}|, kg_rec = kg_env, mts_calc_rec = mts_calc_env, tara = 0, ajuste = 0 WHERE rem_nro = '+rem_nro.getStr()+''",
        F_NODB_ => "1",
        F_ORD_ => "33",
        F_INLINE_ => "1",
        C_SHOW_ => "openSubform && rem_obs.get()!='' && (p_user_ == 'victor' || p_user_ == 'Douglas')",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_obs",
        F_ALIAS_ => "Observacion",
        F_HELP_ => "Observacion",
        F_TYPE_ => "text",
        F_MULTI_ => "1",
        F_LENGTH_ => "60",
        F_ORD_ => "35",
        C_VIEW_ => "true",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_aceptar",
        F_ALIAS_ => "Confirmar (Finalizar Remision)",
        F_HELP_ => "Enviar Nota de Remision a En Proceso",
        F_TYPE_ => "proc",
        F_QUERY_ => "'SELECT cerrar_nota_remision('+rem_nro.getStr()+','+rem_origen.getStr()+','+rem_destino.getStr()+',|{-}|,|{-}| ,'+rem_dir_destino.getStr()+','+rem_dir_origen.getStr()+')' ",
        F_BROW_ => "1",
        F_NODB_ => "1",
        F_ORD_ => "36",
        F_INLINE_ => "1",
        C_SHOW_ => "(openSubform&&rem_estado.get()=='Abierta'&&rem_aceptar.get()=='')&&rem_destino.get()!=''&&rem_fin.get()=='Si' && (rem_tot_piez.getVal() == rem_env.getVal() && rem_tot_piez.getVal()>0)",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_imprimir",
        F_ALIAS_ => "                Imprimir                ",
        F_HELP_ => "Imprimir",
        F_TYPE_ => "report",
        F_REPORT_ => "rep.nota_remision",
        F_NODB_ => "1",
        F_ORD_ => "38",        
        C_SHOW_ => "(rem_env_emp.get()=='Movil local'||(rem_env_emp.get()!='Movil local' && rem_env_cod.get()!=''))",       
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_sent",
        F_ALIAS_ => "Sentinela",
        F_HELP_ => "Sentinela",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'Select 1'",
        F_QUERY_REF_ => "rem_aceptar.get()",
        F_LENGTH_ => "2",
        F_NODB_ => "1",
        F_ORD_ => "40",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "rem_receptor",
        F_ALIAS_ => "Funcionario que recibe",
        F_HELP_ => "Funcionario que recibe",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "75",
        C_VIEW_ => "false",
        F_FORMULA_ => "|{'+p_user_+'}|",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__lock",
        F_ALIAS_ => "Bloquea el boton Insert/Accept",
        F_HELP_ => "Bloquea el boton Insert/Accept",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "105",
        C_SHOW_ => "rem_sent.get()=='1'||rem_estado.get()=='Cerrada'||operation==INSERT_||rem_nro.getVal()<1",
        C_VIEW_ => "false",
        F_FORMULA_ => "disableAcceptButton()",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "alert_codigo_rep",
        F_ALIAS_ => "Codigo Repetidos",
        F_HELP_ => "Codigo Repetidos",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "107",
        C_SHOW_ => "cod_rep_n_remision.get()>0",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById('error_message').innerHTML='Se encontraton codigos duplicandos en esta remision';document.getElementById('error_message').style.display='block';",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "corr_cants",
        F_ALIAS_ => "Corrige Stock de Productos",
        F_HELP_ => "Corrige Stock de Productos",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update remito_det, mnt_prod set df_disponible = mnt_prod.p_cant where rem_nro = '+rem_nro.getVal()+' and df_cod_prod = mnt_prod.p_cod'",
        F_QUERY_REF_ => "rem_aceptar.get()&&corr_cants.firstSQL",
        F_NODB_ => "1",
        F_ORD_ => "115",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__insert",
        F_ALIAS_ => "Inserta",
        F_HELP_ => "Inserta",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'insert into nota_remision(id, rem_fecha, rem_nro,rem_origen,rem_destino,rem_vend_cod,rem_func_nombre,rem_dir_destino,rem_dir_origen,rem_estado )values(default, current_date,'+rem_nro.getVal()+','+rem_origen.getStr()+','+rem_destino.getStr()+',|{'+p_user_+'}|,|{'+__func_fullname.get()+'}|,'+rem_dir_destino.getStr()+','+rem_dir_origen.getStr()+',|{Abierta}|)'",
        F_QUERY_REF_ => "__insert.firstSQL&&gen_rem.get()=='Si'",
        F_NODB_ => "1",
        F_ORD_ => "135",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));

$Obj->Add(
    array(
        F_NAME_ => "__change",
        F_ALIAS_ => "Operation = CHANGE_",
        F_HELP_ => "Operation = CHANGE_",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "136",
        C_SHOW_ => "__insert.get()=='__NO DATA__'",
        C_VIEW_ => "false",
        F_FORMULA_ => "operation=CHANGE_",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));
 
$Obj->Add(
    array(
        F_NAME_ => "open_sub",
        F_ALIAS_ => "Abre Subformulario",
        F_HELP_ => "Abre Subformulario",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "137",
        C_SHOW_ => "open_sub.firstSQL&&gen_rem.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "document.getElementById(|{rem_detalle}|).setAttribute(|{hidden}|,|{false}|);  document.getElementById(|{hbox_rem_detalle}|).setAttribute(|{height}|,|{260}|);   ",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));         

$Obj->Add(
    array(
        F_NAME_ => "doclick",
        F_ALIAS_ => "click",
        F_HELP_ => "Contro click",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "138",
        C_SHOW_ => "doclick.firstSQL&&gen_rem.get()=='Si'",
        C_VIEW_ => "false",
        F_FORMULA_ => "if( !openSubform   ){ document.getElementById(|{cap`rem_detalle`Detalle del remito}|).click(); openSubform=true;}",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));               

$Obj->Add(
    array(
        F_NAME_ => "rem_env_emp_update",
        F_ALIAS_ => "Actualizar rem_env_emp",
        F_HELP_ => "Actualizar rem_env_emp",
        F_TYPE_ => "formula",
        F_NODB_ => "1",
        F_ORD_ => "17",
        C_SHOW_ => "rem_env_emp_ref.hasChanged()",
        C_VIEW_ => "false",
        F_FORMULA_ => "setValue('rem_env_cod','');if(rem_env_emp_ref.get()!=='Nuevo'){ setValue('rem_env_emp',rem_env_emp_ref.get());}",
        G_SHOW_ => "238",
        G_CHANGE_ => "238"));    

$Obj->Add(
    array(
        F_NAME_ => "updateLevante",
        F_ALIAS_ => "Update Levante",
        F_HELP_ => "Update Levante",
        F_TYPE_ => "text",
        F_MAKE_QUERY_ => "1",
        F_QUERY_ => "'update nota_remision set rem_env_emp = '+rem_env_emp.getStr()+', rem_env_cod = '+rem_env_cod.getStr()+' where rem_nro ='+ rem_nro.get()",
        F_QUERY_REF_ => "(rem_env_emp.get()=='Movil local'||(rem_env_emp.get()!='Movil local' && rem_env_cod.get()!=''))",
        F_NODB_ => "1",
        F_ORD_ => "135",
        C_VIEW_ => "false",
        G_SHOW_ => "64",
        G_CHANGE_ => "64"));           

?>
