<?php

/** Report prg file (cuotas_cob) 
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
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___local', '00');
$T->Set( 'sup___suc', 'DEPOSITO');
$T->Set( 'sup___msg', 'Ej.: de Busqueda:  1- [Juan Rom%]  ===>  Juan Roman Rotela');
$T->Set( 'sup_deudor', '%');
$T->Set( 'sup_estado', 'Cancelada');
$T->Set( 'sup_rep_cuotas', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select distinct(id), ct_ref AS FACTURA, ct_fecha_venc as VENCIMIENTO, ct_monto as MONTO, ct_estado as ESTADO,ct_deudor as DEUDOR, ct_descuento as DESCUENTO, ct_total as TOTAL FROM cuotas where ct_estado like 'Cancelada' and ct_deudor like '%'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'suc', $el['__suc']);

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
$subtotal0_TOTAL = 0;



//Define a Old Values Variables
$old['id'] = '';
$old['FACTURA'] = '';
$old['VENCIMIENTO'] = '';
$old['MONTO'] = '';
$old['ESTADO'] = '';
$old['DEUDOR'] = '';
$old['DESCUENTO'] = '';
$old['TOTAL'] = '';


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['id'] = $Q0->Record['id'];
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['VENCIMIENTO'] = $Q0->Record['VENCIMIENTO'];
    $el['MONTO'] = $Q0->Record['MONTO'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['DEUDOR'] = $Q0->Record['DEUDOR'];
    $el['DESCUENTO'] = $Q0->Record['DESCUENTO'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];

    // Preparing a template variables
    $T->Set('query0_id', $el['id']);
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_VENCIMIENTO', $el['VENCIMIENTO']);
    $T->Set('query0_MONTO', $el['MONTO']);
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_DEUDOR', $el['DEUDOR']);
    $T->Set('query0_DESCUENTO', $el['DESCUENTO']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,'.',','));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,'.',','));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['id'] = $el['id'];
    $old['FACTURA'] = $el['FACTURA'];
    $old['VENCIMIENTO'] = $el['VENCIMIENTO'];
    $old['MONTO'] = $el['MONTO'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['DEUDOR'] = $el['DEUDOR'];
    $old['DESCUENTO'] = $el['DESCUENTO'];
    $old['TOTAL'] = $el['TOTAL'];
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
