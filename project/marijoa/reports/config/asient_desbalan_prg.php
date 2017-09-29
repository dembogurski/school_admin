<?php

/** Report prg file (asient_desbalan) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_desde', '2012-10-22');
$T->Set( 'sup_hasta', '2012-10-22');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_emp_bus', '');
$T->Set( 'sup_emp_cta_cont', '');
$T->Set( 'sup_gen_mayor', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_as_huerfanos', '');
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT a.nro_as AS NRO,a.fecha AS FECHA, a.obs AS OBS,sum(debe) AS DEBE, sum(haber) AS  HABER FROM asientos_cont a, asientos_det d  WHERE a.nro_as = d.nro_as   GROUP BY NRO HAVING   DEBE <> HABER";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['desde'] = $Q0->Record['desde'];
    $el['gen_rep'] = $Q0->Record['gen_rep'];
    $el['emp_cta_cont'] = $Q0->Record['emp_cta_cont'];
    $el['__lock'] = $Q0->Record['__lock'];

    // Preparing a template variables
    $T->Set('query0_desde', $el['desde']);
    $T->Set('query0_gen_rep', $el['gen_rep']);
    $T->Set('query0_emp_cta_cont', $el['emp_cta_cont']);
    $T->Set('query0___lock', $el['__lock']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['desde'] = $el['desde'];
    $old['gen_rep'] = $el['gen_rep'];
    $old['emp_cta_cont'] = $el['emp_cta_cont'];
    $old['__lock'] = $el['__lock'];
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
