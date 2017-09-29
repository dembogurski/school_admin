<?php

/** Report prg file (alta_clientes_fecha) 
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
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-01-15');
$T->Set( 'sup_suc_', '02');
$T->Set( 'sup_vend', '%');
$T->Set( 'sup_desdeinv', '2012-01-01');
$T->Set( 'sup_hastainv', '2012-01-15');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___rep', '');
$T->Set( 'sup___rep2', '');
 * 
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT cli_fullname AS CLIENTE, cli_cat AS CATEGORIA, DATE_FORMAT(cli_fecha_ins,"%d-%m-%Y") AS FECHA_ALTA, cli_suc AS SUC, cli_vend AS VENDEDOR FROM mnt_cli WHERE cli_fecha_ins BETWEEN '2012-01-01' AND  '2012-01-15' AND cli_vend like '%' AND cli_suc like  '02'  ";

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


//Define a Old Values Variables
$old['CLIENTE'] = '';
$old['CATEGORIA'] = '';
$old['FECHA_ALTA'] = '';
$old['SUC'] = '';
$old['VENDEDOR'] = '';
$old['CI_RUC'] = '';
$old['TEL'] = '';
$old['DIR'] = '';
$old['id'] = '';

// Making a rows of consult
$i = 1;
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CATEGORIA'] = $Q0->Record['CATEGORIA'];
    $el['FECHA_ALTA'] = $Q0->Record['FECHA_ALTA'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['CI_RUC'] = $Q0->Record['CI_RUC'];
    $el['TEL'] = $Q0->Record['TEL'];
    $el['DIR'] = $Q0->Record['DIR'];
    $el['id'] = $Q0->Record['id'];
    
    
    $id = $el['id'] ;
    
    
    // Preparing a template variables
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CATEGORIA', $el['CATEGORIA']);
    $T->Set('query0_FECHA_ALTA', $el['FECHA_ALTA']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_CI_RUC', $el['CI_RUC']);
    $T->Set('query0_TEL', $el['TEL']);
    $T->Set('query0_DIR', $el['DIR']);
    
    $T->Set('id', $id);

    $zebra = $i % 2;
    $T->Set('zebra',"zebra$zebra");


    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CATEGORIA'] = $el['CATEGORIA'];
    $old['FECHA_ALTA'] = $el['FECHA_ALTA'];
    $old['SUC'] = $el['SUC'];
    $old['CI_RUC'] = $el['CI_RUC'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['TEL'] = $el['TEL'];
    $old['DIR'] = $el['DIR'];
    $old['id'] = $el['id'];
    $firstRow=false;
    $T->Set('i',$i);
   $i++;
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
