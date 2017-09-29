<?php

/** Report prg file (facturas_contab) 
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
$T->Set( 'sup_rep_cont_cred', '%');
$T->Set( 'sup_cat', '%');
$T->Set( 'sup_rep_vend_cod', '%');
$T->Set( 'sup_rep_localidad', '02');
$T->Set( 'sup_desde', '2012-04-01');
$T->Set( 'sup_hasta', '2012-07-05');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_ventas_csv', '');
$T->Set( 'sup_rep_ventas_sim', '');
$T->Set( 'sup_rep_cant_fact', '');
$T->Set( 'sup_rep_compras', '');
$T->Set( 'sup_rep_compras_csv', '');
$T->Set( 'sup_desdeinv', '2012-04-01');
$T->Set( 'sup_hastainv', '2012-07-05');
$T->Set( 'sup_rep_margenes', '');
$T->Set( 'sup_rep_ventas_cont', '');

*/
// ------------------------------------------


$desde = $sup['desde'];
$hasta = $sup['hasta'];
$suc = $sup['rep_localidad'];
$tipo = $sup['rep_cont_cred'];
$hasta = $sup['hasta'];
$r1 = $sup['r1'];
$r2 = $sup['r2'];


$query0 = "SELECT c.f_suc AS SUC,c.f_nro AS FACTURA,c.f_ref AS REF, DATE_FORMAT(c.f_fecha,'%d-%m-%Y') AS FECHA, f.fact_total AS TOTAL,
c.f_total as TOTAL_FACT, upper(f.fact_nom_cli)  as CLIENTE, c.f_tipo AS TIPO   FROM factura f,fact_cont c WHERE f.fact_nro = c.f_ref AND 
f.fact_estado = 'Cerrada'  AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND c.f_estado = 'Cerrada' and c.f_suc like '$suc' AND c.f_tipo 
LIKE '$tipo' and f_fecha < f_venc and c.f_nro between $r1 and $r2  ";

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


//Define a Old Values Variables
$old['SUC'] = '';
$old['FACTURA'] = '';
$old['REF'] = '';
$old['FECHA'] = '';
$old['TOTAL'] = '';
$old['TOTAL_FACT'] = '';

$old['TIPO'] = '';$old['CLIENTE'] = '';

$i= 0;
// Making a rows of consult
while( $Q0->NextRecord() ){
     $i++;

    if($i%2 > 0){
       $T->Set('tr', 'odd');
    }else{
       $T->Set('tr', 'even');
    }
    // Define a elements
    $el['SUC'] = $Q0->Record['SUC'];
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['REF'] = $Q0->Record['REF'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['TOTAL_FACT'] = $Q0->Record['TOTAL_FACT'];
    

    // Preparing a template variables
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_REF', $el['REF']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,',','.'));
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_TOTAL_FACT', number_format($el['TOTAL_FACT'],0,',','.'));
    

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL_FACT'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['SUC'] = $el['SUC'];
    $old['FACTURA'] = $el['FACTURA'];
    $old['REF'] = $el['REF'];
    $old['FECHA'] = $el['FECHA'];
    $old['TOTAL'] = $el['TOTAL'];
    $old['TIPO'] = $el['TIPO'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['TOTAL_FACT'] = $el['TOTAL_FACT'];
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
