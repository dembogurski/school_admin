<?php

/** Report prg file (cuotas_convenio) 
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
$T->Set( 'sup_convenios', '5');
$T->Set( 'sup_con_nombre', 'APPEBY');
$T->Set( 'sup_porc', '2.0');
$T->Set( 'sup_desde', '2008-02-13');
$T->Set( 'sup_hasta', '2008-10-13');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_desdeinv', '2008-02-13');
$T->Set( 'sup_hastainv', '2008-10-13');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select c.ct_ref as FACTURA, c.ct_nro as Nro_CUOTA, c.ct_fecha_venc as FECHA_VENC, c.ct_monto AS MONTO,c.ct_descuento as DESCUENTO, c.ct_total AS TOTAL_SIN_DESCUENTO, c.ct_deudor as CLIENTE , f.fact_nro_orden AS Nro_ORDEN from cuotas c, factura f, mnt_conv m   where f.fact_nro = c.ct_ref and f.fact_conv = m.conv_cod and ct_fecha_venc between  '2008-02-13' and '2008-10-13'  and f.fact_conv = '5' and c.ct_estado = "Pendiente" ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

$T->Set( 'impresion', $el[nro_imp] );
 
 

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables
$subtotal0_MONTO = 0;
$subtotal0_DESCUENTO = 0;
$subtotal0_TOTAL_SIN_DESCUENTO = 0;


//Define a Old Values Variables
$old['FACTURA'] = '';
$old['Nro_CUOTA'] = '';
$old['FECHA_VENC'] = '';
$old['MONTO'] = '';
$old['DESCUENTO'] = '';
$old['TOTAL_SIN_DESCUENTO'] = '';
$old['CLIENTE'] = '';
$old['Nro_ORDEN'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['Nro_CUOTA'] = $Q0->Record['Nro_CUOTA'];
    $el['FECHA_VENC'] = $Q0->Record['FECHA_VENC'];
    $el['MONTO'] = $Q0->Record['MONTO'];
    $el['DESCUENTO'] = $Q0->Record['DESCUENTO'];
    $el['TOTAL_SIN_DESCUENTO'] = $Q0->Record['TOTAL_SIN_DESCUENTO'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['Nro_ORDEN'] = $Q0->Record['Nro_ORDEN'];

    // Preparing a template variables
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_Nro_CUOTA', $el['Nro_CUOTA']);
    $T->Set('query0_FECHA_VENC', $el['FECHA_VENC']);
    $T->Set('query0_MONTO', number_format($el['MONTO'],0,'.',','));
    $T->Set('query0_DESCUENTO', number_format($el['DESCUENTO'],0,'.',','));
    $T->Set('query0_TOTAL_SIN_DESCUENTO', number_format($el['TOTAL_SIN_DESCUENTO'],0,'.',','));
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_Nro_ORDEN', $el['Nro_ORDEN']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MONTO += 0 + $el['MONTO'];
    $subtotal0_DESCUENTO += 0 + $el['DESCUENTO'];
    $subtotal0_TOTAL_SIN_DESCUENTO += 0 + $el['TOTAL_SIN_DESCUENTO'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MONTO', number_format($subtotal0_MONTO,0,'.',','));
    $T->Set('subtotal0_DESCUENTO', number_format($subtotal0_DESCUENTO,0,'.',','));
    $T->Set('subtotal0_TOTAL_SIN_DESCUENTO', number_format($subtotal0_TOTAL_SIN_DESCUENTO,0,'.',','));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MONTO = 0;
        $subtotal0_DESCUENTO = 0;
        $subtotal0_TOTAL_SIN_DESCUENTO = 0;
    }
    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['Nro_CUOTA'] = $el['Nro_CUOTA'];
    $old['FECHA_VENC'] = $el['FECHA_VENC'];
    $old['MONTO'] = $el['MONTO'];
    $old['DESCUENTO'] = $el['DESCUENTO'];
    $old['TOTAL_SIN_DESCUENTO'] = $el['TOTAL_SIN_DESCUENTO'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['Nro_ORDEN'] = $el['Nro_ORDEN'];
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
