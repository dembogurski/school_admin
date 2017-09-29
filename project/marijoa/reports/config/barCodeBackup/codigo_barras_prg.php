<?php

/** Report prg file (codigo_barras) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_f_cod', '027');
$T->Set( 'sup_f_sql', 'MAREADO CUADRO LILA C/ HOJAS Y FLORES. CHINA EST. ');
$T->Set( 'sup_f_combinado', 'CHINA EST. DE ALGODON DE 2.4');
$T->Set( 'sup_f_cant', '1.25');
$T->Set( 'sup_f_bloqueo', 'true');
$T->Set( 'sup_f_codigo_nuevo', '027');
$T->Set( 'sup_f_habilitar', 'Si');
$T->Set( 'sup_f_imprimir', '');
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select p_cod as CODIGO_BARRAS, p_local as LOCALIDAD,p_fam, p_grupo,p_tipo,p_comp,p_temp,p_estruc,p_clasif,p_color,p_cant  from mnt_prod where p_cod like '027'";

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
$old['CODIGO_BARRAS'] = '';
$old['LOCALIDAD'] = '';
$old['p_fam'] = '';
$old['p_grupo'] = '';
$old['p_tipo'] = '';
$old['p_comp'] = '';
$old['p_temp'] = '';
$old['p_estruc'] = '';
$old['p_clasif'] = '';
$old['p_color'] = '';
$old['p_cant'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO_BARRAS'] = $Q0->Record['CODIGO_BARRAS'];
    $el['LOCALIDAD'] = $Q0->Record['LOCALIDAD'];
    $el['p_fam'] = $Q0->Record['p_fam'];
    $el['p_grupo'] = $Q0->Record['p_grupo'];
    $el['p_tipo'] = $Q0->Record['p_tipo'];
    $el['p_comp'] = $Q0->Record['p_comp'];
    $el['p_temp'] = $Q0->Record['p_temp'];
    $el['p_estruc'] = $Q0->Record['p_estruc'];
    $el['p_clasif'] = $Q0->Record['p_clasif'];
    $el['p_color'] = $Q0->Record['p_color'];
    $el['p_cant'] = $Q0->Record['p_cant'];

    // Preparing a template variables
    $T->Set('query0_CODIGO_BARRAS', $el['CODIGO_BARRAS']);
    $T->Set('query0_LOCALIDAD', $el['LOCALIDAD']);
    $T->Set('query0_p_fam', $el['p_fam']);
    $T->Set('query0_p_grupo', $el['p_grupo']);
    $T->Set('query0_p_tipo', $el['p_tipo']);
    $T->Set('query0_p_comp', $el['p_comp']);
    $T->Set('query0_p_temp', $el['p_temp']);
    $T->Set('query0_p_estruc', $el['p_estruc']);
    $T->Set('query0_p_clasif', $el['p_clasif']);
    $T->Set('query0_p_color', $el['p_color']);
    $T->Set('query0_p_cant', $el['p_cant']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CODIGO_BARRAS'] = $el['CODIGO_BARRAS'];
    $old['LOCALIDAD'] = $el['LOCALIDAD'];
    $old['p_fam'] = $el['p_fam'];
    $old['p_grupo'] = $el['p_grupo'];
    $old['p_tipo'] = $el['p_tipo'];
    $old['p_comp'] = $el['p_comp'];
    $old['p_temp'] = $el['p_temp'];
    $old['p_estruc'] = $el['p_estruc'];
    $old['p_clasif'] = $el['p_clasif'];
    $old['p_color'] = $el['p_color'];
    $old['p_cant'] = $el['p_cant'];
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
