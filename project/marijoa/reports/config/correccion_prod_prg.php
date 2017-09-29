<?php

/** Report prg file (correccion_prod) 
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
$T->Set( 'sup_fam', 'vestir%');
$T->Set( 'sup_grup', 'bambu%');
$T->Set( 'sup_tip', 'liso%');
$T->Set( 'sup_ver_rep', '');
$T->Set( 'sup_bf', 'vest');
$T->Set( 'sup_ffam', 'VESTIR 2 ESTACIONES');
$T->Set( 'sup_bg', 'bam');
$T->Set( 'sup_fgru', 'BAMBULAS');
$T->Set( 'sup_bt', 'lis');
$T->Set( 'sup_ftip', 'LISOS DE 3 MTS');
$T->Set( 'sup_conf', 'No');
$T->Set( 'sup_upd', 'false');
$T->Set( 'sup___reload', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod AS CODIGO, p_fam AS FAM, p_grupo AS GRUPO, p_tipo AS TIPO, p_descri AS DESCRIP FROM mnt_prod WHERE p_fam LIKE 'vestir%' AND p_grupo LIKE 'bambu%' AND p_tipo LIKE 'liso%'  limit 4000 ";

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
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CLASIF'] = '';
$old['ESTRUC'] = '';
$old['DESCRIP'] = '';

$cant = $Q0->NumRows();
$T->Set("cant",$cant);

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
	 $el['CLASIF'] = $Q0->Record['CLASIF'];
    $el['ESTRUC'] = $Q0->Record['ESTRUC'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
	 $T->Set('query0_CLASIF', $el['CLASIF']);
    $T->Set('query0_ESTRUC', $el['ESTRUC']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);

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
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
	    $old['CLASIF'] = $el['CLASIF'];
    $old['ESTRUC'] = $el['ESTRUC'];
    $old['DESCRIP'] = $el['DESCRIP'];
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
