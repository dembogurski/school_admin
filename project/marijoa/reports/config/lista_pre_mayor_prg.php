<?php

/** Report prg file (lista_pre_mayor) 
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
$T->Set( 'sup_local', '05');
$T->Set( 'sup_p_cod', '');
$T->Set( 'sup_p_fam', 'C');
$T->Set( 'sup_p_fams', 'Cobertores');
$T->Set( 'sup_p_grupo', 'A');
$T->Set( 'sup_p_grupos', '%');
$T->Set( 'sup_p_tipo', 'A');
$T->Set( 'sup_p_tipos', '%');
$T->Set( 'sup_p_color', 'A');
$T->Set( 'sup_p_colors', '%');
$T->Set( 'sup___msg', '( ! ) El simbolo % no muestra precio, %% muestra precio para impresion...');
$T->Set( 'sup_p_precio_1', '%%');
$T->Set( 'sup_p_precio_2', '%%');
$T->Set( 'sup_p_precio_3', '%%');
$T->Set( 'sup_p_precio_4', '%%');
$T->Set( 'sup_p_precio_5', '%');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_imprimir', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod AS CODIGO, p_fam AS FAMILIA,p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR, p_descri AS DESCRIP, p_precio_1 AS PRECIO_1,p_precio_2 AS PRECIO_2,p_precio_3 AS PRECIO_3,p_precio_4 AS PRECIO_4,p_precio_5 AS PRECIO_5, p.p_local as SUC   FROM mnt_prod p WHERE p_cod  LIKE '%'   AND p.p_fam LIKE 'Cobertores' AND p.p_grupo LIKE  '%' AND p.p_tipo LIKE '%' AND p.p_color LIKE '%' AND p.p_local LIKE '05' LIMIT 2000";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table


    if($sup['p_precio_1'] === '%'){
      $T->Set('P1', '');
    }else{
      $T->Set('P1', '<th>PRECIO_1</th>');
    }
    if($sup['p_precio_2'] === '%'){
      $T->Set('P2', '');
    }else{
      $T->Set('P2', '<th>PRECIO_2</th>');
    }

    if($sup['p_precio_3'] === '%'){
      $T->Set('P3', '');
    }else{
      $T->Set('P3', '<th>PRECIO_3</th>');
    }

    if($sup['p_precio_4'] === '%'){
      $T->Set('P4', '');
    }else{
      $T->Set('P4', '<th>PRECIO_4</th>');
    }

    if($sup['p_precio_5'] === '%'){
      $T->Set('P5', '');
    }else{
      $T->Set('P5', '<th>PRECIO_5</th>');
    }
    if($sup['p_precio_6'] === '%'){
      $T->Set('P6', '');
    }else{
      $T->Set('P6', '<th>PRECIO_6</th>');
    }
    if($sup['p_precio_7'] === '%'){
      $T->Set('P7', '');
    }else{
      $T->Set('P7', '<th>PRECIO_7</th>');
    }   
    
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
$old['DESCRIP'] = '';
$old['PRECIO_1'] = '';
$old['PRECIO_2'] = '';
$old['PRECIO_3'] = '';
$old['PRECIO_4'] = '';
$old['PRECIO_5'] = '';
$old['PRECIO_6'] = '';
$old['PRECIO_7'] = '';
$old['SUC'] = '';
$old['CANT'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FAMILIA'] = $Q0->Record['FAMILIA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['PRECIO_1'] = $Q0->Record['PRECIO_1'];
    $el['PRECIO_2'] = $Q0->Record['PRECIO_2'];
    $el['PRECIO_3'] = $Q0->Record['PRECIO_3'];
    $el['PRECIO_4'] = $Q0->Record['PRECIO_4'];
    $el['PRECIO_5'] = $Q0->Record['PRECIO_5'];
    $el['PRECIO_6'] = $Q0->Record['PRECIO_6'];
    $el['PRECIO_7'] = $Q0->Record['PRECIO_7'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['CANT'] =  $Q0->Record['CANT'];

    if($sup['p_precio_1'] === '%'){
       $T->Set('query0_PRECIO_1', '' );
    }else{
       $T->Set('query0_PRECIO_1','<td class="num">'.number_format( $el['PRECIO_1'],0,',','.') .'&nbsp;</td>' );
    }
    if($sup['p_precio_2'] === '%'){
       $T->Set('query0_PRECIO_2', '' );
    }else{
        $T->Set('query0_PRECIO_2', '<td class="num">'.number_format( $el['PRECIO_2'],0,',','.').'&nbsp;</td>');
    }
    if($sup['p_precio_3'] === '%'){
       $T->Set('query0_PRECIO_3', '' );
    }else{
        $T->Set('query0_PRECIO_3', '<td class="num">'.number_format( $el['PRECIO_3'],0,',','.').'&nbsp;</td>');
    }
    if($sup['p_precio_4'] === '%'){
       $T->Set('query0_PRECIO_4', '' );
    }else{
       $T->Set('query0_PRECIO_4','<td class="num">'. number_format( $el['PRECIO_4'],0,',','.').'&nbsp;</td>');
    }
    if($sup['p_precio_5'] === '%'){
       $T->Set('query0_PRECIO_5', '' );
    }else{
       $T->Set('query0_PRECIO_5','<td class="num">'.  number_format( $el['PRECIO_5'],0,',','.').'&nbsp;</td>');
    }
    if($sup['p_precio_6'] === '%'){
       $T->Set('query0_PRECIO_6', '' );
    }else{
       $T->Set('query0_PRECIO_6','<td class="num">'. number_format( $el['PRECIO_6'],0,',','.').'&nbsp;</td>');
    }
    if($sup['p_precio_7'] === '%'){
       $T->Set('query0_PRECIO_7', '' );
    }else{
       $T->Set('query0_PRECIO_7','<td class="num">'.number_format( $el['PRECIO_7'],0,',','.').'&nbsp;</td>');
    }
    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_FAMILIA', $el['FAMILIA']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    
    $T->Set('query0_SUC', $el['SUC']);
     $T->Set('query0_CANT',  number_format($el['CANT'],2,',','.'));

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
      //  $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['FAMILIA'] = $el['FAMILIA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['PRECIO_1'] = $el['PRECIO_1'];
    $old['PRECIO_2'] = $el['PRECIO_2'];
    $old['PRECIO_3'] = $el['PRECIO_3'];
    $old['PRECIO_4'] = $el['PRECIO_4'];
    $old['PRECIO_5'] = $el['PRECIO_5'];
    $old['PRECIO_6'] = $el['PRECIO_6'];
    $old['PRECIO_7'] = $el['PRECIO_7'];
    $old['SUC'] = $el['SUC'];
    $old['CANT'] = $el['CANT'];
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
