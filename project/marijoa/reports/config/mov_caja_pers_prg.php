<?php

/** Report prg file (mov_caja_pers) 
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
$T->Set( 'sup_empr', '04');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_es', '%');
$T->Set( 'sup_mov_cons', '%');
$T->Set( 'sup_fecha', '2012-03-01');
$T->Set( 'sup_fechah', '2012-03-01');
$T->Set( 'sup_porc', '0.00');
$T->Set( 'sup_rep_mov', '');
$T->Set( 'sup_rep_arqueo', '');
$T->Set( 'sup_det_billetes', '');
$T->Set( 'sup_rep_movx', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_fecha_inv', '2012-03-01');
$T->Set( 'sup_fechah_inv', '2012-03-01');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT fact_nro as FACTURA, fact_total AS TOTAL,SUM(cm_entrada_ref - cm_salida_ref) AS E_S FROM factura f, caja_mov m WHERE  m.cm_compl LIKE CONCAT("%",fact_nro) AND  fact_fecha = '2012-03-01'  AND fact_localidad = '04' AND fact_tipo = "Contado" GROUP BY fact_nro ";

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
$old['FACTURA'] = '';
$old['TOTAL'] = '';
$old['E_S'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['E_S'] = $Q0->Record['E_S'];
    
    $diff =    number_format( $el['TOTAL'] - $el['E_S'],2,',','.') ;    
    
    if($diff != 0){
        $T->Set('color','orange');
    }else{
         $T->Set('color','white');
    }
    
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }

    // Preparing a template variables
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_TOTAL', $el['TOTAL']);
    $T->Set('query0_E_S', $el['E_S']);
    $T->Set('diff', $diff);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['TOTAL'] = $el['TOTAL'];
    $old['E_S'] = $el['E_S'];
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
