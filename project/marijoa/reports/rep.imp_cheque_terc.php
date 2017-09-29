<?php
/** project/marijoa/reports/rep.imp_cheque_terc.php    ( db_form )
 * 
 * @author 	ycube RAD Plus ( automatically Generated ) 
 * 
 */ 

$Obj->name = "imp_cheque_terc";
$Obj->alias = "Datos del Cheque";
$Obj->ndoc = "Datos del Cheque";
$Obj->help = "Datos del Cheque";
$Obj->query = "'SELECT chq_ref AS REF, upper(chq_bco) AS BANCO,chq_cta AS CUENTA, chq_num AS NRO,upper(chq_nombre_de) AS BENEFICIARIO,date_format(chq_fecha_ins, |{%d-%m-%Y}|) AS FECHA_REGISTRO,date_format(chq_fecha_pag, |{%d-%m-%Y}|) AS FECHA_PAGO,date_format(chq_fecha_emis, |{%d-%m-%Y}|) AS FECHA_EMIS,chq_valor AS VALOR, chq_moneda AS MONEDA,chq_cotiz AS COTIZACION_ACTUAL, chq_moneda_ref AS EQUIV_GS,__local AS SUC,chq_recibido as ADMINISTRATION,chq_recibido2 AS GERENCIA, chq_estado AS ESTADO FROM cheq_terceros  WHERE chq_num = '+el['chq_num']+' '";
$Obj->del_prg = "";
$Obj->del_tpl = "";
$Obj->tot = "";
$Obj->pre_sub = "";
$Obj->cond_sub = "";
$Obj->subtotal = "";
$Obj->dec_sub = "";
$Obj->cond_tot = "";
$Obj->total = "";
$Obj->dec_tot = "";
$Obj->query_end = "";
?>
