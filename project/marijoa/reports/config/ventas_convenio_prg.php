<?php

/** Report prg file (ventas_convenio) 
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
$T->Set( 'sup_convenios', $sup['convenios']);
$T->Set( 'sup_porc', $sup['porc']);
$T->Set( 'sup_desde',  $sup['desde']);
$T->Set( 'sup_hasta',  $sup['hasta']);
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_desdeinv',  $sup['desdeinv']);
$T->Set( 'sup_hastainv',  $sup['hastainv']);
 *
 *
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select f.fact_nro as FACT,f.fact_fecha AS FECHA, f.fact_nom_cli AS CLIENTE ,f.fact_cli_ci AS CI_RUC,f.fact_tipo AS TIPO,f.fact_nro_orden AS NRO_ORDEN, c.conv_nombre AS CONVENIO,c.conv_porc as  PORC, f.fact_moneda AS MONEDA, f.fact_cotiz AS COTIZ, f.fact_total AS TOTAL from factura f, mnt_conv c where f.fact_conv = c.conv_cod and f.fact_fecha between '2007-10-31' and '2008-10-31' and f.fact_conv = '20' ORDER BY f.fact_fecha";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$T->Set('data_ini',$data_ini);
$T->Set('data_fin',$data_fin);

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
$subtotal0_TOTAL = 0;


//Define a Old Values Variables
$old['FACT'] = '';
$old['FECHA'] = '';
$old['CLIENTE'] = '';
$old['CI_RUC'] = '';
$old['TIPO'] = '';
$old['NRO_ORDEN'] = '';
$old['CONVENIO'] = '';
$old['PORC'] = '';
$old['MONEDA'] = '';
$old['COTIZ'] = '';
$old['TOTAL'] = '';
$old['SUC'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACT'] = $Q0->Record['FACT'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CI_RUC'] = $Q0->Record['CI_RUC'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['NRO_ORDEN'] = $Q0->Record['NRO_ORDEN'];
    $el['CONVENIO'] = $Q0->Record['CONVENIO'];
    $el['PORC'] = $Q0->Record['PORC'];
    $el['MONEDA'] = $Q0->Record['MONEDA'];
    $el['COTIZ'] = $Q0->Record['COTIZ'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['SUC'] = $Q0->Record['SUC'];

    // Preparing a template variables
    $T->Set('query0_FACT', $el['FACT']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CI_RUC', $el['CI_RUC']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_NRO_ORDEN', $el['NRO_ORDEN']);
    $T->Set('query0_CONVENIO', $el['CONVENIO']);
    $T->Set('query0_PORC', $el['PORC']);
    $T->Set('query0_MONEDA', $el['MONEDA']);
    $T->Set('query0_COTIZ', $el['COTIZ']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,',','.'));
    $T->Set('query0_SUC', $el['SUC']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,',','.'));
    if ($el['PORC'] > 0) {
      $T->Set('descuento', number_format((($subtotal0_TOTAL * $el['PORC']) / 100),0,',','.') );	
    }else {
       $T->Set('descuento', '0');		
    }
    
    
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['FACT'] = $el['FACT'];
    $old['FECHA'] = $el['FECHA'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CI_RUC'] = $el['CI_RUC'];
    $old['TIPO'] = $el['TIPO'];
    $old['NRO_ORDEN'] = $el['NRO_ORDEN'];
    $old['CONVENIO'] = $el['CONVENIO'];
    $old['PORC'] = $el['PORC'];
    $old['MONEDA'] = $el['MONEDA'];
    $old['COTIZ'] = $el['COTIZ'];
    $old['TOTAL'] = $el['TOTAL'];
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
