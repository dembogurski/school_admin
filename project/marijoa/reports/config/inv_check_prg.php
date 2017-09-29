<?php

/** Report prg file (inv_check) 
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
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup___local', '02');
$T->Set( 'sup_check_suc', 'No');
$T->Set( 'sup_blaser', 'Manual');
$T->Set( 'sup_codigo', '');
$T->Set( 'sup_puntear', '');
$T->Set( 'sup_subst', '');
$T->Set( 'sup_check', '');
$T->Set( 'sup_hfocus', '');
$T->Set( 'sup_hfocus_esp', '');
$T->Set( 'sup_select_text', '');
$T->Set( 'sup_style2', '');
$T->Set( 'sup_style3', '');
$T->Set( 'sup_style4', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_msg', 'Area para Generar Reportes');
$T->Set( 'sup_suc_', '');
$T->Set( 'sup_tipo', '');
$T->Set( 'sup_gen_rep_inv', '');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_gen_rep_duplicados', '');
$T->Set( 'sup_gen_rep_diff', '');
$T->Set( 'sup_gen_punt', '');
$T->Set( 'sup_cod', '3471112');
$T->Set( 'sup_gen_punteo', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT * FROM inv_control WHERE codigo = '3471112' ";

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
$old['codigo'] = '';
$old['suc_p'] = '';
$old['suc_s'] = '';
$old['hits'] = '';
$old['usuario'] = '';
$old['fecha_hora'] = '';
$old['duplicado'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['id'] = $Q0->Record['id'];
    $el['codigo'] = $Q0->Record['codigo'];
    $el['suc_p'] = $Q0->Record['suc_p'];
    $el['suc_s'] = $Q0->Record['suc_s'];
    $el['hits'] = $Q0->Record['hits'];
    $el['usuario'] = $Q0->Record['usuario'];
    $el['fecha_hora'] = $Q0->Record['fecha_hora'];
    $el['duplicado'] = $Q0->Record['duplicado'];

    // Preparing a template variables
    $T->Set('query0_id', $el['id']);
    $T->Set('query0_codigo', $el['codigo']);
    $T->Set('query0_suc_p', $el['suc_p']);
    $T->Set('query0_suc_s', $el['suc_s']);
    $T->Set('query0_hits', $el['hits']);
    $T->Set('query0_usuario', $el['usuario']);
    $T->Set('query0_fecha_hora', $el['fecha_hora']);
    $T->Set('query0_duplicado', $el['duplicado']);

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
    $old['codigo'] = $el['codigo'];
    $old['suc_p'] = $el['suc_p'];
    $old['suc_s'] = $el['suc_s'];
    $old['hits'] = $el['hits'];
    $old['usuario'] = $el['usuario'];
    $old['fecha_hora'] = $el['fecha_hora'];
    $old['duplicado'] = $el['duplicado'];
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
