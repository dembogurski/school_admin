<?php

/** Report prg file (sumas_y_saldos) 
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
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_desde', '2012-10-06');
$T->Set( 'sup_hasta', '2012-11-06');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_emp_bus', '%');
$T->Set( 'sup_emp_cta_cont', '%');
$T->Set( 'sup_gen_mayor', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_as_huerfanos', '');
$T->Set( 'sup_as_sumas', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT d.codigo AS CUENTA,p.c_descrip AS DESCRIP,p.c_db_hb DB_HB,sum(d.debe) AS DEBITOS,sum(d.haber) AS CREDITOS,sum(d.debe)-sum(d.haber) AS SALDO  FROM asientos_cont a, asientos_det d, plan_cuentas p WHERE a.nro_as = d.nro_as AND d.codigo = p.c_cod AND a.fecha BETWEEN '2012-10-06' AND   '2012-11-06' AND d.codigo LIKE '%' AND suc LIKE '%' GROUP BY d.codigo ORDER BY DESCRIP ASC ";

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
$subtotal0_DEBITOS = 0;
$subtotal0_CREDITOS = 0;

$subtotal0_DEUDOR = 0;
$subtotal0_ACREEDOR = 0;


//Define a Old Values Variables
$old['CUENTA'] = '';
$old['DESCRIP'] = '';
$old['DB_HB'] = '';
$old['DEBITOS'] = '';
$old['CREDITOS'] = '';
$old['SALDO'] = '';
$old['SALDO_ACR'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CUENTA'] = $Q0->Record['CUENTA'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['DB_HB'] = $Q0->Record['DB_HB'];
    $el['DEBITOS'] = $Q0->Record['DEBITOS'];
    $el['CREDITOS'] = $Q0->Record['CREDITOS'];
    $el['SALDO'] = $Q0->Record['SALDO'];
    $el['SALDO_ACR'] = $Q0->Record['SALDO_ACR'];

    // Preparing a template variables
    $T->Set('query0_CUENTA', $el['CUENTA']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    
    
    
    $T->Set('query0_DEBITOS', number_format($el['DEBITOS'],0,',','.'));
    $T->Set('query0_CREDITOS', number_format($el['CREDITOS'],0,',','.'));
    
    $T->Set('query0_DB_HB',$el['DB_HB']);  
   
    if($el['DB_HB'] == "Debe"){
        $T->Set('query0_SALDO_DEUDOR', number_format($el['SALDO'],0,',','.'));  
        $T->Set('query0_SALDO_ACREEDOR','&nbsp;');  
        $subtotal0_DEUDOR += 0 + $el['SALDO'];
 
    }else{
        $T->Set('query0_SALDO_DEUDOR','&nbsp;' );  
        $T->Set('query0_SALDO_ACREEDOR', number_format($el['SALDO_ACR']  ,0,',','.'));  
        $subtotal0_ACREEDOR  += 0 + $el['SALDO_ACR'] ;
    }

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_DEBITOS += 0 + $el['DEBITOS'];
    $subtotal0_CREDITOS += 0 + $el['CREDITOS'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_DEBITOS', number_format($subtotal0_DEBITOS,2,',','.'));
    $T->Set('subtotal0_CREDITOS', number_format($subtotal0_CREDITOS,2,',','.'));
    
     $T->Set('subtotal0_DEUDOR',   number_format($subtotal0_DEUDOR,2,',','.'));
     $T->Set('subtotal0_ACREEDOR', number_format($subtotal0_ACREEDOR,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_DEBITOS = 0;
        $subtotal0_CREDITOS = 0;
    }
    
    //Actualize Old Values Variables
    $old['CUENTA'] = $el['CUENTA'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['DB_HB'] = $el['DB_HB'];
    $old['DEBITOS'] = $el['DEBITOS'];
    $old['CREDITOS'] = $el['CREDITOS'];
    $old['SALDO'] = $el['SALDO'];
    $old['SALDO_ACR'] = $el['SALDO_ACR'];
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
