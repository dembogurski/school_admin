<?php

/** Report prg file (caja_con) 
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
$T->Set( 'sup_cjc_cod', '');
$T->Set( 'sup_cjc_descri', '');
$T->Set( 'sup_cjc_compl', 'No');
$T->Set( 'sup_cjc_tipo', 'E');
$T->Set( 'sup_cjc_autom', 'No');
$T->Set( 'sup_cjc_gasto', 'No');
$T->Set( 'sup_cjc_er', 'No');
$T->Set( 'sup_cjc_ap', 'A');
$T->Set( 'sup_inprimir', '');
$T->Set( 'sup___disableDel', '');
$T->Set( 'sup___disableChange', '');
$T->Set( 'sup_cjc_sub_con', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT cjc_cod AS CODIGO, cjc_descri AS DESCRIPCION, cjc_tipo AS TIPO FROM  caja_con WHERE cjc_cod NOT LIKE "%-%"";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );


$db = new Y_DB();
$db->Database = $Global['project'];

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
$old['DESCRIPCION'] = '';
$old['TIPO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['TIPO'] = $Q0->Record['TIPO'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $codigo = $el['CODIGO'];
    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');

    $db->Query("SELECT cjc_cod AS CODIGO, cjc_descri AS DESCRIPCION, cjc_tipo AS TIPO FROM caja_con WHERE cjc_cod LIKE '$codigo-%'  ORDER BY cjc_cod ASC");

    echo '     <tr>
      <td colspan="3">
        <table border="0">';
    while($db->NextRecord()){
       $sub_cod = $db->Record['CODIGO'];
       $sub_des = $db->Record['DESCRIPCION'];
       $sub_tipo = $db->Record['TIPO'];
       $T->Set('sub_CODIGO', $sub_cod);
       $T->Set('sub_DESCRIPCION', $sub_des);
       $T->Set('sub_TIPO', $sub_tipo);
       $T->Show('sub');
    }
    echo '</table>
      </td>
     </tr>';

    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['DESCRIPCION'] = $el['DESCRIPCION'];
    $old['TIPO'] = $el['TIPO'];
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
