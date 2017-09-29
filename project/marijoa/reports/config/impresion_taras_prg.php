<?php

/** Report prg file (impresion_taras) 
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
$T->Set( 'sup_tara', '360.00');
$T->Set( 'sup_cant', '1');
$T->Set( 'sup_imprimir', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select 1";
require_once("barcodegen/RadPlusBarcodeNoFont.php");

$tara = $sup['tara'];
$cant = $sup['cant'];
$T->Show('general_header');	

for($i = 0; $i < $cant; $i++){
		 
   
    $filename = new RadPlusBarcode();
    
    $sub = $i % 2;
    
    
    $barcode = $filename->parseCode($tara,1);  
    $T->Set("query0_CODIGO_BARRAS_$sub", $barcode);
    $T->Set('tara',$tara);
    
    if($sub > 0){
       $T->Show('body');
    }
 
}

// Starting a HTML
		
 

?>
