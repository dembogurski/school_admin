<?php

/** Report prg file (prestamos) 
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
$T->Set( 'sup_desde', '2010-01-01');
$T->Set( 'sup_hasta', '2010-12-03');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup___lock', 'true');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select  nro_cheque CHEQUE,c.chq_valor AS VALOR_CHQ, chq_nombre_de as NOMBRE_DE, razon AS NOMBRE_RAZON_SOCIAL, nro_comp AS COMPROBANTE, obs AS OBS,__cotiz AS COTIZ, estado AS ESTADO, __moneda AS MONEDA, monto AS MONTO, monto_m_ref AS MONTO_MREF, nro_comp2 AS COMPR_COBRO, obs2 AS OBS_COBRO,  fecha AS FECHA_PRES  from cheq_terceros c, prestamos p where c.chq_num = p.nro_cheque and p.estado = "Cancelado" AND fecha between '2010-01-01' and '2010-12-03' ";

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
$subtotal0_VALOR_CHQ = 0;
$subtotal0_MONTO = 0;
$subtotal0_MONTO_MREF = 0;

$desde = $sup['desde'];
$hasta = $sup['hasta'];

//Define a Old Values Variables
$old['CHEQUE'] = '';
$old['VALOR_CHQ'] = '';
$old['NOMBRE_DE'] = '';


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CHEQUE'] = $Q0->Record['CHEQUE'];
    $el['VALOR_CHQ'] = $Q0->Record['VALOR_CHQ'];
    $el['NOMBRE_DE'] = $Q0->Record['NOMBRE_DE'];
    
    if( $el['CHEQUE']!=$old['CHEQUE'] ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_VALOR_CHQ = 0;
        $subtotal0_MONTO = 0;
        $subtotal0_MONTO_MREF = 0;
    }

    // Preparing a template variables
    $T->Set('query0_CHEQUE', $el['CHEQUE']);
    $T->Set('query0_VALOR_CHQ', number_format($el['VALOR_CHQ'],0,',','.'));
    $T->Set('query0_NOMBRE_DE', $el['NOMBRE_DE']);


    // Calculating a total

    // Calculating a subtotal
    $subtotal0_VALOR_CHQ += 0 + $el['VALOR_CHQ'];
    $subtotal0_MONTO += 0 + $el['MONTO'];
    $subtotal0_MONTO_MREF += 0 + $el['MONTO_MREF'];

    $T->Show('query0_data_row');
    
    $Q = new Y_DB();
	$Q->Database = $Global['project'];
    $chq = $el['CHEQUE'];
    $Q->Query("select  razon AS NOMBRE_RAZON_SOCIAL, nro_comp AS COMPROBANTE, obs AS OBS,__cotiz AS COTIZ, estado AS ESTADO, __moneda AS MONEDA, monto AS MONTO, monto_m_ref AS MONTO_MREF, nro_comp2 AS COMPR_COBRO, 
			obs2 AS OBS_COBRO,  fecha AS FECHA_PRES  from cheq_terceros c, prestamos p where c.chq_num = p.nro_cheque and 
			p.estado = 'Cancelado' and p.nro_cheque =  '$chq';");
    $old['NOMBRE_RAZON_SOCIAL'] = '';
	$old['COMPROBANTE'] = '';
	$old['OBS'] = '';
	$old['COTIZ'] = '';
	$old['ESTADO'] = '';
	$old['MONEDA'] = '';
	$old['MONTO'] = '';
	$old['MONTO_MREF'] = '';
	$old['COMPR_COBRO'] = '';
	$old['OBS_COBRO'] = '';
	$old['FECHA_PRES'] = '';
    while ($Q->NextRecord() ){
		$el['NOMBRE_RAZON_SOCIAL'] = $Q->Record['NOMBRE_RAZON_SOCIAL'];
	    $el['COMPROBANTE'] = $Q->Record['COMPROBANTE'];
	    $el['OBS'] = $Q->Record['OBS'];
	    $el['COTIZ'] = $Q->Record['COTIZ'];
	    $el['ESTADO'] = $Q->Record['ESTADO'];
	    $el['MONEDA'] = $Q->Record['MONEDA'];
	    $el['MONTO'] = $Q->Record['MONTO'];
	    $el['MONTO_MREF'] = $Q->Record['MONTO_MREF'];
	    $el['COMPR_COBRO'] = $Q->Record['COMPR_COBRO'];
	    $el['OBS_COBRO'] = $Q->Record['OBS_COBRO'];
	    $el['FECHA_PRES'] = $Q->Record['FECHA_PRES'];
	    
	    $T->Set('query0_NOMBRE_RAZON_SOCIAL', $el['NOMBRE_RAZON_SOCIAL']);
	    $T->Set('query0_COMPROBANTE', $el['COMPROBANTE']);
	    $T->Set('query0_OBS', $el['OBS']);
	    $T->Set('query0_COTIZ', $el['COTIZ']);
	    $T->Set('query0_ESTADO', $el['ESTADO']);
	    $T->Set('query0_MONEDA', $el['MONEDA']);
	    $T->Set('query0_MONTO', number_format($el['MONTO'],0,',','.'));
	    $T->Set('query0_MONTO_MREF', number_format($el['MONTO_MREF'],0,',','.'));
	    $T->Set('query0_COMPR_COBRO', $el['COMPR_COBRO']);
	    $T->Set('query0_OBS_COBRO', $el['OBS_COBRO']);
	    $T->Set('query0_FECHA_PRES', $el['FECHA_PRES']);	
	    
	     $T->Show('prestamo');
	     
	    
	    $old['NOMBRE_RAZON_SOCIAL'] = $el['NOMBRE_RAZON_SOCIAL'];
	    $old['COMPROBANTE'] = $el['COMPROBANTE'];
	    $old['OBS'] = $el['OBS'];
	    $old['COTIZ'] = $el['COTIZ'];
	    $old['ESTADO'] = $el['ESTADO'];
	    $old['MONEDA'] = $el['MONEDA'];
	    $old['MONTO'] = $el['MONTO'];
	    $old['MONTO_MREF'] = $el['MONTO_MREF'];
	    $old['COMPR_COBRO'] = $el['COMPR_COBRO'];
	    $old['OBS_COBRO'] = $el['OBS_COBRO'];
	    $old['FECHA_PRES'] = $el['FECHA_PRES'];	        
    }
    
    
    // Show Subtotal
    $T->Set('subtotal0_VALOR_CHQ', number_format($subtotal0_VALOR_CHQ,2,',','.'));
    $T->Set('subtotal0_MONTO', number_format($subtotal0_MONTO,2,',','.'));
    $T->Set('subtotal0_MONTO_MREF', number_format($subtotal0_MONTO_MREF,2,',','.'));
    
    //Actualize Old Values Variables
    $old['CHEQUE'] = $el['CHEQUE'];
    $old['VALOR_CHQ'] = $el['VALOR_CHQ'];
    $old['NOMBRE_DE'] = $el['NOMBRE_DE'];

    $firstRow=false;

}

$endConsult = true;
if( $el['CHEQUE']!=$old['CHEQUE'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}

  $T->Show('div');

    $Q = new Y_DB();
	$Q->Database = $Global['project'];
     
    $Q->Query("select  razon AS NOMBRE_RAZON_SOCIAL, nro_comp AS COMPROBANTE, obs AS OBS,__cotiz AS COTIZ, estado AS ESTADO, __moneda AS MONEDA, monto AS MONTO, monto_m_ref AS MONTO_MREF, nro_comp2 AS COMPR_COBRO, 
	obs2 AS OBS_COBRO,  fecha AS FECHA_PRES  from prestamos p where  
	p.estado = 'Cancelado' and fecha BETWEEN '$desde' and '$hasta'; ");
    $old['NOMBRE_RAZON_SOCIAL'] = '';
	$old['COMPROBANTE'] = '';
	$old['OBS'] = '';
	$old['COTIZ'] = '';
	$old['ESTADO'] = '';
	$old['MONEDA'] = '';
	$old['MONTO'] = '';
	$old['MONTO_MREF'] = '';
	$old['COMPR_COBRO'] = '';
	$old['OBS_COBRO'] = '';
	$old['FECHA_PRES'] = '';
    while ($Q->NextRecord() ){
		$el['NOMBRE_RAZON_SOCIAL'] = $Q->Record['NOMBRE_RAZON_SOCIAL'];
	    $el['COMPROBANTE'] = $Q->Record['COMPROBANTE'];
	    $el['OBS'] = $Q->Record['OBS'];
	    $el['COTIZ'] = $Q->Record['COTIZ'];
	    $el['ESTADO'] = $Q->Record['ESTADO'];
	    $el['MONEDA'] = $Q->Record['MONEDA'];
	    $el['MONTO'] = $Q->Record['MONTO'];
	    $el['MONTO_MREF'] = $Q->Record['MONTO_MREF'];
	    $el['COMPR_COBRO'] = $Q->Record['COMPR_COBRO'];
	    $el['OBS_COBRO'] = $Q->Record['OBS_COBRO'];
	    $el['FECHA_PRES'] = $Q->Record['FECHA_PRES'];
	    
	    $T->Set('query0_NOMBRE_RAZON_SOCIAL', $el['NOMBRE_RAZON_SOCIAL']);
	    $T->Set('query0_COMPROBANTE', $el['COMPROBANTE']);
	    $T->Set('query0_OBS', $el['OBS']);
	    $T->Set('query0_COTIZ', $el['COTIZ']);
	    $T->Set('query0_ESTADO', $el['ESTADO']);
	    $T->Set('query0_MONEDA', $el['MONEDA']);
	    $T->Set('query0_MONTO', number_format($el['MONTO'],0,',','.'));
	    $T->Set('query0_MONTO_MREF', number_format($el['MONTO_MREF'],0,',','.'));
	    $T->Set('query0_COMPR_COBRO', $el['COMPR_COBRO']);
	    $T->Set('query0_OBS_COBRO', $el['OBS_COBRO']);
	    $T->Set('query0_FECHA_PRES', $el['FECHA_PRES']);	
	    
	    $T->Show('prestamo');
    }
$T->Show('end_query0');				// Ends a Table 




?>
