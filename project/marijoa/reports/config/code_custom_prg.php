<?php

/** Report prg file (codigo_barras) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  
/*
// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_f_cod', '150');
$T->Set( 'sup_f_sql', ' TERRY DE 1.5');
$T->Set( 'sup_f_combinado', 'TERRY DE 1.5');
$T->Set( 'sup_f_cant', '54.90');
$T->Set( 'sup_f_bloqueo', 'true');
$T->Set( 'sup_f_codigo_nuevo', '150');
$T->Set( 'sup_f_hasta', '152');
$T->Set( 'sup_f_rango', '152');
$T->Set( 'sup_f_habilitar', 'Si');
$T->Set( 'sup_f_imprimir', '');
$T->Set( 'sup_f_precio', '');*/

// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select p_cod as CODIGO_BARRAS, p_local as LOCALIDAD,p_fam, p_grupo,p_tipo,p_comp,p_temp,p_estruc,p_clasif,p_color,p_cant  from mnt_prod where p_cod between '150' and   '152' ";

//require_once("/www/barcodegen/RadPlusBarcode.php");
require_once("barcodegen/RadPlusBarcodeNoFont.php");

$db = new Y_DB();
$db->Database = 'marijoa';
 
 
 
$Q0 = $DB;

$query0 = "select 1";

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
    
    $estante = $sup['estante'];
    $dfila = $sup['dfila'];
    $fila = $sup['afila'];
    $col = $sup['acol'];
    $dcol = $sup['dcol'];
    $suc = $sup['empr'];
    
    $filename = new RadPlusBarcode();
    
 
    $cont = 0;
    
    for($i = $dfila;$i <= $fila;$i++){
      for($j = $dcol;$j<= $col;$j++){
        $codigo_barras = $suc." ".$estante." ".$i." ".$j;
        $codigo_letras= $estante." - ".$i." - ".$j;
        
        $cont++;
       
        $code = $filename->parseCode($codigo_barras);  
        $T->Set('query0_CODIGO_BARRAS',  $code  );  
        $T->Set('letras',  $codigo_letras  );  
        $T->Show('query0_data_row');
        
      }    
    }

     
 
			// Ends a Table 

?>
