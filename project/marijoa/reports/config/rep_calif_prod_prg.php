<?php

/** Report prg file (rep_calif_prod) 
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
$T->Set( 'sup_desde', '');
$T->Set( 'sup_hasta', '2010-03-31');
$T->Set( 'sup_suc_', '%');
$T->Set( 'sup_rep', '');
$T->Set( 'sup_report_calif', '');
$T->Set( 'sup___lock', 'true');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_tipo AS TIPO, margen AS MARGEN, subtotal AS SUBTOTAL, metros AS METROS, precio_v AS PRECIO_V, precio_c AS PRECIO_C, porc AS PORC FROM tmp_calif_prod ORDER BY margen DESC";

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
$subtotal0_MARGEN = 0;
$subtotal0_SUBTOTAL = 0;
$subtotal0_METROS = 0;
$subtotal0_PRECIO_V = 0;
$subtotal0_PRECIO_C = 0;


//Define a Old Values Variables
$old['TIPO'] = '';
$old['MARGEN'] = '';
$old['SUBTOTAL'] = '';
$old['METROS'] = '';
$old['PRECIO_V'] = '';
$old['PRECIO_C'] = '';
$old['GRUPO'] = '';
$old['PORC'] = '';


    $Q1 = new Y_DB();
	$Q1->Database = $Global['project'];	
  	$Q1->Query("select sum(margen) as TOTAL from tmp_calif_prod ;");
  	$Q1->NextRecord();
  	$TOTAL = $Q1->Record['TOTAL']; 
    echo "TOTAL :  ".$TOTAL;
  	
  	$X10 = ($TOTAL * 10) / 100;
  	$X20 = ($TOTAL * 20) / 100;
  	$X30 = ($TOTAL * 30) / 100;
  	$X40 = ($TOTAL * 40) / 100;
  	$X50 = ($TOTAL * 50) / 100;
  	$X60 = ($TOTAL * 60) / 100;
  	$X70 = ($TOTAL * 70) / 100; 
  	$X80 = ($TOTAL * 80) / 100;
  	$X90 = ($TOTAL * 90) / 100;
  	$X100 = ($TOTAL * 100) / 100;
  	
  	
    $y1 =true; 
    $y2 =true; 
    $y3 =true; 
    $y4 =true; 
    $y5 =true; 
    $y6 =true; 
    $y7 =true; 
    $y8 =true; 
    $y9 =true; 
    $y10 =true;  	

$i = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){
	
	$i++;

    // Define a elements
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['METROS'] = $Q0->Record['METROS'];
    $el['PRECIO_V'] = $Q0->Record['PRECIO_V'];
    $el['PRECIO_C'] = $Q0->Record['PRECIO_C'];
    $el['PORC'] = $Q0->Record['PORC'];
	$el['GRUPO'] = $Q0->Record['GRUPO'];
    
    //$subtotal0_MARGEN += 0 + $el['MARGEN'];

    // Preparing a template variables
    $T->Set('query0_TIPO', $el['TIPO']);
	$T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_MARGEN', number_format($el['MARGEN'],0,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],0,',','.'));
    $T->Set('query0_METROS', number_format($el['METROS'],2,',','.'));
    $T->Set('query0_PRECIO_V', number_format($el['PRECIO_V'],0,',','.'));
    $T->Set('query0_PRECIO_C', number_format($el['PRECIO_C'],0,',','.'));
    $T->Set('query0_PORC', $el['PORC']);
    $T->Set('i', $i);
    
    
    $Z_MARGEN += 0 + number_format($el['MARGEN'],0,',','.');
    
    $Z_PORC += 0 + number_format($el['PORC'],2,',','.');
    

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MARGEN += 0 + $el['MARGEN'];
    
    if ( $subtotal0_MARGEN > $X10  && $y1){
       $T->Set('Z_MARGEN', $Z_MARGEN ); $T->Set('perc', '10');
      
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple', number_format( $porc_simple ,2,',','.'));
       $T->Show('z'); $y1 = false;
    }
    if ($subtotal0_MARGEN > $X20 && $y2){
       $T->Set('Z_MARGEN', $Z_MARGEN);  $T->Set('perc', '20');
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple', number_format( $porc_simple ,2,',','.'));
       $T->Show('z');  $y2 = false;
    }
    if ($subtotal0_MARGEN > $X30 &&  $y3){
       $T->Set('Z_MARGEN', $Z_MARGEN);  $T->Set('perc', '30');
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple',number_format( $porc_simple ,2,',','.'));
       $T->Show('z');  $y3 = false;
    }
    if ($subtotal0_MARGEN > $X40 &&  $y4){
       $T->Set('Z_MARGEN', $Z_MARGEN);  $T->Set('perc', '40');
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple',number_format( $porc_simple ,2,',','.'));
       $T->Show('z');  $y4 = false;
    }
    if ($subtotal0_MARGEN > $X50 &&  $y5){
       $T->Set('Z_MARGEN', $Z_MARGEN);  $T->Set('perc', '50');
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple',number_format( $porc_simple ,2,',','.'));
       $T->Show('z');  $y5 = false;
    }     
    if ($subtotal0_MARGEN > $X60 &&  $y6){
       $T->Set('Z_MARGEN', $Z_MARGEN);  $T->Set('perc', '60');
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple',number_format( $porc_simple ,2,',','.'));
       $T->Show('z');  $y6 = false;
    }   
    if ($subtotal0_MARGEN > $X70 &&  $y7){
       $T->Set('Z_MARGEN', $Z_MARGEN);  $T->Set('perc', '70');
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple',number_format( $porc_simple ,2,',','.'));
       $T->Show('z');  $y7 = false;
    } 
    if ($subtotal0_MARGEN > $X80 &&  $y8){
       $T->Set('Z_MARGEN', $Z_MARGEN);  $T->Set('perc', '80');
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple',number_format( $porc_simple ,2,',','.'));
       $T->Show('z');  $y8 = false;
    }   
    if ($subtotal0_MARGEN > $X90 &&  $y9){
       $T->Set('Z_MARGEN', $Z_MARGEN);  $T->Set('perc', '90');
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple',number_format( $porc_simple ,2,',','.'));
       $T->Show('z');  $y9 = false;
    }        
    if ( $subtotal0_MARGEN > $X100  && $y10){
       $T->Set('Z_MARGEN', $Z_MARGEN); $T->Set('perc', '100');
       $porc_simple =  $Z_PORC / $i;  $T->Set('porc_simple',number_format( $porc_simple ,2,',','.'));
       $T->Show('z'); $y10 = false;
    }
         
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];
    $subtotal0_METROS += 0 + $el['METROS'];
    $subtotal0_PRECIO_V += 0 + $el['PRECIO_V'];
    $subtotal0_PRECIO_C += 0 + $el['PRECIO_C'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MARGEN', number_format($subtotal0_MARGEN,0,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,0,',','.'));
    $T->Set('subtotal0_METROS', number_format($subtotal0_METROS,2,'.',','));
    $T->Set('subtotal0_PRECIO_V', number_format($subtotal0_PRECIO_V,0,',','.'));
    $T->Set('subtotal0_PRECIO_C', number_format($subtotal0_PRECIO_C,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MARGEN = 0;
        $subtotal0_SUBTOTAL = 0;
        $subtotal0_METROS = 0;
        $subtotal0_PRECIO_V = 0;
        $subtotal0_PRECIO_C = 0;
    }
    
    //Actualize Old Values Variables
    $old['TIPO'] = $el['TIPO'];
    $old['MARGEN'] = $el['MARGEN'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $old['METROS'] = $el['METROS'];
    $old['PRECIO_V'] = $el['PRECIO_V'];
    $old['PRECIO_C'] = $el['PRECIO_C'];
    $old['PORC'] = $el['PORC'];
	$old['GRUPO'] = $el['GRUPO']; 
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
