<?php

/** Report prg file (movs_de_cuenta) 
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
$T->Set( 'sup_desde', '2009-04-01');
$T->Set( 'sup_hasta', '2009-04-17');
$T->Set( 'sup_gen_rep', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select DATE_FORMAT(ctd_fecha,"%d-%m-%Y")   as FECHA,ctd_compl AS COMPLEMENTO, ctd_anterior AS S_ANTERIOR ,ctd_entrada AS ENTRADA ,ctd_salida AS SALIDA, ctd_actual AS SALDO_ACTUAL from bcos_ctas_det  where ctd_cta = '14 10 1060014' and ctd_fecha between '2009-04-01' and '2009-04-17'   order by ctd_fecha,id ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );


$desde = $sup['desde'];
$hasta = $sup['hasta'];
$suc = $sup['empr'];


$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

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
$total0_ENTRADA = 0;
$total0_SALIDA = 0;
$total0_SALDO_ACTUAL = 0;

//Define a Subtotal Variables
$subtotal0_ENTRADA = 0;
$subtotal0_SALIDA = 0;
$subtotal0_SALDO_ACTUAL = 0;


//Define a Old Values Variables
$old['FECHA'] = '';
$old['COMPLEMENTO'] = '';
$old['S_ANTERIOR'] = '';
$old['ENTRADA'] = '';
$old['SALIDA'] = '';
$old['SALDO_ACTUAL'] = '';
$old['DOC'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['COMPLEMENTO'] = $Q0->Record['COMPLEMENTO'];
    $el['S_ANTERIOR'] = $Q0->Record['S_ANTERIOR'];
    $el['ENTRADA'] = $Q0->Record['ENTRADA'];
    $el['SALIDA'] = $Q0->Record['SALIDA'];
    $el['SALDO_ACTUAL'] = $Q0->Record['SALDO_ACTUAL'];
	$el['DOC'] = $Q0->Record['DOC'];
	
    if( $el['FECHA']!=$old['FECHA'] ){
        $T->Set('subtotal0_SALDO_ACTUAL', number_format($old['SALDO_ACTUAL'],0,',','.'));

        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_ENTRADA = 0;
        $subtotal0_SALIDA = 0;
        $subtotal0_SALDO_ACTUAL = 0;
    }

    // Preparing a template variables
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_COMPLEMENTO', $el['COMPLEMENTO']);
    $T->Set('query0_S_ANTERIOR', number_format($el['S_ANTERIOR'],2,',','.'));
    $T->Set('query0_ENTRADA', number_format($el['ENTRADA'],2,',','.'));
    $T->Set('query0_SALIDA', number_format($el['SALIDA'],2,',','.'));
    $T->Set('query0_SALDO_ACTUAL', number_format($el['SALDO_ACTUAL'],2,',','.'));
	$T->Set('query0_DOC', $el['DOC']);

    // Calculating a total
    $total0_ENTRADA += 0 + $el['ENTRADA'];
    $total0_SALIDA += 0 + $el['SALIDA'];
    //$total0_SALDO_ACTUAL += 0 + $el['SALDO_ACTUAL'];

    //$total0_SALDO_ACTUAL = $total0_ENTRADA - $total0_SALIDA;

    // Calculating a subtotal
    $subtotal0_ENTRADA += 0 + $el['ENTRADA'];
    $subtotal0_SALIDA += 0 + $el['SALIDA'];
    $subtotal0_SALDO_ACTUAL  =  $subtotal0_ENTRADA - $subtotal0_SALIDA;
    //$subtotal0_SALDO_ACTUAL += 0 + $el['SALDO_ACTUAL'];

    

    $T->Show('query0_data_row');
 
    // Show Subtotal
    $T->Set('subtotal0_ENTRADA', number_format($subtotal0_ENTRADA,2,',','.'));
    $T->Set('subtotal0_SALIDA', number_format($subtotal0_SALIDA,2,',','.'));
 
    //$T->Set('subtotal0_SALDO_ACTUAL', number_format($subtotal0_SALDO_ACTUAL,0,',','.'));
    
    //Actualize Old Values Variables
    $old['FECHA'] = $el['FECHA'];
    $old['COMPLEMENTO'] = $el['COMPLEMENTO'];
    $old['S_ANTERIOR'] = $el['S_ANTERIOR'];
    $old['ENTRADA'] = $el['ENTRADA'];
    $old['SALIDA'] = $el['SALIDA'];
    $old['SALDO_ACTUAL'] = $el['SALDO_ACTUAL'];
	$old['DOC'] = $el['DOC'];
    $firstRow=false;

}

$endConsult = true;

   // 

if( $el['FECHA']!=$old['FECHA'] ){
    $T->Show('query0_subtotal_row');
}
$T->Set('subtotal0_SALDO_ACTUAL', number_format($old['SALDO_ACTUAL'],2,',','.'));
$T->Show('query0_subtotal_row');
// Show total
$T->Set('total0_ENTRADA', number_format($total0_ENTRADA,2,',','.'));
$T->Set('total0_SALIDA', number_format($total0_SALIDA,2,',','.'));

$total0_SALDO_ACTUAL = $total0_ENTRADA - $total0_SALIDA;
$T->Set('total0_SALDO_ACTUAL', number_format($total0_SALDO_ACTUAL,2,',','.'));

if( true ){
   
    $T->Show('query0_total_row');
  
}
$T->Show('end_query0');				// Ends a Table 

?>
