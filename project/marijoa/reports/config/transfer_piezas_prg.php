<?php

/** Report prg file (transfer_piezas) 
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
$T->Set( 'sup_cod_prod', '2134409');
$T->Set( 'sup_padre', '2133609');
$T->Set( 'sup_df_confirmar', 'No');
$T->Set( 'sup_df_fin_pieza', 'false');
$T->Set( 'sup_cant_actual', '520.00');
$T->Set( 'sup_desc', 'FRAZADAS - POLAR ESTAMPADO DE 2.2 - ESTAMPADOS');
$T->Set( 'sup_cant_compra', '530.00');
$T->Set( 'sup_espacio', '');
$T->Set( 'sup_p_local_prod', '06');
$T->Set( 'sup_empre', '');
$T->Set( 'sup_cambiar_local', 'false');
$T->Set( 'sup___msg', '');
$T->Set( 'sup_ver_ajustes', '');
$T->Set( 'sup_mov_ventas', '');
$T->Set( 'sup_info_trans', '');
$T->Set( 'sup_fracs', '');
$T->Set( 'sup__log', '');
$T->Set( 'sup_transf_positiva', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select __user as USUARIO, suc_o as ORIGEN, suc_de as DESTINO, fecha  as FECHA,codigo_de as COD,cant_de as CANT_M, cantidad as CANTIDAD, cant_final_a AS CANT_FINAL, codigo_a as CODIGO_A , cant_a as CANT_MOMENT, cant_final_a as CANT_FINAL_A, __userr as RECEPTOR from transf_piezas where codigo_de = '2134409' or codigo_a = '2134409' order by id asc";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'cod', $sup[cod_prod] );

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
$old['USUARIO'] = '';
$old['ORIGEN'] = '';
$old['DESTINO'] = '';
$old['FECHA'] = '';
$old['COD'] = '';
$old['CANT_M'] = '';
$old['CANTIDAD'] = '';
$old['CANT_FINAL'] = '';
$old['CODIGO_A'] = '';
$old['CANT_MOMENT'] = '';
$old['CANT_FINAL_A'] = '';
$old['RECEPTOR'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['ORIGEN'] = $Q0->Record['ORIGEN'];
    $el['DESTINO'] = $Q0->Record['DESTINO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['COD'] = $Q0->Record['COD'];
    $el['CANT_M'] = $Q0->Record['CANT_M'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['CANT_FINAL'] = $Q0->Record['CANT_FINAL'];
    $el['CODIGO_A'] = $Q0->Record['CODIGO_A'];
    $el['CANT_MOMENT'] = $Q0->Record['CANT_MOMENT'];
    $el['CANT_FINAL_A'] = $Q0->Record['CANT_FINAL_A'];
    $el['RECEPTOR'] = $Q0->Record['RECEPTOR'];
   
    if($el['COD'] == $sup['cod_prod']){
      $T->Set( 'clr', 'gray');
    }else{
       $T->Set( 'clr', 'white');
   }
    if($el['CODIGO_A']=== $sup[cod_prod]){
      $T->Set( 'cl', 'gray');
    } else{
       $T->Set( 'cl', 'white'); 
    }   

    // Preparing a template variables
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_ORIGEN', $el['ORIGEN']);
    $T->Set('query0_DESTINO', $el['DESTINO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_COD', $el['COD']);
    $T->Set('query0_CANT_M', $el['CANT_M']);
    $T->Set('query0_CANTIDAD', $el['CANTIDAD']);
    $T->Set('query0_CANT_FINAL', $el['CANT_FINAL']);
    $T->Set('query0_CODIGO_A', $el['CODIGO_A']);
    $T->Set('query0_CANT_MOMENT', $el['CANT_MOMENT']);
    $T->Set('query0_CANT_FINAL_A', $el['CANT_FINAL_A']);
    $T->Set('query0_RECEPTOR', $el['RECEPTOR']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['USUARIO'] = $el['USUARIO'];
    $old['ORIGEN'] = $el['ORIGEN'];
    $old['DESTINO'] = $el['DESTINO'];
    $old['FECHA'] = $el['FECHA'];
    $old['COD'] = $el['COD'];
    $old['CANT_M'] = $el['CANT_M'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['CANT_FINAL'] = $el['CANT_FINAL'];
    $old['CODIGO_A'] = $el['CODIGO_A'];
    $old['CANT_MOMENT'] = $el['CANT_MOMENT'];
    $old['CANT_FINAL_A'] = $el['CANT_FINAL_A'];
    $old['RECEPTOR'] = $el['RECEPTOR'];
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
