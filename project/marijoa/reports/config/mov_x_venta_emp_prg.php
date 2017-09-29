<?php

/** Report prg file (mov_x_venta_emp) 
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
$T->Set( 'sup___local', '02');
$T->Set( 'sup_cod_prod', '9882712');
$T->Set( 'sup_padre', '9882112');
$T->Set( 'sup_creador', 'Angel  25-04-2012 16:04:45');
$T->Set( 'sup_remito', '__NO DATA__');
$T->Set( 'sup_df_confirmar', 'No');
$T->Set( 'sup_df_fin_pieza', 'false');
$T->Set( 'sup_cant_actual', '0.00');
$T->Set( 'sup_desc', 'MANTELERIA - DE TROPICAL ESTAMPADOS DE 1.5 - BLANCO');
$T->Set( 'sup_descripcion', 'con cuadrille en v.botella, guardas con animales ');
$T->Set( 'sup_cant_compra', '64.00');
$T->Set( 'sup_fdp_r', 'Si');
$T->Set( 'sup_p_local_prod', '02');
$T->Set( 'sup_empre', '');
$T->Set( 'sup_cambiar_local', 'false');
$T->Set( 'sup___msg', '');
$T->Set( 'sup_ver_ajustes', '');
$T->Set( 'sup_mov_ventas', '');
$T->Set( 'sup_mov_ventas2', '');
$T->Set( 'sup_info_trans', '');
$T->Set( 'sup_fracs2', '');
$T->Set( 'sup_fracs', '');
$T->Set( 'sup__log', '');
$T->Set( 'sup_transf_positiva', '');
$T->Set( 'sup_editar', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  f.fact_nro AS FACTURA, date_format(f.fact_fecha,"%d-%m-%y") AS FECHA,  f.fact_vend_cod AS VENDEDOR,  d.df_cantidad AS CANTIDAD,date_format(r.fecha,"%d-%m-%y") AS FECHA_CONTROL , r.hora AS HORA, r.empaquetador  AS EMPAQUETADOR  FROM  factura f, det_factura d, reg_empaque r WHERE  f.fact_nro = d.df_fact_num AND d.df_cod_prod = r.codigo AND f.fact_nro = r.fact_nro AND df_cod_prod =  '9882712'  AND f.fact_estado = "Cerrada"  ";

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
$subtotal0_CANTIDAD = 0;


//Define a Old Values Variables
$old['FACTURA'] = '';
$old['FECHA'] = '';
$old['VENDEDOR'] = '';
$old['CANTIDAD'] = '';
$old['FECHA_CONTROL'] = '';
$old['HORA'] = '';
$old['EMPAQUETADOR'] = '';

if($Q0->NumRows() < 1 ){
   $T->Show('msg'); 
}

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['FECHA_CONTROL'] = $Q0->Record['FECHA_CONTROL'];
    $el['HORA'] = $Q0->Record['HORA'];
    $el['EMPAQUETADOR'] = $Q0->Record['EMPAQUETADOR'];

    // Preparing a template variables
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],0,',','.'));
    $T->Set('query0_FECHA_CONTROL', $el['FECHA_CONTROL']);
    $T->Set('query0_HORA', $el['HORA']);
    $T->Set('query0_EMPAQUETADOR', $el['EMPAQUETADOR']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
    }
    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['FECHA'] = $el['FECHA'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['FECHA_CONTROL'] = $el['FECHA_CONTROL'];
    $old['HORA'] = $el['HORA'];
    $old['EMPAQUETADOR'] = $el['EMPAQUETADOR'];
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
