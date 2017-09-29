<?php

/** Report prg file (reg_turnos) 
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
$T->Set( 'sup_suc', '02');
$T->Set( 'sup_user', 'Developer');
$T->Set( 'sup_desde', '2015-01-10');
$T->Set( 'sup_hasta', '2015-12-18');
$T->Set( 'sup_items', '0');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_gen_rep_turnos', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_it', '%');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  DATE_FORMAT(fecha,"%M-%d" ) AS DIA, SUM( IF( diff_ant < 5, 1,0)) AS CERO_5, SUM( IF( diff_ant BETWEEN 5 AND 10, 1,0)) AS CINCO_10, SUM( IF( diff_ant BETWEEN 10 AND 15, 1,0)) AS DIEZ_15, SUM( IF( diff_ant > 15, 1,0)) AS MAYOR_15  FROM reg_turnos r WHERE  r.fecha   BETWEEN '2015-01-10' AND '2015-12-18' AND suc = '02' GROUP BY DIA ORDER BY DATE_FORMAT(fecha,"%m-%d") ASC ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;

$Q0->Query( " SET lc_time_names = 'es_PY';" );

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
$old['DIA'] = '';
$old['DIA_SEM'] = '';
$old['CERO_5'] = '';
$old['CINCO_10'] = '';
$old['DIEZ_15'] = '';
$old['MAYOR_15'] = '';

function stripAccents($string){
	return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ',
'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['DIA'] = $Q0->Record['DIA'];
	$el['DIA_SEM'] = stripAccents($Q0->Record['DIA_SEM']);
    $el['CERO_5'] = $Q0->Record['CERO_5'];
    $el['CINCO_10'] = $Q0->Record['CINCO_10'];
    $el['DIEZ_15'] = $Q0->Record['DIEZ_15'];
    $el['MAYOR_15'] = $Q0->Record['MAYOR_15'];

    // Preparing a template variables
    $T->Set('query0_DIA', ucfirst( $el['DIA']));
	$T->Set('query0_DIA_SEM', ucfirst($el['DIA_SEM']  ));
    $T->Set('query0_CERO_5', $el['CERO_5']);
    $T->Set('query0_CINCO_10', $el['CINCO_10']);
    $T->Set('query0_DIEZ_15', $el['DIEZ_15']);
    $T->Set('query0_MAYOR_15', $el['MAYOR_15']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['DIA'] = $el['DIA'];
	$old['DIA_SEM'] = $el['DIA_SEM'];
    $old['CERO_5'] = $el['CERO_5'];
    $old['CINCO_10'] = $el['CINCO_10'];
    $old['DIEZ_15'] = $el['DIEZ_15'];
    $old['MAYOR_15'] = $el['MAYOR_15']; 
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
