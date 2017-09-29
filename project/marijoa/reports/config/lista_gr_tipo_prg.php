<?php

/** Report prg file (lista_gr_tipo) 
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
$T->Set( 'sup_rep_localidad', 'Mostrar');
$T->Set( 'sup_p_fam', 'Mostrar');
$T->Set( 'sup_p_grupo', 'Mostrar');
$T->Set( 'sup_p_tipo', 'Mostrar');
$T->Set( 'sup_p_comp', 'Mostrar');
$T->Set( 'sup_p_temp', 'Mostrar');
$T->Set( 'sup_p_estruc', 'Mostrar');
$T->Set( 'sup_p_clasif', 'No Mostrar');
$T->Set( 'sup_p_color', 'Mostrar');
$T->Set( 'sup_p_lisoest', 'Mostrar');
$T->Set( 'sup_pregen', 'true');
$T->Set( 'sup_rep_stock', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p.p_cod AS CODIGO,p.p_fam AS FAM, p.p_grupo AS GRUPO,p.p_tipo AS TIPO,p.p_comp AS COMP,p.p_temp AS TEMP,p.p_estruc AS ESTR, p.p_clasif AS CLASIF,p.p_color AS COLOR,p.p_lisoest AS LISOEST, p.p_local AS SUC,p.p_precio_1 AS PRECIO_1,p.p_precio_2 AS PRECIO_2,p.p_precio_3 AS PRECIO_3,p.p_precio_4 AS PRECIO_4,p.p_precio_5 AS PRECIO_5 FROM mnt_prod p,tmp_grupo_tipo t where p.p_grupo = t.grupo and p.p_tipo = t.tipo group by t.grupo , t.tipo";

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
$old['COMP'] = '';
$old['TEMP'] = '';
$old['ESTR'] = '';
$old['CLASIF'] = '';
$old['COLOR'] = '';
$old['LISOEST'] = '';
$old['SUC'] = '';
$old['PRECIO_1'] = '';
$old['PRECIO_2'] = '';
$old['PRECIO_3'] = '';
$old['PRECIO_4'] = '';
$old['PRECIO_5'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    if( $el[p_cod] === 'Mostrar'){
     $el['CODIGO'] = $Q0->Record['CODIGO'];
    }else{
       $el['CODIGO'] = '';
    }
    if( $el[p_fam] === 'Mostrar'){
       $el['FAM'] = $Q0->Record['FAM'];
    }else{
       $el['FAM'] = '';
    }
     if( $el[p_grupo] === 'Mostrar'){
       $el['GRUPO'] = $Q0->Record['GRUPO'];
    }else{
       $el['GRUPO'] = '';
    }
    if( $el[p_tipo] === 'Mostrar'){
       $el['TIPO'] = $Q0->Record['TIPO'];
    }else{
       $el['TIPO'] = '';
    }
     if( $el[p_comp] === 'Mostrar'){
       $el['COMP'] = $Q0->Record['COMP'];
    }else{
      $el['COMP'] = '';
    }
     if( $el[p_temp] === 'Mostrar'){
        $el['TEMP'] = $Q0->Record['TEMP'];
    }else{
       $el['TEMP'] = '';
    }
    if( $el[p_estruc] === 'Mostrar'){
       $el['ESTR'] = $Q0->Record['ESTR'];
    }else{
       $el['ESTR'] = '';
    }
     if( $el[p_clasif] === 'Mostrar'){
       $el['CLASIF'] = $Q0->Record['CLASIF'];
    }else{
       $el['CLASIF'] = '';
    }
    
    if( $el[p_color] === 'Mostrar'){ 
      $el['COLOR'] = $Q0->Record['COLOR'];
    }else{
       $el['COLOR'] =  '';
    }
    if( $el[p_lisoes] === 'Mostrar'){ 
        $el['LISOEST'] = $Q0->Record['LISOEST'];
    }else{
         $el['LISOEST'] = '';
    }
     if( $el[rep_localidad] === 'Mostrar'){ 
       $el['SUC'] = $Q0->Record['SUC'];
    }else{
       $el['SUC'] = '';
    }
    
    if( $el[p1] === 'Mostrar'){ 
       $el['PRECIO_1'] = $Q0->Record['PRECIO_1'];
    }else{
       $el['PRECIO_1'] = '';
    } 
    if( $el[p2] === 'Mostrar'){ 
    $el['PRECIO_2'] = $Q0->Record['PRECIO_2'];
    }else{
       $el['PRECIO_2'] = '';
    }     
     if( $el[p3] === 'Mostrar'){ 
	$el['PRECIO_3'] = $Q0->Record['PRECIO_3'];
    }else{
       $el['PRECIO_3'] = '';
    } 
      if( $el[p4] === 'Mostrar'){  
    $el['PRECIO_4'] = $Q0->Record['PRECIO_4'];
    }else{
       $el['PRECIO_4'] = '';
    } 
     if( $el[p5] === 'Mostrar'){ 
	$el['PRECIO_5'] = $Q0->Record['PRECIO_5'];
	}else{
       $el['PRECIO_5'] = '';
    } 
    // Preparing a template variables
   
    
     $T->Set('query0_CODIGO', $el['CODIGO']); 
     $T->Set('query0_FAM', $el['FAM']); 
     $T->Set('query0_GRUPO', $el['GRUPO']); 
     $T->Set('query0_TIPO', $el['TIPO']);
    
    
     
    $T->Set('query0_COMP', $el['COMP']);
    $T->Set('query0_TEMP', $el['TEMP']);
    $T->Set('query0_ESTR', $el['ESTR']);
    $T->Set('query0_CLASIF', $el['CLASIF']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_LISOEST', $el['LISOEST']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_PRECIO_1', $el['PRECIO_1']);
    $T->Set('query0_PRECIO_2', $el['PRECIO_2']);
    $T->Set('query0_PRECIO_3', $el['PRECIO_3']);
    $T->Set('query0_PRECIO_4', $el['PRECIO_4']);
    $T->Set('query0_PRECIO_5', $el['PRECIO_5']);

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
    $old['COMP'] = $el['COMP'];
    $old['TEMP'] = $el['TEMP'];
    $old['ESTR'] = $el['ESTR'];
    $old['CLASIF'] = $el['CLASIF'];
    $old['COLOR'] = $el['COLOR'];
    $old['LISOEST'] = $el['LISOEST'];
    $old['SUC'] = $el['SUC'];
    $old['PRECIO_1'] = $el['PRECIO_1'];
    $old['PRECIO_2'] = $el['PRECIO_2'];
    $old['PRECIO_3'] = $el['PRECIO_3'];
    $old['PRECIO_4'] = $el['PRECIO_4'];
    $old['PRECIO_5'] = $el['PRECIO_5'];
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
