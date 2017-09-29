<?php

/** Report prg file (acontecimientos) 
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
$T->Set( 'sup___user', 'Evelin');
$T->Set( 'sup_sue_mes', '');
$T->Set( 'sup_ret_sueldo', '');
$T->Set( 'sup_adel_estado', '%');
$T->Set( 'sup_pagos_adelntds', '');
$T->Set( 'sup_ingresos_estado', '%');
$T->Set( 'sup_ingresos_extras', '');
$T->Set( 'sup_descu_estado', '%');
$T->Set( 'sup_descuentos', '');
$T->Set( 'sup_mi_tarjeta', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select concat(  'Evelin' , "  ",  "Feliz dia de la Amistad" ) as ACONTECIMIENTO";

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
$old['ACONTECIMIENTO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['ACONTECIMIENTO'] = $Q0->Record['ACONTECIMIENTO'];

    // Preparing a template variables
    $T->Set('query0_ACONTECIMIENTO', $el['ACONTECIMIENTO']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['ACONTECIMIENTO'] = $el['ACONTECIMIENTO'];
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
