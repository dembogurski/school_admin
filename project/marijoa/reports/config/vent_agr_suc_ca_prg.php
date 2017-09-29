<?php

/** Report prg file (vent_agr_suc_ca) 
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
$T->Set( 'sup_desde', '2012-02-01');
$T->Set( 'sup_hasta', '2012-03-28');
$T->Set( 'sup_empr', '%');
$T->Set( 'sup_rep_total_suc', '');
$T->Set( 'sup_rep_agr_suc', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_rep_func', '');
$T->Set( 'sup_rep_porc_ventas', '');
$T->Set( 'sup___local', '%'); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  f.fact_localidad AS SUC,f.fact_vend_cod  AS VENDEDOR, f.fact_cli_cat AS CAT,sum(d.df_cantidad) AS VTAS_MTS,sum(d.df_subtotal) AS VTAS_GS  FROM factura f, det_factura d  WHERE f.fact_nro = d.df_fact_num   AND f.fact_fecha  BETWEEN '2012-02-01' AND '2012-02-01' AND f.fact_estado = "Cerrada" AND f.fact_localidad LIKE '%' GROUP BY    SUC, VENDEDOR, CAT  ORDER BY SUC ASC,VENDEDOR ASC,CAT ASC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

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
$total0_VTAS_MTS = 0;
$total0_VTAS_GS = 0;

//Define a Subtotal Variables
$subtotal0_VTAS_MTS = 0;
$subtotal0_VTAS_GS = 0;


$subtotal0_VTAS_MTS_SUC = 0;
$subtotal0_VTAS_GS_SUC = 0;


//Define a Old Values Variables
$old['SUC'] = '';
$old['VENDEDOR'] = '';
$old['CAT'] = '';
$old['VTAS_MTS'] = '';
$old['VTAS_GS'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['SUC'] = $Q0->Record['SUC'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['CAT'] = $Q0->Record['CAT'];
    $el['VTAS_MTS'] = $Q0->Record['VTAS_MTS'];
    $el['VTAS_GS'] = $Q0->Record['VTAS_GS'];
    if( $old['VENDEDOR']!=$el['VENDEDOR']  ){
        $T->Show('query0_subtotal_row'); 
        //Reset a Subtotal Variables
        $subtotal0_VTAS_MTS = 0;
        $subtotal0_VTAS_GS = 0;
    }
    
    if( $old['SUC']!=$el['SUC'] &&  $old['SUC']!='' ){
       $T->Show('query0_subtotal_row_suc');
       $subtotal0_VTAS_MTS_SUC = 0;
       $subtotal0_VTAS_GS_SUC = 0;
    }
    

    // Preparing a template variables
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_VTAS_MTS', number_format($el['VTAS_MTS'],2,',','.'));
    $T->Set('query0_VTAS_GS', number_format($el['VTAS_GS'],2,',','.'));

    // Calculating a total
    $total0_VTAS_MTS += 0 + $el['VTAS_MTS'];
    $total0_VTAS_GS += 0 + $el['VTAS_GS'];

    // Calculating a subtotal
    $subtotal0_VTAS_MTS += 0 + $el['VTAS_MTS'];
    $subtotal0_VTAS_GS += 0 + $el['VTAS_GS'];
    
    $subtotal0_VTAS_MTS_SUC += 0 + $el['VTAS_MTS'];
    $subtotal0_VTAS_GS_SUC += 0 + $el['VTAS_GS'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_VTAS_MTS', number_format($subtotal0_VTAS_MTS,2,',','.'));
    $T->Set('subtotal0_VTAS_GS', number_format($subtotal0_VTAS_GS,2,',','.'));
    
    $T->Set('subtotal0_VTAS_MTS_SUC', number_format($subtotal0_VTAS_MTS_SUC,2,',','.'));
    $T->Set('subtotal0_VTAS_GS_SUC', number_format($subtotal0_VTAS_GS_SUC,2,',','.'));
    
    
    //Actualize Old Values Variables
    $old['SUC'] = $el['SUC'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['CAT'] = $el['CAT'];
    $old['VTAS_MTS'] = $el['VTAS_MTS'];
    $old['VTAS_GS'] = $el['VTAS_GS'];
    $firstRow=false;

}

$endConsult = true;
if( $old['VENDEDOR']!=$el['VENDEDOR'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_VTAS_MTS', number_format($total0_VTAS_MTS,2,',','.'));
$T->Set('total0_VTAS_GS', number_format($total0_VTAS_GS,2,',','.'));
if( endConsult ){
     $T->Show('query0_subtotal_row');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
