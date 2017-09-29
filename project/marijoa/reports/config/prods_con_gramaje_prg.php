<?php

/** Report prg file (prods_con_gramaje) 
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
$T->Set( 'sup_msg', 'El simbolo % indica todos!!!');
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_rep_localidad', '07');
$T->Set( 'sup_msg2', 'Filtre  aqui los datos del Producto!!!');
$T->Set( 'sup_msg4', 'Si no escribe como esta a la derecha ponga % al final');
$T->Set( 'sup_p_fam', '');
$T->Set( 'sup_p_fams', '');
$T->Set( 'sup_p_grupo', '');
$T->Set( 'sup_p_grupos', '');
$T->Set( 'sup_p_tipo', '');
$T->Set( 'sup_p_tipos', '');
$T->Set( 'sup_p_comp', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_msg5', 'Clasif y Estruct elegir %% para mostrar, % no mostrar');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_p_lisoest', '%');
$T->Set( 'sup_p_term', '%');
$T->Set( 'sup_msg3', 'Ejemplo  %09  para productos con terminacion 09  ');
$T->Set( 'sup_p1', 'Mostrar');
$T->Set( 'sup_p2', 'Mostrar');
$T->Set( 'sup_p3', 'Mostrar');
$T->Set( 'sup_p4', 'Mostrar');
$T->Set( 'sup_p5', 'Mostrar');
$T->Set( 'sup_m1', '%%');
$T->Set( 'sup_m2', '%%');
$T->Set( 'sup_m3', '%%');
$T->Set( 'sup_m4', '%%');
$T->Set( 'sup_m5', '%%');
$T->Set( 'sup_fdp', 'No');
$T->Set( 'sup_preciox', '1');
$T->Set( 'sup_precio', 'p_precio_1');
$T->Set( 'sup_simp', 'No');
$T->Set( 'sup_rep_stock', '');
$T->Set( 'sup_rep_stock2', '');
$T->Set( 'sup_prods_no_gramados', '');
$T->Set( 'sup_prods_gramados', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod,p_fam,p_grupo,p_tipo,p_color,p_cant,p_ancho,p_gram  FROM mnt_prod WHERE p_local = '07' AND p_gram IS NOT NULL AND p_gram > 0 AND p_cant > 0 AND prod_fin_pieza <> "Si"  ORDER BY p_fam,p_grupo,p_tipo,p_color ";

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


//Define a Old Values Variables
$old['p_cod'] = '';
$old['p_fam'] = '';
$old['p_grupo'] = '';
$old['p_tipo'] = '';
$old['p_color'] = '';
$old['p_cant'] = '';
$old['p_ancho'] = '';
$old['p_gram'] = '';

$i = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){
    $i++; 
    // Define a elements
    $el['p_cod'] = $Q0->Record['p_cod'];
    $el['p_fam'] = $Q0->Record['p_fam'];
    $el['p_grupo'] = $Q0->Record['p_grupo'];
    $el['p_tipo'] = $Q0->Record['p_tipo'];
    $el['p_color'] = $Q0->Record['p_color'];
    $el['p_cant'] = $Q0->Record['p_cant'];
    $el['p_ancho'] = $Q0->Record['p_ancho'];
    $el['p_gram'] = $Q0->Record['p_gram'];

    // Preparing a template variables
    $T->Set('query0_p_cod', $el['p_cod']);
    $T->Set('query0_p_fam', $el['p_fam']);
    $T->Set('query0_p_grupo', $el['p_grupo']);
    $T->Set('query0_p_tipo', $el['p_tipo']);
    $T->Set('query0_p_color', $el['p_color']);
    $T->Set('query0_p_cant', $el['p_cant']);
    $T->Set('query0_p_ancho', $el['p_ancho']);
    $T->Set('query0_p_gram', $el['p_gram']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['p_cod'] = $el['p_cod'];
    $old['p_fam'] = $el['p_fam'];
    $old['p_grupo'] = $el['p_grupo'];
    $old['p_tipo'] = $el['p_tipo'];
    $old['p_color'] = $el['p_color'];
    $old['p_cant'] = $el['p_cant'];
    $old['p_ancho'] = $el['p_ancho'];
    $old['p_gram'] = $el['p_gram'];
    $firstRow=false;

}
$T->Set('total', $i);
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
