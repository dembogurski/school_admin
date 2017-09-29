<?php

/** Report prg file (margenes) 
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
$T->Set( 'sup_msg_2', '( ! ) ATENCION!!!  No haga reportes en horas pico de trabajo o dejara inabilitadas las demas terminales.');
$T->Set( 'sup_msg_3', '( ! ) Los reportes hacen consulas complejas pueden causar inestabilidad en el sistema.');
$T->Set( 'sup_tipo_rep', 'Ventas');
$T->Set( 'sup_busc', '');
$T->Set( 'sup_prov', '');
$T->Set( 'sup_rep_cli', '');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_rep_cont_cred', '');
$T->Set( 'sup_cat', '%');
$T->Set( 'sup_rep_vend_cod', '%');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_desde', '2010-06-08');
$T->Set( 'sup_hasta', '2010-06-10');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_ventas_csv', '');
$T->Set( 'sup_rep_ventas_sim', '');
$T->Set( 'sup_rep_compras', '');
$T->Set( 'sup_rep_compras_csv', '');
$T->Set( 'sup_desdeinv', '2010-06-08');
$T->Set( 'sup_hastainv', '2010-06-10');
$T->Set( 'sup_rep_margenes', '');
// ------------------------------------------


*/
// THIS IS YOUR FIRST QUERY:
//$query0 = "select id as ID, fecha AS FECHA, suc AS SUC, cant_fact AS CANT, suma_totales AS TOTALES, suma_margenes  AS MARGEN from margen_x_fecha where suc like '%' and  fecha BETWEEN '2010-06-08' and '2010-06-10' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];  
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

//Define a Subtotal Variables
$subtotal0_CANT = 0;
$subtotal0_TOTALES = 0;
$subtotal0_MARGEN = 0;


//Define a Old Values Variables
$old['ID'] = '';
$old['FECHA'] = '';
$old['SUC'] = '';
$old['CANT'] = '';
$old['TOTALES'] = '';
$old['MARGEN'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['ID'] = $Q0->Record['ID'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['TOTALES'] = $Q0->Record['TOTALES'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];

    // Preparing a template variables
    $T->Set('query0_ID', $el['ID']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_CANT', number_format($el['CANT'],0,',','.'));
    $T->Set('query0_TOTALES', number_format($el['TOTALES'],2,',','.'));
    $T->Set('query0_MARGEN', number_format($el['MARGEN'],2,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT += 0 + $el['CANT'];
    $subtotal0_TOTALES += 0 + $el['TOTALES'];
    $subtotal0_MARGEN += 0 + $el['MARGEN'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,0,',','.'));
    $T->Set('subtotal0_TOTALES', number_format($subtotal0_TOTALES,2,',','.'));
    $T->Set('subtotal0_MARGEN', number_format($subtotal0_MARGEN,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT = 0;
        $subtotal0_TOTALES = 0;
        $subtotal0_MARGEN = 0;
    }
    
    //Actualize Old Values Variables
    $old['ID'] = $el['ID'];
    $old['FECHA'] = $el['FECHA'];
    $old['SUC'] = $el['SUC'];
    $old['CANT'] = $el['CANT'];
    $old['TOTALES'] = $el['TOTALES'];
    $old['MARGEN'] = $el['MARGEN'];
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
    
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $porc = $subtotal0_MARGEN  * 100 / $subtotal0_TOTALES;
    
    $T->Set('porc', number_format($porc,1,',','.'));
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
