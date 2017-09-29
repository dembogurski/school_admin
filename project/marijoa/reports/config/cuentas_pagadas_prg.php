<?php

/** Report prg file (cuentas_pagadas) 
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
$T->Set( 'sup_busc_prov', 'PI');
$T->Set( 'sup_prov', '%');
$T->Set( 'sup_desde', '2009-01-20');
$T->Set( 'sup_hasta', '2009-10-20');
$T->Set( 'sup_rep', '');
$T->Set( 'sup___lock', 'true');  */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select id as ID, ct_nro as Nro, ct_fecha_venc as VENCIMIENTO, ct_prov as PROVEEDOR, ct_monto as MONTO, ct_estado as ESTADO from cuotas_pagar where ct_fecha_venc between '2009-01-20' and '2009-10-20' and ct_prov like '%'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables
$subtotal0_MONTO = 0;


//Define a Old Values Variables
$old['ID'] = '';
$old['Nro'] = '';
$old['VENCIMIENTO'] = '';
$old['PROVEEDOR'] = '';
$old['MONTO'] = '';
$old['ESTADO'] = '';
$old['DETALLE'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['ID'] = $Q0->Record['ID'];
    $el['Nro'] = $Q0->Record['Nro'];
    $el['VENCIMIENTO'] = $Q0->Record['VENCIMIENTO'];
    $el['PROVEEDOR'] = $Q0->Record['PROVEEDOR'];
    $el['MONTO'] = $Q0->Record['MONTO'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['DETALLE'] = $Q0->Record['DETALLE'];

    // Preparing a template variables
    $T->Set('query0_ID', $el['ID']);
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_VENCIMIENTO', $el['VENCIMIENTO']);
    $T->Set('query0_PROVEEDOR', $el['PROVEEDOR']);
    $T->Set('query0_MONTO', number_format($el['MONTO'],0,'.',','));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_DETALLE', $el['DETALLE']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MONTO += 0 + $el['MONTO'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MONTO', number_format($subtotal0_MONTO,0,'.',','));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MONTO = 0;
    }
    
    //Actualize Old Values Variables
    $old['ID'] = $el['ID'];
    $old['Nro'] = $el['Nro'];
    $old['VENCIMIENTO'] = $el['VENCIMIENTO'];
    $old['PROVEEDOR'] = $el['PROVEEDOR'];
    $old['MONTO'] = $el['MONTO'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['DETALLE'] = $el['DETALLE'];
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
