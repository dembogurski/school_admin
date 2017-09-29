<?php

/** Report prg file (cheq_cob) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
/*
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___local', '00');
$T->Set( 'sup___suc', 'DEPOSITO');
$T->Set( 'sup___msg', 'Ej.: de Busqueda:  1- [Juan Rom%]  ===>  Juan Roman Rotela');
$T->Set( 'sup_deudor', '%');
$T->Set( 'sup_estado', '%');
$T->Set( 'sup_rep_cuotas', '');
$T->Set( 'sup_ver_chq', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select chq_num as NUMERO, chq_cta as CUENTA, chq_bco as BANCO, chq_fecha_emis as FECHA_EMISION, chq_fecha_pag as FECHA_PAGO,chq_valor AS VALOR, chq_moneda as MONEDA, chq_cotiz as COTIZ, chq_moneda_ref as MONEDA_REF, chq_nombre_de AS NOMBRE_DE from cheq_terceros where __local like '00' and chq_estado like '%' and chq_nombre_de like '%'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'suc', $el[__suc]);

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
$subtotal0_MONEDA = 0;
$subtotal0_MONEDA_REF = 0;


//Define a Old Values Variables
$old['NUMERO'] = '';
$old['CUENTA'] = '';
$old['BANCO'] = '';
$old['FECHA_EMISION'] = '';
$old['FECHA_PAGO'] = '';
$old['VALOR'] = '';
$old['MONEDA'] = '';
$old['COTIZ'] = '';
$old['MONEDA_REF'] = '';
$old['NOMBRE_DE'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['NUMERO'] = $Q0->Record['NUMERO'];
    $el['CUENTA'] = $Q0->Record['CUENTA'];
    $el['BANCO'] = $Q0->Record['BANCO'];
    $el['FECHA_EMISION'] = $Q0->Record['FECHA_EMISION'];
    $el['FECHA_PAGO'] = $Q0->Record['FECHA_PAGO'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['MONEDA'] = $Q0->Record['MONEDA'];
    $el['COTIZ'] = $Q0->Record['COTIZ'];
    $el['MONEDA_REF'] = $Q0->Record['MONEDA_REF'];
    $el['NOMBRE_DE'] = $Q0->Record['NOMBRE_DE'];

    // Preparing a template variables
    $T->Set('query0_NUMERO', $el['NUMERO']);
    $T->Set('query0_CUENTA', $el['CUENTA']);
    $T->Set('query0_BANCO', $el['BANCO']);
    $T->Set('query0_FECHA_EMISION', $el['FECHA_EMISION']);
    $T->Set('query0_FECHA_PAGO', $el['FECHA_PAGO']);
    $T->Set('query0_VALOR',number_format( $el['VALOR'],0,',','.'));
    $T->Set('query0_MONEDA', $el['MONEDA']);
    $T->Set('query0_COTIZ', $el['COTIZ']);
    $T->Set('query0_MONEDA_REF', number_format($el['MONEDA_REF'],0,',','.'));
    $T->Set('query0_NOMBRE_DE', $el['NOMBRE_DE']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MONEDA += 0 + $el['MONEDA'];
    $subtotal0_MONEDA_REF += 0 + $el['MONEDA_REF'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MONEDA', number_format($subtotal0_MONEDA,0,',','.'));
    $T->Set('subtotal0_MONEDA_REF', number_format($subtotal0_MONEDA_REF,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MONEDA = 0;
        $subtotal0_MONEDA_REF = 0;
    }
    
    //Actualize Old Values Variables
    $old['NUMERO'] = $el['NUMERO'];
    $old['CUENTA'] = $el['CUENTA'];
    $old['BANCO'] = $el['BANCO'];
    $old['FECHA_EMISION'] = $el['FECHA_EMISION'];
    $old['FECHA_PAGO'] = $el['FECHA_PAGO'];
    $old['VALOR'] = $el['VALOR'];
    $old['MONEDA'] = $el['MONEDA'];
    $old['COTIZ'] = $el['COTIZ'];
    $old['MONEDA_REF'] = $el['MONEDA_REF'];
    $old['NOMBRE_DE'] = $el['NOMBRE_DE'];
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
