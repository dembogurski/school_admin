<?php

/** Report prg file (monit_cliente) 
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
$T->Set( 'sup_cli_cat', '%');
$T->Set( 'sup_cli_tipo', '%');
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-03-04');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_meses', '2');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT cli_cat AS CAT, c.cli_tipo AS TIPO, c.cli_prom AS PROMEDIO, cli_fullname AS CLIENTE, sum(d.df_cantidad) AS CANT, sum(d.df_subtotal) AS SUBTOTAL, round(sum(  d.df_subtotal - (  (p.p_compra * -1) - (p.p_compra * p_porc_recargo / 100)  * -1 ) * d.df_cantidad ),0)  AS MARGEN  FROM factura f,det_factura d, mnt_prod p, mnt_cli c WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_cli_ci = c.cli_ci AND f.fact_localidad LIKE  '%' AND  f.fact_fecha BETWEEN '2012-01-01' AND '2012-03-04'AND fact_cli_cat LIKE '%' AND f. fact_estado = "Cerrada" AND c.cli_tipo LIKE '%'   GROUP BY CAT ASC, TIPO ASC,PROMEDIO ASC,CLIENTE ASC   ORDER BY  SUBTOTAL DESC  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$meses = $sup['meses'];
if($meses > 1){
    $T->Set('tiempo', $meses." meses");
}else{
    $T->Set('tiempo', $meses." mes");
}

$data_ini = substr($sup['desde'], 8, 2) . '-' . substr($sup['desde'], 5, 2) . '-' . substr($sup['desde'], 0, 4);
$data_fin = substr($sup['hasta'], 8, 2) . '-' . substr($sup['hasta'], 5, 2) . '-' . substr($sup['hasta'], 0, 4);
$T->Set('desde', $data_ini);
$T->Set('hasta', $data_fin);

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
$subtotal0_SUBTOTAL = 0;
$subtotal0_MARGEN = 0;


//Define a Old Values Variables
$old['CAT'] = '';
$old['TIPO'] = '';
$old['PROMEDIO'] = '';
$old['CLIENTE'] = '';
$old['CANT'] = '';
$old['SUBTOTAL'] = '';
$old['MARGEN'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CAT'] = $Q0->Record['CAT'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['PROMEDIO'] = $Q0->Record['PROMEDIO'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];

    // Preparing a template variables
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_PROMEDIO', $el['PROMEDIO']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CANT', number_format($el['CANT'],2,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],0,',','.'));
    $T->Set('query0_MARGEN', number_format($el['MARGEN'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT += 0 + $el['CANT'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];
    $subtotal0_MARGEN += 0 + $el['MARGEN'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,2,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,2,',','.'));
    $T->Set('subtotal0_MARGEN', number_format($subtotal0_MARGEN,2,',','.'));
    if( endConsult ){
        //$T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        //$subtotal0_CANT = 0;
        //$subtotal0_SUBTOTAL = 0;
        //$subtotal0_MARGEN = 0;
    }
    
    //Actualize Old Values Variables
    $old['CAT'] = $el['CAT'];
    $old['TIPO'] = $el['TIPO'];
    $old['PROMEDIO'] = $el['PROMEDIO'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CANT'] = $el['CANT'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $old['MARGEN'] = $el['MARGEN'];
    $firstRow=false;

}

$endConsult = true;
if( endConsutl ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
