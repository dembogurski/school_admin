<?php

/** Report prg file (pg_cob) 
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
$T->Set( 'sup_estado', 'Pendiente');
$T->Set( 'sup_rep_cuotas', '');
$T->Set( 'sup_ver_chq', '');
$T->Set( 'sup_ver_pgs', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select pg_ref as REF, pg_nro as NUMERO, pg_monto as MONTO, pg_estado as ESTADO, pg_fecha as FECHA, pg_deudor as DEUDOR,pg_entregado as ENTREGADO, pg_saldo as SALDO FROM PAGARES where pg_estado like 'Pendiente' and __local like '00' and pg_deudor like '%'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );
$T->Set( 'suc', $el[__suc] );

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
$subtotal0_SALDO = 0;


//Define a Old Values Variables
$old['REF'] = '';
$old['NUMERO'] = '';
$old['MONTO'] = '';
$old['ESTADO'] = '';
$old['FECHA'] = '';
$old['DEUDOR'] = '';
$old['ENTREGADO'] = '';
$old['SALDO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['REF'] = $Q0->Record['REF'];
    $el['NUMERO'] = $Q0->Record['NUMERO'];
    $el['MONTO'] = $Q0->Record['MONTO'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['DEUDOR'] = $Q0->Record['DEUDOR'];
    $el['ENTREGADO'] = $Q0->Record['ENTREGADO'];
    $el['SALDO'] = $Q0->Record['SALDO'];

    // Preparing a template variables
    $T->Set('query0_REF', $el['REF']);
    $T->Set('query0_NUMERO', $el['NUMERO']);
    $T->Set('query0_MONTO', number_format($el['MONTO'],0,',','.'));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_DEUDOR', $el['DEUDOR']);
    $T->Set('query0_ENTREGADO', $el['ENTREGADO']);
    $T->Set('query0_SALDO', number_format($el['SALDO'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MONTO += 0 + $el['MONTO'];
    $subtotal0_SALDO += 0 + $el['SALDO'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MONTO', number_format($subtotal0_MONTO,0,',','.'));
    $T->Set('subtotal0_SALDO', number_format($subtotal0_SALDO,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MONTO = 0;
        $subtotal0_SALDO = 0;
    }
    
    //Actualize Old Values Variables
    $old['REF'] = $el['REF'];
    $old['NUMERO'] = $el['NUMERO'];
    $old['MONTO'] = $el['MONTO'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['FECHA'] = $el['FECHA'];
    $old['DEUDOR'] = $el['DEUDOR'];
    $old['ENTREGADO'] = $el['ENTREGADO'];
    $old['SALDO'] = $el['SALDO'];
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
