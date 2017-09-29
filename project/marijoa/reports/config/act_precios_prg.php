<?php

/** Report prg file (act_precios) 
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
$T->Set( 'sup_msg', 'El simbolo % indica todos!!!');
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', 'ACADEMIA');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_cant_prods', '16');
$T->Set( 'sup_rep_prods', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod as CODIGO,p_combinado as COMB,p_descri as DESCRIP,p_cant as CANT_ACT,p_compra as PRECIO_COMPRA,p_compra * p_cant as CANT_X_PR_COMPRA from mnt_prod WHERE p_fam like '%' and p_grupo like 'ACADEMIA' and p_tipo like '%' ";

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
$subtotal0_CANT_ACT = 0;
$subtotal0_PRECIO_COMPRA = 0;
$subtotal0_CANT_X_PR_COMPRA = 0;
$PROMEDIO = 0;


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['COMB'] = '';
$old['DESCRIP'] = '';
$old['CANT_ACT'] = '';
$old['PRECIO_COMPRA'] = '';
$old['CANT_X_PR_COMPRA'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['COMB'] = $Q0->Record['COMB'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['CANT_ACT'] = $Q0->Record['CANT_ACT'];
    $el['PRECIO_COMPRA'] = $Q0->Record['PRECIO_COMPRA'];
    $el['CANT_X_PR_COMPRA'] = $Q0->Record['CANT_X_PR_COMPRA'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_COMB', $el['COMB']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_CANT_ACT', number_format($el['CANT_ACT'],0,',','.'));
    $T->Set('query0_PRECIO_COMPRA', number_format($el['PRECIO_COMPRA'],0,',','.'));
    $T->Set('query0_CANT_X_PR_COMPRA', number_format($el['CANT_X_PR_COMPRA'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT_ACT += 0 + $el['CANT_ACT'];
    $subtotal0_PRECIO_COMPRA += 0 + $el['PRECIO_COMPRA'];
    $subtotal0_CANT_X_PR_COMPRA += 0 + $el['CANT_X_PR_COMPRA'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT_ACT', number_format($subtotal0_CANT_ACT,0,',','.'));
    $T->Set('subtotal0_PRECIO_COMPRA', number_format($subtotal0_PRECIO_COMPRA,0,',','.'));
    $T->Set('subtotal0_CANT_X_PR_COMPRA', number_format($subtotal0_CANT_X_PR_COMPRA,0,',','.'));
   // by Douglas calculos 
   $PROMEDIO =  $subtotal0_CANT_X_PR_COMPRA  /  $subtotal0_CANT_ACT;
   $T->Set('PROMEDIO', number_format($PROMEDIO,0,',','.'));


    if( $endConsult ){
        $T->Show('query0_subtotal_row');

	
	
        //Reset a Subtotal Variables
        $subtotal0_CANT_ACT = 0;
        $subtotal0_PRECIO_COMPRA = 0;
        $subtotal0_CANT_X_PR_COMPRA = 0;
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['COMB'] = $el['COMB'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['CANT_ACT'] = $el['CANT_ACT'];
    $old['PRECIO_COMPRA'] = $el['PRECIO_COMPRA'];
    $old['CANT_X_PR_COMPRA'] = $el['CANT_X_PR_COMPRA'];
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




