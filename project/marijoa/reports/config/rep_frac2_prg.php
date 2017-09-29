<?php

/** Report prg file (rep_frac) 
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
$T->Set( 'sup_cod_prod', '9488608');
$T->Set( 'sup_cant_actual', '45.00');
$T->Set( 'sup_ver_ajustes', '');
$T->Set( 'sup_mov_ventas', '');
$T->Set( 'sup_info_trans', '');
$T->Set( 'sup_fracs', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select p_cod as CODIGO,p_grupo as GRUPO, p_tipo as TIPO, p_comp as COMP,  p_temp as TEMP, p_estruc as ESTRUCT,  p_color as COLOR, p_lisoest as LISOEST,p_descri as DESCRIPCION,p_cant as CANTIDAD,p_local as SUC,p_compra AS VALOR  FROM  mnt_prod where p_padre = '9488608' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'codigo', $el['cod_prod'] );

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
$old['CODIGO'] = '';
 
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COMP'] = '';
$old['TEMP'] = '';
$old['ESTRUCT'] = '';
$old['COLOR'] = '';
$old['LISOEST'] = '';
$old['DESCRIPCION'] = '';
$old['CANTIDAD'] = '';
$old['SUC'] = '';
$old['VALOR'] = '';
$old['CANT_COMPRA'] = '';

 

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COMP'] = $Q0->Record['COMP'];
    $el['TEMP'] = $Q0->Record['TEMP'];
    $el['ESTRUCT'] = $Q0->Record['ESTRUCT'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['LISOEST'] = $Q0->Record['LISOEST'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['CANT_COMPRA'] = $Q0->Record['CANT_COMPRA'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
     
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COMP', $el['COMP']);
    $T->Set('query0_TEMP', $el['TEMP']);
    $T->Set('query0_ESTRUCT', $el['ESTRUCT']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_LISOEST', $el['LISOEST']);
    $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
    $T->Set('query0_CANTIDAD', $el['CANTIDAD']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_VALOR', $el['VALOR']);
     $T->Set('query0_CANT_COMPRA', $el['CANT_COMPRA']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
     
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COMP'] = $el['COMP'];
    $old['TEMP'] = $el['TEMP'];
    $old['ESTRUCT'] = $el['ESTRUCT'];
    $old['COLOR'] = $el['COLOR'];
    $old['LISOEST'] = $el['LISOEST'];
    $old['DESCRIPCION'] = $el['DESCRIPCION'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['SUC'] = $el['SUC'];
    $old['VALOR'] = $el['VALOR'];
    $old['CANT_COMPRA'] = $el['CANT_COMPRA'];
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
