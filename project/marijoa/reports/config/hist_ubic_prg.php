<?php

/** Report prg file (hist_ubic) 
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
$T->Set( 'sup_codigo', '2000511');
$T->Set( 'sup_ubic_hist', '');
$T->Set( 'sup_suc', '');
$T->Set( 'sup_estante', 'A');
$T->Set( 'sup_fila', '1');
$T->Set( 'sup_col', '1');
$T->Set( 'sup_insConsButton', 'true');
$T->Set( 'sup_gen_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT __user AS Usuario,DATE_FORMAT(fecha,"%d-%m-%Y") AS Fecha,descrip AS Descrip,suc AS Suc,operacion AS Oper,estante AS Estante,fila AS Fila, col AS Col FROM ubic WHERE codigo = '2000511' order by id asc";

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
$old['Usuario'] = '';
$old['Fecha'] = '';
$old['Descrip'] = '';
$old['Suc'] = '';
$old['Oper'] = '';
$old['Estante'] = '';
$old['Fila'] = '';
$old['Col'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Usuario'] = $Q0->Record['Usuario'];
    $el['Fecha'] = $Q0->Record['Fecha'];
    $el['Descrip'] = $Q0->Record['Descrip'];
    $el['Suc'] = $Q0->Record['Suc'];
    $el['Oper'] = $Q0->Record['Oper'];
    $el['Estante'] = $Q0->Record['Estante'];
    $el['Fila'] = $Q0->Record['Fila'];
    $el['Col'] = $Q0->Record['Col'];

    // Preparing a template variables
    $T->Set('query0_Usuario', $el['Usuario']);
    $T->Set('query0_Fecha', $el['Fecha']);
    $T->Set('query0_Descrip', $el['Descrip']);
    $T->Set('query0_Suc', $el['Suc']);
    $T->Set('query0_Oper', $el['Oper']);
    $T->Set('query0_Estante', $el['Estante']);
    $T->Set('query0_Fila', $el['Fila']);
    $T->Set('query0_Col', $el['Col']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['Usuario'] = $el['Usuario'];
    $old['Fecha'] = $el['Fecha'];
    $old['Descrip'] = $el['Descrip'];
    $old['Suc'] = $el['Suc'];
    $old['Oper'] = $el['Oper'];
    $old['Estante'] = $el['Estante'];
    $old['Fila'] = $el['Fila'];
    $old['Col'] = $el['Col'];
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
