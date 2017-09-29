<?php

/** Report prg file (analisis_cartera) 
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
$T->Set( 'sup_desde', '');
$T->Set( 'sup_hasta', '2010-03-31');
$T->Set( 'sup_suc_', '%');
$T->Set( 'sup_rep', '');
$T->Set( 'sup_report_calif', '');
$T->Set( 'sup_analis_cartera', '');
$T->Set( 'sup___lock', 'true'); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_tipo AS TIPO, margen AS MARGEN, subtotal AS SUBTOTAL, metros AS METROS, precio_v AS PRECIO_V, precio_c AS PRECIO_C, porc AS PORC FROM tmp_calif_prod ORDER BY PORC DESC";

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
$subtotal0_MARGEN = 0;
$subtotal0_SUBTOTAL = 0;
$subtotal0_METROS = 0;
$subtotal0_PRECIO_V = 0;
$subtotal0_PRECIO_C = 0;


//Define a Old Values Variables
$old['TIPO'] = '';
$old['MARGEN'] = '';
$old['SUBTOTAL'] = '';
$old['METROS'] = '';
$old['PRECIO_V'] = '';
$old['PRECIO_C'] = '';
$old['PORC'] = '';

$T->Set('x','40% - 100%');
$T->Show('head');	

$x0_19 = true; 
$x30_39 = true;
$x20_29 = true;




// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['METROS'] = $Q0->Record['METROS'];
    $el['PRECIO_V'] = $Q0->Record['PRECIO_V'];
    $el['PRECIO_C'] = $Q0->Record['PRECIO_C'];
    $el['PORC'] = $Q0->Record['PORC'];

    // Preparing a template variables
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_MARGEN', number_format($el['MARGEN'],0,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],0,',','.'));
    $T->Set('query0_METROS', number_format($el['METROS'],2,',','.'));
    $T->Set('query0_PRECIO_V', number_format($el['PRECIO_V'],0,',','.'));
    $T->Set('query0_PRECIO_C', number_format($el['PRECIO_C'],0,',','.'));
    $T->Set('query0_PORC', $el['PORC']);
     

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MARGEN += 0 + $el['MARGEN'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];
    $subtotal0_METROS += 0 + $el['METROS'];
    $subtotal0_PRECIO_V += 0 + $el['PRECIO_V'];
    $subtotal0_PRECIO_C += 0 + $el['PRECIO_C'];
    
    $p = $el['PORC'];
    
    if (($p < 40 && $p > 30 ) && ($x30_39) ) {
      $T->Set('x','30% - 39%'); $x30_39 = false;
      $T->Show('head');		 
    }
    if (($p < 30 && $p > 20 ) && ($x20_29) ) {
      $T->Set('x','20% - 29%'); $x20_29 = false;
      $T->Show('head');		 
    }
    if (($p < 20   ) && ($x0_19) ) {
      $T->Set('x','0% - 19%'); $x0_19 = false;
      $T->Show('head');		 
    }

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MARGEN', number_format($subtotal0_MARGEN,2,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,2,',','.'));
    $T->Set('subtotal0_METROS', number_format($subtotal0_METROS,2,',','.'));
    $T->Set('subtotal0_PRECIO_V', number_format($subtotal0_PRECIO_V,2,',','.'));
    $T->Set('subtotal0_PRECIO_C', number_format($subtotal0_PRECIO_C,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MARGEN = 0;
        $subtotal0_SUBTOTAL = 0;
        $subtotal0_METROS = 0;
        $subtotal0_PRECIO_V = 0;
        $subtotal0_PRECIO_C = 0;
    }
    
    //Actualize Old Values Variables
    $old['TIPO'] = $el['TIPO'];
    $old['MARGEN'] = $el['MARGEN'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $old['METROS'] = $el['METROS'];
    $old['PRECIO_V'] = $el['PRECIO_V'];
    $old['PRECIO_C'] = $el['PRECIO_C'];
    $old['PORC'] = $el['PORC'];
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
