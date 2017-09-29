<?php

/** Report prg file (his_impresiones) 
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
$T->Set( 'sup_f_bloqueo', 'true');
$T->Set( 'sup_f_cod', '6512');
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup_f_term', '%12');
$T->Set( 'sup_f_sql', 'con borde  verde y circulos con girasoles ');
$T->Set( 'sup_fam', 'DECORACIONES');
$T->Set( 'sup_gru', 'MANTELERIA');
$T->Set( 'sup_tipo', 'REDONDA DE TROPICAL ESTAMPADO DE 1.8');
$T->Set( 'sup_descripcion', 'con borde  verde y circulos con girasoles ');
$T->Set( 'sup_f_cant', '28.00');
$T->Set( 'sup_f_precio', '21500');
$T->Set( 'sup_color', 'BLANCO');
$T->Set( 'sup_b_color', '');
$T->Set( 'sup_p_color', '');
$T->Set( 'sup_check_color', 'Ingrese el color para verificar!!!');
$T->Set( 'sup_motivo', '');
$T->Set( 'sup_f_hist', '');
$T->Set( 'sup_f_adv', '');
$T->Set( 'sup_f_imprimir_new', '');
$T->Set( 'sup_f_size', '230');
$T->Set( 'sup_f_alt', '65');
$T->Set( 'sup_f_tam', '8');
$T->Set( 'sup_f_izq', '5');
$T->Set( 'sup_f_recordar', 'false');
$T->Set( 'sup_f_dist', '0');
$T->Set( 'sup_mostrar_precio', 'Si');
$T->Set( 'sup_style', '');
$T->Set( 'sup_stylef', '');
$T->Set( 'sup_styleg', '');
$T->Set( 'sup_stylet', '');
$T->Set( 'sup_styled', '');
$T->Set( 'sup_stylev', '');
$T->Set( 'sup_tab0', '');
$T->Set( 'sup_hfocus', 'false');
$T->Set( 'sup___local', '02');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT codigo AS CODIGO, usuario AS USUARIO, suc_u AS SUC_USUARIO, suc_p AS SUC_PROD,date_format(fecha,"%d-%m-%Y") AS FECHA, hora AS HORA,ci AS CANT_IMP, obs AS OBS FROM reg_impresion WHERE codigo = '6512' ORDER BY id ASC ";

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
$old['CODIGO'] = '';
$old['USUARIO'] = '';
$old['SUC_USUARIO'] = '';
$old['SUC_PROD'] = '';
$old['FECHA'] = '';
$old['HORA'] = '';
$old['CANT_IMP'] = '';
$old['OBS'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['SUC_USUARIO'] = $Q0->Record['SUC_USUARIO'];
    $el['SUC_PROD'] = $Q0->Record['SUC_PROD'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['HORA'] = $Q0->Record['HORA'];
    $el['CANT_IMP'] = $Q0->Record['CANT_IMP'];
    $el['OBS'] = $Q0->Record['OBS'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_SUC_USUARIO', $el['SUC_USUARIO']);
    $T->Set('query0_SUC_PROD', $el['SUC_PROD']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_HORA', $el['HORA']);
    $T->Set('query0_CANT_IMP', $el['CANT_IMP']);
    $T->Set('query0_OBS', $el['OBS']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
  
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['SUC_USUARIO'] = $el['SUC_USUARIO'];
    $old['SUC_PROD'] = $el['SUC_PROD'];
    $old['FECHA'] = $el['FECHA'];
    $old['HORA'] = $el['HORA'];
    $old['CANT_IMP'] = $el['CANT_IMP'];
    $old['OBS'] = $el['OBS'];
    $firstRow=false;

}

$endConsult = true;
/*
if( true ){
   // $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
} */
$T->Show('end_query0');				// Ends a Table 

?>
