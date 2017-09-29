<?php

/** Report prg file (faltantes) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  
/*

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_cat', '%');
$T->Set( 'sup_desde', '2012-12-04');
$T->Set( 'sup_hasta', '2012-12-04');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', 'a');
$T->Set( 'sup_guia_tipo', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT fact_nro AS FACTURA, turno AS TURNO,usuario AS USUARIO, date_format(fecha, "%d-%m-%Y") AS FECHA, suc AS SUC,p_fam AS FAMILIA, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR,cant AS CANT, obs AS OBS FROM mnt_prod_falt  WHERE fecha BETWEEN '2012-12-04' AND '2012-12-04' AND suc LIKE '%' AND cat LIKE '%' AND p_fam LIKE '%' AND p_grupo LIKE '%' AND p_tipo LIKE '%' AND p_color LIKE '%' ";

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

//Define a Subtotal Variables
$subtotal0_CANT = 0;


//Define a Old Values Variables
$old['FACTURA'] = '';
$old['TURNO'] = '';
$old['USUARIO'] = '';
$old['FECHA'] = '';
$old['SUC'] = '';
$old['FAMILIA'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['CANT'] = '';
$old['OBS'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['TURNO'] = $Q0->Record['TURNO'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['FAMILIA'] = $Q0->Record['FAMILIA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['OBS'] = $Q0->Record['OBS'];

    // Preparing a template variables
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_TURNO', $el['TURNO']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_FAMILIA', $el['FAMILIA']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_CANT', number_format($el['CANT'],0,',','.'));
    $T->Set('query0_OBS', $el['OBS']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT += 0 + $el['CANT'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT = 0;
    }
    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['TURNO'] = $el['TURNO'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['FECHA'] = $el['FECHA'];
    $old['SUC'] = $el['SUC'];
    $old['FAMILIA'] = $el['FAMILIA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['CANT'] = $el['CANT'];
    $old['OBS'] = $el['OBS'];
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
