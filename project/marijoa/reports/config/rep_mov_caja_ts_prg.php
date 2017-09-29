<?php

/** Report prg file (rep_mov_caja) 
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
$T->Set( 'sup_empr', '03');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_fecha', '2008-08-26');
$T->Set( 'sup_rep_mov', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_fecha_inv', '2008-08-26');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select cm_empr as SUC,DATE_FORMAT(cm_fecha,"%d-%m-%Y") as FECHA,cm_tipo as EoS, cm_compl as COMPL,cm_moneda as MONEDA,cm_entrada as ENTRADA,cm_salida as SALIDA,cm_cambio as COTIZ,cm_entrada_ref as E_REF,cm_salida_ref as S_REF from caja_mov where cm_fecha = '2008-08-26' and cm_moneda like '%' and cm_empr like '03' ";

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
$subtotal0_E_REF = 0;
$subtotal0_S_REF = 0;
$entrada = 0;
$salida = 0;


//Define a Old Values Variables
$old['SUC'] = '';
$old['FECHA'] = '';
$old['EoS'] = '';
$old['COMPL'] = '';
$old['MONEDA'] = '';
$old['ENTRADA'] = '';
$old['SALIDA'] = '';
$old['COTIZ'] = '';
$old['E_REF'] = '';
$old['S_REF'] = '';
$old['SALDO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['SUC'] = $Q0->Record['SUC'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['EoS'] = $Q0->Record['EoS'];
    $el['COMPL'] = $Q0->Record['COMPL'];
    $el['MONEDA'] = $Q0->Record['MONEDA'];
    $el['ENTRADA'] = $Q0->Record['ENTRADA'];
    $el['SALIDA'] = $Q0->Record['SALIDA'];
    $el['COTIZ'] = $Q0->Record['COTIZ'];
    $el['E_REF'] = $Q0->Record['E_REF'];
    $el['S_REF'] = $Q0->Record['S_REF'];
    $el['SALDO'] = $Q0->Record['SALDO'];

    // Preparing a template variables
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_EoS', $el['EoS']);
    $T->Set('query0_COMPL', $el['COMPL']);
    $T->Set('query0_MONEDA', $el['MONEDA']);
    $T->Set('query0_ENTRADA', number_format($el['ENTRADA'],2,'.',','));
    $T->Set('query0_SALIDA',number_format( $el['SALIDA'],2,'.',','));
    $T->Set('query0_COTIZ', $el['COTIZ']);
    $T->Set('query0_E_REF', number_format($el['E_REF'],2,'.',','));
    $T->Set('query0_S_REF', number_format($el['S_REF'],2,'.',','));
    $T->Set('query0_SALDO', number_format($el['SALDO'],2,'.',','));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_E_REF += 0 + $el['E_REF'];
    $subtotal0_S_REF += 0 + $el['S_REF'];
    $entrada += 0 + $el['ENTRADA'];
    $salida += 0 + $el['SALIDA'];

    $T->Show('query0_data_row');
      // Show Subtotal
      $T->Set('subtotal0_E_REF', number_format($subtotal0_E_REF,2,'.',','));
      $T->Set('subtotal0_S_REF', number_format($subtotal0_S_REF,2,'.',','));
      $T->Set('diferencia', number_format($subtotal0_E_REF - $subtotal0_S_REF,2,'.',','));
      
      $T->Set('entrada', number_format($entrada,2,'.',','));
      $T->Set('salida', number_format($salida,2,'.',','));
      $T->Set('dif', number_format($entrada - $salida,2,'.',','));
      
      
    if( $endConsult ){
       
	
	$T->Show('query0_subtotal_row');
	
        //Reset a Subtotal Variables
        $subtotal0_E_REF = 0;
        $subtotal0_S_REF = 0;
	    $entrada = 0;
	    $salida = 0;	
	
    }
    
    //Actualize Old Values Variables
    $old['SUC'] = $el['SUC'];
    $old['FECHA'] = $el['FECHA'];
    $old['EoS'] = $el['EoS'];
    $old['COMPL'] = $el['COMPL'];
    $old['MONEDA'] = $el['MONEDA'];
    $old['ENTRADA'] = $el['ENTRADA'];
    $old['SALIDA'] = $el['SALIDA'];
    $old['COTIZ'] = $el['COTIZ'];
    $old['E_REF'] = $el['E_REF'];
    $old['S_REF'] = $el['S_REF'];
    $old['SALDO'] = $el['SALDO'];
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
