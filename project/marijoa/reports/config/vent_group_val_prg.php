<?php

/** Report prg file (vent_group_val) 
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
$T->Set( 'sup_cli_fullname', 'victor%');
$T->Set( 'sup_cli_cat', '4');
$T->Set( 'sup_suc', '01');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-01-31');
$T->Set( 'sup_desdeinv', '2012-01-01');
$T->Set( 'sup_hastainv', '2012-01-31');
$T->Set( 'sup_tipo', 'Detallado');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_msg2', '( ! ) Aqui reporte de Estadisticas de Ventas de Clientes (Solo para Admin)!!! ');
$T->Set( 'sup_anioini', '');
$T->Set( 'sup_aniofin', '');
$T->Set( 'sup_gen_rep2', '');
$T->Set( 'sup_msg', 'Reporte de Vents Agrupado por Metros Solo responde a los Filtros de Cliente Fechas Categoria y Sucursal ');
$T->Set( 'sup_vent_group_cli', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT f.fact_nom_cli as CLIENTE,SUM(d.df_cantidad) AS CANT_METROS,SUM(d.df_subtotal) AS TOTAL, COUNT(*) AS CANT_ITEMS  FROM  factura f, det_factura d   WHERE f.fact_nro = d.df_fact_num AND f.fact_cli_cat like '4' AND f.fact_fecha BETWEEN '2012-01-01'  AND '2012-01-31'  and f.fact_localidad like '01' and f.fact_nom_cli like 'victor%' GROUP BY CLIENTE ORDER BY  CANT_METROS DESC";

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
$old['CLIENTE'] = '';
$old['CANT_METROS'] = '';
$old['TOTAL'] = '';
$old['CANT_ITEMS'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CANT_METROS'] = $Q0->Record['CANT_METROS'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['CANT_ITEMS'] = $Q0->Record['CANT_ITEMS'];

    // Preparing a template variables
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CANT_METROS', $el['CANT_METROS']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,',','.'));
    $T->Set('query0_CANT_ITEMS', $el['CANT_ITEMS']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CANT_METROS'] = $el['CANT_METROS'];
    $old['TOTAL'] = $el['TOTAL'];
    $old['CANT_ITEMS'] = $el['CANT_ITEMS'];
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
