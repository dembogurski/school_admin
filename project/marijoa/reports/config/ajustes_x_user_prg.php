<?php

/** Report prg file (ajustes_x_user) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
/**
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_desde', '2010-12-23');
$T->Set( 'sup_usuario', 'oscark');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup___lock', 'true');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select aj_prod as CODIGO, aj_usuario as USUARIO,  aj_fecha as FECHA,  aj_inicial as MTS_ORIGINAL, aj_ajuste AS AJUSTE, aj_final as FINAL,aj_signo as SIGNO, aj_oper AS HORA  from mnt_ajustes where aj_usuario = 'oscark' and aj_fecha = '2010-12-23' ";

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
$subtotal0_MTS_ORIGINAL = 0;
$subtotal0_AJUSTE = 0;
$subtotal0_FINAL = 0;


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['USUARIO'] = '';
$old['FECHA'] = '';
$old['MTS_ORIGINAL'] = '';
$old['AJUSTE'] = '';
$old['FINAL'] = '';
$old['SIGNO'] = '';
$old['HORA'] = '';
$i = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){
    $i++;
    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['MTS_ORIGINAL'] = $Q0->Record['MTS_ORIGINAL'];
    $el['AJUSTE'] = $Q0->Record['AJUSTE'];
    $el['FINAL'] = $Q0->Record['FINAL'];
    $el['SIGNO'] = $Q0->Record['SIGNO'];
    $el['HORA'] = $Q0->Record['HORA'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);

    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_MTS_ORIGINAL', number_format($el['MTS_ORIGINAL'],2,',','.'));
    $T->Set('query0_AJUSTE', number_format($el['AJUSTE'],2,',','.'));
    $T->Set('query0_FINAL', number_format($el['FINAL'],2,',','.'));
    $T->Set('query0_SIGNO', $el['SIGNO']);
    $T->Set('query0_HORA', $el['HORA']);


    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MTS_ORIGINAL += 0 + $el['MTS_ORIGINAL'];
    $subtotal0_AJUSTE += 0 + $el['AJUSTE'];
    $subtotal0_FINAL += 0 + $el['FINAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MTS_ORIGINAL', number_format($subtotal0_MTS_ORIGINAL,2,',','.'));
    $T->Set('subtotal0_AJUSTE', number_format($subtotal0_AJUSTE,2,',','.'));
    $T->Set('subtotal0_FINAL', number_format($subtotal0_FINAL,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MTS_ORIGINAL = 0;
        $subtotal0_AJUSTE = 0;
        $subtotal0_FINAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];

    $old['USUARIO'] = $el['USUARIO'];
    $old['FECHA'] = $el['FECHA'];
    $old['MTS_ORIGINAL'] = $el['MTS_ORIGINAL'];
    $old['AJUSTE'] = $el['AJUSTE'];
    $old['FINAL'] = $el['FINAL'];
    $old['SIGNO'] = $el['SIGNO'];
    $old['HORA'] = $el['HORA'];
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
    $T->Set('i', $i);
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
