<?php

/** Report prg file (rep_ajustes) 
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
$T->Set( 'sup_busc_prov', 'pa');
$T->Set( 'sup_prov', '6');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_grupo', 'ACADEMIA');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_color', 'AZUL');
$T->Set( 'sup_desde', '2009-01-14');
$T->Set( 'sup_hasta', '2010-01-14');
$T->Set( 'sup_fdp', 'No');
$T->Set( 'sup_rep_ajustes', '');
$T->Set( 'sup_rep_aj_con_fdp', '');
$T->Set( 'sup_desdeinv', '2009-01-14');
$T->Set( 'sup_hastainv', '2010-01-14');  */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select  DATE_FORMAT(aj_fecha,"%d-%m-%Y")  as FECHA, p.p_grupo AS GRUPO , p.p_tipo AS TIPO,p.p_color AS COLOR, p.p_cant AS CANTIDAD from mnt_prod p, mov_compras c,  mnt_ajustes a where c.c_prov like '6' and c.c_ref = p.p_ref and a.aj_prod = p.p_cod and aj_fecha between '2009-01-14' and '2010-01-14'  and p.prod_fin_pieza like 'No' ";

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
$subtotal0_CANTIDAD = 0;


//Define a Old Values Variables
$old['FECHA'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['CANTIDAD'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];

    // Preparing a template variables
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],0,'.',','));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,'.',','));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
    }
    
    //Actualize Old Values Variables
    $old['FECHA'] = $el['FECHA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
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
