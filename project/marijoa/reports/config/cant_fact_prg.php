<?php

/** Report prg file (cant_fact) 
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
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_msg', 'Seleccione el tipo de reporte que desea hacer... El simbolo % indica todos!!!');
$T->Set( 'sup_msg_2', '( ! ) ATENCION!!!  No haga reportes en horas pico de trabajo o dejara inabilitadas las demas terminales.');
$T->Set( 'sup_msg_3', '( ! ) Los reportes hacen consulas complejas pueden causar inestabilidad en el sistema.');
$T->Set( 'sup_tipo_rep', 'Ventas');
$T->Set( 'sup_busc', '');
$T->Set( 'sup_prov', '');
$T->Set( 'sup_rep_cli', '');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_rep_cont_cred', '');
$T->Set( 'sup_cat', '%');
$T->Set( 'sup_rep_vend_cod', '%');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_desde', '2011-09-01');
$T->Set( 'sup_hasta', '2011-09-10');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_ventas_csv', '');
$T->Set( 'sup_rep_ventas_sim', '');
$T->Set( 'sup_rep_compras', '');
$T->Set( 'sup_rep_compras_csv', '');
$T->Set( 'sup_desdeinv', '2011-09-01');
$T->Set( 'sup_hastainv', '2011-09-10');
$T->Set( 'sup_rep_margenes', '');
$T->Set( 'sup_rep_cant_fact', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT DISTINCT fact_fecha, contar_facturas(fact_fecha) AS CANT FROM factura WHERE fact_fecha  BETWEEN '2011-09-01' AND '2011-09-10' ";

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
$subtotal0_CANT = 0;


//Define a Old Values Variables
$old['fact_fecha'] = '';
$old['CANT'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['fact_fecha'] = $Q0->Record['fact_fecha'];
    $el['CANT'] = $Q0->Record['CANT'];

    // Preparing a template variables
    $T->Set('query0_fact_fecha', $el['fact_fecha']);
    $T->Set('query0_CANT', number_format($el['CANT'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT += 0 + $el['CANT'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT = 0;
    }
    
    //Actualize Old Values Variables
    $old['fact_fecha'] = $el['fact_fecha'];
    $old['CANT'] = $el['CANT'];
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
