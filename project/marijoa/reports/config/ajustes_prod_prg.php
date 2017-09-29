<?php

/** Report prg file (ajustes_prod) 
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
$T->Set( 'sup_cod_prod', '8857608');
$T->Set( 'sup_ver_ajustes', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select aj_fecha as FECHA, aj_usuario as USUARIO, aj_inicial as CANT_INI, aj_ajuste as AJUSTE,aj_final AS FINAL,aj_oper as HORA,LEFT( aj_motivo,50) as MOTIVO from mnt_ajustes where aj_prod = '8857608' ";

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
$old['FECHA'] = '';
$old['USUARIO'] = '';
$old['CANT_INI'] = '';
$old['AJUSTE'] = '';
$old['FINAL'] = '';
$old['HORA'] = '';
$old['MOTIVO'] = '';
$old['OPERACION'] = '';


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['CANT_INI'] = $Q0->Record['CANT_INI'];
    $el['AJUSTE'] = $Q0->Record['AJUSTE'];
    $el['FINAL'] = $Q0->Record['FINAL'];
    $el['HORA'] = $Q0->Record['HORA'];
    $el['MOTIVO'] = $Q0->Record['MOTIVO'];
	$el['OPERACION'] = $Q0->Record['OPERACION'];

    // Preparing a template variables
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_CANT_INI', $el['CANT_INI']);
    $T->Set('query0_AJUSTE', $el['AJUSTE']);
    $T->Set('query0_FINAL', $el['FINAL']);
    $T->Set('query0_HORA', $el['HORA']);
    $T->Set('query0_MOTIVO', $el['MOTIVO']);
	$T->Set('query0_OPERACION', $el['OPERACION']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['FECHA'] = $el['FECHA'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['CANT_INI'] = $el['CANT_INI'];
    $old['AJUSTE'] = $el['AJUSTE'];
    $old['FINAL'] = $el['FINAL'];
    $old['HORA'] = $el['HORA']; 
    $old['MOTIVO'] = $el['MOTIVO'];
	$old['OPERACION'] = $el['OPERACION'];
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
