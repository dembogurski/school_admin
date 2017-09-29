<?php

/** Report prg file (stock_FGT) 
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
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_p_COLOR', '%');
$T->Set( 'sup_p_grupo', 'ALFOMBRA');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup___lock', 'true');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  p.p_COLOR as COLOR, p.p_grupo as GRUPO,p.p_tipo as TIPO,  p.p_cant as CANT, p.p_cant * p.p_compra as VALOR_AL_COSTO  FROM  mnt_prod p WHERE  p.p_local LIKE  '%' and p.p_COLOR like '%' and p.p_grupo like  'ALFOMBRA' and p.p_tipo like '%' and p.p_cant > 0 order by p.p_COLOR , p.p_grupo , p.p_tipo,p.p_cant desc";

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
$total0_CANT = 0;
$total0_VALOR_AL_COSTO = 0;

//Define a Subtotal Variables
$subtotal0_CANT = 0;
$subtotal0_VALOR_AL_COSTO = 0;

$TIPO = 0; 
$TIPO_S = 0;

//Define a Old Values Variables
$old['COLOR'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANT'] = '';
$old['VALOR_AL_COSTO'] = '';
$flag = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){
    $flag++;
    // Define a elements
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['VALOR_AL_COSTO'] = $Q0->Record['VALOR_AL_COSTO'];
	/**
    if( ($el['COLOR']!=$old['COLOR'])||($el['GRUPO']!=$old['GRUPO'])||($el['TIPO']!=$old['TIPO'])  ){
    	
    	
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT = 0; 
        $subtotal0_VALOR_AL_COSTO = 0;
    }
		if(trim($el['COLOR']!=$old['COLOR'])||(trim($el['GRUPO'])!=trim($old['GRUPO']))||trim($el['TIPO']!=$old['TIPO'])){
		 if ($flag > 0) {  
		 	 $TIPO_S  = 0 +$el['VALOR_AL_COSTO'];
		 	  $TIPO = 0 +$el['CANT']; 

		 	// echo "<tr  style='font-size:11px;'> <td> ***".$el['GRUPO']."  </td> <td colspan='1'> ".$el['TIPO']."   </td> <td>".$el['COLOR']."  </td>   <td align='right'>  $TIPO </td>  <td align='right'>  ".number_format($TIPO_S,0,',','.')."   </td>   </tr>";
         } 
			
		    
		 }else{ 
			 $TIPO += 0 + $el['CANT'];   
			 $TIPO_S += 0 +$el['VALOR_AL_COSTO'];
		 }*/
    // Preparing a template variables
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    //if ($sup['p_tipo']==='%%') {
		 $T->Set('query0_TIPO', $el['TIPO']); 	  	
    /**}else  {
    	 $T->Set('query0_TIPO',''); 	  	
    }*/
   
    $T->Set('query0_CANT', number_format($el['CANT'],2,'.',','));
    $T->Set('query0_VALOR_AL_COSTO', number_format($el['VALOR_AL_COSTO'],2,'.',','));

    // Calculating a total
    $total0_CANT += 0 + $el['CANT'];
    $total0_VALOR_AL_COSTO   += 0 + $el['VALOR_AL_COSTO'];


    // Calculating a subtotal
    $subtotal0_CANT += 0 + $el['CANT'];
    $subtotal0_VALOR_AL_COSTO += 0 + $el['VALOR_AL_COSTO'];
	/**
    if ($sup['resumido']==='Si') {
		//  $T->Show('query0_data_row');  
    }else  {
    	  $T->Show('query0_data_row');  
    }
  */
	$T->Show('query0_data_row');  
    // Show Subtotal
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,2,'.',','));
    $T->Set('subtotal0_VALOR_AL_COSTO', number_format($subtotal0_VALOR_AL_COSTO,2,'.',','));
    
    //Actualize Old Values Variables
    $old['COLOR'] = $el['COLOR'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANT'] = $el['CANT'];
    $old['VALOR_AL_COSTO'] = $el['VALOR_AL_COSTO'];
    $firstRow=false;

}

$endConsult = true;
 //$T->Show('query0_subtotal_row');
if( ($el['COLOR']!=$old['COLOR'])||($el['GRUPO']!=$old['GRUPO'])||($el['TIPO']!=$old['TIPO']) ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_CANT', number_format($total0_CANT,2,'.',','));
$T->Set('total0_VALOR_AL_COSTO', number_format($total0_VALOR_AL_COSTO,2,'.',','));
if( endConsult ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?> 
