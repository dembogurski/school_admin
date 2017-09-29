<?php

/** Report prg file (rep_ventas_res) 
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
$T->Set( 'sup_prov', '%');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_rep_cont_cred', 'Contado');
$T->Set( 'sup_cat', '%');
$T->Set( 'sup_rep_vend_cod', '%');
$T->Set( 'sup_rep_cli', '%');
$T->Set( 'sup_rep_localidad', '02');
$T->Set( 'sup_desde', '2009-05-08');
$T->Set( 'sup_hasta', '2009-07-31');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_ventas_csv', '');
$T->Set( 'sup_rep_ventas_sim', '');
$T->Set( 'sup_rep_compras', '');
$T->Set( 'sup_rep_compras_csv', '');
$T->Set( 'sup_desdeinv', '2009-05-08');
$T->Set( 'sup_hastainv', '2009-07-31');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT fact_nro as Nro, fact_fecha as FECHA,fact_emp_dir as LUGAR, fact_nom_cli as CLIENTE,fact_cli_cat as CATEGORIA, func_nombre as VENDEDOR,fact_comi_vend as COMISION,fact_tipo as TIPO, fact_total as TOTAL ,  margen(fact_nro) as MARGEN FROM factura  WHERE fact_tipo like  'Contado' and fact_vend_cod like '%'  and  fact_cli_ci like '%' and fact_localidad like '02' and fact_fecha BETWEEN '2009-05-08' and '2009-07-31' and fact_estado = "Cerrada" and fact_moneda like '%' and fact_cli_cat  like '%' ";

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
$subtotal0_COMISION = 0;
$subtotal0_TOTAL = 0;
$subtotal0_MARGEN = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['FECHA'] = '';
$old['LUGAR'] = '';
$old['CLIENTE'] = '';
$old['CATEGORIA'] = '';
$old['VENDEDOR'] = '';
$old['COMISION'] = '';
$old['TIPO'] = '';
$old['TOTAL'] = '';
$old['MARGEN'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['LUGAR'] = $Q0->Record['LUGAR'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CATEGORIA'] = $Q0->Record['CATEGORIA'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['COMISION'] = $Q0->Record['COMISION'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];

    // Preparing a template variables
  /*  $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_LUGAR', $el['LUGAR']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CATEGORIA', $el['CATEGORIA']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_COMISION', number_format($el['COMISION'],0,'.',','));
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,'.',','));
    $T->Set('query0_MARGEN', number_format($el['MARGEN'],0,'.',','));    */

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_COMISION += 0 + $el['COMISION'];
    $subtotal0_TOTAL += 0 + $el['TOTAL'];
    $subtotal0_MARGEN += 0 + $el['MARGEN'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_COMISION', number_format($subtotal0_COMISION,0,'.',','));
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,'.',','));
    $T->Set('subtotal0_MARGEN', number_format($subtotal0_MARGEN,0,'.',','));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_COMISION = 0;
        $subtotal0_TOTAL = 0;
        $subtotal0_MARGEN = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['FECHA'] = $el['FECHA'];
    $old['LUGAR'] = $el['LUGAR'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CATEGORIA'] = $el['CATEGORIA'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['COMISION'] = $el['COMISION'];
    $old['TIPO'] = $el['TIPO'];
    $old['TOTAL'] = $el['TOTAL'];
    $old['MARGEN'] = $el['MARGEN'];
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
