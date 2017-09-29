<?php

/** Report prg file (estad_vent_clia) 
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
$T->Set( 'sup_cli_fullname', '');
$T->Set( 'sup_cli_cat', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_desde', '');
$T->Set( 'sup_hasta', '2010-03-03');
$T->Set( 'sup_desdeinv', 'NaN-NaN-NaN');
$T->Set( 'sup_hastainv', '2010-03-03');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_gen_rep2', '');  */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select distinct  cli_ci as CI_RUC,  cli_fullname AS NOMBRE from mnt_cli where cli_ci <> 1 order by cli_fullname asc";

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

$anioini = $sup['anioini'];

$aniofin = $sup['aniofin'];


//Define a Old Values Variables
$old['CI_RUC'] = '';
$old['NOMBRE'] = '';
$old['TEL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CI_RUC'] = $Q0->Record['CI_RUC'];
    $el['NOMBRE'] = $Q0->Record['NOMBRE'];
     $el['TEL'] = $Q0->Record['TEL'];

    // Preparing a template variables
    $T->Set('query0_CI_RUC', $el['CI_RUC']);
    $T->Set('query0_NOMBRE', $el['NOMBRE']);
    $T->Set('query0_TEL', $el['TEL']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    

	
	for ($anio = $anioini ;$anio <= $aniofin ;$anio++ ){
		 
		echo "<tr style='background-color: lightsilver; font-size:11;'> <td> Enero </td> <td> Febrero </td> <td> Marzo </td> <td> Abril </td><td> Mayo </td> <td> Junio </td> <td> Julio </td> <td> Agosto </td> <td> Setiemnbre </td> <td> Octubre </td> <td> Noviembre </td> <td> Diciembre </td><td style='background-color: lightgray;'><b> $anio </b> </td></tr>";
		echo "<tr>";
		for ($mes = 1;$mes < 13; $mes++){
			if ($mes < 10 ) { $mes = '0'.$mes; }
			$Q1 = new Y_DB();
			$Q1->Database = $Global['project'];	
			$CLI_CI = $el['CI_RUC'];
		    $Q1->Query("select sum(fact_total) as MONTO from factura where fact_fecha BETWEEN '$anio-$mes-01' and '$anio-$mes-31'  and fact_cli_ci = '$CLI_CI'");
           
		    $Q1->NextRecord();
		    
		    $el['MONTO'] = $Q1->Record['MONTO'];
		    
            $fact_total = number_format($el['MONTO'],0,',','.') ;
          
            
            if(  $fact_total > 0  ){
		         echo "<td style='background-color: #FFFFCC; font-size:12; font-weight:bold;'>  $fact_total   </td>";
            }else {
            	 echo "<td> &nbsp; </td>";
            }  
           /*  echo "<td style='background-color: #FFCC66; font-size:12; font-weight:bold;'>  $fact_total   </td>";*/
		}	
		echo "</tr> ";
	}
   
    
    
    
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CI_RUC'] = $el['CI_RUC'];
    $old['NOMBRE'] = $el['NOMBRE'];
    $old['TEL'] = $el['TEL'];
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
