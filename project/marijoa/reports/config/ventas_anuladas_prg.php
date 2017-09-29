<?php

/** Report prg file (ventas_anuladas) 
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
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup___suc', '02');
$T->Set( 'sup_desde', '2013-11-27');
$T->Set( 'sup_hasta', '2013-11-28');
$T->Set( 'sup_buscar', '');
$T->Set( 'sup_vendedor', '%');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_reporte', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT fact_nro AS FACTURA,fact_vend_cod AS VENDEDOR,fact_cli_ci AS CI_RUC,fact_nom_cli AS CLIENTE,fact_cli_cat AS CAT,fact_estado AS ESTADO,date_format(fact_fecha,"%d-%m-%Y") AS FECHA,df_cod_prod AS CODIGO,d.df_descrip AS DESCRIP,d.df_precio AS PRECIO,d.df_subtotal AS SUBTOTAL FROM factura f, det_factura d WHERE f.fact_estado = "Anulada" AND fact_localidad = '02'AND f.fact_nro = d.df_fact_num AND f.fact_fecha BETWEEN '2013-11-27' AND '2013-11-28' and fact_vend_cod like '%' ";

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
$subtotal0_SUBTOTAL = 0;


//Define a Old Values Variables
$old['FACTURA'] = '';
$old['VENDEDOR'] = '';
$old['CI_RUC'] = '';
$old['CLIENTE'] = '';
$old['CAT'] = '';
$old['ESTADO'] = '';
$old['FECHA'] = '';
$old['CODIGO'] = '';
$old['DESCRIP'] = '';
$old['PRECIO'] = '';
$old['SUBTOTAL'] = '';
$old['CANT'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['CI_RUC'] = $Q0->Record['CI_RUC'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CAT'] = $Q0->Record['CAT'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['CANT'] = $Q0->Record['CANT'];
    
     if( $el['FACTURA']!=$old['FACTURA'] ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_SUBTOTAL = 0;
    }   
 
    // Preparing a template variables
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_CI_RUC', $el['CI_RUC']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],0,',','.'));
    $T->Set('query0_CANT', number_format($el['CANT'],2,',','.'));
    
    if( $el['FACTURA']!=$old['FACTURA'] ){
         $T->Show('cab');
     }

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,2,',','.'));

    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['CI_RUC'] = $el['CI_RUC'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CAT'] = $el['CAT'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['FECHA'] = $el['FECHA'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['PRECIO'] = $el['PRECIO'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $old['CANT'] = $el['CANT'];
    $firstRow=false;

}

$endConsult = true;
if( $el['FACTURA']!=$old['FACTURA'] &&  $old['FACTURA'] != '' ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
