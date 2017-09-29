<?php

/** Report prg file (rep_x_grupo_tip) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 

/*$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_rep_localidad', 'Mostrar');
$T->Set( 'sup_p_cod', 'Mostrar');
$T->Set( 'sup_p_fam', 'Mostrar');
$T->Set( 'sup_p_grupo', 'Mostrar');
$T->Set( 'sup_p_tipo', 'Mostrar');
$T->Set( 'sup_p_comp', 'Mostrar');
$T->Set( 'sup_p_temp', 'Mostrar');
$T->Set( 'sup_p_estruc', 'Mostrar');
$T->Set( 'sup_p_clasif', 'Mostrar');
$T->Set( 'sup_p_color', 'No Mostrar');
$T->Set( 'sup_p_lisoest', 'Mostrar');
$T->Set( 'sup_p1', 'Mostrar');
$T->Set( 'sup_p2', 'Mostrar');
$T->Set( 'sup_p3', 'Mostrar');
$T->Set( 'sup_p4', 'Mostrar');
$T->Set( 'sup_p5', 'Mostrar');
$T->Set( 'sup_pregen', 'true');
$T->Set( 'sup_rep_stock', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p.p_cod AS CODIGO,p.p_fam AS FAM, p.p_grupo AS GRUPO,p.p_tipo AS TIPO,p.p_comp AS COMP,p.p_temp AS TEMP,p.p_estruc AS ESTR, p.p_clasif AS CLASIF,p.p_color AS COLOR,p.p_lisoest AS LISOEST, p.p_local AS SUC,p.p_precio_1 AS PRECIO_1,p.p_precio_2 AS PRECIO_2,p.p_precio_3 AS PRECIO_3,p.p_precio_4 AS PRECIO_4,p.p_precio_5 AS PRECIO_5 FROM mnt_prod p,tmp_grupo_tipo t where p.p_grupo = t.grupo and p.p_tipo = t.tipo group by t.grupo , t.tipo";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

    $tam = $el[tam_letras];      
    $cad = str_replace("'", '', $tam );
    $T->Set('tam',$cad );
    $T->Set('title',$cad + 1);
    
  if( $sup[p_cod] == 'Mostrar'){          
       $T->Set('CODIGO', 'CODIGO');
    }else{       
       $T->Set('CODIGO', '');
    }
    if( $sup[p_fam] === 'Mostrar'){       
	 $T->Set('FAM', 'FAM');
    }else{       
       $T->Set('FAM', '');
    }
    
     if( $sup[p_grupo] === 'Mostrar'){       
	$T->Set('GRUPO', 'GRUPO');	
    }else{        
        $T->Set('GRUPO', '');	
    }
    
    if( $sup[p_tipo] === 'Mostrar'){       
      $T->Set('TIPO', 'TIPO');
    }else{       
       $T->Set('TIPO', 'TIPO');
    }  
    
    if( $sup[p_comp] === 'Mostrar'){        
	 $T->Set('COMP','COMP');
    }else{      
       $T->Set('COMP','');       
    }
    if( $sup[p_temp] === 'Mostrar'){      
       $T->Set('TEMP', 'TEMP');
    }else{     
       $T->Set('TEMP', '');
    }
    if( $sup[p_estruc] === 'Mostrar'){       
          $T->Set('ESTR', 'ESTR');
    }else{
        
	$T->Set('ESTR', '');
    }
     if( $sup[p_clasif] === 'Mostrar'){
      
	$T->Set('CLASIF', 'CLASIF');
    }else{
        
        $T->Set('CLASIF', '');
    }
    if( $sup[p_color] === 'Mostrar'){ 
          $T->Set('COLOR', 'COLOR');
    }else{      
	$T->Set('COLOR', '');
    }
    if( $sup[p_lisoes] === 'Mostrar'){       
        $T->Set('LISOEST', 'LISOEST');
    }else{	 
        $T->Set('LISOEST', '');	 
    }
    if( $sup[rep_localidad] === 'Mostrar'){         
        $T->Set('SUC', 'SUC');
    }else{     
       $T->Set('SUC', '');
    }     
    
    if( $sup[p1] === 'Mostrar'){             
	$T->Set('PRECIO_1', 'PRECIO_1');
    }else{         
	$T->Set('PRECIO_1', '');
    }
      if( $sup[p2] === 'Mostrar'){         
	$T->Set('PRECIO_2', 'PRECIO_2');
    }else{        
	$T->Set('PRECIO_2', '');
    }    
     if( $sup[p3] === 'Mostrar'){         
       $T->Set('PRECIO_3', 'PRECIO_3');
    }else{       
	$T->Set('PRECIO_3', '');
    }    
    if($sup[p4] === 'Mostrar'){         
	$T->Set('PRECIO_4', 'PRECIO_4');
    }else{         
	$T->Set('PRECIO_4', '');
    }    
     if( $sup[p5] === 'Mostrar'){       
	$T->Set('PRECIO_5', 'PRECIO_5');
    }else{         
	$T->Set('PRECIO_5', '');
    }   



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
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COMP'] = $Q0->Record['COMP'];
    $el['TEMP'] = $Q0->Record['TEMP'];
    $el['ESTR'] = $Q0->Record['ESTR'];
    $el['CLASIF'] = $Q0->Record['CLASIF'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['LISOEST'] = $Q0->Record['LISOEST'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['PRECIO_1'] = $Q0->Record['PRECIO_1'];
    $el['PRECIO_2'] = $Q0->Record['PRECIO_2'];
    $el['PRECIO_3'] = $Q0->Record['PRECIO_3'];
    $el['PRECIO_4'] = $Q0->Record['PRECIO_4'];
    $el['PRECIO_5'] = $Q0->Record['PRECIO_5'];

    // Preparing a template variables
    
    
    if( $sup[p_cod] == 'Mostrar'){   
       $T->Set('query0_CODIGO', $el['CODIGO']);
       $T->Set('CODIGO', 'CODIGO');
    }else{
       $T->Set('query0_CODIGO', '');
       $T->Set('CODIGO', '');
    }
     if( $sup[p_fam] === 'Mostrar'){
        $T->Set('query0_FAM', $el['FAM']);
	 $T->Set('FAM', 'FAM');
    }else{
       $T->Set('query0_FAM', '');
       $T->Set('FAM', '');
    }
    
     if( $sup[p_grupo] === 'Mostrar'){
        $T->Set('query0_GRUPO', $el['GRUPO']);
	$T->Set('GRUPO', 'GRUPO');	
    }else{
        $T->Set('query0_GRUPO', '');
        $T->Set('GRUPO', '');	
    }
    
    if( $sup[p_tipo] === 'Mostrar'){
      $T->Set('query0_TIPO', $el['TIPO']);
      $T->Set('TIPO', 'TIPO');
    }else{
       $T->Set('query0_TIPO', '');
       $T->Set('TIPO', 'TIPO');
    }  
    
    if( $sup[p_comp] === 'Mostrar'){ 
        $T->Set('query0_COMP', $el['COMP']);
	 $T->Set('COMP','COMP');
    }else{
       $T->Set('query0_COMP','');
       $T->Set('COMP','');       
    }
    if( $sup[p_temp] === 'Mostrar'){
       $T->Set('query0_TEMP', $el['TEMP']);
       $T->Set('TEMP', 'TEMP');
    }else{
       $T->Set('query0_TEMP', '');
       $T->Set('TEMP', '');
    }
    if( $sup[p_estruc] === 'Mostrar'){
       $T->Set('query0_ESTR', $el['ESTR']);
          $T->Set('ESTR', 'ESTR');
    }else{
        $T->Set('query0_ESTR', '');
	$T->Set('ESTR', '');
    }
     if( $sup[p_clasif] === 'Mostrar'){
        $T->Set('query0_CLASIF', $el['CLASIF']);
	$T->Set('CLASIF', 'CLASIF');
    }else{
        $T->Set('query0_CLASIF', '');
        $T->Set('CLASIF', '');
    }
    if( $sup[p_color] === 'Mostrar'){ 
        $T->Set('query0_COLOR', $el['COLOR']);
	$T->Set('COLOR', 'COLOR');
    }else{
        $T->Set('query0_COLOR', '');
	$T->Set('COLOR', '');
    }
    if( $sup[p_lisoes] === 'Mostrar'){ 
        $T->Set('query0_LISOEST', $el['LISOEST']);
        $T->Set('LISOEST', 'LISOEST');
    }else{
	$T->Set('query0_LISOEST', '');
        $T->Set('LISOEST', '');	 
    }
    if( $sup[rep_localidad] === 'Mostrar'){ 
       $T->Set('query0_SUC', $el['SUC']);
        $T->Set('SUC', 'SUC');
    }else{
       $T->Set('query0_SUC', '');
       $T->Set('SUC', '');
    }     
    
    if( $sup[p1] === 'Mostrar'){     
        $T->Set('query0_PRECIO_1', $el['PRECIO_1']);
	$T->Set('PRECIO_1', 'PRECIO_1');
    }else{
        $T->Set('query0_PRECIO_1', '');
	$T->Set('PRECIO_1', '');
    }
      if( $sup[p2] === 'Mostrar'){ 
        $T->Set('query0_PRECIO_2', $el['PRECIO_2']);
	$T->Set('PRECIO_2', 'PRECIO_2');
    }else{
        $T->Set('query0_PRECIO_2', '');
	$T->Set('PRECIO_2', '');
    }    
     if( $sup[p3] === 'Mostrar'){ 
       $T->Set('query0_PRECIO_3', $el['PRECIO_3']);
       $T->Set('PRECIO_3', 'PRECIO_3');
    }else{
        $T->Set('query0_PRECIO_3', '');
	$T->Set('PRECIO_3', '');
    }    
    if($sup[p4] === 'Mostrar'){ 
        $T->Set('query0_PRECIO_4', $el['PRECIO_4']);
	$T->Set('PRECIO_4', 'PRECIO_4');
    }else{
        $T->Set('query0_PRECIO_4', '');
	$T->Set('PRECIO_4', '');
    }    
     if( $sup[p5] === 'Mostrar'){ 
        $T->Set('query0_PRECIO_5', $el['PRECIO_5']);
	$T->Set('PRECIO_5', 'PRECIO_5');
    }else{
        $T->Set('query0_PRECIO_5', '');
	$T->Set('PRECIO_5', '');
    }    

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
