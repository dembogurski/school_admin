<?php

/** Report prg file (nota_compra) 
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
$T->Set( 'sup_prov', 'para');
$T->Set( 'sup_desde', '2011-06-06');
$T->Set( 'sup_hasta', '2011-06-08');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_gen_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  pr AS PROVEEDOR,fecha_ped AS FECHA_PEDIDO, fecha_prev AS FECHA_PREVISTA,nom_in_prov AS NOMBRE_EN_EL_PROV,grupo AS GRUPO,tipo AS TIPO,color AS COLOR,precio AS PRECIO,mts AS MTs  FROM nota_compra WHERE pr like "%" and fecha_ped between '2011-06-06' and '2011-06-08' ";

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
$subtotal0_MTs = 0;


//Define a Old Values Variables
$old['PROVEEDOR'] = '';
$old['FECHA_PEDIDO'] = '';
$old['FECHA_PREVISTA'] = '';
$old['NOMBRE_EN_EL_PROV'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['PRECIO'] = '';
$old['MTs'] = '';
$old['OBS'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['PROVEEDOR'] = $Q0->Record['PROVEEDOR'];
    $el['FECHA_PEDIDO'] = $Q0->Record['FECHA_PEDIDO'];
    $el['FECHA_PREVISTA'] = $Q0->Record['FECHA_PREVISTA'];
    $el['NOMBRE_EN_EL_PROV'] = $Q0->Record['NOMBRE_EN_EL_PROV'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['MTs'] = $Q0->Record['MTs'];
	$el['OBS'] = $Q0->Record['OBS'];

    // Preparing a template variables
    $T->Set('query0_PROVEEDOR', $el['PROVEEDOR']);
    $T->Set('query0_FECHA_PEDIDO', $el['FECHA_PEDIDO']);
    $T->Set('query0_FECHA_PREVISTA', $el['FECHA_PREVISTA']);
    $T->Set('query0_NOMBRE_EN_EL_PROV', $el['NOMBRE_EN_EL_PROV']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_MTs', number_format($el['MTs'],0,',','.'));
	$T->Set('query0_OBS', $el['OBS']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MTs += 0 + $el['MTs'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MTs', number_format($subtotal0_MTs,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MTs = 0;
    }
    
    //Actualize Old Values Variables
    $old['PROVEEDOR'] = $el['PROVEEDOR'];
    $old['FECHA_PEDIDO'] = $el['FECHA_PEDIDO'];
    $old['FECHA_PREVISTA'] = $el['FECHA_PREVISTA'];
    $old['NOMBRE_EN_EL_PROV'] = $el['NOMBRE_EN_EL_PROV'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['PRECIO'] = $el['PRECIO'];
    $old['MTs'] = $el['MTs'];
	$old['OBS'] = $el['OBS'];
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
