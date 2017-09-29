<?php

/** Report prg file (frac_x_color) 
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
$T->Set( 'sup_c_ref', '6322');
$T->Set( 'sup_c_bloq_ins', '');
$T->Set( 'sup_c_empr', '00');
$T->Set( 'sup_c_busc', '');
$T->Set( 'sup_c_prov', '102');
$T->Set( 'sup_c_cta_prov', '2.01.01.01.10');
$T->Set( 'sup_c_fecha', '2012-02-08');
$T->Set( 'sup_c_fechafac', '2012-02-08');
$T->Set( 'sup_c_msg', 'ATENCION!!! Proveedor sin Codigo de Contabilidad!!!');
$T->Set( 'sup_c_style', '');
$T->Set( 'sup_c_n_prov', 'Comercial e Industrial Marijoa S.R.L');
$T->Set( 'sup_c_c_fact', 'Si');
$T->Set( 'sup_c_factura', 'N/A');
$T->Set( 'sup_c_c_int', 'Si');
$T->Set( 'sup_c_interno', '825751');
$T->Set( 'sup_c_moneda', 'G$');
$T->Set( 'sup_c_cambio', '1');
$T->Set( 'sup_c_nac_int', 'Nacional');
$T->Set( 'sup_c_ant', 'No');
$T->Set( 'sup_c_cta_ant', '');
$T->Set( 'sup_c_fi', '0.00');
$T->Set( 'sup_c_fn', '0.00');
$T->Set( 'sup_c_di', '0.00');
$T->Set( 'sup_c_otros', '0.00');
$T->Set( 'sup_c_valor_total', '7175098.00');
$T->Set( 'sup_c_valor_factl', '7175098.00');
$T->Set( 'sup_c_sobre_costo', '0');
$T->Set( 'sup_c_tipo', 'Credito');
$T->Set( 'sup_c_aut_gen', 'No');
$T->Set( 'sup_c_gen', '');
$T->Set( 'sup_c_change', '');
$T->Set( 'sup_c_estado', 'Abierta');
$T->Set( 'sup_c_dev', '');
$T->Set( 'sup_c_descuento', '0.00');
$T->Set( 'sup_imprimir', '');
$T->Set( 'sup_p_filter', '');
$T->Set( 'sup_c_obs', '');
$T->Set( 'sup_imprimir_dev', '');
$T->Set( 'sup_c_type', 'Nuevo');
$T->Set( 'sup_subir_archivo', '');
$T->Set( 'sup_frac_x_color', '');
$T->Set( 'sup_c_compras_det', '');
$T->Set( 'sup_c_compras_detc', '');
$T->Set( 'sup_c_pagos_det', '');
$T->Set( 'sup_c_devoluciones', '');
$T->Set( 'sup_c_lib_ins', 'true');
$T->Set( 'sup_monto_abonado', '0.00');
$T->Set( 'sup___disableDel', 'true');
$T->Set( 'sup___disableChange', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod AS CODIGO, p_fam AS FAMILIA, p_grupo AS GRUPO, p_tipo AS TIPO,p_color AS COLOR,p_lisoest AS LISO, p_descri AS DESCRIP, p_cant_compra AS CANT_COMPRA, p_cant AS CANT,p_ancho AS ANCHO, p_gram AS GRAMAJE FROM mnt_prod WHERE p_ref = '6322' AND p_padre = "" ";
 	//echo "<<<<<<<<<<<<<<<< ". getcwd();
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
$subtotal0_CANT_COMPRA = 0;
$subtotal0_CANT = 0;


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['FAMILIA'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['LISO'] = '';
$old['DESCRIP'] = '';
$old['CANT_COMPRA'] = '';
$old['CANT'] = '';
$old['ANCHO'] = '';
$old['GRAMAJE'] = '';
$old['FP'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FAMILIA'] = $Q0->Record['FAMILIA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['LISO'] = $Q0->Record['LISO'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['CANT_COMPRA'] = $Q0->Record['CANT_COMPRA'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['ANCHO'] = $Q0->Record['ANCHO'];
    $el['GRAMAJE'] = $Q0->Record['GRAMAJE'];
    $el['FP'] = $Q0->Record['FP'];
    if( $el['GRAMAJE'] == null){
        $el['GRAMAJE'] = 0;
    }
    

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_FAMILIA', $el['FAMILIA']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_LISO', $el['LISO']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_CANT_COMPRA', number_format($el['CANT_COMPRA'],0,',','.'));
    $T->Set('query0_CANT', number_format($el['CANT'],0,',','.'));
    $T->Set('query0_ANCHO', $el['ANCHO']);
    $T->Set('query0_GRAMAJE', $el['GRAMAJE']);
    $T->Set('query0_FP', $el['FP']);
    
    if($el['FP'] == 'No'){ 
        $T->Set('checked_unchequed', 'checked');
    }else{
        $T->Set('checked_unchequed', '');
    }

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT_COMPRA += 0 + $el['CANT_COMPRA'];
    $subtotal0_CANT += 0 + $el['CANT'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT_COMPRA', number_format($subtotal0_CANT_COMPRA,2,',','.'));
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT_COMPRA = 0;
        $subtotal0_CANT = 0;
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['FAMILIA'] = $el['FAMILIA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['LISO'] = $el['LISO'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['CANT_COMPRA'] = $el['CANT_COMPRA'];
    $old['CANT'] = $el['CANT'];
    $old['ANCHO'] = $el['ANCHO'];
    $old['GRAMAJE'] = $el['GRAMAJE'];
    $old['FP'] = $el['FP'];
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
