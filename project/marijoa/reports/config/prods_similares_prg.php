<?php

/** Report prg file (prods_similares) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
 
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod as CODIGO, p_fam AS FAMILIA,p_grupo as GRUPO, p_tipo AS TIPO, p_color AS COLOR, p_local AS SUC FROM productos  WHERE p_cod = '9555512'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$__local = $sup['__local'];

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
$old['FAMILIA'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['SUC'] = '';

$db = new Y_DB();
$db->Database = $Global['project'];
        

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FAMILIA'] = $Q0->Record['FAMILIA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['SUC'] = $Q0->Record['SUC'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_FAMILIA', $el['FAMILIA']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_SUC', $el['SUC']);
    
    $cod = $el['CODIGO'];
    $fam = $el['FAMILIA'];
    $gru = $el['GRUPO'];
    $tipo = $el['TIPO'];
    $color = $el['COLOR'];
    $suc =   $el['SUC'];
    
    $T->Show('query0_data_row');
    
     $T->Show('query0_subtotal_row');
    
    $db->Query( "SELECT p_cod as CODIGO, p_fam AS FAMILIA,p_grupo as GRUPO, p_tipo AS TIPO, p_color AS COLOR,p_descri as DESCRIP, p_local AS SUC, p_cant as CANT FROM productos  WHERE
                p_fam like '$fam' and p_grupo like '$gru' and p_tipo like '$tipo' and p_color like '$color' and p_local = '$__local' and p_cod <> '$cod'  " );
    
    while( $db->NextRecord() ){
        $el['CODIGO'] = $db->Record['CODIGO'];
        $el['FAMILIA'] = $db->Record['FAMILIA'];
        $el['GRUPO'] = $db->Record['GRUPO'];
        $el['TIPO'] = $db->Record['TIPO'];
        $el['COLOR'] = $db->Record['COLOR'];
        $el['SUC'] = $db->Record['SUC'];
        $el['CANT'] = $db->Record['CANT'];
        $el['DESCRIP'] = $db->Record['DESCRIP'];

        // Preparing a template variables
        $T->Set('query0_CODIGO', $el['CODIGO']);
        $T->Set('query0_FAMILIA', $el['FAMILIA']);
        $T->Set('query0_GRUPO', $el['GRUPO']);
        $T->Set('query0_TIPO', $el['TIPO']);
        $T->Set('query0_COLOR', $el['COLOR']);
        $T->Set('query0_SUC', $el['SUC']);
        $T->Set('query0_CANT', $el['CANT']);
        $T->Set('query0_DESCRIP', $el['DESCRIP']);
        $T->Show('query0_data_row');
    }
    
    
       
    
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['FAMILIA'] = $el['FAMILIA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['SUC'] = $el['SUC'];
    $firstRow=false;

}

$endConsult = true;
 
// Show total
if( true ){
 
}
$T->Show('end_query0');				// Ends a Table 

?>
