<?php

/** Report prg file (tmp) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_chq_bco', '2');
$T->Set( 'sup_chq_cta', '21-00467200-00');
$T->Set( 'sup_desde', '2012-01-20');
$T->Set( 'sup_hasta', '2012-03-20');
$T->Set( 'sup_compl', 'Factura%');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_temp_rep', '');
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select id, substring(ctd_compl,29,6) as FACTURAS, ctd_compl as COMPLEMENTO from bcos_ctas_det where ctd_compl like "Factura venta Credito Nro.:%" order by id asc limit 300";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$db = new Y_DB();
$db->Database = $Global['project'];

$db2 = new Y_DB();
$db2->Database = $Global['project'];

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['id'] = '';
$old['FACTURAS'] = '';
$old['COMPLEMENTO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['id'] = $Q0->Record['id'];
    $el['FACTURAS'] = $Q0->Record['FACTURAS'];
    $el['COMPLEMENTO'] = $Q0->Record['COMPLEMENTO'];

    // Preparing a template variables
    $T->Set('query0_id', $el['id']);
    $T->Set('query0_FACTURAS', $el['FACTURAS']);
    $T->Set('query0_COMPLEMENTO', $el['COMPLEMENTO']);

    // Calculating a total

    // Calculating a subtotal

    $id = $el['id'];
    $f = $el['FACTURAS'];

    $db->Query("SELECT f.fact_localidad AS SUC, c.conv_nombre AS CONVENIO, d.dp_nro_orden AS NRO, f.fact_total as TOTAL FROM factura f, fact_detalle_pg d, mnt_conv c
    WHERE f.fact_nro = d.dp_fact_nro  AND d.dp_conv = c.conv_cod AND d.dp_fact_nro = $f");

    while( $db->NextRecord() ){
      $suc =   $db->Record['SUC'];
      $total =   $db->Record['TOTAL'];
      $convenio =   $db->Record['CONVENIO'];
      $nro =   $db->Record['NRO'];
      $db2->Query("update bcos_ctas_det set ctd_compl = concat(ctd_compl,' [ $suc ] $convenio  Nro: $nro TOTAL:$total')  where id = $id;");
    }



    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['id'] = $el['id'];
    $old['FACTURAS'] = $el['FACTURAS'];
    $old['COMPLEMENTO'] = $el['COMPLEMENTO'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
