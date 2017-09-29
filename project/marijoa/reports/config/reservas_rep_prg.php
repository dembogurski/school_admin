<?php

/** Report prg file (reservas_rep) 
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
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-08-10');
$T->Set( 'sup_estado', '%');
$T->Set( 'sup_pedidos_urg', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT r.nro_res AS NRO, r.__user AS USURIO, r.__local AS SUC, DATE_FORMAT(r.desde,"%d-%m%Y") AS REGISTRO,DATE_FORMAT(r.hasta,"%d-%m%Y") AS VENC, r.fact_cli_ci AS CI, r.fact_nom_cli AS CLIENTE, r.r_total AS TOTAL, r.r_senia AS SENHA,  r.estado AS ESTADO,d.codigo AS CODIGO ,d.descrip AS DESCRIP, d.cantidad AS CANT, d.precio AS PRECIO, d.subtotal AS SUBTOTAL  FROM reservas r, reserva_det d WHERE r.nro_res = d.nro_res  AND r.estado LIKE  '%' AND r.desde BETWEEN '2012-01-01' AND  '2012-08-10' ";

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
$subtotal0_TOTAL = 0;
$subtotal0_SENHA = 0;
$subtotal0_CANT = 0;
$subtotal0_SUBTOTAL = 0;


//Define a Old Values Variables
$old['NRO'] = '';
$old['USURIO'] = '';
$old['SUC'] = '';
$old['REGISTRO'] = '';
$old['VENC'] = '';
$old['CI'] = '';
$old['CLIENTE'] = '';
$old['TOTAL'] = '';
$old['SENHA'] = '';
$old['ESTADO'] = '';
$old['CODIGO'] = '';
$old['DESCRIP'] = '';
$old['CANT'] = '';
$old['PRECIO'] = '';
$old['SUBTOTAL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['USURIO'] = $Q0->Record['USURIO'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['REGISTRO'] = $Q0->Record['REGISTRO'];
    $el['VENC'] = $Q0->Record['VENC'];
    $el['CI'] = $Q0->Record['CI'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['SENHA'] = $Q0->Record['SENHA'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    
    if($el['ESTADO'] == "Abierta"){
        $T->Set('color', "white");
    }else if($el['ESTADO'] == "Pendiente"){
         $T->Set('color', "orange");
    }else if($el['ESTADO'] == "Retirada"){
         $T->Set('color', "green");
    }else if($el['ESTADO'] == "Vencida"){
         $T->Set('color', "red");
    }

    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_USURIO', $el['USURIO']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_REGISTRO', $el['REGISTRO']);
    $T->Set('query0_VENC', $el['VENC']);
    $T->Set('query0_CI', $el['CI']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,',','.'));
    $T->Set('query0_SENHA', number_format($el['SENHA'],0,',','.'));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_CANT', number_format($el['CANT'],0,',','.'));
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL'];
    $subtotal0_SENHA += 0 + $el['SENHA'];
    $subtotal0_CANT += 0 + $el['CANT'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,',','.'));
    $T->Set('subtotal0_SENHA', number_format($subtotal0_SENHA,0,',','.'));
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,0,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL = 0;
        $subtotal0_SENHA = 0;
        $subtotal0_CANT = 0;
        $subtotal0_SUBTOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['USURIO'] = $el['USURIO'];
    $old['SUC'] = $el['SUC'];
    $old['REGISTRO'] = $el['REGISTRO'];
    $old['VENC'] = $el['VENC'];
    $old['CI'] = $el['CI'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['TOTAL'] = $el['TOTAL'];
    $old['SENHA'] = $el['SENHA'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['CANT'] = $el['CANT'];
    $old['PRECIO'] = $el['PRECIO'];
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
