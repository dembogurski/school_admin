<?php

/** Report prg file (pedido_int_resu) 
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
$T->Set( 'sup_usuario', 'Developer');
$T->Set( 'sup_suc', '02');
$T->Set( 'sup_nro_pedido_int', '1');
$T->Set( 'sup_fecha', '2014-07-01');
$T->Set( 'sup_temporada', 'Verano');
$T->Set( 'sup_estado', 'En_Proceso');
$T->Set( 'sup_n_pedido_detail', '');
$T->Set( 'sup_n_pedido_resumen', '');
$T->Set( 'sup_set_estado', 'false');
$T->Set( 'sup_msg', '');
$T->Set( 'sup_gen_nota', 'No');
$T->Set( 'sup___change', '');
$T->Set( 'sup_detalle', '');
$T->Set( 'sup___nodel', 'true');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT sector,p_grupo,p_tipo,SUM(p_cant) AS Cant, SUM(cant_pond) AS Cant_Pond ,SUM(cant_comp)  AS Cant_comp, store_number FROM pedido_int_det WHERE nro_pedido_int = '1' GROUP BY sector,p_grupo,p_tipo  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'nro_pedido', $sup['nro_pedido_int '] );



$data_ini = substr($sup['fecha'],8,2).'-'.substr($sup['fecha'],5,2).'-'.substr($sup['fecha'],0,4);
 
$T->Set('fecha',$data_ini);

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
$subtotal0_Cant = 0;
$subtotal0_Cant_Pond = 0;
$subtotal0_Cant_comp = 0;


//Define a Old Values Variables
$old['sector'] = '';
$old['p_grupo'] = '';
$old['p_tipo'] = '';
$old['p_color'] = '';
$old['Cant'] = '';
$old['Cant_Pond'] = '';
$old['Cant_comp'] = '';
$old['store_number'] = '';
$old['obs'] = '';
$old['id'] = '';
$old['p_compra'] = '';
$old['mts'] = '';



// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['sector'] = $Q0->Record['sector'];
    $el['p_grupo'] = $Q0->Record['p_grupo'];
    $el['p_tipo'] = $Q0->Record['p_tipo'];
    $el['p_color'] = $Q0->Record['p_color'];
    $el['Cant'] = $Q0->Record['Cant'];
    $el['Cant_Pond'] = $Q0->Record['Cant_Pond'];
    $el['Cant_comp'] = $Q0->Record['Cant_comp'];
    $el['store_number'] = $Q0->Record['store_number'];
    $el['obs'] = $Q0->Record['obs']; 
    $el['p_compra'] = $Q0->Record['p_compra'];
    $el['mts'] = $Q0->Record['mts'];
    $id = $Q0->Record['id'];

    // Preparing a template variables
    $T->Set('query0_sector', $el['sector']);
    $T->Set('query0_p_grupo', $el['p_grupo']);
    $T->Set('query0_p_tipo', $el['p_tipo']);
    $T->Set('query0_p_color', $el['p_color']);
    $T->Set('query0_Cant', number_format($el['Cant'],0,',','.'));
    $T->Set('query0_Cant_Pond', number_format($el['Cant_Pond'],0,',','.'));
    $T->Set('query0_Cant_comp', number_format($el['Cant_comp'],0,',','.'));
    $T->Set('query0_store_number', $el['store_number']);
    $T->Set('obs', $el['obs']);
    $T->Set('p_compra', $el['p_compra']);
    $T->Set('query0_mts', number_format($el['mts'],2,',','.'));  
    $T->Set('id', $id);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_Cant += 0 + $el['Cant'];
    $subtotal0_Cant_Pond += 0 + $el['Cant_Pond'];
    $subtotal0_Cant_comp += 0 + $el['Cant_comp'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_Cant', number_format($subtotal0_Cant,1,',','.'));
    $T->Set('subtotal0_Cant_Pond', number_format($subtotal0_Cant_Pond,1,',','.'));
    $T->Set('subtotal0_Cant_comp', number_format($subtotal0_Cant_comp,1,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_Cant = 0;
        $subtotal0_Cant_Pond = 0;
        $subtotal0_Cant_comp = 0;
    }
    
    //Actualize Old Values Variables
    $old['sector'] = $el['sector'];
    $old['obs'] = $el['obs'];
    $old['p_grupo'] = $el['p_grupo'];
    $old['p_tipo'] = $el['p_tipo'];
    $old['p_color'] = $el['p_color'];
    $old['Cant'] = $el['Cant'];
    $old['Cant_Pond'] = $el['Cant_Pond'];
    $old['Cant_comp'] = $el['Cant_comp'];
    $old['store_number'] = $el['store_number'];
    $old['p_compra'] = $el['p_compra'];  
    $old['id'] = $el['id'];   
    $old['mts'] = $el['mts'];   
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
