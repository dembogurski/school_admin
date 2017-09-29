<?php

/** Report prg file (ventas_x_cli) 
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
$T->Set( 'sup_cli_ref', '');
$T->Set( 'sup_cli_ci', '2912753');
$T->Set( 'sup_cli_id', '');
$T->Set( 'sup_cli_ci_ant', '');
$T->Set( 'sup_verif', '');
$T->Set( 'sup_msgc', '');
$T->Set( 'sup_cli_fullname', 'CARMEN CORALLO');
$T->Set( 'sup_cli_suc', '02');
$T->Set( 'sup_cli_cat', '3');
$T->Set( 'sup_cli_vend', '');
$T->Set( 'sup_cli_fecha_nac', '1978-09-17');
$T->Set( 'sup_cli_tel1', '0981167425');
$T->Set( 'sup_cli_tel2', '');
$T->Set( 'sup_cli_limit', '0');
$T->Set( 'sup_cli_emai', '');
$T->Set( 'sup_pais', 'Paraguay');
$T->Set( 'sup_dep_estado', 'ITAPUA');
$T->Set( 'sup_ciudad', 'ENCARNACION');
$T->Set( 'sup_cli_dir', 'CARLOS ANTONIO LOPEZ 1151');
$T->Set( 'sup___disableDel', 'true');
$T->Set( 'sup___lock', '');
$T->Set( 'sup___unlock', 'true');
$T->Set( 'sup_gen_reporte', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT fact_nro FACT_NRO, DATE_FORMAT(f.fact_fecha,"%d-%m-%Y") AS FECHA,f.fact_localidad AS SUC, f.fact_cli_ci AS CI_RUC, f.fact_nom_cli AS CLIENTE,f.fact_cli_cat AS CAT, f.fact_vend_cod AS VENDEDOR, fact_total AS TOTAL FROM factura f WHERE f.fact_cli_ci = '2912753' ORDER BY f.id ASC";

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
$subtotal0_TOTAL = 0;


//Define a Old Values Variables
$old['FACT_NRO'] = '';
$old['FECHA'] = '';
$old['SUC'] = '';
$old['CI_RUC'] = '';
$old['CLIENTE'] = '';
$old['CAT'] = '';
$old['VENDEDOR'] = '';
$old['TOTAL'] = '';

$i = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACT_NRO'] = $Q0->Record['FACT_NRO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['CI_RUC'] = $Q0->Record['CI_RUC'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CAT'] = $Q0->Record['CAT'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];

    // Preparing a template variables
    $T->Set('query0_FACT_NRO', $el['FACT_NRO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_CI_RUC', $el['CI_RUC']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['FACT_NRO'] = $el['FACT_NRO'];
    $old['FECHA'] = $el['FECHA'];
    $old['SUC'] = $el['SUC'];
    $old['CI_RUC'] = $el['CI_RUC'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CAT'] = $el['CAT'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['TOTAL'] = $el['TOTAL'];
    $firstRow=false;
    $i++;
}

$endConsult = true;
if( $endConsult ){
     $T->Set('i', number_format($i,0,',','.'));
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
