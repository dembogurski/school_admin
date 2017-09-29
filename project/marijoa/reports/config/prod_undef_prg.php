<?php

/** Report prg file (prod_undef) 
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
$T->Set( 'sup_desde', '2010-11-25');
$T->Set( 'sup_hasta', '2010-11-26');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_gen_rep', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select f.func_nombre as VENDEDOR, DATE_FORMAT( f.fact_fecha,"%d-%m-%Y")  as FECHA, f.fact_nom_cli as CLIENTE, d.df_fact_num as FACTURA,d.df_descrip as DESCRIP, d.df_cantidad as CANTIDAD,d.df_precio AS PRECIO, d.df_subtotal as SUBTOTAL  FROM factura f, det_factura d WHERE f.fact_fecha BETWEEN '2010-11-25' and '2010-11-26' and d.df_cod_prod = "000" and f.fact_nro = d.df_fact_num";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

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
$subtotal0_CANTIDAD = 0;
$subtotal0_SUBTOTAL = 0;


//Define a Old Values Variables
$old['VENDEDOR'] = '';
$old['FECHA'] = '';
$old['CLIENTE'] = '';
$old['FACTURA'] = '';
$old['DESCRIP'] = '';
$old['CANTIDAD'] = '';
$old['PRECIO'] = '';
$old['SUBTOTAL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];

    // Preparing a template variables
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,',','.'));
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],2,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
        $subtotal0_SUBTOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['FECHA'] = $el['FECHA'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['FACTURA'] = $el['FACTURA'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['PRECIO'] = $el['PRECIO'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
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
