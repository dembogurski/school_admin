<?php

/** Report prg file (est_tiempos) 
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
$T->Set( 'sup_suc', '01');
$T->Set( 'sup_user', '%');
$T->Set( 'sup_desde', '2011-12-06');
$T->Set( 'sup_hasta', '2011-12-06');
$T->Set( 'sup_items', '0');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_it', '%');
 * 
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT usuario AS USUARIO, fecha AS FECHA, hora AS APERTURA, x0_ AS CIERRE, x1_ AS DELAY, y0_ AS ITEMS, y1_ AS MTS, y2_ AS TOTAL   FROM _audit_log_ WHERE ACCION LIKE "LOG_FACT" AND y2_ IS NOT NULL AND fecha BETWEEN '2011-12-06' AND '2011-12-06' AND usuario LIKE '%' AND y0_ LIKE '%' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$delay = array();

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables
$subtotal0_TOTAL = 0;
$subtotal0_CANT = 0;


//Define a Old Values Variables
$old['USUARIO'] = '';
$old['FECHA'] = '';
$old['APERTURA'] = '';
$old['CIERRE'] = '';
$old['DELAY'] = '';
$old['ITEMS'] = '';
$old['MTS'] = '';
$old['TOTAL'] = ''; $old['TURNO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['APERTURA'] = $Q0->Record['APERTURA'];
    $el['CIERRE'] = $Q0->Record['CIERRE'];
    $el['DELAY'] = $Q0->Record['DELAY'];
    $el['ITEMS'] = $Q0->Record['ITEMS'];
    $el['MTS'] = $Q0->Record['MTS'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['TURNO'] = $Q0->Record['TURNO'];

    $actual = $el['DELAY'];
    // Preparing a template variables
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_APERTURA', $el['APERTURA']);
    $T->Set('query0_CIERRE', $el['CIERRE']);
    $T->Set('query0_DELAY', $el['DELAY']);
    $T->Set('query0_ITEMS', $el['ITEMS']);
    $T->Set('query0_MTS', $el['MTS']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,',','.'));
     $T->Set('query0_TURNO', $el['TURNO']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL'];
    $subtotal0_CANT  += 0 + $el['MTS'];

    $var = $delay[$actual];

    $delay[$actual] = $var + 1;

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,2,',','.'));
    $T->Set('subtotal0_MTS', number_format($subtotal0_CANT,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL = 0;
        $subtotal0_CANT = 0;
    }
    
    //Actualize Old Values Variables
    $old['USUARIO'] = $el['USUARIO'];
    $old['FECHA'] = $el['FECHA'];
    $old['APERTURA'] = $el['APERTURA'];
    $old['CIERRE'] = $el['CIERRE'];
    $old['DELAY'] = $el['DELAY'];
    $old['ITEMS'] = $el['ITEMS'];
    $old['MTS'] = $el['MTS'];
    $old['TOTAL'] = $el['TOTAL'];
     $old['TURNO'] = $el['TURNO'];
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

arsort($delay);
foreach ($delay as $key => $val) {
    echo "$val Repeticiones de [" . $key . "] minutos <br>";
}
$items = $sup['it'];
foreach ($delay as $key => $val) {
    echo "<b>Lo que esta mas de moda para $items items es:  [" . $key . "] minutos <br> </b>";

    break;
}

?>
