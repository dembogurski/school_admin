<?php

/** Report prg file (devol_rep) 
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
$T->Set( 'sup_desde', '2011-01-16');
$T->Set( 'sup_hasta', '2011-06-16');
$T->Set( 'sup_tipo', '%');
$T->Set( 'sup_dv_cli', 'Sanatorio Adventista');
$T->Set( 'sup_ver_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT d.dev_nro AS NRO, d.dv_nomcli AS CLIENTE,f.func_nombre AS VENDEDOR, d.dv_hoy AS FECHA,d.cod_prod AS COD_PROD, d.precio,d.cant_dev AS CANT_DEV, d.monto_dev AS MONTO_DEV,d.forma AS FORMA, d.cod_prod_dv AS COD_PROD_DEV, d.precio_act AS PRECIO_ACT, d.metros AS METROS  FROM devoluciones d, factura f  WHERE d.fact_nro = f.fact_nro AND  d.dv_nomcli LIKE 'Sanatorio Adventista' AND dv_hoy BETWEEN '2011-01-16' AND '2011-06-16' AND forma LIKE '%' ";

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
$subtotal0_CANT_DEV = 0;
$subtotal0_MONTO_DEV = 0;
$subtotal0_METROS = 0;


//Define a Old Values Variables
$old['NRO'] = '';
$old['CLIENTE'] = '';
$old['VENDEDOR'] = '';
$old['FECHA'] = '';
$old['COD_PROD'] = '';
$old['precio'] = '';
$old['CANT_DEV'] = '';
$old['MONTO_DEV'] = '';
$old['FORMA'] = '';
$old['COD_PROD_DEV'] = '';
$old['PRECIO_ACT'] = '';
$old['METROS'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['COD_PROD'] = $Q0->Record['COD_PROD'];
    $el['precio'] = $Q0->Record['precio'];
    $el['CANT_DEV'] = $Q0->Record['CANT_DEV'];
    $el['MONTO_DEV'] = $Q0->Record['MONTO_DEV'];
    $el['FORMA'] = $Q0->Record['FORMA'];
    $el['COD_PROD_DEV'] = $Q0->Record['COD_PROD_DEV'];
    $el['PRECIO_ACT'] = $Q0->Record['PRECIO_ACT'];
    $el['METROS'] = $Q0->Record['METROS'];

    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_COD_PROD', $el['COD_PROD']);
    $T->Set('query0_precio', number_format( $el['precio'],0,',','.'));
    $T->Set('query0_CANT_DEV', number_format($el['CANT_DEV'],0,',','.'));
    $T->Set('query0_MONTO_DEV', number_format($el['MONTO_DEV'],0,',','.'));
    $T->Set('query0_FORMA', $el['FORMA']);
    $T->Set('query0_COD_PROD_DEV', $el['COD_PROD_DEV']);
    $T->Set('query0_PRECIO_ACT', number_format($el['PRECIO_ACT'],0,',','.'));
    $T->Set('query0_METROS', number_format($el['METROS'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT_DEV += 0 + $el['CANT_DEV'];
    $subtotal0_MONTO_DEV += 0 + $el['MONTO_DEV'];
    $subtotal0_METROS += 0 + $el['METROS'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT_DEV', number_format($subtotal0_CANT_DEV,2,',','.'));
    $T->Set('subtotal0_MONTO_DEV', number_format($subtotal0_MONTO_DEV,2,',','.'));
    $T->Set('subtotal0_METROS', number_format($subtotal0_METROS,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT_DEV = 0;
        $subtotal0_MONTO_DEV = 0;
        $subtotal0_METROS = 0;
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['FECHA'] = $el['FECHA'];
    $old['COD_PROD'] = $el['COD_PROD'];
    $old['precio'] = $el['precio'];
    $old['CANT_DEV'] = $el['CANT_DEV'];
    $old['MONTO_DEV'] = $el['MONTO_DEV'];
    $old['FORMA'] = $el['FORMA'];
    $old['COD_PROD_DEV'] = $el['COD_PROD_DEV'];
    $old['PRECIO_ACT'] = $el['PRECIO_ACT'];
    $old['METROS'] = $el['METROS'];
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
