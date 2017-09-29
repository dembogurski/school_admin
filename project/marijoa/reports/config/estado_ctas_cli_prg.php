<?php

/** Report prg file (estado_ctas_cli) 
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
$T->Set( 'sup_msg', 'Filtre Cuotas, Pagares y Cheques acotando las fechas de y a.');
$T->Set( 'sup_fecha', '2009-05-23');
$T->Set( 'sup_fecha_a', '2012-05-23');
$T->Set( 'sup_fecha_inv', '2009-05-23');
$T->Set( 'sup_fecha_inva', '2012-05-23');
$T->Set( 'sup_deudor', '%');
$T->Set( 'sup_n_deudor', '%');
$T->Set( 'sup_estado', 'Pendiente');
$T->Set( 'sup_limite_credito', '__NO DATA__');
$T->Set( 'sup_deuda_actual', '132625547.00');
$T->Set( 'sup_print', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select ct_deudor AS CLIENTE, ct_ref AS FACTURA,ct_nro AS NRO_CTA,DATE_FORMAT(ct_fecha_venc,"%d-%m-%Y")  AS VENCIMIENTO,ct_monto AS MONTO ,ct_entrega AS MONTO_ENTREGA,ct_estado AS ESTADO,rest as RESTANTE  FROM cuotas WHERE  ct_estado  like 'Pendiente' AND ct_deudor LIKE '%' order by CLIENTE, ct_fecha_venc asc";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );


 $Q1 = new Y_DB();
 $Q1->Database = $Global['project'];



// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables
$total0_MONTO = 0;
$total0_MONTO_ENTREGA = 0;
$total0_RESTANTE = 0;

//Define a Subtotal Variables
$subtotal0_MONTO = 0;
$subtotal0_MONTO_ENTREGA = 0;
$subtotal0_RESTANTE = 0;


//Define a Old Values Variables
$old['CLIENTE'] = '';
$old['FACTURA'] = '';
$old['NRO_CTA'] = '';
$old['VENCIMIENTO'] = '';
$old['MONTO'] = '';
$old['MONTO_ENTREGA'] = '';
$old['ESTADO'] = '';
$old['RESTANTE'] = '';
$old['LOCAL'] = '';  
$old['EMISION'] = '';  
$zebra = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['NRO_CTA'] = $Q0->Record['NRO_CTA'];
    $el['VENCIMIENTO'] = $Q0->Record['VENCIMIENTO'];
    $el['MONTO'] = $Q0->Record['MONTO'];
    $el['MONTO_ENTREGA'] = $Q0->Record['MONTO_ENTREGA'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['RESTANTE'] = $Q0->Record['RESTANTE'];
	$el['LOCAL'] = $Q0->Record['LOCAL'];
	$el['EMISION'] = $Q0->Record['EMISION'];
	
    $cliente =  $el['CLIENTE'];
	
    if( $el['CLIENTE'] != $old['CLIENTE'] ){
        $Q1->Query("SELECT cli_limit FROM mnt_cli WHERE cli_fullname LIKE '".$cliente."'; ");
        $Q1->NextRecord();
        $limite = $Q1->Record['cli_limit'];
        $T->Set('limite', $limite);
	    $zebra++;
			if($zebra % 2){
       $T->Set('back', '#FFFFCC');
    }else{
       $T->Set('back', '#CCFFFF');
    }	
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MONTO = 0;
        $subtotal0_MONTO_ENTREGA = 0;
        $subtotal0_RESTANTE = 0;
    }

    // Preparing a template variables
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_NRO_CTA', $el['NRO_CTA']);
    $T->Set('query0_VENCIMIENTO', $el['VENCIMIENTO']);
    $T->Set('query0_MONTO', number_format($el['MONTO'],0,',','.'));
    $T->Set('query0_MONTO_ENTREGA', number_format($el['MONTO_ENTREGA'],0,',','.'));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_RESTANTE', number_format($el['RESTANTE'],0,',','.'));
	 $T->Set('query0_LOCAL', $el['LOCAL']); 
	 $T->Set('query0_EMISION', $el['EMISION']);  

    // Calculating a total
    $total0_MONTO += 0 + $el['MONTO'];
    $total0_MONTO_ENTREGA += 0 + $el['MONTO_ENTREGA'];
    $total0_RESTANTE += 0 + $el['RESTANTE'];

    // Calculating a subtotal
    $subtotal0_MONTO += 0 + $el['MONTO'];
    $subtotal0_MONTO_ENTREGA += 0 + $el['MONTO_ENTREGA'];
    $subtotal0_RESTANTE += 0 + $el['RESTANTE'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MONTO', number_format($subtotal0_MONTO,0,',','.'));
    $T->Set('subtotal0_MONTO_ENTREGA', number_format($subtotal0_MONTO_ENTREGA,0,',','.'));
    $T->Set('subtotal0_RESTANTE', number_format($subtotal0_RESTANTE,0,',','.'));
    
    //Actualize Old Values Variables
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['FACTURA'] = $el['FACTURA'];
    $old['NRO_CTA'] = $el['NRO_CTA'];
    $old['VENCIMIENTO'] = $el['VENCIMIENTO'];
    $old['MONTO'] = $el['MONTO'];
    $old['MONTO_ENTREGA'] = $el['MONTO_ENTREGA'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['RESTANTE'] = $el['RESTANTE'];
	$old['LOCAL'] = $el['LOCAL'];
	$old['EMISION'] = $el['EMISION'];	
    $firstRow=false;
    
}

$endConsult = true;
if( $el['CLIENTE'] != $old['CLIENTE'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_MONTO', number_format($total0_MONTO,0,',','.'));
$T->Set('total0_MONTO_ENTREGA', number_format($total0_MONTO_ENTREGA,0,',','.'));
$T->Set('total0_RESTANTE', number_format($total0_RESTANTE,0,',','.'));
if( endConsult ){
  $T->Show('query0_subtotal_row');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
