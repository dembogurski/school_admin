<?php

/** Report prg file (translados) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_desde', '2007-02-14');
$T->Set( 'sup_hasta', '2008-02-14');
$T->Set( 'sup_desdeinv', '2007-02-14');
$T->Set( 'sup_hastainv', '2008-02-14');
$T->Set( 'sup_origen', $sup['origen']);
$T->Set( 'sup_destino', $sup['destino']);
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_rem_dir_origen', $sup['rem_dir_origen']);
$T->Set( 'sup_rem_dir_destino', $sup['rem_dir_destino']);  
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select r.rem_nro as Nro, r.rem_fecha as FECHA, r.rem_vend_cod as FUNCIONARIO,r.rem_func_nombre as RESPONSABLE, r.rem_receptor as RECEPTOR, d.df_cod_prod AS CODIGO, d.df_descrip as DESCRIP, d.df_disponible as CANTIDAD from nota_remision r, remito_det d where r.rem_nro = d.rem_nro and  r.rem_origen = '01' and r.rem_destino = '04' and r.rem_fecha between  '2007-02-14' and '2008-02-14'";

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


//Define a Old Values Variables
$old['Nro'] = '';
$old['FECHA'] = '';
$old['FUNCIONARIO'] = '';
$old['RESPONSABLE'] = '';
$old['RECEPTOR'] = '';
$old['CODIGO'] = '';
$old['DESCRIP'] = '';
$old['CANTIDAD'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['FUNCIONARIO'] = $Q0->Record['FUNCIONARIO'];
    $el['RESPONSABLE'] = $Q0->Record['RESPONSABLE'];
    $el['RECEPTOR'] = $Q0->Record['RECEPTOR'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_FUNCIONARIO', $el['FUNCIONARIO']);
    $T->Set('query0_RESPONSABLE', $el['RESPONSABLE']);
    $T->Set('query0_RECEPTOR', $el['RECEPTOR']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_CANTIDAD', $el['CANTIDAD']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['FECHA'] = $el['FECHA'];
    $old['FUNCIONARIO'] = $el['FUNCIONARIO'];
    $old['RESPONSABLE'] = $el['RESPONSABLE'];
    $old['RECEPTOR'] = $el['RECEPTOR'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>
