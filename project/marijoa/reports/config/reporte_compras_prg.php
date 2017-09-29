<?php

/** Report prg file (reporte_compras) 
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
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_msg', 'Seleccione el tipo de reporte que desea hacer... El simbolo % indica todos!!!');
$T->Set( 'sup_tipo_rep', 'Compras');
$T->Set( 'sup_rep_cont_cred', '');
$T->Set( 'sup_rep_vend_cod', '%');
$T->Set( 'sup_rep_cli', '%');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_desde', '2007-03-13');
$T->Set( 'sup_hasta', '2008-03-13');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_compras', '');
$T->Set( 'sup_desdeinv', '2007-03-13');
$T->Set( 'sup_hastainv', '2008-03-13'); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT c.c_ref as Nro, c.c_fecha as FECHA,c.c_factura as FACTURA, e.emp_nombre as SUCURSAL, p.prov_nombre as PROVEEDOR, c.c_fechaFac as FECHA_FACTURA, c.c_moneda as MONEDA, c.c_cambio as CAMBIO, c.c_tipo AS TIPO,c.c_valor_total as VALOR  FROM mov_compras c, mnt_prov p, par_empresas e WHERE  c.c_estado = "Cerrada" and c.c_prov = p.prov_cod and c.c_empr = e.emp_cod and c.c_fecha between '2007-03-13' and '2008-03-13' and c.c_empr like '%' and c.c_tipo LIKE '%'   ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$T->Set('data_ini',$data_ini);
$T->Set('data_fin',$data_fin);

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
$subtotal0_VALORUS = 0;

$contador =0;




//Define a Old Values Variables
$old['Nro'] = '';
$old['FECHA'] = '';
$old['FACTURA'] = '';
$old['SUCURSAL'] = '';
$old['PROVEEDOR'] = '';
$old['FECHA_FACTURA'] = '';
$old['MONEDA'] = '';
$old['CAMBIO'] = '';
$old['TIPO'] = '';
$old['VALOR'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['SUCURSAL'] = $Q0->Record['SUCURSAL'];
    $el['PROVEEDOR'] = $Q0->Record['PROVEEDOR'];
    $el['FECHA_FACTURA'] = $Q0->Record['FECHA_FACTURA'];
    $el['MONEDA'] = $Q0->Record['MONEDA'];
    $el['CAMBIO'] = $Q0->Record['CAMBIO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['VALOR'] = $Q0->Record['VALOR'];

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_SUCURSAL', $el['SUCURSAL']);
    $T->Set('query0_PROVEEDOR', $el['PROVEEDOR']);
    $T->Set('query0_FECHA_FACTURA', $el['FECHA_FACTURA']);

    $T->Set('query0_MONEDA', $el['MONEDA']);
    $T->Set('query0_CAMBIO', $el['CAMBIO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    
     IF($el['MONEDA']==='G$'){
       $T->Set('query0_VALOR', number_format($el['VALOR'],0,',','.'));
       $T->Set('query0_VALORUS', number_format('',0,'.',','));
    }else{
       $mult = $el['VALOR'] * $el['CAMBIO'];
       $T->Set('query0_VALOR', number_format($mult,0,'.',','));
       $T->Set('query0_VALORUS', number_format($el['VALOR'],0,',','.'));
    }   
    

    // Calculating a total

    // Calculating a subtotal
    IF($el['MONEDA']==='G$'){
        //$subtotal0_VALOR += 0 + $el['VALOR'] ;
    }else{
        $subtotal0_VALORUS += 0 + $el['VALOR'];
    }
    $subtotal0_VALOR += 0 + $el['VALOR']  * $el['CAMBIO'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_VALOR', number_format($subtotal0_VALOR,0,',','.'));
    $T->Set('subtotal0_VALORUS', number_format($subtotal0_VALORUS,0,',','.'));
    $dif =  ( $subtotal0_VALORUS * $el['CAMBIO'] );
    $T->Set('dif', number_format($dif,0,',','.'));
    
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_VALOR = 0;
	$subtotal0_VALORUS = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['FECHA'] = $el['FECHA'];
    $old['FACTURA'] = $el['FACTURA'];
    $old['SUCURSAL'] = $el['SUCURSAL'];
    $old['PROVEEDOR'] = $el['PROVEEDOR'];
    $old['FECHA_FACTURA'] = $el['FECHA_FACTURA'];
    $old['MONEDA'] = $el['MONEDA'];
    $old['CAMBIO'] = $el['CAMBIO'];
    $old['TIPO'] = $el['TIPO'];
    $old['VALOR'] = $el['VALOR'];
    $firstRow=false;
   $contador++;
}

$T->Set('cantidad', number_format($contador,0,',','.'));
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
