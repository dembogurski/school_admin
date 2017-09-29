<?php

/** Report prg file (fact_compra) 
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
$T->Set( 'sup_c_ref', '1710');
$T->Set( 'sup_c_bloq_ins', '');
$T->Set( 'sup_c_empr', '00');
$T->Set( 'sup_c_prov', '1');
$T->Set( 'sup_c_fecha', '2009-09-14');
$T->Set( 'sup_c_fechafac', '2009-09-09');
$T->Set( 'sup_c_caja', '');
$T->Set( 'sup_c_n_prov', 'PARAGUAY TEXTIL');
$T->Set( 'sup_c_factura', '15035');
$T->Set( 'sup_c_interno', '');
$T->Set( 'sup_c_moneda', 'U$');
$T->Set( 'sup_c_cambio', '5200');
$T->Set( 'sup_c_nac_int', 'Nacional');
$T->Set( 'sup_c_fi', '0.00');
$T->Set( 'sup_c_fn', '0.00');
$T->Set( 'sup_c_di', '0.00');
$T->Set( 'sup_c_otros', '0.00');
$T->Set( 'sup_c_valor_total', '5604.75');
$T->Set( 'sup_c_sobre_costo', '0');
$T->Set( 'sup_c_tipo', 'Credito');
$T->Set( 'sup_c_aut_gen', 'No');
$T->Set( 'sup_c_gen', '');
$T->Set( 'sup_c_change', '');
$T->Set( 'sup_c_estado', 'Abierta');
$T->Set( 'sup_imprimir', '');
$T->Set( 'sup_c_compras_det', '');
$T->Set( 'sup_c_pagos_det', '');
$T->Set( 'sup_c_lib_ins', 'true');
$T->Set( 'sup_monto_abonado', '0.00');
$T->Set( 'sup___disableDel', '');
$T->Set( 'sup___disableChange', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select p_cod as CODIGO, p_fam as FAMILIA, p_grupo as GRUPO, p_tipo as TIPO, p_comp as COMPOSICION, p_color as COLOR,p_descri as DESCRIP, p_compra as PRECIO_COMPRA,p_cant as CANTIDAD, p_c_total as SUBTOTAL from mnt_prod where p_ref = '1710' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

/*By Douglas*/


$c_fecha = substr($sup['c_fecha'],8,2).'-'.substr($sup['c_fecha'],5,2).'-'.substr($sup['c_fecha'],0,4);
$c_fechafac = substr($sup['c_fechafac'],8,2).'-'.substr($sup['c_fechafac'],5,2).'-'.substr($sup['c_fechafac'],0,4);
 


$T->Set( 'ref', $sup['c_ref']); 
$T->Set( 'empr', $sup['c_empr']); 
$T->Set( 'fecha', $c_fecha);
$T->Set( 'fechafac',$c_fechafac); 
$T->Set( 'n_prov', $sup['c_n_prov']);
$T->Set( 'factura', $sup['c_factura']);
$T->Set( 'interno', $sup['c_interno']);
$T->Set( 'moneda',$sup['c_moneda']);
$T->Set( 'cambio', $sup['c_cambio']);
$T->Set( 'nac_int', $sup['c_nac_int']);  
$T->Set( 'tipo', $sup['c_tipo']); 
$T->Set( 'estado', $sup['c_estado']);

$T->Set( 'c_valor_total', $sup['c_valor_total']);
$T->Set( 'c_valor_factl', $sup['c_valor_factl']);
$T->Set( 'c_fi', $sup['c_fi']);
$T->Set( 'c_iva', $sup['c_iva']);
$T->Set( 'c_fif', $sup['c_fif']);
$T->Set( 'c_seg', $sup['c_seg']);
$T->Set( 'c_fit', $sup['c_fit']);
$T->Set( 'c_comis_rem', $sup['c_comis_rem']);
$T->Set( 'c_fn', $sup['c_fn']);
$T->Set( 'c_di', $sup['c_di']);
$T->Set( 'c_cp', $sup['c_cp']);
$T->Set( 'c_viatico', $sup['c_viatico']);
$T->Set( 'c_manip', $sup['c_manip']);
$T->Set( 'c_comis_forw', $sup['c_comis_forw']);
$T->Set( 'c_multas', $sup['c_multas']);
$T->Set( 'c_otros', $sup['c_otros']);

// Confecciones
$T->Set( 'c_conf_comb',    $sup['c_conf_comb']);
$T->Set( 'c_mant_vehic',   $sup['c_mant_vehic']);
$T->Set( 'c_conf_sueldos', $sup['c_conf_sueldos']);
$T->Set( 'c_conf_frac',    $sup['c_conf_frac']);
$T->Set( 'c_conf_cost',    $sup['c_conf_cost']);
             

if($sup['c_obs'] != ''){
   $T->Set( 'obs','<b>Obs: </b>'. $sup['c_obs']);
   $T->Set( 'desc','Descuento: '. $sup['c_descuento'].' '.$sup['c_moneda']);
}else{
   $T->Set( 'obs', '');
   $T->Set( 'desc','');
}

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
$subtotal0_PRECIO_COMPRA = 0;
$subtotal0_CANTIDAD = 0;
$subtotal0_SUBTOTAL = 0;


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['FAMILIA'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COMPOSICION'] = '';
$old['COLOR'] = '';
$old['DESCRIP'] = '';
$old['PRECIO_COMPRA'] = '';
$old['CANTIDAD'] = '';
$old['SUBTOTAL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FAMILIA'] = $Q0->Record['FAMILIA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COMPOSICION'] = $Q0->Record['COMPOSICION'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['PRECIO_COMPRA'] = $Q0->Record['PRECIO_COMPRA'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_FAMILIA', $el['FAMILIA']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COMPOSICION', $el['COMPOSICION']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_PRECIO_COMPRA', number_format($el['PRECIO_COMPRA'],0,',','.'));
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],2,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_PRECIO_COMPRA += 0 + $el['PRECIO_COMPRA'];
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_PRECIO_COMPRA', number_format($subtotal0_PRECIO_COMPRA,2,',','.'));
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_PRECIO_COMPRA = 0;
        $subtotal0_CANTIDAD = 0;
        $subtotal0_SUBTOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['FAMILIA'] = $el['FAMILIA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COMPOSICION'] = $el['COMPOSICION'];
    $old['COLOR'] = $el['COLOR'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['PRECIO_COMPRA'] = $el['PRECIO_COMPRA'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
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
