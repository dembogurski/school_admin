<?php

/** Report prg file (det_venta_devol) 
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
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup_suc', '02');
$T->Set( 'sup_hoy', '2013-06-28');
$T->Set( 'sup_cliente', '');
$T->Set( 'sup_contacto', '');
$T->Set( 'sup_tipo_comp', 'Ticket Interno');
$T->Set( 'sup_fact_legal', '');
$T->Set( 'sup_factura', '1067111');
$T->Set( 'sup_fecha', '07-03-2013');
$T->Set( 'sup_client', 'GRACIELA ACOSTA');
$T->Set( 'sup_tipo', 'Normal');
$T->Set( 'sup_intervalo', '1');
$T->Set( 'sup_info_det', '');
$T->Set( 'sup_obs', '');
$T->Set( 'sup_diffdate', '113');
$T->Set( 'sup_fecha_venc', '');
$T->Set( 'sup_msgfecha', '( ! ) No se permiten Registros de ventas mayores a 1 dia!!!');
$T->Set( 'sup_estado', 'Pendiente');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___unlock', 'true');
 * 
 * */
 
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT df_cod_prod AS CODIGO,df_descrip AS DESCRIPCION, df_precio AS PRECIO, df_cantidad AS CANTIDAD, df_subtotal AS SUBTOTAL FROM det_factura WHERE df_fact_num = '1067111'";

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
$subtotal0_SUBTOTAL = 0;


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['DESCRIPCION'] = '';
$old['PRECIO'] = '';
$old['CANTIDAD'] = '';
$old['SUBTOTAL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],0,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],0,',','.'));
    
    $cant = $el['CANTIDAD'];
        
    if($cant < 10){
       $T->Set('info','Solo se permite devoluciones por Fallas');
       $T->Set('color','red');
    }else{
        $T->Set('info','Devolucion Permitida');
        $T->Set('color','green');
    }    
    

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
        $subtotal0_SUBTOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['DESCRIPCION'] = $el['DESCRIPCION'];
    $old['PRECIO'] = $el['PRECIO'];
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
