<?php

/** Report prg file (inv_punteados) 
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
$T->Set( 'sup_suc_', '07');
$T->Set( 'sup_tipo', 'Punteados');
$T->Set( 'sup_gen_rep_inv', '');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_gen_rep_duplicados', '');
$T->Set( 'sup_gen_rep_diff', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod AS CODIGO, p_fam AS FAMILIA, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR, p_cant AS STOCK, round(p_compra * p_cant,2) AS COSTO_FOB, (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1) * p_cant   AS COSTO_CIF   FROM mnt_prod p, inv_control i   WHERE p.p_cod = i.codigo AND  suc_p = '07' ";

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
$subtotal0_STOCK = 0;
$subtotal0_COSTO_FOB = 0;
$subtotal0_COSTO_CIF = 0;


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['FAMILIA'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['STOCK'] = '';
$old['COSTO_FOB'] = '';
$old['COSTO_CIF'] = '';

$old['SUC_P'] = '';
$old['SUC_S'] = '';
$old['HITS'] = '';

$i = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){
    $i++;
    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FAMILIA'] = $Q0->Record['FAMILIA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['STOCK'] = $Q0->Record['STOCK'];
    $el['COSTO_FOB'] = $Q0->Record['COSTO_FOB'];
    $el['COSTO_CIF'] = $Q0->Record['COSTO_CIF'];
    
    $el['SUC_P'] = $Q0->Record['SUC_P'];
    $el['SUC_S'] = $Q0->Record['SUC_S'];
    $el['HITS'] = $Q0->Record['HITS'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    
    $T->Set('query0_SUC_P', $el['SUC_P']);
    $T->Set('query0_SUC_S', $el['SUC_S']);
    $T->Set('query0_HITS', $el['HITS']);
    
    $T->Set('query0_FAMILIA', $el['FAMILIA']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_STOCK', number_format($el['STOCK'],0,',','.'));
    $T->Set('query0_COSTO_FOB', number_format($el['COSTO_FOB'],0,',','.'));
    $T->Set('query0_COSTO_CIF', number_format($el['COSTO_CIF'],0,',','.'));
    $T->Set('cant', $i);
    
    if($el['STOCK'] == 0){
         $T->Set('color', 'red');
    }else{
         $T->Set('color', 'white');
    }
    
    
    // Calculating a total

    // Calculating a subtotal
    $subtotal0_STOCK += 0 + $el['STOCK'];
    $subtotal0_COSTO_FOB += 0 + $el['COSTO_FOB'];
    $subtotal0_COSTO_CIF += 0 + $el['COSTO_CIF'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_STOCK', number_format($subtotal0_STOCK,2,',','.'));
    $T->Set('subtotal0_COSTO_FOB', number_format($subtotal0_COSTO_FOB,2,',','.'));
    $T->Set('subtotal0_COSTO_CIF', number_format($subtotal0_COSTO_CIF,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_STOCK = 0;
        $subtotal0_COSTO_FOB = 0;
        $subtotal0_COSTO_CIF = 0;
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['FAMILIA'] = $el['FAMILIA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['STOCK'] = $el['STOCK'];
    $old['COSTO_FOB'] = $el['COSTO_FOB'];
    $old['COSTO_CIF'] = $el['COSTO_CIF'];
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
