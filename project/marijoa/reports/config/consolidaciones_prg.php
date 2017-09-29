<?php

/** Report prg file (consolidaciones) 
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
$T->Set( 'sup___local', '00');
$T->Set( 'sup_nombre_suc', 'DEPOSITO');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_fecha', '2008-08-25');
$T->Set( 'sup_ver_consolid', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select cm_fecha as FECHA,cm_con as CONCEPTO, cm_compl as COMPLEMENTO, cm_moneda AS MONEDA, cm_entrada as ENTRADA, cm_cambio as COTIZ, cm_entrada_ref as MONTO_Moneda_Ref   from caja_mov where cm_empr = '00' and cm_con = 5 and cm_fecha = '2008-08-25' ";

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
$old['CONCEPTO'] = '';
$old['COMPLEMENTO'] = '';
$old['MONEDA'] = '';
$old['ENTRADA'] = '';
$old['COTIZ'] = '';
$old['MONTO_Moneda_Ref'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){
  
    // Define a elements
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['CONCEPTO'] = $Q0->Record['CONCEPTO'];
    $el['COMPLEMENTO'] = $Q0->Record['COMPLEMENTO'];
    $el['MONEDA'] = $Q0->Record['MONEDA'];
    $el['ENTRADA'] = $Q0->Record['ENTRADA'];
    $el['COTIZ'] = $Q0->Record['COTIZ'];
    $el['MONTO_Moneda_Ref'] = $Q0->Record['MONTO_Moneda_Ref'];

      // By Douglas    
    if( ($old['COMPLEMENTO']  != '' ) &&  ($old['COMPLEMENTO']  !=  $el['COMPLEMENTO'] )){
         $T->Set('otra_suc', "<tr><td colspan='7' style='background-color: rgb(234, 233, 242);'>  &nbsp; </td></tr>");  
    }else{
         $T->Set('otra_suc', ''); 
    }


    // Preparing a template variables
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_CONCEPTO', $el['CONCEPTO']);
    $T->Set('query0_COMPLEMENTO', $el['COMPLEMENTO']);
    $T->Set('query0_MONEDA', $el['MONEDA']);
    $T->Set('query0_ENTRADA', $el['ENTRADA']);
    $T->Set('query0_COTIZ', $el['COTIZ']);
    $T->Set('query0_MONTO_Moneda_Ref', number_format($el['MONTO_Moneda_Ref'],0,',','.'));
    
    

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
    $old['CONCEPTO'] = $el['CONCEPTO'];
    $old['COMPLEMENTO'] = $el['COMPLEMENTO'];
    $old['MONEDA'] = $el['MONEDA'];
    $old['ENTRADA'] = $el['ENTRADA'];
    $old['COTIZ'] = $el['COTIZ'];
    $old['MONTO_Moneda_Ref'] = $el['MONTO_Moneda_Ref'];
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
