<?php

/** Report prg file (facts_ab_anul) 
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
$T->Set( 'sup_fact_fecha', '2014-01-11');
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup_fact_nro', '');
$T->Set( 'sup_estado_fact', '');
$T->Set( 'sup_empaq', '');
$T->Set( 'sup_change_to', 'Anulada');
$T->Set( 'sup_empaqe', 'No');
$T->Set( 'sup_change', 'false');
$T->Set( 'sup___log', '');
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_ver_facts_abier', '');
$T->Set( 'sup_ver_facts_anul', '');
$T->Set( 'sup_dp_conv', '');
$T->Set( 'sup_change_conv', 'false');
$T->Set( 'sup_info', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT usuario,fecha,hora,descrip,fact_estado  FROM _audit_log_ a, factura f WHERE accion LIKE "Abrir%" AND fecha = '2014-01-11' AND a.descrip = f.fact_nro AND f.fact_estado like "Anulada" and fact_localidad like '%'  ORDER BY usuario";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4).' / '.substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('fecha',$data_ini);

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
$old['usuario'] = '';
$old['fecha'] = '';
$old['hora'] = '';
$old['descrip'] = '';
$old['fact_estado'] = '';
$old['suc'] = '';
$n=1;
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['usuario'] = $Q0->Record['usuario'];
    $el['fecha'] = $Q0->Record['fecha'];
    $el['hora'] = $Q0->Record['hora'];
    $el['descrip'] = $Q0->Record['descrip'];
    $el['fact_estado'] = $Q0->Record['fact_estado'];
	$el['suc'] = $Q0->Record['suc'];

    // Preparing a template variables
    $T->Set('nro', $n);
    $T->Set('query0_usuario', $el['usuario']);
    $T->Set('query0_fecha', $el['fecha']);
    $T->Set('query0_hora', $el['hora']);
    $T->Set('query0_descrip', $el['descrip']);
    $T->Set('query0_fact_estado', $el['fact_estado']);
	$T->Set('query0_suc', $el['suc']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['usuario'] = $el['usuario'];
    $old['fecha'] = $el['fecha'];
    $old['hora'] = $el['hora'];
    $old['descrip'] = $el['descrip'];
    $old['fact_estado'] = $el['fact_estado'];
	$old['suc'] = $el['suc'];
    $firstRow=false;
	$n++;

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
