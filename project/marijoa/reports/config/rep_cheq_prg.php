<?php

/** Report prg file (rep_cheq) 
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
$T->Set( 'sup_chq_bco', '1');
$T->Set( 'sup_chq_cta', '14 10 1060014');
$T->Set( 'sup_chq_estado', 'Emitido');
$T->Set( 'sup_chq_fecha_pag', '2009-04-01');
$T->Set( 'sup_chq_fecha_pagh', '2009-04-20');
$T->Set( 'sup_gen_rep', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select chq_num as Nro, DATE_FORMAT(chq_fecha_emis,"%d-%m-%Y") as FECHA_EMISION, DATE_FORMAT(chq_fecha_pag,"%d-%m-%Y") AS FECHA_PAGO, chq_valor AS VALOR, chq_benef AS BENEFICIARIO, chq_moneda AS MONEDA, chq_estado AS ESTADO  from bcos_chq where chq_cta like '14 10 1060014' and chq_estado LIKE 'Emitido'  and chq_fecha_pag between '2009-04-01' and '2009-04-20' order by chq_fecha_pag asc  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['chq_fecha_pag'],8,2).'-'.
			substr($sup['chq_fecha_pag'],5,2).'-'.
			substr($sup['chq_fecha_pag'],0,4);
$data_fin = substr($sup['chq_fecha_pagh'],8,2).'-'.
			substr($sup['chq_fecha_pagh'],5,2).'-'.
			substr($sup['chq_fecha_pagh'],0,4);
			
$T->Set( 'desde', $data_ini);
$T->Set( 'hasta', $data_fin);


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
$total0_VALOR = 0;

//Define a Subtotal Variables
$subtotal0_VALOR = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['FECHA_EMISION'] = '';
$old['FECHA_PAGO'] = '';
$old['VALOR'] = '';
$old['BENEFICIARIO'] = '';
$old['MONEDA'] = '';
$old['ESTADO'] = '';
$old['CTA'] = '';
$old['CONCEPTO'] = '';
$old['COMPL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA_EMISION'] = $Q0->Record['FECHA_EMISION'];
    $el['FECHA_PAGO'] = $Q0->Record['FECHA_PAGO'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['BENEFICIARIO'] = $Q0->Record['BENEFICIARIO'];
    $el['MONEDA'] = $Q0->Record['MONEDA'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['CTA'] = $Q0->Record['CTA'];
    $el['CONCEPTO'] = $Q0->Record['CONCEPTO'];
    $el['COMPL'] = $Q0->Record['COMPL'];
    
    if( $el['FECHA_EMISION']!=$old['FECHA_EMISION'] ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_VALOR = 0;
    }

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_FECHA_EMISION', $el['FECHA_EMISION']);
    $T->Set('query0_FECHA_PAGO', $el['FECHA_PAGO']);
    $T->Set('query0_VALOR', number_format($el['VALOR'],2,',','.'));
    $T->Set('query0_BENEFICIARIO', $el['BENEFICIARIO']);
    $T->Set('query0_MONEDA', $el['MONEDA']);
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_CTA', $el['CTA']);
    
    $T->Set('query0_COMPL', $el['COMPL']);
    $T->Set('query0_CONCEPTO', $el['CONCEPTO']);

    // Calculating a total
    $total0_VALOR += 0 + $el['VALOR'];

    // Calculating a subtotal
    $subtotal0_VALOR += 0 + $el['VALOR'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_VALOR', number_format($subtotal0_VALOR,2,',','.'));
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['FECHA_EMISION'] = $el['FECHA_EMISION'];
    $old['FECHA_PAGO'] = $el['FECHA_PAGO'];
    $old['VALOR'] = $el['VALOR'];
    $old['BENEFICIARIO'] = $el['BENEFICIARIO'];
    $old['MONEDA'] = $el['MONEDA'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['CTA'] = $el['CTA'];
    $old['COMPL'] = $el['COMPL'];
    $old['CONCEPTO'] = $el['CONCEPTO'];
    $firstRow=false;

}

$endConsult = true;
if( $el['FECHA_PAGO']!=$old['FECHA_PAGO'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_VALOR', number_format($total0_VALOR,2,',','.'));
if( endConsult ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
