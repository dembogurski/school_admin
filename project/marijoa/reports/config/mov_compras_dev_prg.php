<?php

/** Report prg file (mov_compras_dev) 
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
$T->Set( 'sup_c_ref', '3420');
$T->Set( 'sup_c_bloq_ins', '');
$T->Set( 'sup_c_empr', '00');
$T->Set( 'sup_c_prov', '13');
$T->Set( 'sup_c_fecha', '2010-07-13');
$T->Set( 'sup_c_fechafac', '2010-07-06');
$T->Set( 'sup_c_caja', '');
$T->Set( 'sup_c_n_prov', 'FASHION TEXTIL');
$T->Set( 'sup_c_c_fact', 'Si');
$T->Set( 'sup_c_factura', '2531');
$T->Set( 'sup_c_c_int', 'Si');
$T->Set( 'sup_c_interno', '');
$T->Set( 'sup_c_moneda', 'G$');
$T->Set( 'sup_c_cambio', '1');
$T->Set( 'sup_c_nac_int', 'Nacional');
$T->Set( 'sup_c_fi', '0.00');
$T->Set( 'sup_c_fn', '0.00');
$T->Set( 'sup_c_di', '0.00');
$T->Set( 'sup_c_otros', '0.00');
$T->Set( 'sup_c_valor_total', '8045250.00');
$T->Set( 'sup_c_valor_factl', '0.00');
$T->Set( 'sup_c_sobre_costo', '0');
$T->Set( 'sup_c_tipo', 'Credito');
$T->Set( 'sup_c_aut_gen', 'No');
$T->Set( 'sup_c_gen', '');
$T->Set( 'sup_c_change', '');
$T->Set( 'sup_c_estado', 'Abierta');
$T->Set( 'sup_c_dev', '');
$T->Set( 'sup_c_descuento', '0.00');
$T->Set( 'sup_c_obs', '');
$T->Set( 'sup_imprimir', '');
$T->Set( 'sup_imprimir_dev', '');
$T->Set( 'sup_c_compras_det', '');
$T->Set( 'sup_c_pagos_det', '');
$T->Set( 'sup_c_devoluciones', '');
$T->Set( 'sup_c_lib_ins', 'true');
$T->Set( 'sup_monto_abonado', '0.00');
$T->Set( 'sup___disableDel', '');
$T->Set( 'sup___disableChange', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select d.c_ref as REF, d.c_fecha AS FECHA, d.c_cod AS COD,c_motivo AS MOTIVO, __user AS USUARIO,c_cant AS CANT, c_precio AS PRECIO, c_valor_dev AS VALOR, concat(p.p_fam,"-", p.p_grupo,"-", p.p_tipo,"-", p.p_color) as COMB from mov_compras_dev d, mnt_prod p  where d.c_ref = p.p_ref and d.c_cod = p.p_cod and d.c_ref = '3420' ";

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
$subtotal0_VALOR = 0;


//Define a Old Values Variables
$old['REF'] = '';
$old['FECHA'] = '';
$old['COD'] = '';
$old['MOTIVO'] = '';
$old['USUARIO'] = '';
$old['CANT'] = '';
$old['PRECIO'] = '';
$old['VALOR'] = '';
$old['COMB'] = '';
$old['VALOR_MON'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['REF'] = $Q0->Record['REF'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['COD'] = $Q0->Record['COD'];
    $el['MOTIVO'] = $Q0->Record['MOTIVO'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['COMB'] = $Q0->Record['COMB'];
    $el['VALOR_MON'] = $Q0->Record['VALOR_MON'];

    // Preparing a template variables
    $T->Set('query0_REF', $el['REF']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_COD', $el['COD']);
    $T->Set('query0_MOTIVO', $el['MOTIVO']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_CANT', $el['CANT']);
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_VALOR_MON', number_format($el['VALOR'],2,',','.'));
    $T->Set('query0_COMB', $el['COMB']);
    $T->Set('query0_VALOR', number_format($el['VALOR_MON'],2,',','.'));  

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_VALOR += 0 + $el['VALOR'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_VALOR', number_format($subtotal0_VALOR,0,',','.'));
    if( endConsutl ){
       // $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        //$subtotal0_VALOR = 0;
    }
    
    //Actualize Old Values Variables
    $old['REF'] = $el['REF'];
    $old['FECHA'] = $el['FECHA'];
    $old['COD'] = $el['COD'];
    $old['MOTIVO'] = $el['MOTIVO'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['CANT'] = $el['CANT'];
    $old['PRECIO'] = $el['PRECIO'];
    $old['VALOR'] = $el['VALOR'];
    $old['VALOR_MON'] = $el['VALOR_MON'];
    $old['COMB'] = $el['COMB'];
    $firstRow=false;

}

$endConsult = true;
if( endConsutl ){
   $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
