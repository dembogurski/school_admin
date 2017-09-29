<?php

/** Report prg file (duplicados) 
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
$T->Set( 'sup___local', '02');
$T->Set( 'sup_check_suc', 'No');
$T->Set( 'sup_blaser', 'Manual');
$T->Set( 'sup_codigo', '');
$T->Set( 'sup_puntear', '');
$T->Set( 'sup_subst', '');
$T->Set( 'sup_check', '');
$T->Set( 'sup_hfocus', '');
$T->Set( 'sup_hfocus_esp', '');
$T->Set( 'sup_select_text', '');
$T->Set( 'sup_style2', '');
$T->Set( 'sup_style3', '');
$T->Set( 'sup_style4', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_msg', 'Area para Generar Reportes');
$T->Set( 'sup_suc_', '');
$T->Set( 'sup_tipo', 'Duplicados');
$T->Set( 'sup_gen_rep_inv', '');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_gen_rep_duplicados', '');
$T->Set( 'sup_gen_rep_diff', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT codigo AS CODIGO, suc_p AS SUC_P, suc_s AS SUC_S, hits AS HITS, usuario AS USUARIO, fecha_hora AS FECHA_HORA, duplicado AS DUPLICADO FROM inv_control WHERE codigo IN (SELECT codigo  FROM inv_control AS x GROUP BY codigo HAVING count(*)>1 AND inv_control.codigo=x.codigo) ORDER BY codigo,fecha_hora ASC  ";

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
$subtotal0_DUPLICADO = 0;


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['SUC_P'] = '';
$old['SUC_S'] = '';
$old['HITS'] = '';
$old['USUARIO'] = '';
$old['FECHA_HORA'] = '';
$old['DUPLICADO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['SUC_P'] = $Q0->Record['SUC_P'];
    $el['SUC_S'] = $Q0->Record['SUC_S'];
    $el['HITS'] = $Q0->Record['HITS'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['FECHA_HORA'] = $Q0->Record['FECHA_HORA'];
    $el['DUPLICADO'] = $Q0->Record['DUPLICADO'];
    if( $old['CODIGO']!=$el['CODIGO'] ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_DUPLICADO = 0;
    }

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_SUC_P', $el['SUC_P']);
    $T->Set('query0_SUC_S', $el['SUC_S']);
    $T->Set('query0_HITS', $el['HITS']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_FECHA_HORA', $el['FECHA_HORA']);
    $T->Set('query0_DUPLICADO', number_format($el['DUPLICADO'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_DUPLICADO += 0 + $el['DUPLICADO'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_DUPLICADO', number_format($subtotal0_DUPLICADO,0,',','.'));
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['SUC_P'] = $el['SUC_P'];
    $old['SUC_S'] = $el['SUC_S'];
    $old['HITS'] = $el['HITS'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['FECHA_HORA'] = $el['FECHA_HORA'];
    $old['DUPLICADO'] = $el['DUPLICADO'];
    $firstRow=false;

}

$endConsult = true;
if( $old['CODIGO']!=$el['CODIGO'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
