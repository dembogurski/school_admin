<?php

/** Report prg file (mov_x_venta_pro) 
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
$T->Set( 'sup_cod_prod', '8857608');
$T->Set( 'sup_ver_ajustes', '');
$T->Set( 'sup_mov_ventas', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select  f.fact_nro as FACTURA,        f.fact_fecha AS FECHA,        f.fact_vend_cod AS VENDEDOR,        d.df_cantidad as CANTIDAD       from factura f, det_factura d where  f.fact_nro = d.df_fact_num and df_cod_prod =  '8857608' and f.fact_estado = "Cerrada" ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );


$CODIGO = $sup['cod_prod'];

$db = new Y_DB();
$db->Database = $Global['project'];

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
$old['SUC'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['SUC'] = $Q0->Record['SUC'];

    // Preparing a template variables
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,'.',','));
    $T->Set('query0_SUC', $el['SUC']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,'.',','));
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
    $old['SUC'] = $el['SUC'];
    $firstRow=false;

}


$db->Query("SELECT SUM(aj_ajuste) as DEVOL FROM   mnt_ajustes WHERE aj_signo = '+' AND aj_oper = 'Aumentar' AND aj_prod = '$CODIGO'");
$AJ_POS = 0;
if($db->NextRecord()){
  $AJ_POS = $db->Record['DEVOL'];
  $T->Set('DEVOL', number_format($AJ_POS,2,'.',','));
}else{
  $T->Set('DEVOL', number_format($AJ_POS,2,'.',','));
}
$LIQUIDO = $subtotal0_CANTIDAD - $AJ_POS;
$T->Set('LIQUIDO', number_format($LIQUIDO,2,'.',','));

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
