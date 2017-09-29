<?php

/** Report prg file (adjuntar_imagen) 
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
$T->Set( 'sup___lock', '');
$T->Set( 'sup_nro', '17');
$T->Set( 'sup_usuario', 'Ricardo');
$T->Set( 'sup_u_suc', '02');
$T->Set( 'sup_fecha', '2013-07-12');
$T->Set( 'sup_codigo', '66613');
$T->Set( 'sup_p_cant', '30.30');
$T->Set( 'sup_p_suc', '02');
$T->Set( 'sup_p_fdp', 'No');
$T->Set( 'sup_descrip', 'FORROS-DIOLEN-LISO DE 1.5-SALMON-16* (16)');
$T->Set( 'sup_p_valmin', '2415');
$T->Set( 'sup_p_compra', '1988');
$T->Set( 'sup_p_precio_1', '3200');
$T->Set( 'sup_p_precio_1n', '3200');
$T->Set( 'sup_p_precio_2', '3100');
$T->Set( 'sup_p_precio_2n', '3100');
$T->Set( 'sup_p_precio_3', '3100');
$T->Set( 'sup_p_precio_3n', '3100');
$T->Set( 'sup_p_precio_4', '3100');
$T->Set( 'sup_p_precio_4n', '3100');
$T->Set( 'sup_p_precio_5', '3100');
$T->Set( 'sup_p_precio_5n', '3100');
$T->Set( 'sup___lock2', 'true');
$T->Set( 'sup_msg', '');
$T->Set( 'sup_motivo', 'Pieza con falla parcial');
$T->Set( 'sup_upload_images', '');
$T->Set( 'sup_obs', '');
$T->Set( 'sup_style1', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select 1";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
//$Q0->Query( $query0 );

$T->Set( 'nro', $sup['nro'] );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//echo getcwd();


$total = $sup['p_cant'] ;

$parcial = $sup['cant_f'] ;

$t1 = ($total - $parcial) * 100 / $total;

$t2 = $parcial * 100 / $total;

$T->Set( 't1', $t1 - 0.8);
$T->Set( 't2', $t2 - 0.8);


$T->Show('query0_data_row');

$T->Show('end_query0');				// Ends a Table 

?>
