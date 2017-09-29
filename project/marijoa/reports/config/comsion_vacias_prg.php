<?php

/** Report prg file (comsion_vacias) 
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
$T->Set( 'sup_fact_fecha', '');
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup_fact_nro', '');
$T->Set( 'sup_estado_fact', '');
$T->Set( 'sup_empaq', '');
$T->Set( 'sup_change_to', 'Abierta');
$T->Set( 'sup_empaqe', 'No');
$T->Set( 'sup_change', 'true');
$T->Set( 'sup___log', '1');
$T->Set( 'sup_ver_rep_comis', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT id, fact_comi_vend, fact_estado_com,fact_estado,fact_fecha, fact_total, fact_nro as FACTURA FROM  factura  WHERE fact_estado = "Cerrada" AND fact_estado_com = "false" AND fact_comi_vend < 0.1 ";

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


//Define a Old Values Variables
$old['id'] = '';
$old['fact_comi_vend'] = '';
$old['fact_estado_com'] = '';
$old['fact_estado'] = '';
$old['fact_fecha'] = '';
$old['fact_total'] = '';
$old['FACTURA'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['id'] = $Q0->Record['id'];
    $el['fact_comi_vend'] = $Q0->Record['fact_comi_vend'];
    $el['fact_estado_com'] = $Q0->Record['fact_estado_com'];
    $el['fact_estado'] = $Q0->Record['fact_estado'];
    $el['fact_fecha'] = $Q0->Record['fact_fecha'];
    $el['fact_total'] = $Q0->Record['fact_total'];
    $el['FACTURA'] = $Q0->Record['FACTURA'];
	
	$FACTURA = $el['FACTURA'];

    // Preparing a template variables
    $T->Set('query0_id', $el['id']);
    $T->Set('query0_fact_comi_vend', $el['fact_comi_vend']);
    $T->Set('query0_fact_estado_com', $el['fact_estado_com']);
    $T->Set('query0_fact_estado', $el['fact_estado']);
    $T->Set('query0_fact_fecha', $el['fact_fecha']);
    $T->Set('query0_fact_total', $el['fact_total']);
    $T->Set('query0_FACTURA', $el['FACTURA']);
	
	$Q1 = new Y_DB();
	$Q1->Database = $Global['project'];	
    
	$Q1->Query("select temporal($FACTURA);"); 

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['id'] = $el['id'];
    $old['fact_comi_vend'] = $el['fact_comi_vend'];
    $old['fact_estado_com'] = $el['fact_estado_com'];
    $old['fact_estado'] = $el['fact_estado'];
    $old['fact_fecha'] = $el['fact_fecha'];
    $old['fact_total'] = $el['fact_total'];
    $old['FACTURA'] = $el['FACTURA'];
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
