<?php

/** Report prg file (control_billete) 
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
$T->Set( 'sup_empr', '02');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_es', '%');
$T->Set( 'sup_mov_cons', 'No');
$T->Set( 'sup_m_cons', '5');
$T->Set( 'sup_fecha', '2011-12-28');
$T->Set( 'sup_fechah', '2011-12-28');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_fecha_inv', '2011-12-28');
$T->Set( 'sup_fechah_inv', '2011-12-28');
$T->Set( 'sup_defer', '0');
$T->Set( 'sup_rep_mov', '');
$T->Set( 'sup_rep_arqueo', '');
$T->Set( 'sup_det_billetes', '');
$T->Set( 'sup___msg', '');
$T->Set( 'sup___msg2', '');
 * 
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select 1 as BILLETES";

$T->Set( 'time', daytime() );
//$T->Set( 'time', "" );
$T->Set( 'user', $Global['username'] );

function cotiz($moneda){
 $db = new Y_DB(); 
 $db->Database = 'marijoa';  
 $db->Query("SELECT obtener_cambio('$moneda') AS cambio");
 $db->NextRecord(); 
 $valor = $db->Record['cambio'];
 return $valor; 
}

$T->Set( 'cotiz_real', cotiz('R$') );
$T->Set( 'cotiz_peso', cotiz('P$') );
$T->Set( 'cotiz_dolar', cotiz('U$') );

$hoy = date("d-m-Y");
$T->Set( 'hoy',$hoy );


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
$old['BILLETES'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['BILLETES'] = $Q0->Record['BILLETES'];

    // Preparing a template variables
    $T->Set('query0_BILLETES', $el['BILLETES']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['BILLETES'] = $el['BILLETES'];
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
