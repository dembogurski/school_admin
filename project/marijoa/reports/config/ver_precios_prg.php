<?php

/** Report prg file (ver_precios) 
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
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', 'ACADEMIA');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_count_prods', '16');
$T->Set( 'sup_cant_prods', '254.29');
$T->Set( 'sup_cant_x_pr_comp', '3593775.00');
$T->Set( 'sup_promedio', '14132.584844075662');
$T->Set( 'sup_rep_prods', '');
$T->Set( 'sup_ver_precios', '');
$T->Set( 'sup_nuevo_precio', '0');
$T->Set( 'sup_p_precio_1', '0');
$T->Set( 'sup_p_precio_2', '0');
$T->Set( 'sup_p_precio_3', '0');
$T->Set( 'sup_p_precio_4', '0');
$T->Set( 'sup_p_precio_5', '0');
$T->Set( 'sup_p_precio_error', '');
$T->Set( 'sup_upd0', 'No');
$T->Set( 'sup_msg', '');
$T->Set( 'sup_upd1', 'No');
$T->Set( 'sup_upd2', 'false'); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod as CODIGO,p_combinado as COMB, p_compra as PRECIO_COMPRA,p_precio_1,p_precio_2,p_precio_3,p_precio_4,p_precio_5 from mnt_prod WHERE p_fam like '%' and p_grupo like 'ACADEMIA' and p_tipo like '%' ";

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
$old['CODIGO'] = '';
$old['COMB'] = '';
$old['PRECIO_COMPRA'] = '';
$old['p_precio_1'] = '';
$old['p_precio_2'] = '';
$old['p_precio_3'] = '';
$old['p_precio_4'] = '';
$old['p_precio_5'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['COMB'] = $Q0->Record['COMB'];
    $el['PRECIO_COMPRA'] = $Q0->Record['PRECIO_COMPRA'];
    $el['p_precio_1'] = $Q0->Record['p_precio_1'];
    $el['p_precio_2'] = $Q0->Record['p_precio_2'];
    $el['p_precio_3'] = $Q0->Record['p_precio_3'];
    $el['p_precio_4'] = $Q0->Record['p_precio_4'];
    $el['p_precio_5'] = $Q0->Record['p_precio_5'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_COMB', $el['COMB']);
    $T->Set('query0_PRECIO_COMPRA', $el['PRECIO_COMPRA']);
    $T->Set('query0_p_precio_1', $el['p_precio_1']);
    $T->Set('query0_p_precio_2', $el['p_precio_2']);
    $T->Set('query0_p_precio_3', $el['p_precio_3']);
    $T->Set('query0_p_precio_4', $el['p_precio_4']);
    $T->Set('query0_p_precio_5', $el['p_precio_5']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['COMB'] = $el['COMB'];
    $old['PRECIO_COMPRA'] = $el['PRECIO_COMPRA'];
    $old['p_precio_1'] = $el['p_precio_1'];
    $old['p_precio_2'] = $el['p_precio_2'];
    $old['p_precio_3'] = $el['p_precio_3'];
    $old['p_precio_4'] = $el['p_precio_4'];
    $old['p_precio_5'] = $el['p_precio_5'];
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
