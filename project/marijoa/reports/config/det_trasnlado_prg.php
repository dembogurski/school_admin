<?php

/** Report prg file (det_trasnlado) 
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
$T->Set( 'sup_cod_prod', '9848208');
$T->Set( 'sup_ver_ajustes', '');
$T->Set( 'sup_mov_ventas', '');
$T->Set( 'sup_info_trans', '');
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT n.rem_nro AS Nro,       n.rem_fecha AS FECHA,       n.rem_dir_origen AS ORIGEN,       n.rem_dir_destino AS DESTINO,       n.rem_receptor AS RECEPTOR,       r.df_disponible AS CANTDISPONIBLE,               p.p_cant_compra AS CANTINICIAL,       p.p_padre as CODIGOPADRE         FROM nota_remision n, remito_det r, mnt_prod p  WHERE n.rem_nro = r.rem_nro AND r.df_cod_prod = '9848208' and p.p_cod = '9848208' and p.p_cod = r.df_cod_prod;";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['cod_prod'] = $Q0->Record['cod_prod'];
    $el['mov_ventas'] = $Q0->Record['mov_ventas'];

    // Preparing a template variables
    $T->Set('query0_cod_prod', $el['cod_prod']);
    $T->Set('query0_mov_ventas', $el['mov_ventas']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['cod_prod'] = $el['cod_prod'];
    $old['mov_ventas'] = $el['mov_ventas'];
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
