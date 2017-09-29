<?php

/** Report prg file (cuotas_de_convs) 
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
$T->Set( 'sup_nro_imp', '7');
$T->Set( 'sup_convenios', '1');
$T->Set( 'sup_con_nombre', 'AEE Asociacion de Educadores de Encarnacion');
$T->Set( 'sup_porc', '5.0');
$T->Set( 'sup_ult_imp', '2009-04-01');
$T->Set( 'sup_msg', 'Debe imprimir siempre desde la ultima impresion wWz 1 dia');
$T->Set( 'sup_desde', '2009-04-01');
$T->Set( 'sup_hasta', '2009-05-31');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_ver_cuotas', '');
$T->Set( 'sup_desdeinv', '2009-04-01');
$T->Set( 'sup_hastainv', '2009-05-31');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select ct_ref as FACTURA, ct_nro AS NRO_CUOTA, date_format(ct_fecha_venc,"%d-%m-%Y") AS  FECHA_VENC ,ct_monto as MONTO, ct_descuento as DESCUENTO, ct_total as TOTAL ,ct_estado as ESTADO FROM cuotas_conv where ct_fecha_venc BETWEEN '2009-04-01' and '2009-05-31' and ct_conv = '1'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'conv', $sup['con_nombre'] );
$T->Set( 'desde', $sup['desdeinv'] );
$T->Set( 'hasta', $sup['hastainv'] );

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
$subtotal0_MONTO = 0;
$subtotal0_TOTAL = 0;


//Define a Old Values Variables
$old['FACTURA'] = '';
$old['NRO_CUOTA'] = '';
$old['FECHA_VENC'] = '';
$old['MONTO'] = '';
$old['DESCUENTO'] = '';
$old['TOTAL'] = '';
$old['ESTADO'] = '';
$old['NRO_ORDEN'] = '';
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['NRO_CUOTA'] = $Q0->Record['NRO_CUOTA'];
    $el['NRO_ORDEN'] = $Q0->Record['NRO_ORDEN'];
    $el['FECHA_VENC'] = $Q0->Record['FECHA_VENC'];
    $el['MONTO'] = $Q0->Record['MONTO'];
    $el['DESCUENTO'] = $Q0->Record['DESCUENTO'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];

    // Preparing a template variables
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_NRO_CUOTA', $el['NRO_CUOTA']);
    $T->Set('query0_FECHA_VENC', $el['FECHA_VENC']);
    $T->Set('query0_MONTO', number_format($el['MONTO'],0,',','.'));
    $T->Set('query0_DESCUENTO', $el['DESCUENTO']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,'.',','));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_NRO_ORDEN', $el['NRO_ORDEN']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MONTO += 0 + $el['MONTO'];
    $subtotal0_TOTAL += 0 + $el['TOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MONTO', number_format($subtotal0_MONTO,2,',','.'));
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MONTO = 0;
        $subtotal0_TOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['NRO_CUOTA'] = $el['NRO_CUOTA'];
    $old['FECHA_VENC'] = $el['FECHA_VENC'];
    $old['MONTO'] = $el['MONTO'];
    $old['DESCUENTO'] = $el['DESCUENTO'];
    $old['TOTAL'] = $el['TOTAL'];
    $old['ESTADO'] = $el['ESTADO'];
     $old['NRO_ORDEN'] = $el['NRO_ORDEN'];
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
