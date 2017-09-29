<?php

/** Report prg file (imp_cheque_terc) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
/*
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_chq_ref', '1');
$T->Set( 'sup___disableDel', 'true');
$T->Set( 'sup_chq_bco', 'Itapua');
$T->Set( 'sup_chq_cta', '6800014/1');
$T->Set( 'sup_chq_num', '17626');
$T->Set( 'sup_chq_nombre_de', 'Mirtha Afara');
$T->Set( 'sup_chq_fecha_emis', '2009-04-13');
$T->Set( 'sup_chq_fecha_pag', '2009-04-13');
$T->Set( 'sup_chq_valor', '1600000.00');
$T->Set( 'sup_chq_moneda', 'G$');
$T->Set( 'sup_chq_cotiz', '1');
$T->Set( 'sup_chq_moneda_ref', '1600000');
$T->Set( 'sup___local', '02');
$T->Set( 'sup___caja_ref', '5879');
$T->Set( 'sup_chq_estado', 'Cobrado');
$T->Set( 'sup_chq_mot_anul', '');
$T->Set( 'sup_chq_recibido', 'Recibido');
$T->Set( 'sup_chq_recibido2', 'Recibido');
$T->Set( 'sup_chq_fecha_ins', '');
$T->Set( 'sup_chq_imprimir', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:

 

$chq_num = $sup['chq_num'];

$query0 = "SELECT chq_ref AS REF, upper(chq_bco) AS BANCO,chq_cta AS CUENTA, chq_num AS NRO,upper(chq_nombre_de) AS BENEFICIARIO,date_format(chq_fecha_ins, '%d-%m-%y') AS FECHA_REGISTRO,date_format(chq_fecha_pag, '%d-%m-%y') AS FECHA_PAGO,date_format(chq_fecha_emis, '%d-%m-%y') AS FECHA_EMIS,chq_valor AS VALOR, chq_moneda AS MONEDA,chq_cotiz AS COTIZACION_ACTUAL, chq_moneda_ref AS EQUIV_GS,__local AS SUC,chq_recibido as ADMINISTRATION,chq_recibido2 AS GERENCIA, chq_estado AS ESTADO FROM cheq_terceros  WHERE chq_num = '$chq_num' ";
$Q0 = $DB;

if(isset($_REQUEST['id'] )){
$id = $_REQUEST['id'];
 
require_once("../../../../include/Y_Template.class.php");
require_once("../../../../include/Y_DB.class.php");

  $query0 = "SELECT chq_ref AS REF, upper(chq_bco) AS BANCO,chq_cta AS CUENTA, chq_num AS NRO,upper(chq_nombre_de) AS BENEFICIARIO,date_format(chq_fecha_ins, '%d-%m-%y') AS FECHA_REGISTRO,date_format(chq_fecha_pag, '%d-%m-%y') AS FECHA_PAGO,date_format(chq_fecha_emis, '%d-%m-%y') AS FECHA_EMIS,chq_valor AS VALOR, chq_moneda AS MONEDA,chq_cotiz AS COTIZACION_ACTUAL, chq_moneda_ref AS EQUIV_GS,__local AS SUC,chq_recibido as ADMINISTRATION,chq_recibido2 AS GERENCIA, chq_estado AS ESTADO FROM cheq_terceros  WHERE id = '$id' ";
  $T = new Y_Template( "imp_cheque_terc_tpl.php" );
  $Q0 = new Y_DB();
  $Q0->Database = "marijoa";
  $Q0->Query( $query0 );
  $Q0->NextRecord();
  
  $el['NRO'] = $Q0->Record['NRO'];
  $T->Set("sup_chq_num",$el['NRO']);
  
} 




$T->Set( 'time', date("d-m-Y H:i:s") );
$T->Set( 'user', $Global['username'] );

$gerencia = $sup['chq_recibido2'];

$firstRow=true;

$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['REF'] = '';
$old['BANCO'] = '';
$old['CUENTA'] = '';
$old['NRO'] = '';
$old['BENEFICIARIO'] = '';
$old['FECHA_REGISTRO'] = '';
$old['FECHA_PAGO'] = '';
$old['FECHA_EMIS'] = '';
$old['VALOR'] = '';
$old['MONEDA'] = '';
$old['COTIZACION_ACTUAL'] = '';
$old['EQUIV_GS'] = '';
$old['SUC'] = '';
$old['ADMINISTRATION'] = '';
$old['GERENCIA'] = '';
$old['ESTADO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['REF'] = $Q0->Record['REF'];
    $el['BANCO'] = $Q0->Record['BANCO'];
    $el['CUENTA'] = $Q0->Record['CUENTA'];
    $el['NRO'] = $Q0->Record['NRO'];
    $el['BENEFICIARIO'] = $Q0->Record['BENEFICIARIO'];
    $el['FECHA_REGISTRO'] = $Q0->Record['FECHA_REGISTRO'];
    $el['FECHA_PAGO'] = $Q0->Record['FECHA_PAGO'];
    $el['FECHA_EMIS'] = $Q0->Record['FECHA_EMIS'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['MONEDA'] = $Q0->Record['MONEDA'];
    $el['COTIZACION_ACTUAL'] = $Q0->Record['COTIZACION_ACTUAL'];
    $el['EQUIV_GS'] = $Q0->Record['EQUIV_GS'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['ADMINISTRATION'] = $Q0->Record['ADMINISTRATION'];
    $el['GERENCIA'] = $gerencia;
    $el['ESTADO'] = $Q0->Record['ESTADO'];
	
	 
	
	//if($el['ADMINISTRATION'] == ""){
	   $el['ADMINISTRATION'] = $sup['chq_recibido'];
	//}

    // Preparing a template variables
    $T->Set('query0_REF', $el['REF']);
    $T->Set('query0_BANCO', $el['BANCO']);
    $T->Set('query0_CUENTA', $el['CUENTA']);
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_BENEFICIARIO', $el['BENEFICIARIO']);
    $T->Set('query0_FECHA_REGISTRO', $el['FECHA_REGISTRO']);
    $T->Set('query0_FECHA_PAGO', $el['FECHA_PAGO']);
    $T->Set('query0_FECHA_EMIS', $el['FECHA_EMIS']);
    $T->Set('query0_VALOR', number_format($el['VALOR'],0,',','.'));     
    $T->Set('query0_MONEDA', $el['MONEDA']);
    $T->Set('query0_COTIZACION_ACTUAL', $el['COTIZACION_ACTUAL']);
    $T->Set('query0_EQUIV_GS', number_format($el['EQUIV_GS'],0,',','.'));   
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_ADMINISTRATION', $el['ADMINISTRATION']);
    $T->Set('query0_GERENCIA', $el['GERENCIA']);
    $T->Set('query0_ESTADO', $el['ESTADO']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['REF'] = $el['REF'];
    $old['BANCO'] = $el['BANCO'];
    $old['CUENTA'] = $el['CUENTA'];
    $old['NRO'] = $el['NRO'];
    $old['BENEFICIARIO'] = $el['BENEFICIARIO'];
    $old['FECHA_REGISTRO'] = $el['FECHA_REGISTRO'];
    $old['FECHA_PAGO'] = $el['FECHA_PAGO'];
    $old['FECHA_EMIS'] = $el['FECHA_EMIS'];
    $old['VALOR'] = $el['VALOR'];
    $old['MONEDA'] = $el['MONEDA'];
    $old['COTIZACION_ACTUAL'] = $el['COTIZACION_ACTUAL'];
    $old['EQUIV_GS'] =  $el['EQUIV_GS'];
    $old['SUC'] = $el['SUC'];
    $old['ADMINISTRATION'] = $el['ADMINISTRATION'];
    $old['GERENCIA'] = $el['GERENCIA'];
    $old['ESTADO'] = $el['ESTADO'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
