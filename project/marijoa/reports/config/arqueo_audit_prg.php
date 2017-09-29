<?php

/** Report prg file (arqueo_audit) 
*  
*  Dynamically created by ycube plus RAD
*  
*  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
*  ==========================================================
*/  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T->Set( 'time', daytime() );
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
	if( false ){
		$T->Show('query0_subtotal_row');
		//Reset a Subtotal Variables
	}
	
	//Actualize Old Values Variables
	$old['BILLETES'] = $el['BILLETES'];
	$firstRow=false;

}

$endConsult = true;
if( false ){
	$T->Show('query0_subtotal_row');
}
// Show total
if( false ){
	$T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
